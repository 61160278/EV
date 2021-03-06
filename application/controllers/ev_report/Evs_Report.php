<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_Report
* Form
* @author 	Kunanya Singmee
* @Create Date 2565-02-22
*/

class Evs_Report extends MainController_avenxo {


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
	* report_payroll
	* @input 
	* @output 
	* @author 	Kunanya Singmee
	* @Create Date 2565-02-22
	*/
	function report_payroll(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_excel_report','mexr');
		$this->mexr->erp_pay_id = $pay_id;
		$name = "Payroll";
		$data["ex_info"] = $this->mexr->get_by_pay($name)->result();

		$this->load->model('M_evs_employee','memp');
		$data['dep_info'] = $this->memp->get_all_department()->result(); 

		$this->output('/consent/ev_report/v_main_report_payroll',$data);
	}
	// function report_payroll

	function report_payroll_employee($dep_id){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $dep_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];

		foreach($temp as $index => $row){
			if($index == 0){
				$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
				$data["dep_id"] = $row->Department_id;
				$data["dep"] = $row->Department;
			}
			// if

			$dp = $row->Department_id;
			$sc = $row->Section_id;
			$sb = $row->SubSection_id;
			$gr = $row->Group_id;
			$ln = $row->Line_id;

			$count = $index;
			$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

			foreach($emp as $index => $row){
				if($count == 0){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// if
				else if(!in_array($row->Emp_ID,$emp_check)){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// else if 
			}
			// foreach
		}
		// foreach 
		$dep_temp = [];
		$grade_temp = [];
		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_grade','mdtg');
			$this->mdtg->dgr_emp_id = $row->emp_id;
			$this->mdtg->dgr_pay_id = $pay_id;
			$grade = $this->mdtg->get_by_emp()->result();
			if(sizeof($grade) != 0){
				foreach($grade as $row){
					array_push($grade_temp,$row->dgr_grade);
				}
				// foreach 
			}
			// if 
			else {
				array_push($grade_temp,"-");
			}
			// else 
		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_payroll',$data);
	}
	// function report_payroll

	function insert_export_xlsx(){

		$check = "";
		$pay_id = $this->input->post("pay_id");
		$name_dep = $this->input->post("name_dep");
		$type = $this->input->post("type");

		$this->load->model('M_evs_excel_report','mexr');
		$this->mexr->erp_excel_name = $type."_".$name_dep;
		$this->mexr->erp_pay_id = $pay_id;
		$data["ex_info"] = $this->mexr->get_by_pay_name()->result();

		if(sizeof($data["ex_info"]) == 0){
			$this->load->model('Da_evs_excel_report','dexr');
			$this->dexr->erp_excel_name = $type."_".$name_dep;
			$this->dexr->erp_pay_id = $pay_id;
			$this->dexr->insert();

			$check = "first_export";
		}
		// if
		else{
			$check = "next_export";
		}
		// else 

		echo json_encode($check);
	}
	// function insert_export_xlsx

	function report_status_mbo(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_excel_report','mexr');
		$this->mexr->erp_pay_id = $pay_id;
		$name = "StatusMBO";
		$data["ex_info"] = $this->mexr->get_by_pay($name)->result();

		$this->load->model('M_evs_employee','memp');
		$data['dep_info'] = $this->memp->get_all_department()->result(); 

		$this->output('/consent/ev_report/v_main_status_mbo',$data);
	}
	// function report_status_mbo


	function report_status_mbo_employee($dep_id){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $dep_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];
		$postion = [];

		$this->load->model('M_evs_position_from','meps');
		$this->meps->ps_form_pe = "MBO";
		$this->meps->ps_pay_id = $pay_id;
		$data['form_temp'] = $this->meps->get_form()->result(); 

		foreach($data['form_temp'] as $row_form){
			array_push($postion,$row_form->ps_pos_id);
			// echo $row_form->Position_name;
		}
		// foreach

		foreach($temp as $index => $row){
			if($index == 0){
				$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
				$data["dep_id"] = $row->Department_id;
				$data["dep"] = $row->Department;
			}
			// if

			$dp = $row->Department_id;
			$sc = $row->Section_id;
			$sb = $row->SubSection_id;
			$gr = $row->Group_id;
			$ln = $row->Line_id;

			$count = $index;
			$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

			foreach($emp as $index => $row){
				if($count == 0){
					foreach($postion as $row_pos){
						if($row_pos == $row->Position_ID){
							array_push($emp_temp,$row);
							array_push($emp_check,$row->Emp_ID);
						}
						// if 
					}
					// foreach
				}
				// if
				else if(!in_array($row->Emp_ID,$emp_check)){
					foreach($postion as $row_pos){
						if($row_pos == $row->Position_ID){
							array_push($emp_temp,$row);
							array_push($emp_check,$row->Emp_ID);
						}
						// if 
					}
					// foreach
				}
				// else if 
			}
			// foreach
		}
		// foreach 
		$dep_temp = [];
		$grade_temp = [];
		$status_temp = [];

		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $row->Emp_ID;
			$this->medm->dtm_evs_emp_id = $row->emp_id;
			$data['mbo_temp'] = $this->medm->get_mbo_by_empID()->result(); 
			$temp_mbo = $data['mbo_temp'];

			if(sizeof($temp_mbo) != 0){

				$this->load->model('M_evs_data_approve','meda');
				$this->meda->dma_dtm_emp_id = $row->Emp_ID;
				$this->meda->dma_emp_id = $row->emp_id;
				$data['app_temp'] = $this->meda->get_app_by_empID()->result(); 

				if(sizeof($data['app_temp']) != 0){
					array_push($status_temp,"2");
				}
				// if 
				else{
					array_push($status_temp,"1");
				}
				// else 
			}	
			// if
			else{
				array_push($status_temp,"0");
			}
			// else


		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["status_info"] = $status_temp;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_status_mbo',$data);
	}
	// function report_status_mbo_employee

	function report_status_mbo_employee_group(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info_show'] = $this->memp->get_by_empid();
		$temps = $data['emp_info_show']->row();

		$data['dept_info'] = $this->memp->get_dpartment($temps->Sectioncode_ID)->row();
		$tmp_dep = $data['dept_info'];

		$this->load->model('M_evs_group','mgrp');
		$this->mgrp->gru_head_dept = $_SESSION['UsEmp_ID'];
		$data['grp_info'] = $this->mgrp->get_by_head()->row();
		$temp_grp = $data['grp_info'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $tmp_dep->Department_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];
		$postion = [];

		$this->load->model('M_evs_position_from','meps');
		$this->meps->ps_form_pe = "MBO";
		$this->meps->ps_pay_id = $pay_id;
		$data['form_temp'] = $this->meps->get_form()->result(); 

		foreach($data['form_temp'] as $row_form){
			array_push($postion,$row_form->ps_pos_id);
			// echo $row_form->Position_ID;
		}
		// foreach

		$data["com_info"] = $tmp_dep->Company." (" . $tmp_dep->Company_id . ")";
		$data["dep_id"] = "Group ".$temp_grp->gru_name;
		$data["dep"] = "Group ".$temp_grp->gru_name;

		$emp = $this->memp->get_emp_by_dep_group($pay_id,$temp_grp->gru_id)->result();

		foreach($emp as $index => $row){
			if($index == 0){
				foreach($postion as $row_pos){
					if($row_pos == $row->Position_ID){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
					}
					// if 
				}
				// foreach
			}
			// if
			else if(!in_array($row->Emp_ID,$emp_check)){
				foreach($postion as $row_pos){
					if($row_pos == $row->Position_ID){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
					}
					// if 
				}
				// foreach
			}
			// else if 
		}
		// foreach

		$dep_temp = [];
		$grade_temp = [];
		$status_temp = [];

		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_mbo','medm');
			$this->medm->dtm_emp_id = $row->Emp_ID;
			$this->medm->dtm_evs_emp_id = $row->emp_id;
			$data['mbo_temp'] = $this->medm->get_mbo_by_empID()->result(); 
			$temp_mbo = $data['mbo_temp'];

			if(sizeof($temp_mbo) != 0){

				$this->load->model('M_evs_data_approve','meda');
				$this->meda->dma_dtm_emp_id = $row->Emp_ID;
				$this->meda->dma_emp_id = $row->emp_id;
				$data['app_temp'] = $this->meda->get_app_by_empID()->result(); 

				if(sizeof($data['app_temp']) != 0){
					array_push($status_temp,"2");
				}
				// if 
				else{
					array_push($status_temp,"1");
				}
				// else 
			}	
			// if
			else{
				array_push($status_temp,"0");
			}
			// else


		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["status_info"] = $status_temp;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_status_mbo',$data);
	}
	// function report_status_mbo_employee_group

	function report_status_evaluation(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_excel_report','mexr');
		$this->mexr->erp_pay_id = $pay_id;
		$name = "StatusEvaluation";
		$data["ex_info"] = $this->mexr->get_by_pay($name)->result();

		$this->load->model('M_evs_employee','memp');
		$data['dep_info'] = $this->memp->get_all_department()->result(); 

		$this->output('/consent/ev_report/v_main_status_evaluation',$data);
	}
	// function report_status_mbo

	
	function report_status_evaluation_employee($dep_id){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $dep_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];

		foreach($temp as $index => $row){
			if($index == 0){
				$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
				$data["dep_id"] = $row->Department_id;
				$data["dep"] = $row->Department;
			}
			// if

			$dp = $row->Department_id;
			$sc = $row->Section_id;
			$sb = $row->SubSection_id;
			$gr = $row->Group_id;
			$ln = $row->Line_id;

			$count = $index;
			$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

			foreach($emp as $index => $row){
				if($count == 0){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// if
				else if(!in_array($row->Emp_ID,$emp_check)){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// else if 
			}
			// foreach
		}
		// foreach 
		$dep_temp = [];
		$grade_temp = [];
		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_approve','mdap');
			$this->mdap->dma_emp_id = $row->emp_id;
			$status = $this->mdap->get_status_by_emp()->result();
			if(sizeof($status) != 0){
				foreach($status as $row){
					array_push($grade_temp,$row->dma_status);
				}
				// foreach 
			}
			// if 
			else {
				array_push($grade_temp,0);
			}
			// else 
		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_status_evaluation',$data);
	}
	// function report_status_evaluation_employee


	function report_grade_auto(){
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$data['dep_info'] = $this->memp->get_all_department()->result(); 

		$this->output('/consent/ev_report/v_main_grade_auto',$data);
	}
	// function report_grade_auto

	
	function report_grade_auto_employee($dep_id){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $dep_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];

		foreach($temp as $index => $row){
			if($index == 0){
				$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
				$data["dep_id"] = $row->Department_id;
				$data["dep"] = $row->Department;
			}
			// if

			$dp = $row->Department_id;
			$sc = $row->Section_id;
			$sb = $row->SubSection_id;
			$gr = $row->Group_id;
			$ln = $row->Line_id;

			$count = $index;
			$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

			foreach($emp as $index => $row){
				if($count == 0){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// if
				else if(!in_array($row->Emp_ID,$emp_check)){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// else if 
			}
			// foreach
		}
		// foreach 
		$dep_temp = [];
		$grade_temp = [];
		$grade_reasoning = [];
		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_grade','mdtg');
			$this->mdtg->grd_emp_id = $row->emp_id;
			$grade = $this->mdtg->get_data_grade_auto_by_emp()->result();
			if(sizeof($grade) != 0){
				foreach($grade as $row){
					array_push($grade_temp,$row->grd_grade);
					array_push($grade_reasoning,$row->rms_name);
				}
				// foreach 
			}
			// if 
			else {
				array_push($grade_temp,"-");
				array_push($grade_reasoning,"-");
			}
			// else 
		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp;
		$data["grade_reasoning"] = $grade_reasoning;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_grade_auto',$data);
	}
	// function report_grade_auto_employee



	function report_grade_auto_employee_group(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info_show'] = $this->memp->get_by_empid();
		$temps = $data['emp_info_show']->row();
		
		$data['dept_info'] = $this->memp->get_dpartment($temps->Sectioncode_ID)->row();
		$tmp_dep = $data['dept_info'];

		$this->load->model('M_evs_group','mgrp');
		$this->mgrp->gru_head_dept = $_SESSION['UsEmp_ID'];
		$data['grp_info'] = $this->mgrp->get_by_head()->row();
		$temp_grp = $data['grp_info'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $tmp_dep->Department_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		
		$emp_temp = [];
		$emp_check = [];

		foreach($temp as $index => $row){
			if($index == 0){
				$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
				$data["dep_id"] = $row->Department_id;
				$data["dep"] = $row->Department;
			}
			// if

			$dp = $row->Department_id;
			$sc = $row->Section_id;
			$sb = $row->SubSection_id;
			$gr = $row->Group_id;
			$ln = $row->Line_id;

			$count = $index;
			$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

			foreach($emp as $index => $row){
				if($count == 0){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// if
				else if(!in_array($row->Emp_ID,$emp_check)){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// else if 
			}
			// foreach
		}
		// foreach 
		$dep_temp = [];
		$grade_temp = [];
		$grade_reasoning = [];
		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_grade','mdtg');
			$this->mdtg->grd_emp_id = $row->emp_id;
			$grade = $this->mdtg->get_data_grade_auto_by_emp()->result();
			if(sizeof($grade) != 0){
				foreach($grade as $row){
					array_push($grade_temp,$row->grd_grade);
					array_push($grade_reasoning,$row->rms_name);
				}
				// foreach 
			}
			// if 
			else {
				array_push($grade_temp,"-");
				array_push($grade_reasoning,"-");
			}
			// else 
		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp;
		$data["grade_reasoning"] = $grade_reasoning;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_grade_auto_group',$data);
	}
	// function report_grade_auto_employee_group

	function report_status_evaluation_group(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info_show'] = $this->memp->get_by_empid();
		$temps = $data['emp_info_show']->row();

		$data['dept_info'] = $this->memp->get_dpartment($temps->Sectioncode_ID)->row();
		$tmp_dep = $data['dept_info'];

		$this->load->model('M_evs_group','mgrp');
		$this->mgrp->gru_head_dept = $_SESSION['UsEmp_ID'];
		$data['grp_info'] = $this->mgrp->get_by_head()->row();
		$temp_grp = $data['grp_info'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $tmp_dep->Department_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];

		$data["com_info"] = $tmp_dep->Company." (" . $tmp_dep->Company_id . ")";
		$data["dep_id"] = "Group ".$temp_grp->gru_name;
		$data["dep"] = "Group ".$temp_grp->gru_name;

		$emp = $this->memp->get_emp_by_dep_group($pay_id,$temp_grp->gru_id)->result();

		foreach($emp as $index => $row){
			if($index == 0){
				array_push($emp_temp,$row);
				array_push($emp_check,$row->Emp_ID);
			}
			// if
			else if(!in_array($row->Emp_ID,$emp_check)){
				array_push($emp_temp,$row);
				array_push($emp_check,$row->Emp_ID);
			}
			// else if 
		}
		// foreach

		$dep_temp = [];
		$grade_temp = [];
		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_approve','mdap');
			$this->mdap->dma_emp_id = $row->emp_id;
			$status = $this->mdap->get_status_by_emp()->result();
			if(sizeof($status) != 0){
				foreach($status as $row){
					array_push($grade_temp,$row->dma_status);
				}
				// foreach 
			}
			// if 
			else {
				array_push($grade_temp,0);
			}
			// else 
		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_status_evaluation',$data);
	}
	// function report_status_evaluation_group

	function report_status_evaluation_group_app(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info_show'] = $this->memp->get_by_empid()->row();
		$temps = $data['emp_info_show'];

		$data['dept_info'] = $this->memp->get_dpartment($temps->Sectioncode_ID)->row();
		$tmp_dep = $data['dept_info'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $tmp_dep->Department_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];

		$data["com_info"] = $tmp_dep->Company." (" . $tmp_dep->Company_id . ")";
		$data["dep_id"] = "Approver ".$_SESSION['UsName_EN'];
		$data["dep"] = "Approver ".$_SESSION['UsName_EN'];

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_approve1 = $_SESSION['UsEmp_ID'];
		$this->meda->emp_pay_id = $pay_id;
		$emp_app1 = $this->meda->get_app1()->result();

		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_approve2 = $_SESSION['UsEmp_ID'];
		$this->meda->emp_pay_id = $pay_id;
		$emp_app2 = $this->meda->get_app2()->result();

		if(sizeof($emp_app1) != 0){
			foreach($emp_app1 as $index => $row){
				if($index == 0){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// if
				else if(!in_array($row->Emp_ID,$emp_check)){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// else if 
			}
			// foreach
		}
		// if 

		if(sizeof($emp_app2) != 0){
			foreach($emp_app2 as $index => $row){
				if(!in_array($row->Emp_ID,$emp_check)){
					array_push($emp_temp,$row);
					array_push($emp_check,$row->Emp_ID);
				}
				// else if 
			}
			// foreach
		}
		// if 


		$dep_temp = [];
		$grade_temp = [];
		foreach($emp_temp as $index => $row){
			// echo $row->Sectioncode_ID."<br>";
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);

			$this->load->model('M_evs_data_approve','mdap');
			$this->mdap->dma_emp_id = $row->emp_id;
			$status = $this->mdap->get_status_by_emp()->result();
			if(sizeof($status) != 0){
				foreach($status as $row){
					array_push($grade_temp,$row->dma_status);
				}
				// foreach 
			}
			// if 
			else {
				array_push($grade_temp,0);
			}
			// else 
		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp;
		$data["year_info"] = $year;
		$this->output('/consent/ev_report/v_export_status_evaluation',$data);
	}
	// function report_status_evaluation_group_app

	function report_history_grade(){

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_excel_report','mexr');
		$this->mexr->erp_pay_id = $pay_id;
		$name = "HistoryGrade";
		$data["ex_info"] = $this->mexr->get_by_pay($name)->result();

		$this->load->model('M_evs_employee','memp');
		$data['dep_info'] = $this->memp->get_all_department()->result(); 

		$this->output('/consent/ev_report/v_main_history_grade',$data);
	}
	// function report_history_grade

	function report_history_grade_employee($dep_id){

		$this->load->model('M_evs_pattern_and_year','myears');
		$data['all_year'] = $this->myears->get_all_year()->result();
		$all_year = $data['all_year'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $dep_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];
		$emp_all = [];
		$emp_check_all = [];

		foreach($temp as $index => $row){
			if($index == 0){
				$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
				$data["dep_id"] = $row->Department_id;
				$data["dep"] = $row->Department;
			}
			// if

			$dp = $row->Department_id;
			$sc = $row->Section_id;
			$sb = $row->SubSection_id;
			$gr = $row->Group_id;
			$ln = $row->Line_id;

			foreach($all_year as $row_year){

			$count = $index;
			$emp = $this->memp->get_emp_by_dep($row_year->pay_id,$dp,$sc,$sb,$gr,$ln)->result();
			
				foreach($emp as $index => $row){
					if($count == 0){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
						
					}
					// if
					else if(!in_array($row->Emp_ID,$emp_check)){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
					}
					// else if

					if($count == 0){
						array_push($emp_all,$row);
						array_push($emp_check_all,$row->emp_id);
						
					}
					// if
					else if(!in_array($row->emp_id,$emp_check_all)){
						array_push($emp_all,$row);
						array_push($emp_check_all,$row->emp_id);
					}
					// else if
				
				}
				// foreach
			}
			// foreach year 
		}
		// foreach 
		
		$dep_temp = [];
		$grade_temp = [];
		$grade_temp_emp = [];

		
		foreach($emp_temp as $row){
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);
		}
		// foreach department 
		$count_year = 0;

		foreach($emp_all as $index => $row){
			$emp_tmp = $row->emp_id;
			
				// echo $emp_tmp . "--" .$all_year[$count_year]->pay_id."<br>";
					
				$this->load->model('M_evs_data_grade','mdtg');
				$this->mdtg->dgr_emp_id = $emp_tmp;
				$this->mdtg->dgr_pay_id = $all_year[$count_year]->pay_id;
				$grade = $this->mdtg->get_by_emp()->result();
				if(sizeof($grade) != 0){
					foreach($grade as $row){
						array_push($grade_temp,$row->dgr_grade);
					}
					// foreach 
				}
				// if 
				else {
					array_push($grade_temp,"-");
				}
				// else
				

			$count_year++;

			if(sizeof($all_year) == $count_year){
				$count_year = 0;
				array_push($grade_temp_emp,$grade_temp);
				$grade_temp = [];
			}
			// if 
		}
		// foreach grade

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;


		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp_emp;
		$data["year_info"] = $pay_id;
		$this->output('/consent/ev_report/v_export_history_grade',$data);
	}
	// function report_history_grade_employee

	function report_history_grade_employee_group(){

		$this->load->model('M_evs_pattern_and_year','myears');
		$data['all_year'] = $this->myears->get_all_year()->result();
		$all_year = $data['all_year'];

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info_show'] = $this->memp->get_by_empid();
		$temps = $data['emp_info_show']->row();

		$data['dept_info'] = $this->memp->get_dpartment($temps->Sectioncode_ID)->row();
		$tmp_dep = $data['dept_info'];

		$this->load->model('M_evs_group','mgrp');
		$this->mgrp->gru_head_dept = $_SESSION['UsEmp_ID'];
		$data['grp_info'] = $this->mgrp->get_by_head()->row();
		$temp_grp = $data['grp_info'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $tmp_dep->Department_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];

		$data["com_info"] = $tmp_dep->Company." (" . $tmp_dep->Company_id . ")";
		$data["dep_id"] = "Group ".$temp_grp->gru_name;
		$data["dep"] = "Group ".$temp_grp->gru_name;

		$emp_temp = [];
		$emp_check = [];
		$emp_all = [];
		$emp_check_all = [];

			$emp = $this->memp->get_emp_by_group($temp_grp->gru_id)->result();
				foreach($emp as $index => $row){
					$count = $index;

					if($count == 0){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
						
					}
					// if
					else if(!in_array($row->Emp_ID,$emp_check)){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
					}
					// else if

					if($count == 0){
						array_push($emp_all,$row);
						array_push($emp_check_all,$row->emp_id);
						
					}
					// if
					else if(!in_array($row->emp_id,$emp_check_all)){
						array_push($emp_all,$row);
						array_push($emp_check_all,$row->emp_id);
					}
					// else if
				
				}
				// foreach
		
		$dep_temp = [];
		$grade_temp = [];
		$grade_temp_emp = [];

		
		foreach($emp_temp as $row){
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);
		}
		// foreach department 
		$count_year = 0;

		foreach($emp_all as $index => $row){
			$emp_tmp = $row->emp_id;
			
				// echo $emp_tmp . "--" .$all_year[$count_year]->pay_id."<br>";
					
				$this->load->model('M_evs_data_grade','mdtg');
				$this->mdtg->dgr_emp_id = $emp_tmp;
				$this->mdtg->dgr_pay_id = $all_year[$count_year]->pay_id;
				$grade = $this->mdtg->get_by_emp()->result();
				if(sizeof($grade) != 0){
					foreach($grade as $row){
						array_push($grade_temp,$row->dgr_grade);
					}
					// foreach 
				}
				// if 
				else {
					array_push($grade_temp,"-");
				}
				// else
				

			$count_year++;

			if(sizeof($all_year) == $count_year){
				$count_year = 0;
				array_push($grade_temp_emp,$grade_temp);
				$grade_temp = [];
			}
			// if 
		}
		// foreach grade

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp_emp;
		$data["year_info"] = $pay_id;
		$this->output('/consent/ev_report/v_export_history_grade',$data);
	}
	// function report_history_grade_employee_group

	function report_history_grade_employee_app(){

		$this->load->model('M_evs_pattern_and_year','myears');
		$data['all_year'] = $this->myears->get_all_year()->result();
		$all_year = $data['all_year'];

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
		$this->memp->emp_pay_id = $pay_id;
		$data['emp_info_show'] = $this->memp->get_by_empid()->row();
		$temps = $data['emp_info_show'];

		$data['dept_info'] = $this->memp->get_dpartment($temps->Sectioncode_ID)->row();
		$tmp_dep = $data['dept_info'];

		$this->load->model('M_evs_employee','memp');
		$this->memp->Department_id = $tmp_dep->Department_id;
		$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
		$temp = $data['dep_temp'];
		$emp_temp = [];
		$emp_check = [];

		$data["com_info"] = $tmp_dep->Company." (" . $tmp_dep->Company_id . ")";
		$data["dep_id"] = "Approver ".$_SESSION['UsName_EN'];
		$data["dep"] = "Approver ".$_SESSION['UsName_EN'];

		$emp_temp = [];
		$emp_check = [];
		$emp_all = [];
		$emp_check_all = [];


		$this->load->model('M_evs_data_approve','meda');
		$this->meda->dma_approve1 = $_SESSION['UsEmp_ID'];
		$emp_app1 = $this->meda->get_emp_app1()->result();

			if(sizeof($emp_app1) != 0){
				foreach($emp_app1 as $index => $row){
					$count = $index;

					if($count == 0){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);	
					}
					// if
					else if(!in_array($row->Emp_ID,$emp_check)){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
					}
					// else if

					if($count == 0){
						array_push($emp_all,$row);
						array_push($emp_check_all,$row->emp_id);
					}
					// if
					else if(!in_array($row->emp_id,$emp_check_all)){
						array_push($emp_all,$row);
						array_push($emp_check_all,$row->emp_id);
					}
					// else if
					
				}
				// foreach
			}
			// if

			$this->load->model('M_evs_data_approve','meda');
			$this->meda->dma_approve2 = $_SESSION['UsEmp_ID'];
			$emp_app2 = $this->meda->get_emp_app2()->result();
	
				if(sizeof($emp_app2) != 0){
					foreach($emp_app2 as $index => $row){
						$count = $index;
	
						if($count == 0){
							array_push($emp_temp,$row);
							array_push($emp_check,$row->Emp_ID);	
						}
						// if
						else if(!in_array($row->Emp_ID,$emp_check)){
							array_push($emp_temp,$row);
							array_push($emp_check,$row->Emp_ID);
						}
						// else if
	
						if($count == 0){
							array_push($emp_all,$row);
							array_push($emp_check_all,$row->emp_id);
						}
						// if
						else if(!in_array($row->emp_id,$emp_check_all)){
							array_push($emp_all,$row);
							array_push($emp_check_all,$row->emp_id);
						}
						// else if
						
					}
					// foreach
				}
				// if
		
		$dep_temp = [];
		$grade_temp = [];
		$grade_temp_emp = [];

		
		foreach($emp_temp as $row){
			$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
			array_push($dep_temp,$dep);
		}
		// foreach department 
		$count_year = 0;
		$count_index = 0;

		foreach($emp_all as $index => $row){
			$emp_tmp = $row->emp_id;
			
				// echo $emp_tmp . "--" .$all_year[$count_year]->pay_id."<br>";
					
				$this->load->model('M_evs_data_grade','mdtg');
				$this->mdtg->dgr_emp_id = $emp_tmp;
				$this->mdtg->dgr_pay_id = $all_year[$count_year]->pay_id;
				$grade = $this->mdtg->get_by_emp()->result();
				if(sizeof($grade) != 0){
					foreach($grade as $row){
						array_push($grade_temp,$row->dgr_grade);
					}
					// foreach 
				}
				// if 
				else {
					array_push($grade_temp,"-");
				}
				// else
				

			$count_year++;
			$count_index++;

			if(sizeof($all_year) == $count_year){
				$count_year = 0;
				array_push($grade_temp_emp,$grade_temp);
				$grade_temp = [];
			}
			// if
			else if($count_index == sizeof($emp_all)){
				if($count_year != sizeof($all_year)){
					array_push($grade_temp,"-");
					array_push($grade_temp_emp,$grade_temp);
				}
				// if 
				else {
					array_push($grade_temp_emp,$grade_temp);
				}
				// else 
			}
			// else 
		}
		// foreach grade

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$data["grade_info"] = $grade_temp_emp;
		$data["year_info"] = $pay_id;
		$this->output('/consent/ev_report/v_export_history_grade',$data);
	}
	// function report_history_grade_employee_app
	

 function report_work_attendance(){
	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_employee','memp');
	$data['dep_info'] = $this->memp->get_all_department()->result(); 

	$this->output('/consent/ev_report/v_main_work_attendance',$data);
}
// function report_grade_auto


function report_work_attendance_employee($dep_id){

	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_employee','memp');
	$this->memp->Department_id = $dep_id;
	$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
	$temp = $data['dep_temp'];
	$emp_temp = [];
	$emp_check = [];

	foreach($temp as $index => $row){
		if($index == 0){
			$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
			$data["dep_id"] = $row->Department_id;
			$data["dep"] = $row->Department;
		}
		// if

		$dp = $row->Department_id;
		$sc = $row->Section_id;
		$sb = $row->SubSection_id;
		$gr = $row->Group_id;
		$ln = $row->Line_id;

		$count = $index;
		$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

		foreach($emp as $index => $row){
			if($count == 0){
				array_push($emp_temp,$row);
				array_push($emp_check,$row->Emp_ID);
			}
			// if
			else if(!in_array($row->Emp_ID,$emp_check)){
				array_push($emp_temp,$row);
				array_push($emp_check,$row->Emp_ID);
			}
			// else if 
		}
		// foreach
	}
	// foreach 
	$dep_temp = [];
	$grade_temp = [];
	$grade_reasoning = [];
	foreach($emp_temp as $index => $row){
		// echo $row->Sectioncode_ID."<br>";
		$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
		array_push($dep_temp,$dep);
		
	}
	// foreach 

	$data["emp_info"] = $emp_temp;
	$data["dep_info"] = $dep_temp;
	$data["year_info"] = $year;
	$this->output('/consent/ev_report/v_export_work_attendance',$data);
}
// function report_grade_auto_employee

function show_work_attendance($Emp_ID){

	$emp_id = $Emp_ID;
	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_employee','memp');
	$this->memp->Emp_ID = $emp_id;
	$this->memp->emp_pay_id = $pay_id;
	$data['emp_info'] = $this->memp->get_by_empid();
	
	$temp = $data['emp_info']->row();
	$data['dept_info'] = $this->memp->get_dpartment($temp->Sectioncode_ID)->row();

	$this->load->model('M_evs_work_attendance','mwad');
	$this->mwad->wad_emp_id = $temp->emp_id;
	$data['data_Atd'] = $this->mwad->get_data_by_emp_id()->row();

	$this->output('/consent/ev_form/v_show_work_attendance',$data);

}
// function show_work_attendance


function report_work_attendance_employee_group(){

	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_employee','memp');
	$this->memp->Emp_ID = $_SESSION['UsEmp_ID'];
	$this->memp->emp_pay_id = $pay_id;
	$data['emp_info_show'] = $this->memp->get_by_empid();
	$temps = $data['emp_info_show']->row();
	
	$data['dept_info'] = $this->memp->get_dpartment($temps->Sectioncode_ID)->row();
	$tmp_dep = $data['dept_info'];

	$this->load->model('M_evs_group','mgrp');
	$this->mgrp->gru_head_dept = $_SESSION['UsEmp_ID'];
	$data['grp_info'] = $this->mgrp->get_by_head()->row();
	$temp_grp = $data['grp_info'];

	$this->load->model('M_evs_employee','memp');
	$this->memp->Department_id = $tmp_dep->Department_id;
	$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
	$temp = $data['dep_temp'];
	
	$emp_temp = [];
	$emp_check = [];

	foreach($temp as $index => $row){
		if($index == 0){
			$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
			$data["dep_id"] = $row->Department_id;
			$data["dep"] = $row->Department;
		}
		// if

		$dp = $row->Department_id;
		$sc = $row->Section_id;
		$sb = $row->SubSection_id;
		$gr = $row->Group_id;
		$ln = $row->Line_id;

		$count = $index;
		$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

		foreach($emp as $index => $row){
			if($count == 0){
				array_push($emp_temp,$row);
				array_push($emp_check,$row->Emp_ID);
			}
			// if
			else if(!in_array($row->Emp_ID,$emp_check)){
				array_push($emp_temp,$row);
				array_push($emp_check,$row->Emp_ID);
			}
			// else if 
		}
		// foreach
	}
	// foreach 
	$dep_temp = [];
	$grade_temp = [];
	$grade_reasoning = [];
	foreach($emp_temp as $index => $row){
		// echo $row->Sectioncode_ID."<br>";
		$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
		array_push($dep_temp,$dep);

		$this->load->model('M_evs_data_grade','mdtg');
		$this->mdtg->grd_emp_id = $row->emp_id;
		$grade = $this->mdtg->get_data_grade_auto_by_emp()->result();
	}
	// foreach 

	$data["emp_info"] = $emp_temp;
	$data["dep_info"] = $dep_temp;
	$data["year_info"] = $year;
	$this->output('/consent/ev_report/v_export_work_attendance_group',$data);
}
// function report_work_attendance_employee_group


function report_list_of_associate_for_create_MBO(){

	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_excel_report','mexr');
	$this->mexr->erp_pay_id = $pay_id;
	$name = "StatusMBO";
	$data["ex_info"] = $this->mexr->get_by_pay($name)->result();

	$this->load->model('M_evs_employee','memp');
	$data['dep_info'] = $this->memp->get_all_department()->result(); 

	$this->output('/consent/ev_report/v_main_associate_for_create_MBO',$data);
}
// function report_status_mbo


function report_list_of_associate_for_create_MBO_emp ($dep_id){

	$this->load->model('M_evs_pattern_and_year','myear');
	$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	$year = $data['patt_year']->row(); // show value year now
	//end set year now
	$pay_id = $year->pay_id;

	$this->load->model('M_evs_employee','memp');
	$this->memp->Department_id = $dep_id;
	$data['dep_temp'] = $this->memp->get_department_by_id()->result(); 
	$temp = $data['dep_temp'];
	$emp_temp = [];
	$emp_check = [];
	$postion = [];

	$this->load->model('M_evs_position_from','meps');
	$this->meps->ps_form_pe = "MBO";
	$this->meps->ps_pay_id = $pay_id;
	$data['form_temp'] = $this->meps->get_form()->result(); 

	foreach($data['form_temp'] as $row_form){
		array_push($postion,$row_form->ps_pos_id);
		// echo $row_form->Position_name;
	}
	// foreach

	foreach($temp as $index => $row){
		if($index == 0){
			$data["com_info"] = $row->Company." (" . $row->Company_id . ")";
			$data["dep_id"] = $row->Department_id;
			$data["dep"] = $row->Department;
		}
		// if

		$dp = $row->Department_id;
		$sc = $row->Section_id;
		$sb = $row->SubSection_id;
		$gr = $row->Group_id;
		$ln = $row->Line_id;

		$count = $index;
		$emp = $this->memp->get_emp_by_dep($pay_id,$dp,$sc,$sb,$gr,$ln)->result();

		foreach($emp as $index => $row){
			if($count == 0){
				foreach($postion as $row_pos){
					if($row_pos == $row->Position_ID){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
					}
					// if 
				}
				// foreach
			}
			// if
			else if(!in_array($row->Emp_ID,$emp_check)){
				foreach($postion as $row_pos){
					if($row_pos == $row->Position_ID){
						array_push($emp_temp,$row);
						array_push($emp_check,$row->Emp_ID);
					}
					// if 
				}
				// foreach
			}
			// else if 
		}
		// foreach
	}
	// foreach 
	$dep_temp = [];
	$grade_temp = [];
	$status_temp = [];

	foreach($emp_temp as $index => $row){
		// echo $row->Sectioncode_ID."<br>";
		$dep = $this->memp->get_dpartment($row->Sectioncode_ID)->row();
		array_push($dep_temp,$dep);

		$this->load->model('M_evs_data_mbo','medm');
		$this->medm->dtm_emp_id = $row->Emp_ID;
		$this->medm->dtm_evs_emp_id = $row->emp_id;
		$data['mbo_temp'] = $this->medm->get_mbo_by_empID()->result(); 
		$temp_mbo = $data['mbo_temp'];

		if(sizeof($temp_mbo) != 0){

			$this->load->model('M_evs_data_approve','meda');
			$this->meda->dma_dtm_emp_id = $row->Emp_ID;
			$this->meda->dma_emp_id = $row->emp_id;
			$data['app_temp'] = $this->meda->get_app_by_empID()->result(); 

			if(sizeof($data['app_temp']) != 0){
				array_push($status_temp,"2");
			}
			// if 
			else{
				array_push($status_temp,"1");
			}
			// else 
		}	
		// if
		else{
			array_push($status_temp,"0");
		}
		// else


	}
	// foreach 

	$data["emp_info"] = $emp_temp;
	$data["dep_info"] = $dep_temp;
	$data["status_info"] = $status_temp;
	$data["year_info"] = $year;
	$this->output('/consent/ev_report/v_export_associate_for_create_MBO',$data);
}
// function report_status_mbo_employee



}
?>