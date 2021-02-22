<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{-- Generic Page-Title --}}
    <title>@if (!empty($pageTitle))
        {{ $pageTitle}}
        @endif</title>
    {{-- Generic Page-Title --}}
    <!--SEO Meta Tags-->
    <meta name="description" content="A Demo shop just for portfolio" />
    <meta name="keywords" content="shop, e-commerce, modern, minimalist style, responsive, online store, business, mobile, blog, bootstrap, html5, css3, jquery, js, gallery, slider, touch, creative, clean" />
    <meta name="author" content="Arman" />
    <!--Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--Favicon-->
    @include('include.header_css')
    <!-- Modernizr -->
    <script src="{{asset('library/MD-shop/js/vendor/modernizr.custom.js')}}"></script>
</head>
{{-- base url for ajax --}}
<script>
    var BASE_URL = "{{url('')}}/"
</script>
{{-- base url for ajax --}}
<!-- Body -->
<body>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        @include('include.header_nav')
        @yield('main')
        @include('include.footer')
    </div><!-- .page-wrapper -->
    @include('include.js')
</body><!-- <body> -->
</html>
