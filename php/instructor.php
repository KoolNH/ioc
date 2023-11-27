<?php
session_start();
include('./inc/db-connect.php');

// get user with username
if (!isset($_GET['username'])) {
    header('Location: /instructors.php');
}

$username = $_GET['username'];

$sql ="SELECT * FROM `users` WHERE username='$username' ";
$result = $conn->query($sql);
$user = $result->fetch();

// id not exist => not found
if ($user == false) {
    header('Location: /404.php');
}


$id = $user['id'];
$sql = "SELECT * FROM `courses` WHERE `instructor_id`=$id";
$result = $conn->query($sql);
$courses = $result->fetchAll();

// count topics
foreach ($courses as $i => $course) {
    $course_id = $course['id'];
    $sql = "SELECT COUNT(*) AS no_topics FROM topics WHERE course_id='$course_id'";
    $result = $conn->query($sql);
    $result = $result->fetch();

    $no_topics = $result['no_topics'];
    $courses[$i]['no_topics'] = $no_topics;
}

// count enrollments
foreach ($courses as $i => $course) {
    $course_id = $course['id']; 
    $sql = "SELECT COUNT(*) as no_enrollments FROM `enrollments` WHERE course_id='$course_id'";
    $result = $conn->query($sql);
    $result = $result->fetch();

    $no_enrollments = $result['no_enrollments'];
    $courses[$i]['no_enrollments'] = $no_enrollments;
}


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
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
    
    <!-- CSS
        ============================================ -->
        <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/slick.css">
        <link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
        <link rel="stylesheet" href="/assets/css/plugins/sal.css">
        <link rel="stylesheet" href="/assets/css/plugins/feather.css">
        <link rel="stylesheet" href="/assets/fontawesome-free-5.5.0-web/css/fontawesome.min.css">
        <link rel="stylesheet" href="/assets/css/plugins/euclid-circulara.css">
        <link rel="stylesheet" href="/assets/css/plugins/swiper.css">
        <link rel="stylesheet" href="/assets/css/plugins/magnify.css">
        <link rel="stylesheet" href="/assets/css/plugins/odometer.css">
        <link rel="stylesheet" href="/assets/css/plugins/animation.css">
        <link rel="stylesheet" href="/assets/css/plugins/bootstrap-select.min.css">
        <link rel="stylesheet" href="/assets/css/plugins/jquery-ui.css">
        <link rel="stylesheet" href="/assets/css/plugins/magnigy-popup.min.css">
        <link rel="stylesheet" href="/assets/css/plugins/plyr.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    
    <body>
        <!-- Start Header Area -->
        <header class="rbt-header rbt-header-10">
            <div class="rbt-sticky-placeholder"></div>
            <!-- Start Header Top  -->
            
            <!-- End Header Top  -->
            <?php include('./inc/nav.php');?>
            <!-- Start Side Vav -->
            <?php include('./inc/side-left.php');?>
            <!-- End Side Vav -->
            <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
        </header>
        <!-- Mobile Menu Section -->
        <?php include('./inc/mobile-menu.php');?>
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
                        
                        <div class="row g-5">
                            
                            <div class="col-lg-12">
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                                    <div class="content">
                                        <div class="section-title d-flex justify-content-between align-items-center">
                                            <h4 class="rbt-title-style-3">Instructor Profile</h4>
                                        </div>
                                        
                                        
                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2">Username</div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2"><?php echo $user['username']; ?></div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->
                                        
                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2">Full Name</div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2"><?php echo $user['name']; ?></div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->
                                        
                                        
                                        
                                        
                                        
                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2">Email</div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2"><?php echo $user['email']; ?></div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->
                                        
                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2">Phone Number</div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2"><?php echo $user['phone']; ?></div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->
                                        
                                        <!-- Start Profile Row  -->
                                        <div class="rbt-profile-row row row--15 mt--15">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="rbt-profile-content b2">Register Date</div>
                                            </div>
                                            <div class="col-lg-8 col-md-8">
                                                <div class="rbt-profile-content b2"><?php echo $user['registered_at']; ?></div>
                                            </div>
                                        </div>
                                        <!-- End Profile Row  -->
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- courses -->
                            <div class="col-lg-12">
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                                    <div class="content">
                                        
                                        <div class="section-title">
                                            <div class="section-title">
                                                <h4 class="rbt-title-style-3">Courses</h4>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="publish-4" role="tabpanel" aria-labelledby="publish-tab-4">
                                                <div class="row g-5">

                                                <?php if(count($courses) == 0): ?>
                                                    <p class="text-danger">No Information</p>
                                                    <?php endif;?>

                                                    <!-- Start Single Course  -->
                                                    <?php foreach($courses as $course):?>
                                                    <div class="col-lg-4 col-md-6 col-12">
                                                        <div class="rbt-card variation-01 rbt-hover">
                                                            <div class="rbt-card-img">
                                                                <a href="/course.php?id=<?php echo $course['id'] ?>">
                                                                    <img src="<?php echo $course['image']  ?>" alt="Card image">
                                                                </a>
                                                            </div>
                                                            <div class="rbt-card-body">
                                                                <div class="rbt-card-top">
                                                                    
                                                                    
                                                                </div>
                                                                <h4 class="rbt-card-title"><a href="/course.php?id=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a>
                                                                </h4>
                                                                <ul class="rbt-meta">
                                                                    <li><i class="feather-book"></i><?php echo $course['no_topics']; ?> Topics</li>
                                                                    <li><i class="feather-users"></i><?php echo $course['no_enrollments']; ?> Learner</li>
                                                                </ul>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    
                                                </div>
                                            </div>
                                            
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
        
        <div class="rbt-progress-parent">
            <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        
        <!-- JS
            ============================================ -->
            <!-- Modernizer JS -->
            <script src="/assets/js/vendor/modernizr.min.js"></script>
            <!-- jQuery JS -->
            <script src="/assets/js/vendor/jquery.js"></script>
            <!-- Bootstrap JS -->
            <script src="/assets/js/vendor/bootstrap.min.js"></script>
            <!-- sal.js -->
            <script src="/assets/js/vendor/sal.js"></script>
            <script src="/assets/js/vendor/swiper.js"></script>
            <script src="/assets/js/vendor/magnify.min.js"></script>
            <script src="/assets/js/vendor/jquery-appear.js"></script>
            <script src="/assets/js/vendor/odometer.js"></script>
            <script src="/assets/js/vendor/backtotop.js"></script>
            <script src="/assets/js/vendor/isotop.js"></script>
            <script src="/assets/js/vendor/imageloaded.js"></script>
            
            <script src="/assets/js/vendor/wow.js"></script>
            <script src="/assets/js/vendor/waypoint.min.js"></script>
            <script src="/assets/js/vendor/easypie.js"></script>
            <script src="/assets/js/vendor/text-type.js"></script>
            <script src="/assets/js/vendor/jquery-one-page-nav.js"></script>
            <script src="/assets/js/vendor/bootstrap-select.min.js"></script>
            <script src="/assets/js/vendor/jquery-ui.js"></script>
            <script src="/assets/js/vendor/magnify-popup.min.js"></script>
            <script src="/assets/js/vendor/paralax-scroll.js"></script>
            <script src="/assets/js/vendor/paralax.min.js"></script>
            <script src="/assets/js/vendor/countdown.js"></script>
            <script src="/assets/js/vendor/plyr.js"></script>
            <!-- Main JS -->
            <script src="/assets/js/main.js"></script>
        </body>
        
        </html>