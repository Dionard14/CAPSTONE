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
  <h2>Admin Login</h2>
  <form action="process_admin.php" method="POST">
    <div class="mb-3">
      <label for="log_email" class="form-label">Email address:</label>
      <input type="email" class="form-control" name="log_email" id="log_email"
        placeholder="Enter email here..." required>
    </div>
    <div class="mb-3">
      <label for="log_password">Password:</label>
      <input type="password" value="" name="log_password" id="log_password" class="form-control" required
        placeholder="Enter password here...">
    </div>
    <div class="mb-3">
      <button type="submit" name="admin_login" class="btn btn-primary">LOGIN</button>
    </div>
     <div class="mb-3">
      <a href="ui-admin-register.php" class="btn btn-primary">REGISTER HERE</a>
    </div>
  </form>
</div>


<body>





















</body>
</html>