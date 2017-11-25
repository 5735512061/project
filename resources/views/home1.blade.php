<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>KASET FARM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="/css/filter.css">
    <link rel="stylesheet" type="text/css" href="/css/picture.css">
    <script src="/test.js" type="text/javascript"></script>
</head>
<body>


<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div class="navbar-fixed-top">
<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="{{url('/home1')}}"><span class="glyphicon glyphicon-home"></span> หน้าแรก</a></li>
                <li class="upper-links dropdown"><a class="links"><span class="glyphicon glyphicon-th-list"></span> หมวดสินค้า</a>
                <ul class="dropdown-menu">
                        <li class="profile-li"><a class="profile-links" href="{{url('/vegetable')}}">ผัก</a></li>
                        <li class="profile-li"><a class="profile-links" href="{{url('/fruit')}}">ผลไม้</a></li>
                        <li class="profile-li"><a class="profile-links" href="{{url('/plant')}}">พืชไร่</a></li>
                        <li class="profile-li"><a class="profile-links" href="{{url('/dried_food')}}">ของแห้ง</a></li>
                        <li class="profile-li"><a class="profile-links" href="{{url('/product_general')}}">สินค้าทั่วไป</a></li>
                </ul>
                </li>
                @if (!Auth::guest()&&Auth::user()->name=="หทัยชนก อินทนิน")
                <li class="upper-links"><a class="links" href="{{url('/products')}}"><span class="glyphicon glyphicon-inbox"></span> คลังสินค้า</a></li>
                @endif
                @if (!Auth::guest()&&Auth::user()->name=="หทัยชนก อินทนิน")
                <li class="upper-links dropdown"><a class="links"><span class="glyphicon glyphicon-list-alt"></span> รายการสินค้า</a>
                <ul class="dropdown-menu">
                        <li class="profile-li"><a class="profile-links" href="{{url('/bestseller')}}">สินค้าขายดี</a></li>
                        <li class="profile-li"><a class="profile-links" href="{{url('/out_of_stock')}}">สินค้าใกล้หมดคลัง <span class="badge">6</span></a></li>
                        <li class="profile-li"><a class="profile-links" href="{{url('/exp')}}">สินค้าใกล้หมดอายุ <span class="badge">20</span></a></li>
                        <li class="profile-li"><a class="profile-links" href="{{url('/balance')}}">สินค้าคงเหลือ</a></li>
                    </ul>
                </li>
                @endif
                @if (!Auth::guest()&&Auth::user()->name!=="หทัยชนก อินทนิน")
                    <li class="upper-links"><a class="links" href="">ประวัติการสั่งซื้อ</a></li>
                @endif
          @if (Auth::guest())
                <li class="upper-links"><a class="links" href="{{url('/login')}}">ลงชื่อเข้าใช้</a></li>
                <li class="upper-links"><a class="links" href="{{url('/register')}}">สมัครสมาชิก</a></li>
          @else
                            <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-user">
                                </span>&nbsp;
                            {{ Auth::user()->name }}&nbsp;<span class="caret"></span>
                            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="{{url('data')}}"><span class="glyphicon glyphicon-user"></span> บัญชีผู้ใช้</a></li>
              <li><a href="{{url('change-password')}}"><span class="glyphicon glyphicon-cog"></span> เปลี่ยนรหัสผ่าน</a></li>
              <li role="separator" class="divider"></li>
              <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> 
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
            </ul>
            </div>



                
            @endif 
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Menu</span></h2>
                <a href="{{url('/home1')}}"><img src="{{url('/img/logo.png')}}" width="105%"></a>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">
                <form action="{{url('/products')}}" method="post" accept-charset="utf-8">
               {{csrf_field()}}
                   <input class="flipkart-navbar-input col-xs-11" type="text" placeholder="ค้นหาสินค้าหรือหมวดหมู่สินค้า" name="name">
                    <button class="flipkart-navbar-button col-xs-1" type="submit">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </form>
                </div>
            </div>
            @if (Auth::guest())
            <div class="cart largenav col-sm-2">
                <a class="cart-button" href="{{url('/cart')}}">
                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                    </svg> ตะกร้า
                    <span class="item-number ">0</span>
                </a>
            </div>
            @else
            <div class="cart largenav col-sm-2">
                <a class="cart-button" href="{{url('/cart')}}">
                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                    </svg> ตะกร้า
                    <span class="item-number ">{{ session('countCart') }}</span>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
        <span class="sidenav-heading">Menu</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <a class="links" href="{{url('/home1')}}">หน้าแรก</a>
    @if (!Auth::guest()&&Auth::user()->name=="หทัยชนก อินทนิน")
    <a class="links" href="{{url('/products')}}">คลังสินค้า</a>
    @endif
</div>
<br><br><br><br><br><br><br><br>
<div class="container">
    <div class="row" align="center">
        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all">สินค้าทั้งหมด</button>
            <button class="btn btn-default filter-button" data-filter="hdpe">ผัก</button>
            <button class="btn btn-default filter-button" data-filter="sprinkle">ผลไม้</button>
            <button class="btn btn-default filter-button" data-filter="spray">พืชไร่</button>
            <button class="btn btn-default filter-button" data-filter="irrigation">ของแห้ง</button>
            <button class="btn btn-default filter-button" data-filter="irrigation1">สินค้าทั่วไป</button>
        </div>
    </div>
</div>
        <br/>
<div class="container">
    <div class="row" align="center">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter hdpe">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/cucumber.jpg')}}" width = "100%" >
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter hdpe">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/asparagus.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter hdpe">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/mushroom.jpg')}}" width = "100%">
                </div>
               
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter hdpe">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/onion.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter hdpe">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/ginger.jpg')}}" width = "100%">
                </div>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter hdpe">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/cabbage.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter hdpe">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/ves.jpg')}}" width = "100%">
                </div>
               
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter sprinkle">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/western.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter spray">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/corn.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter spray">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/soya.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter spray">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/peanut.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter spray">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/pumpkin.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter spray">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/yam.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter irrigation">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/garlic.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter irrigation">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/driedchilli.jpg')}}" width = "100%">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 filter irrigation">
            <div class="boxes">
                <div class="img-upper">
                    <img class="img-responsive" src="{{url('img/shallots.jpg')}}" width = "100%">
                </div>
            </div>
        </div>

</div>
</div>        
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/navbar.js') }}"></script>
    <script src="{{ asset('/js/filter.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>

