<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Quản trị KienMovie</title>
    <link rel="shortcut icon"
          href="https://cdn.vietnambiz.vn/171464876016439296/2020/7/16/image016-450x450-15948916952371476858384.png"
          type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #555555;
            color: #ffffff;
        }
        .sidebar {
            background-color: #181818;
            color: #ffffff;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #e50914;
        }
        .sidebar .nav-item {
            margin-bottom: 10px;
        }
        .dropdown-menu a {
            color: black !important;
        }
        .content {
            padding: 20px;
        }
        .header {
            background-color: #e50914;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
        }
        .nav-link.active {
            background-color: #e50914;
            color: white !important;
        }
        .btn-primary {
            background-color: #e50914;
            border-color: #e50914;
        }
        .btn-primary:hover {
            background-color: #bf0411;
            border-color: #bf0411;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}/themes/web phim/public/angular.js"></script>
</head>

<body ng-app="myApp" ng-controller="myCtrl">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid header">
        <a class="navbar-brand" href="#">KienMovie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-3 sidebar">
            <div class="container mt-3">
                <h2>Menu</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.movies.index')}}">Phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.catelogues.index')}}">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.catelogues.index')}}">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.catelogue-posts.index')}}">Danh mục bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.payments.index')}}">Lịch sử nạp xu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.bills.index')}}">Hóa đơn mua phim</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                Tài khoản
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.admins.index')}}">Admin</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.members.index')}}">Member</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="col-9 content" ng-controller="viewCtrl">
            @yield('content')
        </div>
    </div>
</div>

<script>
    var myApp = angular.module('myApp',[])
    myApp.controller('myCtrl',function ($scope,$http){

    })
    var viewFunction = ($scope)=>{

    }
</script>
@yield('js')
<script>
    myApp.controller('viewCtrl',viewFunction)
</script>
</body>

</html>
