@extends('master')
@section('main')
<div class="product-gallery">
    <!-- Preview -->
    <ul class="product-gallery-preview">
        <li id="preview02" class="current"><img src="{{asset('Images/products/' .$item['pimage'])}}" alt="Product"></li>
    </ul><!-- .product-gallery-preview -->
</div><!-- .product-gallery -->
<!-- Product Info -->
<section class="fw-section bg-gray padding-bottom-3x">
    <div class="container">
        <div class="product-info padding-top-2x text-center">
            <h1 class="h2 space-bottom-half">{{$item['ptitle']}}</h1>
            <h2>${{$item['price']}}.00</h2>
            <p class="text-sm text-gray">{!!$item['particle']!!}</p>
            <div class="product-meta">
                <div class="product-category">
                    <strong>{{$categories['0']['ctitle']}}</strong>
                    <a href="#"></a>
                </div>
                <span class="product-rating text-warning">
                    <i class="material-icons star"></i>
                    <i class="material-icons star"></i>
                    <i class="material-icons star"></i>
                    <i class="material-icons star"></i>
                    <i class="material-icons star_border"></i>
                </span>
            </div><!-- .product-meta -->
            <div class="product-tools shop-item">
                <h4>Go Back to :</h4>
                <a href="{{url('shop/all')}}">All </a></li>
                @foreach ($categories as $category)
                <p><a href="{{url('shop/'.$category['curl'])}}">{{$category['ctitle']}}</a></p>
                @endforeach
            </div><!-- .form-element -->
            @if(!Cart::get($item['id']))
            <button data-id="{{$item['id']}}" id="cart" class="add-to-cart add-to-cart-btn" type="button"> <em>Add
                    to cart</em> </button>
            @else
            <button data-id="{{$item['id']}}" id="cart" class="add-to-cart" type="button" disabled="disabled"> <em>I'm In
                    cart</em> </button>
            @endif
            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF"
                    stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
            </svg>
            </a><!-- .add-to-cart -->
        </div><!-- .product-tools -->

    </div><!-- .product-info -->
    </div><!-- .container -->
</section><!-- .fw-section.bg-gray -->
<!-- Product Tabs -->

@endsection
