<?php
session_start();
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');
include('../auth/_check-admin.php');


// query db
$sql ="SELECT * FROM `users` WHERE role='learner' ";

/* search */
$name = "";
$phone = "";

// search by name
if(isset($_GET['name'])) {
    $name = $_GET['name'];
    
    $sql = $sql . " AND name LIKE '%$name%'";
    
}

// search by phone
if(isset($_GET['phone'])) {
    $phone = $_GET['phone'];
    
    $sql = $sql . " AND phone LIKE '%$phone%'";
    
}


/* pagination */
$page = 1;
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

$limit = 1; // number of items / page //

// no of items
$result = $conn->query($sql);
$learners = $result->fetchAll();
$noItems = count($learners);

$noPages = $noItems / $limit;


$offset = ($page - 1) * $limit;

$sql = $sql . " LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
$learners = $result->fetchAll();

// count enrollments
foreach ($learners as $i => $learner) {
    $learner_id = $learner['id']; 
    $sql = "SELECT COUNT(*) as no_enrollments FROM `enrollments` WHERE learner_id='$learner_id'";
    $result = $conn->query($sql);
    $result = $result->fetch();
    
    $no_enrollments = $result['no_enrollments'];
    $learners[$i]['no_enrollments'] = $no_enrollments;
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
    
    <?php include('../inc/css.php');?>
    </head>
    
    <body>
        <!-- Start Header Area -->
        <header class="rbt-header rbt-header-10">
            <div class="rbt-sticky-placeholder"></div>
            <!-- Start Header Top  -->
            
            <!-- End Header Top  -->
            <?php include('inc/nav.php');?>
            <!-- Start Side Vav -->
            <?php include('../inc/side-left.php');?>
            <!-- End Side Vav -->
            <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
        </header>

        <?php include('../inc/message.php'); ?>
        
        <!-- Mobile Menu Section -->
        <?php include('../inc/mobile-menu.php');?>
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
                            <div class="col-lg-3">
                                <!-- Start Dashboard Sidebar  -->
                                <?php include('inc/side-bar.php');?>
                                <!-- End Dashboard Sidebar  -->
                            </div>
                            
                            <div class="col-lg-9">
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                                    <div class="content">
                                        
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">All Learners
                                            </h4>
                                            
                                            <form action="" class="row row--15">
                                                <div class="col-lg">
                                                    <div class="form-group focused">
                                                        <input name="name" type="text" value = "<?php echo $name ?>">
                                                        <label>Name</label>
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg">
                                                    <div class="form-group focused">
                                                        <input name="phone" type="text"value = "<?php echo $phone ?>">
                                                        <label>Phone</label>
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
                                                    
                                                    <?php if(count($learners) == 0): ?>
                                                    <p class="text-danger">No Information</p>
                                                    <?php endif;?>
                                                    
                                                    <?php foreach($learners as $learner): ?>
                                                    <!-- Start Single Course  -->
                                                    <div class="col-lg-4 col-md-6 col-12">
                                                        <div class="rbt-card variation-01 rbt-hover">
                                                            <div class="rbt-card-img">
                                                                <a href="/profile.php">
                                                                    <img src="<?php echo $learner['avatar'];?>" alt="Card image">
                                                                </a>
                                                            </div>
                                                            <div class="rbt-card-body">
                                                                <div class="rbt-card-top">
                                                                    
                                                                    
                                                                </div>
                                                                <h4 class="rbt-card-title"><a href="course-details.html"><?php echo $learner['name']; ?></a>
                                                                </h4>
                                                                <ul class="rbt-meta">
                                                                    <li><i class="feather-book"></i><?php echo $learner['no_enrollments'] ?> Courses</li>
                                                                    
                                                                </ul>
                                                                
                                                                <?php if ($learner['is_active']): ?>
                                                                    <form method="post" action="./deactive-learner.php?id=<?php echo $learner['id'] ?>" class="d-inline">
                                                                        <button class="btn btn-danger btn-lg" onclick="return confirm('Are you sure?');"> Deactive </button>
                                                                    </form> 
                                                                <?php else: ?>
                                                                    <small class="text-danger">Deactived</small>
                                                                    <form method="post" action="./active-learner.php?id=<?php echo $learner['id'] ?>" class="d-inline">
                                                                        <button class="btn btn-success btn-lg" onclick="return confirm('Are you sure?');"> Active </button>
                                                                    </form>   
                                                                <?php endif; ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Course  -->
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12 mt--60">
                                                    <nav>
                                                        <ul class="rbt-pagination">
                                                            <?php if($page != 1): ?>
                                                                <li><a href="?page=<?php echo $page - 1  ?>&name=<?php echo $name;?>&phone=<?php echo $phone;?>" aria-label="Previous"><i class="feather-chevron-left"></i></a></li>
                                                            <?php endif; ?>

                                                            <?php for($i=1; $i <= $noPages; $i++): ?>
                                                                <li class="<?php if($page == $i) { echo 'active'; } ?>"><a href="?page=<?php echo $i; ?>&name=<?php echo $name;?>&phone=<?php echo $phone;?>"><?php echo $i; ?></a></li>
                                                            <?php endfor; ?>

                                                            <?php if($page != $noPages): ?>
                                                                <li><a href="?page=<?php echo $page + 1 ?>&name=<?php echo $name;?>&phone=<?php echo $phone;?>" aria-label="Next"><i class="feather-chevron-right"></i></a></li>
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