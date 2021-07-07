<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

class Evs_form_HR extends MainController_avenxo {


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
	

	public function __construct()
    {
    parent::__construct();
	  $this->load->library('excel');
	  date_default_timezone_set("Asia/Bangkok");
    }

	/*
	* table_uesr_goup
	* @input 
	* @output 
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-05
	*/
	function index()
	{
		$this->load->model('M_evs_group','megu');
		$data['data_group'] = $this->megu->get_group_and_name_head_dept()->result();

		$this->output('/consent/ev_form_HR/v_main_goup',$data);
	}




	/*
	* table_uesr_goup
	* @input 
	* @output 
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-05
	*/
	function table_uesr_goup()
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
		
		$this->output('/consent/ev_form_HR/v_main_form',$data);
	}
	// function index()
	
	/*
	* createACM
	* @input emp_id
	* @output infomation employee
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function createFROM($EMP_ID,$Hard_Dep,$group)
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
			$data['data_mhrd'] = $this->memw->get_by_empID()->result();
	
		
			$this->load->model('M_evs_set_form_mhrd','msfm');
				$this->msfm->sfi_pos_id = $tep->Position_ID;
				$data['info_mhrd'] = $this->msfm->get_item_description_by_position()->result();
	
				$data['data_from_pe'] = "MHRD_edit";	
		
	
	
		}


		if($data['form']->ps_form_ce == "ACM"){
	
			$this->load->model('M_evs_data_acm_weight','mdtm');
			$this->mdtm->dta_evs_emp_id = $employee_data->emp_id;
			$data['data_acm_weight'] = $this->mdtm->get_by_empID()->result();
	

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
			$data['data_gcm_weight'] = $this->mdtm->get_by_empID()->result();
			
	

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
		$data['data_hard_dep'] = $Hard_Dep;
		$data['data_focas_group'] = $group;

		$this->output('/consent/ev_form_HR/v_createFROM',$data);

	}
	// function createACM
	
	function table_goup($Emp_ID,$group)
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
		$this->megu->gru_head_dept = $Emp_ID;
		$this->megu->gru_name = $group;
		$emp_data = $data['data_group'] = $this->megu->get_group_by_group_head_dept()->result();


		foreach ($emp_data as $row) {
			if($row->emp_employee_id != $Emp_ID){
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
		$data['data_hard_dep'] = $Emp_ID;
		$data['data_focas_group'] = $group;
		
		$this->output('/consent/ev_form_HR/v_main_form',$data);
	}

	function table_report($Emp_ID,$group)
	{
		$data_chack_form = [];	
		$data_grade = [];
		$check = 0;
		$chack_save = 0;
		$chack_form_save = 0;
		$chack_form_pe ="";
		$chack_form_ce ="";
		$Save_Grade = "";
		$sum = 0;
		$sum_all = 0;
		$sum_max = 0;
		$sum_max_all = 0;
		$sum_percent_pe = 0;
		$sum_percent_ce = 0;
		$sum_percent_all = 0;
		
		
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;


		$this->load->model('M_evs_group','megu');
		$this->megu->emp_pay_id = $pay_id;
		$this->megu->gru_head_dept = $Emp_ID;
		$this->megu->gru_name = $group;
		$emp_data = $data['data_group'] = $this->megu->get_group_by_group_head_dept()->result();


		foreach ($emp_data as $row) {
			if($row->emp_employee_id != $Emp_ID){

			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $row->emp_employee_id;
			$this->memp->emp_pay_id = $pay_id;
			$data['emp_info'] = $this->memp->get_by_empid();

			$tep = $data['emp_info']->row();

			$check = 0;
			$chack_form_pe ="";
			$chack_form_ce ="";


			$this->load->model('M_evs_data_mbo_weight','medw');
			$this->medw->dmw_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_mbo'] = $this->medw->get_by_empID()->result();
			$check += sizeof($data['check']);
		
			if($check  != 0 && $chack_form_pe==""){
				$chack_form_pe ="MBO";
			}

			$this->load->model('M_evs_data_g_and_o_weight','megw');
			$this->megw->dgw_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_g_and_o'] = $this->megw->get_by_empID()->result();
			$check += sizeof($data['check']);

			if($check  != 0 && $chack_form_pe==""){
				$chack_form_pe ="G_and_O";
			}
	
			$this->load->model('M_evs_data_mhrd_weight','memw');
			$this->memw->mhw_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_mhrd'] = $this->memw->get_by_empID()->result();
			$check += sizeof($data['check']);

			if($check  != 0 && $chack_form_pe==""){
				$chack_form_pe ="MHRD";
			}
	
			$this->load->model('M_evs_data_acm_weight','mdtm');
			$this->mdtm->dta_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_acm_weight'] = $this->mdtm->get_by_empID()->result();
			$check += sizeof($data['check']);

			if($check  != 0 && $chack_form_ce==""){
				$chack_form_ce ="ACM";
			}
	
			$this->load->model('M_evs_data_gcm_weight','mdtg');
			$this->mdtg->dtg_evs_emp_id = $tep->emp_id;
			$data['check'] = $data['data_gcm_weight'] = $this->mdtg->get_by_empID()->result();
			$check += sizeof($data['check']);


			if($check  != 0 && $chack_form_ce==""){
				$chack_form_ce ="GCM";
			}

			//-----------------------------------------------------------------------------------


			$sum = 0;
			$sum_all = 0;
			$sum_max = 0;
			$sum_max_all = 0;
			$sum_percent_pe = 0;
			$sum_percent_ce = 0;

			if($chack_form_pe =="MBO"){

				$this->load->model('M_evs_data_mbo_weight','medw');
				$this->medw->dmw_evs_emp_id = $tep->emp_id;
				$data_mbo = $data['data_mbo'] = $this->medw->get_by_empID()->result();
		
				$this->load->model('M_evs_data_mbo','medm');
				$this->medm->dtm_emp_id = $row->emp_employee_id;
				$this->medm->dtm_evs_emp_id = $tep->emp_id;
				$mbo_emp = $data['mbo_emp'] = $this->medm->get_by_empID()->result();

				foreach($mbo_emp as $index => $row) {
					foreach($data_mbo as $row_data_mbo){  
						if($row->dtm_id == $row_data_mbo->dmw_dtm_id){
							$sum = $row->dtm_weight*$row_data_mbo->dmw_weight;
							$sum_max = $row->dtm_weight*5;


							$sum_all += $sum;
							$sum_max_all += $sum_max;
						}
					}
				
				}

				$sum_percent_pe = ($sum_all/$sum_max_all)*100;

				
			}
			else if($chack_form_pe =="G_and_O"){
	
				$this->load->model('M_evs_data_g_and_o_weight','megw');
				$this->megw->dgw_evs_emp_id = $tep->emp_id;
				$data_g_and_o = $data['data_g_and_o'] = $this->megw->get_by_empID()->result();
		
				$this->load->model('M_evs_data_g_and_o','mdgo');
				$this->mdgo->dgo_emp_id = $row->emp_employee_id;
				$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
				$g_o_emp = $data['g_o_emp'] = $this->mdgo->get_by_empID()->result();

				foreach($g_o_emp as $index => $row){
					foreach($data_g_and_o as $row_data_g_and_o){
						if($row->dgo_id == $row_data_g_and_o->dgw_dgo_id){
							$sum = $row->dgo_weight*$row_data_g_and_o->dgw_dgo_id;
							$sum_max = $row->dgo_weight*5;

							$sum_all += $sum;
							$sum_max_all += $sum_max;
						}
					}
				
				}

				$sum_percent_pe = ($sum_all/$sum_max_all)*100;
				
	
			}
			else if($chack_form_pe =="MHRD"){
	
				$this->load->model('M_evs_data_mhrd_weight','memw');
				$this->memw->mhw_evs_emp_id = $tep->emp_id;
				$data_mhrd  = $data['data_mhrd'] = $this->memw->get_by_empID()->result();
		
			
				$this->load->model('M_evs_set_form_mhrd','msfm');
					$this->msfm->sfi_pos_id = $tep->Position_ID;
					$info_mhrd = $data['info_mhrd'] = $this->msfm->get_item_description_by_position()->result();
	
					foreach($info_mhrd as $index => $row){ 
						foreach($data_mhrd as $row_data_mhrd){                                       
							if($row->sfi_id == $row_data_mhrd->mhw_sfi_id){
								$sum = $row_data_mhrd->mhw_weight_1+$row_data_mhrd->mhw_weight_2;
								$sum_max = 3+3;

								$sum_all += $sum;
								$sum_max_all += $sum_max;

							}
						}
					
					}
	
					$sum_percent_pe = ($sum_all/$sum_max_all)*100;
			}


		


			if($chack_form_ce ="ACM"){
				$this->load->model('M_evs_data_acm_weight','mdtm');
				$this->mdtm->dta_evs_emp_id = $tep->emp_id;
				$data_acm_weight = $data['data_acm_weight'] = $this->mdtm->get_by_empID()->result();
		
	
				$this->load->model('M_evs_set_form_ability','mesf');
				$this->mesf->sfa_pos_id = $tep->Position_ID;
				$this->mesf->sfa_pay_id = $pay_id;
				$info_ability_form = $data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator()->result();

				
				foreach($info_ability_form as $row){
					foreach($data_acm_weight as $row_data_acm_weight){
						if($row->sfa_id == $row_data_acm_weight->dta_sfa_id){
							$sum = $row->sfa_weight*$row_data_acm_weight->dta_weight;
							$sum_max = $row->sfa_weight*5;


							$sum_all += $sum;
							$sum_max_all += $sum_max;
						}
					}
				
				}

			
				$sum_percent_ce = ($sum_all/$sum_max_all)*100;

			}
			else if($chack_form_ce ="GCM"){
	
				$this->load->model('M_evs_data_gcm_weight','mdtm');
				$this->mdtm->dtg_evs_emp_id = $tep->emp_id;
				$data_gcm_weight = $data['data_gcm_weight'] = $this->mdtm->get_by_empID()->result();
				
				$tep = $data['emp_info']->row();
				$this->load->model('M_evs_set_form_gcm','mesf');
				$this->mesf->sgc_pos_id = $tep->Position_ID;
				$this->mesf->sgc_pay_id = $pay_id;
				$info_gcm_form = $data['info_gcm_form'] = $this->mesf->get_all_competency_by_indicator()->result();
				

				foreach($info_gcm_form as $row){
					foreach($data_gcm_weight as $row_data_gcm_weight){
							if($row->sgc_id == $row_data_gcm_weight->dtg_sgc_id){
								$sum = $row->sgc_weight*$row_data_acm_weight->dta_weight;
								$sum_max = $row->sgc_weight*5;

								$sum_all += $sum;
								$sum_max_all += $sum_max;
							}
					}
					
				}
				$sum_percent_ce = ($sum_all/$sum_max_all)*100;
				
			}

		}

		if((($sum_percent_pe+$sum_percent_ce/100)) >= 80) {array_push($data_grade,"A");}
		else if ((($sum_percent_pe+$sum_percent_ce/100)) >= 70){array_push($data_grade,"B");}
		else if ((($sum_percent_pe+$sum_percent_ce/200)) >= 60){array_push($data_grade,"C");}
		else if ((($sum_percent_pe+$sum_percent_ce/100)) >= 50){array_push($data_grade,"D");}
		else{array_push($data_grade,"F");}

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
		$data['data_grade'] = $data_grade;

		$data['data_emp_id'] = $_SESSION['UsEmp_ID'];
		$data['data_hard_dep'] = $Emp_ID;
		$data['data_focas_group'] = $group;
		
		$this->output('/consent/ev_form_HR/v_main_report_grade',$data);
	}

	function excel(){
		$this->output('/consent/ev_form_HR/v_main_excel');
	}

	function import()
	{


		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;


		$this->load->model('Da_evs_excel_report','derp');

		$config["upload_path"] = "./excel_report/";
		$config["allowed_types"] = "xls|xlsx";

		$this->load->library("upload",$config);

		


		if($this->upload->do_upload("file")){
				$upload_data = $this->upload->data();
				$this->derp->erp_excel_name = $upload_data["file_name"];
				$this->derp->erp_pay_id = $pay_id;
				$this->derp->insert();

		}else{
				print_r($this->upload->display_errors());

		}

		$this->load->model('M_evs_employee','memp');
		$this->load->model('M_evs_set_form_mhrd','msmd');
		$this->load->model('Da_evs_data_mhrd_weight','ddmw');

		
		if(isset($_FILES["file"]["name"]))
		{

			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				
				for($row=2; $row<=$highestRow; $row++)
				{
					
					$this->memp->Emp_ID = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$this->memp->emp_pay_id = $pay_id;
					$data['emp_info'] = $this->memp->get_by_empid();
			
					$tep = $data['emp_info']->row();

					$mhw_evs_emp_id = $tep->emp_id;

					$this->msmd->sfi_pos_id = $tep->emp_position_id;
					$this->msmd->sfi_pay_id = $pay_id;
					$this->msmd->sfi_excel_import = 1;
					$ps_data  = $this->msmd->get_all_by_key_by_year_and_satatus()->result();
					foreach($ps_data as $index => $row_ps) {
						
						$mhw_sfi_id = $row_ps->sfi_id;
						$mhw_weight_1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$mhw_weight_2 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$mhw_approver = $_SESSION['UsEmp_ID'];
						
						$this->ddmw->mhw_evs_emp_id = $mhw_evs_emp_id;
						$this->ddmw->mhw_sfi_id  = $mhw_sfi_id;
						$this->ddmw->mhw_weight_1 = $mhw_weight_1;
						$this->ddmw->mhw_weight_2 = $mhw_weight_2;
						$this->ddmw->mhw_approver = $mhw_approver;

						$this->ddmw->insert();
					}
					
				}
			}
			echo json_encode("import successfully");
		}	
	}


	function save_grade(){

		$emp_id = $this->input->post("Emp_ID");
		$arr_roop = count($emp_id);

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;


		$this->load->model('M_evs_data_approve','mdap');
		$this->load->model('Da_evs_data_grade','ddgr');
		for($i = 0 ; $i < $arr_roop ; $i++){
			$this->ddgr->dgr_grade = $this->input->post("grade[".$i."]");
			$this->ddgr->dgr_comment = $this->input->post("comment[".$i."]");
			$this->ddgr->dgr_emp_id = $this->input->post("Emp_ID[".$i."]");
			$this->ddgr->dgr_satatus = 4;
			$this->ddgr->dgr_pay_id = $pay_id;
			$this->ddgr->insert();
			
			$this->mdap->dma_dtm_emp_id = $this->input->post("Emp_ID[".$i."]");
			$this->mdap->dma_status = 5;
			$this->mdap->update_status(); 
		}
		// for
		
		$data = "save_data_acm_weight";
		echo json_encode($data);

	}




	
	function save_data_acm_weight(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sfa_id = $this->input->post("arr_sfa_id");
		$arr_radio = $this->input->post("arr_radio");
		$App = $this->input->post("App");
		$arr_roop = count($arr_sfa_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_acm_weight','deda');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->deda->dta_evs_emp_id = $ps_pos_id;
		$this->deda->dta_sfa_id = $arr_sfa_id[$i];
		$this->deda->dta_weight = $arr_radio[$i];
		$this->deda->dta_approver = $App;
		$this->deda->insert();
		}
		// for

		$data = "save_data_acm_weight";
		echo json_encode($data);		
	}
	// function get_tap_form

	function update_data_acm_weight(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sfa_id = $this->input->post("arr_sfa_id");
		$arr_radio = $this->input->post("arr_radio");
		$App = $this->input->post("App");
		$arr_roop = count($arr_sfa_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_acm_weight','deda');
		for($i = 0 ; $i < $arr_roop ; $i++){
		$this->deda->dta_evs_emp_id = $ps_pos_id;
		$this->deda->dta_sfa_id = $arr_sfa_id[$i];
		$this->deda->dta_weight = $arr_radio[$i];
		$this->deda->dta_approver = $App;
		$this->deda->insert();
		}
		// for

		$data = "update_data_acm_weight";
		echo json_encode($data);		
	}

//-------------------------------------------------
	function save_data_gcm_weight(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sgc_id = $this->input->post("arr_sgc_id");
		$arr_radio = $this->input->post("arr_radio");
		$App = $this->input->post("App");
		$arr_roop = count($arr_sgc_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_gcm_weight','dedg');
		for($i = 0 ; $i < $arr_roop ; $i++){
			$this->dedg->dtg_evs_emp_id = $ps_pos_id;
			$this->dedg->dtg_sgc_id = $arr_sgc_id[$i];
			$this->dedg->dtg_weight = $arr_radio[$i];
			$this->dedg->dtg_approver = $App;
			$this->dedg->insert();
		}
		// for

		$data = "save_data_gcm_weight";
		echo json_encode($data);		
	}
	// function get_tap_form

	function update_data_gcm_weight(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_sgc_id = $this->input->post("arr_sgc_id");
		$arr_radio = $this->input->post("arr_radio");
		$App = $this->input->post("App");
		$arr_roop = count($arr_sgc_id);
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('Da_evs_data_gcm_weight','dedg');
		for($i = 0 ; $i < $arr_roop ; $i++){
			$this->dedg->dtg_evs_emp_id = $ps_pos_id;
			$this->dedg->dtg_sgc_id = $arr_sgc_id[$i];
			$this->dedg->dtg_weight = $arr_radio[$i];
			$this->dedg->dtg_approver = $App;
			$this->dedg->insert();
		}
		// for

		$data = "update_data_gcm_weight";
		echo json_encode($data);		
	}
	//-------------------------------------------------------------------------------------------------------

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
		$App = $this->input->post("App");
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
			$this->dedw->dmw_approver = $App;
			$this->dedw->insert();
		}
		// for 

		$data = "save_data_mbo";
		echo json_encode($data);		
	}
	// function get_tap_form

	function update_data_mbo(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_dtm_id = $this->input->post("arr_dtm_id");
		$arr_radio = $this->input->post("arr_radio");
		$App = $this->input->post("App");
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
			$this->dedw->dmw_approver = $App;
			$this->dedw->insert();
		}
		// for 

		$data = "update_data_mbo";
		echo json_encode($data);		
	}

	//---------------------------------------------------------------------------------------------------------------------

	function save_data_g_and_o(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_dgo_id = $this->input->post("arr_dgo_id");
		$arr_radio = $this->input->post("arr_radio");
		$arr_Evaluator_Review = $this->input->post("arr_Evaluator_Review");
		$App = $this->input->post("App");
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
			$this->degw->dgw_approver = $App;
			$this->degw->insert();
		}
		// for

		$data = "save_data_g_and_o";
		echo json_encode($data);		
	}
	function update_data_g_and_o(){

		$ps_pos_id = $this->input->post("Emp_ID");
		$arr_dgo_id = $this->input->post("arr_dgo_id");
		$arr_radio = $this->input->post("arr_radio");
		$App = $this->input->post("App");
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
			$this->degw->dgw_approver = $App;
			$this->degw->insert();
		}
		// for

		$data = "update_data_g_and_o";
		echo json_encode($data);		
	}
		//------------------------------------------------------------------------------------------------------------
	
		function save_mhrd(){

			$ps_pos_id = $this->input->post("Emp_ID");
			$arr_sfi_id = $this->input->post("arr_sfi_id");
			$arr_radio_1 = $this->input->post("arr_radio_1");
			$arr_radio_2 = $this->input->post("arr_radio_2");
			$App = $this->input->post("App");
		
			$arr_roop = count($arr_sfi_id);
			//string set year now
			$this->load->model('M_evs_pattern_and_year','myear');
			$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
			$year = $data['patt_year']->row(); // show value year now
			//end set year now
			$pay_id = $year->pay_id;
	
			$this->load->model('Da_evs_data_mhrd_weight','demw');
			for($i = 0 ; $i < $arr_roop ; $i++){
				$this->demw->mhw_evs_emp_id = $ps_pos_id;
				$this->demw->mhw_sfi_id = $arr_sfi_id[$i];
				$this->demw->mhw_weight_1 = $arr_radio_1[$i];
				$this->demw->mhw_weight_2 = $arr_radio_2[$i];
				$this->demw->mhw_approver = $App;
				$this->demw->insert();
			}
			// for 
	
			$data = "save_data_mhrd";
			echo json_encode($data);		
		}
		// save_mhrd
		
		function update_mhrd(){

			$ps_pos_id = $this->input->post("Emp_ID");
			$arr_sfi_id = $this->input->post("arr_sfi_id");
			$arr_radio_1 = $this->input->post("arr_radio_1");
			$arr_radio_2 = $this->input->post("arr_radio_2");
			$App = $this->input->post("App");
		
			$arr_roop = count($arr_sfi_id);
			//string set year now
			$this->load->model('M_evs_pattern_and_year','myear');
			$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
			$year = $data['patt_year']->row(); // show value year now
			//end set year now
			$pay_id = $year->pay_id;
	
			$this->load->model('Da_evs_data_mhrd_weight','demw');
			for($i = 0 ; $i < $arr_roop ; $i++){
				$this->demw->mhw_evs_emp_id = $ps_pos_id;
				$this->demw->mhw_sfi_id = $arr_sfi_id[$i];
				$this->demw->mhw_weight_1 = $arr_radio_1[$i];
				$this->demw->mhw_weight_2 = $arr_radio_2[$i];
				$this->demw->mhw_approver = $App;
				$this->demw->insert();
			}
			// for 
	
			$data = "update_data_mhrd";
			echo json_encode($data);		
		}
		// update_mhrd

		



}
?>