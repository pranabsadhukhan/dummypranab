<div class="banner-inner" style="background-image: url('<?php if(isset($banner_log->banner_pic) && $banner_log->banner_pic != ""){echo site_url($banner_log->banner_pic);} ?>')">
        <div class="breadcrumb-sec">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="blog.html">blog</a></li>
            </ol>   
        </div>
    </div>
       
    
    <div class="blog-sec">
        <div class="container">
            <div class="row">

                    <?php 
                    if(isset($blog_num) && $blog_num>0)
                    {
                        foreach ($blog_log as $key => $value) {
                    ?>

                <div class="col-sm-4">
                    <a href="<?php echo site_url('main/blog_inner'); ?>/<?php echo $value->blog_id ?>" class="blog">
                        <div class="blog-img" style="background-image: url('<?php echo site_url($value->blog_pic); ?>')">
                        </div>
                        <div class="blog-text">
                            <h3><?php echo $value->blog_short_desc; ?></h3>
                            <ul>
                            <li><i aria-hidden="true" class="fa fa-user"></i> posted by admin </li>
                            <!--<li><i aria-hidden="true" class="fa fa-calendar"></i> 20 Jan, 2016</li>-->
                            </ul>
                        </div>
                    </a>
                </div>

                <?php
            }
        }
        ?>
            </div>
        </div> 
    </div>

