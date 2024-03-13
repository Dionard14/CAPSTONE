<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/ui.ico" rel="icon">
  <link href="assets/img/ui.ico" rel="ui.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Day
  * Updated: Aug 17 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope-fill"></i><a href="https://ui.phinma.edu.ph/contact-us/" target="_blank">@ui.phinma.edu.ph/contact-us/</a>
      <i class="bi bi-phone-fill phone-icon"></i> (033) 338 1071
    </div>
    <div class="social-links d-none d-md-block">
    <a href="https://twitter.com/phinma_ui?lang=en" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="https://web.facebook.com/phinmaui/?_rdc=1&_rdr" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="https://www.instagram.com/phinmaui/?hl=en" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="https://www.linkedin.com/school/university-of-iloilo--phinma/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>    </div>
  </div>
</section>

  <!-- ======= Header ======= -->
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <!--<h1 class="logo"><a href="index.html">UI-BOOK QUEST</a></h1>-->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.php" class="logo"><img src="assets/img/cta-bg.png" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar">
      <ul>
      <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
        <li><a class="nav-link scrollto" href="index.php#services"> Library Services</a></li>
        <li><a class="nav-link scrollto " href="index.php#portfolio">Library Sections</a></li>
        <li><a class="nav-link scrollto" href="index.php#team">Librarians</a></li>
        <li class="dropdown"><a href="#"><span>Log in as</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginadmin">Login as Admin</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginstudent">Login as Student</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginteacher">Login as Teacher</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#create">Create Account</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->


<!-- Modal for login admin -->
<div class="modal fade" id="loginadmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Log in as Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="process.php" method="POST"> <!-- Opening <form> tag here -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email here..." required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="myInput">Password:</label>
            <input
              type="password"
              value=""
              name="password"
              id="myInput"
              class="form-control"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
              required
              placeholder="Enter password here..."
            >
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" onclick="togglePasswordVisibility('myInput')">Show password
          </div>
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="CLEAR">
          <input type="submit" class="btn btn-primary" value="LOGIN">
        </div>
      </form> <!-- Closing </form> tag here -->
    </div>
  </div>
</div>

<!-- Modal for registration -->
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Register an Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Registration Form -->
      <form action="process.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email here..." required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="myInput2">Password:</label>
            <input
              type="password"
              value=""
              name="password"
              id="myInput2"
              class="form-control"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
              required
              placeholder="Enter password here..."
            >
          </div>
          <div class="mb-3">
            <label for="confirmPassword">Confirm Password:</label>
            <input
              type="password"
              value=""
              name="confirm_password"
              class="form-control"
              required
              placeholder="Confirm password"
            >
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" onclick="togglePasswordVisibility('myInput2')"> Show password
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary">CLEAR</button>
          <button type="submit" class="btn btn-primary">REGISTER</button>
        </div>
      </form>
      <!-- End Registration Form -->
    </div>
  </div>
</div>


<!-- Modal for login As student -->
<div class="modal fade" id="loginstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login as Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="process.php" method="POST"> <!-- Opening <form> tag here -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email here..." required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="myInput3">Password:</label>
            <input
              type="password"
              value=""
              name="password"
              id="myInput3"
              class="form-control"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
              required
              placeholder="Enter password here..."
            >
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" onclick="togglePasswordVisibility('myInput3')">Show password
          </div>
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="CLEAR">
          <input type="submit" class="btn btn-primary" value="LOGIN">
        </div>
      </form> <!-- Closing </form> tag here -->
    </div>
  </div>
</div>

<!-- Modal for login As student -->
<div class="modal fade" id="loginteacher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login as Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="process.php" method="POST"> <!-- Opening <form> tag here -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email here..." required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="myInput4">Password:</label>
            <input
              type="password"
              value=""
              name="password"
              id="myInput4"
              class="form-control"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
              required
              placeholder="Enter password here..."
            >
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" onclick="togglePasswordVisibility('myInput4')">Show password
          </div>
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="CLEAR">
          <input type="submit" class="btn btn-primary" value="LOGIN">
        </div>
      </form> <!-- Closing </form> tag here -->
    </div>
  </div>
</div>

<script>
  function togglePasswordVisibility(inputId) {
    var x = document.getElementById(inputId);
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>




  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
        <h2>Portfolio Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/GS.png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/GS2.png" alt="">
                </div>


              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3> GRADUATE SCHOOL TECHNICAL SECTION</h3>

            </div>
            <div class="portfolio-description">
              <p>
                Go forward to the main area pass by the
                Graduate school Area. This is an area
                allocated for Graduate School students on
                Saturdays; however undergardaue may also
                utilize this area. Theses and Dissertations by
                both Graduate School and Undergraduate
                students are housed for use. Reading area is
                provided. In here our technical work is
                done.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="footer-info">
              <h3>PHINMA-UI Library</h3>
              <p>
                Rizal Street, 5000 <br>
                Iloilo City<br><br>
                <strong>Phone:</strong> (033) 338 1071<br>
                <strong>Email:</strong> ui.library@phinmaed.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/phinma_ui?lang=en" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://web.facebook.com/phinmaui/?_rdc=1&_rdr" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/phinmaui/?hl=en" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://www.linkedin.com/school/university-of-iloilo--phinma/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>TEAM SAF</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
        Designed by <a href="#">TEAM SAF</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>