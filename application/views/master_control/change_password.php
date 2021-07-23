<script language="javascript" type="text/javascript">
function chkblank(){
	if($('#old_pass').val() == ""){
		$('#ValidateErrorMsg').html('Please enter your old password');
		$('#ValidateErrorMsg').show();
		$('#old_pass').focus();
		return false;
	}
	if($('#new_pass').val() == ""){
		$('#ValidateErrorMsg').html('Please enter your new password');
		$('#ValidateErrorMsg').show();
		$('#new_pass').focus();
		return false;
	}
	if($('#new_pass').val().length < 6){
		$('#ValidateErrorMsg').html('New password should be minimum of 6 charecter length');
		$('#ValidateErrorMsg').show();
		$('#new_pass').focus();
		return false;
	}
	if($('#con_pass').val() == ""){
		$('#ValidateErrorMsg').html('Please confirm password');
		$('#ValidateErrorMsg').show();
		$('#con_pass').focus();
		return false;
	}
	if($('#con_pass').val() != $('#new_pass').val()){
		$('#ValidateErrorMsg').html('Confirm password does not match');
		$('#ValidateErrorMsg').show();
		$('#con_pass').focus();
		return false;
	}
}
</script>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manage Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin Control</a></li>
      </ol>
    </section>
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
            <div class="box-body">
                  <?php if(isset($error) && $error != ""){?>
                  <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
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
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $msg; ?>.
                  </div>
                  <?php } ?>
                </div>
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-group has-error" id="ValidateErrorMsg" style="display:none; color:#F00;"> </div>
                </div>
				<?php 
                $hidden = array('flag' => 'add');
                $attributes = array('name' => 'FormCategory', 'id' => 'FormCategory', 'autocomplete' => 'on', 'class' => 'block-content form', 'onsubmit' => 'return chkblank()');
                echo form_open('administrator/updateadmin', $attributes,$hidden);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                        <label for="min_delivery_cod">Old Password</label>
                        <?php
                        $data = array(
                                'id'	=> 'old_pass',
                                'name'	=> 'old_pass',
                                'placeholder' => 'Enter Old Password',
                                'class'	=> 'form-control');
                        echo form_password($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="delivery_charges">New Password</label>
                        <?php
                        $data = array(
                                'id'	=> 'new_pass',
                                'name'	=> 'new_pass',
                                'placeholder' => 'Enter New password',
                                'class'	=> 'form-control');
                        echo form_password($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="delivery_charges">Confirm Password</label>
                        <?php
                        $data = array(
                                'id'	=> 'con_pass',
                                'name'	=> 'con_pass',
                                'placeholder' => 'Confirm new password',
                                'class'	=> 'form-control');
                        echo form_password($data);
                        ?>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>

      </div>