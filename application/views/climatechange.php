<div class="banner-inner" style="background-image: url('<?php if(isset($banner_log->banner_pic) && $banner_log->banner_pic != ""){echo site_url($banner_log->banner_pic);} ?>')">
        <div class="breadcrumb-sec">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url('climatechange');?>">Climate Change and HCI</a></li>
            </ol>   
        </div>
    </div>
       
    
    <div class="climate-change-sec">
      <div class="container">
          <div class="climate-change">
            <div class="clearfix">
                <div class="climate-change-pic">
                    <img src="<?php echo base_url($climate1->pic); ?>">
                </div>
                <div class="climate-change-text">
                    <h4><?php echo $climate1->name; ?></h4>
                    <?php echo $climate1->description; ?>
                </div>
            </div>
          </div>
          
          <div class="more-information-sec">
          <h4>For more information, please visit :</h4>
          <ul>
              <?php echo $climate1->link; ?>
    
          </ul>
          </div>
        </div> 
    </div>

