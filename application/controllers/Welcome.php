<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(isset($_REQUEST['email'])&&isset($_REQUEST['password'])){
			$user['email']=$this->input->get_post('email');
			$user['password']=$this->input->get_post('password');
			$this->load->model('LoginModel');
			$data=$this->LoginModel->addUser($user);
			print_r($data);
		}
		else
		{	$message=array("Msg"=> "no data recieved","ResponseCode"=>"400");
			echo json_encode($message); 
		}
		
		
	}
}
