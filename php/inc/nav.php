<?php
$loggedIn = false;

if(isset($_SESSION['username'])) {
    $loggedIn = true;
}
?>

<div class="rbt-header-wrapper header-space-betwween header-sticky">
    <div class="container-fluid">
        <div class="mainbar-row rbt-navigation-center align-items-center">
            <div class="header-left rbt-header-content">
                <div class="header-info">
                    <div class="logo">
                        <a href="/">
                            <img src="/assets/images/logo/logo4.png" alt="Education Logo Images">
                        </a>
                    </div>
                </div>

            </div>

            <div class="rbt-main-navigation d-none d-xl-block">
                <nav class="mainmenu-nav">
                    <ul class="mainmenu">
                        <li class="">
                            <a href="/dashboard.php">Home </a>

                        </li>
                        <li class="">
                            <a href="/courses.php">All Courses </a>
                        </li>
                        <li class="">
                            <a href="/instructors.php">Our Instructors </a>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="header-right">

                <!-- Navbar Icons -->
                <ul class="quick-access">

                    <?php if($loggedIn == true): ?>

                    <li class="account-access rbt-user-wrapper d-none d-xl-block">
                        <a href="#"><i class="feather-user"></i><?php echo $_SESSION['username']; ?></a>
                        <div class="rbt-user-menu-list-wrapper">
                            <div class="inner">
                                <div class="rbt-admin-profile">
                                    <div class="admin-thumbnail">
                                        <img src="assets/images/team/avatar.jpg" alt="User Images">
                                    </div>
                                    <div class="admin-info">
                                        <span class="name">Kool</span>
                                        <a class="rbt-btn-link color-primary" href="/user/profile.php">View Profile</a>
                                    </div>
                                </div>
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="/dashboard.php">
                                            <i class="feather-home"></i>
                                            <span>My Dashboard</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="instructor-enrolled-courses.html">
                                            <i class="feather-shopping-bag"></i>
                                            <span>Enrolled Courses</span>
                                        </a>
                                    </li>



                                </ul>
                                <hr class="mt--10 mb--10">


                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="/auth/change-password.php">
                                            <i class="feather-settings"></i>
                                            <span>Change Passwrod</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/auth/logout.php">
                                            <i class="feather-log-out"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <?php else: ?>
                    <div class="rbt-btn-wrapper d-none d-xl-block">
                        <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none"
                            href="/auth/login.php">
                            <span data-text="Login">Login</span>
                        </a>
                    </div>
                    &nbsp;
                    <div class="rbt-btn-wrapper d-none d-xl-block">
                        <a class="rbt-btn radius-round btn-sm hover-transform-none" href="/auth/register.php">
                            <span data-text="Login">Register</span>
                        </a>
                    </div>
                    <?php endif; ?>

                    <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                        <a class="rbt-round-btn" href="#"><i class="feather-user"></i></a>
                        <div class="rbt-user-menu-list-wrapper">
                            <div class="inner">
                                <div class="rbt-admin-profile">
                                    <div class="admin-thumbnail">
                                        <img src="assets/images/team/avatar.jpg" alt="User Images">
                                    </div>
                                    <div class="admin-info">
                                        <span class="name">Nipa Bali</span>
                                        <a class="rbt-btn-link color-primary" href="profile.html">View Profile</a>
                                    </div>
                                </div>
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="instructor-dashboard.html">
                                            <i class="feather-home"></i>
                                            <span>My Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="feather-bookmark"></i>
                                            <span>Bookmark</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instructor-enrolled-courses.html">
                                            <i class="feather-shopping-bag"></i>
                                            <span>Enrolled Courses</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instructor-wishlist.html">
                                            <i class="feather-heart"></i>
                                            <span>Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instructor-reviews.html">
                                            <i class="feather-star"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instructor-my-quiz-attempts.html">
                                            <i class="feather-list"></i>
                                            <span>My Quiz Attempts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instructor-order-history.html">
                                            <i class="feather-clock"></i>
                                            <span>Order History</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instructor-quiz-attempts.html">
                                            <i class="feather-message-square"></i>
                                            <span>Question & Answer</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr class="mt--10 mb--10">
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="#">
                                            <i class="feather-book-open"></i>
                                            <span>Getting Started</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr class="mt--10 mb--10">
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="instructor-settings.html">
                                            <i class="feather-settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html">
                                            <i class="feather-log-out"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>



                <!-- Start Mobile-Menu-Bar -->
                <div class="mobile-menu-bar d-block d-xl-none">
                    <div class="hamberger">
                        <button class="hamberger-button rbt-round-btn">
                            <i class="feather-menu"></i>
                        </button>
                    </div>
                </div>
                <!-- Start Mobile-Menu-Bar -->

            </div>
        </div>
    </div>
    <!-- Start Search Dropdown  -->
    <div class="rbt-search-dropdown">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#">
                        <input type="text" placeholder="What are you looking for?">
                        <div class="submit-btn">
                            <a class="rbt-btn btn-gradient btn-md" href="#">Search</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="rbt-separator-mid">
                <hr class="rbt-separator m-0">
            </div>

            <div class="row g-4 pt--30 pb--60">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h5 class="rbt-title-style-2">Our Top Course</h5>
                    </div>
                </div>

                <!-- Start Single Card  -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="course-details.html">
                                <img src="assets/images/course/course-online-01.jpg" alt="Card image">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="course-details.html">React Js</a>
                            </h5>
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (15 Reviews)</span>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$15</span>
                                    <span class="off-price">$25</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="course-details.html">
                                <img src="assets/images/course/course-online-02.jpg" alt="Card image">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="course-details.html">Java Program</a>
                            </h5>
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (15 Reviews)</span>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$10</span>
                                    <span class="off-price">$40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="course-details.html">
                                <img src="assets/images/course/course-online-03.jpg" alt="Card image">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="course-details.html">Web Design</a>
                            </h5>
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (15 Reviews)</span>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$10</span>
                                    <span class="off-price">$20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="course-details.html">
                                <img src="assets/images/course/course-online-04.jpg" alt="Card image">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="course-details.html">Web Design</a>
                            </h5>
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (15 Reviews)</span>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$20</span>
                                    <span class="off-price">$40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            </div>

        </div>
    </div>
    <!-- End Search Dropdown  -->
</div>