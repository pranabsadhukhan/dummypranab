     <div class="upcoming-events-sec">
        <div class="container">
            <div class="row">
        <div class="col-sm-8">
          <div class="upcoming-events">
            <div class="upcoming-event-pic">
              <img src="<?php echo site_url($result_edit->event_pic);  ?>"/>
              <h4><?php echo $result_edit->event_name; ?></h4>
              <?php if($result_edit->event_date!=""){ ?>
                            <p><span><i class="pe-7s-calculator"></i> Date :</span><?php echo $result_edit->event_date; ?></p>
                        <?php } ?>
                        <?php if($result_edit->event_time!=""){ ?>
                            <p><span><i class="pe-7s-clock"></i> Time :</span>  <?php echo $result_edit->event_time; ?></p>
                        <?php } ?>
                        <?php if($result_edit->event_host!=""){ ?>
                            <p><span><i class="pe-7s-map-marker"></i> Host : </span> <?php echo $result_edit->event_host; ?></p>
                        <?php } ?>
                        <?php if($result_edit->event_venue!=""){ ?>
                            <p><span><i class="pe-7s-map-marker"></i> Venue :</span> <?php echo $result_edit->event_venue; ?></p>
                        <?php } ?>
            </div>
            <div class="upcoming-events-body">
              <div class="upcoming-text-row clearfix">
                            <span class="icon pe-7s-note"></span>
                            <div class="upcoming-text">
                            <?php echo $result_edit->event_content; ?>
                            </div>
                            <?php if($result_edit->event_video_link!=""){ ?>
                            <div class="video">
                <iframe width="100%" height="300" src="<?php echo $result_edit->event_video_link; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <?php } ?>
              <?php if($result_edit->event_information_link!=""){ ?>
            <div class="more-information-sec">
              <h4>For more information, please visit :</h4>
              <ul>
                <li><a href="<?php echo $result_edit->event_information_link; ?>" target="_blank"><i class="pe-7s-check"></i><?php echo $result_edit->event_information_link; ?>/</a></li>
              </ul>
            </div>
            <?php } ?>
                          </div>
            </div>
          </div>
        </div>
                <div class="col-sm-4">
                    <div class="all-upcoming-events">
                        <h4>All Past events</h4>
                        <div class="holder">
                            <ul id="ticker01">
                              <?php
                                foreach ($more_event_log as $m)
                                 {
                                ?>
                <li>
                                <div class="all-upcoming-events-text all-upcoming-events-listing">
                                    <div class="upcoming-text">
                                    <h4><?php echo $m->event_name; ?></h4>
                                    </div>
                                    <div class="view-events-btn">
                                        <a href="<?php echo site_url('main/past_inner'); ?>/<?php echo $m->event_id ?>"><i class="fa fa-eye"></i> view</a>
                                    </div>
                                </div>
                                </li>
<?php
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="pic1">
                        <img src="<?php echo site_url($result_edit->event_image);  ?>"/>
                    </div>
          <div class="event-pic-gallery">
            <h4>Images</h4>
            <div class="row">

              <?php if(isset($result) && $result>0)
              {
                foreach ($result as $key => $value) {
              ?>
              <div class="col-sm-4">
                <a class="fancybox gallery-pic" rel="gallery" data-fancybox="images" href="<?php echo site_url($value->eventpic_image); ?>" title="">
                <img src="<?php echo site_url($value->eventpic_image); ?>" alt="">
                </a>
              </div>

              <?php
            }
          }
          ?>
              


            </div>
          </div>
          <div class="event-pic-gallery">
            <h4>Videos</h4>
            <div class="row">

              <?php if(isset($result) && $result>0)
              {
                foreach ($result as $key => $value) {
              ?>
              <div class="col-sm-4">
                <iframe width="100%" height="200" src="<?php echo $value->event_video; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <?php
            }
          }
          ?>
            </div>
          </div>
                </div>
            </div>
        </div> 
    </div>

