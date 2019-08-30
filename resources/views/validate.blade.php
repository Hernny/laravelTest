@extends('layouts.app')

@section('title', 'Validate user phone')

@section('content')
    <div class="container">
        <div class="row">
            <form action="validate" method="POST" class="col s8 offset-s2 ">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Pin" id="pin" name="pin" type="text" class="validate">
                        <label for="pin">Pin</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection