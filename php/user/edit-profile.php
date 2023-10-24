<?php
include('../inc/db-connect.php');

include('../auth/_check-loggedin.php');

// get user with username
$sql ="SELECT * FROM `users` WHERE username='$username' ";
$result = $conn->query($sql);
$user = $result->fetch();

$errors = [];
$phone = $user['phone'];
$email = $user['email'];
$fullName = $user['name'];


if (!empty($_POST)) {
    // get data
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    //

    // clean data
    $fullName = trim($fullName);
    $phone = trim($phone);
    $email = trim($email);
    //
    
    
    /* validate data */

    if (empty($fullName)) {
        $errors['fullName'] = 'Please enter Full Name!';
    }
    
    if (empty($phone)) {
        $errors['phone'] = 'Please enter Phone!';
    } else {
        $phonePattern = '/^\d{10,15}$/';
        if (!preg_match($phonePattern, $phone)) {
        $errors['phone'] = 'Invalid phone!';
        }
    }
    
    // check if empty
    if (empty($email)) {
        $errors['email'] = 'Please enter Email!';
    } else {
        // check format email
        $emailPattern = '/^\S+@\S+\.\S+$/'; 
        if (!preg_match($emailPattern, $email)) {
            $errors['email'] = 'Invalid email!';
        }
    }
    
    // if valid
    if (count($errors) == 0) {
        
        // insert user into db
        $sql = "UPDATE `users` SET `name` = '$fullName', `phone` = '$phone', `email` = '$email' WHERE `username` = '$username';";
        $result = $conn->query($sql);

        // redirect to /enrolled courses
        header('Location: /user/profile.php');
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
                        <!-- Start Dashboard Top  -->
                        <div class="rbt-dashboard-content-wrapper">
                            <div class="tutor-bg-photo bg_image bg_image--22 height-350"></div>
                            <!-- Start Tutor Information  -->
                            <div class="rbt-tutor-information">
                                <div class="rbt-tutor-information-left">
                                    <div class="thumbnail rbt-avatars size-lg">
                                        <img src="..//assets/images/team/avatar.jpg" alt="Instructor">
                                    </div>
                                    <div class="tutor-content">
                                        <h5 class="title">John Due</h5>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <!-- End Tutor Information  -->
                        </div>
                        <!-- End Dashboard Top  -->
                        
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
                                                <h4 class="rbt-title-style-3">My Profile</h4>
                                                
                                            </div>
                                            
                                            <!-- Start Profile Row  -->
                                            <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="rbt-profile-content b2">Full Name</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2">
                                                        <input id="" placeholder="Fullname" type="text" name="fullName" value="<?php echo $fullName; ?>" required>
                                                        
                                                        <?php if (isset($errors['fullName'])): ?>
                                                        <small class="text-danger"><?php echo $errors['fullName']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Row  -->
                                            
                                            
                                            <!-- Start Profile Row  -->
                                            <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="rbt-profile-content b2">Email</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2">
                                                        <div class="rbt-profile-content b2">
                                                            <input id="" placeholder="Email" type="text" name="email" value="<?php echo $email; ?>" required>
                                                            
                                                            <?php if (isset($errors['email'])): ?>
                                                            <small class="text-danger"><?php echo $errors['email']; ?></small>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Row  -->
                                            
                                            <!-- Start Profile Row  -->
                                            <div class="rbt-profile-row row row--15 mt--15">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="rbt-profile-content b2">Phone Number</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="rbt-profile-content b2">
                                                        <input id="" placeholder="Phone" type="text" name="phone" value="<?php echo $phone; ?>" required>
                                                        
                                                        <?php if (isset($errors['phone'])): ?>
                                                        <small class="text-danger"><?php echo $errors['phone']; ?></small>
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