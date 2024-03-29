<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UI-BOOK QUEST HOMEPAGE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/ui.ico" rel="icon">
  <link href="assets/img/ui.ico" rel="ui.ico">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="https://ui.phinma.edu.ph/contact-us/"
          target="_blank">@ui.phinma.edu.ph/contact-us/</a>
        <i class="bi bi-phone-fill phone-icon"></i> (033) 338 1071
      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://twitter.com/phinma_ui?lang=en" target="_blank" class="twitter"><i
            class="bx bxl-twitter"></i></a>
        <a href="https://web.facebook.com/phinmaui/?_rdc=1&_rdr" target="_blank" class="facebook"><i
            class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/phinmaui/?hl=en" target="_blank" class="instagram"><i
            class="bx bxl-instagram"></i></a>
        <a href="https://www.linkedin.com/school/university-of-iloilo--phinma/" target="_blank" class="linkedin"><i
            class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!--<h1 class="logo"><a href="index.html">UI-BOOK QUEST</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo"><img src="assets/img/cta-bg.png" alt="" class="img-fluid"></a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services"> Library Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Library Sections</a></li>
          <li><a class="nav-link scrollto" href="#team">Librarians</a></li>
          <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginadmin">Login as Admin</a></li>
          <li class="dropdown"><a href="#"><span>Log in as</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginstudent">Login as Student</a></li>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginteacher">Login as Teacher</a></li>
              <li class="dropdown"><a href="#"><span>Register</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="#" data-bs-toggle="modal" data-bs-target="#createstudent">Register as Student</a></li>
                  <li><a href="#" data-bs-toggle="modal" data-bs-target="#createteacher">Register as Teacher</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <!-- Modal for login admin -->
  <div class="modal fade" id="loginadmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Log in as Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="process_admin.php" method="POST"> <!-- Opening <form> tag here -->
          <div class="modal-body">
            <div class="mb-3">
              <label for="adminEmail" class="form-label">Email address: </label>
              <input type="email" class="form-control" name="log_email" id="adminEmail"
                placeholder="Enter email here..." required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="adminPassword">Password: </label>
              <input type="password" value="" name="log_password" id="adminPassword" class="form-control"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required placeholder="Enter password here...">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" onclick="myFunction('adminPassword')"> Show password
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" class="btn btn-secondary" value="CLEAR">
            <input type="submit" name="login_admin" class="btn btn-primary" value="LOGIN">
          </div>
        </form> <!-- Closing </form> tag here -->
      </div>
    </div>
  </div>

  <!-- Modal for registration for students -->
  <div class="modal fade" id="createstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Register an Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Registration Form/ CREATE ACCOUNT -->
        <form action="process.php" method="POST"  enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <label for="idnumber" class="form-label">ID Number:</label>
              <input type="text" class="form-control" name="regform_id" placeholder="Enter ID number" required>
            </div>
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name:</label>
              <input type="text" class="form-control" name="regform_fname" placeholder="Enter first name" required>
            </div>
            <div class="mb-3">
              <label for="lastName" class="form-label">Last Name:</label>
              <input type="text" class="form-control" name="regform_lname" placeholder="Enter last name" required>
            </div>

            <div class="mb-3">
              <label for="course" class="form-label">Course:</label>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_ccje" value="CCCJE"
                  required>
                <label class="form-check-label" for="course_ccje">CCJE</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_coe" value="COE" required>
                <label class="form-check-label" for="course_ccje">COE</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_cite" value="CITE"
                  required>
                <label class="form-check-label" for="course_cite">CITE</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_bsa" value="BSA" required>
                <label class="form-check-label" for="course_bsa">BSA</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_cma"
                  value="CMA" required>
                <label class="form-check-label" for="course_cma">CMA</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_coed" value="COED"
                  required>
                <label class="form-check-label" for="course_coed">COED</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_cahs" value="CAHS"
                  required>
                <label class="form-check-label" for="course_cahs">CAHS</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_mar" value="COME"
                  required>
                <label class="form-check-label" for="course_mar">COME</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_shs" value="SHS" required>
                <label class="form-check-label" for="course_shs">SHS</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_course" id="course_gschool"
                  value="BEED" required>
                <label class="form-check-label" for="course_gschool">BEED</label>
              </div>

            </div>

            <div class="mb-3">
              <label for="yearlevel" class="form-label">Year Level:</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_yearlevel[]" value="1" id="yearlevel1">
                <label class="form-check-label" for="yearlevel1">Year 1</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_yearlevel[]" value="2" id="yearlevel2">
                <label class="form-check-label" for="yearlevel2">Year 2</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_yearlevel[]" value="3" id="yearlevel3">
                <label class="form-check-label" for="yearlevel3">Year 3</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="regform_yearlevel[]" value="4" id="yearlevel3">
                <label class="form-check-label" for="yearlevel3">Year 4</label>
              </div>
            </div>

            <div class="mb-3">
              <label for="regEmail" class="form-label">Email address:</label>
              <input type="email" class="form-control" name="regform_email" id="regEmail"
                placeholder="Enter email here..." required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

              <div class="mb-3">
                  <label for="reg_idfront" class="form-label">ID Front Picture:</label>
                  <input type="file" class="form-control" name="reg_idfront" id="reg_idfront" accept="image/*" required>
              </div>

              <div class="mb-3">
                  <label for="reg_idback" class="form-label">ID Back Picture:</label>
                  <input type="file" class="form-control" name="reg_idback" id="reg_idback" accept="image/*" required>
              </div>


            <div class="mb-3">
              <label for="regPassword">Password:</label>
              <input type="password" value="" name="regform_password" id="regPassword" class="form-control"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required placeholder="Enter password here...">
            </div>
            <div class="mb-3">
              <label for="confirmPassword">Confirm Password:</label>
              <input type="password" value="" name="regform_password2" id="confirmPassword" class="form-control"
                required placeholder="Confirm password">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" onclick="myFunction('regPassword, confirmPassword')"> Show password
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary">CLEAR</button>
            <button type="submit" name="regformstudent" class="btn btn-primary">REGISTER</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- End Registration Form -->
  </div>
  </div>
  </div>

  <!-- Modal for registration for teacher -->
  <div class="modal fade" id="createteacher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Register an Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Registration Form/ CREATE ACCOUNT -->
        <form action="process.php" method="POST">
          <div class="modal-body">
            <div class="mb-3">
              <label for="idnumber" class="form-label">ID Number:</label>
              <input type="text" class="form-control" name="regform_id" placeholder="Enter ID number" required>
            </div>
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name:</label>
              <input type="text" class="form-control" name="regform_fname" placeholder="Enter first name" required>
            </div>
            <div class="mb-3">
              <label for="lastName" class="form-label">Last Name:</label>
              <input type="text" class="form-control" name="regform_lname" placeholder="Enter last name" required>
            </div>
            <div class="mb-3">
              <label for="regEmail" class="form-label">Email address:</label>
              <input type="email" class="form-control" name="regform_email" id="regEmail"
                placeholder="Enter email here..." required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                  <label for="reg_idfront" class="form-label">ID Front Picture:</label>
                  <input type="file" class="form-control" name="reg_idfront" id="reg_idfront" accept="image/*" required>
              </div>

              <div class="mb-3">
                  <label for="reg_idback" class="form-label">ID Back Picture:</label>
                  <input type="file" class="form-control" name="reg_idback" id="reg_idback" accept="image/*" required>
              </div>


            <div class="mb-3">
              <label for="regPassword">Password:</label>
              <input type="password" value="" name="regform_password" id="regPassword2" class="form-control"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required placeholder="Enter password here...">
            </div>
            <div class="mb-3">
              <label for="confirmPassword">Confirm Password:</label>
              <input type="password" value="" name="regform_password2" id="confirmPassword2" class="form-control"
                required placeholder="Confirm password">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" onclick="myFunction('regPassword2, confirmPassword2')"> Show password
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary">CLEAR</button>
            <button type="submit" name="regformteacher" class="btn btn-primary">REGISTER</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- End Registration Form -->
  </div>
  </div>
  </div>

  <!-- Modal for login As student -->
  <div class="modal fade" id="loginstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Login as Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="process.php" method="POST"> <!-- Opening <form> tag here -->
          <div class="modal-body">
            <div class="mb-3">
              <label for="studentEmail" class="form-label">Email address:</label>
              <input type="email" class="form-control" name="log_email" id="studentEmail"
                placeholder="Enter email here..." required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="studentPassword">Password:</label>
              <input type="password" value="" name="log_password" id="studentPassword" class="form-control"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required placeholder="Enter password here...">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" onclick="myFunction('studentPassword')"> Show password
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" class="btn btn-secondary" value="CLEAR">
            <input type="submit" name="login_student" class="btn btn-primary" value="LOGIN">
          </div>
        </form> <!-- Closing </form> tag here -->
      </div>
    </div>
  </div>

  <!-- Modal for login As teacher -->
  <div class="modal fade" id="loginteacher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Login as Teacher</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="process.php" method="POST"> <!-- Opening <form> tag here -->
          <div class="modal-body">
            <div class="mb-3">
              <label for="teacherEmail" class="form-label">Email address:</label>
              <input type="email" class="form-control" name="log_email" id="teacherEmail"
                placeholder="Enter email here..." required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="teacherPassword">Password:</label>
              <input type="password" value="" name="log_password" id="teacherPassword" class="form-control"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required placeholder="Enter password here...">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" onclick="myFunction('teacherPassword')"> Show password
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" class="btn btn-secondary" value="CLEAR">
            <input type="submit" name="login_teacher" class="btn btn-primary" value="LOGIN">
          </div>
        </form> <!-- Closing </form> tag here -->
      </div>
    </div>
  </div>

  <!-----checkpass-------->
  <script>
    function myFunction(ids) {
      var idArray = ids.split(',');
      for (var i = 0; i < idArray.length; i++) {
        var x = document.getElementById(idArray[i].trim());
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    }
  </script>




  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Welcome
        <br>to our Online Library
      </h1>
      <h3>Dive in and discover a treasure trove of literature, information, and inspiration at your fingertips.<p></p>
        Join us on this literary journey, where the possibilities are endless, and the stories are boundless.</h3>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="assets/img/about.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>PHINMA-UI Library serves as essential resources for students,faculty and researchers
              providing a wide range of academic materials and services.
            </h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> Borrowing Services</li>
              <li><i class="bi bi-check-circle"></i> Reference and Research Assistance</li>
              <li><i class="bi bi-check-circle"></i> Study Spaces</li>
              <li><i class="bi bi-check-circle"></i> Virtual Reference Desk</li>
            </ul>
            <p>
              UI-BOOK QUEST is a Online Reference Services where library
              users may seek assistance of the librarians regarding their research needs.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->




    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Library Services</span>
          <h2>Library Services</h2>
          <p>These are the following library services:</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-journal-check"></i></div>
              <h4><a href="">Book Borrowing</a></h4>
              <p>Student and faculties can borrow books online.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
            data-aos-delay="150">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-book-fill"></i></div>
              <h4><a href="">Book Reservation</a></h4>
              <p>Student and Faculties can reserve the books they want.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up"
            data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-envelope-check-fill"></i></div>
              <h4><a href="">Ask A Librarian</a></h4>
              <p>You can chat a librarian desk through inboxing.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="450">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-pencil-square"></i></div>
              <h4><a href="">Book Reviews</a></h4>
              <p>You can provide reviews and insights on the books you've read.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-search"></i></div>
              <h4><a href="">Search Books</a></h4>
              <p>You can find books online through searching.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="750">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-journal-arrow-up"></i></div>
              <h4><a href="">Book Recommendations</a></h4>
              <p>You can recommend books that can help the librarians future books new selections.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Call To Action</h3>
          <p> The PHINMA-University of Iloilo is a private, nonsectarian, coeducational institution in Iloilo City,
            Philippines. It was established in 1947 by the López family of
            Iloilo who founded the broadcasting giant ABS-CBN Corporation as Iloilo City Colleges.</p>
          <a class="cta-btn" href="#">Call To Action</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Library Sections</span>
          <h2>Library Sections</h2>
          <p>These are the following sections in the library:</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-entrance">Entrance</li>
              <li data-filter=".filter-filipiniana">Fil</li>
              <li data-filter=".filter-grad">GRAD</li>
              <li data-filter=".filter-grs">GRS</li>
              <li data-filter=".filter-cs">CS</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">

          <div class="col-lg-4 col-md-6 portfolio-item filter-entrance">
            <img src="assets/img/portfolio/ENT.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>ENTRANCE</h4>
              <a href="assets/img/portfolio/ENT.png" style="text-align: center;" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="ENTRANCE"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-entrance">
            <img src="assets/img/portfolio/ENT2.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>ENTRANCE</h4>
              <a href="assets/img/portfolio/ENT2.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="ENTRANCE"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-filipiniana">
            <img src="assets/img/portfolio/FIL.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>FILIPINIANA</h4>
              <a href="assets/img/portfolio/FIL.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="FILIPINIANA"><i class="bx bx-plus"></i></a>
              <a href="fil.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-filipiniana">
            <img src="assets/img/portfolio/FIL1.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>FILIPINIANA</h4>
              <a href="assets/img/portfolio/FIL1.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="FILIPINIANA"><i class="bx bx-plus"></i></a>
              <a href="fil.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-grad">
            <img src="assets/img/portfolio/GS.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>GRAD</h4>
              <a href="assets/img/portfolio/GS.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="GRADUATE SCHOOL"><i class="bx bx-plus"></i></a>
              <a href="grad.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-grad">
            <img src="assets/img/portfolio/GS2.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>GRAD</h4>
              <a href="assets/img/portfolio/GS2.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="GRADUATE SCHOOL"><i class="bx bx-plus"></i></a>
              <a href="grad.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-grs">
            <img src="assets/img/portfolio/GRS.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>GENERAL REFERENCE</h4>
              <a href="assets/img/portfolio/GRS.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="GENERAL REFERENCE SECTION"><i class="bx bx-plus"></i></a>
              <a href="grs.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-grs">
            <img src="assets/img/portfolio/GRS1.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>GENERAL REFERENCE</h4>
              <a href="assets/img/portfolio/GRS1.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="GENERAL REFERENCE SECTION"><i class="bx bx-plus"></i></a>
              <a href="grs.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-cs">
            <img src="assets/img/portfolio/CS.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>CIRCULATION SECTION</h4>
              <a href="assets/img/portfolio/CS.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="CIRCULATION SECTION"><i class="bx bx-plus"></i></a>
              <a href="cs.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-cs">
            <img src="assets/img/portfolio/CS1.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>CIRCULATION SECTION</h4>
              <a href="assets/img/portfolio/CS1.png" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" title="CIRCULATION SECTION"><i class="bx bx-plus"></i></a>
              <a href="cs.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->



    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">
        <div class="section-title">
          <span>LIBRARY ORGANIZATIONAL CHART</span>
          <h2>LIBRARY ORGANIZATIONAL CHART</h2>
          <p>These are the librarians in the library:</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/leonore.png" alt="" style="border-radius: 0;">
              <h4>Ma.Leonora F. Flame,MSLS,RL</h4>
              <h5>HEAD LIBRARIAN</h5>
            </div>
          </div>

          <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/wilma.png" alt="" style="border-radius: 0;">
              <h4>Wilma S. Cenal,MSLS,RL</h4>
              <h5>ASSISTANT HEAD LIBRARIAN</h5>
              <h5>HEAD TECHNICAL SERVICES</h5>
              <H5>GRADUATE SCHOOL LIBRARY</H5>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-3 col-sm-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/hope.png" alt="" style="border-radius: 0;">
              <h4>Mary Hope B. Delamar, RL</h4>
              <h5>LIBRARIAN</h5>
              <H5>BASIC EDUCATION DEPARTMENT</H5>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/wei.png" alt="" style="border-radius: 0;">
              <h4>Weilyn G. Francisco,RL</h4>
              <h5>LIBRARIAN</h5>
              <h5>GENERAL REFERENCE &</h5>
              <h5>PERIODICAL SECTIONS</h5>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/ara.png" alt="" style="border-radius: 0;">
              <h4>Araceli P. Japitana,RL</h4>
              <h5>LIBRARIAN</h5>
              <h5>FILIPINIANA &</h5>
              <h5>RESERVE SECTIONS</h5>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/jen.png" alt="" style="border-radius: 0;">
              <h4>Jenalyn P. Padre-e,RL</h4>
              <h5>LIBRARIAN</h5>
              <H5>CIRCULATION SECTION &</H5>
              <H5>AUDIO VISUAL MATERIALS</H5>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->






    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>These are our contacts:</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Rizal St,Iloilo City Proper</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>ui.library@phinmaed.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>(033) 338 1071</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-12">
            <iframe class="mb-4 mb-lg-0"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1283.3758354694248!2d122.56946369831327!3d10.692253457150182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aee5255345f11b%3A0xb32057bb6b1d39c8!2sPHINMA%20UNIVERSITY%20OF%20ILOILO!5e0!3m2!1sen!2sph!4v1695219855025!5m2!1sen!2sph"
              frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
                  <a href="https://twitter.com/phinma_ui?lang=en" target="_blank" class="twitter"><i
                      class="bx bxl-twitter"></i></a>
                  <a href="https://web.facebook.com/phinmaui/?_rdc=1&_rdr" target="_blank" class="facebook"><i
                      class="bx bxl-facebook"></i></a>
                  <a href="https://www.instagram.com/phinmaui/?hl=en" target="_blank" class="instagram"><i
                      class="bx bxl-instagram"></i></a>
                  <a href="https://www.linkedin.com/school/university-of-iloilo--phinma/" target="_blank"
                    class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>TEAM SAF 3</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
        Designed by <a href="#">TEAM SAF 3</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
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