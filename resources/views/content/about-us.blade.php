@extends('master')
@section('main')
@foreach ($contents as $text)
<div class="featured-image" style="background-image: url({{asset(('Images/cover/'.$text->image))}});"></div>
@endforeach
<section class="container padding-top-3x padding-bottom-3x">
    @foreach ($contents as $text)
    <h1>{{$text->title}}</h1>
    @endforeach
    <div class="row padding-top">
        <div class="col-md-9 col-sm-6 padding-bottom">
            <h3>Oculus</h3>

            <p class=" space-top">{{$text->article}}</p>
        </div><!-- .col-md-5.col-sm-6 -->
    </div><!-- .row -->
    <hr class="padding-bottom">
   
    <div class="row padding-top">
    
       
    </div><!-- .row -->
</section><!-- .container -->
@endsection
