<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		/*if ($this->session->has_userdata('username')) {
			if($this->session->userdata('role') =='member'){
				redirect('Users');
			}
		}  */
     }

	public function index()
	{
		$url=base_url("meetix-api-home.php");

		$id_user = $this->session->userdata('id_user');
		$balance['tampil'] = $this->Home_model->see_balance($id_user);
		$json = file_get_contents($url);
		$jsonToArray = json_decode($json);
		$data['api'] = $jsonToArray->data;
		// $data['duit'] = $this->Home_model->balance();
		$this->load->view('home/header',$balance);
		$this->load->view('home/index',$data);
		$this->load->view('home/footer');
	}
	public function test()
	{
		$this->load->view('Home/test');
	}
}
