<?php
    include "conn.php"; 
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BOOK LISTS</title>

    <!-- Favicons -->
    <link href="img/ui.ico" rel="icon">
    <link href="img/ui.ico" rel="ui.ico">

    <!-- Custom fonts for this template-->
    <link href="/capstone/dashboard/dashboard_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="/capstone/dashboard/dashboard_admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="/capstone/dashboard/dashboard_admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background: rgb(3,85,32); background: linear-gradient(305deg, rgba(3,85,32,1) 28%, rgba(9,32,121,1) 60%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%);">


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/capstone/dashboard/dashboard_admin/studentmanagement.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bookmark"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BOOKS LISTS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/capstone/dashboard/dashboard_admin/index.php">
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
                            <h6 class="m-0 font-weight-bold text-primary">EVALUATION LISTS</h6>
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
    $getdata = mysqli_query ($conn, "SELECT * FROM evaluation");
    while($row = mysqli_fetch_array($getdata)){

    
?>

<td> <?php echo $row['evaluationID']?> </td>
<td> <?php echo $row['titles']?> </td>
<td> <?php echo $row['course']?> </td>
<td> <?php echo $row['feedbacks']?> </td>
<td> <?php echo $row['recommendations']?> </td>
<td> <?php echo $row['rating']?> </td>
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
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ATTENDANCE LISTS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> ID NUMBER </th>
                                            <th> NAME </th>
                                            <th> COURSE </th>
                                            <th> YEAR LEVEL </th>
                                            <th> CHECK IN TIME </th>
                                            <th> CHECK OUT TIME </th>
                                            <th> ACTION </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th> ID NUMBER </th>
                                            <th> NAME </th>
                                            <th> COURSE </th>
                                            <th> YEAR LEVEL </th>
                                            <th> CHECK IN TIME </th>
                                            <th> CHECK OUT TIME </th>
                                            <th> ACTION </th>
                                        </tr>
                                    </tfoot>
<tr>
<?php   
    $getdata = mysqli_query ($conn, "SELECT * FROM attendance");
    while($row = mysqli_fetch_array($getdata)){
?>
<td> <?php echo $row['id_number']?> </td>
<td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>

<td> <?php echo $row['course']?> </td>
<td> <?php echo $row['year_level']?></td>
<td> <?php echo $row['checkin_time']?> </td>
<td> <?php echo $row['checkout_time']?> </td>
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
<button type="button" class="btn btn- d-flex justify-content-start mb-2 mt-2" style="color: #fff" data-toggle="modal" data-target="#teacherModal"onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 75%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';"
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
                            <h6 class="m-0 font-weight-bold text-primary">STUDENT LISTS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> USER ID </th>
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
                                        <th> USER ID </th>
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
    $getdata = mysqli_query ($conn, "SELECT * FROM students");
    while($row = mysqli_fetch_array($getdata)){

    
?>

<td> <?php echo $row['id_number']?> </td>
<td> <?php echo $row['fname']?> </td>
<td> <?php echo $row['lname']?> </td>
<td> <?php echo $row['course']?> </td>
<td> <?php echo $row['year_level']?> </td>
<td> <?php echo $row['email']?></td>

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
                            <h6 class="m-0 font-weight-bold text-primary">TEACHER LISTS</h6>
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
    $getdata = mysqli_query ($conn, "SELECT * FROM teachers");
    while($row = mysqli_fetch_array($getdata)){

    
?>

<td> <?php echo $row['id_number']?> </td>
<td> <?php echo $row['fname']?> </td>
<td> <?php echo $row['lname']?> </td>
<td> <?php echo $row['email']?></td>
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
            
<!-- Divider -->
<hr class="sidebar-divider">/
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

<li class="nav-item">
    <a class="nav-link" href="/capstone/dashboard/dashboard_admin/approval.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>APPROVAL LISTS</span>
    </a>
</li>




        <!-- Divider -->
        <hr class="sidebar-divider mt-3 mb-2">
        <!-- Divider -->
       <!-- <hr class="sidebar-divider d-none d-md-block">  -->

           

         

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

                  
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
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


<!-- Table without Modal -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">BOOKS LISTS</h6>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBookModal">Add Book</button>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> BARCODE </th>
                        <th> CALLNUMBER (1) </th>
                        <th> CALLNUMBER (2) </th>
                        <th> COPYRIGHT </th>
                        <th> BOOK TITLE </th>
                        <th> AUTHOR </th>
                        <th> LOCATION </th>
                        <th> ACTION </th>
                        <th> ACTION </th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> BARCODE </th>
                        <th> CALLNUMBER (1) </th>
                        <th> CALLNUMBER (2) </th>
                        <th> COPYRIGHT </th>
                        <th> BOOK TITLE </th>
                        <th> AUTHOR </th>
                        <th> LOCATION </th>
                        <th> ACTION </th>
                        <th> ACTION </th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $getdata = mysqli_query($conn, "SELECT * FROM books");
                    while ($row = mysqli_fetch_array($getdata)) {
                    ?>
                        <tr>
                            <td> <?php echo $row['barcode'] ?> </td>
                            <td> <?php echo $row['call_no1'] ?> </td>
                            <td> <?php echo $row['call_no2'] ?> </td>
                            <td> <?php echo $row['copyright'] ?></td>
                            <td> <?php echo $row['title'] ?></td>
                            <td> <?php echo $row['author'] ?></td>
                            <td> <?php echo $row['location'] ?></td>
                            <td>
                                <!-- Update Button -->
                                <button type="button" class="btn btn-primary btn-sm update-btn" data-barcode="<?php echo $row['barcode']; ?>">Update</button>
                            </td>
                            <td> 
                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-barcode="<?php echo $row['barcode']; ?>">Delete</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Delete functionality
        $('.delete-btn').on('click', function () {
            var barcode = $(this).data('barcode');
            if (confirm('Are you sure you want to delete this record?')) {
                // Perform AJAX request to delete the record with the given barcode
                $.ajax({
                    url: 'delete.php', // Specify your PHP file for handling deletion
                    method: 'POST',
                    data: { barcode: barcode },
                    success: function (response) {
                        // Handle success response
                        console.log(response);
                        // Reload the page
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookModalLabel">Add Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addBookForm">
                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" class="form-control" id="barcode" name="barcode" required>
                    </div>
                    <div class="form-group">
                        <label for="call_no1">Call Number (1)</label>
                        <input type="text" class="form-control" id="call_no1" name="call_no1" required>
                    </div>
                    <div class="form-group">
                        <label for="call_no2">Call Number (2)</label>
                        <input type="text" class="form-control" id="call_no2" name="call_no2">
                    </div>
                    <div class="form-group">
                        <label for="copyright">Copyright</label>
                        <input type="text" class="form-control" id="copyright" name="copyright">
                    </div>
                    <div class="form-group">
                        <label for="title">Book Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Delete functionality
        $('.delete-btn').on('click', function () {
            var barcode = $(this).data('barcode');
            if (confirm('Are you sure you want to delete this record?')) {
                // Perform AJAX request to delete the record with the given barcode
                $.ajax({
                    url: 'delete.php', // Specify your PHP file for handling deletion
                    method: 'POST',
                    data: { barcode: barcode },
                    success: function (response) {
                        // Handle success response
                        console.log(response);
                        // Reload the page
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        // Add Book form submission
        $('#addBookForm').submit(function (e) {
            e.preventDefault(); // Prevent form submission

            // Get form data
            var formData = $(this).serialize
            (); // Serialize form data

            // Submit AJAX request to add book
            $.ajax({
                url: 'add_book.php', // Specify your PHP file for adding books
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Handle success response
                    console.log(response);
                    // Reload the page
                    location.reload();
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

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
                        <label for="updateBarcode">Barcode</label>
                        <input type="text" class="form-control" id="updateBarcode" name="updateBarcode" required>
                    </div>
                    <div class="form-group">
                        <label for="updateCallnumber1">Callnumber 1</label>
                        <input type="text" class="form-control" id="updateCallnumber1" name="updateCallnumber1" required>
                    </div>
                    <div class="form-group">
                        <label for="updateCallnumber2">Callnumber 2</label>
                        <input type="text" class="form-control" id="updateCallnumber2" name="updateCallnumber2" required>
                    </div>

                    <div class="form-group">
                        <label for="updateCopyright">Copyright</label>
                        <input type="text" class="form-control" id="updateCopyright" name="updateCopyright" required>
                    </div>
                    <div class="form-group">
                        <label for="updateTitle">Book Title</label>
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
                    <input type="hidden" id="updateBookId" name="updateBookId">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary" name="updateBook">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to open the update book modal and fetch old data
    $(document).on("click", ".update-btn", function() {
        var barcode = $(this).data("barcode");
        $.ajax({
            url: 'fetch_book_details.php', // Path to your PHP script to fetch book details
            type: 'POST',
            data: { barcode: barcode },
            success: function(response) {
                var book = JSON.parse(response);
                $('#updateBarcode').val(book.barcode);
                $('#updateCallnumber1').val(book.call_no1); // Set call_no1 value
                $('#updateCallnumber2').val(book.call_no2); // Set call_no2 value
                $('#updateCopyright').val(book.copyright);
                $('#updateTitle').val(book.title);
                $('#updateAuthor').val(book.author);
                $('#updateLocation').val(book.location);
                $('#updateBookId').val(book.id);
                $('#updateBookModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // AJAX form submission to update book details
    $('#updateBookForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
            url: 'process_update.php', // Path to your PHP script to update book details
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                // For example, display a success message or reload the page
                console.log(response);
                // Optionally reload the page or update the table data dynamically
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    });
</script>

            </div>
            <!-- End of Main Content -->
            </div>

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
    <script src="/capstone/dashboard/dashboard_admin/vendor/jquery/jquery.min.js"></script>
    <script src="/capstone/dashboard/dashboard_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/capstone/dashboard/dashboard_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/capstone/dashboard/dashboard_admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/capstone/dashboard/dashboard_admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/capstone/dashboard/dashboard_admin/js/demo/chart-area-demo.js"></script>
    <script src="/capstone/dashboard/dashboard_admin/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="/capstone/dashboard/dashboard_admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/capstone/dashboard/dashboard_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/capstone/dashboard/dashboard_admin/js/demo/datatables-demo.js"></script>


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


</body>

</html>