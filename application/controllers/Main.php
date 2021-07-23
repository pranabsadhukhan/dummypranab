<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		 $this->load->helper('form');
		$this->load->model('model_main','fm');
		$this->load->model('model_admin','bm');
		$this->CI = & get_instance();
		parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
		$this->load->library('user_agent');
		require_once(APPPATH.'libraries/Mobile_Detect.php');
	}

	public function get_web_page( $url ){
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
	
	function convert_number_to_words($number) {

		$hyphen      = ' ';
		$conjunction = ' ';
		$separator   = ' ';
		$negative    = 'negative ';
		$decimal     = ' And Paise ';
		$dictionary  = array(
			0                   => 'zero',
			1                   => 'one',
			2                   => 'two',
			3                   => 'three',
			4                   => 'four',
			5                   => 'five',
			6                   => 'six',
			7                   => 'seven',
			8                   => 'eight',
			9                   => 'nine',
			10                  => 'ten',
			11                  => 'eleven',
			12                  => 'twelve',
			13                  => 'thirteen',
			14                  => 'fourteen',
			15                  => 'fifteen',
			16                  => 'sixteen',
			17                  => 'seventeen',
			18                  => 'eighteen',
			19                  => 'nineteen',
			20                  => 'twenty',
			30                  => 'thirty',
			40                  => 'fourty',
			50                  => 'fifty',
			60                  => 'sixty',
			70                  => 'seventy',
			80                  => 'eighty',
			90                  => 'ninety',
			100                 => 'hundred',
			1000                => 'thousand',
			1000000             => 'million',
			1000000000          => 'billion',
			1000000000000       => 'trillion',
			1000000000000000    => 'quadrillion',
			1000000000000000000 => 'quintillion'
		);
		
		if (!is_numeric($number)) {
			return false;
		}
		
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
				'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		}
		
		if ($number < 0) {
			return $negative . $this->convert_number_to_words(abs($number));
		}
		
		$string = $fraction = null;
		
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
		
		switch (true) {
			case $number < 21:
			$string = $dictionary[$number];
			break;
			case $number < 100:
			$tens   = ((int) ($number / 10)) * 10;
			$units  = $number % 10;
			$string = $dictionary[$tens];
			if ($units) {
				$string .= $hyphen . $dictionary[$units];
			}
			break;
			case $number < 1000:
			$hundreds  = $number / 100;
			$remainder = $number % 100;
			$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
			if ($remainder) {
				$string .= $conjunction . $this->convert_number_to_words($remainder);
			}
			break;
			default:
			$baseUnit = pow(1000, floor(log($number, 1000)));
			$numBaseUnits = (int) ($number / $baseUnit);
			$remainder = $number % $baseUnit;
			$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
			if ($remainder) {
				$string .= $remainder < 100 ? $conjunction : $separator;
				$string .= $this->convert_number_to_words($remainder);
			}
			break;
		}
		
		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
				$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
		}
		
		return $string;
	}
	
	function send_sms($base_url,$post_fields) {
		$ch = curl_init();
		//echo $sms_massage;
		curl_setopt($ch, CURLOPT_URL,$base_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		//echo $server_output;
		curl_close ($ch);
	}
	
	public function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9_\-]/', '', $string); // Removes special chars.
	   
	   return preg_replace('/-+/', '_', $string); // Replaces multiple hyphens with single one.
	}
	
	public function fetchcmsdata($id){
		$result = $this->fm->fetchcmsdata($id);
		return $result['result_log'];
	}

	public function fetchclimatedata($id){
		$result = $this->fm->fetchclimatedata($id);
		return $result['result_log'];
	}
	

	public function index()
	{
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$data['welcome']=$this->fetchcmsdata(1);
		$data['comm1']=$this->fetchcmsdata(2);
		$data['comm2']=$this->fetchcmsdata(3);
		$data['comm3']=$this->fetchcmsdata(4);
		$data['comm4']=$this->fetchcmsdata(5);
		$data['comm5']=$this->fetchcmsdata(6);
		$data['genesis']=$this->fetchcmsdata(7);
		$data['header']=$this->fetchcmsdata(9);

		$data['row']=$this->fm->upevent();

		$result_resources= $this->bm->fetch_all_clause('resources','resources_id','asc','home','Y');
		$data['resources_num'] = $result_resources['result_num'];
		$data['resources_log'] = $result_resources['result_log'];

		$result_news= $this->bm->fetch_all('news','news_id','asc');
		$data['news_num'] = $result_news['result_num'];
		$data['news_log'] = $result_news['result_log'];

		$result_banner = $this->fm->fetch_home_banner();
		$data['banner_num'] = $result_banner['result_num'];
		$data['banner_log'] = $result_banner['result_log'];

		$this->load->view('header',$data);
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function climatechange()
	{
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$data['climate1']=$this->fetchclimatedata(1);
		$data['header']=$this->fetchcmsdata(9);

		$result_banner = $this->bm->fetch_editdata(2,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$this->load->view('header',$data);
		$this->load->view('climatechange');
		$this->load->view('footer');
	}

	public function climatechangecause()
	{
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$data['climate2']=$this->fetchclimatedata(2);
		$data['header']=$this->fetchcmsdata(9);

		$result_banner = $this->bm->fetch_editdata(3,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$this->load->view('header',$data);
		$this->load->view('climatechangecause');
		$this->load->view('footer');
	}


	public function solution()
	{
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$data['sol']=$this->fetchcmsdata(8);
		$data['header']=$this->fetchcmsdata(9);

		$result_solution= $this->bm->fetch_all('solution','solution_id','asc');
		$data['solution_num'] = $result_solution['result_num'];
		$data['solution_log'] = $result_solution['result_log'];

		$result_banner = $this->bm->fetch_editdata(4,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$this->load->view('header',$data);
		$this->load->view('solutions');
		$this->load->view('footer');
	}

	public function leadership()
	{
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$data['header']=$this->fetchcmsdata(9);

		$result_leadership= $this->bm->fetch_all('leader','leader_id','asc');
		$data['leadership_num'] = $result_leadership['result_num'];
		$data['leadership_log'] = $result_leadership['result_log'];

		$result_banner = $this->bm->fetch_editdata(5,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$this->load->view('header',$data);
		$this->load->view('leadership');
		$this->load->view('footer');
	}

	public function resources()
	{
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$result_resources= $this->bm->fetch_all('resources','resources_id','asc');
		$data['resources_num'] = $result_resources['result_num'];
		$data['resources_log'] = $result_resources['result_log'];

		$data['header']=$this->fetchcmsdata(9);

		$result_banner = $this->bm->fetch_editdata(6,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$this->load->view('header',$data);
		$this->load->view('resources');
		$this->load->view('footer');
	}

	public function news(){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$result_banner = $this->bm->fetch_editdata(8,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$data['header']=$this->fetchcmsdata(9);

		$result_news= $this->bm->fetch_all('news','news_id','asc');
		$data['news_num'] = $result_news['result_num'];
		$data['news_log'] = $result_news['result_log'];

		$this->load->view('header',$data);
		$this->load->view('news-media');
		$this->load->view('footer');
	}

	public function news_inner($news_id){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$result_banner = $this->bm->fetch_editdata(3,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$data['header']=$this->fetchcmsdata(9);


		$result_news = $this->fm->fetch_more_news($news_id);
		$data['news_num'] = $result_news['result_num'];
		$data['news_log'] = $result_news['result_log'];

		$result_edit = $this->bm->fetch_editdata($news_id,'news','news_id');
		$data['result_edit'] = $result_edit['result_log'];



		$this->load->view('header',$data);
		$this->load->view('news-inner');
		$this->load->view('footer');
	}

	public function blog(){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$result_banner = $this->bm->fetch_editdata(7,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$data['header']=$this->fetchcmsdata(9);

		$result_blog= $this->bm->fetch_all('blog','blog_id','asc');
		$data['blog_num'] = $result_blog['result_num'];
		$data['blog_log'] = $result_blog['result_log'];

		$this->load->view('header',$data);
		$this->load->view('blog');
		$this->load->view('footer');
	}

	public function blog_inner($blog_id){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$result_banner = $this->bm->fetch_editdata(3,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$data['header']=$this->fetchcmsdata(9);


		$result_blog= $this->bm->fetch_all_clause('blog','blog_id','asc','popular','Y');
		$data['blog_num'] = $result_blog['result_num'];
		$data['blog_log'] = $result_blog['result_log'];

		$result_comment= $this->bm->fetch_id_comment($blog_id);
		$data['comment_num'] = $result_comment['result_num'];
		$data['comment_log'] = $result_comment['result_log'];

		$result_edit = $this->bm->fetch_editdata($blog_id,'blog','blog_id');
		$data['result_edit'] = $result_edit['result_log'];



		$this->load->view('header',$data);
		$this->load->view('blog-inner');
		$this->load->view('footer');
	}
	public function past_event(){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$result_banner = $this->bm->fetch_editdata(11,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$data['header']=$this->fetchcmsdata(9);

		$data['image']=$this->fetchcmsdata(10);

		$result_event= $this->bm->fetch_all('event','event_id','asc');
		$data['event_num'] = $result_event['result_num'];
		$data['event_log'] = $result_event['result_log'];

		$this->load->view('header',$data);
		$this->load->view('past-events');
		$this->load->view('footer');
	}

	public function past_inner($event_id){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$data['header']=$this->fetchcmsdata(9);

		$data['result']=$this->fm->fetch_all_data('event_id',$event_id,'eventpic'); 

		$result_edit = $this->bm->fetch_editdata($event_id,'event','event_id');
		$data['result_edit'] = $result_edit['result_log'];

		$result_more_event = $this->fm->fetch_more_event($event_id);
		$data['more_event_num'] = $result_more_event['result_num'];
		$data['more_event_log'] = $result_more_event['result_log'];

		$this->load->view('header',$data);
		$this->load->view('past-inner');
		$this->load->view('footer');
	}

	public function up_event(){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$result_banner = $this->bm->fetch_editdata(9,'banner','page_id');
		$data['banner_log'] = $result_banner['result_log'];

		$data['header']=$this->fetchcmsdata(9);
		$data['image']=$this->fetchcmsdata(11);

		$result_upevent= $this->bm->fetch_all('upevent','upevent_id','asc');
		$data['upevent_num'] = $result_upevent['result_num'];
		$data['upevent_log'] = $result_upevent['result_log'];

		$this->load->view('header',$data);
		$this->load->view('upcoming-events');
		$this->load->view('footer');
	}

	public function up_inner($upevent_id){
		$result_settings = $this->fm->fetch_settings();
		$data['result_setting'] = $result_settings['result_setting'];

		$data['header']=$this->fetchcmsdata(9);

		// $data['result']=$this->fm->fetch_all_data('upevent_id',$upevent_id,'eventpic'); 

		$result_edit = $this->bm->fetch_editdata($upevent_id,'upevent','upevent_id');
		$data['result_edit'] = $result_edit['result_log'];

		$result_more_upevent = $this->fm->fetch_more_upevent($upevent_id);
		$data['more_upevent_num'] = $result_more_upevent['result_num'];
		$data['more_upevent_log'] = $result_more_upevent['result_log'];

		$this->load->view('header',$data);
		$this->load->view('upcoming-inner');
		$this->load->view('footer');
	}

	public function comment(){


 		$data['blog_id'] = $this->input->post('blog_id');
		$data['name'] = $this->input->post('cname');
		$data['phno'] = $this->input->post('cphno');
        $data['email_id'] = $this->input->post('cemail_id');
		$data['comm'] = $this->input->post('cocomm');
		$data['create_date'] = time();
		
		$this->bm->adddata($data,'comment');

	// 	$this->load->library('email');
	// 	$config['validation']=TRUE;
	// 	$config['mailtype']='html';
	// 	$this->email->initialize($config);
	// 	$this->email->from($data['email_id'],$data['name']);
	// 	$this->email->to('');
	// 	$this->email->subject("contact request from jobbridg");
	// 	$this->email->message
	// 	("
	// 					        <p><strong>Name:</strong>".$data['name']."</p>
	// 							<p><strong>Email ID:</strong>".$data['email_id']."</p>
	// 							<p><strong>Mobile No:</strong>".$data['phno']."</p>
	// 	");
	// 	$this->email->send();
	// $this->session->set_flashdata('msg','Thank you for your request. We will get back to you soon.');
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	redirect('blog');
	}



	public function member(){
 
		$data['name'] = $this->input->post('name');
        $data['email_id'] = $this->input->post('email_id');
		$data['phno'] = $this->input->post('phno');
		$data['msg'] = $this->input->post('msg');
		$data['create_date'] = time();
		
		$this->bm->adddata($data,'member');

		// $this->load->library('email');
		// $config['validation']=TRUE;
		// $config['mailtype']='html';
		// $this->email->initialize($config);
		// $this->email->from($data['email_id'],$data['name']);
		// $this->email->to('hr@jobbridg.com,support@jobbridg.com');
		// $this->email->subject("Query from jobbridg");
		// $this->email->message
		// ("
		// 				        <p><strong>Name:</strong>".$data['name']."</p>
		// 						<p><strong>Email ID:</strong>".$data['email_id']."</p>
		// 						<p><strong>Subject:</strong>".$data['subject']."</p>
		// 						<p><strong>Message:</strong>".$data['msg']."</p>
		// ");
		// $this->email->send();

		
		// $this->session->set_flashdata('msg','Thank you for your request. We will get back to you soon.');
		redirect('index');
	}

}
?>