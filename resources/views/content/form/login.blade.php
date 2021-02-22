@extends('master')
@section('main')
<!-- Featured Image -->
<div class="featured-image" style="background-image: url( {{asset('Images/cover/login.jpeg')}}"></div>
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
                <input name="password" type="password" class="form-control" placeholder="Password" required>
                <div class="form-footer">
                    <div class="rememberme">
                        
                        @if (!empty($loginError))
                        <span class="text-danger">*{{$loginError}}</span>
                        @endif
                    </div>
                    <div class="form-submit">
                        <button name="submit" type="submit" class="btn btn-primary btn-block waves-effect waves-light">Login</button>
                    </div>
                </div>
            </form><!-- .login-form -->
        </div><!-- .col-md-4 -->
        <div class="col-md-3 padding-top-2x">
            @if ($errors->any())
            <div style="color:red" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div><!-- .col-md-3 -->
    </div><!-- .row -->
</section><!-- .container -->
@endsection
