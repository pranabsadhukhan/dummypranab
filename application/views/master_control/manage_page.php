<div class="content-wrapper">
    <section class="content-header">
      <h1>
        CMS Pages
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Content Management</a></li>
        <li class="active">CMS Pages</li>
      </ol>
    </section>
        <!-- Content Header (Page header) -->
<?php if(isset($flag) && ($flag == "Add" || $flag == "edit")){?>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pages Management</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-group has-error" id="ValidateErrorMsg" style="display:none">
                </div>
               <?php 
				$attributes = array('name' => 'FormSubcategory', 'id' => 'FormSubcategory', 'autocomplete' => 'on', 'enctype' => 'multipart/form-data', 'class' => 'block-content form', 'onsubmit' => 'return chk_blank()');
					$hidden = array('flag' => 'edit', 'cms_id' => $result->cms_id);
					echo form_open('administrator/editdata', $attributes,$hidden);
				?>
                  <div class="box-body">
                    <div class="form-group">
                	<label for="cms_title">Page Title</label>
                    <div id="showsubcatdata">
                     <?php
					$data = array(
							'id'	=> 'cms_title',
							'name'	=> 'cms_title',
							'placeholder' => 'Enter page title',
							'class'	=> 'form-control'
							);
					if(isset($result) && $result->cms_title !=""){
						$data['value'] = stripslashes($result->cms_title);
					}
					echo form_input($data);
					?>
                    </div>
                </div>
                <div class="form-group">
                	<label for="cms_desc">Page Description</label>
                    <?php
					$data = array(
							'id'	=> 'cms_desc',
							'name'	=> 'cms_desc',
							'placeholder' => 'Enter page description',
							'class' => 'form-control ckeditor');
					if(isset($result) && $result->cms_desc !=""){
						$data['value'] = stripslashes($result->cms_desc);
					}
					echo form_textarea($data);
					?>
                </div>
                <div class="form-group">
                	<label for="cms_desc">Image</label>
                    <?php if(isset($result->cms_pic) && $result->cms_pic != ""){?>
                    <img src="<?php echo site_url($result->cms_pic) ?>" width="50" />
                    <?php } ?>
                    <input type="file" name="cms_pic" id="cms_pic" />
                </div>
                <?php /*?><div class="form-group">
                	<label for="meta_title">Meta Title</label>
                    <?php
					$data = array(
							'id'	=> 'meta_title',
							'name'	=> 'meta_title',
							'placeholder' => 'Enter page title',
							'class' => 'form-control');
					if(isset($result) && $result->meta_title !=""){
						$data['value'] = stripslashes($result->meta_title);
					}
					echo form_textarea($data);
					?>
                </div>
                <div class="form-group">
                	<label for="meta_keyword">Meta Keyword</label>
                    <?php
					$data = array(
							'id'	=> 'meta_keyword',
							'name'	=> 'meta_keyword',
							'placeholder' => 'Enter meta keyword',
							'class' => 'form-control');
					if(isset($result) && $result->meta_keyword !=""){
						$data['value'] = stripslashes($result->meta_keyword);
					}
					echo form_textarea($data);
					?>
                </div>
                <div class="form-group">
                	<label for="meta_description">Meta Description</label>
                    <?php
					$data = array(
							'id'	=> 'meta_description',
							'name'	=> 'meta_description',
							'placeholder' => 'Enter meta description',
							'class' => 'form-control');
					if(isset($result) && $result->meta_description !=""){
						$data['value'] = stripslashes($result->meta_description);
					}
					echo form_textarea($data);
					?>
                  </div><?php */?>
                  <div class="box-footer">
                    <button type="button" class="btn btn-default" onclick="location.href='<?php echo site_url('administrator/pages'); ?>'">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
<?php }else{?>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Page Content</h3>
                  <div style="float:right"><?php /*?><button type="button" class="btn btn-default" onclick="location.href='<?php echo site_url('administrator/addproduct'); ?>'">Add New Product</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="location.href='<?php echo site_url('administrator/exportproduct'); ?>'">Export to Excel</button><?php */?></div>
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
                        <th scope="col">Page Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Update Date</th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php
					$i = 1;
					foreach($result as $key => $val){
						$edit_id = $val->cms_id;
					?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo ucwords(strtolower(stripslashes($val->cms_title))); ?></td>
                        <td><img src="<?php if(isset($val->cms_pic) && $val->cms_pic != ""){echo site_url($val->cms_pic);}else{echo site_url('uploads/no_image.jpg');} ?>" width="50" /></td>
                        <td><?php if($val->cms_date != ""){echo date("d M, Y", $val->cms_date);} ?></td>
                        <td class="table-actions">
                            <a href="<?php echo site_url('administrator/pagesedit/'.$edit_id);?>" title="Edit" class="with-tip"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                    </tr>
                    <?php
							$i++;
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
                  &nbsp;</ul></div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?php } ?>
      </div>