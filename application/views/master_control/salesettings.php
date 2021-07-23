<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manage Site Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin Control</a></li>
        <li class="active">Site Settings</li>
      </ol>
    </section>
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Site Settings</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-group has-error" id="ValidateErrorMsg" style="display:none">
                </div>
                <?php 
               $hidden = array('flag' => 'add', 'setting_id' =>$result_log->setting_id);
                $attributes = array('name' => 'FormCategory', 'id' => 'FormCategory', 'autocomplete' => 'on', 'class' => 'block-content form', 'enctype' => 'multipart/form-data');
                echo form_open('administrator/updatesalesetting', $attributes,$hidden);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                        <label for="min_delivery_cod">Company Name</label>
                        <?php
                        $data = array(
                                'id'    => 'company_name',
                                'name'  => 'company_name',
                                'placeholder' => 'Enter Company Name',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->company_name !=""){
                            $data['value'] = $result_log->company_name;
                        }
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="min_delivery_cod">Address</label>
                        <?php
                        $data = array(
                                'id'    => 'address',
                                'name'  => 'address',
                                'placeholder' => 'Enter Address',
                                'class' => 'form-control ckeditor');
                        if(isset($result_log) && $result_log->address !=""){
                            $data['value'] = $result_log->address;
                        }
                        echo form_textarea($data);
                        ?>
                    </div>
                    <?php /*<div class="form-group">
                        <label for="min_delivery_cod">Head office</label>
                        <?php
                        $data = array(
                                'id'    => 'hoffice',
                                'name'  => 'hoffice',
                                'placeholder' => 'Enter Head Office',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->hoffice !=""){
                            $data['value'] = $result_log->hoffice;
                        }
                        echo form_textarea($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="min_delivery_cod">Branch Office</label>
                        <?php
                        $data = array(
                                'id'    => 'boffice',
                                'name'  => 'boffice',
                                'placeholder' => 'Enter Branch Office',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->boffice !=""){
                            $data['value'] = $result_log->boffice;
                        }
                        echo form_textarea($data);
                        ?>
                    </div>
                     <div class="form-group">
                        <label for="min_delivery_cod">Branch Address</label>
                        <?php
                        $data = array(
                                'id'    => 'branch_address',
                                'name'  => 'branch_address',
                                'placeholder' => 'Enter Branch Address',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->branch_address !=""){
                            $data['value'] = $result_log->branch_address;
                        }
                        echo form_textarea($data);
                        ?>
                    </div>*/?>
                   <!--  <div class="form-group">
                        <label for="delivery_charges">Landline No</label>
                        <?php
                        $data = array(
                                'id'    => 'landline_no',
                                'name'  => 'landline_no',
                                'placeholder' => 'Enter landline No',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->landline_no !=""){
                            $data['value'] = $result_log->landline_no;
                        }
                        echo form_input($data);
                        ?>
                    </div> -->

                    <div class="form-group">
                        <label for="delivery_charges">Mobile No</label>
                        <?php
                        $data = array(
                                'id'    => 'branch_phn',
                                'name'  => 'branch_phn',
                                'placeholder' => 'Enter Mobile No',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->branch_phn !=""){
                            $data['value'] = $result_log->branch_phn;
                        }
                        echo form_input($data);
                        ?>
                    </div>

                   <div class="form-group">
                        <label for="delivery_charges">Another Mobile No</label>
                        <?php
                        $data = array(
                                'id'    => 'hoffice',
                                'name'  => 'hoffice',
                                'placeholder' => 'Enter Alternate Mobile No',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->hoffice !=""){
                            $data['value'] = $result_log->hoffice;
                        }
                        echo form_input($data);
                        ?>
                    </div>

                  <!--   <div class="form-group">
                        <label for="delivery_charges">Website</label>
                        <?php
                        $data = array(
                                'id'    => 'cell_no',
                                'name'  => 'cell_no',
                                'placeholder' => 'Enter Website',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->cell_no !=""){
                            $data['value'] = $result_log->cell_no;
                        }
                        echo form_input($data);
                        ?>
                    </div> -->
                    <?php /*
                    
                     <div class="form-group">
                        <label for="min_delivery_cod">Office</label>
                        <?php
                        $data = array(
                                'id'    => 'office',
                                'name'  => 'office',
                                'placeholder' => 'Enter Office',
                            'class' => 'form-control ckeditor');
                        if(isset($result_log) && $result_log->office !=""){
                            $data['value'] = $result_log->office;
                        }
                        echo form_textarea($data);
                        ?>
                    </div>*/?>
                    <div class="form-group">
                        <label for="delivery_charges">Email ID</label>
                        <?php
                        $data = array(
                                'id'    => 'email',
                                'name'  => 'email',
                                'placeholder' => 'Enter Email ID',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->email !=""){
                            $data['value'] = $result_log->email;
                        }
                        echo form_input($data);
                        ?>
                    </div>
                    <!-- <div class="form-group">
                        <label for="delivery_charges">Alternate Email ID</label>
                        <?php
                        $data = array(
                                'id'    => 'message',
                                'name'  => 'message',
                                'placeholder' => 'Enter Email ID',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->message !=""){
                            $data['value'] = $result_log->message;
                        }
                        echo form_input($data);
                        ?>
                    </div> -->
                    <div class="form-group">
                        <label for="delivery_charges">Facebook Link</label>
                        <?php
                        $data = array(
                                'id'    => 'fb_link',
                                'name'  => 'fb_link',
                                'placeholder' => 'Enter Facebook Link',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->fb_link !=""){
                            $data['value'] = $result_log->fb_link;
                        }
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="delivery_charges">Twitter Link</label>
                        <?php
                        $data = array(
                                'id'    => 'twitter_link',
                                'name'  => 'twitter_link',
                                'placeholder' => 'Enter twitter Link',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->twitter_link !=""){
                            $data['value'] = $result_log->twitter_link;
                        }
                        echo form_input($data);
                        ?>
                    </div>                    <!-- <div class="form-group">
                        <label for="delivery_charges">Instagram Link</label>
                        <?php
                        $data = array(
                                'id'    => 'instagram_link',
                                'name'  => 'instagram_link',
                                'placeholder' => 'Enter Instagram Link',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->instagram_link !=""){
                            $data['value'] = $result_log->instagram_link;
                        }
                        echo form_input($data);
                        ?>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="delivery_charges">Linkedin</label>
                        <?php
                        $data = array(
                                'id'    => 'youtube_link',
                                'name'  => 'youtube_link',
                                'placeholder' => 'Enter linkedin Link',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->youtube_link !=""){
                            $data['value'] = $result_log->youtube_link;
                        }
                        echo form_input($data);
                        ?>
                    </div> -->
                    
                    <!-- <div class="form-group">
                        <label for="delivery_charges">Pinterest Link</label>
                        <?php
                        $data = array(
                                'id'    => 'pinterest_link',
                                'name'  => 'pinterest_link',
                                'placeholder' => 'Enter Pinterest Link',
                                'class' => 'form-control');
                        if(isset($result_log) && $result_log->pinterest_link !=""){
                            $data['value'] = $result_log->pinterest_link;
                        }
                        echo form_input($data);
                        ?>
                    </div> -->
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