 <div class="banner-inner" style="background-image: url('<?php if(isset($banner_log->banner_pic) && $banner_log->banner_pic != ""){echo site_url($banner_log->banner_pic);} ?>')">
        <div class="breadcrumb-sec">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url('resources');?>">resources</a></li>
            </ol>   
        </div>
    </div>
       
    
	<div class="resources-sec">
		<div class="container">
			<div class="row">

				<?php 
      if(isset($resources_num) && $resources_num > 0){
        foreach($resources_log as $keyban => $valban){
            ?>
				<div class="col-sm-4">
					<div class="resource">
						<iframe width="100%" height="300" src="<?php echo $valban->resources_link; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<h4><?php echo $valban->resources_name; ?></h4>
					</div>  
				</div>
				<?php
			}
		}
		?>



			</div>
		</div> 
	</div>

