<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">
    <script src="{{asset('/')}}/themes/web phim/public/font-fontawesome-ae333ffef2.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}/themes/web phim/public/angular.js"></script>

</head>

<body class="bg-light" ng-app="myApp" ng-controller="myCtrl">
<div class="container">
    <div class="bg-dark" style="height: 100px">
        <h2 class="text-danger text-center">
            Quản trị KienMovie
        </h2>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="container mt-3">
                <h2>Menu</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.movies.index')}}">Phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.catelogues.index')}}">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.payments.index')}}">Lịch sử nạp xu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.bills.index')}}">Hóa đơn mua phim</a>
                    </li>
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            Tài khoản
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('admin.admins.index')}}">Admin</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.members.index')}}">Member</a></li>
                        </ul>
                    </div>

                </ul>
            </div>
        </div>

        <div class="col-9" ng-controller="viewCtrl">
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
