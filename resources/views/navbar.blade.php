<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<body>
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div id="flipkart-navbar">
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <a href="home1"><img alt="KasetWMS Logo" src="{{url('img/head.jpg')}}"></a>
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
</div> -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
        
        <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="{{url('/home1')}}">หน้าแรก</a></li>
                @if (Auth::user()->name=="หทัยชนก อินทนิน")
                <li class="upper-links"><a class="links" href="{{url('/products')}}">คลังสินค้า</a></li>
                @endif
                <li class="upper-links dropdown"><a class="links">หมวดสินค้า</a>
                <ul class="dropdown-menu">
                        <li class="profile-li"><a class="profile-links" href="http://yazilife.com/">ผัก</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://hacksociety.tech/">ผลไม้</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">พืชไร่</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">ของแห้ง</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">ของดอง</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">ของชำ</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">สินค้าแปรรูป</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">สินค้าทั่วไป</a></li>
                    </ul>
                </li>
                <li class="upper-links"><a class="links" href="{{url('#')}}">บทความ</a></li>
                <li class="upper-links"><a class="links" href="{{url('#')}}">กระดาน ถาม-ตอบ</a></li>
                
                <!-- <li class="upper-links">
                    <a class="links" href="http://clashhacks.in/">
                        <svg class="" width="16px" height="12px" style="overflow: visible;">
                            <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
                        </svg>
                    </a>
                </li> -->
          <li class="upper-links dropdown"><a class="links"><span class="glyphicon glyphicon-user col-sm-2"></span>&nbsp;{{ Auth::user()->name }}</a>
          @if (Auth::guest())
                <li class="upper-links"><a class="links" href="{{url('/alogin')}}">ลงชื่อเข้าใช้</a></li>
                <li class="upper-links"><a class="links" href="{{url('/aregister')}}">สมัครสมาชิก</a></li>
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
        </li>
         
          </div>
          <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Brand</span></h2>
                <h1 style="margin:0px;"><span class="largenav"></span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">
                    <input class="flipkart-navbar-input col-xs-11" type="" placeholder="ค้นหาสินค้าหรือหมวดหมู่สินค้า" name="">
                    <button class="flipkart-navbar-button col-xs-1">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="cart largenav col-sm-2">
                <a class="cart-button">
                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                    </svg> ตระกร้า
                    <span class="item-number ">0</span>
                </a>
            </div>
        </div>
    </div>
</div>
       
      </div>
</div>


<!--
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="{{url('/home1')}}">หน้าแรก</a></li>
                <li class="upper-links"><a class="links" href="{{url('/products')}}">คลังสินค้า</a></li>
                <li class="upper-links"><a class="links" href="{{url('#')}}">บทความ</a></li>
                <li class="upper-links"><a class="links" href="{{url('#')}}">กระดาน ถาม-ตอบ</a></li>
                <li class="upper-links"><a class="links" href="{{url('/login')}}">ลงชื่อเข้าใช้</a></li>
                <li class="upper-links"><a class="links" href="{{url('/register')}}">สมัครสมาชิก</a></li> 
                <li class="upper-links dropdown"><a class="links">เลือกซื้อสินค้า</a>
                    <ul class="dropdown-menu">
                        <li class="profile-li"><a class="profile-links" href="http://yazilife.com/">ผัก</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://hacksociety.tech/">ผลไม้</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">พืชไร่</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">ของแห้ง</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">ของดอง</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">ของชำ</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">สินค้าแปรรูป</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">สินค้าทั่วไป</a></li>
                    </ul>
                </li>
                <li class="upper-links">
                    <a class="links" href="http://clashhacks.in/">
                        <svg class="" width="16px" height="12px" style="overflow: visible;">
                            <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Brand</span></h2>
                <h1 style="margin:0px;"><span class="largenav"></span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">
                    <input class="flipkart-navbar-input col-xs-11" type="" placeholder="ค้นหาสินค้าหรือหมวดหมู่" name="">
                    <button class="flipkart-navbar-button col-xs-1">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="cart largenav col-sm-2">
                <a class="cart-button">
                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                    </svg> ตระกร้า
                    <span class="item-number ">0</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
        <span class="sidenav-heading">Home</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a> 
-->
</body>
</html>