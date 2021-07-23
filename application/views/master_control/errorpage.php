<script language="javascript" type="text/javascript">
function chk_blank(){
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
	var returnval=emailfilter.test($('#email').val());
	
	if($('#unit_name').val() == ""){
		$('#ValidateErrorMsg').html('<li>Please <strong>Enter Unit</strong>.</li>');
		$('#ValidateErrorMsg').show();
		$('#unit_name').focus();
		return false;
	}
}
</script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Unauthorized Access </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Unauthorized Access</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
			<h1 style="margin:20px; background:#F00; border:#900 1px solid; color:#FFF; padding:10px; font-size:16px; text-align:center; font-weight:bold;">Sorry! You are not authorized to access this page.</h1>
        </div>
        <!-- /.box -->
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
