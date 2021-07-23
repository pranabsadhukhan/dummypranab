<?php
class Model_main extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->db->query("SET SQL_BIG_SELECTS=1");
		$this->db->query("SET @MAX_QUESTIONS=0");
		$this->db->query("SET SQL_MODE=''");
	}
	
//============================= Fetch SETTINGS ============================================================
	
	function fetch_settings(){
		$query = $this->db->query("SELECT * FROM {PRE}sale_settings WHERE `setting_id` = '1'");
		$result['result_setting'] = $query->row();
		return $result;
	}

	function fetchcmsdata($id){
		$query = $this->db->query("SELECT 
			`cms_title` as title,
			`cms_pic` as pic,
			`cms_desc` as description,
			`meta_title` as mtitle,
			`meta_keyword` as mkeyword,
			`meta_description` as mdesc
			FROM {PRE}cms
			WHERE `cms_id` = '".$id."'");

		$result['result_log'] = $query->row();

		return $result;
	}

	function fetchclimatedata($id){
		$query = $this->db->query("SELECT 
			`climate_title` as title,
			`climate_name` as name,
			`climate_desc` as description,
			`climate_link` as link,
			`climate_pic` as pic
			FROM {PRE}climate
			WHERE `climate_id` = '".$id."'");

		$result['result_log'] = $query->row();

		return $result;
	}
	//======================== Banner All =============================

	function fetch_cms_banner($id){
		$query = $this->db->query("SELECT 
			`banner_id` as id,
			`banner_title` as title,
			`banner_pic` as pic,
			`banner_link` as blink,
			`page_id` as pageid
			FROM {PRE}banner
			WHERE `page_id` = '".$id."'
			ORDER BY `sort_order` asc");
		
		$result['result_log'] = $query->row();

		return $result;
	}
//======================== Banner Home =============================

	function fetch_home_banner(){
		$query = $this->db->query("SELECT 
			`banner_id` as id,
			`banner_title` as title,
			`banner_desc` as bandesc,
			`banner_pic` as pic,
			`banner_link` as blink,
			`page_id` as pageid
			FROM {PRE}banner
			WHERE `page_id` = '1'
			ORDER BY `sort_order` asc");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();

		return $result;
	}
	
//======================== Course Home =============================
	
	function fetch_home_course(){
		$query = $this->db->query("SELECT * FROM {PRE}course WHERE `status` = 'Y' AND `show_in_home` = 'Y' ORDER BY `course_id` asc");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}

	
   function upevent()
	{
		$query = $this->db->query("SELECT * FROM {PRE}upevent WHERE `status` = 'Y' ORDER BY `upevent_id` asc limit 1");
		return $query->row();
	}
//================================= FETCH COURSE BY CAT ID ===========================
	
	function fetch_courses($id){
		$query = $this->db->query("SELECT * FROM {PRE}course WHERE `category_id` = '".$id."' AND `status` = 'Y'");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();

		return $result;
	}
	function fetch_video()
	{
		$query = $this->db->query("SELECT * FROM {PRE}video WHERE `latest_video` = 'Y'");
		return $query->row();
	}

	function fetch_gallery()
	{
		$query = $this->db->query("SELECT * FROM {PRE}gallery WHERE `latest_gallery` = 'Y'");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();

		return $result;
	}
// function fetch_brand()
// {
// 			$query = $this->db->query("SELECT {PRE}brands.brands_name, {PRE}produts.products_id
// 			FROM {PRE}brands
// 			LEFT JOIN {PRE}products
// 			ON {PRE}brands.brands_id={PRE}products.brands_id
// 			ORDER BY {PRE}brands.brands_name");

// 	       return $query->col();
// }
// 	function fetch_products($id)
// {
// 			$query = $this->db->query("SELECT p.*, 
// 				   						b.brands_name 
// 				   						FROM {PRE}products p 
// 				   						LEFT JOIN {PRE}brands b on p.brands_id=b.brands_id 
// 				   						WHERE p.products_id = '".$id."'");

// 	       return $query->row();
// }
	function fetch_data($field,$id,$table)
	{
		$query  = $this->db->query("select * from {PRE}".$table."  where ".$field." ='".$id."'");
		return $query->row();
	}

	function fetch_all_data($field,$id,$table)
	{
		$query  = $this->db->query("select * from {PRE}".$table."  where ".$field." ='".$id."'");
		return $query->result();
	}

 //   function service()
	// {
	// 	$query = $this->db->query("SELECT * FROM {PRE}servicedetails WHERE `service_id` = 'service_id' AND 'status' = 'Y' ORDER BY `servicedetails_id` asc");
	// 	return $query->result();
	// }

	function office()
	{
		$query = $this->db->query("SELECT * FROM {PRE}office WHERE `status` = 'Y' ORDER BY `office_id` asc limit 1");
		return $query->row();
	}
	function school()
	{
		$query = $this->db->query("SELECT * FROM {PRE}school WHERE `status` = 'Y' ORDER BY `school_id` asc limit 1");
		return $query->row();
	}
	function domestic()
	{
		$query = $this->db->query("SELECT * FROM {PRE}domestic WHERE `status` = 'Y' ORDER BY `domestic_id` asc limit 1");
		return $query->row();
	}

	function fetch_all_data1($field,$id,$table)
	{
		$query  = $this->db->query("select * from {PRE}".$table."  where ".$field." ='".$id."'");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();

		return $result;
	}

	function home()
	{
		$query = $this->db->query("SELECT * FROM {PRE}industrialpic,officepic,schoolpic,domesticpic WHERE `home` = 'Y'");
		return $query->row();
	}

// 	function fetch_products($id)
// {
// 			$query = $this->db->query("SELECT p.*, 
// 				   						b.category_name 
// 				   						FROM {PRE}subcategory p 
// 				   						LEFT JOIN {PRE}category b on p.category_id=b.category_id 
// 				   						WHERE p.subcategory_id = '".$id."'");

// 	       return $query->row();
// }

function fetch_product($id,$subcat_id)
	{
		if(isset($id) && $id > 0){
			$catclause = " AND `category_id` = '".$id."'";
		}else{
			$catclause = "";
		}

		if(isset($subcat_id) && $subcat_id > 0){
			$subcatclause = " AND `subcategory_id` = '".$subcat_id."'";
		}else{
			$subcatclause = "";
		}	

		$query_product = $this->db->query("SELECT * FROM {PRE}product WHERE 1 ".$catclause.$subcatclause);
		$result['result_num']= $query_product->num_rows();
		$result['result_log']= $query_product->result();
		
		return $result;
	}

	function fetch_more_blog($id){
		$query = $this->db->query("SELECT * FROM {PRE}blog WHERE 1 AND status = 'Y' AND `blog_id` != '".$id."' order by rand()");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}

	function fetch_more_news($id){
		$query = $this->db->query("SELECT * FROM {PRE}news WHERE 1 AND status = 'Y' AND `news_id` != '".$id."' order by rand()");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}

	function fetch_more_event($id){
		$query = $this->db->query("SELECT * FROM {PRE}event WHERE 1 AND status = 'Y' AND `event_id` != '".$id."' order by rand()");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}

	function fetch_more_upevent($id){
		$query = $this->db->query("SELECT * FROM {PRE}upevent WHERE 1 AND status = 'Y' AND `upevent_id` != '".$id."' order by rand()");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}

	function fetch_category_subcategory()
	{
		$query =$this->db->query("SELECT * FROM {PRE}category");
		$result['result_num']=$query->num_rows();
		$result['result_log']=$query->result();
		if($result['result_num'] > 0)
		{
			foreach ($result['result_log'] as $key => $value) {
				$query_subcategory = $this->db->query("SELECT * FROM {PRE}subcategory WHERE `category_id` = '".$value->category_id."'");
				$result['result_subcategory_num'][$value->category_id] = $query_subcategory->num_rows();
				$result['result_subcategory'][$value->category_id] = $query_subcategory->result();
			}
		}
		else
		{
			$result['result_subcategory_num'] = 0;
			$result['result_subcategory']="";
		}
		return $result;
	}


}
?>