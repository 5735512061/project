<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-nav.css"/>   
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-reg.css"/>   
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/full-slider.css" rel="stylesheet">

</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand">Kaset-Warehouse</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav navbar-right">
                 <!--  <li><a href="login"><span class="glyphicon glyphicon-log-in"></span>  LOGIN</a></li> -->
                <li >
                    <a id="login-button"  class="login-button"  role="button" data-toggle="modal" data-target="#login-modal" data-backdrop="static" data-controls-modal="login-modal" >  เข้าสู่ระบบ</a>
                </li>
                  <li >
                    <a id="login-button"  class="login-button"  role="button" data-toggle="modal" data-target="#login-modal" data-backdrop="static" data-controls-modal="login-modal" >  ลงทะเบียน</a>
                </li>
            </ul>

        </div>
    </nav>
</header>

    <div class="modal fade loginpopup index" id="login-modal"   tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog login-form animated">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
            <div class="modal-body">
                <form  name="loginform" role="form" action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                    <div id="my-tab-content" class="tab-content">
                        
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                            <label for="email">E-Mail Address</label>
    
                                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                        <span class="has-error" ng-show="loginform.email.$touched && loginform.email.$invalid" class="font-ten"></span>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required >
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                            <center><div class="form-group login-index" style="margin-bottom:0px;padding-top:0px !important">
                                <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>        Rememer Me </label>
                                
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    เข้าสู่ระบบ
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ลืมรหัสผ่าน ?
                                </a>
                            </div>
                            </center>
                        </div>
                        </div>

                    </div>
                </form>
 
            </div>
            </div>
        </div>
    </div>
    

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url(img/back3.png);"></div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url(img/back4.png);"></div>
            </div>
            <!-- <div class="item"> -->
                <!-- Set the second background image using inline CSS below. -->
                <!-- <div class="fill" style="background-image:url(img/back3.png);"></div>
            </div> -->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <!-- Page Content -->
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

</body>

</html>
