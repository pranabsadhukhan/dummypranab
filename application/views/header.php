 <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title> Healthy Climate Initiative</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="<?php echo site_url('images/favicon.png');?>" type="images/favicon.png" sizes="18x18">
    <!-- Bootstrap -->
    <link href="<?php echo site_url('css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/style.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/build.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/font-awesome.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/pe-icon-7-stroke.css');?>" rel="stylesheet"> 
    <link href="<?php echo site_url('css/responsive.css');?>" rel="stylesheet"  />
    <link href="<?php echo site_url('css/font_face.css');?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo site_url('owl-carousel2/css/owl.carousel.min.css');?>"/>
    <link rel="stylesheet" href="<?php echo site_url('owl-carousel2/css/owl.theme.default.min.css');?>"/>
    <link rel="stylesheet" href="<?php echo site_url('css/aos.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('custom-scroll/jquery.mCustomScrollbar.css');?>">
        
    <script>
    $(document).ready(function(){ 
    $(window).scroll(function(){ 
    if ($(this).scrollTop() > 100) { 
    $('#scroll').fadeIn(); 
    } else { 
    $('#scroll').fadeOut(); 
    } 
    }); 
    $('#scroll').click(function(){ 
    $("html, body").animate({ scrollTop: 0 }, 600); 
    return false; 
    }); 
    });

    </script>
   </head>
    
   <body>
      <a href="#" id="scroll" style="display: none;"><span></span></a>
        
    <header>
        <div class="top-header">
            <div class="offer-text">
                <?php echo $header->description; ?>
            </div>
        </div>
        <div class="bottom-header">
            <div class="container">
                <div class="logo-ph-email-membr-btn clearfix">
                    <div class="ph-email-membr-btn">
                        <ul>
                            <li><i class="fa fa-volume-control-phone"></i> <?php echo $result_setting->branch_phn; ?> / <?php echo $result_setting->hoffice; ?></li>
                            <li><i class="fa fa-envelope-o"></i> <a href="<?php echo $result_setting->email; ?>"><?php echo $result_setting->email; ?></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#becomemember">Become a member</a></li>
                        </ul>
                    </div>
                    <a href="<?php echo site_url('index');?>" class="logo">
                        <img src="<?php echo site_url('images/logo.png');?>"/>
                    </a>
                </div>
            </div>
        </div>
    </header>
       
    <div class="modal fade becomemember-modal" id="becomemember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Become A Member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body becomemember-modal-body">
            <div class="becomemember-form">
                <h4>Be a member of the HCI team, learn about the climate restoration activities, and collaborate.
Please share your information in the fields below</h4>
                <form class="popup-form" name="requestFrm" id="requestFrm" method="post" action="<?php echo site_url('main/member')?>">
                  <div class="form-group">
                     <input required="required" type="text" placeholder="Name" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                     <input required="required" type="email" placeholder="Email ID" name="email_id" id="email_id" class="form-control">
                  </div>
                  <div class="form-group">
                     <input required="required" type="text" placeholder="WhatsApp No" name="phno" id="phno" class="form-control">
                  </div>
                  <div class="form-group">
                     <textarea required="required" name="msg" id="msg" rows="3" id="" class="form-control" placeholder="Your Message"></textarea>
                  </div>
                  <div class="text-right">
                     <button class="btn submit-modal-btn" type="submit">Submit</button>
                  </div>
               </form>    
            </div>
        </div>
        </div>
        </div>
    </div>
        
    <div class="navigation-sec">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navigation">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-center menu">                            
                    <li <?php if($this->uri->segment(1) == "index" || $this->uri->segment(1) == ""){ ?> class="nav-item active"<?php } ?>><a class="nav-link" href="<?php echo site_url('index');?>">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          CLIMATE CHANGE
                        </a>
                        <div class="dropdown-menu my-dropdown-menu" aria-labelledby="navbarDropdown">
                          <a  class=" dropdown-item <?php if($this->uri->segment(1) == "climatechange"){ ?>active <?php } ?>" href="<?php echo site_url('climatechange');?>">Climate Change and HCI</a>
                          <a class="dropdown-item <?php if($this->uri->segment(1) == "climatechangecause"){ ?>active <?php } ?>" href="<?php echo site_url('climatechangecause');?>">Climate Change Causes</a>
                        </div>
                    </li>
                    <li  <?php if($this->uri->segment(1) == "solutions"){ ?>class="nav-item active"<?php } ?>><a class="nav-link" href="<?php echo site_url('solutions');?>">SOLUTIONS</a></li>
                    <li <?php if($this->uri->segment(1) == "leadership"){ ?> class="nav-item active"<?php } ?>><a class="nav-link" href="<?php echo site_url('leadership');?>">LEADERSHIP</a></li>
                    <li <?php if($this->uri->segment(1) == "resources"){ ?> class="nav-item active"<?php } ?>><a class="nav-link" href="<?php echo site_url('resources');?>">RESOURCES</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          EVENTS
                        </a>
                        <div class="dropdown-menu my-dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="<?php echo site_url('upcoming-events');?>">UP COMING Event</a>
                          <a class="dropdown-item" href="<?php echo site_url('past-events');?>">past events</a>
                        </div>
                    </li>
                    <li <?php if($this->uri->segment(1) == "blog"){ ?> class="nav-item active"<?php } ?>><a class="nav-link" href="<?php echo site_url('blog');?>">Blog</a></li>
                    <li <?php if($this->uri->segment(1) == "news-media"){ ?> class="nav-item active"<?php } ?>><a class="nav-link" href="<?php echo site_url('news-media');?>">NEWS AND MEDIA</a></li>
                </ul>
            </div>
        </nav>
    </div>