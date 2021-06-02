<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

class Evs_form_AP extends MainController_avenxo {


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
		$this->output('/consent/ev_form_AP/v_main_form');
	}
	// function index()
	
	/*
	* createACM
	* @input emp_id
	* @output infomation employee
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function createACM()
	{

		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;


		$emp_id = $this->input->post("emp_id");
		$emp_id = "00009";
		//$pay_id = 2;
		$this->load->model('M_evs_employee','memp');
		$this->memp->emp_employee_id = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$employee_data = $data["employee_data"] = $this->memp->get_by_evs_emp_id()->row();


		$emp_id = "00009";
		$pay_id = 2;
		$this->load->model('M_evs_data_acm','mdtm');
		$this->mdtm->dta_evs_emp_id = $employee_data->emp_id;
		$data['check'] = $data['data_acm'] = $this->mdtm->get_by_empID();
		$check = sizeof($data['check']);

		if($check != 0){

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
			

			$this->output('/consent/ev_form_AP/v_editACM',$data);
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

			$this->output('/consent/ev_form_AP/v_createACM',$data);
		}
		// else	

	}
	// function createACM

	function save_data_acm(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sfa_id = $this->input->post("arr_sfa_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_roop = count($arr_sfa_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_acm','deda');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->deda->dta_evs_emp_id = $ps_pos_id;
		$this->deda->dta_sfa_id = $arr_sfa_id[$i];
		$this->deda->dta_weight = $arr_radio[$i];
		$this->deda->insert();
		}

		$data = "save_data_acm";
		echo json_encode($data);		
	}
	// function get_tap_form

	function update_data_acm(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sfa_id = $this->input->post("arr_sfa_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_roop = count($arr_sfa_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_data_acm','meda');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->meda->dta_evs_emp_id = $ps_pos_id;
		$this->meda->dta_sfa_id = $arr_sfa_id[$i];
		$this->meda->dta_weight = $arr_radio[$i];
		$this->meda->update();
		}

		$data = "update_data_acm";
		echo json_encode($data);		
	}
	// -----------------------------------------------------------------------------
	/*
	* createGCM
	* @input emp_id
	* @output infomation employee
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function createGCM()
	{

		// //string set year now
		// $this->load->model('M_evs_pattern_and_year','myear');
		// $data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		// $year = $data['patt_year']->row(); // show value year now
		// //end set year now
		// $pay_id = $year->pay_id;


		//$emp_id = $this->input->post("emp_id");
		$emp_id = "00010";
		$pay_id = 2;
		$this->load->model('M_evs_employee','memp');
		$this->memp->emp_employee_id = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$employee_data = $data["employee_data"] = $this->memp->get_by_evs_emp_id()->row();


		$emp_id = "00010";
		$pay_id = 2;
		$this->load->model('M_evs_data_gcm','mdtm');
		$this->mdtm->dtg_evs_emp_id = $employee_data->emp_id;
		$data['check'] = $data['data_gcm'] = $this->mdtm->get_by_empID();
		$check = sizeof($data['check']);

		if($check != 0){

			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $emp_id;
			$this->memp->emp_pay_id = $pay_id;
			$data['emp_info'] = $this->memp->get_by_empid();

			$tep = $data['emp_info']->row();
			$this->load->model('M_evs_set_form_gcm','mesf');
			$this->mesf->sgc_pos_id = $tep->Position_ID;
			$this->mesf->sgc_pay_id = $pay_id;
			$data['info_gcm_form'] = $this->mesf->get_all_competency_by_indicator();
			$this->load->model('M_evs_expected_behavior_gcm','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos();
			$data['info_pos_id'] = $tep->Position_ID;
			

			$this->output('/consent/ev_form_AP/v_editGCM',$data);
		}
		// if

		else{
			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $emp_id;
			$this->memp->emp_pay_id = $pay_id;
			$data['emp_info'] = $this->memp->get_by_empid();

			$tep = $data['emp_info']->row();
			$this->load->model('M_evs_set_form_gcm','mesf');
			$this->mesf->sgc_pos_id = $tep->Position_ID;
			$this->mesf->sgc_pay_id = $pay_id;
			$data['info_gcm_form'] = $this->mesf->get_all_competency_by_indicator();
			$this->load->model('M_evs_expected_behavior_gcm','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos();
			$data['info_pos_id'] = $tep->Position_ID;

			$this->output('/consent/ev_form_AP/v_createGCM',$data);
		}
		// else	

	}
	// function createACM

	function save_data_gcm(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sgc_id = $this->input->post("arr_sgc_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_roop = count($arr_sgc_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_gcm','dedg');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->dedg->dtg_evs_emp_id = $ps_pos_id;
		$this->dedg->dtg_sgc_id = $arr_sgc_id[$i];
		$this->dedg->dtg_weight = $arr_radio[$i];
		$this->dedg->insert();
		}

		$data = "save_data_acm";
		echo json_encode($data);		
	}
	// function get_tap_form

	function update_data_gcm(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sgc_id = $this->input->post("arr_sgc_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_roop = count($arr_sgc_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_data_gcm','medg');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->medg->dtg_evs_emp_id = $ps_pos_id;
		$this->medg->dtg_sgc_id = $arr_sgc_id[$i];
		$this->medg->dtg_weight = $arr_radio[$i];
		$this->medg->update();
		}

		$data = "update_data_acm";
		echo json_encode($data);		
	}
	//-------------------------------------------------------------------------------------------------------
	/*
	* createMBO
	* @input emp_id
	* @output infomation employee
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function createMBO()
	{
		$emp_id = "00011";
		$pay_id = 2;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();
		
		$this->load->model('M_evs_data_mbo_weight','medw');
		$this->medw->dmw_evs_emp_id = $tep->emp_id;
		$data['check'] = $data['data_mbo'] = $this->medw->get_by_empID();
		$check = sizeof($data['check']);


		if($check != 0){
				$this->load->model('M_evs_data_mbo','medm');
				$this->medm->dtm_emp_id = $emp_id;
				$this->medm->dtm_evs_emp_id = $tep->emp_id;
				$data['mbo_emp'] = $this->medm->get_by_empID()->result();


				$this->load->model('M_evs_expected_behavior','mept');
				$data['info_expected'] = $this->mept->get_all_by_pos();
				$data['info_pos_id'] = $tep->Position_ID;
				
				$this->output('/consent/ev_form_AP/v_editMBO',$data);
		}
		// if
		else{
				$this->load->model('M_evs_data_mbo','medm');
				$this->medm->dtm_emp_id = $emp_id;
				$this->medm->dtm_evs_emp_id = $tep->emp_id;
				$data['mbo_emp'] = $this->medm->get_by_empID()->result();

				$this->load->model('M_evs_expected_behavior','mept');
				$data['info_expected'] = $this->mept->get_all_by_pos();
				$data['info_pos_id'] = $tep->Position_ID;
				$this->output('/consent/ev_form_AP/v_createMBO',$data);
		}

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
	function save_data_mbo(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_dtm_id = $this->input->post("arr_dtm_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_roop = count($arr_dtm_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_mbo_weight','dedw');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->dedw->dmw_evs_emp_id = $ps_pos_id;
		$this->dedw->dmw_dtm_id = $arr_dtm_id[$i];
		$this->dedw->dmw_weight = $arr_radio[$i];
		$this->dedw->insert();
		}

		$data = "save_data_mbo";
		echo json_encode($data);		
	}
	// function get_tap_form

	function update_data_mbo(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_dtm_id = $this->input->post("arr_dtm_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_roop = count($arr_dtm_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_data_mbo_weight','medw');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->medw->dmw_evs_emp_id = $ps_pos_id;
		$this->medw->dmw_dtm_id = $arr_dtm_id[$i];
		$this->medw->dmw_weight = $arr_radio[$i];
		$this->medw->update();
		}

		$data = "update_data_mbo";
		echo json_encode($data);		
	}

	//---------------------------------------------------------------------------------------------------------------------

	function createg_and_o()
	{

		$emp_id = "00012";
		$pay_id = 2;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_data_g_and_o','mdgo');
		$this->mdgo->dgo_emp_id = $emp_id;
		$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
		$data['check'] = $this->mdgo->get_by_empID()->result();

		$check = sizeof($data['check']);

		// if($check != 0){

			$this->load->model('M_evs_data_g_and_o','mdgo');
			$this->mdgo->dgo_emp_id = $emp_id;
			$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
			$data['g_o_emp'] = $this->mdgo->get_by_empID()->result();

			$this->load->model('M_evs_expected_behavior','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos();
			$data['info_pos_id'] = $tep->Position_ID;
			
			$this->load->model('M_evs_set_form_g_and_o','mesg');
			$this->mesg->sfg_pay_id = $pay_id;
			$this->mesg->sfg_pos_id = $tep->Position_ID;
			$data['row_index'] = $this->mesg->get_all_by_key_by_year()->row();

			$this->output('/consent/ev_form_AP/v_createG_and_O',$data);
		// }
		// if

		// else{
		// 	$this->load->model('M_evs_set_form_ability','mesf');
		// 	$this->mesf->sfa_pos_id = $tep->Position_ID;
		// 	$this->mesf->sfa_pay_id = $pay_id;
		// 	$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();

		// 	$this->load->model('M_evs_expected_behavior','mept');
		// 	$data['info_expected'] = $this->mept->get_all_by_pos();

		// 	$data['info_pos_id'] = $tep->Position_ID;
		// 	$this->output('/consent/ev_form/v_createMBO',$data);

		
		// }
		// // else	

	}
		//------------------------------------------------------------------------------------------------------------
	function createMHRD()
	{

		$emp_id = "00010";
		$pay_id = 2;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_set_form_mhrd','msfm');
			$this->msfm->sfi_pos_id = $tep->Position_ID;
			$data['info_mhrd'] = $this->msfm->get_item_description_by_position();
			$this->output('/consent/ev_form_AP/v_createMHRD',$data);
	
		}
	function save_data_g_and_o(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_dgo_id = $this->input->post("arr_dgo_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_Evaluator_Review = $this->input->post("arr_Evaluator_Review");
		$arr_roop = count($arr_dgo_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_g_and_o_weight','degw');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->degw->dgw_evs_emp_id = $ps_pos_id;
		$this->degw->dgw_dgo_id = $arr_dgo_id[$i];
		$this->degw->dgw_evaluator_review = $arr_Evaluator_Review[$i];
		$this->degw->dgw_weight = $arr_radio[$i];
		$this->degw->insert();
		}

		$data = "save_data_g_and_o";
		echo json_encode($data);		
	}




}
?>