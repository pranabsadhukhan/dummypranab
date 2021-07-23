<footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="footer-logo">
                            <img src="<?php echo site_url('images/footer-logo.png');?>"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="footer-heading">Company</h4>
                        <div class="footer-nav">
                            <ul>
                            <li><a href="<?php echo site_url('index');?>">Home</a></li>
                            <li><a href="<?php echo site_url('climatechange');?>">CLIMATE CHANGE</a></li>
                            <li><a href="<?php echo site_url('solutions');?>">SOLUTIONS</a></li>
                            <li><a href="<?php echo site_url('leadership');?>">LEADERSHIP</a></li>
                            <li><a href="<?php echo site_url('resources');?>">RESOURCES</a></li>
                            <li><a href="<?php echo site_url('upcoming-events');?>">upcoming EVENTS</a></li>
<li><a href="<?php echo site_url('past-events');?>">past EVENTS</a></li>
                            <li><a href="<?php echo site_url('blog');?>">Blog</a></li>
                            <li><a href="<?php echo site_url('news-media');?>">NEWS AND MEDIA</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer-address">
                            <ul>
                                <li><i class="fa fa-map-marker"></i> <?php echo $result_setting->address; ?>
                                <li><i class="fa fa-volume-control-phone"></i> <?php echo $result_setting->branch_phn; ?> / <?php echo $result_setting->hoffice; ?></li>
                                <li><i class="fa fa-envelope-o"></i><?php echo $result_setting->email; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="sc">
                            <ul>
                            <li><a href="<?php echo $result_setting->fb_link; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $result_setting->twitter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="copy">
                            <p>© 2020  HEALTHY CLIMATE INITIATIVE.  All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
        
    
    



    <script src="<?php echo site_url('js/jquery-1.9.1.min.js');?>"></script>

    <script src="<?php echo site_url('js/bootstrap.js');?>"></script>
    <script src="<?php echo site_url('owl-carousel2/js/owl.carousel.js');?>"></script>
    <script src="<?php echo site_url('js/aos.js');?>"></script>
    <script src="<?php echo site_url('custom-scroll/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?php echo site_url('js/index.js');?>"></script>
    <!--fancyBox main JS and CSS-->
    <script type="text/javascript" src="<?php echo site_url('fancybox/jquery.fancybox.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('fancybox/jquery.fancybox.css');?>" media="screen" />
    <script>
    $(document).ready(function() {
    $(".fancybox").fancybox({
    openEffect : 'none',
    closeEffect : 'none'
    });
    });
    </script>

    </body>
    </html>