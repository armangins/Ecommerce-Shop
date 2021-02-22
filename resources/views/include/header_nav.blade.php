<header class="navbar navbar-sticky">
    <!-- Site Logo -->
    <a href="{{url('/')}}" class="site-logo visible-desktop">
        <span>O</span> C
        <span class="text-gray">U</span>
        LUS <span></span>
    </a>
    <!-- site-logo.visible-desktop -->
    <a href="{{url('/')}}" class="site-logo visible-mobile">
        <span>[</span> M <span>]</span>
    </a><!-- site-logo.visible-mobile -->
    <!-- Main Navigation -->
    <!-- Control the position of navigation via modifier classes: "text-left, text-center, text-right" -->
    <nav class="main-navigation text-center">
        <ul class="menu">
            <li class="menu-item-has-children current-menu-item">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('shop/all')}}">Shop</a></li>
            <li><a href="{{url('shop/cart')}}">Shopping Cart</a></li>
            </li>
            <li class="menu-item-has-children">
                <a href="#"> User</a>
                <ul class="sub-menu">
                    {{-- show/not show CMS link --}}
                    @if((Session::has('admin')))
                    <li><a href="{{url('cms/dashboard')}}">Admin-Panel</a></li>
                    @endif
                    {{-- show/not show CMS link --}}
                    {{-- show LOgin/Log-out --}}
                    @if(Session::has('id'))
                    <li><a href="{{url('user/logout')}}">Log-out</a></li>
                    @else
                    <li><a href="{{url('user/login')}}">Login</a></li>
                    <li><a href="{{url('user/register')}}">Register</a></li>
                    @endif
                    {{-- show LOgin/Log-out --}}
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="#">Pages</a>
                <ul class="sub-menu">
                    @foreach ($menu as $link)
                    <li><a href="{{url($link['url'])}}">{{$link['link']}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <!-- .menu -->
    </nav>
    <!-- .main-navigation -->
    <!-- Toolbar -->
    <div class="toolbar">
        <div class="inner">
            <p style="padding:0px; margin-top:32px">

                {{-- show/hide user name --}}
                @if (Session::has('id'))
                {{Session::get('name')}}
                @endif</p>
            {{-- show/hide user name --}}

            <a href="#" class="mobile-menu-toggle"> <i class="material-icons menu"></i></a>
            <a href="#"> <i class="material-icons person"></i>
            </a>
            <div class="cart-btn">
                <a href="{{url('shop/cart')}}">
                    <i>
                        <span class="material-icons shopping_basket"></span>
                        {{-- show the count icon if cart not empty --}}
                        @if (!Cart::isEmpty())
                        <span class="count">
                            {{Cart::getTotalQuantity()}}
                        </span>
                        @endif
                        {{-- show the count icon if cart not empty --}}
                    </i>
                </a>
                <!-- Cart Dropdown -->
                {{-- show/hide the cart drop down --}}
                @if (!Cart::isEmpty())
                @foreach (Cart::getContent()->toArray() as $product)
                <div class="cart-dropdown">
                    <div class="cart-item">
                        <a href="{{url('shop/cart')}}" class="item-thumb">
                            <img src="{{asset('Images/products/'.$product['attributes']['image'])}}" alt="Item">
                        </a>
                        <div class="item-details">
                            <h3 class="item-title">{{$product['name']}}</h3>
                            <h4 class="item-price"> x {{$product['quantity']}} ${{$product['price']}}</h4>
                        </div>
                        <a type="button" href="{{url('shop/remove-item-drop?pid='.$product['id'])}}" class="close-btn">
                            <i class="material-icons close"></i>
                        </a>
                    </div>
                    <!-- .cart-item -->
                    @endforeach
                    <div class="cart-subtotal">
                        <div class="column">
                            <span> Total :{{Cart::getTotal()}}$</span>
                        </div>
                        <div class="column">
                            <span class="amount"> Total in cart :{{Cart::getContent()->count()}}</span>
                        </div>
                    </div>
                </div>
                <!-- .cart-dropdown -->
                @endif
                {{-- show/hide the cart drop down --}}
            </div>
            <!-- .cart-btn -->
        </div>
        <!-- .inner -->
    </div>
    <!-- .toolbar -->
</header>
<!-- .navbar.navbar-sticky -->
