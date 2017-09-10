<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <a href="/home1"><img class="img-responsive" alt="KasetWMS Logo" src="/img/head.jpg"></a>
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