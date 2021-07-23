 <div class="banner-inner" style="background-image: url('<?php if(isset($banner_log->banner_pic) && $banner_log->banner_pic != ""){echo site_url($banner_log->banner_pic);} ?>')">
        <div class="breadcrumb-sec">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="solutions.html">LEADERSHIP</a></li>
            </ol>   
        </div>
    </div>
       
    
    <div class="leadership-sec">
      <div class="container">
            <div class="row">


                <?php 
      if(isset($leadership_num) && $leadership_num > 0){
        foreach($leadership_log as $keyban => $valban){
            ?>
                <div class="col-sm-2 mt-5">
                    <div class="leadership-pic">
                        <a href="javaScript:void(0)">
                            <img src="<?php echo site_url($valban->leader_pic); ?>">
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="leadership-text triangle-left">
                        <h4><?php echo $valban->leader_name; ?></h4>
                        <span><?php echo $valban->leader_position; ?></span>
                        <div class="leadership-text1" id="leadership<?php echo $valban->leader_id; ?>">
                        <?php echo $valban->leader_content; ?>
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

