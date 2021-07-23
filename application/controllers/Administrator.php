<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class administrator extends CI_Controller {

	function __construct(){
		parent::__construct();
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		$this->load->model('model_main','fm');
		$this->load->model('model_admin','bm');
	}

	public function get_web_page( $url )
	{
		$user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

		$options = array(

			CURLOPT_CUSTOMREQUEST  =>"POST",        //set request type post or get
			CURLOPT_POST           =>false,        //set to GET
			CURLOPT_USERAGENT      => $user_agent, //set user agent
			CURLOPT_COOKIEFILE     =>"", //set cookie file
			CURLOPT_COOKIEJAR      =>"", //set cookie jar
			CURLOPT_RETURNTRANSFER => true,     // return web page
			CURLOPT_HEADER         => false,    // don't return headers
			CURLOPT_FOLLOWLOCATION => true,     // follow redirects
			CURLOPT_ENCODING       => true,       // handle all encodings
			CURLOPT_AUTOREFERER    => true,     // set referer on redirect
			CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
			CURLOPT_TIMEOUT        => 120,      // timeout on response
			CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
		);

		$ch      = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		$err     = curl_errno( $ch );
		$errmsg  = curl_error( $ch );
		$header  = curl_getinfo( $ch );
		curl_close( $ch );

		$header['errno']   = $err;
		$header['errmsg']  = $errmsg;
		$header['content'] = $content;
		return $header;
	}
	
	function roundUpToAny($n) {
		$x = round($n/5) * 5;
		return $x;
	}

	public function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9_\-]/', '', $string); // Removes special chars.
	
	   return preg_replace('/-+/', '_', $string); // Replaces multiple hyphens with single one.
	}

	public function cleanimage($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9_.\-]/', '', $string); // Removes special chars.
	
	   return preg_replace('/-+/', '_', $string); // Replaces multiple hyphens with single one.
	}

	function imageResize($imgName,$width,$height,$folder){
		$img_path =  './uploads/';

		// Configuration
		$config['image_library'] = 'gd2';
		$config['source_image'] = $img_path.$imgName;
		$config['new_image'] = $img_path.$folder.'/'.strtolower($this->cleanimage($imgName));
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = "";
		$config['width'] = $width;
		$config['height'] = $height;
		$config['quality'] = '72';

		// Load the Library

		$this->image_lib->initialize($config);
		// resize image
		$this->image_lib->resize();
		// handle if there is any problem
		if ( ! $this->image_lib->resize()){
			echo $this->image_lib->display_errors();
		}

		$this->image_lib->clear();

		return $config['new_image'];

	}
//========================================================== index ==========================================
	
	public function index(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/index');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}
	
	public function errorpage(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/errorpage');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

//======================================================== Sale Settings ==============================================

	public function salesetting(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result = $this->bm->fetch_editdata('1','sale_settings','setting_id');
			$data['result_log'] = $result['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/salesettings');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	public function updatesalesetting(){
		$data['company_name'] = $this->input->post('company_name');
		$data['hoffice'] = $this->input->post('hoffice');
		$data['boffice'] = $this->input->post('boffice');
		$data['address'] = $this->input->post('address');
		$data['branch_address'] = $this->input->post('branch_address');
		$data['landline_no'] = $this->input->post('landline_no');
		$data['cell_no'] = $this->input->post('cell_no');
		$data['branch_phn'] = $this->input->post('branch_phn');
		$data['message']=$this->input->post('message');
		$data['office']=$this->input->post('office');
		$data['email'] = $this->input->post('email');
		$data['fb_link'] = $this->input->post('fb_link');
		$data['twitter_link'] = $this->input->post('twitter_link');
		$data['google_link'] = $this->input->post('google_link');
		$data['youtube_link'] = $this->input->post('youtube_link');
		$data['instagram_link'] = $this->input->post('instagram_link');
		$data['pinterest_link'] = $this->input->post('pinterest_link');
		

		$id['setting_id'] = $this->input->post('setting_id');

		$this->bm->edit_data($data,'sale_settings',$id);
		$this->session->set_flashdata('msg','Successfully Updated');
		redirect('administrator/salesetting');
	}

//========================================================== Slide Banner Management ==========================================
	
	public function banner()
	{
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 2;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result_banner = $this->bm->fetch_all_clausebanner2('banner','page_id','asc','page_id');
			$data['banner_num'] = $result_banner['result_num'];
			$data['banner_log'] = $result_banner['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/manage_banner');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editbanner($id)
	{
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 2;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result_banner = $this->bm->fetch_all_clausebanner2('banner','page_id','asc','page_id');
			$data['banner_num'] = $result_banner['result_num'];
			$data['banner_log'] = $result_banner['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'banner','banner_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/manage_banner');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addbanner(){
		$file_name = $_FILES['banner_pic']['name'];
		$new_file_name = time().$file_name;

		$config =  array(
			'upload_path'     => './uploads/',
			'allowed_types'   => "gif|jpg|png|jpeg",
			'overwrite'       => TRUE ,
			'file_name'		=> $new_file_name
		);

		$this->upload->initialize($config);
		$field_name = "banner_pic";
		if ( ! $this->upload->do_upload($field_name)){
			$data1['pic'] = '';
		}else{
			$data1['pic'] = $this->upload->data();
			$data['banner_pic'] = 'uploads/'.$data1['pic']['file_name'];
		}

		$data['page_id'] = $this->input->post('page_id');
		$data['banner_title'] = $this->input->post('banner_title',true);
		$data['banner_desc'] = $this->input->post('banner_desc',true);
		$data['banner_link'] = $this->input->post('banner_link');
		$data['status'] = $this->input->post('status');
		$data['sort_order'] = $this->input->post('sort_order');

		$this->bm->adddata($data,'banner');
		$this->session->set_flashdata('msg','Successfully Added');
		redirect('administrator/banner');
	}

	public function updatebanner(){
		$file_name = $_FILES['banner_pic']['name'];
		$new_file_name = time().$file_name;

		$config =  array(
			'upload_path'     => './uploads/',
			'allowed_types'   => "gif|jpg|png|jpeg",
			'overwrite'       => TRUE ,
			'file_name'		=> $new_file_name
		);

		$this->upload->initialize($config);
		$field_name = "banner_pic";
		if ( ! $this->upload->do_upload($field_name)){
			$data1['pic'] = '';
		}else{
			$data1['pic'] = $this->upload->data();
			$data['banner_pic'] = 'uploads/'.$data1['pic']['file_name'];
		}

		$data['page_id'] = $this->input->post('page_id');
		$data['banner_title'] = $this->input->post('banner_title');
		$data['banner_desc'] = $this->input->post('banner_desc',true);
		$data['banner_link'] = $this->input->post('banner_link');
		$data['status'] = $this->input->post('status');
		$data['sort_order'] = $this->input->post('sort_order');

		$id['banner_id'] = $this->input->post('banner_id');

		$this->bm->edit_data($data,'banner',$id);
		$this->session->set_flashdata('msg','Successfully Updated');

		redirect('administrator/banner');
	}

	public function deletebanner($id){
		$this->db->query("DELETE FROM {PRE}banner where `banner_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');

		redirect('administrator/banner');
	}
	
//========================================================== Static Banner Management ==========================================

	public function staticbanner()
	{
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 2;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result_banner = $this->bm->fetch_all_clausebanner('banner','page_id','asc','page_id');
			$data['banner_num'] = $result_banner['result_num'];
			$data['banner_log'] = $result_banner['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/manage_banner_static');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editstaticbanner($id)
	{
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 2;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result_banner = $this->bm->fetch_all_clausebanner('banner','page_id','asc','page_id');
			$data['banner_num'] = $result_banner['result_num'];
			$data['banner_log'] = $result_banner['result_log'];
			
			$data['flag'] = "edit";
			
			$result_edit = $this->bm->fetch_editdata($id,'banner','banner_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/manage_banner_static');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function updatestaticbanner(){
		$file_name = $_FILES['banner_pic']['name'];
		$new_file_name = time().$file_name;

		$config =  array(
			'upload_path'     => './uploads/',
			'allowed_types'   => "gif|jpg|png|jpeg",
			'overwrite'       => TRUE ,
			'file_name'		=> $new_file_name
		);

		$this->upload->initialize($config);
		$field_name = "banner_pic";
		if ( ! $this->upload->do_upload($field_name)){
			$data1['pic'] = '';
		}else{
			$data1['pic'] = $this->upload->data();
			$data['banner_pic'] = 'uploads/'.$data1['pic']['file_name'];
		}

		//$data['page_id'] = 2;
		$data['banner_title'] = $this->input->post('banner_title');
		$data['banner_desc'] = $this->input->post('banner_desc',true);
		$data['banner_link'] = $this->input->post('banner_link');
		$data['status'] = $this->input->post('status');
		$data['sort_order'] = $this->input->post('sort_order');

		$id['banner_id'] = $this->input->post('banner_id');

		$this->bm->edit_data($data,'banner',$id);
		$this->session->set_flashdata('msg','Successfully Updated');

		redirect('administrator/staticbanner');
	}
//=========================================service==========================================

	public function service()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_service = $this->bm->fetch_all('service','service_id','asc');
			$data['service_num'] = $result_service['result_num'];
			$data['service_log'] = $result_service['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/service');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}
	
	public function addservice()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
			$data['flag'] = "add";

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/service');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function editservice($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			// $result_service = $this->bm->fetch_all('service','service_id','asc');
			// $data['service_num'] = $result_service['result_num'];
			// $data['service_log'] = $result_service['result_log'];
			
			$data['flag'] = "edit";

			$result_edit = $this->bm->fetch_editdata($id,'service','service_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/service');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addservicedata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['service_name']=$this->input->post('service_name');
			$databan['service_content']=$this->input->post('service_content');
			$databan['service_desc']=$this->input->post('service_desc');

			$file_name = $_FILES['service_pic']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "service_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['service_pic'] = '';
			}else{
				$data1['service_pic'] = $this->upload->data();
				$databan['service_pic'] = 'uploads/'.$data1['service_pic']['file_name'];
			} 

			$file_name = $_FILES['service_banner']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "service_banner";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['service_banner'] = '';
			}else{
				$data1['service_banner'] = $this->upload->data();
				$databan['service_banner'] = 'uploads/'.$data1['service_banner']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'service');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/service');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateservice(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['service_name']=$this->input->post('service_name');
			$databan['service_content']=$this->input->post('service_content');
			$databan['service_desc']=$this->input->post('service_desc');

			$file_name = $_FILES['service_pic']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "service_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['service_pic'] = '';
			}else{
				$data1['service_pic'] = $this->upload->data();
				$databan['service_pic'] = 'uploads/'.$data1['service_pic']['file_name'];
			} 

			$file_name = $_FILES['service_banner']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "service_banner";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['service_banner'] = '';
			}else{
				$data1['service_banner'] = $this->upload->data();
				$databan['service_banner'] = 'uploads/'.$data1['service_banner']['file_name'];
			}

			$databan['status'] = $this->input->post('status');	
			$id['service_id'] = $this->input->post('service_id');
		
			$this->bm->edit_data($databan,'service',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/service');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteservice($id){
		$this->db->query("DELETE FROM {PRE}service where `service_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/service');
	}	


//=================================Service Pic==================================
	public function servicedetails($id){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result = $this->bm->fetch_editdata($id,"service",'service_id');
			$data['result_log'] = $result['result_log'];
         	
			$result = $this->bm->fetch_all_clause("servicedetails",'servicedetails_id','desc','service_id',$id);
			$data['product_num'] = $result['result_num'];
			$data['product_log'] = $result['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/servicedetails');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

		public function addservicedetails(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');
			$result = $this->bm->fetch_all("service",'service_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];
 			
 			$result = $this->bm->fetch_all_clause("service",'service_id','ASC','status','Y');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];
			
			$data['flag'] = "add";
			
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/servicedetails');
			$this->load->view('master_control/footer');
			
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

public function addservicedetailsdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
			$dataspeak['service_id'] = $this->input->post('service_id');

			$file_name = $_FILES['image']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['image'] = '';
			}else{
				$data1['image'] = $this->upload->data();
				$dataspeak['image'] = 'uploads/'.$data1['image']['file_name'];
} 

			$dataspeak['status'] = $this->input->post('status');
	
			$this->bm->adddata($dataspeak,'servicedetails');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/servicedetails/'.$dataspeak['service_id']);
		}else{
			redirect('administrator/login');
		}
	}
public function editservicedetails($proid,$id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_edit = $this->bm->fetch_editdata($id,'servicedetails','servicedetails_id');
			$data['result_edit'] = $result_edit['result_log'];

			$result = $this->bm->fetch_editdata($proid,"service",'service_id');
			$data['result_log'] = $result['result_log'];
         	
			// $result = $this->bm->fetch_all_clause("servicedetails",'servicedetails_id','desc','service_id',$proid);
			// $data['product_num'] = $result['result_num'];
			// $data['product_log'] = $result['result_log'];

			$data['flag'] = "edit";

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/servicedetails');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	

	public function editservicedetailsdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$dataspeak['service_id'] = $this->input->post('service_id');

			$file_name = $_FILES['image']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['image'] = '';
			}else{
				$data1['image'] = $this->upload->data();
				$dataspeak['image'] = 'uploads/'.$data1['image']['file_name'];
}
			$dataspeak['status'] = $this->input->post('status');

			$id['servicedetails_id'] = $this->input->post('servicedetails_id');
			$this->bm->edit_data($dataspeak,'servicedetails',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
			redirect('administrator/servicedetails/'.$dataspeak['service_id']);
		}else{
		$this->session->set_flashdata('error','Unauthorized access! Please login first.');

			redirect('administrator/login');
		}
	}


	public function deleteservicedetails($id,$ser_id){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$this->db->query("delete from {PRE}servicedetails where `servicedetails_id` = '".$id."'");
			$this->session->set_flashdata('msg','Successfully Deleted');
			redirect('administrator/servicedetails/'.$ser_id);
		}else{
			redirect('administrator/login');
		}
	}
//==========================================Page Management ==========================================

	public function pages()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_pages();
			$data['result'] = $result['result_log'];
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/manage_page');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function pagesedit($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_editdata($id,'cms','cms_id');
			$data['result'] = $result['result_log'];
			$data['flag'] = "edit";
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/manage_page');
			$this->load->view('master_control/footer');
		}else{
			$this->load->view('master_control/login');
		}
	}

	public function editdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg|pdf|doc|docx|xml",
						  'overwrite'       => TRUE
					   );
	
			$this->upload->initialize($config);
	
			$field_name = "cms_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$datapage['cms_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}
	
			$id['cms_id'] = $this->input->post('cms_id');
			$datapage['cms_title'] = $this->input->post('cms_title');
			$datapage['cms_desc'] = $this->input->post('cms_desc');
			$datapage['meta_title'] = $this->input->post('meta_title');
			//$datapage['meta_keyword'] = $this->input->post('meta_keyword');
			$datapage['meta_description'] = $this->input->post('meta_description');
			$datapage['cms_date'] = time();
			//$datapage['status'] = $this->input->post('status');
	
			$result = $this->bm->edit_data($datapage,'cms',$id);
	
			if($result == $id['cms_id']){
				redirect('administrator/pages');
			}
		}else{
			$this->session->set_flashdata('error','Unauthorized access. Please login first');
			redirect('administrator/login');
		}
	}

	//==========================comment=====

	public function comment()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->comment();
			$data['result'] = $result['result_log'];
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/comment');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function commentedit($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_editdata($id,'comment','comment_id');
			$data['result'] = $result['result_log'];
			$data['flag'] = "edit";
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/comment');
			$this->load->view('master_control/footer');
		}else{
			$this->load->view('master_control/login');
		}
	}

	public function editcommentdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
	
			$id['comment_id'] = $this->input->post('comment_id');
			$datapage['name'] = $this->input->post('name');
			$datapage['phno'] = $this->input->post('phno');
			$datapage['email_id'] = $this->input->post('email_id');
			$datapage['comm'] = $this->input->post('comm');
			$datapage['home'] = $this->input->post('home');
			$datapage['create_date'] = time();
			//$datapage['status'] = $this->input->post('status');
	
			$result = $this->bm->edit_data($datapage,'comment',$id);
	
			if($result == $id['comment_id']){
				redirect('administrator/comment');
			}
		}else{
			$this->session->set_flashdata('error','Unauthorized access. Please login first');
			redirect('administrator/login');
		}
	}

public function deletecomment($id)
	{
		$this->db->query("DELETE FROM {PRE}comment where `comment_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');

		redirect('administrator/comment');

	}


	//============= contact us ===========

	public function contact(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_contact = $this->bm->fetch_all('contact','create_date','DESC');
			$data['num_contact'] = $result_contact['result_num'];
			$data['log_contact'] = $result_contact['result_log'];
			
			$data['msg'] = $this->session->flashdata('msg');

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/contact');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	// public function exportcontactrequest(){
	// 	$data = $this->session->userdata("loged_user");
	// 	$data['menu_id'] = 1;
	// 	if(isset($data['login_status']) && $data['login_status'] == TRUE){
	// 		$filename = "contact-request".date('d-m-Y').".csv";
	// 		$fp = fopen('php://output', 'w');											

	// 		$header[] = 'Sl No';
	// 		$header[] = 'Date';
	// 		$header[] = 'Name';
	// 		$header[] = 'Email';
	// 		$header[] = 'Mobile';
	// 		$header[] = 'Message';
			
	// 		header('Content-type: application/csv');
	// 		header('Content-Disposition: attachment; filename='.$filename);
	// 		fputcsv($fp, $header);
			
	// 		$result_contact = $this->bm->fetch_all('contact','create_date','DESC');
	// 		$num_contact = $result_contact['result_num'];
	// 		$log_contact= $result_contact['result_log'];
			
	// 		if(isset($num_contact) && $num_contact > 0){
	// 			foreach($log_contact as $key => $val){
										
	// 				$row[$key][] = ($key + 1);
	// 				$row[$key][] = date("d M, Y",$val->create_date);
	// 				$row[$key][] = stripslashes(trim($val->name));
	// 				$row[$key][] = stripslashes(trim($val->email_id));
	// 				$row[$key][] = stripslashes(trim($val->phno));
	// 				$row[$key][] = stripslashes(trim($val->msg));
					
	// 				fputcsv($fp, $row[$key]);
	// 			}
	// 		}
	// 		exit;
	// 	}else{
	// 		redirect('administrator/login');
	// 	}
	// }

	public function deletecontact($id)
	{
		$this->db->query("DELETE FROM {PRE}contact where `contact_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');

		redirect('administrator/contact');

	}
		//========================query=====================

	public function member(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_member = $this->bm->fetch_all('member','create_date','DESC');
			$data['num_query'] = $result_member['result_num'];
			$data['log_query'] = $result_member['result_log'];
			
			$data['msg'] = $this->session->flashdata('msg');

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/member');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}


	public function deletemember($id)
	{
		$this->db->query("DELETE FROM {PRE}member where `member_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');

		redirect('administrator/member');

	}

	//========================contact query=====================

	public function jobpost(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_jobpost = $this->bm->fetch_all('jobpost','create_date','DESC');
			$data['num_jobpost'] = $result_jobpost['result_num'];
			$data['log_jobpost'] = $result_jobpost['result_log'];
			
			$data['msg'] = $this->session->flashdata('msg');

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/jobpost');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	public function exportjob(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$filename = "Jobpost".date('d-m-Y').".csv";
			$fp = fopen('php://output', 'w');											

			$header[] = 'Sl No';
			$header[] = 'Date';
			$header[] = 'Company Name ';
			$header[] = 'Company Email';
			$header[] = 'Company Phone No';
			$header[] = 'Contact Person';
			$header[] ='Job Title';
			$header[] = 'Job Description';
			$header[] = 'Job Location';
			$header[] = 'Relevant Experience';
			$header[] = 'Total Experience';
			$header[] = 'Number Of Openings';

			header('Content-type: application/csv');
			header('Content-Disposition: attachment; filename='.$filename);
			fputcsv($fp, $header);
			
			$result_jobpost = $this->bm->fetch_all('jobpost','create_date','DESC');
			$num_jobpost = $result_jobpost['result_num'];
			$log_jobpost = $result_jobpost['result_log'];
			
			if(isset($num_jobpost) && $num_jobpost > 0){
				foreach($log_jobpost as $key => $val){
										
					$row[$key][] = ($key + 1);
					$row[$key][] = date("d M, Y",$val->create_date);
					$row[$key][] = stripslashes(trim($val->name));
					$row[$key][] = stripslashes(trim($val->email_id));
					$row[$key][] = stripslashes(trim($val->phno));
					$row[$key][] = stripslashes(trim($val->person));
					$row[$key][] = stripslashes(trim($val->title));
					$row[$key][] = stripslashes(trim($val->des));
					$row[$key][] = stripslashes(trim($val->location));
					$row[$key][] = stripslashes(trim($val->exp));
					$row[$key][] = stripslashes(trim($val->texp));
					$row[$key][] = stripslashes(trim($val->open));
					
					fputcsv($fp, $row[$key]);
				}
			}
			exit;
		}else{
			redirect('administrator/login');
		}
	}
	public function deletejobpost($id)
	{
		$this->db->query("DELETE FROM {PRE}jobpost where `jobpost_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');

		redirect('administrator/jobpost');

	}
	//========================post resume=====================

	public function postresume(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_postresume = $this->bm->fetch_all('postresume','create_date','DESC');
			$data['num_postresume'] = $result_postresume['result_num'];
			$data['log_postresume'] = $result_postresume['result_log'];
			
			$data['msg'] = $this->session->flashdata('msg');

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/postresume');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	public function exportresume(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$filename = "Postresume".date('d-m-Y').".csv";
			$fp = fopen('php://output', 'w');											

			$header[] = 'Sl No';
			$header[] = 'Date';
			$header[] = 'Name';
			$header[] = 'Date Of Birth';
			$header[] = 'Sex';
			$header[] = 'Mobile no';
			$header[] ='Email Id';
			$header[] ='Applying For';
			$header[] = 'Total Experience';
			$header[] = 'Present Location';
			$header[] = 'Preferred Location';
			$header[] = 'Current CTC';
			$header[] = 'Expected CTC';

			header('Content-type: application/csv');
			header('Content-Disposition: attachment; filename='.$filename);
			fputcsv($fp, $header);
			
			$result_postresume = $this->bm->fetch_all('postresume','create_date','DESC');
			$num_postresume = $result_postresume['result_num'];
			$log_postresume = $result_postresume['result_log'];
			
			if(isset($num_postresume) && $num_postresume > 0){
				foreach($log_postresume as $key => $val){
										
					$row[$key][] = ($key + 1);
					$row[$key][] = date("d M, Y",$val->create_date);
					$row[$key][] = stripslashes(trim($val->name));
					$row[$key][] = stripslashes(trim($val->dob));
					$row[$key][] = stripslashes(trim($val->groups));
					$row[$key][] = stripslashes(trim($val->phno));
					$row[$key][] = stripslashes(trim($val->email_id));
					$row[$key][] = stripslashes(trim($val->app));
					$row[$key][] = stripslashes(trim($val->exp));
					$row[$key][] = stripslashes(trim($val->location));
					$row[$key][] = stripslashes(trim($val->plocation));
					$row[$key][] = stripslashes(trim($val->cctc));
					$row[$key][] = stripslashes(trim($val->ectc));
					
					fputcsv($fp, $row[$key]);
				}
			}
			exit;
		}else{
			redirect('administrator/login');
		}
	}


	public function deletepostresume($id)
	{
		$this->db->query("DELETE FROM {PRE}postresume where `postresume_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');

		redirect('administrator/postresume');

	}



	//=====================Clients=======================



public function clients()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_clients = $this->bm->fetch_all('clients','clients_id','asc');
			$data['clients_num'] = $result_clients['result_num'];
			$data['clients_log'] = $result_clients['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/clients');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editclients($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_clients = $this->bm->fetch_all('clients','clients_id','asc');
			$data['clients_num'] = $result_clients['result_num'];
			$data['clients_log'] = $result_clients['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'clients','clients_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/clients');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addclients(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

$file_name = $_FILES['clients_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "clients_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['clients_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'clients');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/clients');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateclients(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

$file_name = $_FILES['clients_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "clients_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['clients_pic'] = 'uploads/'.$data1['pic']['file_name'];
			};

			$databan['status']=$this->input->post('status');
			$id['clients_id'] = $this->input->post('clients_id');
		
			$this->bm->edit_data($databan,'clients',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/clients');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteclients($id){
		$this->db->query("DELETE FROM {PRE}clients where `clients_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/clients');
	}

	//=====================Chakladher Our Galley=======================



public function gallery()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_gallery = $this->bm->fetch_all('gallery','gallery_id','asc');
			$data['gallery_num'] = $result_gallery['result_num'];
			$data['gallery_log'] = $result_gallery['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/gallery');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editgallery($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_gallery = $this->bm->fetch_all('gallery','gallery_id','asc');
			$data['gallery_num'] = $result_gallery['result_num'];
			$data['gallery_log'] = $result_gallery['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'gallery','gallery_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/gallery');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addgallery(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

$file_name = $_FILES['gallery_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'max_size' => 1000000000,
						  'file_name'		=> $new_file_name
					   );
	
			 // $this->load->library('upload', $config);
			$this->upload->initialize($config);
			$field_name = "gallery_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['gallery_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'gallery');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/gallery');
		}else{

			redirect('administrator/login');
		}
	}

		public function updategallery(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

$file_name = $_FILES['gallery_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "gallery_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['gallery_pic'] = 'uploads/'.$data1['pic']['file_name'];
			};

			$databan['status']=$this->input->post('status');
			$id['gallery_id'] = $this->input->post('gallery_id');
		
			$this->bm->edit_data($databan,'gallery',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/gallery');
		}else{

			redirect('administrator/login');
		}
	}

	public function deletegallery($id){
		$this->db->query("DELETE FROM {PRE}gallery where `gallery_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/gallery');
	}

	//=====================Chakladher Our Profile=======================
	
public function profile()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_profile = $this->bm->fetch_all('profile','profile_id','asc');
			$data['profile_num'] = $result_profile['result_num'];
			$data['profile_log'] = $result_profile['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/profile');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editprofile($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_profile = $this->bm->fetch_all('profile','profile_id','asc');
			$data['profile_num'] = $result_profile['result_num'];
			$data['profile_log'] = $result_profile['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'profile','profile_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/profile');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addprofile(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

$file_name = $_FILES['profile_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "profile_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['profile_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'profile');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/profile');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateprofile(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

$file_name = $_FILES['profile_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "profile_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['profile_pic'] = 'uploads/'.$data1['pic']['file_name'];
			};

			$databan['status']=$this->input->post('status');
			$id['profile_id'] = $this->input->post('profile_id');
		
			$this->bm->edit_data($databan,'profile',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/profile');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteprofile($id){
		$this->db->query("DELETE FROM {PRE}profile where `profile_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/profile');
	}

	//================================category========================

public function category()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/category');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

public function addcategory(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
			$dataspeak['category_name'] = $this->input->post('category_name');

			// $file_name = $_FILES['category_image']['name'];
			// $new_file_name = time().$file_name;
			// $config =  array(
			// 	'upload_path'     => './uploads/',
			// 	'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
			// 	'overwrite'       => TRUE,
			// 	'file_name'		=> $new_file_name
			// );
			// $this->upload->initialize($config);
			// $field_name = "category_image";
			// if ( ! $this->upload->do_upload($field_name)){
			// 	$data1['category_image'] = '';
			// }else{
			// 	$data1['category_image'] = $this->upload->data();
			// 	$dataspeak['category_image'] = 'uploads/'.$data1['category_image']['file_name'];
			// }

			$dataspeak['status'] = $this->input->post('status');
	
			$this->bm->adddata($dataspeak,'category');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/category');
		}else{
			redirect('administrator/login');
		}
	}

	public function editcategory($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_edit = $this->bm->fetch_editdata($id,'category','category_id');
			$data['result_edit'] = $result_edit['result_log'];

			$result = $this->bm->fetch_all("category",'category_name','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/category');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	

	public function updatecategory(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
			$dataspeak['category_name'] = $this->input->post('category_name');

			// $file_name = $_FILES['category_image']['name'];
			// $new_file_name = time().$file_name;
			// $config =  array(
			// 	'upload_path'     => './uploads/',
			// 	'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
			// 	'overwrite'       => TRUE,
			// 	'file_name'		=> $new_file_name
			// );
			// $this->upload->initialize($config);
			// $field_name = "category_image";
			// if ( ! $this->upload->do_upload($field_name)){
			// 	$data1['category_image'] = '';
			// }else{
			// 	$data1['category_image'] = $this->upload->data();
			// 	$dataspeak['category_image'] = 'uploads/'.$data1['category_image']['file_name'];
			// }

			$dataspeak['status'] = $this->input->post('status');
	
			$id['category_id'] = $this->input->post('category_id');
			$this->bm->edit_data($dataspeak,'category',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
			redirect('administrator/category');
		}else{
			redirect('administrator/login');
		}
	}

	public function deletecategory($id){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$this->db->query("delete from {PRE}category where `category_id` = '".$id."'");
			$this->session->set_flashdata('msg','Successfully Deleted');
			redirect('administrator/category');
		}else{
			redirect('administrator/login');
		}
	}
//============================subcategory============================================
	public function subcategory(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];

			$result = $this->bm->fetch_all("subcategory",'subcategory_id','desc');
			$data['product_num'] = $result['result_num'];
			$data['product_log'] = $result['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/subcategory');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

		public function addsubcategory(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');
			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];

			
			$data['flag'] = "add";
			
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/subcategory');
			$this->load->view('master_control/footer');
			
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

public function addsubcategorydata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
			
			$dataspeak['category_id'] = $this->input->post('category_id');
			$dataspeak['subcategory_name'] = $this->input->post('subcategory_name');


			// $file_name = $_FILES['subcategory_pic']['name'];
			// $new_file_name = time().$file_name;
			// $config =  array(
			// 	'upload_path'     => './uploads/',
			// 	'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
			// 	'overwrite'       => TRUE,
			// 	'file_name'		=> $new_file_name
			// );
			// $this->upload->initialize($config);
			// $field_name = "subcategory_pic";
			// if ( ! $this->upload->do_upload($field_name)){
			// 	$data1['subcategory_pic'] = '';
			// }else{
			// 	$data1['subcategory_pic'] = $this->upload->data();
			// 	$dataspeak['subcategory_pic'] = 'uploads/'.$data1['subcategory_pic']['file_name'];
			// }

			// $dataspeak['subcategorypic_desc'] = $this->input->post('subcategorypic_desc');
			$dataspeak['link'] = $this->input->post('link');
			$dataspeak['links'] = $this->input->post('links');
			$dataspeak['status'] = $this->input->post('status');
	
			$this->bm->adddata($dataspeak,'subcategory');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/subcategory');
		}else{
			redirect('administrator/login');
		}
	}

	public function editsubcategory($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_edit = $this->bm->fetch_editdata($id,'subcategory','subcategory_id');
			$data['result_edit'] = $result_edit['result_log'];

			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];
				$data['flag'] = "edit";

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/subcategory');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	

	public function editsubcategorydata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$dataspeak['category_id'] = $this->input->post('category_id');

			$dataspeak['subcategory_name'] = $this->input->post('subcategory_name');

			// $file_name = $_FILES['subcategory_pic']['name'];
			// $new_file_name = time().$file_name;
			// $config =  array(
			// 	'upload_path'     => './uploads/',
			// 	'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
			// 	'overwrite'       => TRUE,
			// 	'file_name'		=> $new_file_name
			// );
			// $this->upload->initialize($config);// $this->load->library('upload', $config);-------Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:---
			// $field_name = "subcategory_pic";
			// if ( ! $this->upload->do_upload($field_name)){
			// 	$data1['subcategory_pic'] = '';
			// }else{
			// 	$data1['subcategory_pic'] = $this->upload->data();
			// 	$dataspeak['subcategory_pic'] = 'uploads/'.$data1['subcategory_pic']['file_name'];
			// }


   //     		$dataspeak['subcategorypic_desc'] = $this->input->post('subcategorypic_desc');
			$dataspeak['link'] = $this->input->post('link');
			$dataspeak['links'] = $this->input->post('links');
			$dataspeak['status'] = $this->input->post('status');

			$id['subcategory_id'] = $this->input->post('subcategory_id');
			$this->bm->edit_data($dataspeak,'subcategory',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
			redirect('administrator/subcategory');
		}else{
		$this->session->set_flashdata('error','Unauthorized access! Please login first.');

			redirect('administrator/login');
		}
	}

	public function deletesubcategory($id){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$this->db->query("delete from {PRE}subcategory where `subcategory_id` = '".$id."'");
			$this->session->set_flashdata('msg','Successfully Deleted');
			redirect('administrator/subcategory');
		}else{
			redirect('administrator/login');
		}
	}
//==========================product========================
// 	public function product($id=0){
// 		$data = $this->session->userdata("loged_user");
// 		if(isset($data['login_status']) && $data['login_status'] == TRUE){
// 			// if($id > 0){
// 			$result = $this->bm->fetch_editdata($id,"subcategory",'subcategory_id');
// 			$data['result_log'] = $result['result_log'];

// 			$result = $this->bm->fetch_all_clause("product",'product_id','desc','subcategory_id',$id);
// 			$data['product_num'] = $result['result_num'];
// 			$data['product_log'] = $result['result_log'];

// 			$data['msg'] = $this->session->flashdata('msg');
// 			$data['error'] = $this->session->flashdata('error');

// 			$this->load->view('master_control/header',$data);
// 			$this->load->view('master_control/product');
// 			$this->load->view('master_control/footer');
// 		// }
// 		// else{
// 		// 		redirect('administrator/errorpage');
// 		// 	}
// 	}else{
// 			redirect('administrator/login');
// 		}
// 	}

// 		public function addproduct(){
// 		$data = $this->session->userdata("loged_user");
// 		$data['menu_id'] = 1;
// 		if(isset($data['login_status']) && $data['login_status'] == TRUE){
// 			$data['msg'] = $this->session->flashdata('msg');
// 			$data['error'] = $this->session->flashdata('error');
// 			$result = $this->bm->fetch_all("subcategory",'subcategory_id','desc');
// 			$data['result_num'] = $result['result_num'];
// 			$data['result_log'] = $result['result_log'];
 			
//  			$result = $this->bm->fetch_all_clause("subcategory",'subcategory_id','ASC','status','Y');
// 			$data['result_num'] = $result['result_num'];
// 			$data['result_log'] = $result['result_log'];
			
// 			$data['flag'] = "add";
			
// 			$this->load->view('master_control/header',$data);
// 			$this->load->view('master_control/product');
// 			$this->load->view('master_control/footer');
			
// 		}else{
// 			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
// 			redirect('administrator/login');
// 		}
// 	}

// public function addproductdata(){
// 		$data = $this->session->userdata("loged_user");
// 		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
// 			$dataspeak['subcategory_id'] = $this->input->post('subcategory_id');
// 			$dataspeak['Product_name'] = $this->input->post('product_name');

// 			$file_name = $_FILES['link']['name'];
// 			$new_file_name = time().$file_name;
// 			$config =  array(
// 				'upload_path'     => './uploads/',
// 				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
// 				'overwrite'       => TRUE,
// 				'file_name'		=> $new_file_name
// 			);
// 			$this->upload->initialize($config);
// 			$field_name = "link";
// 			if ( ! $this->upload->do_upload($field_name)){
// 				$data1['link'] = '';
// 			}else{
// 				$data1['link'] = $this->upload->data();
// 				$dataspeak['link'] = 'uploads/'.$data1['link']['file_name'];
// 			}


// 			$file_name = $_FILES['product_image']['name'];
// 			$new_file_name = time().$file_name;
// 			$config =  array(
// 				'upload_path'     => './uploads/',
// 				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
// 				'overwrite'       => TRUE,
// 				'file_name'		=> $new_file_name
// 			);
// 			$this->upload->initialize($config);
// 			$field_name = "product_image";
// 			if ( ! $this->upload->do_upload($field_name)){
// 				$data1['product_image'] = '';
// 			}else{
// 				$data1['product_image'] = $this->upload->data();
// 				$dataspeak['product_image'] = 'uploads/'.$data1['product_image']['file_name'];
// 			}

// 			$dataspeak['status'] = $this->input->post('status');
	
// 			$this->bm->adddata($dataspeak,'product');
// 			$this->session->set_flashdata('msg','Successfully Added');
// 			redirect('administrator/product/'.$dataspeak['subcategory_id']);
// 		}else{
// 			redirect('administrator/login');
// 		}
// 	}
// public function editproduct($proid,$id)
// 	{
// 		$data = $this->session->userdata("loged_user");
// 		if(isset($data['login_status']) && $data['login_status'] == TRUE){
// 			$data['msg'] = $this->session->flashdata('msg');
// 			$data['error'] = $this->session->flashdata('error');

// 			$result_edit = $this->bm->fetch_editdata($id,'product','product_id');
// 			$data['result_edit'] = $result_edit['result_log'];

// 			$result = $this->bm->fetch_editdata($proid,"subcategory",'subcategory_id');
// 			$data['result_log'] = $result['result_log'];
         	
// 			$result = $this->bm->fetch_all_clause("product",'product_id','desc','subcategory_id',$proid);
// 			$data['product_num'] = $result['result_num'];
// 			$data['product_log'] = $result['result_log'];

// 			$data['flag'] = "edit";

// 			$this->load->view('master_control/header',$data);
// 			$this->load->view('master_control/product');
// 			$this->load->view('master_control/footer');
// 		}else{
// 			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
// 			redirect('administrator/login');
// 		}
// 	}

	

// 	public function editproductdata(){
// 		$data = $this->session->userdata("loged_user");
// 		if(isset($data['login_status']) && $data['login_status'] == TRUE){
// 			$dataspeak['subcategory_id'] = $this->input->post('subcategory_id');
// 			$dataspeak['Product_name'] = $this->input->post('product_name');

			
// 			$file_name = $_FILES['link']['name'];
// 			$new_file_name = time().$file_name;
// 			$config =  array(
// 				'upload_path'     => './uploads/',
// 				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
// 				'overwrite'       => TRUE,
// 				'file_name'		=> $new_file_name
// 			);
// 			$this->upload->initialize($config);
// 			$field_name = "link";
// 			if ( ! $this->upload->do_upload($field_name)){
// 				$data1['link'] = '';
// 			}else{
// 				$data1['link'] = $this->upload->data();
// 				$dataspeak['link'] = 'uploads/'.$data1['link']['file_name'];
// 			}


			


// 			$file_name = $_FILES['product_image']['name'];
// 			$new_file_name = time().$file_name;
// 			$config =  array(
// 				'upload_path'     => './uploads/',
// 				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
// 				'overwrite'       => TRUE,
// 				'file_name'		=> $new_file_name
// 			);
// 			$this->upload->initialize($config);
// 			$field_name = "product_image";
// 			if ( ! $this->upload->do_upload($field_name)){
// 				$data1['product_image'] = '';
// 			}else{
// 				$data1['product_image'] = $this->upload->data();
// 				$dataspeak['product_image'] = 'uploads/'.$data1['product_image']['file_name'];
// 			}
// 			$dataspeak['status'] = $this->input->post('status');

// 			$id['product_id'] = $this->input->post('product_id');
// 			$this->bm->edit_data($dataspeak,'product',$id);
// 			$this->session->set_flashdata('msg','Successfully Updated');
// 			redirect('administrator/product/'.$dataspeak['subcategory_id']);
// 		}else{
// 		$this->session->set_flashdata('error','Unauthorized access! Please login first.');

// 			redirect('administrator/login');
// 		}
// 	}


// 	public function deleteproduct($id,$pro_id){
// 		$data = $this->session->userdata("loged_user");
// 		if(isset($data['login_status']) && $data['login_status'] == TRUE){
// 			$this->db->query("delete from {PRE}product where `product_id` = '".$id."'");
// 			$this->session->set_flashdata('msg','Successfully Deleted');
// 			redirect('administrator/product/'.$pro_id);
// 		}else{
// 			redirect('administrator/login');
// 		}
// 	}

	public function product(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];

			/*$result = $this->bm->fetch_all("product",'product_id','desc');
			$data['product_num'] = $result['result_num'];
			$data['product_log'] = $result['result_log'];*/

			$result = $this->bm->fetch_product();
			$data['product_num'] = $result['row_num'];
			$data['product_log'] = $result['row_log'];

//  echo "<pre>";
// print_r($data);
// die;
 			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/product');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}
	public function get_all_sub(){
		$id = $this->input->post('value');
// echo $id;
// die;
		$result = $this->bm->fetch_subcategory_id($id,'subcategory');
		$data['result_num'] = $result['result_num'];
		$data['result_log'] = $result['result_log'];

		echo '<label for="exampleInputEmail1">Select Subcategory</label>
              <select class="form-control" name="subcategory" id="subcategory">
                <option value="0"> Select Subcategory</option>';
		        if(isset($data['result_num']) && $data['result_num'] > 0){
		        	foreach($data['result_log'] as $key => $val){
		        	echo '<option value="'.$val->subcategory_id.'">'.stripslashes(trim($val->subcategory_name)).'</option>';
		        	}
		    	}
        echo '</select>';
	}

		public function addproducts(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');
			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];

			$result = $this->bm->fetch_product();
			$data['row_num'] = $result['row_num'];
			$data['row_log'] = $result['row_log'];

// echo "<pre>";
// print_r($data);
// die;
			
			$data['flag'] = "add";
			
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/product');
			$this->load->view('master_control/footer');
			
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	public function addproduct(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];

			$data['flag'] = "add";

//  echo "<pre>";
// print_r($data);
// die;
 			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/product');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function addproductsdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
			
			$dataspeak['category_id'] = $this->input->post('category_id');
			$dataspeak['subcategory_id'] = $this->input->post('subcategory');

			$dataspeak['product_name'] = $this->input->post('product_name');
			$file_name = $_FILES['product_image']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "product_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['product_image'] = '';
			}else{
				$data1['product_image'] = $this->upload->data();
				$dataspeak['product_image'] = 'uploads/'.$data1['product_image']['file_name'];
			}

			$file_name = $_FILES['product_pdf']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt|docx|pdf",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "product_pdf";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['product_pdf'] = '';
			}else{
				$data1['product_pdf'] = $this->upload->data();
				$dataspeak['product_pdf'] = 'uploads/'.$data1['product_pdf']['file_name'];
			}

			$dataspeak['status'] = $this->input->post('status');
	
			$this->bm->adddata($dataspeak,'product');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/product');
		}else{
			redirect('administrator/login');
		}
	}

	public function editproducts($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');


			$result_edit = $this->bm->fetch_editdata($id,'product','product_id');
			$data['result_edit'] = $result_edit['result_log'];


			$result = $this->bm->fetch_all("category",'category_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];

			$result_sub = $this->bm->fetch_all_subcategory($data['result_edit']->category_id);
			$data['subcat_num'] = $result_sub['result_num'];
			$data['subcat_log'] = $result_sub['result_log'];

// echo "<pre>";
// print_r($data);
//  die;
				$data['flag'] = "edit";

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/product');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	

	public function editproductsdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$dataspeak['category_id'] = $this->input->post('category_id');
			$dataspeak['subcategory_id'] = $this->input->post('subcategory');
			$dataspeak['product_name'] = $this->input->post('product_name');
			$file_name = $_FILES['product_image']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "product_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['product_image'] = '';
			}else{
				$data1['product_image'] = $this->upload->data();
				$dataspeak['product_image'] = 'uploads/'.$data1['product_image']['file_name'];
			}

			$file_name = $_FILES['product_pdf']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt|docx|pdf",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "product_pdf";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['product_pdf'] = '';
			}else{
				$data1['product_pdf'] = $this->upload->data();
				$dataspeak['product_pdf'] = 'uploads/'.$data1['product_pdf']['file_name'];
			}

			$id['product_id'] = $this->input->post('product_id');

			$this->bm->edit_data($dataspeak,'product',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
			redirect('administrator/product');
		}else{
		$this->session->set_flashdata('error','Unauthorized access! Please login first.');

			redirect('administrator/login');
		}
	}

	public function deleteproducts($id){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$this->db->query("delete from {PRE}product where `product_id` = '".$id."'");
			$this->session->set_flashdata('msg','Successfully Deleted');
			redirect('administrator/product');
		}else{
			redirect('administrator/login');
		}
	}
	//=======================Chakladher Creative================================



public function creative()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_creative = $this->bm->fetch_all('creative','creative_id','asc');
			$data['creative_num'] = $result_creative['result_num'];
			$data['creative_log'] = $result_creative['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/creative');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editcreative($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_creative = $this->bm->fetch_all('creative','creative_id','asc');
			$data['creative_num'] = $result_creative['result_num'];
			$data['creative_log'] = $result_creative['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'creative','creative_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/creative');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addcreative(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['creative_title'] = $this->input->post('creative_title',true);

			$databan['creative_content'] = $this->input->post('creative_content',true);

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'creative');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/creative');
		}else{

			redirect('administrator/login');
		}
	}

		public function updatecreative(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['creative_title'] = $this->input->post('creative_title',true);

			$databan['creative_content'] = $this->input->post('creative_content',true);

			$databan['status']=$this->input->post('status');
			$id['creative_id'] = $this->input->post('creative_id');
		
			$this->bm->edit_data($databan,'creative',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/creative');
		}else{

			redirect('administrator/login');
		}
	}

	public function deletecreative($id){
		$this->db->query("DELETE FROM {PRE}creative where `creative_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/creative');
	}

	
	//=======================team================================



public function team()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_team = $this->bm->fetch_all('team','team_id','asc');
			$data['team_num'] = $result_team['result_num'];
			$data['team_log'] = $result_team['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/team');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editteam($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_team = $this->bm->fetch_all('team','team_id','asc');
			$data['team_num'] = $result_team['result_num'];
			$data['team_log'] = $result_team['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'team','team_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/team');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addteam(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['post'] = $this->input->post('post',true);
			$databan['content'] = $this->input->post('content',true);



$file_name = $_FILES['pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['pic'] = 'uploads/'.$data1['pic']['file_name'];
			}
			$databan['fb']=$this->input->post('fb');
			$databan['twitter']=$this->input->post('twitter');
			$databan['youtube']=$this->input->post('youtube');
			$databan['linked']=$this->input->post('linked');
			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'team');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/team');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateteam(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['post'] = $this->input->post('post',true);
			$databan['content'] = $this->input->post('content',true);



$file_name = $_FILES['pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['pic'] = 'uploads/'.$data1['pic']['file_name'];
			}
			$databan['fb']=$this->input->post('fb');
			$databan['twitter']=$this->input->post('twitter');
			$databan['youtube']=$this->input->post('youtube');
			$databan['linked']=$this->input->post('linked');
			$databan['status']=$this->input->post('status');
			$id['team_id'] = $this->input->post('team_id');
		
			$this->bm->edit_data($databan,'team',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/team');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteteam($id){
		$this->db->query("DELETE FROM {PRE}team where `team_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/team');
	}
	//=======================solution================================

	public function deleteallsolution()
 {
 	$ids=$this->input->post("ids");
 	$this->bm->deleteallsolution($ids);
 	redirect(base_url().'administrator/solution');
 }

public function solution()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_solution = $this->bm->fetch_all('solution','solution_id','asc');
			$data['solution_num'] = $result_solution['result_num'];
			$data['solution_log'] = $result_solution['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/solution');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editsolution($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_solution = $this->bm->fetch_all('solution','solution_id','asc');
			$data['solution_num'] = $result_solution['result_num'];
			$data['solution_log'] = $result_solution['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'solution','solution_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/solution');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addsolution(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['solution_name'] = $this->input->post('solution_name',true);
			$databan['solution_content'] = $this->input->post('solution_content',true);
			$databan['solution_link'] = $this->input->post('solution_link',true);
			



$file_name = $_FILES['solution_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "solution_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['solution_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'solution');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/solution');
		}else{

			redirect('administrator/login');
		}
	}

		public function updatesolution(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['solution_name'] = $this->input->post('solution_name',true);
			$databan['solution_content'] = $this->input->post('solution_content',true);
			$databan['solution_link'] = $this->input->post('solution_link',true);
			



$file_name = $_FILES['solution_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "solution_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['solution_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$id['solution_id'] = $this->input->post('solution_id');
		
			$this->bm->edit_data($databan,'solution',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/solution');
		}else{

			redirect('administrator/login');
		}
	}

	public function deletesolution($id){
		$this->db->query("DELETE FROM {PRE}solution where `solution_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/solution');
	}

	//=======================leadership================================

public function leader()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_leader = $this->bm->fetch_all('leader','leader_id','asc');
			$data['leader_num'] = $result_leader['result_num'];
			$data['leader_log'] = $result_leader['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/leader');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editleader($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_leader = $this->bm->fetch_all('leader','leader_id','asc');
			$data['leader_num'] = $result_leader['result_num'];
			$data['leader_log'] = $result_leader['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'leader','leader_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/leader');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addleader(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['leader_name'] = $this->input->post('leader_name',true);
			$databan['leader_position'] = $this->input->post('leader_position',true);
			$databan['leader_content'] = $this->input->post('leader_content',true);
			



$file_name = $_FILES['leader_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "leader_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['leader_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'leader');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/leader');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateleader(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['leader_name'] = $this->input->post('leader_name',true);
			$databan['leader_position'] = $this->input->post('leader_position',true);
			$databan['leader_content'] = $this->input->post('leader_content',true);
			



$file_name = $_FILES['leader_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "leader_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['leader_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$id['leader_id'] = $this->input->post('leader_id');
		
			$this->bm->edit_data($databan,'leader',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/leader');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteleader($id){
		$this->db->query("DELETE FROM {PRE}leader where `leader_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/leader');
	}

	//=======================resources================================

public function resources()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_resources = $this->bm->fetch_all('resources','resources_id','asc');
			$data['resources_num'] = $result_resources['result_num'];
			$data['resources_log'] = $result_resources['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/resources');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editresources($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_resources = $this->bm->fetch_all('resources','resources_id','asc');
			$data['resources_num'] = $result_resources['result_num'];
			$data['resources_log'] = $result_resources['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'resources','resources_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/resources');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addresources(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['resources_name'] = $this->input->post('resources_name',true);
			$databan['resources_link'] = $this->input->post('resources_link',true);
			$databan['home']=$this->input->post('home');
			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'resources');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/resources');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateresources(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['resources_name'] = $this->input->post('resources_name',true);
			$databan['resources_link'] = $this->input->post('resources_link',true);
			$databan['home']=$this->input->post('home');
			$databan['status']=$this->input->post('status');
			$id['resources_id'] = $this->input->post('resources_id');
		
			$this->bm->edit_data($databan,'resources',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/resources');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteresources($id){
		$this->db->query("DELETE FROM {PRE}resources where `resources_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/resources');
	}
//====================================climate ==========================================

	public function climate()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			// $result = $this->bm->fetch_pages();
			$result = $this->bm->fetch_climate();
			$data['result'] = $result['result_log'];
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/climate');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function climateedit($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$result = $this->bm->fetch_editdata($id,'climate','climate_id');
			$data['result'] = $result['result_log'];
			$data['flag'] = "edit";
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/climate');
			$this->load->view('master_control/footer');
		}else{
			$this->load->view('master_control/login');
		}
	}

	public function editdataclimate(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg|pdf|doc|docx|xml",
						  'overwrite'       => TRUE
					   );
	
			$this->upload->initialize($config);
	
			$field_name = "climate_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$datapage['climate_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}
	
			$id['climate_id'] = $this->input->post('climate_id');
			$datapage['climate_title'] = $this->input->post('climate_title');
			$datapage['climate_name'] = $this->input->post('climate_name');
			$datapage['climate_desc'] = $this->input->post('climate_desc');
			$datapage['climate_link'] = $this->input->post('climate_link');
			$datapage['climate_date'] = time();
			//$datapage['status'] = $this->input->post('status');
	
			$result = $this->bm->edit_data($datapage,'climate',$id);
	
			if($result == $id['climate_id']){
				redirect('administrator/climate');
			}
		}else{
			$this->session->set_flashdata('error','Unauthorized access. Please login first');
			redirect('administrator/login');
		}
	}


	//=======================news================================

public function news()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_news = $this->bm->fetch_all('news','news_id','asc');
			$data['news_num'] = $result_news['result_num'];
			$data['news_log'] = $result_news['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/news');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editnews($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_news = $this->bm->fetch_all('news','news_id','asc');
			$data['news_num'] = $result_news['result_num'];
			$data['news_log'] = $result_news['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'news','news_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/news');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addnews(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['news_name'] = $this->input->post('news_name',true);
			$databan['news_short_desc'] = $this->input->post('news_short_desc',true);
			$databan['news_long_desc'] = $this->input->post('news_long_desc',true);

		$file_name = $_FILES['news_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "news_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['news_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['news_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "news_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['news_image'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['news_date'] = time();

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'news');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/news');
		}else{

			redirect('administrator/login');
		}
	}

		public function updatenews(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['news_name'] = $this->input->post('news_name',true);
			$databan['news_short_desc'] = $this->input->post('news_short_desc',true);
			$databan['news_long_desc'] = $this->input->post('news_long_desc',true);

		$file_name = $_FILES['news_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "news_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['news_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['news_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "news_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['news_image'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['news_date'] = time();

			$databan['status']=$this->input->post('status');
			$id['news_id'] = $this->input->post('news_id');
		
			$this->bm->edit_data($databan,'news',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/news');
		}else{

			redirect('administrator/login');
		}
	}

	public function deletenews($id){
		$this->db->query("DELETE FROM {PRE}news where `news_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/news');
	}

	//=======================blog================================

public function blog()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_blog = $this->bm->fetch_all('blog','blog_id','asc');
			$data['blog_num'] = $result_blog['result_num'];
			$data['blog_log'] = $result_blog['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/blog');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editblog($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_blog = $this->bm->fetch_all('blog','blog_id','asc');
			$data['blog_num'] = $result_blog['result_num'];
			$data['blog_log'] = $result_blog['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'blog','blog_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/blog');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addblog(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['blog_short_desc'] = $this->input->post('blog_short_desc',true);
			$databan['blog_long_desc'] = $this->input->post('blog_long_desc',true);

		$file_name = $_FILES['blog_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "blog_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['blog_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['blog_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "blog_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['blog_image'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['blog_date'] = time();
			$databan['popular']=$this->input->post('popular');
			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'blog');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/blog');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateblog(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['blog_short_desc'] = $this->input->post('blog_short_desc',true);
			$databan['blog_long_desc'] = $this->input->post('blog_long_desc',true);

		$file_name = $_FILES['blog_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "blog_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['blog_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['blog_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "blog_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['blog_image'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['blog_date'] = time();
			$databan['popular']=$this->input->post('popular');
			$databan['status']=$this->input->post('status');
			$id['blog_id'] = $this->input->post('blog_id');
		
			$this->bm->edit_data($databan,'blog',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/blog');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteblog($id){
		$this->db->query("DELETE FROM {PRE}blog where `blog_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/blog');
	}
	//=======================event================================

public function event()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_event = $this->bm->fetch_all('event','event_id','asc');
			$data['event_num'] = $result_event['result_num'];
			$data['event_log'] = $result_event['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/event');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editevent($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_event = $this->bm->fetch_all('event','event_id','asc');
			$data['event_num'] = $result_event['result_num'];
			$data['event_log'] = $result_event['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'event','event_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/event');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addevent(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['event_name'] = $this->input->post('event_name',true);
			$databan['event_date'] = $this->input->post('event_date',true);
			$databan['event_time'] = $this->input->post('event_time',true);
			$databan['event_host'] = $this->input->post('event_host',true);
			$databan['event_venue'] = $this->input->post('event_venue',true);
			$databan['event_content'] = $this->input->post('event_content',true);
			$databan['event_video_link'] = $this->input->post('event_video_link',true);
			$databan['event_information_link'] = $this->input->post('event_information_link',true);

		$file_name = $_FILES['event_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "event_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['event_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['event_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "event_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['event_image'] = 'uploads/'.$data1['pic']['file_name'];
			}
			
			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'event');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/event');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateevent(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['event_name'] = $this->input->post('event_name',true);
			$databan['event_date'] = $this->input->post('event_date',true);
			$databan['event_time'] = $this->input->post('event_time',true);
			$databan['event_host'] = $this->input->post('event_host',true);
			$databan['event_venue'] = $this->input->post('event_venue',true);
			$databan['event_content'] = $this->input->post('event_content',true);
			$databan['event_video_link'] = $this->input->post('event_video_link',true);
			$databan['event_information_link'] = $this->input->post('event_information_link',true);

		$file_name = $_FILES['event_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "event_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['event_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['event_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "event_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['event_image'] = 'uploads/'.$data1['pic']['file_name'];
			}
			
			$databan['status']=$this->input->post('status');
			$id['event_id'] = $this->input->post('event_id');
		
			$this->bm->edit_data($databan,'event',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/event');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteevent($id){
		$this->db->query("DELETE FROM {PRE}event where `event_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/event');
	}
//======================eventpic=============
	public function eventpic($id){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result = $this->bm->fetch_editdata($id,"event",'event_id');
			$data['result_log'] = $result['result_log'];
         	
			$result = $this->bm->fetch_all_clause("eventpic",'eventpic_id','desc','event_id',$id);
			$data['product_num'] = $result['result_num'];
			$data['product_log'] = $result['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/eventpic');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

		public function addeventpic(){
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 1;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');
			$result = $this->bm->fetch_all("event",'event_id','desc');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];
 			
 			$result = $this->bm->fetch_all_clause("event",'event_id','ASC','status','Y');
			$data['result_num'] = $result['result_num'];
			$data['result_log'] = $result['result_log'];
			
			$data['flag'] = "add";
			
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/eventpic');
			$this->load->view('master_control/footer');
			
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

public function addeventpicdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			
			$dataspeak['event_id'] = $this->input->post('event_id');


			$file_name = $_FILES['eventpic_image']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "eventpic_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['eventpic_image'] = '';
			}else{
				$data1['eventpic_image'] = $this->upload->data();
				$dataspeak['eventpic_image'] = 'uploads/'.$data1['eventpic_image']['file_name'];
			}

			$dataspeak['event_video'] = $this->input->post('event_video');

			$dataspeak['status'] = $this->input->post('status');
	
			$this->bm->adddata($dataspeak,'eventpic');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/eventpic/'.$dataspeak['event_id']);
		}else{
			redirect('administrator/login');
		}
	}
public function editeventpic($proid,$id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_edit = $this->bm->fetch_editdata($id,'eventpic','eventpic_id');
			$data['result_edit'] = $result_edit['result_log'];

			$result = $this->bm->fetch_editdata($proid,"event",'event_id');
			$data['result_log'] = $result['result_log'];
         	
			$result = $this->bm->fetch_all_clause("eventpic",'eventpic_id','desc','event_id',$proid);
			$data['product_num'] = $result['result_num'];
			$data['product_log'] = $result['result_log'];

			$data['flag'] = "edit";

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/eventpic');
			$this->load->view('master_control/footer');
		}else{
			$this->session->set_flashdata('error','Unauthorized access! Please login first.');
			redirect('administrator/login');
		}
	}

	

	public function editeventpicdata(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$dataspeak['event_id'] = $this->input->post('event_id');


			$file_name = $_FILES['eventpic_image']['name'];
			$new_file_name = time().$file_name;
			$config =  array(
				'upload_path'     => './uploads/',
				'allowed_types'   => "gif|jpg|png|jpeg|xls|xlsx|csv|txt",
				'overwrite'       => TRUE,
				'file_name'		=> $new_file_name
			);
			$this->upload->initialize($config);
			$field_name = "eventpic_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['eventpic_image'] = '';
			}else{
				$data1['eventpic_image'] = $this->upload->data();
				$dataspeak['eventpic_image'] = 'uploads/'.$data1['eventpic_image']['file_name'];
			}

			$dataspeak['event_video'] = $this->input->post('event_video');
			$dataspeak['status'] = $this->input->post('status');

			$id['eventpic_id'] = $this->input->post('eventpic_id');
			$this->bm->edit_data($dataspeak,'eventpic',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
			redirect('administrator/eventpic/'.$dataspeak['event_id']);
		}else{
		$this->session->set_flashdata('error','Unauthorized access! Please login first.');

			redirect('administrator/login');
		}
	}


	public function deleteeventpic($id,$ser_id){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$this->db->query("delete from {PRE}eventpic where `eventpic_id` = '".$id."'");
			$this->session->set_flashdata('msg','Successfully Deleted');
			redirect('administrator/eventpic/'.$ser_id);
		}else{
			redirect('administrator/login');
		}
	}

	//=======================up-event================================

public function upevent()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_upevent = $this->bm->fetch_all('upevent','upevent_id','asc');
			$data['upevent_num'] = $result_upevent['result_num'];
			$data['upevent_log'] = $result_upevent['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/upevent');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editupevent($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_upevent = $this->bm->fetch_all('upevent','upevent_id','asc');
			$data['upevent_num'] = $result_upevent['result_num'];
			$data['upevent_log'] = $result_upevent['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'upevent','upevent_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/upevent');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addupevent(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['upevent_name'] = $this->input->post('upevent_name',true);
			$databan['upevent_date'] = $this->input->post('upevent_date',true);
			$databan['upevent_time'] = $this->input->post('upevent_time',true);
			$databan['upevent_venue'] = $this->input->post('upevent_venue',true);
		    $databan['upevent_content'] = $this->input->post('upevent_content',true);

		$file_name = $_FILES['upevent_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "upevent_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['upevent_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['upevent_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "upevent_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['upevent_image'] = 'uploads/'.$data1['pic']['file_name'];
			}
			
			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'upevent');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/upevent');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateupevent(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['upevent_name'] = $this->input->post('upevent_name',true);
			$databan['upevent_date'] = $this->input->post('upevent_date',true);
			$databan['upevent_time'] = $this->input->post('upevent_time',true);
			$databan['upevent_venue'] = $this->input->post('upevent_venue',true);
		    $databan['upevent_content'] = $this->input->post('upevent_content',true);

		$file_name = $_FILES['upevent_pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "upevent_pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['upevent_pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$file_name = $_FILES['upevent_image']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "upevent_image";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['upevent_image'] = 'uploads/'.$data1['pic']['file_name'];
			}
			
			$databan['status']=$this->input->post('status');
			$id['upevent_id'] = $this->input->post('upevent_id');
		
			$this->bm->edit_data($databan,'upevent',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/upevent');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteupevent($id){
		$this->db->query("DELETE FROM {PRE}upevent where `upevent_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/upevent');
	}
	//==========================Client Feedback===============================

public function client_feedback()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_client_feedback = $this->bm->fetch_all('client_feedback','client_feedback_id','asc');
			$data['client_feedback_num'] = $result_client_feedback['result_num'];
			$data['client_feedback_log'] = $result_client_feedback['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/client-feedback');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editclient_feedback($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_client_feedback = $this->bm->fetch_all('client_feedback','client_feedback_id','asc');
			$data['client_feedback_num'] = $result_client_feedback['result_num'];
			$data['client_feedback_log'] = $result_client_feedback['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'client_feedback','client_feedback_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/client-feedback');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addclient_feedback(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['location'] = $this->input->post('location',true);
			$databan['content'] = $this->input->post('content',true);



$file_name = $_FILES['pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'client_feedback');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/client_feedback');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateclient_feedback(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['location'] = $this->input->post('location',true);
			$databan['content'] = $this->input->post('content',true);



$file_name = $_FILES['pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$id['client_feedback_id'] = $this->input->post('client_feedback_id');
		
			$this->bm->edit_data($databan,'client_feedback',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/client_feedback');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteclient_feedback($id){
		$this->db->query("DELETE FROM {PRE}client_feedback where `client_feedback_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/client_feedback');
	}

	//==========================Employee Feedback===============================

public function employee_feedback()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_employee_feedback = $this->bm->fetch_all('employee_feedback','employee_feedback_id','asc');
			$data['employee_feedback_num'] = $result_employee_feedback['result_num'];
			$data['employee_feedback_log'] = $result_employee_feedback['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/employee-feedback');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editemployee_feedback($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_employee_feedback = $this->bm->fetch_all('employee_feedback','employee_feedback_id','asc');
			$data['employee_feedback_num'] = $result_employee_feedback['result_num'];
			$data['employee_feedback_log'] = $result_employee_feedback['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'employee_feedback','employee_feedback_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/employee-feedback');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addemployee_feedback(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['location'] = $this->input->post('location',true);
			$databan['content'] = $this->input->post('content',true);



$file_name = $_FILES['pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'employee_feedback');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/employee_feedback');
		}else{

			redirect('administrator/login');
		}
	}

		public function updateemployee_feedback(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['location'] = $this->input->post('location',true);
			$databan['content'] = $this->input->post('content',true);



$file_name = $_FILES['pic']['name'];
			$new_file_name = time().$file_name;
	
			$config =  array(
						  'upload_path'     => './uploads/',
						  'allowed_types'   => "gif|jpg|png|jpeg",
						  'overwrite'       => TRUE ,
						  'file_name'		=> $new_file_name
					   );
	

			$this->upload->initialize($config);
			$field_name = "pic";
			if ( ! $this->upload->do_upload($field_name)){
				$data1['pic'] = '';
			}else{
				$data1['pic'] = $this->upload->data();
				$databan['pic'] = 'uploads/'.$data1['pic']['file_name'];
			}

			$databan['status']=$this->input->post('status');
			$id['employee_feedback_id'] = $this->input->post('employee_feedback_id');
		
			$this->bm->edit_data($databan,'employee_feedback',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/employee_feedback');
		}else{

			redirect('administrator/login');
		}
	}

	public function deleteemployee_feedback($id){
		$this->db->query("DELETE FROM {PRE}employee_feedback where `employee_feedback_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/employee_feedback');
	}
	//==========================Employee Feedback===============================

public function current_opening()
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');

			$result_current_openning = $this->bm->fetch_all('current_openning','current_openning_id','asc');
			$data['current_openning_num'] = $result_current_openning['result_num'];
			$data['current_openning_log'] = $result_current_openning['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/current-openning');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}

	public function editcurrent_opening($id)
	{
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$result_current_openning = $this->bm->fetch_all('current_openning','current_openning_id','asc');
			$data['current_openning_num'] = $result_current_openning['result_num'];
			$data['current_openning_log'] = $result_current_openning['result_log'];

			$result_edit = $this->bm->fetch_editdata($id,'current_openning','current_openning_id');
			$data['result_edit'] = $result_edit['result_log'];

			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/current-openning');
			$this->load->view('master_control/footer');
		}else{

			redirect('administrator/login');
		}
	}

	public function addcurrent_opening(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['content'] = $this->input->post('content',true);
			$databan['status']=$this->input->post('status');
			$this->bm->adddata($databan,'current_openning');
			$this->session->set_flashdata('msg','Successfully Added');
			redirect('administrator/current_opening');
		}else{

			redirect('administrator/login');
		}
	}

		public function updatecurrent_opening(){
		$data = $this->session->userdata("loged_user");
		if(isset($data['login_status']) && $data['login_status'] == TRUE){

			$databan['name'] = $this->input->post('name',true);
			$databan['content'] = $this->input->post('content',true);
			$databan['status']=$this->input->post('status');
			$id['current_openning_id'] = $this->input->post('current_openning_id');
		
			$this->bm->edit_data($databan,'current_openning',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
	
			redirect('administrator/current_opening');
		}else{

			redirect('administrator/login');
		}
	}

	public function deletecurrent_opening($id){
		$this->db->query("DELETE FROM {PRE}current_openning where `current_openning_id` = '".$id."'");
		$this->session->set_flashdata('msg','Successfully Deleted');
		redirect('administrator/current_opening');
	}

	public function admin()
	{	
		$data = $this->session->userdata("loged_user");
		$data['menu_id'] = 2;
		if(isset($data['login_status']) && $data['login_status'] == TRUE){
			$data['msg'] = $this->session->flashdata('msg');
			$data['error'] = $this->session->flashdata('error');
			
			$this->load->view('master_control/header',$data);
			$this->load->view('master_control/change_password');
			$this->load->view('master_control/footer');
		}else{
			redirect('administrator/login');
		}
	}
		
	public function updateadmin(){
		$old_pass = $this->input->post('old_pass');
		
		$result_edit = $this->bm->fetch_editdata(1,'mm_login','login_id');
		$data1['result_edit'] = $result_edit['result_log'];
		
		if($old_pass===$data1['result_edit']->original_password){
			$data['username'] = "superadmin";
			$data['password'] = md5($this->input->post('new_pass'));
			$data['original_password'] = $this->input->post('new_pass');
			$data['admin_type'] = "admin";
			$data['status'] = "Y";
			$data['type_id'] = "1";
			$data['chng_pass'] = "Y";
			
			//$id['login_id'] = $this->input->post('login_id');
			$id['login_id'] = 1;
			
			$this->bm->edit_data($data,'mm_login',$id);
			$this->session->set_flashdata('msg','Successfully Updated');
		}else{
			$this->session->set_flashdata('error','Old Password Does not Match');	
		}
		
		redirect('administrator/admin');
	}
//======================================================= login =======================================================

	public function login()
	{
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('master_control/login',$data);
	}

	public function validatelogin(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{	
			$this->load->view('master_control/login');
		}
		else
		{
			$data['username'] = $this->input->post('username',true);
			$data['password'] = $this->input->post('password',true);
			

			$result = $this->bm->chk_login($data);
			
			if($result['num_query'] > 0)
			{
				$session_id = $this->session->userdata('session_id');

				$data['login_id'] = $result['result_log']->login_id;
				$result_log = $this->bm->chk_last_log($data);
				$newdata['loged_user'] = array(
					'login_id'  => $result['result_log']->login_id,
					'login_type'  => $result['result_log']->admin_type,
					'username'  => $result['result_log']->username,
					'log_date' => $result_log['result_log']->log_date,
					'log_ip' => $result_log['result_log']->log_ip,
					'login_status' => TRUE,
					'menu_id' => 1
				);

				$this->session->set_userdata($newdata);
				redirect('administrator/index');
			}
			else
			{
				/*$data['login_id'] = $result['num_query'];
				$data['error'] = "Invalid username or password";*/
				$this->session->set_flashdata('error','Invalid username or password');
				redirect('administrator/login');
			}

		}
	}

	function logout()
	{
		$data = $this->session->userdata("loged_user");
		$log_type = $data['login_type'];
		$this->session->unset_userdata('loged_user');
		redirect('administrator/index');
	}
}
?>