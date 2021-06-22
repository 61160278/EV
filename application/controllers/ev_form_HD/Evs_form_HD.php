<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

class Evs_form_HD extends MainController_avenxo {


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
		$data_chack_form = [];	
		$check = 0;
		$chack_save = 0;
		$chack_form_save = 0;
		
		
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;


		$this->load->model('M_evs_group','megu');
		$this->megu->emp_pay_id = $pay_id;
		$this->megu->gru_head_dept = $_SESSION['UsEmp_ID'];
		$emp_data = $data['data_group'] = $this->megu->get_group_by_head_dept()->result();


		foreach ($emp_data as $row) {
			if($row->emp_employee_id != $_SESSION['UsEmp_ID']){
			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $row->emp_employee_id;
			$this->memp->emp_pay_id = $pay_id;
			$data['emp_info'] = $this->memp->get_by_empid();

			$tep = $data['emp_info']->row();

			$check = 0;

			$this->load->model('M_evs_data_mbo_weight','medw');
			$this->medw->dmw_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_mbo'] = $this->medw->get_by_empID()->result();
			$check += sizeof($data['check']);
	

			$this->load->model('M_evs_data_g_and_o_weight','megw');
			$this->megw->dgw_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_g_and_o'] = $this->megw->get_by_empID()->result();
			$check += sizeof($data['check']);


	
			$this->load->model('M_evs_data_mhrd_weight','memw');
			$this->memw->mhw_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_mhrd'] = $this->memw->get_by_empID()->result();
			$check += sizeof($data['check']);


	
			$this->load->model('M_evs_data_acm_weight','mdtm');
			$this->mdtm->dta_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_acm_weight'] = $this->mdtm->get_by_empID()->result();
			$check += sizeof($data['check']);


	
			$this->load->model('M_evs_data_gcm_weight','mdtg');
			$this->mdtg->dtg_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_gcm_weight'] = $this->mdtg->get_by_empID()->result();
			$check += sizeof($data['check']);

			}
			array_push($data_chack_form,$check);

		} 


		foreach($emp_data as $index => $row) {
			if($data_chack_form[$index]  != 0){
				$chack_form_save += 1; 
			}
			$chack_save += 1;
		}
		
		if($chack_form_save == $chack_save){ 
			$chack_save_button = "Chack";
		}
		else{$chack_save_button = "Un_Chack";}

		$data['chack_save'] = $chack_save_button;

		$data['data_chack_form'] = $data_chack_form;

		$data['data_emp_id'] = $_SESSION['UsEmp_ID'];
		
		$this->output('/consent/ev_form_HD/v_main_form',$data);
	}
	// function index()
	
	/*
	* createACM
	* @input emp_id
	* @output infomation employee
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function createFROM($EMP_ID)
	{
		$data['data_from_pe'] = "";
		$data['data_from_ce'] = "";
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;
		$emp_id = $EMP_ID;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();

		//$emp_id = $this->input->post("emp_id");
		
		$this->load->model('M_evs_employee','memp');
		$this->memp->emp_employee_id = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$employee_data = $data["employee_data"] = $this->memp->get_by_evs_emp_id()->row();



		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $tep->Position_ID;
		$this->mpf->ps_pay_id = $pay_id;
		$data['form'] = $this->mpf->get_all_by_key_by_year()->row();


		if($data['form']->ps_form_pe == "MBO"){
			$this->load->model('M_evs_data_mbo_weight','medw');
			$this->medw->dmw_evs_emp_id = $tep->emp_id;
			$data['data_mbo'] = $this->medw->get_by_empID()->result();
			
	
			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $emp_id;
			$this->medm->dtm_evs_emp_id = $tep->emp_id;
			$data['mbo_emp'] = $this->medm->get_by_empID()->result();
			$data['info_pos_id'] = $tep->Position_ID;

			$data['data_from_pe'] = "MBO_edit";		
		
			
		}


		else if($data['form']->ps_form_pe == "G&O"){

		$this->load->model('M_evs_data_g_and_o_weight','megw');
		$this->megw->dgw_evs_emp_id = $tep->emp_id;
		$data['data_g_and_o'] = $this->megw->get_by_empID()->result();

		$check_g_o = sizeof($data['check']);

		$this->load->model('M_evs_data_g_and_o','mdgo');
		$this->mdgo->dgo_emp_id = $emp_id;
		$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
		$data['g_o_emp'] = $this->mdgo->get_by_empID()->result();
		$data['info_pos_id'] = $tep->Position_ID;
		
		$this->load->model('M_evs_set_form_g_and_o','mesg');
		$this->mesg->sfg_pay_id = $pay_id;
		$this->mesg->sfg_pos_id = $tep->Position_ID;
		$data['row_index'] = $this->mesg->get_all_by_key_by_year()->row();
		
			$data['data_from_pe'] = "G_and_O_edit";
		
		// else	
		}

		else if($data['form']->ps_form_pe == "MHRD"){
			$this->load->model('M_evs_data_mhrd_weight','memw');
			$this->memw->mhw_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_mhrd'] = $this->memw->get_by_empID()->result();
	
			$check = sizeof($data['check']);
			$this->load->model('M_evs_set_form_mhrd','msfm');
				$this->msfm->sfi_pos_id = $tep->Position_ID;
				$data['info_mhrd'] = $this->msfm->get_item_description_by_position()->result();
	
				$data['data_from_pe'] = "MHRD_edit";	
		
	
	
		}


		if($data['form']->ps_form_ce == "ACM"){
	
			$this->load->model('M_evs_data_acm_weight','mdtm');
			$this->mdtm->dta_evs_emp_id = $employee_data->emp_id;
			$data['check'] = $data['data_acm_weight'] = $this->mdtm->get_by_empID()->result();
			$check_acm = sizeof($data['check']);

			$this->load->model('M_evs_set_form_ability','mesf');
			$this->mesf->sfa_pos_id = $tep->Position_ID;
			$this->mesf->sfa_pay_id = $pay_id;
			$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator()->result();

			$this->load->model('M_evs_expected_behavior','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos()->result();

			$data['info_pos_id'] = $tep->Position_ID;

		
				$data['data_from_ce'] = "ACM_edit";
			
	
		// else	
		}

		else if($data['form']->ps_form_ce == "GCM"){
			$this->load->model('M_evs_data_gcm_weight','mdtm');
			$this->mdtm->dtg_evs_emp_id = $employee_data->emp_id;
			$data['check'] = $data['data_gcm_weight'] = $this->mdtm->get_by_empID()->result();
			$check_gcm = sizeof($data['check']);
	

			$tep = $data['emp_info']->row();
			$this->load->model('M_evs_set_form_gcm','mesf');
			$this->mesf->sgc_pos_id = $tep->Position_ID;
			$this->mesf->sgc_pay_id = $pay_id;
			$data['info_gcm_form'] = $this->mesf->get_all_competency_by_indicator()->result();
			$this->load->model('M_evs_expected_behavior_gcm','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos()->result();
			$data['info_pos_id'] = $tep->Position_ID;

			$data['data_from_ce'] = "GCM_edit";		

		}


		$this->output('/consent/ev_form_HD/v_createFROM',$data);

	}
	// function createACM
	function save_group_to_HR(){
    
		$Emp_id = $this->input->post("Emp_id");
		$index = $this->input->post("index");


		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $Emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();
	

		$this->load->model('M_evs_data_approve','mdap');
		for ($i = 0; $i < $index; $i++) {
			$this->mdap->dma_emp_id = $tep->emp_id[$i];
			$this->mdap->dma_status = 4;
			$this->mdap->update_status(); 
		}
		
		$data = "save_group_to_HR";
		echo json_encode($data);
	
	}

}
?>