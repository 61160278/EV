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
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $tep->Position_ID;
		$this->mpf->ps_pay_id = $pay_id;
		$data['form'] = $this->mpf->get_all_by_key_by_year()->row();
		
		if(sizeof($data['form']) != 0){
		
		if($data['form']->ps_form_pe == "MBO"){
			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $emp_id;
			$this->medm->dtm_evs_emp_id = $tep->emp_id;
			$data['check'] = $this->medm->get_by_empID()->result();
			$check = sizeof($data['check']);
			
			if($check != 0){
				$this->load->model('M_evs_data_mbo','medm');
				$this->medm->dtm_emp_id = $emp_id;
				$this->medm->dtm_evs_emp_id = $tep->emp_id;
				$data['mbo_emp'] = $this->medm->get_by_empID()->result();

				if($data['form']->ps_form_ce == "ACM"){
					$this->load->model('M_evs_set_form_ability','mesf');
					$this->mesf->sfa_pos_id = $tep->Position_ID;
					$this->mesf->sfa_pay_id = $pay_id;
					$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior','mept');
					$data['info_expected'] = $this->mept->get_all_by_pos();
					$data['info_pos_id'] = $tep->Position_ID;

				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior_gcm','mebg');
					$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
					$data['info_pos_id_gcm'] = $tep->Position_ID;
	
				}
				// else if GCM
				$this->output('/consent/ev_form/v_editMBO',$data);
			}
			// if

			else{
				if($data['form']->ps_form_ce == "ACM"){
					$this->load->model('M_evs_set_form_ability','mesf');
					$this->mesf->sfa_pos_id = $tep->Position_ID;
					$this->mesf->sfa_pay_id = $pay_id;
					$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior','mept');
					$data['info_expected'] = $this->mept->get_all_by_pos();
					$data['info_pos_id'] = $tep->Position_ID;
	
				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior_gcm','mebg');
					$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
					$data['info_pos_id_gcm'] = $tep->Position_ID;
	
				}
				// else if GCM

				$this->output('/consent/ev_form/v_createMBO',$data);
			}
			// else	
		}
		// if mbo 
		
		else if($data['form']->ps_form_pe == "G&O"){
			$this->load->model('M_evs_data_g_and_o','mdgo');
			$this->mdgo->dgo_emp_id = $emp_id;
			$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
			$data['check'] = $this->mdgo->get_by_empID()->result();

			$check = sizeof($data['check']);

			if($check != 0){

				$this->load->model('M_evs_data_g_and_o','mdgo');
				$this->mdgo->dgo_emp_id = $emp_id;
				$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
				$data['g_o_emp'] = $this->mdgo->get_by_empID()->result();

				if($data['form']->ps_form_ce == "ACM"){
					$this->load->model('M_evs_set_form_ability','mesf');
					$this->mesf->sfa_pos_id = $tep->Position_ID;
					$this->mesf->sfa_pay_id = $pay_id;
					$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior','mept');
					$data['info_expected'] = $this->mept->get_all_by_pos();
					$data['info_pos_id'] = $tep->Position_ID;

				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior_gcm','mebg');
					$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
					$data['info_pos_id_gcm'] = $tep->Position_ID;

				}
				// else if GCM
				
				$this->load->model('M_evs_set_form_g_and_o','mesg');
				$this->mesg->sfg_pay_id = $pay_id;
				$this->mesg->sfg_pos_id = $tep->Position_ID;
				$data['row_index'] = $this->mesg->get_all_by_key_by_year()->row();

				$this->output('/consent/ev_form/v_editMBO',$data);
			}
			// if

			else{
				if($data['form']->ps_form_ce == "ACM"){
					$this->load->model('M_evs_set_form_ability','mesf');
					$this->mesf->sfa_pos_id = $tep->Position_ID;
					$this->mesf->sfa_pay_id = $pay_id;
					$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior','mept');
					$data['info_expected'] = $this->mept->get_all_by_pos();
					$data['info_pos_id'] = $tep->Position_ID;

				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior_gcm','mebg');
					$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
					$data['info_pos_id_gcm'] = $tep->Position_ID;
	
				}
				// else if GCM
				$this->output('/consent/ev_form/v_createMBO',$data);
			}
			// else	
			

		}
		// else if G&O

		else if($data['form']->ps_form_pe == "MHRD"){
			$this->load->model('M_evs_set_form_mhrd','msfm');
			$this->msfm->sfi_pos_id = $tep->Position_ID;
			$data['info_mhrd'] = $this->msfm->get_item_description_by_position();

			if($data['form']->ps_form_ce == "ACM"){
				$this->load->model('M_evs_set_form_ability','mesf');
				$this->mesf->sfa_pos_id = $tep->Position_ID;
				$this->mesf->sfa_pay_id = $pay_id;
				$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
				$this->load->model('M_evs_expected_behavior','mept');
				$data['info_expected'] = $this->mept->get_all_by_pos();
				$data['info_pos_id'] = $tep->Position_ID;

			}
			// if ACM
			else if($data['form']->ps_form_ce == "GCM"){
				$this->load->model('M_evs_set_form_gcm','msfg');
				$this->msfg->sgc_pos_id = $tep->Position_ID;
				$this->msfg->sgc_pay_id = $pay_id;
				$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
				$this->load->model('M_evs_expected_behavior_gcm','mebg');
				$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
				$data['info_pos_id_gcm'] = $tep->Position_ID;

			}
			// else if GCM

			$this->output('/consent/ev_form/v_createMBO',$data);
			
		}
		// else if MHRD

	}
	// if main
	else{
		$this->output('/consent/ev_form/v_main_form');
	}
	// else main 

	}
	// function createMBO

	function get_tap_form(){

		$ps_pos_id = $this->input->post("ps_pos_id");
		$pay_id = $_SESSION['Uspay_id'];;

		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $ps_pos_id;
		$this->mpf->ps_pay_id = $pay_id;
		$data = $this->mpf->get_all_by_key_by_year()->result();

		echo json_encode($data);		
	}
	// function get_tap_form
	
	function get_mbo_by_pos(){

		$pay_id = $_SESSION['Uspay_id'];;
		$pos = $this->input->post("pos");
		$this->load->model('M_evs_set_form_mbo','mesf');
		$this->mesf->sfm_pay_id = $pay_id;
		$this->mesf->sfm_pos_id = $pos;
		$data = $this->mesf->get_all_by_key_by_year()->row();
		
		echo json_encode($data);
	}
	// function get_mbo_by_pos

	function get_G_O_by_pos(){
		
		$pay_id = $_SESSION['Uspay_id'];;
		$pos = $this->input->post("pos");
		$this->load->model('M_evs_set_form_g_and_o','mesg');
		$this->mesg->sfg_pay_id = $pay_id;
		$this->mesg->sfg_pos_id = $pos;
		$data = $this->mesg->get_all_by_key_by_year()->row();
		
		echo json_encode($data);
	}
	// function get_G_O_by_pos

	function save_G_O_by_emp(){

		$Emp_ID = $this->input->post("check_emp_id");
		$evs_emp_id = $this->input->post("evs_emp_id");
		$type = $this->input->post("type");
		$sdgs = $this->input->post("sdgs");
		$item = $this->input->post("item");
		$weight = $this->input->post("weight");
		$self = $this->input->post("self");
		$number_index = $this->input->post("number_index");

		$this->load->model('Da_evs_data_g_and_o','ddgo');

		for($i=0; $i<$number_index; $i++){
			$this->ddgo->dgo_type = $type[$i];
			$this->ddgo->dgo_sdgs = $sdgs[$i];
			$this->ddgo->dgo_item = $item[$i];
			$this->ddgo->dgo_weight = $weight[$i];
			$this->ddgo->dgo_self_review = $self[$i];
			$this->ddgo->dgo_emp_id = $Emp_ID;
			$this->ddgo->dgo_evs_emp_id = $evs_emp_id;
			$this->ddgo->insert();
		}
		// for

		$this->load->model('M_evs_data_g_and_o','mdgo');
		$this->mdgo->dgo_evs_emp_id = $evs_emp_id;
		$data = $this->mdgo->get_to_insert()->result();
		echo json_encode($data);
	}
	// function save_G_O_by_emp

	function save_G_O_level_by_emp(){
		$dgo_data = $this->input->post("dgo_data");
		$data_level = $this->input->post("data_level");
		 
		$this->load->model('Da_evs_data_g_and_o_level','ddgol');

		for($j=0; $j < sizeof($data_level); $j++){
			for($k=0; $k < sizeof($data_level[$j]); $k++){
				$this->ddgol->dgol_level = $data_level[$j][$k];
				$this->ddgol->dgol_dgo_id = $dgo_data[$j];
				$this->ddgol->insert();
			}
			// for k
		}
		// for j
		
	}
	// function save_G_O_level_by_emp

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
		$sdgMBO = $this->input->post("sdgMBO");
		$dataMBO = $this->input->post("dataMBO");
		$resultMBO = $this->input->post("resultMBO");
		$Emp_ID = $this->input->post("Emp_ID");
		$emp_employee_id = $this->input->post("evs_emp_id");
		$count = $this->input->post("count");

		$this->load->model('Da_evs_data_mbo','dedm');
		
		for($i=0; $i<$count; $i++){
			$this->dedm->dtm_id = $idMBO[$i];
			$this->dedm->dtm_sdg = $sdgMBO[$i];
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

		$this->load->model('Da_evs_data_approve','deda');
		$this->deda->dma_approve1 = $approve1;
		$this->deda->dma_approve2 = $approve2;

		if($approve1 == 0){
			$this->deda->dma_status = 2;
		}
		// if
		else{
			$this->deda->dma_status = 1;
		}
		// else
		
		$this->deda->dma_dtm_emp_id = $Emp_ID;
		$this->deda->dma_emp_id = $emp_employee_id;
		$this->deda->insert();

		$this->load->model('M_evs_data_approve','meda');
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

		$this->load->model('Da_evs_data_approve','deda');
		$this->deda->dma_approve1 = $approve1;
		$this->deda->dma_approve2 = $approve2;

		if($approve1 == 0){
			$this->deda->dma_status = 2;
		}
		// if
		else{
			$this->deda->dma_status = 1;
		}
		// else

		$this->deda->dma_dtm_emp_id = $Emp_id;
		$this->deda->dma_emp_id = $emp_employee_id;
		$this->deda->update();

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_emp_id = $emp_employee_id;
		$data['data_app'] = $this->meda->get_by_id()->row();

		echo json_encode($data);
	}
	// function save_approve

	function get_approve(){

		$evs_emp_id = $this->input->post("evs_emp_id");

		$this->load->model('M_evs_data_approve','meda');
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
		$pay_id = $_SESSION['Uspay_id'];;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id_edit;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $emp_id_edit;
		$this->medm->dtm_evs_emp_id = $tep->emp_id;
		$data['mbo_emp'] = $this->medm->get_by_empID()->result();

		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $tep->Position_ID;
		$this->mpf->ps_pay_id = $pay_id;
		$data['form'] = $this->mpf->get_all_by_key_by_year()->row();

		if($data['form']->ps_form_ce == "ACM"){
			$this->load->model('M_evs_set_form_ability','mesf');
			$this->mesf->sfa_pos_id = $tep->Position_ID;
			$this->mesf->sfa_pay_id = $pay_id;
			$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
			$this->load->model('M_evs_expected_behavior','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos();
			$data['info_pos_id'] = $tep->Position_ID;

		}
		// if ACM
		else if($data['form']->ps_form_ce == "GCM"){
			$this->load->model('M_evs_set_form_gcm','msfg');
			$this->msfg->sgc_pos_id = $tep->Position_ID;
			$this->msfg->sgc_pay_id = $pay_id;
			$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
			$this->load->model('M_evs_expected_behavior_gcm','mebg');
			$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
			$data['info_pos_id_gcm'] = $tep->Position_ID;

		}
		// else if GCM	
		
		$this->output('/consent/ev_form/v_editMBO',$data);

	}
	// function edit_mbo($emp_id_edit)

	function get_mbo_to_edit(){

		$dtm_emp_id = $this->input->post("dtm_emp_id");
		$pay_id = $_SESSION['Uspay_id'];;
		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $dtm_emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $dtm_emp_id;
		$this->medm->dtm_evs_emp_id = $tep->emp_id;
		$data = $this->medm->get_by_empID()->result();

		echo json_encode($data);
	}
	// function get_mbo_to_edit

	function edit_g_o($emp_id_edit){
		$pay_id = 2;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id_edit;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_data_g_and_o','mdgo');
		$this->mdgo->dgo_emp_id = $emp_id_edit;
		$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
		$data['g_o_emp'] = $this->mdgo->get_by_empID()->result();

		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $tep->Position_ID;
		$this->mpf->ps_pay_id = $pay_id;
		$data['form'] = $this->mpf->get_all_by_key_by_year()->row();

		if($data['form']->ps_form_ce == "ACM"){
			$this->load->model('M_evs_set_form_ability','mesf');
			$this->mesf->sfa_pos_id = $tep->Position_ID;
			$this->mesf->sfa_pay_id = $pay_id;
			$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
			$this->load->model('M_evs_expected_behavior','mept');
			$data['info_expected'] = $this->mept->get_all_by_pos();
			$data['info_pos_id'] = $tep->Position_ID;

		}
		// if ACM
		else if($data['form']->ps_form_ce == "GCM"){
			$this->load->model('M_evs_set_form_gcm','msfg');
			$this->msfg->sgc_pos_id = $tep->Position_ID;
			$this->msfg->sgc_pay_id = $pay_id;
			$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
			$this->load->model('M_evs_expected_behavior_gcm','mebg');
			$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
			$data['info_pos_id_gcm'] = $tep->Position_ID;

		}
		// else if GCM

		$this->load->model('M_evs_set_form_g_and_o','mesg');
		$this->mesg->sfg_pay_id = $pay_id;
		$this->mesg->sfg_pos_id = $tep->Position_ID;
		$data['row_index'] = $this->mesg->get_all_by_key_by_year()->row();

		$this->output('/consent/ev_form/v_editMBO',$data);

	}
	// function edit_g_o($emp_id_edit)

	function get_g_o_edit(){
		$pay_id = $_SESSION['Uspay_id'];;

		$dgo_emp_id = $this->input->post("dgo_emp_id");

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $dgo_emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_data_g_and_o','mdgo');
		$this->mdgo->dgo_emp_id = $dgo_emp_id;
		$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
		$data = $this->mdgo->get_by_empID()->result();

		echo json_encode($data);

	}
	// function get_g_o_edit

	function update_G_O(){
		$row_count = $this->input->post("row_count");
		$dgo_id = $this->input->post("dgo_id");
		$type = $this->input->post("type");
		$sdgs = $this->input->post("sdgs");
		$item = $this->input->post("item");
		$weight = $this->input->post("weight");
		$self = $this->input->post("self");
		$check_emp_id = $this->input->post("check_emp_id");
		$evs_emp_id = $this->input->post("evs_emp_id");
		
		$this->load->model('Da_evs_data_g_and_o','ddgo');

		for ($i = 0; $i < $row_count; $i++) {
			$this->ddgo->dgo_type = $type[$i];
			$this->ddgo->dgo_sdgs = $sdgs[$i];
			$this->ddgo->dgo_item = $item[$i];
			$this->ddgo->dgo_weight = $weight[$i];
			$this->ddgo->dgo_self_review = $self[$i];
			$this->ddgo->dgo_emp_id = $check_emp_id;
			$this->ddgo->dgo_evs_emp_id = $evs_emp_id;
			$this->ddgo->dgo_id = $dgo_id[$i];
			$this->ddgo->update();
		}
		// for 

	}
	// function update_G_O

	function update_G_O_level(){
		$row_count_level = $this->input->post("row_count_level");
		$dgol_id = $this->input->post("dgol_id");
		$level = $this->input->post("level");

		$this->load->model('Da_evs_data_g_and_o_level','ddgol');

		for ($i = 1; $i <= $row_count_level; $i++) {
			$this->ddgol->dgol_level = $level[$i];
			$this->ddgol->dgol_id = $dgol_id[$i];
			$this->ddgol->update();
		}
		// for

	}
	// function update_G_O_level

	function save_approveG_O(){

		$approve1 = $this->input->post("approve1");
		$approve2 = $this->input->post("approve2");
		$emp_employee_id = $this->input->post("evs_emp_id");
		$Emp_ID = $this->input->post("dma_emp_id");

		$this->load->model('Da_evs_data_approve','deda');
		$this->deda->dma_approve1 = $approve1;
		$this->deda->dma_approve2 = $approve2;

		if($approve1 == 0){
			$this->deda->dma_status = 2;
		}
		// if
		else{
			$this->deda->dma_status = 1;
		}
		// else

		$this->deda->dma_dtm_emp_id = $Emp_ID;
		$this->deda->dma_emp_id = $emp_employee_id;
		$this->deda->insert();

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_emp_id = $emp_employee_id;
		$data['data_app'] = $this->meda->get_by_id()->row();

		echo json_encode($data);
	}
	// function save_approveG_O

	function update_approveG_O(){

		$approve1 = $this->input->post("approve1");
		$approve2 = $this->input->post("approve2");
		$emp_employee_id = $this->input->post("evs_emp_id");
		$Emp_id = $this->input->post("dma_emp_id");

		$this->load->model('Da_evs_data_approve','deda');
		$this->deda->dma_approve1 = $approve1;
		$this->deda->dma_approve2 = $approve2;
		if($approve1 == 0){
			$this->deda->dma_status = 2;
		}
		// if
		else{
			$this->deda->dma_status = 1;
		}
		// else
		$this->deda->dma_dtm_emp_id = $Emp_id;
		$this->deda->dma_emp_id = $emp_employee_id;
		$this->deda->update();

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_emp_id = $emp_employee_id;
		$data['data_app'] = $this->meda->get_by_id()->row();

		echo json_encode($data);
	}
	// function update_approveG_O

	function get_approveG_O(){

		$evs_emp_id = $this->input->post("evs_emp_id");

		$this->load->model('M_evs_data_approve','meda');
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

	function historyMBO()
	{
		$emp_id = $this->input->post("emp_id_his");
		$pay_id = $_SESSION['Uspay_id'];;
		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		$status = [];
		$temp = $data['emp_info']->row();

		$this->load->model('M_evs_position_from','mepf');
		$this->mepf->ps_pos_id = $temp->Position_ID;
		$data['get_form'] = $this->mepf->get_form_by_pos()->result();

		$this->load->model('M_evs_employee','memp');
		$this->memp->dma_dtm_emp_id = $emp_id;
		$data['data_his'] = $this->memp->get_his_by_id()->result();

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		$tep = $data['emp_info']->row();

		foreach($data['get_form'] as $row){
			if($row->ps_form_pe == "MBO"){
				$this->load->model('M_evs_data_mbo','medm');
				$this->medm->dtm_emp_id = $emp_id;
				$this->medm->dtm_evs_emp_id = $tep->emp_id;
				$data['check'] = $this->medm->get_by_empID()->result();
				$check = sizeof($data['check']);
				
				if($check != 0){
					array_push($status,1);
				}
				// if
				else{
					array_push($status,0);
				}
				// else 
			}
			// if mbo

			else if($row->ps_form_pe == "G&O"){
				$this->load->model('M_evs_data_g_and_o','mdgo');
				$this->mdgo->dgo_emp_id = $emp_id;
				$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
				$data['check'] = $this->mdgo->get_by_empID()->result();
	
				$check = sizeof($data['check']);
				if($check != 0){
					array_push($status,1);
				}
				// if
				else{
					array_push($status,0);
				}
				// else 
			}
			// else if G&O

			else if($row->ps_form_pe == "MHRD"){
				$this->load->model('M_evs_set_form_mhrd','msfm');
				$this->msfm->sfi_pos_id = $tep->Position_ID;
				$data['info_mhrd'] = $this->msfm->get_item_description_by_position();
	
				$check = sizeof($data['info_mhrd']);
				if($check != 0){
					array_push($status,1);
				}
				// if
				else{
					array_push($status,0);
				}
				// else 
			}
			// else if MHRD
		}
		// foreach 

		$data['status_form'] = $status;

		$this->output('/consent/ev_form/v_historyMBO',$data);
	}
	// function createMBO

	function get_approve_his(){

		$app_emp = $this->input->post("app_emp");
		$pay_id = $_SESSION['Uspay_id'];;
		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $app_emp;
		$this->memp->emp_pay_id = $pay_id;
		$data = $this->memp->get_by_empid()->result();
		echo json_encode($data);

	}
	// function get_approve_his

	function show_his($data_sent){

		$emp_id = substr($data_sent,0,strpos($data_sent,":"));
		$pay_id = substr($data_sent,strpos($data_sent,":")+1);

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();
		$tep = $data['emp_info']->row();

		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $tep->Position_ID;
		$this->mpf->ps_pay_id = $pay_id;
		$data['form'] = $this->mpf->get_all_by_key_by_year()->row();
		
		if($data['form']->ps_form_pe == "MBO"){
			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $emp_id;
			$this->medm->dtm_evs_emp_id = $tep->emp_id;
			$data['check'] = $this->medm->get_by_empID()->result();
			$check = sizeof($data['check']);
			
			if($check != 0){
				$this->load->model('M_evs_data_mbo','medm');
				$this->medm->dtm_emp_id = $emp_id;
				$this->medm->dtm_evs_emp_id = $tep->emp_id;
				$data['mbo_emp'] = $this->medm->get_by_empID()->result();

				if($data['form']->ps_form_ce == "ACM"){
					$this->load->model('M_evs_set_form_ability','mesf');
					$this->mesf->sfa_pos_id = $tep->Position_ID;
					$this->mesf->sfa_pay_id = $pay_id;
					$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior','mept');
					$data['info_expected'] = $this->mept->get_all_by_pos();
					$data['info_pos_id'] = $tep->Position_ID;

				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior_gcm','mebg');
					$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
					$data['info_pos_id_gcm'] = $tep->Position_ID;

	
				}
				// else if GCM
				$this->output('/consent/ev_form/v_hisMBO',$data);
			}
			// if
		}
		// if mbo 
		
		else if($data['form']->ps_form_pe == "G&O"){
			$this->load->model('M_evs_data_g_and_o','mdgo');
			$this->mdgo->dgo_emp_id = $emp_id;
			$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
			$data['check'] = $this->mdgo->get_by_empID()->result();

			$check = sizeof($data['check']);

			if($check != 0){

				$this->load->model('M_evs_data_g_and_o','mdgo');
				$this->mdgo->dgo_emp_id = $emp_id;
				$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
				$data['g_o_emp'] = $this->mdgo->get_by_empID()->result();

				if($data['form']->ps_form_ce == "ACM"){
					$this->load->model('M_evs_set_form_ability','mesf');
					$this->mesf->sfa_pos_id = $tep->Position_ID;
					$this->mesf->sfa_pay_id = $pay_id;
					$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior','mept');
					$data['info_expected'] = $this->mept->get_all_by_pos();
					$data['info_pos_id'] = $tep->Position_ID;

				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
					$this->load->model('M_evs_expected_behavior_gcm','mebg');
					$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
					$data['info_pos_id_gcm'] = $tep->Position_ID;
	
				}
				// else if GCM
				
				$this->load->model('M_evs_set_form_g_and_o','mesg');
				$this->mesg->sfg_pay_id = $pay_id;
				$this->mesg->sfg_pos_id = $tep->Position_ID;
				$data['row_index'] = $this->mesg->get_all_by_key_by_year()->row();

				$this->output('/consent/ev_form/v_hisMBO',$data);
			}
			// if
		}
		// else if G&O
		else if($data['form']->ps_form_pe == "MHRD"){
			$this->load->model('M_evs_set_form_mhrd','msfm');
			$this->msfm->sfi_pos_id = $tep->Position_ID;
			$data['info_mhrd'] = $this->msfm->get_item_description_by_position();

			$check = sizeof($data['info_mhrd']);
			if($check != 0){
			if($data['form']->ps_form_ce == "ACM"){
				$this->load->model('M_evs_set_form_ability','mesf');
				$this->mesf->sfa_pos_id = $tep->Position_ID;
				$this->mesf->sfa_pay_id = $pay_id;
				$data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator();
				$this->load->model('M_evs_expected_behavior','mept');
				$data['info_expected'] = $this->mept->get_all_by_pos();
				$data['info_pos_id'] = $tep->Position_ID;

			}
			// if ACM
			else if($data['form']->ps_form_ce == "GCM"){
				$this->load->model('M_evs_set_form_gcm','msfg');
				$this->msfg->sgc_pos_id = $tep->Position_ID;
				$this->msfg->sgc_pay_id = $pay_id;
				$data['info_form_gcm'] = $this->msfg->get_all_competency_by_indicator();
				$this->load->model('M_evs_expected_behavior_gcm','mebg');
				$data['info_expected_gcm'] = $this->mebg->get_all_by_pos();
				$data['info_pos_id_gcm'] = $tep->Position_ID;
			}
			// else if GCM

			$this->output('/consent/ev_form/v_hisMBO',$data);
		}
		// if
		}
		// else if MHRD

		
	}
	// function show_mbo_his

	function show_ststus(){

		$emp_id = $_SESSION['UsEmp_ID'];
		$pay_id = $_SESSION['Uspay_id'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info'] = $this->memp->get_by_empid();

		$temp = $data['emp_info']->row();

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_emp_id = $temp->emp_id;
		$data['data_app'] = $this->meda->get_by_id()->row();
		if(sizeof($data['data_app']) != 0){
			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $data['data_app']->dma_approve1;
			$data['app1'] = $this->memp->get_by_appid()->row();
	
			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $data['data_app']->dma_approve2;
			$data['app2'] = $this->memp->get_by_appid()->row();
	
		}
		// if 		
		$this->output('/consent/ev_form/v_show_status',$data);

	}
	// function show_ststus
}
?>