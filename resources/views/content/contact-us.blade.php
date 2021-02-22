@extends('master')
@section('main')
@foreach($contents as $text)
<div class="featured-image" style="background-image: url({{asset(('Images/cover/'.$text->image))}});"></div>
@endforeach
<!-- Container -->
<section class="container space-top-3x">
    <h1>Contacts</h1>
    <div class="row padding-top">
        <div class="col-sm-5 padding-bottom-2x">
            <ul class="list-icon">
                <li>
                    <i class="material-icons location_on"></i>
                    Shoham 5<br>Tel-Aviv, Israel
                </li>
                <li>
                    <i class="material-icons phone"></i>
                    001 (917) 555-4836
                </li>
                <li>
                    <i class="material-icons phone_iphone"></i>
                    001 (800) 333-6578
                </li>
                <li>
                    <i class="material-icons email"></i>
                    <a href="mailto:info@m-store.com">armenin2088@gmail.com</a>
                </li>

            </ul><!-- .list-icon -->
            <p>Working hours: <span class="text-gray">10am - 8pm, Mn - St</span></p>
            <span class="display-inline" style="margin-bottom: 6px;">Social accounts: &nbsp;&nbsp;</span>
            <div class="social-bar display-inline">
                <a href="#" class="sb-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                    <i class="socicon-facebook"></i>
                </a>
                <a href="#" class="sb-google-plus" data-toggle="tooltip" data-placement="top" title=""
                    data-original-title="Google+">
                    <i class="socicon-googleplus"></i>
                </a>
                <a href="#" class="sb-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                    <i class="socicon-twitter"></i>
                </a>
                <a href="#" class="sb-instagram" data-toggle="tooltip" data-placement="top" title=""
                    data-original-title="Instagram">
                    <i class="socicon-instagram"></i>
                </a>
            </div><!-- .social-bar -->
        </div><!-- .col-sm-5 -->
        <div class="col-sm-7 padding-bottom-2x">
            {{-- <form method="post" class="ajax-form">
                <div class="contact-form container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-element">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-element">
                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                            </div>
                        </div>
                    </div><!-- .row -->
                    <div class="form-element">
                        <textarea rows="6" class="form-control" name="message" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light space-top-none">Send
                        Message</button>
                </div>
                <div class="status-message"></div>
            </form> --}}
        </div><!-- .col-sm-7 -->
    </div><!-- .row -->
</section><!-- .container -->
@endsection
