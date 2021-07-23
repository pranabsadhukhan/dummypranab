<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Manage Service </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Admin Control</a></li>
      <li class="active">Theme </li>
    </ol>
  </section>
  <?php
if(isset($flag) && ($flag == "add" || $flag == "edit")){
?>
  <script language="javascript" type="text/javascript">
function chk_blank(){
  if($('#testimonial_name').val() == ""){
    $('#ValidateErrorMsg').html('<li>Please enter <strong>testimonial name</strong>.</li>');
    $('#ValidateErrorMsg').show();
    $('#testimonial_name').focus();
    return false;
  }
}
</script>
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
           
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="form-group has-error" id="ValidateErrorMsg" style="display:none"> </div>
            <?php 
      $attributes = array('name' => 'Formservice', 'id' => 'Formservice', 'autocomplete' => 'on', 'class' => 'block-content form', 'onsubmit' => 'return chk_blank()', 'enctype' => 'multipart/form-data');
      
      if(isset($result_edit->service_id) && $result_edit->service_id !=""){
        $hidden = array('flag' => 'add','service_id' => $result_edit->service_id);
        echo form_open('administrator/updateservice', $attributes,$hidden);
      }else{
        $hidden = array('flag' => 'add');
        echo form_open('administrator/addservicedata', $attributes,$hidden);
      }
      ?>
          <div class="box-body">

                    

           <!--  <div class="form-group">
              <label for="customer_name">testimonial title</label>
              <?php
        $data = array(
            'id'  => 'testimonial_title',
            'name'  => 'testimonial_title',
            'placeholder' => 'Enter testimonial name',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->testimonial_title !=""){
          $data['value'] = $result_edit->testimonial_title;
        }
        echo form_input($data);
        ?>
            </div> -->

             <div class="form-group">
              <label for="customer_name">Name</label>
              <?php
              $data = array(
            'id'  => 'service_name',
            'name'  => 'service_name',
            'placeholder' => 'Enter Service Name',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->service_name !=""){
          $data['value'] = $result_edit->service_name;
        }
        echo form_input($data);
        ?>
            </div> 

            <div class="form-group">
              <label for="customer_name">Short Description</label>
              <?php
        $data = array(
            'id'  => 'service_content',
            'name'  => 'service_content',
            'placeholder' => 'Enter content',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->service_content !=""){
          $data['value'] = $result_edit->service_content;
        }
        echo form_textarea($data);
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Long Description</label>
              <?php
        $data = array(
            'id'  => 'service_desc',
            'name'  => 'service_desc',
            'placeholder' => 'Enter content',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->service_desc !=""){
          $data['value'] = $result_edit->service_desc;
        }
        echo form_textarea($data);
        ?>
            </div>


            <div class="form-group">
              <label for="service_pic">Service Pic</label>
              <input type="file" name="service_pic" id="service_pic" />
              <?php
        if(isset($result_edit->service_pic) && $result_edit->service_pic != ""){
        ?>
              <img src="<?php echo site_url($result_edit->service_pic); ?>" width="100" />
              <?php 
        }
        ?>
            </div>

            <div class="form-group">
              <label for="service_pic">Banner</label>
              <input type="file" name="service_banner" id="service_banner" />
              <?php
        if(isset($result_edit->service_banner) && $result_edit->service_banner != ""){
        ?>
              <img src="<?php echo site_url($result_edit->service_banner); ?>" width="100" />
              <?php 
        }
        ?>
            </div>


           <!--  <div class="form-group">
              <label for="customer_name">Content</label>
              <?php
        $data = array(
            'id'  => 'testimonial_content',
            'name'  => 'testimonial_content',
            'placeholder' => 'Enter testimonial content',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->testimonial_content !=""){
          $data['value'] = $result_edit->testimonial_content;
        }
        echo form_textarea($data);
        ?>
            </div> -->
             <!--  <div class="form-group">
              <label for="customer_name">Content</label>
              <?php
        $data = array(
            'id'  => 'testimonials_content',
            'name'  => 'testimonials_content',
            'placeholder' => 'Enter testimonial content',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->testimonials_content !=""){
          $data['value'] = $result_edit->testimonials_content;
        }
        echo form_textarea($data);
        ?>
            </div> -->
          
            <div class="form-group">
              <label for="exampleInputEmail1">Status</label>
              <br />
              <input type="radio" name="status" value="Y" <?php if(isset($result_edit) && $result_edit->status == "Y"){ ?>checked="checked"<?php }else{?>checked="checked"<?php } ?>>
              &nbsp;
              <label for="simple-radio-1">Active</label>
              <input type="radio" name="status" value="N" <?php if(isset($result_edit) && $result_edit->status == "N"){ ?>checked="checked"<?php } ?>>
              &nbsp;
              <label for="simple-radio-2">Inactive</label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script language="javascript" type="text/javascript">
$(function(){
  $("#datatable").dataTable();
});
</script>
  <?php }else{ ?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Service</h3>
          <div class="pull-right"><a href="<?php echo site_url('administrator/addservice'); ?>" class="btn btn-primary" type="button" >Add New Service</a></div>
          
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php if(isset($error) && $error != ""){?>
                  <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <?php echo $error; ?>
                  </div>
                  <?php } ?>
<!--                  <div class="alert alert-info alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>
                    Info alert preview. This alert is dismissable.
                  </div>
                  <div class="alert alert-warning alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Warning alert preview. This alert is dismissable.
                  </div>-->
                  <?php
          if(isset($msg) && $msg != ""){
          ?>
                  <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $msg; ?>.
                  </div>
                  <?php } ?>
                </div>
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Sl No.</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Short Description</th>
                        <th scope="col">Long Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Upload Image</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                     <?php
          $i = 1;
          if(isset($service_num) && $service_num > 0){
            foreach($service_log as $keypic => $valpic){
            $edit_id = $valpic->service_id;
          ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                
                       <td><?php echo $valpic->service_name; ?></td>
                       <td><?php echo $valpic->service_content; ?></td>
                       <td><?php echo $valpic->service_desc; ?></td>
                       <td><img src="<?php if(isset($valpic->service_pic) && $valpic->service_pic !=""){echo site_url($valpic->service_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td>

                       <td><img src="<?php if(isset($valpic->service_banner) && $valpic->service_banner !=""){echo site_url($valpic->service_banner);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td>
                      <td><a href="<?php echo site_url('administrator/servicedetails/'.$edit_id) ?>" class="label label-danger">Upload Image</a></td>
                        <td><?php if($valpic->status == 'Y'){?><span class="label label-success">Active</span><?php }elseif($valpic->status == 'N'){?><span class="label label-warning">Inactive</span><?php } ?></td>
                        <td class="table-actions">
                            <a href="<?php echo site_url('administrator/editservice/'.$edit_id) ?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a>
                           <a href="<?php echo site_url('administrator/deleteservice/'.$edit_id) ?>" title="Delete" class="with-tip" onclick="return confirm('Are you sure want to permanently block this?');"><i class="ion-trash-b"></i> Delete</a>
                        </td>
                    </tr>
                    <?php
              $i++;
            }
          }else{
          ?>
                    <tr>
                        <th colspan="5"><strong>No Result Found!</strong></th>
                    </tr>
                    <?php
          }
          ?>
                </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="20">&nbsp;</th>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination">
                  </ul></div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?php } ?>
      </div>
      </div>