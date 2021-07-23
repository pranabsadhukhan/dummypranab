<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Manage Solution </h1>
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
      
      if(isset($result_edit->solution_id) && $result_edit->solution_id !=""){
        $hidden = array('flag' => 'add','solution_id' => $result_edit->solution_id);
        echo form_open('administrator/updatesolution', $attributes,$hidden);
      }else{
        $hidden = array('flag' => 'add');
        echo form_open('administrator/addsolution', $attributes,$hidden);
      }
      ?>
          <div class="box-body">

                    

           

              <div class="form-group">
              <label for="customer_name">Name</label>
              <?php
              $data = array(
            'id'  => 'solution_name',
            'name'  => 'solution_name',
            'placeholder' => 'Enter Name',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->solution_name !=""){
          $data['value'] = $result_edit->solution_name;
        }
        echo form_input($data);
        ?>
            </div>

            <div class="form-group">
              <label for="customer_name">Content</label>
              <?php
        $data = array(
            'id'  => 'solution_content',
            'name'  => 'solution_content',
            'placeholder' => 'Enter Content',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->solution_content !=""){
          $data['value'] = $result_edit->solution_content;
        }
        echo form_textarea($data);
        ?>
            </div>

           <div class="form-group">
              <label for="customer_name">Link</label>
              <?php
              $data = array(
            'id'  => 'solution_link',
            'name'  => 'solution_link',
            'placeholder' => 'Enter location',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->solution_link !=""){
          $data['value'] = $result_edit->solution_link;
        }
        echo form_textarea($data);
        ?>
            </div>

            

  <div class="form-group">
              <label for="customer_name">Image</label>
              <input type="file" name="solution_pic" id="solution_pic" />
              <?php
        if(isset($result_edit->solution_pic) && $result_edit->solution_pic != ""){
        ?>
              <img src="<?php echo site_url($result_edit->solution_pic); ?>" width="100" />
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
                  <h3 class="box-title">List of Solution</h3>
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
                  <form action="<?php echo base_url(); ?>Administrator/deleteallsolution" method="post">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th><input type="checkbox" id="ckall"></th>
                        <th scope="col">Sl No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Link</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                     <?php
          $i = 1;
          if(isset($solution_num) && $solution_num > 0){
            foreach($solution_log as $keypic => $valpic){
            $edit_id = $valpic->solution_id;
          ?>
                    <tr>
                      <td><input class="ids" type="checkbox" name="ids[]" value="<?php echo $valpic->solution_id; ?>"></td>
                        <td><?php echo $i; ?></td>
                        
                        <td><?php echo $valpic->solution_name; ?></td>
                        <td><?php echo $valpic->solution_content; ?></td>
                        <td><?php echo $valpic->solution_link; ?></td>

                        <!-- <td><img src="<?php if(isset($valpic->testimonial_pic)){echo site_url($valpic->testimonial_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td> -->

                         <td><img src="<?php if(isset($valpic->solution_pic) && $valpic->solution_pic != ""){echo site_url($valpic->solution_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="100"></td>

                        <td><?php if($valpic->status == 'Y'){?><span class="label label-success">Active</span><?php }elseif($valpic->status == 'N'){?><span class="label label-warning">Inactive</span><?php } ?></td>
                        <td class="table-actions">
                            <a href="<?php echo site_url('administrator/editsolution/'.$edit_id) ?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a>
                           <a href="<?php echo site_url('administrator/deletesolution/'.$edit_id) ?>" title="Delete" class="with-tip" onclick="return confirm('Are you sure want to permanently block this?');"><i class="ion-trash-b"></i> Delete</a>
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
                  <input onclick="return confirm('Are you sure?')" type="submit" name="del" value="Delete All" class="btn btn-danger"></td>
  </form>
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
      <script type="text/javascript">

         $(function(){
    $("#ckall").click(function(){
      if($("#ckall").prop("checked")==true){
        $(".ids").prop("checked",true);
      }
      else{
        $(".ids").prop("checked",false);
      }
    })
  })
</script>