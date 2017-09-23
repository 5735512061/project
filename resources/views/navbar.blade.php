<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <a href="home1"><img alt="KasetWMS Logo" src="img/head.jpg"></a>
        </div>
        <ul class="nav navbar-nav">
          <li>
            <a href="{{url('/home1')}}">หน้าแรก</a>
          </li>
          @if (!Auth::guest())
           <li>
            <a href="{{url('/product')}}">คลังสินค้า</a>
          </li>
          @endif
           <li>
            <a href="{{url('#')}}">บทความ</a>
          </li>
           <li>
            <a href="{{url('#')}}">กระดานถาม-ตอบ</a>
          </li>
        </ul>
        <div class="col-sm-6 col-md-3">
            <ul class="nav navbar-nav">
              <li>
              <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </form>
              </li>
            </ul>
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
</body>
</html>