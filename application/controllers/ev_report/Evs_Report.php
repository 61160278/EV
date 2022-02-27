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

			$this->load->model('M_evs_position_from','mpf');
			$this->mpf->ps_pos_id = $row->Position_ID;
			$this->mpf->ps_pay_id = $pay_id;
			$form = $this->mpf->get_all_by_key_by_year()->row();
			array_push($grade_temp,$form);
		}
		// foreach 

		$data["emp_info"] = $emp_temp;
		$data["dep_info"] = $dep_temp;
		$this->output('/consent/ev_report/v_export_payroll',$data);
	}
	// function report_payroll

	

}
?>