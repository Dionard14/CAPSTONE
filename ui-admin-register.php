<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UI-BOOK QUEST ADMIN PAGE</title>
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


<div class="container">
  <h2>Admin Registration</h2>
  <form action="process_admin.php" method="POST">
  <div class="mb-3">
      <label for="adminID" class="form-label">Admin ID:</label>
      <input type="text" class="form-control" name="adminID" placeholder="Enter first name" required>
    </div>
    <div class="mb-3">
      <label for="firstName" class="form-label">First Name:</label>
      <input type="text" class="form-control" name="admin_fname" placeholder="Enter first name" required>
    </div>
    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name:</label>
      <input type="text" class="form-control" name="admin_lname" placeholder="Enter last name" required>
    </div>
    <div class="mb-3">
      <label for="regEmail" class="form-label">Email address:</label>
      <input type="email" class="form-control" name="admin_email" id="regEmail"
        placeholder="Enter email here..." required>
    </div>
    <div class="mb-3">
      <label for="regPassword">Password:</label>
      <input type="password" value="" name="admin_password" id="regPassword2" class="form-control"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
        required placeholder="Enter password here...">
    </div>
    <div class="mb-3">
      <button type="submit" name="admin_register" class="btn btn-primary">REGISTER</button>
    </div>
    <div class="mb-3">
      <a href="ui-admin.php" class="btn btn-primary">LOGIN HERE</a>
    </div>
  </form>
</div>



<body>





















</body>
</html>