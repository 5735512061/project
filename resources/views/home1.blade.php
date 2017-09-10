<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>KASET WMS ระบบคลังสินค้าทางการเกษตร </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
      body{
        background-color: #85e085;
      }
    </style>
</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <a href="home1"><img alt="KasetWMS Logo" src="img/head.jpg"></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
          <li>
              <a id="login-button"  class="login-button"  role="button" data-toggle="modal" data-target="#login-modal" data-backdrop="static" data-controls-modal="login-modal" >  เข้าสู่ระบบ</a>
          </li>
          <li >
              <a id="register-button"  class="login-button"  role="button" data-toggle="modal" data-target="#register-modal" data-backdrop="static" data-controls-modal="login-modal" >  ลงทะเบียน</a>
          </li>
          @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user col-sm-2"></span>&nbsp;
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
        </ul>
      </div>
  </nav>

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
                                      <span class="has-error" ng-show="loginform.email.$touched && loginform.email.$invalid" class="font-ten">
                                      </span>
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
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>        Rememer Me 
                      </label></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                    เข้าสู่ระบบ
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ลืมรหัสผ่าน ?
                            </a>
                        </div>
                    </center>
                    </form>
                </div>
              </div>
            </div>
  </div>                  
    

<div class="modal fade loginpopup index" id="register-modal"   tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog login-form animated">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
  </div>            
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <nav class="navbar navbar-default">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="home1">หน้าแรก</a></li>
                            @if (!Auth::guest())
                            <li><a href="product">คลังสินค้า</a></li>
                            @endif
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">บทความ</a></li>
                            <li><a href="#">กระดานถาม-ตอบ</a></li>
                        </ul>
                      </div>
                  </nav>

              </div>

                <div class="panel-body">
                   <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
                  <center><img class="img-responsive" src="img/img.jpg"></center>
                </div>

                <div class="panel-footer">
                    
                        <center>
                            Copyright &copy; 2017 Hathaichanok Inthanin
                       </center>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>