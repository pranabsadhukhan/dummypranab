<script language="javascript" type="text/javascript">
function chk_blank(){
	if($('#category_id').val() == 0){
		$('#ValidateErrorMsg').html('<li>Please <strong>select category</strong>.</li>');
		$('#ValidateErrorMsg').show();
		$('#category_id').focus();
		return false;
	}
	if($('#subcategory_heading_id').val() == 0){
		$('#ValidateErrorMsg').html('<li>Please select <strong>subcategory heading</strong>.</li>');
		$('#ValidateErrorMsg').show();
		$('#subcategory_heading_id').focus();
		return false;
	}
	if($('#subcategory_name').val() == ""){
		$('#ValidateErrorMsg').html('<li>Please enter <strong>subcategory name</strong>.</li>');
		$('#ValidateErrorMsg').show();
		$('#subcategory_name').focus();
		return false;
	}
}
$(document).ready(function(){
	$('#category_id').change(function(){
		$('#subheadload').show();
		$.ajax({
			url: '<?php echo site_url('administrator/loadsubcategoryhead'); ?>',
			data: {'category_id' : $(this).val()},
			type: 'post',
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert('status:' + XMLHttpRequest.status + ', status text: ' + XMLHttpRequest.statusText);
				$('#subheadload').hide();
			},
			success: function(data){
				$('#loadsubcategory_heading_id').html(data);
				$('#subheadload').hide();
			}
		});
	});
});
</script>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Slide Banner
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Content Management</a></li>
            <li class="active">Slide Banner Management</li>
          </ol>
        </section>
        <?php
		if(isset($flag) && $flag == "edit"){
		?>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Slide Banner</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-group has-error" id="ValidateErrorMsg" style="display:none">
                </div>
                <?php 
				$attributes = array('name' => 'FormSubcategory', 'id' => 'FormSubcategory', 'autocomplete' => 'on', 'class' => 'block-content form', 'onsubmit' => 'return chk_blank()', 'enctype' => 'multipart/form-data');
				
				if(isset($result_edit) && $result_edit->banner_id > 0){
					$hidden = array('flag' => 'edit', 'banner_id' => $result_edit->banner_id);
					echo form_open('administrator/updatestaticbanner', $attributes,$hidden);
				}else{
					$hidden = array('flag' => 'add');
					echo form_open('administrator/addbanner', $attributes,$hidden);
				}
				?>
                  <div class="box-body">
                    <div class="form-group">
                    <label for="banner_title">Banner Title</label>
                    <?php
                        $data = array(
                                'id'	=> 'banner_title',
                                'name'	=> 'banner_title',
                                'placeholder' => 'Enter banner title',
                                'class'	=> 'form-control'
                                );
                        if(isset($result_edit) && $result_edit->banner_title !=""){
                            $data['value'] = stripslashes($result_edit->banner_title);
                        }
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                    <label for="banner_title">Banner Short Description</label>
                    <?php
                        $data = array(
                                'id'	=> 'banner_desc',
                                'name'	=> 'banner_desc',
                                'placeholder' => 'Enter banner title',
                                'class'	=> 'form-control'
                                );
                        if(isset($result_edit) && $result_edit->banner_desc !=""){
                            $data['value'] = stripslashes($result_edit->banner_desc);
                        }
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                    <label for="banner_title">Banner Link</label>
                    <?php
                        $data = array(
                                'id'	=> 'banner_link',
                                'name'	=> 'banner_link',
                                'placeholder' => 'Enter banner link',
                                'class'	=> 'form-control'
                                );
                        if(isset($result_edit) && $result_edit->banner_link !=""){
                            $data['value'] = stripslashes($result_edit->banner_link);
                        }
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                    <label for="banner_title">Display Order</label>
                    <?php
                        $data = array(
                                'id'	=> 'sort_order',
                                'name'	=> 'sort_order',
                                'placeholder' => 'Enter display order',
                                'class'	=> 'form-control'
                                );
                        if(isset($result_edit) && $result_edit->sort_order !=""){
                            $data['value'] = stripslashes($result_edit->sort_order);
                        }
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                    <label for="product_pic">Banner Pic</label>
                    <?php if(isset($result_edit->banner_pic) && $result_edit->banner_pic != ""){ ?>
                    <img src="<?php echo site_url($result_edit->banner_pic);?>" width="50" />
                    <?php }?>
                    <input type="file" id="banner_pic" name="banner_pic" >
                    </div>
                    <div class="form-group">
                    <label>Status</label>
                        <input type="radio" name="status" value="Y" <?php if(isset($result_edit) && $result_edit->status == "Y"){ ?>checked="checked"<?php }else{?>checked="checked"<?php } ?>>&nbsp;<label for="simple-radio-1">Active</label>
                        <input type="radio" name="status" value="N" <?php if(isset($result_edit) && $result_edit->status == "N"){ ?>checked="checked"<?php } ?>>&nbsp;<label for="simple-radio-2">Inactive</label>
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
		<?php } ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Slide Banner</h3>
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
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $msg; ?>.
                  </div>
                  <?php } ?>
                </div>
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Sl No.</th>
                        <th scope="col">Banner Type</th>
                        <th scope="col">Banner Text</th>
                        <th scope="col">Banner Link</th>
                        <th scope="col">Pic</th>
                        <th scope="col">Display Order</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                     <?php
					$i = 1;
					if(isset($banner_num) && $banner_num > 0){
						foreach($banner_log as $keypic => $valpic){
						$edit_id = $valpic->banner_id;
					?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php if($valpic->page_id == 2){echo "Climate Change and Hci Banner";}elseif($valpic->page_id == 3){echo "Climate Change Causes Banner";}elseif($valpic->page_id == 4){echo "Solutions Banner";}elseif($valpic->page_id == 5){echo "Leadership Banner";}elseif($valpic->page_id == 6){echo "Resources Banner";}elseif($valpic->page_id == 7){echo "Blog Banner";}elseif($valpic->page_id == 8){echo "News & Medis Banner";}elseif($valpic->page_id == 9){echo "Upcoming Event Banner";}elseif($valpic->page_id == 11){echo "Past Event Banner";}?></td>
                        <td><?php echo $valpic->banner_title; ?></td>
                        <td><?php echo $valpic->banner_link; ?></td>
                        <td><img src="<?php if(isset($valpic->banner_pic)){echo site_url($valpic->banner_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td>
                        <td><?php echo $valpic->sort_order; ?></td>
                        <td><?php if($valpic->status == 'Y'){?><span class="label label-success">Active</span><?php }elseif($valpic->status == 'N'){?><span class="label label-warning">Inactive</span><?php } ?></td>
                        <td class="table-actions">
                            <a href="<?php echo site_url('administrator/editstaticbanner/'.$edit_id) ?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a>
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