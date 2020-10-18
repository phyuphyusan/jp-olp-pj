<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Learning - @yield('title')</title>
  <meta charset="UTF-8">
  <meta name="description" content="WebUni Education Template">
  <meta name="keywords" content="webuni, education, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->   
  <link href="{{ url('frontendtemplate/img/favicon.ico')}}" rel="shortcut icon"/>

  <!-- Google Fonts -->
  <link href="{{ url('backendtemplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('frontendtemplate/css/bootstrap.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('frontendtemplate/css/font-awesome.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('frontendtemplate/css/owl.carousel.css')}}"/>
  <link rel="stylesheet" href="{{ asset('frontendtemplate/css/style.css')}}"/>
</head>
<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Header section -->
  <header class="header-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="site-logo">
            <img src="{{ url('frontendtemplate/img/logo.png')}}" alt="">
            <!-- <div class="page-info-section set-bg" data-setbg="img/page-bg/3.jpg"> -->
            </div>
            <div class="nav-switch">
              <i class="fa fa-bars"></i>
            </div>
          </div>
          <div class="col-lg-9 col-md-9">
            <!-- <a href="" class="site-btn header-btn">Login</a> -->
            <!-- <a href="{{route('signuppage')}}" class="site-btn header-btn">Sign Up</a> -->
            <nav class="main-menu d-lg-inline">
              <ul>
                <li><a href="{{route('homepage')}}">Home</a></li>
                <li><a href="{{route('coursepage')}}">Courses</a></li>
                <li><a href="{{route('login')}}" class="float-right">Login</a></li>
                <li><a href="{{route('register')}}" class="float-right">Register</a></li>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">

                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>
                  </li>
                  @endguest
                </ul>
              </div>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header section end -->


  <!-- Hero section -->
  <section class="page-info-section set-bg" data-setbg="{{ url('frontendtemplate/img/page-bg/3.jpg')}}">
    <div class="container">
      <div class="hero-text text-white">
        <h2>Get The Best Free Online Courses</h2>
        <h5>It's time to transform your talent</h5>
        <a href="{{route('signuppage')}}" class="btn btn-outline-danger mt-4 shadow">Create Your Own Course Join Us!</a>
      </div>
    </div>
  </section>
  <!-- Hero section end -->


  <!-- categories section -->
  @yield('content')
  <!-- banner section end -->
  <!-- footer section -->
  <footer class="footer-section spad pb-0">
    <div class="footer-top">
      <div class="footer-warp">
        <div class="row">
          <div class="widget-item">
            <h4>Contact Info</h4>
            <ul class="contact-list">
              <li>1481 Creekside Lane <br>Avila Beach, CA 931</li>
              <li>+53 345 7953 32453</li>
              <li>yourmail@gmail.com</li>
            </ul>
          </div>
          <div class="widget-item">
            <h4>Engeneering</h4>
            <ul>
              <li><a href="">Applied Studies</a></li>
              <li><a href="">Computer Engeneering</a></li>
              <li><a href="">Software Engeneering</a></li>
              <li><a href="">Informational Engeneering</a></li>
              <li><a href="">System Engeneering</a></li>
            </ul>
          </div>
          <div class="widget-item">
            <h4>Graphic Design</h4>
            <ul>
              <li><a href="">Applied Studies</a></li>
              <li><a href="">Computer Engeneering</a></li>
              <li><a href="">Software Engeneering</a></li>
              <li><a href="">Informational Engeneering</a></li>
              <li><a href="">System Engeneering</a></li>
            </ul>
          </div>
          <div class="widget-item">
            <h4>Development</h4>
            <ul>
              <li><a href="">Applied Studies</a></li>
              <li><a href="">Computer Engeneering</a></li>
              <li><a href="">Software Engeneering</a></li>
              <li><a href="">Informational Engeneering</a></li>
              <li><a href="">System Engeneering</a></li>
            </ul>
          </div>
          <div class="widget-item">
            <h4>Newsletter</h4>
            <form class="footer-newslatter">
              <input type="email" placeholder="E-mail">
              <button class="site-btn">Subscribe</button>
              <p>*We don’t spam</p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="footer-warp">
        <ul class="footer-menu">
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Register</a></li>
          <li><a href="#">Privacy</a></li>
        </ul>
        <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
        </div>
      </div>
    </footer> 
    <!-- footer section end -->


    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('frontendtemplate/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('frontendtemplate/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontendtemplate/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('frontendtemplate/js/circle-progress.min.js')}}"></script>
    <script src="{{ asset('frontendtemplate/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontendtemplate/js/main.js')}}"></script>
    <!-- load for map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWTIlluowDL-X4HbYQt3aDw_oi2JP0Krc&sensor=false"></script>
    <script src="{{ asset('frontendtemplate/js/map.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
      // $( ".enrolled" ).hide();
    //   $(".enroll").click(function () {
    //     $( ".enrolled" ).show();
    //     $( ".enroll" ).hide();
    //   });  
    //   $(".enrolled").click(function () {
    //     $( ".enroll" ).hide();
    //   }); 

          // console.log('IT Works');
      $('select[name="subject"]').on('change',function(){
        // console.log("kkk");
        var subject_id=$(this).val();
        if(subject_id){
          // console.log(major_id);
          $.ajax({
            url: '/getSubjects/'+major_id,
            type:'GET',
            dataType:'json',
            success: function(data){
              // console.log(data);
              $('select[name="subject"]').empty();
              $.each(data,function(key,value){
                $('select[name="subject"]')
                .append('<option value="'+key+'">'+value+'<option>');
              });
            }
          });
        }else{
          $('select=[name="subject"]').empty();
        }
      });

    });

    
   </script>
   @yield('script')
   </html>