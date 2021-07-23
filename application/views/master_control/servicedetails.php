<div class="content-wrapper">
  <section class="content-header">
    <h1> Manage Image</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Brand
</a></li>
      <li class="active">activitie</li>
    </ol>
  </section>
  <style type="text/css">
  .processth{
   padding:5px !important;
   margin:0 !important;
   font-size: 13px !important;
   min-width:auto !important;
 }
 .processtd{
   padding:5px !important;
   margin:0 !important;
   font-size: 13px; !important;
   min-width:auto !important;
 }
 #example2{
   min-width:auto !important;
 }
 body { font-family:'Open Sans' Arial, Helvetica, sans-serif}
 ul,li { margin:0; padding:0 5px; list-style:none;}
 .label { color:#000; font-size:16px;}
</style>
  <!-- Content Header (Page header) -->
  <script language="javascript" type="text/javascript">
    $(document).keypress(function(e){
      if(e.which == 13){
        e.preventDefault();
      }
    });

    function chk_blank(){
     if($('#activitie_name').val() == ""){
      $('#ValidateErrorMsg').html('<li>Please enter <strong>associations name</strong>.</li>');
      $('#ValidateErrorMsg').show();
      $('#activitie_name').focus();
      return false;
    }
  }

</script>
  <style type="text/css">
.table-flot-new{
	float:left;
	width:14% !important;
}
</style>
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
        $attributes = array('name' => 'Formactivitie', 'id' => 'Formactivitie', 'autocomplete' => 'on', 'enctype' => 'multipart/form-data', 'class' => 'block-content form', 'onsubmit' => 'return chk_blank()');
        if(isset($result_edit) && $result_edit->servicedetails_id !=""){
         $hidden = array('flag' => 'edit', 'servicedetails_id' => $result_edit->servicedetails_id ,'service_id' => $result_log->service_id );
         echo form_open('administrator/editservicedetailsdata', $attributes,$hidden);
       }else{
         $hidden = array('flag' => 'add', 'service_id' => $result_log->service_id);
         echo form_open('administrator/addservicedetailsdata', $attributes,$hidden);
       }
       ?>
          <div class="box-body">
          
            <div class="form-group">
              <label for="service_pic">Image</label>
              <input type="file" name="image" id="image" />
              <?php
        if(isset($result_edit->image) && $result_edit->image != ""){
        ?>
              <img src="<?php echo site_url($result_edit->image); ?>" width="100" />
              <?php 
        }
        ?>
            </div>

            <!-- <div class="form-group">
              <label for="customer_name">Service Title</label>
              <?php
              $data = array(
            'id'  => 'servicepic_title',
            'name'  => 'servicepic_title',
            'placeholder' => 'Enter Service Name',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->servicepic_title !=""){
          $data['value'] = $result_edit->servicepic_title;
        }
        echo form_input($data);
        ?>
            </div>  -->

            <!-- <div class="form-group">
              <label for="customer_name">Service Subtitle</label>
              <?php
              $data = array(
            'id'  => 'servicepic_subtitle',
            'name'  => 'servicepic_subtitle',
            'placeholder' => 'Enter Service Subtitle',
            'class' => 'form-control');
        if(isset($result_edit) && $result_edit->servicepic_subtitle !=""){
          $data['value'] = $result_edit->servicepic_subtitle;
        }
        echo form_input($data);
        ?>
            </div> --> 

           <!--  <div class="form-group">
              <label for="customer_name">Description</label>
              <?php
              $data = array(
            'id'  => 'servicedetails_desc',
            'name'  => 'servicedetails_desc',
            'placeholder' => 'Enter desc',
            'class' => 'form-control, ckeditor');
        if(isset($result_edit) && $result_edit->servicedetails_desc !=""){
          $data['value'] = $result_edit->servicedetails_desc;
        }
        echo form_textarea($data);
        ?>
            </div>  -->

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

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List of Image</h3>
          
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if(isset($error) && $error != ""){?>
            <div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <?php echo $error; ?> </div>
            <?php } ?>
            <?php
          if(isset($msg) && $msg != ""){
          ?>
            <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <h4> <i class="icon fa fa-check"></i> Alert!</h4>
              <?php echo $msg; ?>. </div>
            <?php } ?>
          </div>
          <div class="box-body">
            <table id="datatable" class="table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">Sl No.</th>
                  <th scope="col">Image</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="table-actions">Actions</th>
                </tr>
              </thead>
              <tbody>
            
          <?php
          $i = 1;
          if(isset($result_num) && $result_num > 0){
            foreach($result_log as $key => $val){
              $products[$val->service_id] = $val->service_id;
            }
          }
          if(isset($product_num) && $product_num > 0){
          foreach($product_log as $keycourse => $val){
            $edit_id = $val->servicedetails_id;
            $sl = $i;
            ?>

                <tr>
                  <td><?php echo $sl; ?></td>

                  <td><img src="<?php if(isset($val->image) && $val->image !=""){echo site_url($val->image);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td>

                  <td><?php if($val->status == "Y"){?>
                    <span class="label label-success">Active</span>
                    <?php }elseif($val->status == "N"){?>
                    <span class="label label-warning">Inactive</span>
                    <?php }elseif($val->status == "C"){?>
                    <span class="label label-danger">Canceled</span>
                    <?php } ?></td>
                  <td class="table-actions"><a href="<?php echo site_url('administrator/editservicedetails/'.$val->service_id.'/'.$edit_id) ?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a><a href="<?php echo site_url('administrator/deleteservicedetails/'.$edit_id.'/'.$val->service_id) ?>" title="Edit" class="with-tip" onclick="return confirm('Are you sure that you want to delete this record?')"><i class="fa fa-trash"></i> Delete</a></td>
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
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination">
                &nbsp;
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
<?php 

?>
</div>
  <script language="javascript" type="text/javascript">
$(function(){
	$("#datatable").dataTable();
});
</script>
  <style type="text/css">
	#datatable th{
		font-size:12px;
		font-weight:bold;
		padding:5px !important;
	}
	#datatable td{
		font-size:12px;
		padding:5px !important;
		margin: 0px  !important;
	}
	#datatable .label{
		font-size:12px !important;
		padding:4px 5px !important;
		margin: 0px  !important;
	}
</style>