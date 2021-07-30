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

		$comment1 = [];
		$comment2 = [];

		$emp_id = $this->input->post("emp_id");
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app1'] = $this->meda->get_by_approver1()->result();

		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app2'] = $this->meda->get_by_approver2()->result();

		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$emp_data3 = $data['data_app3'] = $this->meda->get_by_approver3()->result();

		$this->meda->dma_approve2 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$emp_data4 = $data['data_app4'] = $this->meda->get_by_approver4()->result();

	 if(sizeof($data['data_app1']) == 0 && sizeof($data['data_app2']) == 0 && sizeof($data['data_app3']) != 0 || sizeof($data['data_app4']) != 0)
	 {
		
		foreach ($emp_data3 as $row) {
		$this->load->model('M_evs_reject_form','mrjf');
				$this->mrjf->rjf_dma_id = $row->dma_id;
				$this->mrjf->rjf_status = 1;
				$data_rj_comment1 = $this->mrjf->get_all_by_dma_id_and_rjf_status()->row();
			array_push($comment1,$data_rj_comment1->rjf_comment);
		}


		foreach ($emp_data4 as $row) {	
		$this->load->model('M_evs_reject_form','mrjf');
			$this->mrjf->rjf_dma_id = $row->dma_id;
			$this->mrjf->rjf_status = 2;
			$data_rj_comment2 = $this->mrjf->get_all_by_dma_id_and_rjf_status()->row();
			array_push($comment2,$data_rj_comment2->rjf_comment);
			}
		
			$data['data_comment1'] = $comment1;
			$data['data_comment2'] = $comment2;	
		$this->output('/consent/ev_form/v_show_evaluation_reject',$data);
	 }
	 else
	 {
		$this->output('/consent/ev_form/v_show_evaluation',$data);
	 }
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

	function form_rejacet()
	{
		

		$this->load->model('M_evs_data_approve','mdap');
		$this->load->model('Da_evs_reject_form','drjf');

			$this->mdap->dma_emp_id = $this->input->post("Emp_ID");
			$data_dma_id = $this->mdap->get_by_id();
			$row_dma_id = $data_dma_id->row();
			$dma_id = $row_dma_id->dma_id;


			$this->drjf->rjf_comment = $this->input->post("comment");
			$this->drjf->rjf_status = 1;
			$this->drjf->rjf_dma_id = $dma_id;
			$this->drjf->insert();
			
			$this->mdap->dma_emp_id = $this->input->post("Emp_ID");
			$this->mdap->dma_status = -1;
			$this->mdap->update_status(); 
			
			$data = "form_rejacet";
			echo json_encode($data);

		
	}
	// function Main()
	
}
?>