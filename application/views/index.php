<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators my-carousel-indicators">

    <?php
      if(isset($banner_num) && $banner_num > 0){
        foreach($banner_log as $keyban => $valban){
      ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $keyban; ?>" <?php if($keyban == 0){ ?> class="active"<?php } ?>></li>
    <?php
}
}
?>
  </ol>
        <div class="carousel-inner">


            <?php
      if(isset($banner_num) && $banner_num > 0){
        foreach($banner_log as $keyban => $valban){
      ?>
            <div class="carousel-item <?php if($keyban == 0){ ?>active<?php } ?>">
                <img src="<?php echo site_url($valban->pic); ?>">
                <div class="carousel-caption my-carousel-caption">
                    <?php echo $valban->bandesc; ?>
                </div>
            </div>

            <?php
        }
    }
        ?>

            
        </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       
       
    
    <div class="welcome-and-widget-sec">
        <div class="container">
            <div class="welcome-sec">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="welcome-image">
                            <img src="images/welcome-pic.png"/>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="welcome-text">
                            <h4>WELCOME TO <span>THE HEALTHY CLIMATE INITIATIVE</span></h4>
                            <?php echo $welcome->description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-sec">
            <h6>The community is focussing on the following :-</h6>
            <ul class="clearfix">
                <li>
                    <span class="pe-7s-magic-wand"></span>
                    <?php echo $comm1->description; ?>
                </li>
                <li>
                    <span class="pe-7s-leaf"></span>
                    <?php echo $comm2->description; ?>
                </li>
                <li>
                    <span class="pe-7s-users"></span>
                    <?php echo $comm3->description; ?>
                </li>
                <li>
                    <span class="pe-7s-note"></span>
                    <?php echo $comm4->description; ?>
                </li>
                <li>
                    <span class="pe-7s-like2"></span>
                    <?php echo $comm5->description; ?>
                </li>
            </ul>
            </div>
            
            <div class="welcome-text">
            <h5>Genesis:-</h5>
            <?php echo $genesis->description; ?>
            </div>
        </div>   
    </div>
       
    
    <div class="news-media-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="news-media-heading">
                        <h4>News &amp; Media</h4>
                    </div>
                    <div id="newsmedia" class="owl-carousel owl-theme">

                        <?php if(isset($news_num) && $news_num>0)
                    {foreach ($news_log as $key => $value) {
                    ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="newsmedia-pic">
                                        <img src="<?php echo site_url($value->news_pic) ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="newsmedia-text">
                                    <h4><?php echo $value->news_name; ?></h4>
                                    <?php echo $value->news_short_desc; ?> 
                                    <div class="clearfix">
                                        <div class="newsmedia-readmore">
                                            <a href="<?php echo site_url('news-media'); ?>">read more</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                        
						
						
                    </div>
                </div>
                <div class="col-sm-5">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">

                        <?php 
      if(isset($resources_num) && $resources_num > 0){
        foreach($resources_log as $keyban => $valban){
            ?>
                        
                        <div class="carousel-item <?php if($keyban == 0){ ?>active<?php } ?>">
                            <div class="video">
                                <iframe width="100%" height="400" src="<?php echo $valban->resources_link; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>    
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                    </div>
					
                </div>
            </div>
        </div>
    </div>

