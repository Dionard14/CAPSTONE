<?php
include "conn.php";
session_start();



if (!isset ($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true || (isset ($_SESSION['logout_flag']) && $_SESSION['logout_flag'] === true)) {
    header("Location: /capstone/dashboard/dashboard_student/index.php");
    exit();
}

$session_timeout = 600;
if (isset ($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    $_SESSION['logout_flag'] = true;
    session_unset();
    session_destroy();
    header("Location: /capstone/dashboard/dashboard_student/index.php");
    exit();
}

$_SESSION['last_activity'] = time();

if (isset ($_GET['logout'])) {
    $_SESSION['logout_flag'] = true;
    session_unset();
    session_destroy();
    header("Location: /capstone/dashboard/dashboard_student/index.php");
    exit();
}


// Check if the user is logged in
if (isset ($_SESSION['student_logged_in'])) {
    $fname = $_SESSION['student_fname'];
    $lname = $_SESSION['student_lname'];
    $id_number = $_SESSION['id_number'];

    
} elseif (isset ($_SESSION['teacher_logged_in'])) {
    $fname = $_SESSION['teacher_fname'];
    $lname = $_SESSION['teacher_lname'];
} elseif (isset ($_SESSION['admin_logged_in'])) {
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

    <title>STUDENT DASHBOARD</title>

    <!-- Favicons -->
    <link href="img/ui.ico" rel="icon">
    <link href="img/ui.ico" rel="ui.ico">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                <div class="sidebar-brand-text mx-3">STUDENT</div>
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
            <button type="button" class="btn" style="color: #fff; " data-toggle="modal" data-target="#reviewsModal"
                onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 75%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';"
                onmouseout="this.style.background=''; this.style.color='#fff';">
                <i class="fas fa-fw fa-book mr-2"></i>
                <span class="small">BOOK REVIEWS</span>
            </button>
            <br>
            <button type="button" class="btn" style="color: #fff; " onclick="window.location.href = 'reviews.php';"
                onmouseover="this.style.background='linear-gradient(305deg, rgba(9,32,121,1) 63%, rgba(2,0,36,1) 100%, rgba(255,255,255,0.2413340336134454) 100%, #444)';"
                onmouseout="this.style.background=''; this.style.color='#fff';">
                <i class="fas fa-fw fa-book mr-2"></i>
                <span class="small">REVIEWS</span>
            </button>









           
            <!-- Modal -->
            <div class="modal fade" id="reviewsModal" tabindex="-1" aria-labelledby="reviewsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewsModalLabel">EVALUATION</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" style="background-color: #dfd">
                            <!-- Evaluation Form -->
                            <form action="process.php" method="POST">
                            <form action="process.php" method="POST">
                                <div class="form-group">
                                    <label for="barcode">Barcode:</label>
                                    <input type="text" class="form-control" name="barcode" id="barcodeInput" autocomplete="off">
                                    <div id="barcodeSuggestions" class="suggestions"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">TITLE:</label>
                                    <input type="text" class="form-control" name="title" id="title" autocomplete="off">
                                    <div id="titleSuggestions"></div>
                                </div>

                                <div class="mb-3">
                                    <div class="dropdown">
                                        <label for="course" class="form-label">Course:</label>
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="courseDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Course
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="courseDropdown">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_ccje" value="CCCJE" required>
                                                <label class="form-check-label" for="course_ccje">CCJE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_coe" value="COE" required>
                                                <label class="form-check-label" for="course_coe">COE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_cite" value="CITE" required>
                                                <label class="form-check-label" for="course_cite">CITE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_bsa" value="BSA" required>
                                                <label class="form-check-label" for="course_bsa">BSA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_cma" value="CMA" required>
                                                <label class="form-check-label" for="course_cma">CMA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_coed" value="COED" required>
                                                <label class="form-check-label" for="course_coed">COED</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_cahs" value="CAHS" required>
                                                <label class="form-check-label" for="course_cahs">CAHS</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_mar" value="COME" required>
                                                <label class="form-check-label" for="course_mar">COME</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_shs" value="SHS" required>
                                                <label class="form-check-label" for="course_shs">SHS</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="course_gschool" value="BEED" required>
                                                <label class="form-check-label" for="course_gschool">BEED</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    // Add event listener to all radio buttons
                                    document.querySelectorAll('input[name="course"]').forEach(function (input) {
                                        input.addEventListener('change', function () {
                                            // Get the selected course
                                            var selectedCourse = document.querySelector('input[name="course"]:checked').value;
                                            // Update the dropdown button text with the selected course
                                            document.getElementById('courseDropdown').innerText = selectedCourse;
                                        });
                                    });
                                </script>



                                <div class="form-group">
                                    <label for="feedback">FEEDBACKS:</label>
                                    <textarea class="form-control" name="feedback" id="feedback" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="recommendation">RECOMMENDATIONS:</label>
                                    <textarea class="form-control" name="recommendation" id="recommendation"
                                        rows="3"></textarea>
                                </div>

                                <div class="col-md-7 form-group">
                                    <label for="rating">RATING:</label>
                                    <div class="rateyo" id="rating" data-rateyo-rating="0" data-rateyo-num-stars="5"
                                        data-rateyo-score="3"></div>
                                    <span class="result">0</span>
                                    <input type="hidden" name="rating">
                                </div>

                                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="clearButton">CLEAR</button>
                        <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                    </div>
                </form> <!-- Closing the form tag here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Handle input change for barcode suggestions
        $('#barcodeInput').on('input', function () {
            var input = $(this).val();

            // Perform AJAX request to fetch barcode suggestions
            $.ajax({
                type: 'GET',
                url: 'fetch_titles.php', // Adjust the URL to your PHP script that fetches barcode suggestions
                data: { input: input },
                success: function (data) {
                    $('#barcodeSuggestions').html(data).addClass('suggestions-styling');

                    // Handle click on suggestion
                    $('#barcodeSuggestions div').on('click', function (e) {
                        e.stopPropagation(); // Prevent the click from reaching the document click handler

                        var selectedBarcode = $(this).text();

                        // Fill the barcode input with the selected barcode
                        $('#barcodeInput').val(selectedBarcode);

                        // Perform additional action to autofill the title
                        var selectedTitle = $(this).data('title');
                        $('#title').val(selectedTitle);

                        // Hide the suggestions
                        $('#barcodeSuggestions').empty();
                    });
                }
            });
        });

        // Handle click on the document to hide suggestions
        $(document).on('click', function () {
            $('#barcodeSuggestions').empty();
        });

        // Prevent hiding suggestions when clicking inside the suggestions div
        $('#barcodeSuggestions').on('click', function (e) {
            e.stopPropagation(); // Prevent the click from reaching the document click handler
        });

        // Clear button functionality
        $('#clearButton').on('click', function () {
            // Clear form fields
            $('#barcodeInput').val('');
            $('#title').val('');
            $('input[name="course"]').prop('checked', false);
            $('#feedback').val('');
            $('#recommendation').val('');
            $('#rating').rateYo('rating', 0);

            // Clear suggestions
            $('#barcodeSuggestions').empty();
        });
    });
</script>


            <style>
                .suggestions-styling {
                    border: 1px solid #ccc;
                }

                .suggestions-styling div {
                    margin-top: 7px;
                    margin-bottom: 7px;
                    position: relative;
                    /* Necessary for absolute positioning of the icon */
                }

                .suggestions-styling div:hover {
                    background-color: #f0f0f0;
                    /* Background color on hover */
                    cursor: pointer;
                    /* Change cursor to a pointer when hovering over the title */

                }
            </style>





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



                        <!-- HTML content of your dashboard page -->
                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Dashboard</title>
                        </head>

                        <body>


                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
                        <h1 class="h3 mb-0 text-gray-800" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                            Dashboard
                        </h1>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!--  Card Example -->

                        <div class="container">
                            <div class="row">
                                <!-- First card -->
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                        <div class="card-body">
                                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1"
                                                style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                                BOOK OF THE DAY
                                            </div>

                                            <div class="h6 mb-0  text-gray-800">
                                                <?php
                                                include "conn.php";

                                                // Check connection
                                                if (!$conn) {
                                                    die ("Connection failed: " . mysqli_connect_error());
                                                }

                                                // Get the current date
                                                $current_date = date("Y-m-d");

                                                // Query to retrieve the most read book for the current day
                                                $sql = "SELECT titles, COUNT(*) AS num_reads
        FROM evaluation
        WHERE DATE(book_date) = '$current_date '  -- Filter by the current day
        GROUP BY titles
        ORDER BY num_reads DESC
        LIMIT 1";

                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    $bookTitle = $row["titles"];
                                                    $numReads = $row["num_reads"];
                                                    echo "Book of the Day: $bookTitle <br><br> Total Reads of the day: $numReads";
                                                } else {
                                                    echo "No reads recorded for today.";
                                                }

                                                mysqli_close($conn);
                                                ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Second card -->
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1"
                                                style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                                THE BOOKS READ BY COURSE</div>
                                            <div class="h6 mb-0 text-gray-800">
                                                <?php
                                                include "conn.php";

                                                // Check connection
                                                if (!$conn) {
                                                    die ("Connection failed: " . mysqli_connect_error());
                                                }

                                                // Function to get the ordinal suffix for a number
                                                function ordinal_suffix($number)
                                                {
                                                    $suffix = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
                                                    if (($number % 100) >= 11 && ($number % 100) <= 13) {
                                                        return $number . 'th';
                                                    } else {
                                                        return $number . $suffix[$number % 10];
                                                    }
                                                }

                                                $sql = "SELECT evaluation.course, COUNT(evaluation.course) AS num_books_read
        FROM evaluation
        GROUP BY evaluation.course
        ORDER BY num_books_read DESC
        LIMIT 3";

                                                $result = mysqli_query($conn, $sql);

                                                $count = 1;
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<div>';
                                                        echo '<i class="fas fa-award fa-2x"></i> ' . ordinal_suffix($count++) . " Course: " . $row["course"] . "<br>Books Read: " . $row["num_books_read"] . "<br><br>";
                                                        echo '</div>';
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }

                                                mysqli_close($conn);
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Third card -->
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body"style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1"
                                                style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                                MOST REVIEWED BOOKS</div>
                                            <div class="h6 mb-0  text-gray-800">
                                                <?php
                                                include "conn.php";

                                                // Check connection
                                                if (!$conn) {
                                                    die ("Connection failed: " . mysqli_connect_error());
                                                }


                                                $sql = "SELECT evaluation.titles, COUNT(evaluation.titles) AS num_reviews
                                FROM evaluation
                                GROUP BY evaluation.titles
                                ORDER BY num_reviews DESC
                                LIMIT 3";

                                                $result = mysqli_query($conn, $sql);

                                                $count = 1;
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<div>';
                                                        echo '<i class="fas fa-award fa-2x"></i> ' . ordinal_suffix($count++) . ' Book Title: ' . $row["titles"] . '<br>Reviews: ' . $row["num_reviews"] . '<br><br>';
                                                        echo '</div>';

                                                    }
                                                } else {
                                                    echo "0 results";
                                                }

                                                mysqli_close($conn);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fourth card -->
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body"style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1"
                                                style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                                LEAST REVIEWED BOOKS</div>
                                            <div class="h6 mb-0  text-gray-800">
                                                <?php
                                                include "conn.php";

                                                // Check connection
                                                if (!$conn) {
                                                    die ("Connection failed: " . mysqli_connect_error());
                                                }

                                                $sql = "SELECT evaluation.titles, COUNT(evaluation.titles) AS num_reviews
                        FROM evaluation
                        GROUP BY evaluation.titles
                        ORDER BY num_reviews ASC
                        LIMIT 3"; // Changed ORDER BY to ASC to get the least reviewed books
                                                
                                                $result = mysqli_query($conn, $sql);

                                                $count = 1;
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<div>';
                                                        echo   $count++ . " Book Title: " . $row["titles"] . "<br>Reviews: " . $row["num_reviews"] . "<br><br>";
                                                        echo '</div>';
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }

                                                mysqli_close($conn);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Content Row -->

                            <div class="row">

                                <!-- Contents -->
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
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-dark" href="/capstone/index.php">Logout</a>
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

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

            <script>

                $(function () {
                    $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                        var rating = data.rating;
                        $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                        $(this).parent().find('.result').text('rating :' + rating);
                        $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
                    });
                });

            </script>

</body>

</html>
<?php
require 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO ratee (name,rate) VALUES ('$name','$rating')";
    if (mysqli_query($conn, $sql)) {
        echo "New Rate addedddd successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>