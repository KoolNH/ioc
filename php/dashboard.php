<?php
session_start();
include('./inc/db-connect.php');
include('./auth/_check-loggedin.php');


    // count my courses
    $id = $loggedInUser['id'];
    $sql = "SELECT COUNT(*) AS no_my_courses FROM courses WHERE instructor_id='$id'";
    $result = $conn->query($sql);
    $result = $result->fetch();

    $no_my_courses = $result['no_my_courses'];
    $loggedInUser['no_my_courses'] = $no_my_courses;

    // count enrolled courses
    $id = $loggedInUser['id'];
    $sql = "SELECT COUNT(*) AS no_enrolled_courses FROM enrollments WHERE learner_id='$id'";
    $result = $conn->query($sql);
    $result = $result->fetch();

    $no_enrolled_courses = $result['no_enrolled_courses'];
    $loggedInUser['no_enrolled_courses'] = $no_enrolled_courses;

    // count enrollments
    $instructor_id = $loggedInUser['id']; 
    $sql = "SELECT COUNT(*) as no_learners FROM `enrollments` INNER JOIN courses ON enrollments.course_id = courses.id WHERE instructor_id='$instructor_id'";
    $result = $conn->query($sql);
    $result = $result->fetch();

    $no_learners = $result['no_learners'];
    $loggedInUser['no_learners'] = $no_learners;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ioc</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/plugins/sal.css">
    <link rel="stylesheet" href="assets/css/plugins/feather.css">
    <link rel="stylesheet" href="assets/fontawesome-free-5.5.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/plugins/euclid-circulara.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper.css">
    <link rel="stylesheet" href="assets/css/plugins/magnify.css">
    <link rel="stylesheet" href="assets/css/plugins/odometer.css">
    <link rel="stylesheet" href="assets/css/plugins/animation.css">
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/plugins/magnigy-popup.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plyr.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Start Header Area -->
    <header class="rbt-header rbt-header-10">
        <div class="rbt-sticky-placeholder"></div>
        <!-- Start Header Top  -->

        <!-- End Header Top  -->
        <?php include('inc/nav.php');?>
        <!-- Start Side Vav -->
        <?php include('inc/side-left.php');?>
        <!-- End Side Vav -->
        <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
    </header>
    <!-- Mobile Menu Section -->
    <?php include('inc/mobile-menu.php');?>
    <!-- Start Side Vav -->

    <!-- End Side Vav -->
    <a class="close_side_menu" href="javascript:void(0);"></a>
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
    </div>
    <!-- Start Card Style -->
    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <?php include("./user/user-top.php"); ?>
                    

                    <div class="row g-5">
                        <div class="col-lg-3">
                            <!-- Start Dashboard Sidebar  -->
                            <?php include('inc/side-bar.php');?>
                            <!-- End Dashboard Sidebar  -->
                        </div>

                        <div class="col-lg-9">
                            <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                                <div class="content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Dashboard</h4>
                                    </div>
                                    <div class="row g-5">

                                        <?php if ($loggedInUser['role'] == 'instructor'): ?>
                                        <!-- Start Single Card  -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-primary-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-primary-opacity">
                                                        <i class="feather-book-open"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter without-icon color-primary"><span class="odometer" data-count="<?php echo $loggedInUser['no_my_courses']; ?>">00</span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">My Courses</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->

                                        <!-- Start Single Card  -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-pink-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-pink-opacity">
                                                        <i class="feather-users"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter without-icon color-pink"><span class="odometer" data-count="<?php echo $loggedInUser['no_learners'] ?>"><?php echo $loggedInUser['no_learners'] ?></span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">Leaners</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->
                                        <?php endif; ?>

                                        <!-- Start Single Card  -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-primary-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-primary-opacity">
                                                        <i class="feather-book-open"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter without-icon color-primary"><span class="odometer" data-count="<?php echo $loggedInUser['no_enrolled_courses']; ?>">00</span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">Enrolled Courses</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Footer aera -->
<?php include ('inc/footer.php');?>
    <!-- End Footer aera -->
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- sal.js -->
    <script src="assets/js/vendor/sal.js"></script>
    <script src="assets/js/vendor/swiper.js"></script>
    <script src="assets/js/vendor/magnify.min.js"></script>
    <script src="assets/js/vendor/jquery-appear.js"></script>
    <script src="assets/js/vendor/odometer.js"></script>
    <script src="assets/js/vendor/backtotop.js"></script>
    <script src="assets/js/vendor/isotop.js"></script>
    <script src="assets/js/vendor/imageloaded.js"></script>

    <script src="assets/js/vendor/wow.js"></script>
    <script src="assets/js/vendor/waypoint.min.js"></script>
    <script src="assets/js/vendor/easypie.js"></script>
    <script src="assets/js/vendor/text-type.js"></script>
    <script src="assets/js/vendor/jquery-one-page-nav.js"></script>
    <script src="assets/js/vendor/bootstrap-select.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.js"></script>
    <script src="assets/js/vendor/magnify-popup.min.js"></script>
    <script src="assets/js/vendor/paralax-scroll.js"></script>
    <script src="assets/js/vendor/paralax.min.js"></script>
    <script src="assets/js/vendor/countdown.js"></script>
    <script src="assets/js/vendor/plyr.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>