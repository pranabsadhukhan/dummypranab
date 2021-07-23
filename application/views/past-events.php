<div class="banner-inner" style="background-image: url('<?php if(isset($banner_log->banner_pic) && $banner_log->banner_pic != ""){echo site_url($banner_log->banner_pic);} ?>')">
        <div class="breadcrumb-sec">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('past-events');?>">past events</a></li>
            </ol>   
        </div>
    </div>
       
    
    <div class="upcoming-events-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                  <div class="upcoming-events">
                    <?php
                    foreach ($event_log as $e)
                     {
                    ?>
					  <div class="bor">
                      <div class="upcoming-events-body">
                          <div class="upcoming-text-row clearfix">
                            <span class="icon pe-7s-check"></span>
                            <div class="upcoming-text">
                            <h4><?php echo $e->event_name; ?></h4>
                            <?php
                            if($e->event_date!="")
                            {
                             ?>
                            <p><span><i class="pe-7s-calculator"></i> Date :</span><?php echo $e->event_date; ?></p>
                            <?php
                          }
                          ?>
                          <?php
                            if($e->event_time!="")
                            {
                             ?>
                            <p><span><i class="pe-7s-clock"></i> Time :</span>  <?php echo $e->event_time; ?></p>
                            <?php
                          }
                          ?>
                          <?php
                            if($e->event_host!="")
                            {
                             ?>
              <p><span><i class="pe-7s-map-marker"></i> Host : </span> <?php echo $e->event_host; ?></p>
              <?php
                          }
                          ?>
                          <?php
                            if($e->event_venue!="")
                            {
                             ?>
              <p><span><i class="pe-7s-map-marker"></i> Venue :</span> <?php echo $e->event_venue; ?></p>
              <?php
                          }
                          ?>
                            </div>
                          </div>
                      </div>
					  <div class="view-events-btn text-right">
						<a href="<?php echo site_url('main/past_inner'); ?>/<?php echo $e->event_id ?>"><i class="fa fa-eye"></i> view</a>
					  </div>
					  </div>
            <?php
          }
          ?>


                  </div>
                </div>
                <div class="col-sm-4">
                    <div class="all-upcoming-events">
                        <h4>All Past events</h4>
                        <div class="holder">
                            <ul id="ticker01">

                              <?php
                    foreach ($event_log as $e)
                     {
                    ?>
								                <li>
                                <div class="all-upcoming-events-text all-upcoming-events-listing">
                                    <div class="upcoming-text">
                                    <h4><?php echo $e->event_name; ?></h4>
                                    </div>
                                    <div class="view-events-btn">
                                        <a href="<?php echo site_url('main/past_inner'); ?>/<?php echo $e->event_id ?>"><i class="fa fa-eye"></i> view</a>
                                    </div>
                                </div>
                                </li>
                                <?php
                              }
                              ?>

                                
                            </ul>
                        </div>
                    </div>
                    <div class="pic">
                      
                        <img src="<?php echo site_url($image->pic); ?>"/>
                      
                    </div>
                </div>
            </div>
        </div> 
    </div>