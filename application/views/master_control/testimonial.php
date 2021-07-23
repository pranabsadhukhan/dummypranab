<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Manage Testimonial </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
  </section>
  
  <script language="javascript" type="text/javascript">

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
      
      if(isset($result_edit->testimonial_id) && $result_edit->testimonial_id !=""){
        $hidden = array('flag' => 'add','testimonial_id' => $result_edit->testimonial_id);
        echo form_open('administrator/updatetestimonial', $attributes,$hidden);
      }else{
        $hidden = array('flag' => 'add');
        echo form_open('administrator/addtestimonial', $attributes,$hidden);
      }
      ?>
          <div class="box-body">

                    

           

              <div class="form-group">
              <label for="customer_name">Name</label>
              <?php
              $data = array(
            'id'  => 'testimonial_name',
            'name'  => 'testimonial_name',
            'placeholder' => 'Enter Name',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->testimonial_name !=""){
          $data['value'] = $result_edit->testimonial_name;
        }
        echo form_input($data);
        ?>
            </div>

           <div class="form-group">
              <label for="customer_name">Location</label>
              <?php
              $data = array(
            'id'  => 'location',
            'name'  => 'location',
            'placeholder' => 'Enter location',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->location !=""){
          $data['value'] = $result_edit->location;
        }
        echo form_input($data);
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Content</label>
              <?php
        $data = array(
            'id'  => 'testimonial_content',
            'name'  => 'testimonial_content',
            'placeholder' => 'Enter Content',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->testimonial_content !=""){
          $data['value'] = $result_edit->testimonial_content;
        }
        echo form_textarea($data);
        ?>
            </div>

  <div class="form-group">
              <label for="customer_name">Image</label>
              <input type="file" name="testimonial_pic" id="testimonial_pic" />
              <?php
        if(isset($result_edit->testimonial_pic) && $result_edit->testimonial_pic != ""){
        ?>
              <img src="<?php echo site_url($result_edit->testimonial_pic); ?>" width="100" />
              <?php 
        }
        ?>
            </div>


              
          
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

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Testimonial</h3>
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
                        <th scope="col">Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                     <?php
          $i = 1;
          if(isset($testimonial_num) && $testimonial_num > 0){
            foreach($testimonial_log as $keypic => $valpic){
            $edit_id = $valpic->testimonial_id;
          ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        
                        <td><?php echo $valpic->testimonial_name; ?></td>
                        <td><?php echo $valpic->location; ?></td>
                        <td><?php echo $valpic->testimonial_content; ?></td>

                        <!-- <td><img src="<?php if(isset($valpic->testimonial_pic)){echo site_url($valpic->testimonial_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td> -->

                         <td><img src="<?php if(isset($valpic->testimonial_pic) && $valpic->testimonial_pic != ""){echo site_url($valpic->testimonial_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="100"></td>

                        <td><?php if($valpic->status == 'Y'){?><span class="label label-success">Active</span><?php }elseif($valpic->status == 'N'){?><span class="label label-warning">Inactive</span><?php } ?></td>
                        <td class="table-actions">
                            <a href="<?php echo site_url('administrator/edittestimonial/'.$edit_id) ?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a>
                           <a href="<?php echo site_url('administrator/deletetestimonial/'.$edit_id) ?>" title="Delete" class="with-tip" onclick="return confirm('Are you sure want to permanently block this?');"><i class="ion-trash-b"></i> Delete</a>
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
      </div>
      </div>