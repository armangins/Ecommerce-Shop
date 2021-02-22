@extends('master')
@section('main')
<!-- Featured Image -->
<div class="featured-image" style="background-image: url( {{asset('Images/cover/register.jpeg')}}"></div>
<!-- Content -->
<section class="container padding-top-3x padding-bottom-2x">
    <h1>User Account</h1>
    <div class="row padding-top">
        <div class="col-md-6 padding-bottom">
            <h3>Login</h3>
            <form method="POST" class="login-form" novalidate="novalidate">
                @csrf
                <input value="{{old('email')}}" name="email" type="text" class="form-control" placeholder="E-mail"
                    required>
                <span class="text-danger"> {{ $errors->first('email')}}</span>
                <input value="{{old('name')}}" name="name" type="text" class="form-control" placeholder="name" required>
                <span class="text-danger"> {{ $errors->first('name')}}</span>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
                <span class="text-danger"> {{ $errors->first('password')}}</span>
                <div class="form-footer">
                    <div class="form-submit">
                        <button name="submit" type="submit" class="btn btn-primary btn-block waves-effect waves-light">Register</button>
                    </div>
                </div>
            </form>
            <!-- .login-form -->
        </div>
    </div>
    <!-- .row -->
</section><!-- .container -->
@endsection
