<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use Nexmo\Laravel\Facade\Nexmo;
use App\User;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    private function GeneratePin($digits = 4){
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= rand(0, 9);
            $i++;
        }
        return $pin;
    }
    #call views function
    public function ShowForm(){
        return view('form');
    }
    public function ShowValidate(){
        return view('validate');
    }
    #end call views
    
    public function register(RequestUser $request){
        #validate request for register user
        $request->validate();
        $input = $request::all();
        #get location from ip adress
        $location = \Location::get($request->ip);
        #create string address
        $input->address_address=$location->regionName.$location->cityName.$location->countryName;
        #get lat and log
        $input->address_latitude=$location->latitude;
        $input->address_longitude=$location->longitude;
        #create user
        $this->user = User::create($input);
        session(['id'=>$this->user->id,'pin'=> $this->GeneratePin()]);
        #send sms
        Nexmo::message()->send([
            'to'   => $this->user->phone,
            'from' => 'test',
            'text' => 'test Pin Code Verification:'.$user->pin
        ]);
        #redirect to validate form
        return redirect('ShowValidate');
    }
    public function validate(Request $request){
        #code form validation 2fa
        $rules = [
            'pin' => 'required|min:0000|max:9999|numeric'
        ];
        $this->validate($request,$rules);
        if(!empty($request->pin) && session::get('pin')==$request->pin){
            $this->user::where('id', session::get('id'))->update(array('phone_verified_at' => Carbon\Carbon::now()));
            return redirect('/');
        }
        else{
            # redirect to previus page with error
            return Redirect::back()->withErrors(['msg', 'Pin invalido']);
        }
    }
}