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
		$pay_id = 2;
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
			$this->memp->emp_pay_id = $pay_id;
			$data['emp_info'] = $this->memp->get_by_empid();

			$tep = $data['emp_info']->row();
			$this->load->model('M_evs_set_form_ability','mesf');
			$this->mesf->sfa_pos_id = $tep->Position_ID;
			$this->mesf->sfa_pay_id = $pay_id;
			$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();

			$this->load->model('M_evs_expected_behavior','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos();

			$data['info_pos_id'] = $tep->Position_ID;
			

			$this->output('/consent/ev_form/v_editMBO',$data);
		}
		// if

		else{
			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $emp_id;
			$this->memp->emp_pay_id = $pay_id;
			$data['emp_info'] = $this->memp->get_by_empid();

			$tep = $data['emp_info']->row();
			$this->load->model('M_evs_set_form_ability','mesf');
			$this->mesf->sfa_pos_id = $tep->Position_ID;
			$this->mesf->sfa_pay_id = $pay_id;
			$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
			$this->load->model('M_evs_expected_behavior','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos();
			$data['info_pos_id'] = $tep->Position_ID;

			$this->output('/consent/ev_form/v_createMBO',$data);
		}
		// else	

	}
	// function createMBO

	function get_tap_form(){

		$ps_pos_id = $this->input->post("ps_pos_id");
		$pay_id = 2;

		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $ps_pos_id;
		$this->mpf->ps_pay_id = $pay_id;
		$data = $this->mpf->get_all_by_key_by_year()->result();

		echo json_encode($data);


		
	}
	// function get_tap_form
	
	function get_mbo_by_pos(){

		$pay_id = 2;
		$pos = $this->input->post("pos");
		$this->load->model('M_evs_set_form_mbo','mesf');
		$this->mesf->sfm_pay_id = $pay_id;
		$this->mesf->sfm_pos_id = $pos;
		$data = $this->mesf->get_all_by_key_by_year()->row();
		
		echo json_encode($data);
	}
	// function get_mbo_by_pos

	function get_G_O_by_pos(){
		
		$pay_id = 2;
		$pos = $this->input->post("pos");
		$this->load->model('M_evs_set_form_g_and_o','mesg');
		$this->mesg->sfg_pay_id = $pay_id;
		$this->mesg->sfg_pos_id = $pos;
		$data = $this->mesg->get_all_by_key_by_year()->row();
		
		echo json_encode($data);
	}
	// function get_G_O_by_pos

	function get_sdgs(){
		
		$this->load->model('M_evs_sdgs','msdg');
		$data = $this->msdg->get_all()->result();
		echo json_encode($data);
	}
	// function get_G_O_by_pos

	
	function save_mbo_by_emp(){
		
		$sdgsMBO = $this->input->post("sdgsMBO");
		$dataMBO = $this->input->post("dataMBO");
		$resultMBO = $this->input->post("resultMBO");
		$Emp_ID = $this->input->post("Emp_ID");
		$emp_employee_id = $this->input->post("evs_emp_id");
		$count = $this->input->post("count");
		$this->load->model('Da_evs_data_mbo','dedm');
		
		for($i=0; $i<$count; $i++){
			$this->dedm->dtm_sdg = $sdgsMBO[$i];
			$this->dedm->dtm_mbo = $dataMBO[$i];
			$this->dedm->dtm_weight = $resultMBO[$i];
			$this->dedm->dtm_emp_id = $Emp_ID;
			$this->dedm->dtm_evs_emp_id = $emp_employee_id;
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
		$emp_employee_id = $this->input->post("evs_emp_id");
		$count = $this->input->post("count");

		$this->load->model('Da_evs_data_mbo','dedm');
		
		for($i=0; $i<$count; $i++){
			$this->dedm->dtm_id = $idMBO[$i];
			$this->dedm->dtm_mbo = $dataMBO[$i];
			$this->dedm->dtm_weight = $resultMBO[$i];
			$this->dedm->dtm_emp_id = $Emp_ID;
			$this->dedm->dtm_evs_emp_id = $emp_employee_id;
			$this->dedm->update();
		}
		// for
	}
	// function save_mbo_by_emp

	function save_approve(){

		$approve1 = $this->input->post("approve1");
		$approve2 = $this->input->post("approve2");
		$emp_employee_id = $this->input->post("evs_emp_id");
		$Emp_ID = $this->input->post("dma_emp_id");

		$this->load->model('Da_evs_data_mbo_approve','deda');
		$this->deda->dma_approve1 = $approve1;
		$this->deda->dma_approve2 = $approve2;
		$this->deda->dma_dtm_emp_id = $Emp_ID;
		$this->deda->dma_emp_id = $emp_employee_id;
		$this->deda->insert();

		$this->load->model('M_evs_data_mbo_approve','meda');
		$this->meda->dma_emp_id = $emp_employee_id;
		$data['data_app'] = $this->meda->get_by_id()->row();

		echo json_encode($data);
	}
	// function save_approve

	function update_approve(){

		$approve1 = $this->input->post("approve1");
		$approve2 = $this->input->post("approve2");
		$emp_employee_id = $this->input->post("evs_emp_id");
		$Emp_id = $this->input->post("dma_emp_id");

		$this->load->model('Da_evs_data_mbo_approve','deda');
		$this->deda->dma_approve1 = $approve1;
		$this->deda->dma_approve2 = $approve2;
		$this->deda->dma_dtm_emp_id = $Emp_id;
		$this->deda->dma_emp_id = $emp_employee_id;
		$this->deda->update();

		$this->load->model('M_evs_data_mbo_approve','meda');
		$this->meda->dma_emp_id = $emp_employee_id;
		$data['data_app'] = $this->meda->get_by_id()->row();

		echo json_encode($data);
	}
	// function save_approve

	

	function get_approve(){

		$evs_emp_id = $this->input->post("evs_emp_id");

		$this->load->model('M_evs_data_mbo_approve','meda');
		$this->meda->dma_emp_id = $evs_emp_id;
		$data['data_app'] = $this->meda->get_by_id()->row();

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $data['data_app']->dma_approve1;
		$data['app1'] = $this->memp->get_by_appid()->result();

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $data['data_app']->dma_approve2;
		$data['app2'] = $this->memp->get_by_appid()->result();

		echo json_encode($data);

	}
	// function get_approve

	function edit_mbo($emp_id_edit){

		$pay_id = 2;
		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $emp_id_edit;
		$data['mbo_emp'] = $this->medm->get_by_empID()->result();

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id_edit;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();
		$this->load->model('M_evs_set_form_ability','mesf');
		$this->mesf->sfa_pos_id = $tep->Position_ID;
		$this->mesf->sfa_pay_id = $pay_id;
		$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();

		$this->load->model('M_evs_expected_behavior','mept');
		$data['info_expected'] = $this->mept->get_all_by_pos();

		$data['info_pos_id'] = $tep->Position_ID;		
		
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

	function historyMBO()
	{
		$emp_id = $this->input->post("emp_id_his");
		$pay_id = 2;
		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		
		$this->load->model('M_evs_employee','memp');
		$this->memp->dma_dtm_emp_id = $emp_id;
		$data['data_his'] = $this->memp->get_his_by_id();

		$this->output('/consent/ev_form/v_historyMBO',$data);
	}
	// function createMBO

	function get_approve_his(){

		$app_emp = $this->input->post("app_emp");
		$pay_id = 2;
		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $app_emp;
		$this->memp->emp_pay_id = $pay_id;
		$data = $this->memp->get_by_empid()->result();
		echo json_encode($data);

	}
	// function get_approve_his

	function show_mbo_his($emp_id){

		$pay_id = 2;
		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $emp_id;
		$data['mbo_emp'] = $this->medm->get_by_empID()->result();

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();
		$this->load->model('M_evs_set_form_ability','mesf');
		$this->mesf->sfa_pos_id = $tep->Position_ID;
		$this->mesf->sfa_pay_id = $pay_id;
		$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();

		$this->load->model('M_evs_expected_behavior','mept');
		$data['info_expected'] = $this->mept->get_all_by_pos();

		$data['info_pos_id'] = $tep->Position_ID;

		$this->output('/consent/ev_form/v_hisMBO',$data);


	}
	// function show_mbo_his
}
?>