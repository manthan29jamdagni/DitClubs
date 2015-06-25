<?php 

require_once('controllers/oauth.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DIGICAMPUS</title>
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bigvideo.css">
    <script src="js/modernizr-2.5.3.min.js"></script>
    <!--[if lte IE 8]>
    <style>
        /* Rotation of the arrow element for IE < 9 */
        .next-icon { /* IE Matrix Calculator - http: //www.boogdesign.com/examples/transforms/matrix-calculator.html */;
            -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(M11=0.70710678, M12=-0.70710678, M21=0.70710678, M22=0.70710678,sizingMethod='auto expand')";
            filter: progid:DXImageTransform.Microsoft.Matrix(M11=0.70710678, M12=-0.70710678, M21=0.70710678, M22=0.70710678,sizingMethod='auto expand');
        }
    </style>
    <![endif]-->
</head>
<body>

    <header>
        <h1>DIGI CAMPUS <span>DIT</span></h1>
        <img src="img/user.png" width="100px" size="100px" /><br/>
        <a class="login" href='<?php echo $authUrl;?>'>  <img class='login' src="img/sign-in-with-google.png" width="250px" size="54px"/> </a>
    </header>

    <div class="wrapper">
        <div class="screen" id="screen-1" data-video="vid/bird.mp4">
            <img src="img/campus.jpg" class="big-image" />
            <h1 class="video-title">#1 CAMPUS VIEW</h1>
        </div>
        <div class="screen" id="screen-2" data-video="vid/satellite.mp4">
            <img src="img/computer.jpeg" class="big-image" />
            <h1 class="video-title">#2 COMPUTER CENTER</h1>
        </div>
        <div class="screen" id="screen-3" data-video="vid/camera.mp4">
            <img src="img/us.jpg" class="big-image" />
            <h1 class="video-title">#3 CLASSROOMS</h1>
        </div>
        <div class="screen" id="screen-4" data-video="vid/spider.mp4">
            <img src="img/malika.jpg" class="big-image" />
            <h1 class="video-title">#4 CREATIVE ENVIORNMENT </h1>
        </div>
        <div class="screen" id="screen-5" data-video="vid/dandelion.mp4">
            <img src="img/group.JPG" class="big-image" />
            <h1 class="video-title">#5 CLOUDIES</h1>
        </div>
    </div>

    <nav id="next-btn">
        <a href="#" class="next-icon"></a>
    </nav>

    <!-- BigVideo Dependencies -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.8.1.min.js"><\/script>')</script>
    <script src="js/jquery-ui-1.8.22.custom.min.js"></script>
    <script src="js/jquery.imagesloaded.min.js"></script>
    <script src="http://vjs.zencdn.net/c/video.js"></script>

    <!-- BigVideo -->
    <script src="js/bigvideo.js"></script>

    <!-- Tutorial Demo -->
    <script src="js/jquery.transit.min.js"></script>
    <script>
        $(function() {

            // Use Modernizr to detect for touch devices, 
            // which don't support autoplay and may have less bandwidth, 
            // so just give them the poster images instead
            var screenIndex = 1,
                numScreens = $('.screen').length,
                isTransitioning = false,
                transitionDur = 1000,
                BV,
                videoPlayer,
                isTouch = Modernizr.touch,
                $bigImage = $('.big-image'),
                $window = $(window);
            
            if (!isTouch) {
                // initialize BigVideo
                BV = new $.BigVideo({forceAutoplay:isTouch});
                BV.init();
                showVideo();
                
                BV.getPlayer().addEvent('loadeddata', function() {
                    onVideoLoaded();
                });

                // adjust image positioning so it lines up with video
                $bigImage
                    .css('position','relative')
                    .imagesLoaded(adjustImagePositioning);
                // and on window resize
                $window.on('resize', adjustImagePositioning);
            }
            
            // Next button click goes to next div
            $('#next-btn').on('click', function(e) {
                e.preventDefault();
                if (!isTransitioning) {
                    next();
                }
            });

            function showVideo() {
                BV.show($('#screen-'+screenIndex).attr('data-video'),{ambient:true});
            }

            function next() {
                isTransitioning = true;
                
                // update video index, reset image opacity if starting over
                if (screenIndex === numScreens) {
                    $bigImage.css('opacity',1);
                    screenIndex = 1;
                } else {
                    screenIndex++;
                }
                
                if (!isTouch) {
                    $('#big-video-wrap').transit({'left':'-100%'},transitionDur)
                }
                    
                (Modernizr.csstransitions)?
                    $('.wrapper').transit(
                        {'left':'-'+(100*(screenIndex-1))+'%'},
                        transitionDur,
                        onTransitionComplete):
                    onTransitionComplete();
            }

            function onVideoLoaded() {
                $('#screen-'+screenIndex).find('.big-image').transit({'opacity':0},500)
            }

            function onTransitionComplete() {
                isTransitioning = false;
                if (!isTouch) {
                    $('#big-video-wrap').css('left',0);
                    showVideo();
                }
            }

            function adjustImagePositioning() {
                $bigImage.each(function(){
                    var $img = $(this),
                        img = new Image();

                    img.src = $img.attr('src');

                    var windowWidth = $window.width(),
                        windowHeight = $window.height(),
                        r_w = windowHeight / windowWidth,
                        i_w = img.width,
                        i_h = img.height,
                        r_i = i_h / i_w,
                        new_w, new_h, new_left, new_top;

                    if( r_w > r_i ) {
                        new_h   = windowHeight;
                        new_w   = windowHeight / r_i;
                    }
                    else {
                        new_h   = windowWidth * r_i;
                        new_w   = windowWidth;
                    }

                    $img.css({
                        width   : new_w,
                        height  : new_h,
                        left    : ( windowWidth - new_w ) / 2,
                        top     : ( windowHeight - new_h ) / 2
                    })

                });

            }
        });
    </script>
</body>
</html>