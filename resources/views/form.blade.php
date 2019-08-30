@extends('layouts.app')

@section('title', 'form for creating user')

@section('content')
    <div class="container">
        <div class="row">
            <form action="register" method="POST" class="col s8 offset-s2 ">
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input placeholder="name" id="name" name="name" type="text" class="validate">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field col m6 s12">
                        <input placeholder="RUT" id="rut" name="rut" type="text" class="validate">
                        <label for="RUT">RUT</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Phone" id="phone" name="phone" type="tel" class="validate">
                        <label for="Phone">Phone</label>
                    </div>
                    <div class="input-field col s12">
                        <select id="favorite_fruit" name="favorite_fruit">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Apple">Apple</option>
                            <option value="Banana">Banana</option>
                            <option value="Orange">Orange</option>
                        </select>
                        <label>Favorite fruit</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Description" id="description" name="description" type="tel" class="validate">
                        <label for="description">Description</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection