<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" media="screen">
    <title>Admin Panel</title>
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-light flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{url('cms/orders')}}">Admin Panel</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" target="_blank" href="{{url('/')}}">Back to site</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{url('user/logout')}}">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar" >
                <div class="sidebar-sticky ">
                    <ul class="nav flex-column text-monospace h6 mt-5">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('cms/dashboard')}}">
                                <span data-feather="home"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/orders')}}">
                                <span data-feather="file"></span>
                                <i class="fas fa-shipping-fast"></i> Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/menu')}}">
                                <span data-feather="file"></span>
                                <i class="fas fa-bars"></i>  Menus
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/content')}}">
                                <span data-feather="file"></span>
                                <i class="fas fa-file-alt"></i> Content
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/categories')}}">
                                <span data-feather="file"></span>
                                <i class="fas fa-hand-pointer"></i> Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/products')}}">
                                <span data-feather="file"></span>
                                <i class="fas fa-shopping-bag"></i> Products
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
@yield('main_cms')
        </div>
    </div>
    @include('include.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

    <script>
        $('#article').summernote({
          height: 300;
          
        });
      </script>
</body>

</html>
