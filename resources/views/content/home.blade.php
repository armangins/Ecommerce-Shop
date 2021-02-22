@extends('master')
@section('main')
<section class="hero-slider" data-loop="true" data-autoplay="true" data-interval="7000">
    <div class="inner">
        <div class="slide" style="background-image: url({{asset('library/MD-shop/img/hero-slider/01.jpeg')}});">
            <div class="container">
                <div class="absolute from-top" style="top: 13%;">
                    <span class="h1 hidden-xs">Best Art Shop<br>Best prices</span>
                </div>
                <div class="absolute text-right from-bottom" style="bottom: 13%; right: 15px;">
                    <span class="h2"><span class="text-thin">New Month</span><br><strong>New supplies!</strong></span><br>
                </div>
            </div>
        </div><!-- .slide -->
        <div class="slide" style="background-image: url({{asset('library/MD-shop/img/hero-slider/02.jpeg')}});">
            <div class="container text-center padding-top-3x">
                <span class="h1 from-bottom">High quality statues from all across the globe</span><br>
                <span class="h2 from-bottom"><span class="text-thin"> NOW ! Up to </span> <strong>-50%</strong></span><br>
            </div>
        </div><!-- .slide -->
        <div class="slide" style="background-image: url({{asset('library/MD-shop/img/hero-slider/03.jpeg')}});">
            <div class="container padding-top-3x">
                <span class="h1 space-top from-left text-white">High value items and relics from all over the world</span><br>
                <span class="h2 from-right"><span class="text-thin text-white">Only <span class="hidden-xs">Now with -50%</span></span>
                    </span><br>
            </div>
        </div>
        <!-- .slide -->
    </div>
    <!-- .inner -->
</section>
<!-- .hero-slider -->
<section class="container-fluid padding-top-3x">
    <!-- Featured Categories -->
    <h3 class="text-center padding-top">Categories</h3>
    <div class="row padding-top padding-bottom-3x">
        @foreach ($categories as $category)
        <div class="col-sm-3 col-xs-6">
            <a href="{{url('shop/'.$category['curl'])}}" class="category-link">
                <img src="{{asset('Images/'.$category['cimage'])}}" alt="{{$category['ctitle']}} category image">

                {{$category['ctitle']}}
            </a>
            <!-- .category-link -->
        </div>
        <!-- .col-sm-4 -->
        @endforeach
    </div>
    <!-- .row -->
</section>
<!-- Content Wide -->
<section class="container-fluid padding-top-3x">
    <div class="row padding-top">
        <!-- Special Offer -->
        <div class="col-lg-3 col-md-4">
            <div class="info-box text-center">
                <h2>Special Offer For Artists And Art Fans<br><span class="text-danger">Use us!</span></h2>
                <a href="shop-single.html" class="inline">
                    <img src="{{asset('Images/products/offer.jpeg')}}" alt="Special Offer">
                </a>
                <h3 class="lead text-normal space-bottom-half"><a href="shop-single.html" class="link-title">
                        Let Us Sell Your Treasures For You !</a></h3>
                <small class="text-center">contact us for detials</small>
                <!-- Countdown -->
                <!-- Date Format: month/day/year. "date-time" data attribute is required. -->
                <div class="countdown space-top-half padding-top" data-date-time="07/30/2017 12:00:00">
                    <div class="item">
                        <div class="days"></div>
                        <span class="days_ref">Days</span>
                    </div>
                    <div class="item">
                        <div class="hours"></div>
                        <span class="hours_ref">Hours</span>
                    </div>
                    <div class="item">
                        <div class="minutes"></div>
                        <span class="minutes_ref">Mins</span>
                    </div>
                    <div class="item">
                        <div class="seconds"></div>
                        <span class="seconds_ref">Secs</span>
                    </div>
                </div><!-- .counter -->
            </div><!-- .info-box -->
            <div class="padding-bottom-2x visible-xs"></div>
        </div>
        <!-- .col-lg-3.col-md-4 -->
        <!-- Products -->
        <div class="col-lg-9 col-md-8">
            <!-- Nav Tabs -->
            <ul class="nav-tabs text-center" role="tablist">
                <li class="active"><a class="new" href="#newcomers" role="tab" data-toggle="tab">New Arrivals</a></li>

                <li><a href="#onsale" role="tab" data-toggle="tab">On Sale</a></li>
            </ul><!-- .nav-tabs -->
            <!-- Tab Panes -->
            <div class="tab-content">
                <!-- #newcomers -->
                <div role="tabpanel" class="tab-pane transition fade scale in active" id="newcomers">
                    <div class="row space-top-half">
                        @foreach ($new as $item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="shop-item">
                                <div class="shop-thumbnail">
                                    <span class="shop-label text-success">New!</span>
                                    <a href="{{url('shop/'.$item->curl.'/'.$item->purl)}}" class="item-link"></a>
                                    <img src="{{asset('Images/products/'.$item->pimage)}}" alt="Shop item">

                                    <div class="shop-item-tools">
                                        <a href="{{url('shop/'.$item->curl.'/'.$item->purl)}}" class="add-to-whishlist"
                                            data-toggle="tooltip" data-placement="top" title="More info">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        @if(!Cart::get($item->id))
                                        <a data-id="{{$item->id}}" href="#" class="add-to-cart add-to-cart-btn">
                                            <em>Add to cart</em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="square"
                                                    stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                            </svg>
                                        </a>
                                        @else
                                        <a class="add-to-cart add-to-cart-btn text-white">
                                            <em>I'm in cart</em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="square"
                                                    stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="shop-item-details">
                                    <h3 class="shop-item-title"><a href="{{url('shop/'.$item->curl.'/'.$item->purl)}}">{{$item->ptitle}}</a></h3>
                                    <span class="shop-item-price">
                                        ${{$item->price}}.00
                                    </span>
                                </div>
                            </div><!-- .shop-item -->
                        </div><!-- .col-lg-3.col-sm-6 -->
                        @endforeach
                    </div><!-- .row -->
                </div><!-- .tab-pane#newcomers -->
                <!-- #onsale -->
                <div role="tabpanel" class="tab-pane transition fade scale" id="onsale">
                    <div class="row">
                        @foreach ($onsale as $items)
                        <div class="col-lg-3 col-sm-6">
                            <div class="shop-item">
                                <div class="shop-thumbnail">
                                    <span class="shop-label text-danger">Sale </span>
                                    <a href="{{url('shop/'.$items->curl.'/'.$items->purl)}}" class="item-link"></a>
                                    <img src="{{asset('Images/products/'.$items->pimage)}}" alt="Shop item">
                                    <div class="shop-item-tools">
                                        <a href="{{url('shop/'.$items->curl.'/'.$items->purl)}}" class="add-to-whishlist" data-toggle="tooltip" data-placement="top"
                                            title="More Info">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        @if(!Cart::get($items->id))
                                        <a data-id="{{$items->id}}" href="#" class="add-to-cart add-to-cart-btn">
                                            <em>Add to Cart</em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="square"
                                                    stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                            </svg>
                                        </a>
                                        @else
                                        <a class="add-to-cart add-to-cart-btn text-white">
                                            <em>I'm in cart</em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="square"
                                                    stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="shop-item-details">
                                    <h3 class="shop-item-title"><a href="shop-single.html">{{$items->ptitle}}</a></h3>
                                    <span class="shop-item-price">
                                        <span class="old-price">${{$items->price/0.5}}.00</span>
                                        ${{$items->price}}.00
                                    </span>
                                </div>
                            </div><!-- .shop-item -->
                        </div><!-- .col-lg-3.col-sm-6 -->
                        @endforeach
                    </div><!-- .row -->
                </div><!-- .tab-pane#onsale -->
            </div><!-- .tab-content -->
        </div><!-- .col-lg-9.col-md-8 -->
    </div><!-- .row -->
</section><!-- .container-fluid -->
<!-- Features -->
<section class="container space-top space-bottom padding-top-2x padding-bottom-3x">
    <h3 class="text-center padding-top">We make sure your shopping is safe </h3>
    <div class="row">
        <!-- Feature -->
        <div class="col-md-3 col-sm-6">
            <div class="feature text-center">
                <div class="feature-icon">
                    <i class="material-icons location_on"></i>
                </div>
                <h4 class="feature-title">Free World-Wide Shipping</h4>
                <p class="feature-text">Free shipping on all orders over $100</p>
            </div>
        </div>
        <!-- Feature -->
        <div class="col-md-3 col-sm-6">
            <div class="feature text-center">
                <div class="feature-icon">
                    <i class="material-icons autorenew"></i>
                </div>
                <h4 class="feature-title">Money Back Guarantee</h4>
                <p class="feature-text">We return money within 30 days</p>
            </div>
        </div>
        <!-- Feature -->
        <div class="col-md-3 col-sm-6">
            <div class="feature text-center">
                <div class="feature-icon">
                    <i class="material-icons headset_mic"></i>
                </div>
                <h4 class="feature-title">24/7 Online Support</h4>
                <p class="feature-text">Friendly 24/7 customer support</p>
            </div>
        </div>
        <!-- Feature -->
        <div class="col-md-3 col-sm-6">
            <div class="feature text-center">
                <div class="feature-icon">
                    <i class="material-icons credit_card"></i>
                </div>
                <h4 class="feature-title">Secure Online Payments</h4>
                <p class="feature-text">We posess SSL / Secure Certificate</p>
            </div>
        </div>
    </div><!-- .row -->
</section><!-- .container -->
@endsection
