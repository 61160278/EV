<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form_evaluation
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-06-16
*/

class Evs_form_evaluation extends MainController_avenxo {


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
	* @Create Date 2564-06-16
	*/
	function index()
	{
		$emp_id = $this->input->post("emp_id");
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app1'] = $this->meda->get_by_approver1()->result();

		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app2'] = $this->meda->get_by_approver2()->result();


		$this->output('/consent/ev_form/v_show_evaluation',$data);
	}
	// function index()

	function Main($Emp_ID)
	{
		$emp_id = $Emp_ID;
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app1'] = $this->meda->get_by_approver1()->result();

		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app2'] = $this->meda->get_by_approver2()->result();


		$this->output('/consent/ev_form/v_show_evaluation',$data);
	}
	// function Main()
	
}
?>