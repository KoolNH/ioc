<?php
include('../inc/db-connect.php');

include('../auth/_check-loggedin.php');

$errors = [];
$name = "";
$short_description = "";
$description = "";
$url_video_intro ="";


if (!empty($_POST)) {
    // get data
    $name = $_POST['name'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $url_video_intro = $_POST['url_video_intro'];
  

    // clean data
    $name = trim($name);
    $short_description = trim($short_description);
    $description = trim($description); 
    $url_video_intro = trim($url_video_intro);
    
    /* validate data */

    if (empty($name)) {
        $errors['name'] = 'Please enter Name!';
    }
    
    if (empty($short_description)) {
        $errors['short_description'] = 'Please input description!';
    }

    if (empty($description)) {
        $errors['description'] = 'Please input description!';
    }

    if (empty($url_video_intro)) {
        $errors['url_video_intro'] = 'Please get video!';
    } else {
        // check format email
        $urlPattern = '/^(http(s):\/\/.)[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)$/'; 
        if (!preg_match($urlPattern, $url_video_intro)) {
            $errors['url_video_intro'] = 'Invalid url!';
        }
    }
    
    // if valid
    if (count($errors) == 0) {
        $instructor_id = $loggedInUser['id'];

        // insert user into db
        $sql = "INSERT INTO `courses` (`id`, `name`, `short_description`, `description`, `image`, `url_video_intro`, `updated_at`, `instructor_id`) VALUES (NULL, '$name', '$short_description', '$description', NULL, '$url_video_intro', current_timestamp(), '$instructor_id');";
        $result = $conn->query($sql);

        // redirect to /my courses
        header('Location: /course/my-courses.php?message=Added successfully!');
    }
    
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
            <?php include('../inc/nav.php');?>
            <!-- Start Side Vav -->
            <?php include('../inc/side-left.php');?>
            <!-- End Side Vav -->
            <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
        </header>
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
                        <?php
                            include('../inc/_instructor-info.php')
                        ?>
                        
                        <div class="row g-5">
                            <div class="col-lg-3">
                                <!-- Start Dashboard Sidebar  -->
                                <?php include('../inc/side-bar.php');?>
                                <!-- End Dashboard Sidebar  -->
                            </div>
                            
                            <div class="col-lg-9">
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                                    <form action="" method="post">
                                        <div class="content">
                                            <div class="section-title d-flex justify-content-between align-items-center">
                                                <h4 class="rbt-title-style-3">Create New Course</h4>
                                                
                                            </div>
                                            
                                            <!-- Start Profile Row  -->
                                            <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="rbt-profile-content b2">Name</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2">
                                                        <input id="" placeholder="Name" type="text" name="name" value="<?php echo $name; ?>" >
                                                        
                                                        <?php if (isset($errors['name'])): ?>
                                                        <small class="text-danger"><?php echo $errors['name']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Row  -->
                                            
                                            <!-- Start Profile Row  -->
                                            <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="rbt-profile-content b2">Short Description</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2">
                                                        <textarea id="" placeholder="Short Description" name="short_description" ><?php echo $short_description; ?></textarea>
                                                        
                                                        <?php if (isset($errors['short_description'])): ?>
                                                        <small class="text-danger"><?php echo $errors['short_description']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Row  -->

                                             <!-- Start Profile Row  -->
                                             <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="rbt-profile-content b2">Description</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2">
                                                        <textarea id="" placeholder="Description" name="description" rows="10"><?php echo $description; ?></textarea>
                                                        
                                                        <?php if (isset($errors['description'])): ?>
                                                        <small class="text-danger"><?php echo $errors['description']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Row  -->

                                              <!-- Start Profile Row  -->
                                              <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="rbt-profile-content b2">Video Intro</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2">
                                                        <input id="" placeholder="Url" type="text" name="url_video_intro" value="<?php echo $url_video_intro; ?>" >
                                                        
                                                        <?php if (isset($errors['url_video_intro'])): ?>
                                                        <small class="text-danger"><?php echo $errors['url_video_intro']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Row  -->
                                            
                                            
                                       
                                            
                                            
                                            <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2 text-end">
                                                        
                                                        <button class="rbt-btn btn-gradient icon-hover">
                                                            <span class="btn-text">Save</span>
                                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
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