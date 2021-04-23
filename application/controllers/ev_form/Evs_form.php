<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

class Evs_form extends MainController_avenxo {


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
		$this->output('/consent/ev_form/v_main_form');
	}
	// function index()
	
	/*
	* createMBO
	* @input emp_id
	* @output infomation employee
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function createMBO()
	{
		$emp_id = $this->input->post("emp_id");
		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $emp_id;
		$data['check'] = $this->medm->get_by_empID()->result();

		$check = sizeof($data['check']);

		if($check != 0){
			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $emp_id;
			$data['mbo_emp'] = $this->medm->get_by_empID()->result();

			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $emp_id;
			$data['emp_info'] = $this->memp->get_by_empid();

			$this->output('/consent/ev_form/v_editMBO',$data);
		}
		// if

		else{
			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $emp_id;
			$data['emp_info'] = $this->memp->get_by_empid();
			$this->output('/consent/ev_form/v_createMBO',$data);
		}
		// else	

	}
	// function createMBO
	
	function get_mbo_by_pos(){
		
		$pos = $this->input->post("pos");
		$this->load->model('M_evs_set_form_mbo','mesf');
		$this->mesf->sfm_pos_id = $pos;
		$data = $this->mesf->get_mbo()->row();
		
		echo json_encode($data);
	}
	// function get_mbo_by_pos
	
	function save_mbo_by_emp(){
		
		$dataMBO = $this->input->post("dataMBO");
		$resultMBO = $this->input->post("resultMBO");
		$Emp_ID = $this->input->post("Emp_ID");
		$count = $this->input->post("count");
		$this->load->model('Da_evs_data_mbo','dedm');
		
		for($i=0; $i<$count; $i++){
			$this->dedm->dtm_mbo = $dataMBO[$i];
			$this->dedm->dtm_weight = $resultMBO[$i];
			$this->dedm->dtm_emp_id = $Emp_ID;
			$this->dedm->dtm_year = 2021;
			$this->dedm->insert();
		}
		// for
	}
	// function save_mbo_by_emp

	function update_mbo_by_emp(){
		
		$idMBO = $this->input->post("idMBO");
		$dataMBO = $this->input->post("dataMBO");
		$resultMBO = $this->input->post("resultMBO");
		$Emp_ID = $this->input->post("Emp_ID");
		$count = $this->input->post("count");

		$this->load->model('Da_evs_data_mbo','dedm');
		
		for($i=0; $i<$count; $i++){
			$this->dedm->dtm_id = $idMBO[$i];
			$this->dedm->dtm_mbo = $dataMBO[$i];
			$this->dedm->dtm_weight = $resultMBO[$i];
			$this->dedm->dtm_emp_id = $Emp_ID;
			$this->dedm->dtm_year = 2021;
			$this->dedm->dtm_evs_emp_id = $Emp_ID;
			$this->dedm->update();
		}
		// for
	}
	// function save_mbo_by_emp

	function edit_mbo($emp_id_edit){

		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $emp_id_edit;
		$data['mbo_emp'] = $this->medm->get_by_empID()->result();

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id_edit;
		$data['emp_info'] = $this->memp->get_by_empid();
		
		$this->output('/consent/ev_form/v_editMBO',$data);

	}
	// function edit_mbo($emp_id)

	function get_mbo_to_edit(){

		$dtm_emp_id = $this->input->post("dtm_emp_id");
		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $dtm_emp_id;
		$data = $this->medm->get_by_empID()->result();

		echo json_encode($data);
	}
	// function get_mbo_to_edit
 
}
?>