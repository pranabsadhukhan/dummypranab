<?php
class Model_admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->db->query("SET SQL_BIG_SELECTS=1");
		$this->db->query("SET @MAX_QUESTIONS=0");
		$this->db->query("SET SQL_MODE=''");
	}

//======================================= Page Management ==========================================
	
	function roundUpToAny($n) {
		$x = round($n/5) * 5;
		return $x;
	}
	
	function fetch_pages(){
		$query = $this->db->query("select * from {PRE}cms where 1");
		$result['result_log'] = $query->result();
		return $result;
	}

	public function deleteallsolution($ids)
	{
		foreach($ids as $singleid)
		{
			$this->db->where("solution_id",$singleid);
			$this->db->delete("{PRE}solution");
		}
	}

	function fetch_comment(){
		$query = $this->db->query("select * from {PRE}comment where 1");
		$result['result_log'] = $query->result();
		return $result;
	}

	function comment()
	{
		$query = $this->db->select("{PRE}comment.*,{PRE}blog.blog_short_desc")->from("{PRE}comment")->join("{PRE}blog","{PRE}comment.blog_id={PRE}blog.blog_id")->get();
		$result['result_log'] = $query->result();
		return $result;
	}

	function fetch_faq_heading(){
		$query = $this->db->query("select * from {PRE}faq_heading where 1");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}

	function fetch_faq(){
		$query = $this->db->query("select * from {PRE}faq where 1");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		if($result['result_num'] > 0){
			foreach($result['result_log'] as $key => $val){
				$query_heading = $this->db->query("SELECT * FROM {PRE}faq_heading WHERE `faq_heading_id` = '".$val->faq_heading_id."'");
				$result['result_faq_heading'][$val->faq_id] = $query_heading->row();
			}
		}else{
			$result['result_faq_heading'] = "";
		}
		return $result;
	}
	
	
	function fetch_climate(){
		$query = $this->db->query("select * from {PRE}climate where 1");
		$result['result_log'] = $query->result();
		return $result;
	}

//=========================================== Login Section =======================================================

	function chk_login($data){
		$query = $this->db->query("select * from {PRE}mm_login where `username` = '$data[username]' AND `password` = '".md5($data['password'])."' AND `status` = 'Y' AND `admin_type` = 'admin'");
		$result['num_query'] = $query->num_rows();
		$result['result_log'] = $query->row();

		return $result;
	}

	function chk_last_log($data){
		$query = $this->db->query("select * from {PRE}last_login where `admin_id` = '".$data['login_id']."' order by `log_id` desc limit 1");
		$result['num_query'] = $query->num_rows();
		$result['result_log'] = $query->row();

		$sql = "INSERT INTO {PRE}last_login SET `admin_id` = '".$data['login_id']."', `log_date` = '".strtotime(date('d-m-Y'))."', `log_ip` = '".$_SERVER['REMOTE_ADDR']."'";
		$this->db->query($sql);

		return $result;
	}
//================================= Fetch Filter Head By Sub =======================================
	
	function fetch_id_comment($blog_id){
		$query = $this->db->query("SELECT * 
								  FROM {PRE}comment
								  WHERE `home` = 'N'
								  AND `blog_id` = '".$blog_id."'");
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}
//================================= Fetch Filter Lists =======================================
	
	function fetch_filterlist(){
		$query = $this->db->query("SELECT l.*,
								  h.filterheads
								  FROM {PRE}filterheadlist l
								  LEFT JOIN {PRE}filterhead h on h.filterhead_id = l.filterhead_id
								  WHERE l.status = 'Y'");
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}

//====================================== Subcategory Management =================================================
	
	function fetch_subcategory(){
		$query = $this->db->query("SELECT s.*, 
			c.category_name, 
			c.category_id FROM 
			{PRE}subcategory s
			LEFT JOIN {PRE}category c ON s.category_id = c.category_id
			WHERE 1 order by `subcategory_id` desc");
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}

//============================== FETCH PRODUCT ====================================
	
	// function fetch_product(){
	// 	$query = $this->db->query("SELECT p.*,
	// 							  (SELECT c.category_name FROM {PRE}category c WHERE c.category_id = p.category_id) as category_name,
	// 							  (SELECT sc.subcategory_name FROM {PRE}subcategory sc WHERE sc.subcategory_id = p.subcategory_id) as subcategory_name,
	// 							  (SELECT ssc.subhead_name FROM {PRE}sub_subcategory ssc WHERE ssc.subhead_id = p.subhead_id) as subhead_name
	// 							  FROM {PRE}product p
	// 							  WHERE 1 ORDER BY p.product_id desc");
	// 	$result['result_num'] = $query->num_rows();
	// 	$result['result_log'] = $query->result();
		
	// 	return $result;
	// }


	function fetch_product(){
		$query = $this->db->query("SELECT p.*,
								  (SELECT c.category_name FROM {PRE}category c WHERE c.category_id = p.category_id) as category_name,
								  (SELECT sc.subcategory_name FROM {PRE}subcategory sc WHERE sc.subcategory_id = p.subcategory_id) as subcategory_name
								  FROM {PRE}product p
								  WHERE 1 ORDER BY p.product_id desc");
		$result['row_num'] = $query->num_rows();
		$result['row_log'] = $query->result();
		
		return $result;
	}

	function fetch_subcategory_id($id,$table){
		$sql = "SELECT * FROM {PRE}".$table." where category_id=? ";
		$query = $this->db->query($sql,[$id]);
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] =  $query->result();
		return $result;
	}

	function fetch_all_sub($id,$table){
		$sql = "SELECT * FROM {PRE}".$table." where subcategory_id=? ";
		$query = $this->db->query($sql,[$id]);
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] =  $query->result();
		return $result;
	}

	function fetch_all_subcategory($id)
	{
		$sql = "SELECT * FROM {PRE}subcategory where `category_id` = '".$id."'";
		$query = $this->db->query($sql);
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] =  $query->result();
		return $result;
	}

//====================================== Subcategory List Management =================================================
	
	function fetch_subcategorylist(){
		$query = $this->db->query("SELECT sh.*, 
			c.category_name, 
			c.category_id,
			s.subcategory_id,
			s.subcategory_name
			 FROM 
			{PRE}sub_subcategory sh
			LEFT JOIN {PRE}category c ON sh.category_id = c.category_id
			LEFT JOIN {PRE}subcategory s ON sh.subcategory_id = s.subcategory_id
			WHERE 1 order by `subhead_id` desc");
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		return $result;
	}
	
	
//=========================================== Global Function =======================================================	
	
	function record_count_custtomer_search($table_name,$field_name,$order,$search) {
		if(isset($search['searchby']) && $search['searchby'] != ""){
			$searchby = " AND (c.cust_name like '".$search['searchby']."%' OR c.email = '".$search['searchby']."' OR c.mobile_no = '".$search['searchby']."' OR b.pincode = '".$search['searchby']."' OR b.area like '".$search['searchby']."%')";
		}else{
			$searchby = "";
		}
		if(isset($search['searchstatus']) && $search['searchstatus'] != ""){
			$status = " AND c.status = '".$search['searchstatus']."'";
		}else{
			$status = "";
		}
		
		$query = $this->db->query("select c.* from {PRE}customer c, {PRE}customer_billing b where c.cust_id = b.cust_id ".$searchby.$status." order by `".$field_name."` ".$order);
		return $num_row = $query->num_rows();
	}

	function fetch_all_pagination_custtomer_search($limit, $start,$table_name,$field_name,$order,$search) {

		if(isset($search['searchby']) && $search['searchby'] != ""){
			$searchby = " AND (c.cust_name like '".$search['searchby']."%' OR c.email = '".$search['searchby']."' OR c.mobile_no = '".$search['searchby']."')";
		}else{
			$searchby = "";
		}
		if(isset($search['searchstatus']) && $search['searchstatus'] != ""){
			$status = " AND c.status = '".$search['searchstatus']."'";
		}else{
			$status = "";
		}
		
		$query = $this->db->query("select c.* from {PRE}customer c where 1 ".$searchby.$status." order by `".$field_name."` ".$order." limit ".$start.",".$limit);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();

		if(isset($result['result_num']) && $result['result_num'] > 0){
			foreach($result['result_log'] as $key => $val){
				$query1 = $this->db->query("select * from {PRE}sale_order where `cust_id` = '".$val->cust_id."'");
				$result['result_order_num'][$val->cust_id] = $query1->num_rows();
				$result['result_order'][$val->cust_id] = $query1->result();
				
				$query_shipping = $this->db->query("select * from {PRE}customer_shipping where `cust_id` = '".$val->cust_id."'");
				$result['shipping_log'][$val->cust_id] = $query_shipping->row();
				
				if($val->edited_by > 0){
					$query_edit = $this->db->query("select * from {PRE}mm_login where `login_id` = '".$val->edited_by."'");
					$result['editadmin_log'][$val->cust_id] = $query_edit->row();
				}else{
					$result['editadmin_log'][$val->cust_id] = "";
				}
				
				$query_tot_order = $this->db->query("SELECT count(*) as num, sum(net_payable) as net_payable FROM {PRE}sale_order WHERE `cust_id` = '".$val->cust_id."'");
				$result['total_order'][$val->cust_id] = $query_tot_order->row();
				
			}
		}else{
			$result['result_order_num'] = 0;
			$result['result_order'] = "";
			$result['shipping_log'] = "";
			$result['editadmin_log'] = "";
			$result['total_order'] = "";
		}
		
		return $result;
	}
	
//================================== Category Pagination ==============================	

	function select_parent($cat_id){
		$query = $this->db->query("select * from {PRE}category where `category_id` = '".$cat_id."'");
		$row = $query->row();
		$result = $row->category_name;
		if($row->parent_id > 0){
			$result = $this->select_parent($row->parent_id)."&nbsp;>&nbsp;".$result;
		}
		return $result;
	}

	function record_count_category($table_name,$field_name,$order) {
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND `status` = 'Y' order by `".$field_name."` ".$order);
		return $num_row = $query->num_rows();
	}
	
	function fetch_all_pagination_category($limit, $start,$table_name,$field_name,$order) {
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 order by `".$field_name."` ".$order." limit ".$start.",".$limit);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		if($result['result_num'] > 0){
			foreach($result['result_log'] as $key => $val){
				if($val->parent_id > 0){
					$result['result_log_parent'][$val->category_id] = $this->select_parent($val->parent_id);
				}else{
					$result['result_log_parent'][$val->category_id] = "";
				}
			}
		}else{
			$result['result_log_parent'] = "";
		}
		return $result;
	}
	
	function record_count_search_category($table_name,$field_name,$order,$search) {
		if($search['status'] != ""){
			$status = " AND `status` = '".$search['status']."'";
		}else{
			$status = "";
		}
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 ".$status." order by `".$field_name."` ".$order);
		return $num_row = $query->num_rows();
	}
	
	function fetch_all_pagination_search_category($limit, $start,$table_name,$field_name,$order,$search) {
		if($search['status'] != ""){
			$status = " AND `status` = '".$search['status']."'";
		}else{
			$status = "";
		}
		
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 ".$status." order by `".$field_name."` ".$order." limit ".$start.",".$limit);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		if($result['result_num'] > 0){
			foreach($result['result_log'] as $key => $val){
				if($val->parent_id > 0){
					$result['result_log_parent'][$val->category_id] = $this->select_parent($val->parent_id);
				}else{
					$result['result_log_parent'][$val->category_id] = "";
				}
			}
		}else{
			$result['result_log_parent'] = "";
		}
		return $result;
	}


// ========================= 

	function record_count($table_name,$field_name,$order) {
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 order by `".$field_name."` ".$order);
		return $num_row = $query->num_rows();
	}

	function fetch_all_pagination($limit, $start,$table_name,$field_name,$order) {
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 order by `".$field_name."` ".$order." limit ".$start.",".$limit);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}
	
	function fetch_all_pagination_permission($limit, $start,$table_name,$field_name,$order) {
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 order by `".$field_name."` ".$order." limit ".$start.",".$limit);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		if($result['result_num'] > 0){
			foreach($result['result_log'] as $key => $val){
				$query1 = $this->db->query("select * from {PRE}user_permission WHERE `user_id` = '".$val->user_id."'");
				$result['per_num'][$val->user_id] = $query1->num_rows();
				$result['per_log'][$val->user_id] = $query1->result();
			}
		}else{
			$result['per_num'] = 0;
			$result['per_log'] = "";
		}
		return $result;
	}
	
	function fetch_stock() {
		$query = $this->db->query("SELECT p.product_id,
			p.product_name,
			p.product_brand_name,
			c.product_color_id,
			c.sort_name,
			c.product_code,
			ps.product_stock_id,
			ps.product_in,
			ps.product_out,
			ps.in_stock,
			ps.mrp,
			ps.disc_amt,
			ps.sale_price,
			ps.shoratge_qty,
			ps.in_hold,
			(select pc.pic_sm from {PRE}product_pic pc where pc.product_color_id = c.product_color_id AND pc.pic_for = 'list' order by pc.product_pic_id asc limit 1) as image
			FROM {PRE}product p
			LEFT JOIN {PRE}product_color c ON p.product_id = c.product_id
			LEFT JOIN {PRE}product_stock ps ON c.product_color_id = ps.product_color_id
			WHERE 1");
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		
		
		if(isset($result['result_num']) && $result['result_num'] > 0){
			foreach($result['result_log'] as $key => $val){		
				$query_cat = $this->db->query("SELECT c.category_name,
					s.subcategory_name
					FROM {PRE}product_category pc
					LEFT JOIN {PRE}category c ON pc.category_id = c.category_id
					LEFT Join {PRE}subcategory s ON c.category_id = s.category_id
					WHERE pc.product_id = '".$val->product_id."'
					AND if(pc.subcategory_id > 0, s.subcategory_id = pc.subcategory_id, pc.subcategory_id = 0)");
				$result['cat_num'][$val->product_id] = $query_cat->num_rows();
				$result['cat_log'][$val->product_id] = $query_cat->result();
			}
		}
		
		return $result;
	}
	
//============================== Stock Change Price ==============================
	
	function record_count_search_stock_price($data) {
		if(isset($data['department_id']) && $data['department_id'] > 0){
			$dep = " AND pc.department_id = '".$data['department_id']."'";
		}else{
			$dep = "";
		}
		
		if(isset($data['category_id']) && $data['category_id'] > 0){
			$cat = " AND pc.category_id = '".$data['category_id']."'";
		}else{
			$cat = "";
		}

		if(isset($data['subcategory_id']) && $data['subcategory_id'] > 0){
			$subcat = " AND pc.subcategory_id = '".$data['subcategory_id']."'";
		}else{
			$subcat = "";
		}

		if(isset($data['brand_id']) && $data['brand_id'] > 0){
			$brand = " AND p.brand_id = '".$data['brand_id']."'";
		}else{
			$brand = "";
		}

		if(isset($data['search_by']) && $data['search_by'] != ""){
			$search = " AND (p.product_name like '".$data['search_by']."%' OR s.product_code like '".$data['search_by']."%')";
		}else{
			$search = "";
		}

		$query = $this->db->query("select distinct(ps.product_stock_id) from {PRE}product p, {PRE}product_size s, {PRE}product_category pc, {PRE}product_stock ps where p.product_id = s.product_id AND p.product_id = pc.product_id AND s.product_size_id = ps.product_size_id AND ps.in_stock > 0".$dep.$cat.$subcat.$brand.$search);
		return $num_row = $query->num_rows();
	}

	function fetch_search_pagination_stock_price($limit,$start,$data) {
		if(isset($data['department_id']) && $data['department_id'] > 0){
			$dep = " AND pc.department_id = '".$data['department_id']."'";
		}else{
			$dep = "";
		}
		
		if(isset($data['category_id']) && $data['category_id'] > 0){
			$cat = " AND pc.category_id = '".$data['category_id']."'";
		}else{
			$cat = "";
		}

		if(isset($data['subcategory_id']) && $data['subcategory_id'] > 0){
			$subcat = " AND pc.subcategory_id = '".$data['subcategory_id']."'";
		}else{
			$subcat = "";
		}

		if(isset($data['brand_id']) && $data['brand_id'] > 0){
			$brand = " AND p.brand_id = '".$data['brand_id']."'";
		}else{
			$brand = "";
		}

		if(isset($data['search_by']) && $data['search_by'] != ""){
			$search = " AND (p.product_name like '".$data['search_by']."%' OR s.product_code like '".$data['search_by']."%')";
		}else{
			$search = "";
		}
		
		$query = $this->db->query("select distinct(ps.product_stock_id) from {PRE}product p, {PRE}product_size s, {PRE}product_category pc, {PRE}product_stock ps where p.product_id = s.product_id AND p.product_id = pc.product_id AND s.product_size_id = ps.product_size_id AND ps.in_stock > 0 ".$dep.$cat.$subcat.$brand.$search." order by `product_stock_id` desc limit ".$start.",".$limit);
		$result['result_num'] = $query->num_rows();
		if(isset($result['result_num']) && $result['result_num'] > 0){
			foreach($query->result() as $key => $val){
				
				$query_stock = $this->db->query("select * from {PRE}product_stock where `product_stock_id` = '".$val->product_stock_id."'");
				$result['result_log'][$val->product_stock_id] = $query_stock->row();
				
				$query_pro = $this->db->query("select * from {PRE}product p, {PRE}product_size s where p.product_id = s.product_id AND p.product_id = '".$result['result_log'][$val->product_stock_id]->product_id."' AND s.product_size_id = '".$result['result_log'][$val->product_stock_id]->product_size_id."'");
				$result['pro_log'][$val->product_stock_id] = $query_pro->row();
				
			}
		}else{
			$result['result_log'] = "";
			$result['pro_log'] = "";
		}
		return $result;
	}
	
//========================================= Stock Ledger =======================================================

	function fetchstockledger($data,$state_id,$city_id){
		$query = $this->db->query("SELECT p.product_id, p.product_name, p.product_brand_name, pz.product_size_id, pz.product_size, pz.product_unit FROM {PRE}product_size pz LEFT JOIN {PRE}product p ON pz.product_id = p.product_id WHERE pz.product_code = '".$data."' AND `size_status` = 'Y'");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->row();
		if(isset($result['result_num']) && $result['result_num'] > 0){
			$query_grn = $this->db->query("SELECT g.grn_no, 
				g.grn_date, 
				pg.pur_qty, 
				pg.free_qty, 
				pg.rec_qty, 
				pg.purchase_price, 
				pg.discount_per, 
				pg.discount_price,
				s.supplier_name
				FROM {PRE}pur_grn_product pg 
				LEFT JOIN {PRE}pur_grn g ON pg.grn_id = g.grn_id 
				LEFT JOIN {PRE}supplier s ON g.supplier_id = s.supplier_id 
				where pg.product_size_id = '".$result['result_log']->product_size_id."'
				AND pg.state_id = '".$state_id."'
				AND pg.city_id = '".$city_id."'
				AND pg.grn_id >= '0' AND g.status = 'Y' order by g.grn_id asc");
			$result['grn_num'] = $query_grn->num_rows();
			$result['grn_log'] = $query_grn->result();
			
			$query_sale = $this->db->query("SELECT s.order_no,
				s.order_date,
				s.deliveryslot,
				s.status,
				s.payment_method,
				s.shippingpincode,
				p.mrp,
				p.unit_price,
				p.qyt
				FROM {PRE}sale_product p
				LEFT JOIN {PRE}sale_order s ON p.sale_order_id = s.sale_order_id
				WHERE p.product_size_id = '".$result['result_log']->product_size_id."' AND s.state_id = '".$state_id."' AND s.city_id = '".$city_id."' AND s.status != 'C' AND p.status = 'Y' order by s.sale_order_id asc");
			$result['sale_num'] = $query_sale->num_rows();
			$result['sale_log'] = $query_sale->result();
			
			$query_waste = $this->db->query("SELECT * FROM {PRE}product_shortage WHERE `status` = 'Y' AND `product_size_id` = '".$result['result_log']->product_size_id."' AND `state_id` = '".$state_id."'  AND `city_id` = '".$city_id."'");
			$result['waste_num'] = $query_waste->num_rows();
			$result['waste_log'] = $query_waste->result();
		}else{
			$result['grn_num'] = 0;
			$result['grn_log'] = "";
			$result['sale_num'] = 0;
			$result['sale_log'] = "";
			$result['waste_num'] = 0;
			$result['waste_log'] = "";
		}
		
		return $result;
	}
	
//============================================ Product Shortage Option =========================================
	function fetch_all_pagination_wastage($limit, $start,$table_name,$field_name,$order) {
		$query = $this->db->query("select ps.*,
			s.state_name,
			c.city_name
			from {PRE}".$table_name." ps
			LEFT JOIN {PRE}state s ON ps.state_id = s.state_id
			LEFT JOIN {PRE}city c ON ps.city_id = c.city_id
			where 1 order by ps.".$field_name." ".$order." limit ".$start.",".$limit);
		
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		if(isset($result['result_num']) && $result['result_num'] > 0){
			foreach($result['result_log'] as $key => $val){
				$query_pro = $this->db->query("select s.*, p.* from {PRE}product p LEFT JOIN {PRE}product_size s on p.product_id = s.product_id WHERE  s.product_size_id = '".$val->product_size_id."'");
				$result['pro_log'][$val->shortage_id] = $query_pro->row();
				
				if($val->added_by > 0){
					$query_edit = $this->db->query("select * from {PRE}mm_login where `login_id` = '".$val->added_by."'");
					$result['addadmin_log'][$val->shortage_id] = $query_edit->row();
				}else{
					$result['addadmin_log'][$val->shortage_id] = "";
				}
				if($val->updated_by > 0){
					$query_edit = $this->db->query("select * from {PRE}mm_login where `login_id` = '".$val->updated_by."'");
					$result['editadmin_log'][$val->shortage_id] = $query_edit->row();
				}else{
					$result['editadmin_log'][$val->shortage_id] = "";
				}
			}
		}else{
			$result['pro_log'] = "";
			$result['addadmin_log'] = "";
			$result['editadmin_log'] = "";
		}
		return $result;
	}
	
	function fetch_searchshortageproduct($data){
		if(isset($data['search_field'])){
			$explode = explode(" ",trim($data['search_field']));
			$sear = " AND (";
			foreach($explode as $keyexp => $valexp){
				if($keyexp == 0){
					$sear = $sear . "(p.product_name like '%".strtolower(addslashes($valexp))."%'
					OR p.product_brand_name like '%".strtolower(addslashes($valexp))."%'
					OR z.product_code like '%".strtolower(addslashes($valexp))."%')";
				}else{
					$sear = $sear . " AND (p.product_name like '%".strtolower(addslashes($valexp))."%'
					OR p.product_brand_name like '%".strtolower(addslashes($valexp))."%'
					OR z.product_code like '%".strtolower(addslashes($valexp))."%')";
				}
			}
			$sear = $sear .")";
		}else{
			$sear = "";
		}
		
		$sql = "SELECT distinct(ps.product_size_id) FROM {PRE}product p, {PRE}product_size z, {PRE}product_stock ps
		where p.product_id = z.product_id
		AND ps.product_id = p.product_id
		AND ps.product_size_id = z.product_size_id
		AND ps.in_stock > 0
		AND p.status = 'Y'
		AND z.size_status = 'Y'
		AND ps.state_id = '".$data['state_id']."'
		AND ps.city_id = '".$data['city_id']."'
		".$sear." limit 50";

		$query = $this->db->query($sql);
		$result_num = $query->num_rows();
		if($result_num > 0){
			$result['result_num'] = $result_num;
			$result_product_size = $query->result();
			foreach($result_product_size as $key => $val){

				$query_size = $this->db->query("select p.product_name, p.product_brand_name, s.product_code, s.product_size, s.product_unit, s.product_size_id, p.product_id from {PRE}product_size s, {PRE}product p where p.product_id = s.product_id AND s.product_size_id = '".$val->product_size_id."' AND s.size_status = 'Y'");
				$result['result_log'][$val->product_size_id] = $query_size->row();

			}
		}else{
			$result['result_num'] = 0;
			$result['result_log'] = "";
		}
		return $result;
	}
	
	function fetch_product_shortage($product_size_id,$state_id,$city_id){
		$query = $this->db->query("select p.product_name, p.product_brand_name, s.product_code, s.product_size, s.product_unit, s.product_size_id, p.product_id,
			ps.in_stock, ps.product_stock_id from 
			{PRE}product p
			LEFT JOIN {PRE}product_size s ON p.product_id = s.product_id
			LEFT JOIN {PRE}product_stock ps ON s.product_size_id = ps.product_size_id
			WHERE s.product_size_id = '".$product_size_id."'
			AND ps.state_id = '".$state_id."'
			AND ps.city_id = '".$city_id."'");
		$result['result_log'] = $query->row();
		
		return $result;
	}
	
	function addshortageproduct($data){
		$query = $this->db->query("select `shortage_id` from {PRE}product_shortage order by `shortage_id` desc limit 1");
		$row = $query->row();
		if(isset($row->shortage_id) && $row->shortage_id > 0){
			$shortage_code = "SRT".sprintf("%06d",($row->shortage_id + 1));
		}else{
			$shortage_code = "SRT".sprintf("%06d",1);
		}
		
		if((isset($data['product_stock_id']) && $data['product_stock_id'] > 0)){
			
			$this->db->query("INSERT INTO {PRE}product_shortage SET
				`shortage_code` = '".$shortage_code."', 
				`state_id` = '".$data['state_id']."', 
				`city_id` = '".$data['city_id']."', 
				`product_id` = '".$data['product_id']."', 
				`product_size_id` = '".$data['product_size_id']."', 
				`product_stock_id` = '".$data['product_stock_id']."',
				`shortage_qty` = '".$data['shortage_qty']."', 
				`mrp` = '".$data['mrp']."',
				`sale_price` = '".$data['sale_price']."',
				`shortage_date` = '".$data['shortage_date']."', 
				`shortage_reason` = '".$data['shortage_reason']."', 
				`added_by` = '".$data['added_by']."',
				`shortage_type` = '".$data['shortage_type']."', 
				`status` = '".$data['status']."'");
			
			$query_stock = $this->db->query("select * from {PRE}product_stock where `product_stock_id` = '".$data['product_stock_id']."'");
			$row_stock = $query_stock->row();
			$product_in = $row_stock->product_in;
			$product_out_stock = $row_stock->product_out;
			$shoratge_qty_stock = $row_stock->shoratge_qty;
			$in_hold_stock = $row_stock->in_hold;
			
			$shoratge_qty_stock = $shoratge_qty_stock + $data['shortage_qty'];
			$in_hold_stock = 0;
			
			$in_stock = $product_in - ($product_out_stock + $shoratge_qty_stock + $in_hold_stock);
			
			$this->db->query("UPDATE {PRE}product_stock SET `shoratge_qty` = '".$shoratge_qty_stock."', `in_hold` = '".$in_hold_stock."', `in_stock` = '".$in_stock."' where `product_stock_id` = '".$data['product_stock_id']."'");
			
		}
	}
	
//==============================================================================================================	

	function record_count_search($table_name,$field_name,$order,$search_by,$search_value) {
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND `".$search_by."` = '".$search_value."' order by `".$field_name."` ".$order);
		return $num_row = $query->num_rows();
	}

	function fetch_search_pagination($limit, $start,$table_name,$field_name,$order,$search_by,$search_value) {
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND `".$search_by."` = '".$search_value."' order by `".$field_name."` ".$order." limit ".$start.",".$limit);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}
	
	function fetch_blog_home($table_name,$field_name,$order,$clausefield,$clausevalue){
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND `".$clausefield."` = '".$clausevalue."' order by `".$field_name."` ".$order." limit 6");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}
	
	function fetch_all_clause($table_name,$field_name,$order,$clausefield,$clausevalue){
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND `".$clausefield."` = '".$clausevalue."' order by `".$field_name."` ".$order);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}

	function fetch_all_clause2($table_name,$field_name,$order,$clausefield,$clausevalue){
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND `".$clausefield."` != '".$clausevalue."' order by `".$field_name."` ".$order);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}
	
	function fetch_all_clausebanner($table_name,$field_name,$order,$clausefield){
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND (`".$clausefield."` != '1' AND `".$clausefield."` != '10') order by `".$field_name."` ".$order);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}
	
	function fetch_all_clausebanner2($table_name,$field_name,$order,$clausefield){
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 AND (`".$clausefield."` = '1' OR `".$clausefield."` = '10') order by `".$field_name."` ".$order);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}

	function fetch_all($table_name,$field_name,$order){
		$query = $this->db->query("select * from {PRE}".$table_name." where 1 order by `".$field_name."` ".$order);
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
		return $result;
	}

	function fetch_editdata($value,$table_name,$idname){
		$query = $this->db->query("select * from {PRE}".$table_name." where `".$idname."` = '".$value."'");
		$result['result_log'] = $query->row();
		return $result;
	}

	function fetch_data($field,$id,$table)
	{
		$query  = $this->db->query("select * from {PRE}".$table."  where ".$field." ='".$id."'");
		$result['result_num'] = $query->num_rows();
		$result['result_log'] = $query->result();
	}

	function edit_data($data,$table_name,$id){
		$i = 1;
		$query = "UPDATE {PRE}".$table_name." SET";
		foreach($data as $key=>$value){
			if($i < count($data)){
				$query = $query . "`".$key."` = '".addslashes(trim($value))."',";
			}else{
				$query = $query . "`".$key."` = '".addslashes(trim($value))."'";
			}
			$i++;
		}
		foreach($id as $k=>$val){
			$query = $query . "WHERE `".$k."` = '".$val."'";
			$insert_id = $val;
		}
		$this->db->query($query);
		return $insert_id;
	}

	function adddata($value,$table_name){
		$query = "INSERT INTO {PRE}".$table_name." SET";
		$i = 1;
		foreach($value as $key => $val){
			if($i < count($value)){
				$query = $query . "`".$key."` = '".addslashes(trim($val))."',";
			}else{
				$query = $query . "`".$key."` = '".addslashes(trim($val))."'";
			}
			$i++;
		}
		$this->db->query($query);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}
}
?>
