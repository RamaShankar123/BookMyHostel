<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BookMyHostel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp - v4.9.1
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top bg-dark">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><img src="{{asset('frontend/img/bmh_logo.png')}}"><br></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{asset('frontend/img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{url('/register')}}" class="get-started-btn scrollto">Sign Up</a>

    </div>
  </header><!-- End Header -->

 

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <form method="POST" action="{{url('submit-inquery-form')}}">
      <div class="container" data-aos="fade-up">

        <div class="row" style="padding-top:5%;">
          <div class="col-sm-6">
               <div class="form-group">
            <label for="exampleInputEmail1">Student Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
           @csrf
    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <div class="form-group" style="padding-top:1%;">
            <label for="exampleInputPassword1">Gender</label>
            <select class="form-control" name="gender" required>
              <option value="">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
           <div class="form-group" style="padding-top:1%;">
            <label for="exampleInputPassword1">Father's Name</label>
            <input type="text" class="form-control" name="fathers_name" required>
          </div>
          <div class="form-group" style="padding-top:1%;">
            <label for="exampleInputPassword1">Mobile No.</label>
            <input type="number" class="form-control" name="mobile_number" required>
          </div>
           <div class="form-group" style="padding-top:1%;">
            <label for="exampleInputPassword1">Email I'D</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group" style="padding-top:1%;">
            <label for="exampleInputPassword1">Class</label>
            <select class="form-control" name="class" required>
              <option value="">Select Class</option>
              <option value="11thJEE">11th JEE</option>
              <option value="11thNEET">11th NEET</option>
              <option value="12thJEE">12th JEE</option>
              <option value="12thNEET">12th NEET</option>
              <option value="DropperJEE">Dropper JEE</option>
              <option value="DropperNEET">Dropper NEET</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group" style="padding-top:1%;">
            <label for="exampleInputPassword1">Area</label>
            <select class="form-control" name="Area" required>
              <option value="">Select Area</option>
              <option value="BoringRoad">Boring Road</option>
              <option value="Kankarbag">Kankarbag</option>
              <option value="NearGandhiMaidan">Near Gandhi Maidan</option>
              <option value="NearEskonTemple">Near Eskon Temple</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group" style="padding-top:1%;">
            <label for="exampleInputPassword1">Bed Option</label>
            <select class="form-control" name="BedOption" required>
              <option value="">Select Bed Option</option>
              <option value="SingleBed">Single Bed</option>
              <option value="DoubleBed">Double Bed</option>
              <option value="TripleBed">Triple Bed</option>
              <option value="FourBed">Four Bed</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group" style="padding-top:1%;float: right;">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <!-- <h3>Gp<span>.</span></h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p> -->
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>BookMyHostel</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('frontend/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/js/main.js')}}"></script>

</body>

</html>