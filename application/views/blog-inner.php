<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="blog-details-sec">
        <div class="container-fluid">
           <div class="row">
               <div class="col-sm-8">
                   <div class="blog-inner-text">
                       <img src="<?php echo site_url($result_edit->blog_image) ?>">
                       <div class="blog-date-post-by-name clearfix">
                            <div class="pull-left"><h4><?php if($result_edit->blog_date != ""){echo date("d M, Y", $result_edit->blog_date);} ?></h4></div>
                            <div class="pull-right"><h4>By Admin</h4></div>
                        </div>
                       
                       <?php echo $result_edit->blog_long_desc; ?>

							<div class="user-comment-sec">
                                <div class="user-comment-sec-inner" id="replyform52_4">
                                <h4>Leave a comment </h4>
                                    <div class="user-comment-box">
                                        <div class="user-comment-form">
                                           <form id="contact" name="contact" method="post" action="<?php echo site_url('main/comment')?>" onSubmit="alert('Thank you!we will review your comment get back to you soon..');">
                                            <input type="hidden" name="blog_id" value="<?php echo $result_edit->blog_id; ?>">
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <input type="text" class="form-control"  id="cname" name="cname" placeholder="Name">
                                                </div>  
                                                <div class="form-group col-md-6">
                                                  <input type="text" class="form-control"  id="cphno" name="cphno" placeholder="Mobile No">
                                                </div>

                                              </div>
                                              <div class="form-row"> 
                                                <div class="form-group col-md-12">
                                                  <input type="email"  class="form-control" id="cemail_id" name="cemail_id" placeholder="Email">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <textarea  class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write Your Comment Here" id="cocomm" name="cocomm"></textarea>
                                              </div>
                                              <div class="form-row"> 
                                                <div class="col-md-6">
                                                  
                                                </div>
                                                <div class="col-md-6 text-right">
                                                  <button type="submit" onclick="return abc();" class="btn post-comment-btn">post comment</button>
                                                </div> 
                                              </div>
                                            </form>
                                        </div>
                                        <div class="comments-of-users-listing-sec">
                                            <h5><?php echo count($comment_log); ?> comments</h5>
                                            <div class="comments-of-users-listing-inner">

<?php
foreach ($comment_log as $k) 
{
?>
                                               <div class="comments-of-users clearfix">
                                                    <div class="user-pic">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="user-comment-part">
                                                    <div class="user-comment">
                                                        <div class="user-comment-head clearfix">
                                                            <span class="user-name pull-left"><?php echo $k->name; ?></span>
                                                            <div class=" pull-right">
                                                            <span class="user-date"><?php if($k->create_date != ""){echo date("d M, Y", $k->create_date);} ?></span>
<!--                                                            <a href="#replyform52_4" class="replybtn" class="rplyBtn">reply</a>-->
                                                            </div>
                                                        </div>
                                                        <div class="user-comment-body">
                                                            <p><?php echo $k->comm; ?></p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                  <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                   </div>
               </div>
               <div class="col-sm-4">
                   <div class="popular-post-sec">
					   <h4>Popular Post</h4>

             <?php 
                    if(isset($blog_num) && $blog_num>0)
                    {
                        foreach ($blog_log as $key => $value) {
                    ?>

					   <a href="<?php echo site_url('main/blog_inner'); ?>/<?php echo $value->blog_id ?>" class="popular-post">
						   <div class="poular-post-pic" style="background-image: url('<?php echo site_url($value->blog_pic); ?>')">
							   <div class="travel-blog-date-comments">
								<ul>
									<li><i class="fa fa-user"></i> Admin</li>
									<li><i class="fa fa-calendar"></i><?php if($value->blog_date != ""){echo date("d M, Y", $value->blog_date);} ?></li>

								</ul>
								</div>
						   </div>
						   <div class="popular-post-text">
							   <?php echo $value->blog_short_desc; ?>
						   </div>
					   </a>
             <?php
           }
         }
         ?>


				   </div>
               </div>
           </div>
        </div>   
    </div>


 <script>
function abc()
  {
  var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if($('#cname').val() == "")
    {
      alert('Please enter your name');
      $('#cname').focus();
      return false;
    }
    else if($('#cphno').val() == "")
    {
      alert('*Mobile no is required');
      $('#cphno').focus();
      return false;
    }

    else if(phoneno.test($('#cphno').val()) == false){
      alert('*Mobile no should be valid');
      $('#cphno').focus();
      return false;
    }
    else if($('#cemail_id').val() == "")
    {
      alert('Please enter your email id');
      $('#cemail_id').focus();
      return false;
    }

    else if(emailfilter.test($('#cemail_id').val()) == false)
    {
      alert('Email id should be valid');
      $('#cemail_id').focus();
      return false;
    }
    
    else if($('#cocomm').val() == "")
    {
      alert('*please write something....');
      $('#cocomm').focus();
      return false;
    }
    else
    {
      $('#proccedtologin').show();
      return true;
    }
  }
</script>