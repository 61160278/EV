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
		// $check = sizeof($data['check']);

		// if($check != 0){

			// $this->load->model('M_evs_employee','memp');
			// $this->memp->Emp_ID = $emp_id;
			// $this->memp->emp_pay_id = $pay_id;
			// $data['emp_info'] = $this->memp->get_by_empid();

			// $tep = $data['emp_info']->row();
			// $this->load->model('M_evs_set_form_gcm','mesf');
			// $this->mesf->sgc_pos_id = $tep->Position_ID;
			// $this->mesf->sgc_pay_id = $pay_id;
			// $data['info_gcm_form'] = $this->mesf->get_all_competency_by_indicator();

			// $this->load->model('M_evs_expected_behavior','mept');
			// $data['info_expected'] = $this->mept->get_all_by_pos();

			// $data['info_pos_id'] = $tep->Position_ID;
			

			// $this->output('/consent/ev_form_AP/v_editGCM',$data);
		// }
		// // if

		// else{
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
		// }
		// else	

	}
	// function createACM

	function save_data_gcm(){

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

	function update_data_gcm(){

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
	
}
?>