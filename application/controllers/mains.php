<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("America/Los_Angeles");
	
	class Mains extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			// $this->output->enable_profiler(TRUE);
			// $this->output->enable_profiler(TRUE);
			// $this->output->set_header("HTTP/1.0 200 OK");
			// $this->output->set_header("HTTP/1.1 200 OK");
			// $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
			// $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			// $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
			// $this->output->set_header("Pragma: no-cache");
			//$this->load->model('');
		}

		public function index()
		{
			$this->load->view('view_main');
		}

		public function get_uberinfo()
		{
			$post_data = $this->input->post();
			$url = "https://api.uber.com/v1/products?latitude=".$post_data['latitude']."&longitude=".$post_data['longitude'];
			// echo "url is ".$url."<br>";
			$myfile = fopen('assets/.token','r') or die("Unable to open file.");
			$token = fgets($myfile);
			fclose($myfile);
			$ch = curl_init();
			$header = array();
			$header[] = 'Authorization: Token '.$token;
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		    $data = curl_exec($ch);
		    if ($data == false)
		    {
		    	echo "The data comes back false: <br>";
		    	print_r('Curl Error:  '.curl_error($ch));
		    }
		    if ($data == true)
		    {
			    $info = curl_getinfo($ch);
			    curl_close($ch);
			    $data = strstr($data,"{");
			    $json = json_decode($data,true);
			    // echo "var dumping json here: ";
			    // var_dump($json);
		    	$this->load->view('partial_view',$json);
			}
			
		}
	}

?>