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
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now

		$pay_id = $year->pay_id;

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
			$this->session->set_userdata('UsEmp_ID', $temp->Emp_ID);
			$this->session->set_userdata('UsName_EN', $temp->Empname_eng." ".$temp->Empsurname_eng);
			$this->session->set_userdata('UsName_TH', $temp->Empname_th." ".$temp->Empsurname_th);
			$this->session->set_userdata('UsDepartment', $temp->Department);
			$this->session->set_userdata('UsRole', $temp->log_role);
			$this->session->set_userdata('Uspay_id', $pay_id);
			$this-> main();
			
		}
		// else 

	}

	public function main()
	{
		if (!empty($this->session->userdata('UsEmp_ID'))) {
			if($_SESSION['UsRole'] == 1){
				redirect('Evs_all_manage/index_u', 'refresh');
			}
			// if 
			else if($_SESSION['UsRole'] == 2){
				redirect('Evs_all_manage/index_a', 'refresh');
			}
			// else if 

			else if($_SESSION['UsRole'] == 3){
				redirect('Evs_Controller/index', 'refresh');
			}
			// else if 
			
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
		$this->session->unset_userdata('UsEmp_ID');
		$this->session->unset_userdata('UsName_EN');
		$this->session->unset_userdata('UsName_TH');
		$this->session->unset_userdata('UsDepartment');
		$this->session->unset_userdata('UsRole');
		$this->session->unset_userdata('Uspay_id');
		redirect('index.php/auth/login', 'refresh');
	}
}