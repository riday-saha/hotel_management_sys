
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>keto</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrapfront.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/stylefront.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsivefront.css">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('front-images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jqueryfront.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('front-images/loading.gif')}}" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="{{asset('front-images/logo.png')}}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-10 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="room.html">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gallery.html">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="blog.html">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>
                              @if (Auth::check())
                              <li class="nav-item">
                                 <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Log Out</button>
                                 </form>
                              </li>
                              @else
                              <li class="nav-item">
                                 <a class="nav-link" href="{{route('login')}}">Log in</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{route('register')}}">Registration</a>
                              </li>
                              @endif
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      @yield('front-content')
      
      
      
      
      
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="about.html"> about</a></li>
                        <li><a href="room.html">Our Room</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jqueryfront.min.js"></script>
      <script src="js/bootstrapfront.bundle.min.js"></script>
      <script src="js/jqueryfront-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbarfront.concat.min.js"></script>
      <script src="js/customfront.js"></script>
   </body>
</html>