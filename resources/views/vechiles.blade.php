<!DOCTYPE html>
<html lang="tr" ng-app="vechilesapp">
<head>

    <title>MNM Vechile Registration System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap/paper/bootstrap.min.css">
    <style>
        body { padding-top: 100px; }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                MNM Vechile Registration System
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-list"></span> Vechiles</a></li>
            <li><a href="{{ URL::to('/') }}/auth/logout?token={{Request::get('token') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">


    <div ng-controller="vechilesController">
        <ol class="breadcrumb">
            <li class="active">Vechiles</li>
            <li><a href="{{URL::to('/vechileadd?token=')}}{{Request::get('token') }}">Add Vechiles</a></li>
        </ol>
        <input type="hidden" name="token" id="tokenhidden" value="{{Request::get('token')}}">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Plate</th>
                <th>Nickname</th>
                <th>Brands</th>
                <th>Models</th>
                <th>Model Year</th>
                <th>Vechile Types</th>
                <th>Colors</th>
                <th>Status</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="vechile in vechiles">
                <td><% vechile.id %></td>
                <td><% vechile.plate %></td>
                <td><% vechile.nickname %></td>
                <td><% vechile.brands_id %></td>
                <td><% vechile.models_id %></td>
                <td><% vechile.modelyear %></td>
                <td><% vechile.vtypes_id %></td>
                <td><% vechile.colors_id %></td>
                <td><% vechile.status %></td>
                <td>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(vechile.id)"><i class="glyphicon glyphicon-trash"></i> </button>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

</div>



<!-- Load Javascript Libraries (AngularJS, Bootstrap) -->
<script src="{{ URL::to('/') }}/app/angular-1.5.9/angular.min.js"></script>


<!-- AngularJS Application Scripts -->
<script src="{{ URL::to('/') }}/app/app.js"></script>
<script src="{{ URL::to('/') }}/app/controllers/vechiles.js"></script>
</body>
</html>