<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Manage News & Media </h1>
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
      
      if(isset($result_edit->news_id) && $result_edit->news_id !=""){
        $hidden = array('flag' => 'add','news_id' => $result_edit->news_id);
        echo form_open('administrator/updatenews', $attributes,$hidden);
      }else{
        $hidden = array('flag' => 'add');
        echo form_open('administrator/addnews', $attributes,$hidden);
      }
      ?>
          <div class="box-body">

                    

           

              <div class="form-group">
              <label for="customer_name">Name</label>
              <?php
              $data = array(
            'id'  => 'news_name',
            'name'  => 'news_name',
            'placeholder' => 'Enter Name',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->news_name !=""){
          $data['value'] = $result_edit->news_name;
        }
        echo form_input($data);
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Short Description</label>
              <?php
              $data = array(
            'id'  => 'news_short_desc',
            'name'  => 'news_short_desc',
            'placeholder' => 'Enter desc',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->news_short_desc !=""){
          $data['value'] = $result_edit->news_short_desc;
        }
        echo form_textarea($data);
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Long Description</label>
              <?php
        $data = array(
            'id'  => 'news_long_desc',
            'name'  => 'news_long_desc',
            'placeholder' => 'Enter Content',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->news_long_desc !=""){
          $data['value'] = $result_edit->news_long_desc;
        }
        echo form_textarea($data);
        ?>
            </div>

           

            

  <div class="form-group">
              <label for="customer_name">Image</label>
              <input type="file" name="news_pic" id="news_pic" />
              <?php
        if(isset($result_edit->news_pic) && $result_edit->news_pic != ""){
        ?>
              <img src="<?php echo site_url($result_edit->news_pic); ?>" width="100" />
              <?php 
        }
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Banner Image</label>
              <input type="file" name="news_image" id="news_image" />
              <?php
        if(isset($result_edit->news_image) && $result_edit->news_image != ""){
        ?>
              <img src="<?php echo site_url($result_edit->news_image); ?>" width="100" />
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

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of News & Media</h3>
                </div>
                <div class="box-body">
                  <?php if(isset($error) && $error != ""){?>
                  <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <?php echo $error; ?>
                  </div>
                  <?php } ?>

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
                       <!--  <th scope="col">Short Description</th> -->
                        <th scope="col">Image</th>
                        <th scope="col">Banner Image</th>
                        <th scope="col">Update Date</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                     <?php
          $i = 1;
          if(isset($news_num) && $news_num > 0){
            foreach($news_log as $keypic => $valpic){
            $edit_id = $valpic->news_id;
          ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        
                        <td><?php echo $valpic->news_name; ?></td>
                       <!--  <td><?php echo $valpic->news_short_desc; ?></td> -->

                        <td><img src="<?php if(isset($valpic->news_pic)){echo site_url($valpic->news_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td>

                         <td><img src="<?php if(isset($valpic->news_image) && $valpic->news_image != ""){echo site_url($valpic->news_image);}else{echo site_url('uploads/no_image.jpg');} ?>" width="100"></td>

                         <td><?php if($valpic->news_date != ""){echo date("d M, Y", $valpic->news_date);} ?></td>

                        <td><?php if($valpic->status == 'Y'){?><span class="label label-success">Active</span><?php }elseif($valpic->status == 'N'){?><span class="label label-warning">Inactive</span><?php } ?></td>

                        <td class="table-actions">
                            <a href="<?php echo site_url('administrator/editnews/'.$edit_id) ?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a>
                           <a href="<?php echo site_url('administrator/deletenews/'.$edit_id) ?>" title="Delete" class="with-tip" onclick="return confirm('Are you sure want to permanently block this?');"><i class="ion-trash-b"></i> Delete</a>
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