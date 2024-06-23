<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | KienMovie</title>
    <link rel="shortcut icon" href="https://cdn.vietnambiz.vn/171464876016439296/2020/7/16/image016-450x450-15948916952371476858384.png" type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">
    <script src="{{asset('/')}}/themes/web phim/public/font-fontawesome-ae333ffef2.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}/themes/web phim/public/style.css">
    <script src="{{asset('/')}}/themes/web phim/public/angular.js"></script>
    @yield('css')
</head>

<body ng-app="myApp" ng-controller="myCtrl">
<header id="trangchu">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top  shadow fw-bold" style="backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">KienMovie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left: 10px;">

                    @if(Route::CurrentRouteName() == "home")
                        <li class="nav-item">
                            <a class="nav-link" href="#phimmoithem">Phim mới thêm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#phimle">Phim lẻ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#phimbo">Phim bộ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tv">TV Shows</a>
                        </li>
                    @endif

                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('search')}}">
                            <button class="btn btn-outline-light"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('favourite')}}">
                            <button class="btn btn-outline-danger"><i class="fa-regular fa-heart"></i></button>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<div style="min-height: calc(100vh - 190px);margin-top: 90px;" ng-controller="viewCtrl">
    @yield('content')
</div>
    <footer class="text-center" >
        <p>© 2024 KienMovie. All Rights Reserved.</p>
    </footer>

<script>
    var myApp = angular.module('myApp',[])
    myApp.controller('myCtrl',function ($http,$scope){

    })

    var viewFunction = function ($scope){

    }
</script>
@yield('js')
<script>
    myApp.controller('viewCtrl',viewFunction)
</script>
</body>

</html>

