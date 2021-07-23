  <div class="banner-inner" style="background-image: url('<?php if(isset($banner_log->banner_pic) && $banner_log->banner_pic != ""){echo site_url($banner_log->banner_pic);} ?>')">
        <div class="breadcrumb-sec">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('index');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('solutions');?>">SOLUTIONS</a></li>
            </ol>   
        </div>
    </div>
       
    
    <div class="solutions-sec">
        <div class="container">
            <div class="solution-text">
                <?php echo $sol->description; ?>
            </div>

            <div class="row">

                <?php
      if(isset($solution_num) && $solution_num > 0){
        foreach($solution_log as $keyban => $valban){
      ?>
                <div class="col-sm-4">
                    <div class="solution">
                        <div class="solution-pic-heading">
                            <div class="solution-pic">
                                <img src="images/solution-pic1.png"/>
                            </div>
                            <div class="solution-heading">
                                <h4><?php echo $valban->solution_name; ?></h4>
                            </div>
                        </div>
                        <div class="solution-text">

                            <?php echo $valban->solution_content; ?>
                            <a class="moreless-button"  href="javaScript:void(0)">Read more</a>
                            <div class="more-information-sec1">
                                <span>For more information, please visit</span>
                                <?php echo $valban->solution_link; ?>
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
    </div>

