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
		$dep = [];

		$emp_id = $_SESSION['UsEmp_ID'];
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app1'] = $this->meda->get_by_approver1()->result();
		if(sizeof($data['data_app1']) != 0){
			$this->load->model('M_evs_employee','memp');
			foreach($data['data_app1'] as $row){
				$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
				array_push($dep,$data[$row->Emp_ID."_dep"]);
			}
			// foreach 
			$data["dep1"] = $dep;
		}
		// if 

		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$data['data_app2'] = $this->meda->get_by_approver2()->result();
		if(sizeof($data['data_app2']) != 0){
			$this->load->model('M_evs_employee','memp');
			foreach($data['data_app2'] as $row){
				$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
				array_push($dep,$data[$row->Emp_ID."_dep"]);
			}
			// foreach 
			$data["dep2"] = $dep;
		}
		// if 

		$this->meda->dma_approve1 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$emp_data3 = $data['data_app3'] = $this->meda->get_by_approver3()->result();
		if(sizeof($data['data_app3']) != 0){
			$this->load->model('M_evs_employee','memp');
			foreach($data['data_app3'] as $row){
				$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
				array_push($dep,$data[$row->Emp_ID."_dep"]);
			}
			// foreach 
			$data["dep3"] = $dep;
		}
		// if

		$this->meda->dma_approve2 = $emp_id;
		$this->meda->emp_pay_id = $pay_id;
		$emp_data4 = $data['data_app4'] = $this->meda->get_by_approver4()->result();
		if(sizeof($data['data_app4']) != 0){
			$this->load->model('M_evs_employee','memp');
			foreach($data['data_app4'] as $row){
				$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
				array_push($dep,$data[$row->Emp_ID."_dep"]);
			}
			// foreach 
			$data["dep4"] = $dep;
		}
		// if

		

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
	 // if
	 else if(sizeof($data['data_app1']) != 0 || sizeof($data['data_app2']) != 0 ){
		$this->output('/consent/ev_form/v_show_evaluation',$data);
	 }
	 // else
	 else {
		$this->output('/consent/ev_form/v_show_evaluation',$data);
	 }
	 // else 
	}
	// function index()

	function Main($Emp_ID)
	{
		redirect('ev_form/Evs_form_evaluation/index');
	}
	// function Main()

	function feedback(){
		$comment1 = [];
		$app_com1 = [];
		$comment2 = [];
		$app_com2 = [];
		$comment_temp1 = [];
		$app_com_temp1 = [];
		$comment_temp2 = [];
		$app_com_temp2 = [];
		$dep1 = [];
		$dep2 = [];

		$this->load->model('M_evs_data_grade','mdg');
		$this->mdg->dma_approve1 = $_SESSION['UsEmp_ID'];
		$this->mdg->dma_status = 7;
		$data['data_group1'] = $this->mdg->get_by_approver1()->result();

		if(sizeof($data['data_group1']) != 0){
		$this->load->model('M_evs_data_comment','mdcm');
		foreach($data['data_group1'] as $row){
			$this->mdcm->dcm_emp_id = $row->emp_id;
			$data['com_temp'] =  $this->mdcm->get_by_emp()->result();
			$this->load->model('M_evs_employee','memp');
			$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep1,$data[$row->Emp_ID."_dep"]);

			if(sizeof($data['com_temp']) != 0){
				$tmp = $data['com_temp'];
				foreach($tmp as $row){
					array_push($comment_temp1,$row->dcm_comment);
					$name = $row->Empname_eng." ".$row->Empsurname_eng;
					array_push($app_com_temp1,$name);
				}
				// foreach
				array_push($comment1,$comment_temp1);
				array_push($app_com1,$app_com_temp1);
			}
			// if
			$comment_temp1 = [];
			$app_com_temp1 = [];

		}
		// foreach
		$data['comment1'] = $comment1;
		$data['app_com1'] = $app_com1;
		$data["dep_info1"] = $dep1;
		}
		// if
		else{
			$data['data_group1'] = [];
		}
		// else 
		
	
		$this->load->model('M_evs_data_grade','mdg');
		$this->mdg->dma_approve2 = $_SESSION['UsEmp_ID'];
		$this->mdg->dma_status = 6;
		$data['data_group2'] = $this->mdg->get_by_approver2()->result();

		if(sizeof($data['data_group2']) != 0){
		$this->load->model('M_evs_data_comment','mdcm');
		foreach($data['data_group2'] as $row){
			$this->mdcm->dcm_emp_id = $row->emp_id;
			$data['com_temp'] =  $this->mdcm->get_by_emp()->result();

			$this->load->model('M_evs_employee','memp');
			$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep2,$data[$row->Emp_ID."_dep"]);

			if(sizeof($data['com_temp']) != 0){
				$tmp = $data['com_temp'];
				foreach($tmp as $row){
					array_push($comment_temp2,$row->dcm_comment);
					$name = $row->Empname_eng." ".$row->Empsurname_eng;
					array_push($app_com_temp2,$name);
				}
				// foreach
				array_push($comment2,$comment_temp2);
				array_push($app_com2,$app_com_temp2);
			}
			// if
			$comment_temp2 = [];
			$app_com_temp2 = [];	
		}
		// foreach
		$data['comment2'] = $comment2;
		$data['app_com2'] = $app_com2;
		$data["dep_info2"] = $dep2;
		}
		// if
		else{
			$data['data_group2'] = [];
		}
		// else 
	
		$this->output('/consent/ev_form/v_main_form_feedback',$data);
	}
	// feedback


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