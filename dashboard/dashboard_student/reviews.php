<?php
include "conn.php";
session_start();

if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true || (isset($_SESSION['logout_flag']) && $_SESSION['logout_flag'] === true)) {
    header("Location: /capstone/dashboard/dashboard_student/index.php");
    exit();
}

$session_timeout = 600; 
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    $_SESSION['logout_flag'] = true;
    session_unset();
    session_destroy();
    header("Location: /capstone/dashboard/dashboard_student/index.php");
    exit();
}

$_SESSION['last_activity'] = time();

if (isset($_GET['logout'])) {
    $_SESSION['logout_flag'] = true;
    session_unset();
    session_destroy();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

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
            <button type="button" class="btn btn-success d-flex justify-content-start" data-toggle="modal" data-target="#reviewsModal">
    <i class="fas fa-fw fa-book mr-2"></i>
    <span class="small">BOOK REVIEWS</span>
</button>
<br>
<button type="button" class="btn btn-success d-flex justify-content-start" onclick="window.location.href = 'reviews.php';">
    <i class="fas fa-fw fa-book mr-2"></i>
    <span class="small">REVIEWS</span>
</button>


<!-- Modal -->
<div class="modal fade" id="reviewsModal" tabindex="-1" aria-labelledby="reviewsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewsModalLabel">EVALUATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Evaluation Form -->
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="title">TITLE:</label>
                        <input type="text" class="form-control" name="title" id="title" autocomplete="off">
                        <div id="titleSuggestions"></div>
                    </div>

                    <div class="mb-3">
    <label for="course" class="form-label">Course:</label>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_ccje" value="CCCJE" required>
      <label class="form-check-label" for="course_ccje">CCJE</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_coe" value="COE" required>
      <label class="form-check-label" for="course_ccje">COE</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_cite" value="CITE" required>
      <label class="form-check-label" for="course_cite">CITE</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_bsa" value="BSA" required>
      <label class="form-check-label" for="course_bsa">BSA</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_cma" value="CMA-TMNHMBAIS,BSBA" required>
      <label class="form-check-label" for="course_cma">CMA</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_coed" value="COED" required>
      <label class="form-check-label" for="course_coed">COED</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_cahs" value="CAHS" required>
      <label class="form-check-label" for="course_cahs">CAHS</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_mar" value="MAR-E" required>
      <label class="form-check-label" for="course_mar">COME</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_shs" value="SHS" required>
      <label class="form-check-label" for="course_shs">SHS</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="course" id="course_gschool" value="GRADESCHOOL" required>
      <label class="form-check-label" for="course_gschool">BEED</label>
    </div>
   

                    <div class="form-group">
                        <label for="feedback">FEEDBACKS:</label>
                        <textarea class="form-control" name="feedback" id="feedback" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="recommendation">RECOMMENDATIONS:</label>
                        <textarea class="form-control" name="recommendation" id="recommendation" rows="3"></textarea>
                    </div>

                    <div class="col-md-7 form-group">
                        <label for="rating">RATING:</label>
                        <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5"
                            data-rateyo-score="3"></div>
                        <span class="result">0</span>
                        <input type="hidden" name="rating">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="clearButton">CLEAR</button>
                        <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form> <!-- Closing the form tag here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Handle input change for title suggestions
        $('#title').on('input', function () {
            var input = $(this).val();

            // Perform AJAX request to fetch title suggestions
            $.ajax({
                type: 'GET',
                url: 'fetch_titles.php',
                data: { input: input },
                success: function (data) {
                    $('#titleSuggestions').html(data).addClass('suggestions-styling');

                    // Handle click on suggestion
                    $('#titleSuggestions div').on('click', function (e) {
                        e.stopPropagation(); // Prevent the click from reaching the document click handler

                        var selectedTitle = $(this).text();

                        // Fill the title input with the selected title
                        $('#title').val(selectedTitle);

                        // You may want to perform another AJAX request to fetch additional data based on the selected title
                        // Update the content of other form fields (feedback, recommendation, etc.) as needed
                        // For simplicity, let's assume there's a function fetchAdditionalData() to handle this
                        fetchAdditionalData(selectedTitle);

                        // Hide the suggestions
                        $('#titleSuggestions').empty();
                    });
                }
            });
        });

        // Handle click on the document to hide suggestions
        $(document).on('click', function () {
            $('#titleSuggestions').empty();
        });

        // Prevent hiding suggestions when clicking inside the suggestions div
        $('#titleSuggestions').on('click', function (e) {
            e.stopPropagation(); // Prevent the click from reaching the document click handler
        });

        function fetchAdditionalData(title) {
            // Perform AJAX request to fetch additional data based on the selected title
            // Update the content of other form fields (feedback, recommendation, etc.) as needed
        }
    });
</script>


<script>
    document.getElementById("clearButton").addEventListener("click", function () {
        // Clear form fields here
        document.getElementById("title").value = "";
        document.getElementById("feedback").value = "";
        document.getElementById("recommendation").value = "";

        
        // Clear title suggestions and remove margin
        $('#titleSuggestions').empty().removeClass('suggestions-hidden');
    });
</script>

<style>
    .suggestions-styling {
        
        border: 1px solid #ccc; 
    }

    .suggestions-styling div {
        margin-top: 7px;
        margin-bottom: 7px; 
        position: relative; /* Necessary for absolute positioning of the icon */
    }

   

    .suggestions-styling div:hover {
        background-color: #f0f0f0; /* Background color on hover */
        cursor: pointer; /* Change cursor to a pointer when hovering over the title */

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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                   
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
    <div class="container">
        <div class="row">
        <!-- Card Example -->
        <?php
    // Include database connection
    include "conn.php";

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to handle like and dislike actions
    function handleLikeDislike($evaluationID, $action) {
        global $conn;
        // Prepare and execute the SQL query to insert like/dislike action
        $sql = "INSERT INTO evaluation_likes (evaluationID, action) VALUES ('$evaluationID', '$action')";
        if (mysqli_query($conn, $sql)) {
            // Retrieve updated like and dislike counts
            $likeCount = getLikeDislikeCount($evaluationID, 'like');
            $dislikeCount = getLikeDislikeCount($evaluationID, 'dislike');
            // Return JSON response with counts
            echo json_encode(array('likeCount' => $likeCount, 'dislikeCount' => $dislikeCount));
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Function to get the count of likes and dislikes for an evaluation
    function getLikeDislikeCount($evaluationID, $action) {
        global $conn;
        $sql = "SELECT COUNT(*) AS count FROM evaluation_likes WHERE evaluationID = '$evaluationID' AND action = '$action'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }

    // Fetch all evaluation records
    $sql = "SELECT * FROM evaluation ORDER BY evaluationID ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Loop through each evaluation record
        while ($row = mysqli_fetch_assoc($result)) {
            // Extract data from the evaluation record
            $evaluationID = $row['evaluationID'];
            $title = $row['titles'];
            $course = $row['course'];
            $feedbacks = $row['feedbacks'];
            $recommendations = $row['recommendations'];
            $ratings = $row['rating'];

            // Fetch book details based on the title from the evaluation record
            $sql_books = "SELECT * FROM books WHERE title = '$title'";
            $result_books = mysqli_query($conn, $sql_books);

            if (mysqli_num_rows($result_books) > 0) {
                $row_books = mysqli_fetch_assoc($result_books);

                // Display the card with evaluation data
                echo '<div class="col-lg-6 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Title: ' . $title . '</h5>';
                echo '<p class="card-text">Course: ' . $course . '</p>';
                echo '<p class="card-text">Feedbacks: ' . $feedbacks . '</p>';
                echo '<p class="card-text">Recommendations: ' . $recommendations . '</p>';
                echo '<p class="card-text">Ratings: ' . $ratings . ' ';
                for ($i = 0; $i < $ratings; $i++) {
                    echo '<i class="fas fa-star"></i>';
                }
                echo '</p>';
                echo '<div class="card-footer">';
                // Like button with count
                $likeCount = getLikeDislikeCount($evaluationID, 'like');
                echo '<button type="button" class="btn btn-success mr-2 likeBtn" data-evaluationid="' . $evaluationID . '">Like (' . $likeCount . ')</button>';
                // Dislike button with count
                $dislikeCount = getLikeDislikeCount($evaluationID, 'dislike');
                echo '<button type="button" class="btn btn-danger dislikeBtn" data-evaluationid="' . $evaluationID . '">Dislike (' . $dislikeCount . ')</button>';
                // Button to trigger book details modal
                echo '<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#bookDetailsModal' . $evaluationID . '">Book Details</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Modal form for book details
                echo '<div class="modal fade" id="bookDetailsModal' . $evaluationID . '" tabindex="-1" role="dialog" aria-labelledby="bookDetailsModalLabel' . $evaluationID . '" aria-hidden="true">';
                echo '<div class="modal-dialog" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="bookDetailsModalLabel' . $evaluationID . '">Book Details</h5>';
                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                // Display book details
                echo '<p>Barcode: ' . $row_books['barcode'] . '</p>';
                echo '<p>Call Number: ' . $row_books['call_no1'] . ' - ' . $row_books['call_no2'] . '</p>';
                echo '<p>Copyright: ' . $row_books['copyright'] . '</p>';
                echo '<p>Title: ' . $row_books['title'] . '</p>';
                echo '<p>Author: ' . $row_books['author'] . '</p>';
                echo '<p>Location: ' . $row_books['location'] . '</p>';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "No book details found for the selected title.";
            }
        }
    } else {
        echo "No evaluation records found.";
    }

    // Close the database connection
    mysqli_close($conn);
?>
<script>
    // Like and Dislike Button Click Handlers
    $(document).ready(function() {
        $('.likeBtn, .dislikeBtn').click(function() {
            var evaluationID = $(this).data('evaluationid');
            var action = $(this).hasClass('likeBtn') ? 'like' : 'dislike';
            var btn = $(this);
            
            // Send AJAX request to handle like/dislike action
            $.ajax({
                type: 'POST',
                url: 'handle_like_dislike.php',
                data: {
                    evaluationID: evaluationID,
                    action: action
                },
                dataType: 'json',
                success: function(data) {
                    // Update like/dislike count on the button
                    btn.text(action.charAt(0).toUpperCase() + action.slice(1) + ' (' + data[action + 'Count'] + ')');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>

    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>

</body>

</html>
<?php
require 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO ratee (name,rate) VALUES ('$name','$rating')";
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate added successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>  