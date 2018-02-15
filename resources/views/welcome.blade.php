<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecopoints</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet">
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
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="background-image:url('images/ecopoints-home-bg.jpg')">
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
            <div class="load-content">
             <!-- Start Homepage Container Here-->
               <div class="container">
                  <!-- Left Container -->
                  <div class="left-container">
                    <!-- Start Projects -->
                    <h1 class="heading">Projects: <div class="totalpoints">
                      Total number of ecopoints {{$ecopoints->sum('denomination')}} donated
                    </div></h1>
                    <div id="projectlayer">                 
                    <ul>
                    @foreach($projects as $project)
                         <li value="{{ $project->id }}">
                         <strong>Project Name:</strong> <a class="project-link" href="/projects/{{ strtolower($project->project_name) }}">{{ $project->project_name }}</a><br/>
                         <strong>Location:</strong> {{ $project->location }}<br/>
                         <strong>Target Date:</strong> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $project->ideal_planting_date)->format('d F Y') }}<br/>
                         <strong>Use URI:</strong> {{ str_replace(' ', '-', strtolower($project->project_name)) }} 
                         </li>
                    @endforeach 
                    </ul>
                    </div>
                    <!--- Start Merchant Carousel Here -->
                    <h1 class="heading">Merchants</h1>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">                   
                    <!-- Indicators -->
                        <ol class="carousel-indicators hidden">
                            @foreach($merchants as $merchant)
                                <li data-target="#myCarousel"></li>
                            @endforeach 
                        </ol>

                    <!-- Wrapper for slides -->
                    <div class="row">
                    <div class="col-md-12">
                    <div class="carousel carousel-showmanymoveone slide" id="theCarousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($merchants as $merchant)
                            <div class="item" >
                                <div class="col-xs-12 col-sm-6 col-md-3"><a href="/merchants/{{strtolower($merchant->merchant_name)}}"><img src="/images/logos/{{ $merchant->logo }}" alt="{{$merchant->merchant_name}}" title="{{$merchant->merchant_name}}" class="img-responsive"></a></div>
                            </div>
                        @endforeach 
                    </div>
                    </div>
                    </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                  <!-- End Carousel here -->
                  </div>
                  <!-- Right Container -->
                  <div class="right-container">
                     <div class="featured-news"><img src="/images/Tree-planting-Christchurc.jpg"></div>
                  </div>


                 
                 </div>
             <!-- End Homepage Container -->
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
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/loadpage.js"></script>
    </body>
</html>
