<?php
include('../inc/db-connect.php');

$errors = [];


if (!empty($_POST)) {
    // get data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['fullName'];
    $phone = $_POST['phone'];
    //

    // clean data
    $username = trim($username);
    $password = trim($password);
    //
    
    
    /* validate data */
    // validate username
    if (empty($username)) {
        $errors['username'] = 'Pls enter username!';
    }
    
    // TODO: validate if exist

    if (empty($password)) {
        $errors['password'] = 'Pls enter password!';
    }

    // confirm password = password

    // TODO: format email, phone
    
    // if valid
    if (count($errors) == 0) {
        $password = sha1($password);
        
        // insert user into db
        $sql = "INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `avatar`, `phone`) VALUES (NULL, 'learner', '$username', '$password', '$name', '', '$phone');";
        $result = $conn->query($sql);

        // redirect to /enrolled courses
        header('Location: /dashboard.php');
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
    
    <?php include('../inc/css.php');?>
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
                    <div class="row g-5">
                        <div class="col-lg-2">
                        </div>
                        
                        <div class="col-lg-8">
                            <div class="rbt-my-account-inner">
                                <div class="account-details-form">
                                    <form action="" method="post">
                                        <div class="row g-5">
                                            
                                            
                                            <div class="col-12">
                                                <h4>Register</h4>
                                            </div>
                                            
                                            <div class="col-lg-12 col-12">
                                                <input id="" placeholder="Username" type="text" name="username">

                                                <?php if (isset($errors['username'])): ?>
                                                    <small class="text-danger"><?php echo $errors['username']; ?></small>
                                                <?php endif; ?>

                                            </div>          
                                            
                                            
                                            <div class="col-lg-6 col-12">
                                                <input id="new-pwd" placeholder="Password" type="password" name="password">
                                                <?php if (isset($errors['password'])): ?>
                                                    <small class="text-danger"><?php echo $errors['password']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="col-lg-6 col-12">
                                                <input id="confirm-pwd" placeholder="Confirm Password" type="password" name="confirmPassword">
                                            </div>
                                            
                                            <div class="col-lg-12 col-12">
                                                <input id="" placeholder="Full Name" type="text" name="fullName">
                                            </div>   
                                            
                                            <div class="col-lg-12 col-12">
                                                <input id="" placeholder="Phone" type="text" name="phone">
                                            </div>  
                                            
                                            
                                            <div class="col-lg-12 col-12">
                                                <input id="" placeholder="Email" type="text" name="email">
                                            </div>   
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-12">
                                                <button class="rbt-btn btn-gradient icon-hover">
                                                    <span class="btn-text">Ok</span>
                                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                </button>
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