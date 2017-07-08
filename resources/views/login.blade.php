<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap/paper/bootstrap.min.css">
    <style>
        body { padding-top: 100px; }
        .btn { text-transform: capitalize; }
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
                <li><a href="{{ URL::to('/') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>

        </div>
    </nav>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <form action="{{ URL::to('/') }}/auth/login" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="InputEmail" placeholder="E-Mail Address" value="kralcs@gmail.com">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password" value="123456">
                    </div>
                    <button type="submit" class="btn btn-default btn-block">Login</button>
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

<script type="text/javascript">
    function closealert() {
        document.getElementById("closealert").style.display="none";
    }
</script>

</body>
</html>
