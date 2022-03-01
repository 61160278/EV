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
	function report_payroll()
	{

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_excel_report','mexr');
		$this->mexr->erp_pay_id = $pay_id;
		$data["ex_info"] = $this->mexr->get_by_pay()->result();

		$this->load->model('M_evs_employee','memp');
		$data['dep_info'] = $this->memp->get_all_department()->result(); 

		$this->output('/consent/ev_report/v_main_report_payroll',$data);
	}
	// function report_payroll

	function report_payroll_employee($dep_id)
	{

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

		$this->load->model('M_evs_excel_report','mexr');
		$this->mexr->erp_excel_name = $name_dep;
		$this->mexr->erp_pay_id = $pay_id;
		$data["ex_info"] = $this->mexr->get_by_pay_name()->result();

		if(sizeof($data["ex_info"]) == 0){
			$this->load->model('Da_evs_excel_report','dexr');
			$this->dexr->erp_excel_name = $name_dep;
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

	

}
?>