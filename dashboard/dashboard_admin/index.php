<?php
include "conn.php";
ini_set('session.cookie_lifetime', 3600);
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true || (isset($_SESSION['logout_flag']) && $_SESSION['logout_flag'] === true)) {
    header("Location: /capstone/dashboard/dashboard_admin/index.php");
    exit();
}

$session_timeout = 600;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    $_SESSION['logout_flag'] = true;

    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: /capstone/dashboard/dashboard_admin/index.php");
    exit();
}


$_SESSION['last_activity'] = time();

if (isset($_GET['logout'])) {
    $_SESSION['logout_flag'] = true;

    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: /capstone/dashboard/dashboard_admin/index.php");
    exit();
}
// Check if the user is logged in
if (isset ($_SESSION['admin_logged_in'])) {
    $fname = $_SESSION['admin_fname'];
    $lname = $_SESSION['admin_lname'];
} else {
    // Redirect to login page if user is not logged in
    header("Location: /capstone/dashboard/dashboard_student/index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN DASHBOARD</title>

    <!-- Favicons -->
    <link href="img/ui.ico" rel="icon">
    <link href="img/ui.ico" rel="ui.ico">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Add these script tags to include Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    
<!-- 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Fetch data from process.php
            fetch('process.php')
                .then(response => response.json())
                .then(data => {
                    // Extract data for attendance and students
                    var attendanceData = google.visualization.arrayToDataTable(data.attendance);
                    var studentData = google.visualization.arrayToDataTable(data.students);

                    // Chart 1: Attendance
                    var attendanceOptions = {
                        title: 'Attendance by Course'
                    };

                    var attendanceChart = new google.visualization.PieChart(document.getElementById('attendanceChart'));
                    attendanceChart.draw(attendanceData, attendanceOptions);

                    // Chart 2: Students
                    var studentOptions = {
                        title: 'Students by Course'
                    };

                    var studentChart = new google.visualization.PieChart(document.getElementById('studentChart'));
                    studentChart.draw(studentData, studentOptions);
                })
                .catch(error => console.error('Error fetching data:', error));
        }


      

    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Fetch data from process.php
        fetch('process.php')
            .then(response => response.json())
            .then(data => {
                // Extract data for the hourly attendance chart
                var hourlyData = [['HOUR', 'USERS']];
                data.hourly.forEach(row => {
                    hourlyData.push([row.hour, parseInt(row.users)]);
                });

                // Convert the data array to DataTable
                var dataTable = google.visualization.arrayToDataTable(hourlyData);

                // Set chart options
                var options = {
                    title: 'ATTENDANCE BY COURSE PER HOUR',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                };

                // Create and draw the chart
                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(dataTable, options);
            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script> -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background: rgb(3,85,32); background: linear-gradient(305deg, rgba(3,85,32,1) 28%, rgba(9,32,121,1) 60%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%);">


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bookmark"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading mb-2">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Button trigger modal -->
    <button type="button" class="btn btn- d-flex justify-content-start mb-2 mt-2" style="color: #fff; " data-toggle="modal" data-target="#reviewsModal"onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 75%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';" onmouseout="this.style.background=''; this.style.color='#fff';">
    <i class="fas fa-fw fa-book mr-2"></i>
    <span class="small">EVALUATIONS</span>
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="reviewsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EVALUATIONS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">EVALUATION LISTS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>EVALUATION</th>
                                            <th>TITLES</th>
                                            <th>COURSE</th>
                                            <th>FEEDBACKS</th>
                                            <th>RECOMENDATIONS</th>
                                            <th>RATINGS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>EVALUATION</th>
                                            <th>TITLES</th>
                                            <th>COURSE</th>
                                            <th>FEEDBACKS</th>
                                            <th>RECOMENDATIONS</th>
                                            <th>RATINGS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </tfoot>
            <tr>

<?php
$getdata = mysqli_query($conn, "SELECT * FROM evaluation");
while ($row = mysqli_fetch_array($getdata)) {


    ?>

                <td> <?php echo $row['evaluationID'] ?> </td>
                <td> <?php echo $row['titles'] ?> </td>
                <td> <?php echo $row['course'] ?> </td>
                <td> <?php echo $row['feedbacks'] ?> </td>
                <td> <?php echo $row['recommendations'] ?> </td>
                <td> <?php echo $row['rating'] ?> </td>
                <td>
                    <form action="delete.php" method="GET" style="margin: 0; padding: 0;">
                        <input type="hidden" name="id" value="<?php echo $row['evaluationID']; ?>">
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
                </tr>

                <?php
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>



<!-- Attendance -->
<button type="button" class="btn btn- d-flex justify-content-start mb-2 mt-2"style="color: #fff" data-toggle="modal" data-target="#attendanceModal"onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 75%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';"
                onmouseout="this.style.background=''; this.style.color='#fff';">
    <i class="fas fa-fw fa-book mr-2"></i>
    <span class="small">ATTENDANCE</span>
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ATTENDANCE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-success">ATTENDANCE LISTS</h6>
            <form method="post" action="export.php">
         <input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> ID NUMBER </th>
                                            <th> FIRST NAME </th>
                                            <th> LAST NAME </th>
                                            <th> COURSE </th>
                                            <th> YEAR LEVEL </th>
                                            <th> TIME IN TIME </th>
                                            <th> TIME OUT TIME </th>
                                            <th> ACTION </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th> ID NUMBER </th>
                                            <th> FIRST NAME </th>
                                            <th> LAST NAME </th>
                                            <th> COURSE </th>
                                            <th> YEAR LEVEL </th>
                                            <th> TIME IN TIME </th>
                                            <th> TIME OUT TIME </th>
                                            <th> ACTION </th>
                                        </tr>
                                    </tfoot>
<tr>
<?php
$getdata = mysqli_query($conn, "SELECT * FROM attendance");
while ($row = mysqli_fetch_array($getdata)) {
    ?>
                <td> <?php echo $row['id_number'] ?> </td>
                <td> <?php echo $row['fname'] ?> </td>
                <td> <?php echo $row['lname'] ?> </td>
                <td> <?php echo $row['course'] ?> </td>
                <td> <?php echo $row['year_level'] ?></td>
                <td> <?php echo $row['checkin_time'] ?> </td>
                <td> <?php echo $row['checkout_time'] ?> </td>
                <td>
                    <form action="delete.php" method="GET" style="margin: 0; padding: 0;">
                        <input type="hidden" name="id" value="<?php echo $row['id_number']; ?>">
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
                </tr>

                <?php
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>



<!-- students -->
<button type="button" class="btn btn- d-flex justify-content-start mb-2 mt-2"style="color: #fff" data-toggle="modal" data-target="#studentModal"onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 75%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';"
                onmouseout="this.style.background=''; this.style.color='#fff';">
    <i class="fas fa-fw fa-book mr-2"></i>
    <span class="small">STUDENTS</span>
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STUDENTS LISTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">STUDENT LISTS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> ID-NUMBER </th>
                                        <th> FIRST NAME </th>
                                        <th> LAST NAME </th>
                                        <th> COURSE </th>
                                        <th> YEAR LEVEL </th>
                                        <th> EMAIL </th>
                                        <th> ACTION </th>
 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th> ID-NUMBER  </th>
                                        <th> FIRST NAME </th>
                                        <th> LAST NAME </th>
                                        <th> COURSE </th>
                                        <th> YEAR LEVEL </th>
                                        <th> EMAIL </th>
                                        <th> ACTION </th>

                                        </tr>
                                    </tfoot>
<tr>
<?php
$getdata = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_array($getdata)) {


    ?>

                <td> <?php echo $row['id_number'] ?> </td>
                <td> <?php echo $row['fname'] ?> </td>
                <td> <?php echo $row['lname'] ?> </td>
                <td> <?php echo $row['course'] ?></td>
                <td> <?php echo $row['year_level'] ?></td>
                <td> <?php echo $row['email'] ?></td>

                <td>
                    <form action="delete.php" method="GET" style="margin: 0; padding: 0;">
                        <input type="hidden" name="id" value="<?php echo $row['id_number']; ?>">
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>

                </tr>

                <?php
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


</div>
</div>
</div>
</div>




<!-- TEACHER -->
<button type="button" class="btn btn- d-flex justify-content-start mb-2 mt-2" style="color: #fff" data-toggle="modal" data-target="#teacherModal"onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 75%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';"
                onmouseout="this.style.background=''; this.style.color='#fff';">
    <i class="fas fa-fw fa-book mr-2"></i>
    <span class="small">TEACHERS</span>
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TEACHERS LISTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">TEACHER LISTS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> USER ID </th>
                                        <th> FIRST NAME </th>
                                        <th> LAST NAME </th>
                                        <th> EMAIL </th>
                                        <th> ACTION </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th> USER ID </th>
                                        <th> FIRST NAME </th>
                                        <th> LAST NAME </th>
                                        <th> EMAIL </th>
                                        <th> ACTION </th>
                                        </tr>
                                    </tfoot>
<tr>

<?php
$getdata = mysqli_query($conn, "SELECT * FROM teachers");
while ($row = mysqli_fetch_array($getdata)) {


    ?>

                <td> <?php echo $row['id_number'] ?> </td>
                <td> <?php echo $row['fname'] ?> </td>
                <td> <?php echo $row['lname'] ?> </td>
                <td> <?php echo $row['email'] ?></td>
                <td>
                    <form action="delete.php" method="GET" style="margin: 0; padding: 0;">
                        <input type="hidden" name="id" value="<?php echo $row['id_number']; ?>">
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
                </tr>

                <?php
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
</div>


<!-- books -->
<button type="button" class="btn btn- d-flex justify-content-start mb-2 mt-2" style="color: #fff; " data-toggle="modal" data-target="#booksModal" onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 75%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';" onmouseout="this.style.background=''; this.style.color='#fff';">
    <i class="fas fa-fw fa-book mr-2"></i>
    <span class="small">BOOKS</span>
</button>

<div class="modal fade bd-example-modal-lg" id="booksModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">BOOKS LISTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">BOOKS LISTS</h6>
                 <!-- <form method="post" action="#">
                <input type="submit" name="import" class="btn btn-primary btn-import mr-2" value="Import to Database" /> -->
                    </form>
                </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> BARCODE </th>
                                        <th> CALLNUMBER </th>
                                        <th>  </th>
                                        <th> COPYRIGHT </th>
                                        <th> TITLE </th>
                                        <th> AUTHOR </th>
                                        <th> LOCATION </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th> BARCODE </th>
                                        <th> CALLNUMBER </th>
                                        <th>  </th>
                                        <th> COPYRIGHT </th>
                                        <th> TITLE </th>
                                        <th> AUTHOR </th>
                                        <th> LOCATION </th>
                                        </tr>
                                    </tfoot>
<tr>

<?php
$getdata = mysqli_query($conn, "SELECT * FROM books");
while ($row = mysqli_fetch_array($getdata)) {


    ?>

                <td> <?php echo $row['barcode'] ?> </td>
                <td> <?php echo $row['call_no1'] ?> </td>
                <td> <?php echo $row['call_no2'] ?> </td>
                <td> <?php echo $row['copyright'] ?></td>
                <td> <?php echo $row['title'] ?></td>
                <td> <?php echo $row['author'] ?></td>
                <td> <?php echo $row['location'] ?></td>
                </tr>

                <?php
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
</div>

<!-- Update Book Modal -->
<div class="modal fade" id="updateBookModal" tabindex="-1" role="dialog" aria-labelledby="updateBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateBookModalLabel">Update Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateBookForm" method="post">
                    <!-- Book details input fields -->
                    <div class="form-group">
                        <label for="updateTitle">Title</label>
                        <input type="text" class="form-control" id="updateTitle" name="updateTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="updateAuthor">Author</label>
                        <input type="text" class="form-control" id="updateAuthor" name="updateAuthor" required>
                    </div>
                    <div class="form-group">
                        <label for="updateLocation">Location</label>
                        <input type="text" class="form-control" id="updateLocation" name="updateLocation" required>
                    </div>
                    
            </div>
        </div>
    </div>
</div>



<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
</div>

<li class="nav-item ">
    <a class="nav-link" href="/capstone/dashboard/dashboard_admin/book_table.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>BOOK LISTS TABLE</span>
    </a>
</li>
            
<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
</div>

<li class="nav-item">
    <a class="nav-link" href="/capstone/dashboard/dashboard_admin/approval.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>APPROVAL LISTS</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item ">
    <a class="nav-link" href="/capstone/dashboard/dashboard_admin/studentmanagement.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>USERS MANAGEMENT</span>
    </a>
</li>

 <!-- Divider -->
<hr class="sidebar-divider mt-3 mb-2">
<div class="sidebar-heading">
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="/capstone/attendancesystem/checkin.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>ATTENDANCE SYSTEM</span>
    </a>
</li>
<hr class="sidebar-divider mt-3 mb-2">
<div class="sidebar-heading">
</div>



        <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
           <!-- CONTENT --> <!-- CONTENT --> <!-- CONTENT -->
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"
                    style="background-color: #0b0667; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">

                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                                    <?php echo $fname . ' ' . $lname; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                        
                    </div>

                   

                    <!-- Content Row -->
                    <div class="row">

                        <!-- TOTAL USER Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-m font-weight-bold text-success text-uppercase mb-1">
                        TOTAL USERS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        include "conn.php";

                        // count the total number of rows
                        $query = "SELECT SUM(total) as grand_total
                        FROM (
                            SELECT COUNT(*) as total FROM students
                            UNION ALL
                            SELECT COUNT(*) as total FROM teachers
                        ) as combined_counts";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['grand_total'];
                            echo $totalUsers;
                        } else {
                            echo "0";
                        }


                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


                        <!-- DAILY TIME IN Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-m font-weight-bold text-success text-uppercase mb-1">
                        TIME-INS TODAY</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        include "conn.php";

                        $currentDate = date('Y-m-d H:i:s');
                        $midnight = date('Y-m-d 00:00:00', strtotime($currentDate));
                        $nextMidnight = date('Y-m-d 00:00:00', strtotime($currentDate . ' + 1 day'));

                        // Count check-ins for today
                        $query = "SELECT COUNT(*) as today_checkins FROM attendance WHERE checkin_time >= '$midnight' AND checkin_time < '$nextMidnight'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $checkinsToday = $row['today_checkins'];
                            echo $checkinsToday;
                        } else {
                            echo "0";
                        }

                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


                        <!-- MONTLY TIME IN Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-m font-weight-bold text-success text-uppercase mb-1">
                        TIME-INS THIS MONTH</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        include "conn.php";

                        $currentDate = date('Y-m-d H:i:s');
                        $startOfMonth = date('Y-m-01 00:00:00', strtotime($currentDate));
                        $startOfNextMonth = date('Y-m-01 00:00:00', strtotime($currentDate . ' + 1 month'));

                        // Count check-ins for this month
                        $query = "SELECT COUNT(*) as this_month_checkins FROM attendance WHERE checkin_time >= '$startOfMonth' AND checkin_time < '$startOfNextMonth'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $checkinsThisMonth = $row['this_month_checkins'];
                            echo $checkinsThisMonth;
                        } else {
                            echo "0";
                        }

                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


                     <!-- YEARLY TIME IN Card Example -->
                     <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-m font-weight-bold text-success text-uppercase mb-1">
                        TIME-INS THIS YEAR</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        include "conn.php";

                        $currentDate = date('Y-m-d H:i:s');
                        $startOfYear = date('Y-01-01 00:00:00', strtotime($currentDate));
                        $startOfNextYear = date('Y-01-01 00:00:00', strtotime($currentDate . ' + 1 year'));

                        // Count check-ins for this year
                        $query = "SELECT COUNT(*) as this_year_checkins FROM attendance WHERE checkin_time >= '$startOfYear' AND checkin_time < '$startOfNextYear'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $checkinsThisYear = $row['this_year_checkins'];
                            echo $checkinsThisYear;
                        } else {
                            echo "0";
                        }

                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


                
        <!-- <div class="container mt-4">
            <div class="row">
       
            <div class="col-md-6">
                <div id="attendanceChart" style="width: 100%; height: 300px;"></div>
            </div>
           
            <div class="col-md-6">
                <div id="studentChart" style="width: 100%; height: 300px;"></div>
            </div>
        </div> -->

     
 
     
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SAF3 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/capstone/index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

   
    <script>
    $(document).ready(function() {
        $('#dataTable1').DataTable();
    });
    </script>

<script>
    $(document).ready(function() {
        $('#dataTable2').DataTable();
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#dataTable3').DataTable();
    });
    </script>

<script>
    $(document).ready(function() {
        $('#dataTable4').DataTable();
    });
    </script>

<script>
    $(document).ready(function() {
        $('#dataTable5').DataTable();
    });
    </script>
</body>

</html>