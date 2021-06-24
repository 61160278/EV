<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

class Evs_all_manage extends MainController_avenxo {

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
	
	/*
	* index
	* @input 
	* @output 
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-05
	*/
	function index()
	{
		$this->output('/consent/Main_all_manage');
	}
	// function index()

	function index_u(){
		
		$emp_id = $_SESSION['UsEmp_ID'];
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		// print_r($data['emp_info']->result());
		$this->output('/consent/Main_all_manage_user');
	}
	// function index_u()

	function index_a(){
		
		$emp_id = $_SESSION['UsEmp_ID'];
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		// print_r($data['emp_info']->result());
		$this->output('/consent/Main_all_manage_approver');
	}
	// function index_a()
 
}
?>