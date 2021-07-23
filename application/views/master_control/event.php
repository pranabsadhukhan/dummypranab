<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Manage Past Event </h1>
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
      
      if(isset($result_edit->event_id) && $result_edit->event_id !=""){
        $hidden = array('flag' => 'add','event_id' => $result_edit->event_id);
        echo form_open('administrator/updateevent', $attributes,$hidden);
      }else{
        $hidden = array('flag' => 'add');
        echo form_open('administrator/addevent', $attributes,$hidden);
      }
      ?>
          <div class="box-body">

                    

           

              <div class="form-group">Heading</label>
              <?php
              $data = array(
            'id'  => 'event_name',
            'name'  => 'event_name',
            'placeholder' => 'Enter heading',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->event_name !=""){
          $data['value'] = $result_edit->event_name;
        }
        echo form_input($data);
        ?>
            </div>
             <div class="form-group">Date</label>
              <?php
              $data = array(
            'id'  => 'event_date',
            'name'  => 'event_date',
            'placeholder' => 'Enter date',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->event_date !=""){
          $data['value'] = $result_edit->event_date;
        }
        echo form_input($data);
        ?>
            </div>
            <div class="form-group">Time</label>
              <?php
              $data = array(
            'id'  => 'event_time',
            'name'  => 'event_time',
            'placeholder' => 'Enter time',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->event_time !=""){
          $data['value'] = $result_edit->event_time;
        }
        echo form_input($data);
        ?>
            </div>
            <div class="form-group">Host</label>
              <?php
              $data = array(
            'id'  => 'event_host',
            'name'  => 'event_host',
            'placeholder' => 'Enter host',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->event_host !=""){
          $data['value'] = $result_edit->event_host;
        }
        echo form_input($data);
        ?>
            </div>
            <div class="form-group">Venue</label>
              <?php
              $data = array(
            'id'  => 'event_venue',
            'name'  => 'event_venue',
            'placeholder' => 'Enter venue',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->event_venue !=""){
          $data['value'] = $result_edit->event_venue;
        }
        echo form_input($data);
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Description</label>
              <?php
              $data = array(
            'id'  => 'event_content',
            'name'  => 'event_content',
            'placeholder' => 'Enter desc',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->event_content !=""){
          $data['value'] = $result_edit->event_content;
        }
        echo form_textarea($data);
        ?>
            </div>
            <div class="form-group">Video Link</label>
              <?php
              $data = array(
            'id'  => 'event_video_link',
            'name'  => 'event_video_link',
            'placeholder' => 'Enter event video link',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->event_video_link !=""){
          $data['value'] = $result_edit->event_video_link;
        }
        echo form_input($data);
        ?>
            </div>
            <div class="form-group">
              <label for="customer_name">Event information link</label>
              <?php
              $data = array(
            'id'  => 'event_information_link',
            'name'  => 'event_information_link',
            'placeholder' => 'Enter event information link',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->event_information_link !=""){
          $data['value'] = $result_edit->event_information_link;
        }
        echo form_textarea($data);
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Banner Image</label>
              <input type="file" name="event_pic" id="event_pic" />
              <?php
        if(isset($result_edit->event_pic) && $result_edit->event_pic != ""){
        ?>
              <img src="<?php echo site_url($result_edit->event_pic); ?>" width="100" />
              <?php 
        }
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Image</label>
              <input type="file" name="event_image" id="event_image" />
              <?php
        if(isset($result_edit->event_image) && $result_edit->event_image != ""){
        ?>
              <img src="<?php echo site_url($result_edit->event_image); ?>" width="100" />
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
                  <h3 class="box-title">List of Past Event</h3>
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
                        <th scope="col">Date</th>
                        <th scope="col">Banner Image</th>
                        <th scope="col">Image</th>
                        <th scope="col">Upload</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                     <?php
          $i = 1;
          if(isset($event_num) && $event_num > 0){
            foreach($event_log as $keypic => $valpic){
            $edit_id = $valpic->event_id;
          ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        
                        <td><?php echo $valpic->event_name; ?></td>
                       <td><?php echo $valpic->event_date; ?></td>
                        <td><img src="<?php if(isset($valpic->event_pic)){echo site_url($valpic->event_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td>

                         <td><img src="<?php if(isset($valpic->event_image) && $valpic->event_image != ""){echo site_url($valpic->event_image);}else{echo site_url('uploads/no_image.jpg');} ?>" width="100"></td>

                         <td><a href="<?php echo site_url('administrator/eventpic/'.$edit_id) ?>" class="label label-danger">upload</a></td>

                        <td><?php if($valpic->status == 'Y'){?><span class="label label-success">Active</span><?php }elseif($valpic->status == 'N'){?><span class="label label-warning">Inactive</span><?php } ?></td>

                        <td class="table-actions">
                            <a href="<?php echo site_url('administrator/editevent/'.$edit_id) ?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a>
                           <a href="<?php echo site_url('administrator/deleteevent/'.$edit_id) ?>" title="Delete" class="with-tip" onclick="return confirm('Are you sure want to permanently block this?');"><i class="ion-trash-b"></i> Delete</a>
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