<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="/images/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icon/favicon-16x16.png">
    <link rel="manifest" href="/images/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="@yield('class')">
        <div class="flex-center position-ref full-height">
             <div class="header">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                  <div class="head-container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <div class="welcome-msg">
                          @php 
                          $dateTime = new DateTime('now', new DateTimeZone('Pacific/Auckland'));
                            echo "<span class='date'>".$dateTime->format("d F Y")."</span>"; 
                            echo "<span class='time'>".$dateTime->format("g:i A")."</span>";
                          @endphp 
                          @if (Auth::check())
                          <span class="points"> 
                            @foreach($members as $member)
                                @if ($member->id == Auth::user()->id)   
                                    @php $sum = 0; @endphp
                                    @foreach($coupons as $coupon)
                                        @if ($coupon->member_id == $member->id && $coupon->project_id == Null)
                                            @php $sum+= $coupon->denomination; @endphp
                                        @endif
                                    @endforeach 
                                    @php echo number_format($sum)." Available"; //Display total available coupons @endphp 
                                @endif
                            @endforeach <br/>     
                          </span>
                         @endif
                          {{-- Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} --}}
                        </div>
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><div class="logo"></div></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li><a href="#" class="home">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        @if (Route::has('login'))
                          @if (Auth::check())
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dashboard</a><span class="caret"></span>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/home') }}">Member Page</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                              </ul>
                            </li> 
                          @else
                            <li><a href="#" class="login">Login</a></li>
                            <li><a href="#" class="register">Register</a></li>
                          @endif
                        @endif
                      </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                  </div>
                <!-- /.container -->
              </nav>
            </div>
             <div class="widget-content">
                  @yield('content')
             </div>

        </div>

    <div class="bottom-content">
         <div class="content">
              <ul class="footer-list">
                  <li class="parent"><a href="#">Home</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Register Here</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                    </ul>
              </ul>

              <ul class="footer-list">
                  <li class="parent"><a href="#">About</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Register Here</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                    </ul>
              </ul>

              <ul class="footer-list">
                  <li class="parent"><a href="#">Members</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Register Here</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                    </ul>
              </ul>

               <ul class="footer-list">
                  <li class="parent"><a href="#">Merchants</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Register Here</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                     <li class="child-list"><a href="#">Register Here</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                    </ul>
              </ul>

              <ul class="footer-list">
                  <li class="parent"><a href="#">Recipients</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Register Here</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                    </ul>
              </ul>

              <ul class="footer-list">
                  <li class="parent"><a href="#">Contact</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Register Here</a></li>
                    </ul>
              </ul>

              <ul class="footer-list">
                  <li class="parent"><a href="#">My Tree Nursery</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Login</a></li>
                     <li class="child-list"><a href="#">Find Out More</a></li>
                    </ul>
              </ul>

              <ul class="footer-list">
                  <li class="parent"><a href="#">Login</a></li>
                    <ul class="inner-list">
                     <li class="child-list"><a href="#">Register Here</a></li>
                     <li class="child-list"><a href="#">Login</a></li>
                    </ul>
              </ul>
                
            </div>
        </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/loadpage.js"></script>
    @yield('script')
</body>
</html>
