<div class="banner-inner" style="background-image: url('<?php if(isset($banner_log->banner_pic) && $banner_log->banner_pic != ""){echo site_url($banner_log->banner_pic);} ?>')">
        <div class="breadcrumb-sec">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="news-media.html">news media</a></li>
            </ol>   
        </div>
    </div>
       
    
    <div class="news-sec">
         <div class="container">
            <div class="row news-row">


                <?php if(isset($news_num) && $news_num>0)
                    {foreach ($news_log as $key => $value) {
                    ?>
            	<div class="col-sm-6">
            		<div class="news">            			
            			<div class="news-pic" style="background-image: url('<?php echo site_url($value->news_pic) ?>')">
            			<div class="news-heading">	
            				<h4><?php echo $value->news_name; ?></h4>
            				<span><?php if($value->news_date != ""){echo date("d M, Y", $value->news_date);} ?></span>
            			</div>
            			</div>
            			<div class="news-text-outer">            				
	            			<div class="news-text">
	            				<?php echo $value->news_short_desc; ?>           				
	            			</div>
	            			<div class="read-more2"><a href="<?php echo site_url('main/news_inner'); ?>/<?php echo $value->news_id ?>">read more</a></div>
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

