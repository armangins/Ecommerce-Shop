@extends('master')
@section('main');
<section class="container-fluid padding-top-3x padding-bottom-3x">
    <!-- Sidebar Toggle / visible only on mobile -->
    <div class="sidebar-toggle">
        <i class="material-icons filter_list"></i>
    </div>
    <h1 class="space-top-half">Full-Shop</h1>
    <div class="row padding-top">

        <!-- Sidebar (Filters) -->
        <div class="col-lg-2 col-md-3 col-sm-4">
            <aside class="sidebar">
                <span class="sidebar-close"><i class="material-icons close"></i></span>
                <div class="widgets">
                    <!-- Categories Widget -->
                    <div class="widget widget-categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <li  class="active"><a href="{{url('shop/all')}}">All @if($total){{$total}}@endif</a></li>
                            @foreach ($categories as $category)
                            <li class="active my-li"><a href="{{url('shop/'.$category['curl'])}}">{{$category['ctitle']}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- .widget.widget-categories -->
                    <!-- Sorting Widget -->
                    <div class="widget widget-price">
                        <h3 class="widget-title">Price Filter</h3>
                        <ul>
                         
                            <li class="active"><a href="{{Request::url().'?order=ASC'}}">Low to High</a></li>
                            <li><a href="{{Request::url().'?order=DESC'}}">High to low</a></li>
                        </ul>
                    </div>
                    <!-- .widget.widget-price -->
                </div>
                <!-- .widgets -->
            </aside>
            <!-- .sidebar -->
        </div>
        <!-- .col-md-3.col-sm-4 -->

        <!-- Products Grid -->
        <div class="col-lg-10 col-md-9 col-sm-8">
            <!-- Shop Bar -->
            <div class="shop-bar">

                {{-- <div class="column">
                    <form method="get" autocomplete="off" action="{{ action('ShopController@autocomplete') }}" class="search-box">
                        <input type="text" class="form-control " name="search" id="search" placeholder="Search shop">
                        <div style="border:1px solid balck !important;" id="res">

                        </div>
                        <button name="test" type="submit">
                            <i class="material-icons search"></i>
                        </button>
                    </form>
                    <!-- form.search-box -->
                </div> --}}
                <!-- .column -->
            </div>
            <!-- .shop-bar -->
            <div class="row">
                {{-- iteration on products from database --}}
                @foreach ($products as $item)
                <!-- Item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-thumbnail">
                            @if($item->onsale)
                            <span class="shop-label text-danger">Sale</span>
                            @endif
                            
                            {{-- <a href="{{url('shop/'.$item->curl.'/'.$item->purl)}}" class="item-link"></a> --}}
                            <a href="{{asset('Images/products/' .$item->pimage)}}" data-lightbox="image-1" data-title="{{$item->ptitle}}">
                                <img src="{{asset('Images/products/' .$item->pimage)}}" alt="Shop item"></a>
                          
                            <div class="shop-item-tools">
                                <a href="{{url('shop/'.$item->curl.'/'.$item->purl)}}" class="add-to-whishlist"
                                    data-toggle="tooltip" data-placement="top" title="More info">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                {{-- show in cart/add to cart --}}
                                @if(!Cart::get($item->id))
                                <a data-id="{{$item->id}}" href="#" class="add-to-cart add-to-cart-btn">
                                    <em>Add to cart</em>
                                    <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10"
                                            d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                    </svg>
                                </a>
                                @else
                                <a class="add-to-cart text-white">
                                    <em>I'm In cart</em>
                                </a>
                                @endif
                                {{-- show in cart/add to cart --}}
                            </div>
                        </div>
                        <div class="shop-item-details">
                            <h3 class="shop-item-title"><a href="#">{!! $item->ptitle !!}</a></h3>

                            <span class="shop-item-price">
                                <span class="old-price">${!!$item->price /0.5!!}.00</span>
                                ${{$item->price}}.00
                            </span>
                        </div>
                    </div>
                    <!-- .shop-item -->
                </div>
                <!-- .col-md-4.col-sm-6 -->
                @endforeach
                {{-- iteration on products from database --}}
            </div>
            <!-- .row -->
            <hr>
            <div class="pagination padding-bottom">
                <div class="page-numbers">
                     {{ $products->appends(request()->query())->links("pagination::default")}} 
               
                </div>
               
              </div>
            </div><!-- .col-md-9 col-sm-8 -->
 
   
        </div>
    </div><!-- .col-md-9 col-sm-8 -->
    </div><!-- .row -->
</section><!-- .container -->
@endsection
