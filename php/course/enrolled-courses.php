<?php
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');


$id = $loggedInUser['id'];
$sql = "SELECT * FROM `courses` WHERE `user_id`=$id";

// search course
$name ="";



//search by name
if(isset($_GET['name'])) {
    $name = $_GET['name'];
    $sql = $sql . " AND name LIKE  '%$name%'";
}




// pagintation
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];

}

$limit = 2;


// no of items
$result = $conn->query($sql);
$courses = $result->fetchAll();
$noItems = count($courses);

$noPages = floor( $noItems / $limit);



$offset = ($page - 1) * $limit;

$sql = $sql . " ORDER BY id DESC";
$sql = $sql . " LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
$courses = $result->fetchAll();



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
            <?php include('../inc/nav.php');?>
            
            <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
        </header>

        <?php include('../inc/message.php'); ?>
        
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
                        <?php include('../inc/_instructor-info.php') ?>
                        
                        <div class="row g-5">
                            <div class="col-lg-3">
                                <!-- Start Dashboard Sidebar  -->
                                <?php include('../inc/side-bar.php');?>
                                <!-- End Dashboard Sidebar  -->
                            </div>
                           
                            
                            <div class="col-lg-9">
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                                    <div class="content">
                                        
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">All Courses
                                            </h4>
                                            
                                            <form action="" class="row row--15">
                                                <div class="col-lg">
                                                    <div class="form-group focused" >
                                                        <input name="name" type="text"value = "<?php echo $name ?>" >
                                                        <label>Course Name</label>
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg">
                                                    <div class="form-submit-group">
                                                        <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                                            <span class="icon-reverse-wrapper">
                                                                <span class="btn-text">Search</span>
                                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                                <a href="/course/course-details.php?id=<?php echo $course['id'] ?>">
                                                                    <img src="<?php echo $course['image']  ?>" alt="Card image">
                                                                </a>
                                                            </div>
                                                            <div class="rbt-card-body">
                                                                <div class="rbt-card-top">
                                                                    
                                                                    
                                                                </div>
                                                                <h4 class="rbt-card-title"><a href="/course/course-details.php?id=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a>
                                                                </h4>
                                                                <ul class="rbt-meta">
                                                                    <li><i class="feather-book"></i>20 Lessons</li>
                                                                    <li><i class="feather-users"></i>40 Students</li>
                                                                </ul>
                                                                
                                                                <a class="btn btn-primary btn-lg" href="/course/edit-course.php?id=<?php echo $course['id'] ?>"> Edit </a>

                                                                <form method="post" action="/course/delete-course.php?id=<?php echo $course['id'] ?>" class="d-inline">
                                                                    <button class="btn btn-danger btn-lg" onclick="return confirm('Are you sure?');"> Delete </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12 mt--60">
                                                    <nav>
                                                        <ul class="rbt-pagination">
                                                            <?php if($page != 1): ?>
                                                                <li><a href="?page=<?php echo $page - 1  ?>&name=<?php echo $name;?>" aria-label="Previous"><i class="feather-chevron-left"></i></a></li>
                                                            <?php endif; ?>

                                                            <?php for($i=1; $i <= $noPages; $i++): ?>
                                                                <li class="<?php if($page == $i) { echo 'active'; } ?>"><a href="?page=<?php echo $i; ?>&name=<?php echo $name;?>"><?php echo $i; ?></a></li>
                                                            <?php endfor; ?>

                                                            <?php if($page != $noPages): ?>
                                                                <li><a href="?page=<?php echo $page + 1 ?>&name=<?php echo $name;?>" aria-label="Next"><i class="feather-chevron-right"></i></a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </nav>
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
        <!-- Start Footer aera -->
        <?php include ('../inc/footer.php');?>
        <!-- End Footer aera -->
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