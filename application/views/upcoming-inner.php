<div class="upcoming-events-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                  <div class="upcoming-events">
                      <div class="upcoming-event-pic">
                          <img src="<?php echo site_url($result_edit->upevent_pic);  ?>"/>
                      </div>
                      <div class="share-event-sc">
                          <h6>Share This Event</h6>
                          <ul>
                            <li><a class="w-inline-block social-share-btn fb" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook"></i></a></li>

                            <li><a class="w-inline-block social-share-btn tw" href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter"></i></a></li>


                            <!-- <li><a href=""><i class="fa fa-instagram"></i></a></li> -->


                            <li><a class="w-inline-block social-share-btn gplus" href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-google-plus"></i></a></li>
                          </ul>
                      </div>
                      <div class="upcoming-events-body">
                          <div class="upcoming-text-row clearfix">
                            <span class="icon pe-7s-check"></span>
                            <div class="upcoming-text">
                            <h4><?php echo $result_edit->upevent_name; ?></h4>
                            <?php if($result_edit->upevent_date!=""){ ?>
                            <p><span><i class="pe-7s-calculator"></i> Date :</span><?php echo $result_edit->upevent_date; ?></p>
                        <?php } ?>
                        <?php if($result_edit->upevent_time!=""){ ?>
                            <p><span><i class="pe-7s-clock"></i> Time :</span>  <?php echo $result_edit->upevent_time; ?></p>
                        <?php } ?>
                        <?php if($result_edit->upevent_venue!=""){ ?>
                            <p><span><i class="pe-7s-map-marker"></i> Venue :</span> <?php echo $result_edit->upevent_venue; ?></p>
                        <?php } ?>
                            </div>
                          </div>

                          <div class="upcoming-text-row clearfix">
                            <span class="icon pe-7s-note"></span>
                            <div class="upcoming-text">
                            <?php echo $result_edit->upevent_content; ?>
                            </div>
                          </div>
                      </div>
                  </div>
                      
                </div>

                <div class="col-sm-4">
                    <div class="all-upcoming-events">
                        <h4>All Upcoming events</h4>
                        <div class="holder">
                            <ul id="ticker01">

                                <?php
                                foreach ($more_upevent_log as $m)
                                 {
                                ?>
								<li>
                                <div class="all-upcoming-events-text all-upcoming-events-listing">
                                    <div class="upcoming-text">
                                    <h4><?php echo $m->upevent_name; ?></h4>
                                    </div>
                                    <div class="view-events-btn">
                                        <a href="<?php echo site_url('main/up_inner'); ?>/<?php echo $m->upevent_id ?>"><i class="fa fa-eye"></i> view</a>
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
                        <img src="<?php echo site_url($result_edit->upevent_image);  ?>"/>
                    </div>
					
					
					
                </div>
            </div>
        </div> 
    </div>