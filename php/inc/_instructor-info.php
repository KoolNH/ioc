<!-- Start Dashboard Top  -->
<div class="rbt-dashboard-content-wrapper">
    <div class="tutor-bg-photo bg_image bg_image--22 height-350"></div>
    <!-- Start Tutor Information  -->
    <div class="rbt-tutor-information">
        <div class="rbt-tutor-information-left">
            <div class="thumbnail rbt-avatars size-lg">
                <img src="<?php echo $loggedInUser['avatar'] ?>" alt="Instructor">
            </div>
            <div class="tutor-content">
                <h5 class="title"><?php echo $loggedInUser['name'] ?></h5>
            
            </div>
        </div>
        <div class="rbt-tutor-information-right">
            <div class="tutor-btn">
                <a class="rbt-btn btn-md hover-icon-reverse" href="/course/new-course.php">
                    <span class="icon-reverse-wrapper">
                    <span class="btn-text">Create a New  Course</span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Tutor Information  -->
</div>
<!-- End Dashboard Top  -->