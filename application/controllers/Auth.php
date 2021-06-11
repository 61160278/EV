<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

class Auth extends MainController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$this->load->view('auth/v_user_login');
	}

	public function check_login()
	{
		
		$this->load->model('M_evs_login', 'melog');

		$this->melog->log_user_id = $_POST['user'];
		$this->melog->log_password = $_POST['pass'];
		$data['user'] = $this->melog->check_login();

		if(sizeof($data['user']->row()) == 0){
			$this->login();
		}
		// if
		else{
			$temp = $data['user']->row();
			// print_r($temp);
			$this->session->set_userdata('UsEmp_ID', $temp->emp_employee_id);
			$this->session->set_userdata('UsName_EN', $temp->Empname_eng." ".$temp->Empsurname_eng);
			$this->session->set_userdata('UsName_TH', $temp->Empname_th." ".$temp->Empsurname_th);
			$this->session->set_userdata('UsDepartment', $temp->Department);
			$this->session->set_userdata('Uspay_id', $temp->pay_id);

			$this-> main();
			
		}
		// else 

	}

	public function main()
	{
		if (!empty($this->session->userdata('UsEmp_ID'))) {
			redirect('Evs_all_manage/index_u', 'refresh');
		}
		// if
		else {
			redirect('index.php/auth/login', 'refresh');
		}
		// else
	}
	// public function main

	public function logout()
	{
		$this->session->unset_userdata('HOME');
		$this->session->unset_userdata('URL');
		$this->session->unset_userdata('MnID');
		$this->session->unset_userdata('MnURL');
		$this->session->unset_userdata('MnNameT');
		$this->session->unset_userdata('UsID');
		$this->session->unset_userdata('GpID');
		$this->session->unset_userdata('StID');
		$this->session->unset_userdata('UsPsCode');
		$this->session->unset_userdata('UsLogin');
		$this->session->unset_userdata('SysName');
		$this->session->unset_userdata('UsName');
		$this->session->unset_userdata('dpName');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('GpName');
		$this->session->unset_userdata('UsWgID');
		$this->session->unset_userdata('UsAdmin');
		redirect('index.php/auth/login', 'refresh');
	}
}