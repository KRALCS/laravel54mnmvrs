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
            <li class="active"><a href="{{ URL::to('/vechile?token=') }}{{Request::get('token') }}"><span class="glyphicon glyphicon-list"></span> Vechiles</a></li>
            <li><a href="{{ URL::to('/') }}/auth/logout?token={{Request::get('token') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">


    <div ng-controller="vechilesController">
        <ol class="breadcrumb">
            <li>Vechiles</li>
            <li class="active">Add Vechile</li>
        </ol>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                    <form action="{{ URL::to('/') }}/vechiles" method="post">
                        <input type="hidden" name="token" value="{{ Request::get('token') }}">
                        <div class="form-group">
                            <input type="text" name="plate" class="form-control" id="plate" placeholder="Plate" ng-model="vechile.plate" ng-required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nickname" ng-model="vechile.nickname" ng-required="true">
                        </div>
                        <div class="form-group">
                            <select id="brands_id" name="brands_id" class="form-control" ng-model="vechile.brands_id" ng-options="brand.id as brand.name for brand in brands">
                                <option value="">Brands</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="models_id" name="models_id" class="form-control" ng-model="vechile.models_id" ng-options="model.id as model.name for model in models">
                                <option value="">Models</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="modelyear" class="form-control" id="modelyear" placeholder="Model Year" ng-model="vechile.modelyear" ng-required="true">
                        </div>
                        <div class="form-group">
                            <select id="colors_id" name="vtypes_id" class="form-control" ng-model="vechile.vtypes_id" ng-options="vtype.id as vtype.name for vtype in vtypes">
                                <option value="">Vechile Types</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="colors_id" name="colors_id" class="form-control" ng-model="vechile.colors_id" ng-options="color.id as color.name for color in colors">
                                <option value="">Colors</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label class="radio-inline"><input type="radio" name="status" ng-model="vechile.status" value="1" ng-checked="true">Active</label>
                                <label class="radio-inline"><input type="radio" name="status" ng-model="vechile.status" value="0">Passive</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-block"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        <br/>
                        @if(isset($error))
                            <div class="alert alert-dismissible alert-danger" id="closealert">
                                <button type="button" class="close" onclick="closealert()" data-dismiss="alert">&times;</button>
                                {{ $error }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>



    <!-- Load Javascript Libraries (AngularJS, Bootstrap) -->
<script src="{{ URL::to('/') }}/app/angular-1.5.9/angular.min.js"></script>


<!-- AngularJS Application Scripts -->
<script src="{{ URL::to('/') }}/app/app.js"></script>
<script src="{{ URL::to('/') }}/app/controllers/vechiles.js"></script>
<script type="text/javascript">
    function closealert() {
        document.getElementById("closealert").style.display="none";
    }
</script>

</body>
</html>