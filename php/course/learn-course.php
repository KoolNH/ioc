<?php


include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');

// get course with id
$id = $_GET['id'];
$sql ="SELECT * FROM courses WHERE id='$id';"; 
$result = $conn->query($sql);
$course = $result->fetch();

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
}

/* video */
if (isset($topics[0]['videos'][0])) {
  $current_video = $topics[0]['videos'][0];
  
  if (isset($_GET['video_id'])) {
    $video_id = $_GET['video_id'];
    $sql ="SELECT * FROM videos WHERE id=$video_id;"; 
    $result = $conn->query($sql);
    $current_video = $result->fetch();
  }
}

?>


<!DOCTYPE html>
<html lang="en" class=" sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"><head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="robots" content="noindex, follow">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
 
  
  <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="/assets/\css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/\css/vendor/slick.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/plugins/sal.css">
    <link rel="stylesheet" href="/assets/css/plugins/feather.css">
    <link rel="stylesheet" href="/assets/css/plugins/fontawesome.min.css">
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
    <script type="text/javascript" id="www-widgetapi-script" src="https://www.youtube.com/s/player/9d15588c/www-widgetapi.vflset/www-widgetapi.js" async=""></script>
    <script src="https://www.youtube.com/iframe_api" async=""></script>
    
    <link rel="stylesheet" href="/assets/css/learn-course.css">
  </head>
  
  <body class="rbt-header-sticky"><div hidden="" id="sprite-plyr"><!--?xml version="1.0" encoding="UTF-8"?--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><symbol id="plyr-airplay" viewBox="0 0 18 18"><path d="M16 1H2a1 1 0 00-1 1v10a1 1 0 001 1h3v-2H3V3h12v8h-2v2h3a1 1 0 001-1V2a1 1 0 00-1-1z"></path><path d="M4 17h10l-5-6z"></path></symbol><symbol id="plyr-captions-off" viewBox="0 0 18 18"><path d="M1 1c-.6 0-1 .4-1 1v11c0 .6.4 1 1 1h4.6l2.7 2.7c.2.2.4.3.7.3.3 0 .5-.1.7-.3l2.7-2.7H17c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1H1zm4.52 10.15c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41C8.47 4.96 7.46 3.76 5.5 3.76c-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69zm7.57 0c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41c-.28-1.15-1.29-2.35-3.25-2.35-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69z" fill-rule="evenodd" fill-opacity=".5"></path></symbol><symbol id="plyr-captions-on" viewBox="0 0 18 18"><path d="M1 1c-.6 0-1 .4-1 1v11c0 .6.4 1 1 1h4.6l2.7 2.7c.2.2.4.3.7.3.3 0 .5-.1.7-.3l2.7-2.7H17c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1H1zm4.52 10.15c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41C8.47 4.96 7.46 3.76 5.5 3.76c-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69zm7.57 0c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41c-.28-1.15-1.29-2.35-3.25-2.35-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69z" fill-rule="evenodd"></path></symbol><symbol id="plyr-download" viewBox="0 0 18 18"><path d="M9 13c.3 0 .5-.1.7-.3L15.4 7 14 5.6l-4 4V1H8v8.6l-4-4L2.6 7l5.7 5.7c.2.2.4.3.7.3zm-7 2h14v2H2z"></path></symbol><symbol id="plyr-enter-fullscreen" viewBox="0 0 18 18"><path d="M10 3h3.6l-4 4L11 8.4l4-4V8h2V1h-7zM7 9.6l-4 4V10H1v7h7v-2H4.4l4-4z"></path></symbol><symbol id="plyr-exit-fullscreen" viewBox="0 0 18 18"><path d="M1 12h3.6l-4 4L2 17.4l4-4V17h2v-7H1zM16 .6l-4 4V1h-2v7h7V6h-3.6l4-4z"></path></symbol><symbol id="plyr-fast-forward" viewBox="0 0 18 18"><path d="M7.875 7.171L0 1v16l7.875-6.171V17L18 9 7.875 1z"></path></symbol><symbol id="plyr-logo-vimeo" viewBox="0 0 18 18"><path d="M17 5.3c-.1 1.6-1.2 3.7-3.3 6.4-2.2 2.8-4 4.2-5.5 4.2-.9 0-1.7-.9-2.4-2.6C5 10.9 4.4 6 3 6c-.1 0-.5.3-1.2.8l-.8-1c.8-.7 3.5-3.4 4.7-3.5 1.2-.1 2 .7 2.3 2.5.3 2 .8 6.1 1.8 6.1.9 0 2.5-3.4 2.6-4 .1-.9-.3-1.9-2.3-1.1.8-2.6 2.3-3.8 4.5-3.8 1.7.1 2.5 1.2 2.4 3.3z"></path></symbol><symbol id="plyr-logo-youtube" viewBox="0 0 18 18"><path d="M16.8 5.8c-.2-1.3-.8-2.2-2.2-2.4C12.4 3 9 3 9 3s-3.4 0-5.6.4C2 3.6 1.3 4.5 1.2 5.8 1 7.1 1 9 1 9s0 1.9.2 3.2c.2 1.3.8 2.2 2.2 2.4C5.6 15 9 15 9 15s3.4 0 5.6-.4c1.4-.3 2-1.1 2.2-2.4.2-1.3.2-3.2.2-3.2s0-1.9-.2-3.2zM7 12V6l5 3-5 3z"></path></symbol><symbol id="plyr-muted" viewBox="0 0 18 18"><path d="M12.4 12.5l2.1-2.1 2.1 2.1 1.4-1.4L15.9 9 18 6.9l-1.4-1.4-2.1 2.1-2.1-2.1L11 6.9 13.1 9 11 11.1zM3.786 6.008H.714C.286 6.008 0 6.31 0 6.76v4.512c0 .452.286.752.714.752h3.072l4.071 3.858c.5.3 1.143 0 1.143-.602V2.752c0-.601-.643-.977-1.143-.601L3.786 6.008z"></path></symbol><symbol id="plyr-pause" viewBox="0 0 18 18"><path d="M6 1H3c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1zm6 0c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1h-3z"></path></symbol><symbol id="plyr-pip" viewBox="0 0 18 18"><path d="M13.293 3.293L7.022 9.564l1.414 1.414 6.271-6.271L17 7V1h-6z"></path><path d="M13 15H3V5h5V3H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1v-6h-2v5z"></path></symbol><symbol id="plyr-play" viewBox="0 0 18 18"><path d="M15.562 8.1L3.87.225c-.818-.562-1.87 0-1.87.9v15.75c0 .9 1.052 1.462 1.87.9L15.563 9.9c.584-.45.584-1.35 0-1.8z"></path></symbol><symbol id="plyr-restart" viewBox="0 0 18 18"><path d="M9.7 1.2l.7 6.4 2.1-2.1c1.9 1.9 1.9 5.1 0 7-.9 1-2.2 1.5-3.5 1.5-1.3 0-2.6-.5-3.5-1.5-1.9-1.9-1.9-5.1 0-7 .6-.6 1.4-1.1 2.3-1.3l-.6-1.9C6 2.6 4.9 3.2 4 4.1 1.3 6.8 1.3 11.2 4 14c1.3 1.3 3.1 2 4.9 2 1.9 0 3.6-.7 4.9-2 2.7-2.7 2.7-7.1 0-9.9L16 1.9l-6.3-.7z"></path></symbol><symbol id="plyr-rewind" viewBox="0 0 18 18"><path d="M10.125 1L0 9l10.125 8v-6.171L18 17V1l-7.875 6.171z"></path></symbol><symbol id="plyr-settings" viewBox="0 0 18 18"><path d="M16.135 7.784a2 2 0 01-1.23-2.969c.322-.536.225-.998-.094-1.316l-.31-.31c-.318-.318-.78-.415-1.316-.094a2 2 0 01-2.969-1.23C10.065 1.258 9.669 1 9.219 1h-.438c-.45 0-.845.258-.997.865a2 2 0 01-2.969 1.23c-.536-.322-.999-.225-1.317.093l-.31.31c-.318.318-.415.781-.093 1.317a2 2 0 01-1.23 2.969C1.26 7.935 1 8.33 1 8.781v.438c0 .45.258.845.865.997a2 2 0 011.23 2.969c-.322.536-.225.998.094 1.316l.31.31c.319.319.782.415 1.316.094a2 2 0 012.969 1.23c.151.607.547.865.997.865h.438c.45 0 .845-.258.997-.865a2 2 0 012.969-1.23c.535.321.997.225 1.316-.094l.31-.31c.318-.318.415-.781.094-1.316a2 2 0 011.23-2.969c.607-.151.865-.547.865-.997v-.438c0-.451-.26-.846-.865-.997zM9 12a3 3 0 110-6 3 3 0 010 6z"></path></symbol><symbol id="plyr-volume" viewBox="0 0 18 18"><path d="M15.6 3.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4C15.4 5.9 16 7.4 16 9c0 1.6-.6 3.1-1.8 4.3-.4.4-.4 1 0 1.4.2.2.5.3.7.3.3 0 .5-.1.7-.3C17.1 13.2 18 11.2 18 9s-.9-4.2-2.4-5.7z"></path><path d="M11.282 5.282a.909.909 0 000 1.316c.735.735.995 1.458.995 2.402 0 .936-.425 1.917-.995 2.487a.909.909 0 000 1.316c.145.145.636.262 1.018.156a.725.725 0 00.298-.156C13.773 11.733 14.13 10.16 14.13 9c0-.17-.002-.34-.011-.51-.053-.992-.319-2.005-1.522-3.208a.909.909 0 00-1.316 0zm-7.496.726H.714C.286 6.008 0 6.31 0 6.76v4.512c0 .452.286.752.714.752h3.072l4.071 3.858c.5.3 1.143 0 1.143-.602V2.752c0-.601-.643-.977-1.143-.601L3.786 6.008z"></path></symbol></svg></div>
    
    <div class="rbt-lesson-area bg-color-white">
      <div class="rbt-lesson-content-wrapper">
        <div class="rbt-lesson-leftsidebar">
          <div class="rbt-course-feature-inner rbt-search-activation">
            <div class="section-title">
              <h4 class="rbt-title-style-3"><?php echo $course['name'] ?></h4>
            </div>

            <div class="lesson-search-wrapper">
              <form action="#" class="rbt-search-style-1">
                <input class="rbt-search-active" type="text" placeholder="Search Lesson">
                <button class="search-btn disabled"><i class="feather-search"></i></button>
              </form>
            </div>
            
            <hr class="mt--10">
            
            <div class="rbt-accordion-style rbt-accordion-02 for-right-content accordion">
              
              <div class="accordion" id="accordionExampleb2">
                
                <?php foreach($topics as $i => $topic): ?>
                  
                  <div class="accordion-item card">
                    <h2 class="accordion-header card-header" id="headingTwo<?php echo $i; ?>">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#collapseTwo<?php echo $i; ?>" aria-controls="collapseTwo<?php echo $i; ?>">
                        <?php echo $topic['name'] ?>
                      </button>
                    </h2>               
                    <div id="collapseTwo<?php echo $i; ?>" class="accordion-collapse collapse show" aria-labelledby="headingTwo<?php echo $i; ?>">
                      <div class="accordion-body card-body">
                        <ul class="rbt-course-main-content liststyle">
                          <?php foreach($topic['videos'] as $video): ?>
                          <li>
                            <a href="/course/learn-course.php?id=<?php echo $course['id'] ?>&video_id=<?php echo $video['id'] ?>" class="<?php if ($video['id'] == $current_video['id']) echo 'active'; ?>">
                              <div class="course-content-left">
                                <i class="feather-play-circle"></i> <span class="text"><?php echo $video['title']?></span>
                              </div>
                              <div class="course-content-right">
                                <span class="min-lable"><?php echo $video['duration_in_minute']?> min</span>
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
          
          <?php if (isset($current_video)): ?>
          <div class="rbt-lesson-rightsidebar overflow-hidden lesson-video">
            <div class="lesson-top-bar">
              <div class="lesson-top-left">
                <div class="rbt-lesson-toggle">
                  <button class="lesson-toggle-active btn-round-white-opacity" title="Toggle Sidebar"><i class="feather-arrow-left"></i></button>
                </div>
                <h5><?php echo $current_video['title'] ?></h5>
              </div>
              <div class="lesson-top-right">
                <div class="rbt-btn-close">
                  <a href="course/enrolled-courses.php" title="Go Back to Course" class="rbt-round-btn"><i class="feather-x"></i></a>
                </div>
              </div>
            </div>
            <div class="inner">
              <div class="plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr--paused plyr--stopped plyr__poster-enabled"><div class="plyr__controls"><button class="plyr__controls__item plyr__control" type="button" data-plyr="play" aria-pressed="false" aria-label="Play, Hands Typing On Macbook - Free HD Stock Footage (No Copyright) Office Work Working"><svg class="icon--pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-pause"></use></svg><svg class="icon--not-pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-play"></use></svg><span class="label--pressed plyr__sr-only">Pause</span><span class="label--not-pressed plyr__sr-only">Play</span></button><div class="plyr__controls__item plyr__progress__container"><div class="plyr__progress"><input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" autocomplete="off" role="slider" aria-label="Seek" aria-valuemin="0" aria-valuemax="37" aria-valuenow="0" id="plyr-seek-8555" aria-valuetext="00:00 of 00:37" style="--value: 0%;" seek-value="66.04215456674473"><progress class="plyr__progress__buffer" min="0" max="100" value="0" role="progressbar" aria-hidden="true">% buffered</progress><span class="plyr__tooltip" style="left: 66.5531%;">00:24</span></div></div><div class="plyr__controls__item plyr__time--current plyr__time" aria-label="Current time" role="timer">00:37</div><div class="plyr__controls__item plyr__volume"><button type="button" class="plyr__control" data-plyr="mute" aria-pressed="false"><svg class="icon--pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-muted"></use></svg><svg class="icon--not-pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-volume"></use></svg><span class="label--pressed plyr__sr-only">Unmute</span><span class="label--not-pressed plyr__sr-only">Mute</span></button><input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" role="slider" aria-label="Volume" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" id="plyr-volume-8555" aria-valuetext="100.0%" style="--value: 100%;"></div><button class="plyr__controls__item plyr__control" type="button" data-plyr="fullscreen" aria-pressed="false"><svg class="icon--pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-exit-fullscreen"></use></svg><svg class="icon--not-pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-enter-fullscreen"></use></svg><span class="label--pressed plyr__sr-only">Exit fullscreen</span><span class="label--not-pressed plyr__sr-only">Enter fullscreen</span></button></div>
              <div class="plyr__video-wrapper plyr__video-embed" style="aspect-ratio: 16 / 9;"><iframe id="youtube-5465" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" title="Player for Hands Typing On Macbook - Free HD Stock Footage (No Copyright) Office Work Working" width="640" height="360" src="https://www.youtube.com/embed/qKzhrXqT6oE?autoplay=0&amp;controls=0&amp;disablekb=1&amp;playsinline=1&amp;cc_load_policy=0&amp;cc_lang_pref=auto&amp;widget_referrer=https%3A%2F%2Frainbowit.net%2Fhtml%2Fhistudy%2Flesson.html&amp;rel=0&amp;showinfo=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;customControls=true&amp;noCookie=false&amp;enablejsapi=1&amp;origin=https%3A%2F%2Frainbowit.net&amp;widgetid=1"></iframe><div class="plyr__poster" style="background-image: url(&quot;https://i.ytimg.com/vi/qKzhrXqT6oE/maxresdefault.jpg&quot;);"></div></div>
              <button type="button" class="plyr__control plyr__control--overlaid" data-plyr="play" aria-pressed="false" aria-label="Play, Hands Typing On Macbook - Free HD Stock Footage (No Copyright) Office Work Working"><svg aria-hidden="true" focusable="false"><use xlink:href="#plyr-play"></use></svg><span class="plyr__sr-only">Play</span></button></div>
              
              
              
              
            </div>
          </div>
          <?php endif; ?>
        </div>
        
        
        <div class="rbt-progress-parent">
          <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
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
        
        