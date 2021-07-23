<script language="javascript" type="text/javascript">
function chk_blank(){
	if($('#name').val() == ""){
		$('#ValidateErrorMsg').html('<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i>Please enter <strong>feedback name</strong>.</label>');
		$('#ValidateErrorMsg').show();
		return false;
	}
}
$(function(){
	$("#datatable").dataTable();
});
</script>
<style type="text/css">
#datatable td{
	font-size:13px !important;
}
#datatable th{
	font-size:13px !important;
}
</style>
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Member Details
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('control_panel/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            

          <div class="row">
            <div class="col-xs-12">
              <div class="box">

                <div class="box-header">

                  <h3 class="box-title">List of Member Details</h3>

                </div><!-- /.box-header -->
                <ul class="nav navbar-right panel_toolbox">
              
            </ul>
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
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $msg; ?>.
                    
                  </div>
                  <?php } ?>
                <!-- <button class="btn btn-primary" type="button" onclick="location.href='<?php echo site_url('administrator/exportcontactrequest'); ?>'"><i class="fa fa-download"></i> Export Data</button> -->

                </div>
                <div class="box-body">
                  <table id="datatable" class="table-bordered table-hover">
                    <thead>
	                    <th scope="col">Sl No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">Message</th>
                        <th scope="col">Enq. Date</th>
                        <th scope="col" class="table-actions">Actions</th>
                </thead>
                    <tbody>
                    <?php
					$i = 1;
					if(isset($num_query) && $num_query > 0){
						foreach($log_query as $key=> $val){
						$edit_id = $val->member_id;
						$sl = $i;
					?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo ucwords(strtolower(stripslashes(trim($val->name))));?></td>
                        <td><?php echo stripslashes(trim($val->email_id));?></td>
                        <td><?php echo stripslashes(trim($val->phno));?></td>
                        <td><?php echo $val->msg; ?></td>
                        <td><?php if($val->create_date != ""){echo date("d M Y, H:i:s",$val->create_date);} ?></td>
                        <td class="table-actions">
                          
                           <a href="<?php echo site_url('administrator/deletemember/'.$edit_id) ?>" title="Delete" class="with-tip" onclick="return confirm('Are you sure want to permanently block this?');"><i class="ion-trash-b"></i> Delete</a>
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
                  <?php //echo $links; ?></ul></div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
