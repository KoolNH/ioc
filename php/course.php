<?php 
 session_start();

include('inc/db-connect.php');

// get course with id
$id = $_GET['id'];
$sql ="SELECT * FROM courses WHERE id='$id';"; 
$result = $conn->query($sql);
$course = $result->fetch();

if ($course == false) {
    header('Location: /404.php');
}

// get all topics of this course

$sql ="SELECT * FROM topics WHERE course_id=$id;"; 
$result = $conn->query($sql);
$topics = $result->fetchAll();



// foreach topic in topics
foreach($topics as $i => $topic) {
    // get all videos of this topic
    $id = $topic['id'];
    $sql ="SELECT * FROM videos WHERE topic_id=$id;"; 
    $result = $conn->query($sql);
    $videos = $result->fetchAll();

    // topic['videos'] = $videos
    $topics[$i]['videos'] = $videos;

    $sql ="SELECT SUM(duration_in_minute) as total FROM videos WHERE topic_id=$id;";
    $result = $conn->query($sql);
    $result = $result->fetch();

    $total = $result['total'];
    $topics[$i]['total'] = $total;

}

// count topics
$course_id = $course['id'];
$sql = "SELECT COUNT(*) AS no_topics FROM topics WHERE course_id='$course_id'";
$result = $conn->query($sql);
$result = $result->fetch();

$no_topics = $result['no_topics'];
$course['no_topics'] = $no_topics;

// count enrollments
$course_id = $course['id']; 
$sql = "SELECT COUNT(*) as no_enrollments FROM `enrollments` WHERE course_id='$course_id'";
$result = $conn->query($sql);
$result = $result->fetch();

$no_enrollments = $result['no_enrollments'];
$course['no_enrollments'] = $no_enrollments;

// total duration
$course_id = $course['id'];
$sql = "SELECT SUM(duration_in_minute) as total FROM `videos` 
    INNER JOIN topics ON videos.topic_id = topics.id 
    INNER JOIN courses ON topics.course_id = courses.id
    WHERE courses.id = $course_id";
$result = $conn->query($sql);
$result = $result->fetch();

$total =  $result['total'];
$course['total'] = $total;

/* instructor info */
// get instructor of this course
$id = $course['instructor_id'];
$sql ="SELECT * FROM users WHERE id=$id;"; 
$result = $conn->query($sql);
$instructor = $result->fetch();

// count courses
$instructor_id = $instructor['id'];
$sql = "SELECT COUNT(*) AS no_courses FROM courses WHERE instructor_id='$instructor_id'";
$result = $conn->query($sql);
$result = $result->fetch();

$no_courses = $result['no_courses'];
$instructor['no_courses'] = $no_courses;

// count enrollments
$instructor_id = $instructor['id']; 
$sql = "SELECT COUNT(*) as no_enrollments FROM `enrollments` INNER JOIN courses ON enrollments.course_id = courses.id WHERE instructor_id='$instructor_id'";
$result = $conn->query($sql);
$result = $result->fetch();

$no_enrollments = $result['no_enrollments'];
$instructor['no_enrollments'] = $no_enrollments;
/* END instructor info */

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
        
        <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">

            <div class="breadcrumb-inner">
                <img src="/assets/images/bg/bg-image-10.jpg" alt="Education Images">
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="content text-start">
                            
                            <h2 class="title"><?php echo $course['name'] ?></h2>
                            <p class="description"><?php echo $course['short_description']?></p>
    
    
                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="/instructor.php?username=<?php echo $instructor['username']?>">
                                        <img src="<?php echo $instructor['avatar']?>" alt="Sophia Jaymes">
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a href="/instructor.php?username=<?php echo $instructor['username']?>"><?php echo $instructor['name'] ?></a>
                                </div>
                            </div>
    
                            <ul class="rbt-meta">
                                <li><i class="feather-calendar"></i>Last updated <?php echo $course['updated_at']?></li>
                                
                                
                            </ul>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-details-area ptb--60">
            <div class="container">
                <div class="row g-5">
    
                    <div class="col-lg-8">
                        <div class="course-details-content">
                            <div class="rbt-course-feature-box rbt-shadow-box thuumbnail">
                                <img class="w-100" src="<?php echo $course['image'] ?>" alt="Card image">
                            </div>
    
                            <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                                <nav class="mainmenu-nav onepagenav">
                                    <ul class="mainmenu">
                                        <li class="current">
                                            <a href="#overview">Overview</a>
                                        </li>
                                        <li class="">
                                            <a href="#coursecontent">Course Content</a>
                                        </li>
                                        
                                        <li class="">
                                            <a href="#intructor">Intructor</a>
                                        </li>
                                        
                                    </ul>
                                </nav>
                            </div>
    
                            <!-- Start Course Feature Box  -->
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more" id="overview">
                                <div class="rbt-course-feature-inner has-show-more-inner-content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">What you'll learn</h4>
                                    </div>
                                        <?php echo $course['description'] ?>
                                </div>
                                <div class="rbt-show-more-btn">Show More</div>
                            </div>
                            <!-- End Course Feature Box  -->
    
                            <!-- Start Course Content  -->
                            <div class="course-content rbt-shadow-box coursecontent-wrapper mt--30" id="coursecontent">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Course Content</h4>
                                    </div>
                                    <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                        <div class="accordion" id="accordionExampleb2">
                                            
                                        <?php foreach($topics as $topic): ?>
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header card-header" id="headingTwo2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                                        <?php echo $topic['name'] ?> <span class="rbt-badge-5 ml--10"><?php echo $topic['total'] ?>min</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2" data-bs-parent="#accordionExampleb2">
                                                    <div class="accordion-body card-body pr--0">
                                                        <ul class="rbt-course-main-content liststyle">
                                                            
                                                            <?php foreach($topic['videos'] as $video): ?>
                                                        
                                                                <li>
                                                                        <a href="lesson.html">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span class="text"><?php echo $video['title'] ?></span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Course Content  -->
    
                            <!-- Start Intructor Area  -->
                            <div class="rbt-instructor rbt-shadow-box intructor-wrapper mt--30" id="intructor">
                                <div class="about-author border-0 pb--0 pt--0">
                                    <div class="section-title mb--30">
                                        <h4 class="rbt-title-style-3">Instructor</h4>
                                    </div>
                                    <div class="media align-items-center">
                                        <div class="thumbnail">
                                            <a href="/instructor.php?username=<?php echo $instructor['username']?>">
                                                <img src="<?php echo $instructor['avatar'] ?>"  alt="Author Images" style='min-width: 80px; max-height: 80px;'>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="author-info">
                                                <h5 class="title">
                                                    <a class="hover-flip-item-wrapper" href="/instructor.php?username=<?php echo $instructor['username']?>"><?php echo $instructor['name'] ?></a>
                                                </h5>                                             
                                                <ul class="rbt-meta mb--20 mt--10">
                                                    <li><i class="feather-users"></i><?php echo $instructor['no_enrollments']?> Learners</li>
                                                    <li><i class="feather-video"></i><?php echo $instructor['no_courses']?> Courses</li>
                                                </ul>
                                            </div>
                                            <div class="content">
                                                <p class="description"><?php echo $instructor['description']?></p>
    
                                                <ul class="social-icon social-default icon-naked justify-content-start">                                   
                                                </ul>
    
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Intructor Area  -->
    
                            
                            
                            
                        </div>
                        
                    </div>
    
                    <div class="col-lg-4">
                        <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                            <div class="inner">
    
                                <!-- Start Viedo Wrapper  -->
                                <a class="video-popup-with-text video-popup-wrapper text-center popup-video sidebar-video-hidden mb--15" href="<?php echo $course['url_video_intro']; ?>" style="display: block;">
                                    <div class="video-content">
                                        <img class="w-100 rbt-radius" src="<?php echo $course['image']; ?>" alt="Video Images">
                                        <div class="position-to-top">
                                            <span class="rbt-btn rounded-player-2 with-animation">
                                                <span class="play-icon" ></span>
                                            </span>
                                        </div>
                                        <span class="play-view-text d-block color-white"><i class="feather-eye"></i> Preview this course</span>
                                    </div>
                                </a>
                                <!-- End Viedo Wrapper  -->
    
                                <div class="content-item-content">
                                    
    
                                    <div class="add-to-card-button mt--15">
                                        <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="/course/enroll-course.php?course_id=<?php echo $course['id'] ?>">
                                            <span class="btn-text">Enroll now</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </a>
                                    </div>
    
                                    
    
                                    <span class="subtitle"></span>
    
    
                                    <div class="rbt-widget-details has-show-more active">
                                        <ul class="has-show-more-inner-content rbt-course-details-list-wrapper">
                                            <li><span>Total Duration</span><span class="rbt-feature-value rbt-badge-5"><?php echo $course['total']?> Min</span>
                                            </li>
                                            <li><span>Number of Learners</span><span class="rbt-feature-value rbt-badge-5"><?php echo $course['no_enrollments'] ?></span></li>
                                            <li><span>Number of Topics</span><span class="rbt-feature-value rbt-badge-5"><?php echo $course['no_topics']?></span></li>
                                            
                                        </ul>
                                        
                                    </div>
    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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