@extends('master')
@section('main')
<!-- Container -->
<section class="container padding-top-3x padding-bottom">
    <h1 class="space-top-half">Shopping Cart</h1>
    <div class="row padding-top">
        <!-- Cart -->
        <div class="col-sm-8 padding-bottom-2x">
            <p class="text-sm">
                <span class="text-gray">Currently</span> {{Cart::getTotalQuantity()}} items
                <span class="text-gray"> in cart</span>
            </p>
            <div class="shopping-cart">
                <!-- Item -->
                @if (!Cart::isEmpty())
                @foreach ($cart as $item)
                <div class="item">
                    <a class="item-thumb">
                        <img src="{{asset('Images/products/'.$item['attributes']['image'])}}" alt="Item">
                    </a>
                    <div class="item-details">
                        <h3 class="item-title"><a href="shop-single.html">{{$item['name']}}</a></h3>
                        <h4 class="item-price">{{$item['price']}}$</h4>
                        <div class="count-input">
                            <a data-id="{{$item['id']}}" class="incr-btn" data-action="decrease" href="{{url('shop/update-cart?pid=' .$item['id'].'&act=min')}}">–</a>
                            <input class="quantity" type="text" value="{{$item['quantity']}}">
                            <a data-id="{{$item['id']}}" class="incr-btn" data-action="increase" href="{{url('shop/update-cart?pid=' .$item['id'].'&act=plus')}}">+</a>
                        </div>
                    </div>
                    <a href="{{url('shop/remove-item?pid='.$item['id'])}}" class="item-remove" data-toggle="tooltip"
                        data-placement="top" title="Remove">
                        <i class="material-icons remove_shopping_cart"></i>
                    </a>
                </div><!-- .item -->
                @endforeach
                @else
                <div class="item">
                    <a href="shop-single.html" class="item-thumb">
                    </a>
                    <div class="item-details">
                        <h3 class="item-title"><p href="shop-single.html">You dont have any products</p></h3>
                        <h4 class="item-price"></h4>
                    </div>
                </div>
                <!-- .item -->
                @endif
            </div>
            <!-- .shopping-cart -->
            <!-- Coupon -->
        </div><!-- .col-sm-8 -->
        @if (! Cart::isEmpty())
        <div class="col-md-3 col-md-offset-1 col-sm-4 padding-bottom-2x">
            <aside>
                <h3 class="toolbar-title">Cart subtotal:</h3>
                <h4 class="amount">{{Cart::getTotal()}}$</h4>
                <p class="text-sm text-gray">* Note: This amount does not include costs for international shipping. You
                    will be able to calculate shipping costs on checkout.</p>
                <a data-id href="{{url('shop/clear-cart')}}" class="btn btn-default btn-block waves-effect waves-light">Clear
                    cart</a>
                <a href="{{url('shop/order')}}" class="btn btn-primary btn-block waves-effect waves-light space-top-none">Order
                    products</a>
                <a href="{{url('shop/all')}}" class="btn btn-primary btn-block waves-effect waves-light space-top-none">Back
                    to shop</a>
            </aside>
        </div><!-- .col-md-3.col-sm-->
        @else
        <aside>
            <h3 class="toolbar-title">Cart subtotal:0</h3>
            <h4 class="amount">$0</h4>
            <p class="text-sm text-gray">* Note: Your cart is empty please add products to see them in your cart.</p>
        </aside>
        <a href="{{url('shop/all')}}" class="btn btn-primary btn-block waves-effect waves-light space-top-none">Go
            to shop</a>
        <div class="col-md-3 col-md-offset-1 col-sm-4 padding-bottom-2x">
        </div>
        @endif
    </div><!-- .row -->
</section><!-- .container -->
@endsection
