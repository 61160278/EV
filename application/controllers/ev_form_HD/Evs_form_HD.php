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
	function index(){
		$comment = [];
		$status = [];
		$data_chack_form = [];
		$data_chack_form_com = [];	
		$check = 0;
		$chack_save = 0;
		$check_com = 0;
		$chack_save_com = 0;
		$chack_form_save = 0;
		$reject_ro_report = 0;
		$data_grade = [];
		$chack_form_pe ="";
		$chack_form_ce ="";
		$Save_Grade = "";
		$chack_save_button = "";
		$sum = 0;
		$sum_all = 0;
		$sum_max = 0;
		$sum_max_all = 0;
		$sum_percent_pe = 0;
		$sum_percent_ce = 0;
		$sum_percent_all = 0;
		$dep = [];
		
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_group','megu');
		$this->megu->emp_pay_id = $pay_id;
		$this->megu->gru_head_dept = $_SESSION['UsEmp_ID'];
		$data['data_group'] = $this->megu->get_group_by_head_dept()->result();
		$emp_data = $data['data_group'];

		if(sizeof($emp_data) != 0){
			foreach ($emp_data as $row) {
				if($row->emp_employee_id != $_SESSION['UsEmp_ID']){
				$this->load->model('M_evs_employee','memp');
				$this->memp->Emp_ID = $row->emp_employee_id;
				$this->memp->emp_pay_id = $pay_id;
				$data['emp_info'] = $this->memp->get_by_empid();

				$tep = $data['emp_info']->row();
				$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
				array_push($dep,$data[$row->Emp_ID."_dep"]);

				$check = 0;
				$check_com = 0;
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

				$this->load->model('M_evs_data_mbo_weight','medw');
				$this->medw->dmw_evs_emp_id = $tep->emp_id;
				$this->medw->dmw_approver = $_SESSION['UsEmp_ID'];
				$data['check_com'] = $data['data_mbo'] = $this->medw->get_by_empID_app()->result();
				$check_com += sizeof($data['check_com']);
		
				$this->load->model('M_evs_data_g_and_o_weight','megw');
				$this->megw->dgw_evs_emp_id = $tep->emp_id;
				$this->megw->dgw_approver = $_SESSION['UsEmp_ID'];
				$data['check_com'] = $data['data_g_and_o'] = $this->megw->get_by_empID_app()->result();
				$check_com += sizeof($data['check_com']);

				$this->load->model('M_evs_data_mhrd_weight','memw');
				$this->memw->mhw_evs_emp_id = $tep->emp_id;
				$this->memw->mhw_approver = $_SESSION['UsEmp_ID'];
				$data['check_com'] = $data['data_mhrd'] = $this->memw->get_by_empID_app()->result();
				$check_com += sizeof($data['check_com']);
		
				$this->load->model('M_evs_data_acm_weight','mdtm');
				$this->mdtm->dta_evs_emp_id = $tep->emp_id;
				$this->mdtm->dta_approver = $_SESSION['UsEmp_ID'];
				$data['check_com'] = $data['data_acm_weight'] = $this->mdtm->get_by_empID_app()->result();
				$check_com += sizeof($data['check_com']);

				$this->load->model('M_evs_data_gcm_weight','mdtg');
				$this->mdtg->dtg_evs_emp_id = $tep->emp_id;
				$this->mdtg->dtg_approver = $_SESSION['UsEmp_ID'];
				$data['check_com'] = $data['data_gcm_weight'] = $this->mdtg->get_by_empID_app()->result();
				$check_com += sizeof($data['check_com']);
				// -----------------------------------------------
				
				$this->load->model('M_evs_data_approve','meda');
				$this->meda->emp_employee_id = $row->emp_employee_id;
				$this->meda->dma_status = 3;
				$data['st_emp'] = $this->meda->get_by_emp_and_status()->row();
				$temp = $data['st_emp'];

				if(sizeof($temp) != 0){
					array_push($status,$temp->emp_employee_id);
					$reject_ro_report = 0;
				}
				// if
				
				$this->load->model('M_evs_data_approve','meda');
				$this->meda->emp_employee_id = $row->emp_employee_id;
				$this->meda->dma_status = -3;
				$data['st_emp_reject'] = $this->meda->get_by_emp_and_status()->row();
				$temp_reject = $data['st_emp_reject'];
				if(sizeof($temp_reject) == 0 && sizeof($temp) != 0){array_push($comment,"Edit Success");}
				if(sizeof($temp_reject) != 0){
					array_push($status,$temp_reject->emp_employee_id);

					$this->load->model('M_evs_reject_form','mrjf');
					$this->mrjf->rjf_dma_id = $temp_reject->dma_id;
					$this->mrjf->rjf_status = 3;
					$data_rj_comment = $this->mrjf->get_all_by_dma_id_and_rjf_status()->row();
					array_push($comment,$data_rj_comment->rjf_comment);
					$reject_ro_report = 1;
				}
				// if 
				// ------------------------------------------------------------------------

				$this->load->model('M_evs_data_approve','mda');
				$this->mda->dma_emp_id = $tep->emp_id;
				$data['app'] = $this->mda->get_by_id()->row();
				$temp_app = $data['app'];

				if($check_com != 0){

					$sum = 0;
					$sum_all = 0;
					$sum_max = 0;
					$sum_max_all = 0;
					$sum_percent_pe = 0;
					$sum_percent_ce = 0;

					if($chack_form_pe == "MBO"){
						$this->load->model('M_evs_data_mbo_weight','medw');
						$this->medw->dmw_evs_emp_id = $tep->emp_id;
						$this->medw->dmw_approver = $_SESSION['UsEmp_ID'];
						$data_mbo = $data['data_mbo'] = $this->medw->get_by_empID_app()->result();
				
						if(sizeof($data_mbo) != 0){
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
									// if
								}
								// foreach 
							}
							// foreach 
							$sum_percent_pe = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// if
					else if($chack_form_pe == "G_and_O"){
						$this->load->model('M_evs_data_g_and_o_weight','megw');
						$this->megw->dgw_evs_emp_id = $tep->emp_id;
						$this->megw->dgw_approver = $_SESSION['UsEmp_ID'];
						$data_g_and_o = $data['data_g_and_o'] = $this->megw->get_by_empID_app()->result();
						if(sizeof($data_g_and_o) != 0){
							$this->load->model('M_evs_data_g_and_o','mdgo');
							$this->mdgo->dgo_emp_id = $row->emp_employee_id;
							$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
							$g_o_emp = $data['g_o_emp'] = $this->mdgo->get_by_empID()->result();
							foreach($g_o_emp as $index => $row){
								foreach($data_g_and_o as $row_data_g_and_o){
									if($row->dgo_id == $row_data_g_and_o->dgw_dgo_id ){
										$sum = $row->dgo_weight*$row_data_g_and_o->dgw_weight;
										$sum_max = $row->dgo_weight*5;
										$sum_all += $sum;
										$sum_max_all += $sum_max;
									}
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_pe = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// else if 
					else if($chack_form_pe == "MHRD"){
			
						$this->load->model('M_evs_data_mhrd_weight','memw');
						$this->memw->mhw_evs_emp_id = $tep->emp_id;
						$this->memw->mhw_approver = $_SESSION['UsEmp_ID'];
						$data_mhrd  = $data['data_mhrd'] = $this->memw->get_by_empID_app()->result();
						if(sizeof($data_mhrd) != 0){
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
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_pe = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// else if 
		
					if($chack_form_ce == "ACM"){
						$this->load->model('M_evs_data_acm_weight','mdtm');
						$this->mdtm->dta_evs_emp_id = $tep->emp_id;
						$this->mdtm->dta_approver = $_SESSION['UsEmp_ID'];
						$data_acm_weight = $data['data_acm_weight'] = $this->mdtm->get_by_empID_app()->result();
						if(sizeof($data_acm_weight) != 0){
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
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_ce = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// if 
					else if($chack_form_ce == "GCM"){
			
						$this->load->model('M_evs_data_gcm_weight','mdtm');
						$this->mdtm->dtg_evs_emp_id = $tep->emp_id;
						$this->mdtm->dtg_approver = $_SESSION['UsEmp_ID'];
						$data_gcm_weight = $data['data_gcm_weight'] = $this->mdtm->get_by_empID_app()->result();
						if(sizeof($data_gcm_weight) != 0){
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
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_ce = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// else if

				}
				// if check_com

				else if($check_com == 0){

					$sum = 0;
					$sum_all = 0;
					$sum_max = 0;
					$sum_max_all = 0;
					$sum_percent_pe = 0;
					$sum_percent_ce = 0;

					if($chack_form_pe == "MBO"){
						$this->load->model('M_evs_data_mbo_weight','medw');
						$this->medw->dmw_evs_emp_id = $tep->emp_id;
						$this->medw->dmw_approver = $temp_app->dma_approve2;
						$data_mbo = $data['data_mbo'] = $this->medw->get_by_empID_app2()->result();
				
						if(sizeof($data_mbo) != 0){
							$this->load->model('M_evs_data_mbo','medm');
							$this->medm->dtm_emp_id = $row->emp_employee_id;
							$this->medm->dtm_evs_emp_id = $tep->emp_id;
							$mbo_emp = $data['mbo_emp'] = $this->medm->get_by_empID()->result();
							foreach($mbo_emp as $index => $row) {
								foreach($data_mbo as $row_data_mbo){  
									if($row->dtm_id == $row_data_mbo->dmw_dtm_id && $row_data_mbo->dmw_approver == $temp_app->dma_approve2){
										$sum = $row->dtm_weight*$row_data_mbo->dmw_weight;
										$sum_max = $row->dtm_weight*5;
										$sum_all += $sum;
										$sum_max_all += $sum_max;
									}
									// if
								}
								// foreach 
							}
							// foreach 
							$sum_percent_pe = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// if
					else if($chack_form_pe == "G_and_O"){
						$this->load->model('M_evs_data_g_and_o_weight','megw');
						$this->megw->dgw_evs_emp_id = $tep->emp_id;
						$this->megw->dgw_approver = $temp_app->dma_approve2;
						$data_g_and_o = $data['data_g_and_o'] = $this->megw->get_by_empID_app2()->result();
						if(sizeof($data_g_and_o) != 0){
							$this->load->model('M_evs_data_g_and_o','mdgo');
							$this->mdgo->dgo_emp_id = $row->emp_employee_id;
							$this->mdgo->dgo_evs_emp_id = $tep->emp_id;
							$g_o_emp = $data['g_o_emp'] = $this->mdgo->get_by_empID()->result();
							
							foreach($g_o_emp as $index => $row){
								foreach($data_g_and_o as $row_data_g_and_o){
									if($row->dgo_id == $row_data_g_and_o->dgw_dgo_id && $row_data_g_and_o->dgw_approver == $temp_app->dma_approve2){
										$sum = $row->dgo_weight*$row_data_g_and_o->dgw_weight;
										$sum_max = $row->dgo_weight*5;
										$sum_all += $sum;
										$sum_max_all += $sum_max;
									}
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_pe = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// else if 
					else if($chack_form_pe == "MHRD"){
			
						$this->load->model('M_evs_data_mhrd_weight','memw');
						$this->memw->mhw_evs_emp_id = $tep->emp_id;
						$this->memw->mhw_approver = $temp_app->dma_approve2;
						$data_mhrd  = $data['data_mhrd'] = $this->memw->get_by_empID_app2()->result();
						if(sizeof($data_mhrd) != 0){
							$this->load->model('M_evs_set_form_mhrd','msfm');
							$this->msfm->sfi_pos_id = $tep->Position_ID;
							$info_mhrd = $data['info_mhrd'] = $this->msfm->get_item_description_by_position()->result();
			
							foreach($info_mhrd as $index => $row){ 
								foreach($data_mhrd as $row_data_mhrd){                                       
									if($row->sfi_id == $row_data_mhrd->mhw_sfi_id && $row_data_mhrd->mhw_approver == $temp_app->dma_approve2){
										$sum = $row_data_mhrd->mhw_weight_1+$row_data_mhrd->mhw_weight_2;
										$sum_max = 3+3;
										$sum_all += $sum;
										$sum_max_all += $sum_max;
									}
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_pe = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// else if 
		
					if($chack_form_ce == "ACM"){
						$this->load->model('M_evs_data_acm_weight','mdtm');
						$this->mdtm->dta_evs_emp_id = $tep->emp_id;
						$this->mdtm->dta_approver = $temp_app->dma_approve2;
						$data_acm_weight = $data['data_acm_weight'] = $this->mdtm->get_by_empID_app2()->result();
						if(sizeof($data_acm_weight) != 0){
							$this->load->model('M_evs_set_form_ability','mesf');
							$this->mesf->sfa_pos_id = $tep->Position_ID;
							$this->mesf->sfa_pay_id = $pay_id;
							$info_ability_form = $data['info_ability_form'] = $this->mesf->get_all_competency_by_indicator()->result();
			
							foreach($info_ability_form as $row){
								foreach($data_acm_weight as $row_data_acm_weight){
									if($row->sfa_id == $row_data_acm_weight->dta_sfa_id && $row_data_acm_weight->dta_approver == $temp_app->dma_approve2){
										$sum = $row->sfa_weight*$row_data_acm_weight->dta_weight;
										$sum_max = $row->sfa_weight*5;
										$sum_all += $sum;
										$sum_max_all += $sum_max;
									}
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_ce = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// if 
					else if($chack_form_ce == "GCM"){
			
						$this->load->model('M_evs_data_gcm_weight','mdtm');
						$this->mdtm->dtg_evs_emp_id = $tep->emp_id;
						$this->mdtm->dtg_approver = $temp_app->dma_approve2;
						$data_gcm_weight = $data['data_gcm_weight'] = $this->mdtm->get_by_empID_app2()->result();
						if(sizeof($data_gcm_weight) != 0){
							$tep = $data['emp_info']->row();
							$this->load->model('M_evs_set_form_gcm','mesf');
							$this->mesf->sgc_pos_id = $tep->Position_ID;
							$this->mesf->sgc_pay_id = $pay_id;
							$info_gcm_form = $data['info_gcm_form'] = $this->mesf->get_all_competency_by_indicator()->result();
			
							foreach($info_gcm_form as $row){
								foreach($data_gcm_weight as $row_data_gcm_weight){
									if($row->sgc_id == $row_data_gcm_weight->dtg_sgc_id && $row_data_gcm_weight->dtg_approver == $temp_app->dma_approve2){
										$sum = $row->sgc_weight*$row_data_acm_weight->dta_weight;
										$sum_max = $row->sgc_weight*5;
										$sum_all += $sum;
										$sum_max_all += $sum_max;
									}
									// if
								}
								// foreach
							}
							// foreach
							$sum_percent_ce = ($sum_all/$sum_max_all)*100;
						}
						// if
					}
					// else if
		
				}
				// else check_com	
			}
			// if 
			// echo $sum_percent_pe . "+" . $sum_percent_ce ."<br>";
			if((($sum_percent_pe+$sum_percent_ce/100)) >= 90) {array_push($data_grade,"S");}
			else if((($sum_percent_pe+$sum_percent_ce/100)) >= 80) {array_push($data_grade,"A");}
			else if ((($sum_percent_pe+$sum_percent_ce/100)) >= 75){array_push($data_grade,"B+");}
			else if ((($sum_percent_pe+$sum_percent_ce/100)) >= 70){array_push($data_grade,"B");}
			else if ((($sum_percent_pe+$sum_percent_ce/100)) >= 65){array_push($data_grade,"B-");}
			else if ((($sum_percent_pe+$sum_percent_ce/200)) >= 60){array_push($data_grade,"C");}
			else if ((($sum_percent_pe+$sum_percent_ce/100)) >= 50){array_push($data_grade,"D");}
			else{array_push($data_grade,"F");}
				array_push($data_chack_form,$check);
				array_push($data_chack_form_com,$check_com);
			}
			// foreach 

			foreach($emp_data as $index => $row) {
				if($data_chack_form[$index]  != 0){
					$chack_form_save += 1; 
				}
				// if
				$chack_save += 1;
			}
			// foreach
			
			if($chack_form_save == $chack_save){ 
				$chack_save_button = "Chack";
			}
			// if 
			else{$chack_save_button = "Un_Chack";}
			// else 

		}
		// if

		$data['data_status'] = $status;
		$data['chack_save'] = $chack_save_button;
		$data['data_chack_form'] = $data_chack_form;
		$data['data_chack_form_com'] = $data_chack_form_com;
		$data['data_emp_id'] = $_SESSION['UsEmp_ID'];
		$data['data_grade'] = $data_grade;
		$data['data_group'] = $data['data_group'];
		$data["dep_info"] = $dep;

		if($reject_ro_report == 0){
			$this->output('/consent/ev_form_HD/v_main_form',$data);
		}
		else{
			$data['data_comment'] = $comment;
			
			$this->output('/consent/ev_form_HD/v_main_form_reject',$data);
		}
		// else 
	}
	// function index()

	function reject_choose(){
		$comment = [];
		$status = [];
		$data_chack_form = [];	
		$check = 0;
		$chack_save = 0;
		$chack_form_save = 0;
		$reject_ro_report = 0;
		
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
			
			$this->load->model('M_evs_data_approve','meda');
			$this->meda->emp_employee_id = $row->emp_employee_id;
			$this->meda->dma_status = -3;
			$data['st_emp_reject'] = $this->meda->get_by_emp_and_status()->row();
			$temp_reject = $data['st_emp_reject'];
			if(sizeof($temp_reject) == 0){array_push($status,$row->emp_employee_id); array_push($comment,"Edit Success"); }
			if(sizeof($temp_reject) != 0){
				array_push($status,$temp_reject->emp_employee_id);

				$this->load->model('M_evs_reject_form','mrjf');
				$this->mrjf->rjf_dma_id = $temp_reject->dma_id;
				$this->mrjf->rjf_status = 3;
				$data_rj_comment = $this->mrjf->get_all_by_dma_id_and_rjf_status()->row();
			
				array_push($comment,$data_rj_comment->rjf_comment);
				$reject_ro_report = 1;
			}

			}
			// if
			array_push($data_chack_form,$check);

		}
		// foreach

		foreach($emp_data as $index => $row) {
			if($data_chack_form[$index]  != 0){
				$chack_form_save += 1; 
			}
			// if
			$chack_save += 1;
		}
		// foreach
		
		if($chack_form_save == $chack_save){ 
			$chack_save_button = "Chack";
		}
		// if 
		else{$chack_save_button = "Un_Chack";}
		// else 
		$data['data_status'] = $status;
		$data['chack_save'] = $chack_save_button;
		$data['data_chack_form'] = $data_chack_form;
		$data['data_emp_id'] = $_SESSION['UsEmp_ID'];

	
			$data['data_comment'] = $comment;
			
			$this->output('/consent/ev_form_HD/v_main_form_reject_choose',$data);
		
	}
	// function index()
	
	/*
	* createFROM
	* @input emp_id
	* @output infomation employee
	* @author 	Kunanya Singmee
	* @Create Date 2564-04-07
	*/
	function createFROM($EMP_ID){
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
		$data['dept_info'] = $this->memp->get_dpartment($tep->Sectioncode_ID)->row();

		//$emp_id = $this->input->post("emp_id");
		
		$this->load->model('M_evs_employee','memp');
		$this->memp->emp_employee_id = $emp_id;
		$this->memp->emp_pay_id = $pay_id;
		$employee_data = $data["employee_data"] = $this->memp->get_by_evs_emp_id()->row();

		$this->load->model('M_evs_position_from','mpf');
		$this->mpf->ps_pos_id = $tep->Position_ID;
		$this->mpf->ps_pay_id = $pay_id;
		$data['form'] = $this->mpf->get_all_by_key_by_year()->row();

		$this->load->model('M_evs_data_approve','mda');
		$this->mda->dma_emp_id = $tep->emp_id;
		$data['app'] = $this->mda->get_by_id()->row();
		$temp_app = $data['app'];


		if($data['form']->ps_form_pe == "MBO"){
			$this->load->model('M_evs_data_mbo_weight','medw');
			$this->medw->dmw_evs_emp_id = $tep->emp_id;
			$this->medw->dmw_approver = $temp_app->dma_approve2;
			$data['data_mbo'] = $this->medw->get_by_empID_app2()->result();
		
			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $emp_id;
			$this->medm->dtm_evs_emp_id = $tep->emp_id;
			$data['mbo_emp'] = $this->medm->get_by_empID()->result();
			$data['info_pos_id'] = $tep->Position_ID;

			$data['data_from_pe'] = "MBO_edit";		
		
		}
		// if

		else if($data['form']->ps_form_pe == "G&O"){

		$this->load->model('M_evs_data_g_and_o_weight','megw');
		$this->megw->dgw_evs_emp_id = $tep->emp_id;
		$this->megw->dgw_approver = $temp_app->dma_approve2;
		$data['data_g_and_o'] = $this->megw->get_by_empID_app2()->result();

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
	
		}
		/// else if 

		else if($data['form']->ps_form_pe == "MHRD"){
			$this->load->model('M_evs_data_mhrd_weight','memw');
			$this->memw->mhw_evs_emp_id = $tep->emp_id;
			$this->memw->mhw_approver = $temp_app->dma_approve2;
			$data['data_mhrd'] = $this->memw->get_by_empID_app2()->result();
	
			$this->load->model('M_evs_set_form_mhrd','msfm');
			$this->msfm->sfi_pos_id = $tep->Position_ID;
			$data['info_mhrd'] = $this->msfm->get_item_description_by_position()->result();
	
			$data['data_from_pe'] = "MHRD_edit";	
		}
		// else if


		if($data['form']->ps_form_ce == "ACM"){
	
			$this->load->model('M_evs_data_acm_weight','mdtm');
			$this->mdtm->dta_evs_emp_id = $tep->emp_id;
			$this->mdtm->dta_approver = $temp_app->dma_approve2;
			$data['data_acm_weight'] = $this->mdtm->get_by_empID_app2()->result();
			
			$this->load->model('M_evs_set_form_ability','mesf');
			$this->mesf->sfa_pos_id = $tep->Position_ID;
			$this->mesf->sfa_pay_id = $pay_id;
			$this->mesf->ept_pos_id = $tep->Position_ID;
			$data['info_ability_form'] = $this->mesf->get_all_competency();
			$data['data_from_ce'] = "ACM_edit";
		}
		// if

		else if($data['form']->ps_form_ce == "GCM"){
			$this->load->model('M_evs_data_gcm_weight','mdtm');
			$this->mdtm->dtg_evs_emp_id = $employee_data->emp_id;
			$this->mdtm->dtg_approver = $temp_app->dma_approve2;
			$data['data_gcm_weight'] = $this->mdtm->get_by_empID_app2()->result();
			
			$tep = $data['emp_info']->row();
			$this->load->model('M_evs_set_form_gcm','mesf');
			$this->mesf->sgc_pos_id = $tep->Position_ID;
			$this->mesf->sgc_pay_id = $pay_id;
			$this->mesf->epg_pos_id = $tep->Position_ID;
			$data['info_form_gcm'] = $this->mesf->get_all_competency_gcm();
			$data['data_from_ce'] = "GCM_edit";	

		}
		// else if 
		$this->output('/consent/ev_form_HD/v_createFROM',$data);

	}
	// function createACM

	function editFROM($EMP_ID){
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
		$data['dept_info'] = $this->memp->get_dpartment($tep->Sectioncode_ID)->row();

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
			$this->medw->dmw_approver = $_SESSION['UsEmp_ID'];
			$data['data_mbo'] = $this->medw->get_by_empID_app()->result();
		
			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $emp_id;
			$this->medm->dtm_evs_emp_id = $tep->emp_id;
			$data['mbo_emp'] = $this->medm->get_by_empID()->result();
			$data['info_pos_id'] = $tep->Position_ID;

			$data['data_from_pe'] = "MBO_edit";		
		
		}
		// if

		else if($data['form']->ps_form_pe == "G&O"){
		$this->load->model('M_evs_data_g_and_o_weight','megw');
		$this->megw->dgw_evs_emp_id = $tep->emp_id;
		$this->megw->dgw_approver = $_SESSION['UsEmp_ID'];
		$data['data_g_and_o'] = $this->megw->get_by_empID_app()->result();

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
	
		}
		/// else if 

		else if($data['form']->ps_form_pe == "MHRD"){
			$this->load->model('M_evs_data_mhrd_weight','memw');
			$this->memw->mhw_evs_emp_id = $tep->emp_id;
			$this->memw->dta_approver = $_SESSION['UsEmp_ID'];
			$data['data_mhrd'] = $this->memw->get_by_empID_app()->result();
	
			$this->load->model('M_evs_set_form_mhrd','msfm');
			$this->msfm->sfi_pos_id = $tep->Position_ID;
			$data['info_mhrd'] = $this->msfm->get_item_description_by_position()->result();
	
			$data['data_from_pe'] = "MHRD_edit";	
		}
		// else if


		if($data['form']->ps_form_ce == "ACM"){
	
			$this->load->model('M_evs_data_acm_weight','mdtm');
			$this->mdtm->dta_evs_emp_id = $tep->emp_id;
			$this->mdtm->dta_approver = $_SESSION['UsEmp_ID'];
			$data['data_acm_weight'] = $this->mdtm->get_by_empID_app()->result();
			
			$this->load->model('M_evs_set_form_ability','mesf');
			$this->mesf->sfa_pos_id = $tep->Position_ID;
			$this->mesf->sfa_pay_id = $pay_id;
			$this->mesf->ept_pos_id = $tep->Position_ID;
			$data['info_ability_form'] = $this->mesf->get_all_competency();
			$data['data_from_ce'] = "ACM_edit";
		}
		// if

		else if($data['form']->ps_form_ce == "GCM"){
			$this->load->model('M_evs_data_gcm_weight','mdtm');
			$this->mdtm->dtg_evs_emp_id = $employee_data->emp_id;
			$this->mdtm->dtg_approver = $_SESSION['UsEmp_ID'];
			$data['data_gcm_weight'] = $this->mdtm->get_by_empID_app()->result();
			
			$tep = $data['emp_info']->row();
			$this->load->model('M_evs_set_form_gcm','mesf');
			$this->mesf->sgc_pos_id = $tep->Position_ID;
			$this->mesf->sgc_pay_id = $pay_id;
			$this->mesf->epg_pos_id = $tep->Position_ID;
			$data['info_form_gcm'] = $this->mesf->get_all_competency_gcm();
			$data['data_from_ce'] = "GCM_edit";	

		}
		// else if 
		$this->output('/consent/ev_form_HD/v_editFROM',$data);

	}
	// function editform


	function reject_group_reject_to_AP(){
		$emp_id = $this->input->post("Emp_ID");
		$arr_roop = count($emp_id);

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;
		
		$this->load->model('M_evs_data_approve','mdap');
		$this->load->model('Da_evs_reject_form','drjf');
		for($i = 0 ; $i < $arr_roop ; $i++){
			
			if($this->input->post("checkbox_ex[".$i."]") == 1){
			$this->mdap->dma_emp_id = $this->input->post("Emp_ID[".$i."]");
			$data_dma_id = $this->mdap->get_by_id();
			$row_dma_id = $data_dma_id->row();
			$dma_id = $row_dma_id->dma_id;


			$this->drjf->rjf_comment = $this->input->post("comment[".$i."]");
			$this->drjf->rjf_status = 2;
			$this->drjf->rjf_dma_id = $dma_id;
			$this->drjf->insert();
			
			$this->mdap->dma_emp_id = $this->input->post("Emp_ID[".$i."]");
			$this->mdap->dma_status = -2;
			$this->mdap->update_status(); 
			}
		}
		// for




		
		$data = "save_reject_grade";
		echo json_encode($data);


	}

	function save_group_to_HR(){
    
		$Emp_ID = $this->input->post("Emp_ID");
		$index = $this->input->post("index");

		$this->load->model('M_evs_data_approve','mdap');

		for ($i = 0; $i < $index; $i++) {
			$this->mdap->dma_emp_id = $Emp_ID[$i];
			$this->mdap->dma_status = 4;
			$this->mdap->update_status(); 
		}
		// for 
		
		$data = "save_group_to_HR";
		echo json_encode($data);
	
	}
	// save_group_to_HR

	function save_group_reject_to_HR(){
    
		$Emp_ID = $this->input->post("Emp_ID");
		$index = $this->input->post("index");

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_data_approve','mdap');
		$this->load->model('M_evs_reject_form','mrjf');

		for ($i = 0; $i < $index; $i++) {
			$this->mdap->dma_emp_id = $Emp_ID[$i];
			$this->mdap->dma_status = 4;
			$this->mdap->update_status(); 

			$this->mdap->dma_emp_id = $Emp_ID[$i];
			$data_dma_id = $this->mdap->get_by_id()->row(); 
			$this->mrjf->rjf_dma_id = $data_dma_id->dma_id;
			$this->mrjf->rjf_status = 3;
			$this->mrjf->delete_by_dma_id(); 
		}
		// for 


		
		$data = "save_group_reject_to_HR";
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
	// save_data_g_and_o

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

		function report_grade(){
			$status = [];
			$data_chack_form = [];	
			$check = 0;
			$chack_save = 0;
			$chack_form_save = 0;
			
			$this->load->model('M_evs_pattern_and_year','myear');
			$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
			$year = $data['patt_year']->row(); // show value year now
			//end set year now
			$pay_id = $year->pay_id;

			$this->load->model('M_evs_employee','memp');
			$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
			$this->memp->emp_pay_id = $pay_id;
			$data['emp_info_show'] = $this->memp->get_by_empid();

			$temp = $data['emp_info_show']->row();
			$data['dept_info'] = $this->memp->get_dpartment($temp->Sectioncode_ID)->row();
	
			$this->load->model('M_evs_employee','memp');
			$data['emp_info'] = $this->memp->get_all_by_year()->result();

			$this->load->model('M_evs_data_grade','mdgd');
			$this->mdgd->dgr_pay_id = $pay_id;
			$data['data_grade'] = $this->mdgd->get_all_by_year()->result();
			$data['data_emp_id'] = $_SESSION['UsEmp_ID'];

			$this->load->model('M_evs_data_approve','mda');
			$this->mda->dma_emp_id = $_SESSION['UsEmp_ID'];
			$data['app'] = $this->mda->get_status_by_emp()->result();
			if(sizeof($data['app']) != 0){
				foreach($data['app'] as $row){
					array_push($status,$row->dma_status);
				}
				// foreach
				$data['status'] = $status;
			}
			// if
			else {
				$data['status'] = [];
			}
			// else 

			

			
			$this->output('/consent/ev_form_HD/v_report_grade',$data);

		}
		// report_grade
function feedback(){
	$comment = [];
	$app_com = [];
	$dep = [];

	$this->load->model('M_evs_data_grade','mdg');
	$this->mdg->gru_head_dept = $_SESSION['UsEmp_ID'];
	$this->mdg->dma_status = 5;
	$data['data_group'] = $this->mdg->get_by_gorup()->result();

	$this->load->model('M_evs_data_comment','mdcm');
	foreach($data['data_group'] as $row){
		$this->mdcm->dcm_emp_id = $row->emp_id;
		$data['com_temp'] =  $this->mdcm->get_by_emp()->row();
		
		$this->load->model('M_evs_employee','memp');
		$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
		array_push($dep,$data[$row->Emp_ID."_dep"]);

		if(sizeof($data['com_temp']) != 0){
				$temp = $data['com_temp'];
				array_push($comment,$temp->dcm_comment);
				$name = $temp->Empname_eng." ".$temp->Empsurname_eng;
				array_push($app_com,$name);
		}
		// if
		else{
			array_push($comment,"-");
			array_push($app_com,"-");
		}
		// else 

	}
	// foreach
	$data['comment'] = $comment;
	$data['app_com'] = $app_com;
	$data["dep_info"] = $dep;

	$this->output('/consent/ev_form_HD/v_main_form_feedback',$data);
}
// feedback

function save_feedback(){
    
	$Emp_ID = $this->input->post("Emp_ID");
	$index = $this->input->post("index");
	$status_us = $this->input->post("status_us");
	$comment = $this->input->post("comment");
	

	$this->load->model('M_evs_data_approve','mdap');
	$this->load->model('Da_evs_data_comment','ddcm');

	for ($i = 0; $i < $index; $i++) {
		$this->mdap->dma_emp_id = $Emp_ID[$i];
		$this->mdap->dma_status = $status_us;
		$this->mdap->update_status();
		
		$this->ddcm->dcm_comment = $comment[$i];
		$this->ddcm->dcm_emp_id = $Emp_ID[$i];
		$this->ddcm->dcm_aprprover = $_SESSION['UsEmp_ID'];
		$this->ddcm->insert();
	}
	// for 
	
	$data = "save_feedback";
	echo json_encode($data);

}
// save_feedback


function create_form_group(){

	$dep = [];
	$status = [];
	$emp = [];

	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_group','megu');
	$this->megu->emp_pay_id = $pay_id;
	$this->megu->gru_head_dept = $_SESSION['UsEmp_ID'];
	$data['data_group'] = $this->megu->get_group_by_head_dept()->result();
	$emp_data = $data['data_group'];

	if(sizeof($emp_data) != 0){
		foreach ($emp_data as $index => $row) {
			$this->load->model('M_evs_employee','memp');
			$data[$row->Emp_ID."_dep"] = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep,$data[$row->Emp_ID."_dep"]);

			$this->load->model('M_evs_position_from','mpf');
			$this->mpf->ps_pos_id = $row->Position_ID;
			$this->mpf->ps_pay_id = $pay_id;
			$data[$row->Emp_ID.'form'] = $this->mpf->get_all_by_key_by_year()->row();

			$tmp_form = $data[$row->Emp_ID.'form'];

			if($tmp_form->ps_form_pe == "MBO"){
				$this->load->model('M_evs_data_mbo','medm');
				$this->medm->dtm_evs_emp_id = $row->emp_id;
				$this->medm->dtm_emp_id = $row->Emp_ID;
				$data['data_mbo'] = $this->medm->get_by_empID()->result();

				array_push($emp,$emp_data[$index]);

				if(sizeof($data['data_mbo']) != 0){
					array_push($status,0);
				}
				// if
				else{
					array_push($status,1);
				} 
				// else
			}
			// if 
		}
		// foreach
	}
	// if

	$data["emp_info"] = $emp;
	$data["dep_info"] = $dep;
	$data["status_form"] = $status;

	$this->output('/consent/ev_form_HD/v_main_create_form',$data);
}
// function create_form_group()

function createFROM_emp($EMP_ID){
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
	$data['dept_info'] = $this->memp->get_dpartment($tep->Sectioncode_ID)->row();
	
	$this->load->model('M_evs_employee','memp');
	$this->memp->emp_employee_id = $emp_id;
	$this->memp->emp_pay_id = $pay_id;
	$employee_data = $data["employee_data"] = $this->memp->get_by_evs_emp_id()->row();

	$this->load->model('M_evs_position_from','mpf');
	$this->mpf->ps_pos_id = $tep->Position_ID;
	$this->mpf->ps_pay_id = $pay_id;
	$data['form'] = $this->mpf->get_all_by_key_by_year()->row();

	if(sizeof($data['form']) != 0){
		$data['status_btn'] = 1;
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
					$this->mesf->ept_pos_id = $tep->Position_ID;
					$data['info_ability_form'] = $this->mesf->get_all_competency();

				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$this->msfg->epg_pos_id = $tep->Position_ID;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_gcm();

				}
				// else if GCM
				$this->output('/consent/ev_form_HD/v_editMBO',$data);
			}
			// if

			else{
				if($data['form']->ps_form_ce == "ACM"){
					$this->load->model('M_evs_set_form_ability','mesf');
					$this->mesf->sfa_pos_id = $tep->Position_ID;
					$this->mesf->sfa_pay_id = $pay_id;
					$this->mesf->ept_pos_id = $tep->Position_ID;
					$data['info_ability_form'] = $this->mesf->get_all_competency();
				}
				// if ACM
				else if($data['form']->ps_form_ce == "GCM"){
					$this->load->model('M_evs_set_form_gcm','msfg');
					$this->msfg->sgc_pos_id = $tep->Position_ID;
					$this->msfg->sgc_pay_id = $pay_id;
					$this->msfg->epg_pos_id = $tep->Position_ID;
					$data['info_form_gcm'] = $this->msfg->get_all_competency_gcm();

				}
				// else if GCM

				$this->output('/consent/ev_form_HD/v_createMBO',$data);
			}
			// else	
		}
		// if mbo 
	}
	// if main
	else{
		redirect('ev_form_HD/Evs_form_HD/create_form_group');
	}
	// else main
}
// function createFROM_emp

function edit_mbo_emp($emp_id_edit){
	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_employee','memp');
	$this->memp->Emp_ID = $emp_id_edit;
	$this->memp->emp_pay_id = $pay_id;
	$data['emp_info'] = $this->memp->get_by_empid();
	$tep = $data['emp_info']->row();
	$data['dept_info'] = $this->memp->get_dpartment($tep->Sectioncode_ID)->row();

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
		$this->mesf->ept_pos_id = $tep->Position_ID;
		$data['info_ability_form'] = $this->mesf->get_all_competency();

	}
	// if ACM
	else if($data['form']->ps_form_ce == "GCM"){
		$this->load->model('M_evs_set_form_gcm','msfg');
		$this->msfg->sgc_pos_id = $tep->Position_ID;
		$this->msfg->sgc_pay_id = $pay_id;
		$this->msfg->epg_pos_id = $tep->Position_ID;
		$data['info_form_gcm'] = $this->msfg->get_all_competency_gcm();


	}
	// else if GCM	
	
	$this->output('/consent/ev_form/v_editMBO',$data);

}
// function edit_mbo_emp

}
?>