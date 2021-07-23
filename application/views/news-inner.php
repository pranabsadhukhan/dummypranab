<div class="upcoming-events-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                  <div class="news">            			
            			<div class="news-pic1">
                            <img src="<?php echo site_url($result_edit->news_image) ?>"/>
            			</div>
                        <div class="news-inner-heading-date clearfix">
                            <h4><?php echo $result_edit->news_name; ?></h4>
                            <span></span>
                        </div>
            			<div class="news-text1">
                            <?php echo $result_edit->news_long_desc; ?>
            			</div>
            		</div>
                </div>
                <div class="col-sm-4">
                    <div class="all-upcoming-events">
                        <h4>NEWS AND MEDIA</h4>
                        <div class="holder">
                            <ul id="ticker01">

                                <?php if(isset($news_num) && $news_num>0)
                    {foreach ($news_log as $key => $value) {
                    ?>

                                <li>
                                <div class="news-inner-right">
                                    <i>news</i>
                                    <h4><?php echo $value->news_name; ?></h4>
                                    <span><?php if($value->news_date != ""){echo date("d M, Y", $value->news_date);} ?></span>
                                    <?php echo $value->news_short_desc; ?> 
                                    <div class="view-events-btn">
                                        <a href="<?php echo site_url('main/news_inner'); ?>/<?php echo $value->news_id ?>"><i class="fa fa-eye"></i> view</a>
                                    </div>
                                </div>
                                </li>

                                <?php
            }
        }
        ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>