<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

class Evs_permission extends MainController_avenxo {

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
		
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_employee','mevg');
		$this->mevg->emp_pay_id= $pay_id;
		$data['select'] = $this->mevg->get_all_emp_delete();

		$check = sizeof($data['select']->result());

		if($check != 0){
			$this->output('/consent/ev_permission/v_list_permission_delete',$data);
		}
		// if
		else {
			$this->output('/consent/ev_permission/v_main_permission');
		}
		// else 
		
	}
	// function index()

	function preview()
	{
		$this->output('/consent/ev_permission/v_PCR');
	}

	function PCR_Form()
	{
		$this->output('/consent/ev_permission/v_PCR_Form');
	}
	function PCR_2()
	{
		$this->output('/consent/ev_permission/v_PCR2');
	}
	function table()
	{
		$this->output('/consent/ev_permission/v_list_permission');
	}
	// function table()
	
	function select_Department_PD()
	{
		$grp = $this->input->post("list_grp");
		
		$this->load->model('M_evs_employee','memp');
		$data['dmp_PD'] = $this->memp->get_all_PD();
		
		$this->output('/consent/ev_permission/v_list_permission',$data);
	}
	// function select_Department_PD
	
	function select_date()
	{
		$date = $this->input->post("list_date");
		
		$this->load->model('M_evs_employee','memp');
		$this->memp->Emp_startingdate = $date;
		$data = $this->memp->get_all_emp()->result();
			
		echo json_encode($data);
	}
	// function select_date

	
	function select_emp()
	{

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now

		$data['year'] = $year->pay_id;
		$date = $this->input->post("Date");
		$this->load->model('M_evs_employee','mevg');
		$this->mevg->Emp_startingdate = $date;

		$data['select'] = $this->mevg->get_all_emp();
		$this->output('/consent/ev_permission/v_list_permission',$data);

	}
	// function select_bas

	function insert_emp()
	{

		$empid = $this->input->post("empid");
		$Posid = $this->input->post("Posid");
		$Sectioncode = $this->input->post("Sectioncode");
		$Company = $this->input->post("Company");
		$count = $this->input->post("count_insert");

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		

		
		for($i=0;$i<$count;$i++){
		$this->load->model('Da_evs_employee','deep');
		$this->load->model('M_evs_employee','memp');
		
		$this->deep->emp_employee_id = $empid[$i];
		$this->deep->emp_position_id = $Posid[$i];
		$this->deep->emp_section_code_ID = $Sectioncode[$i];
		$this->deep->emp_company_id = $Company[$i];
		$this->deep->emp_pay_id = $year->pay_id;
		
		$this->memp->Emp_ID = $empid[$i];
		$data['emp_info'] = $this->memp->get_by_Empid_group();
		$tep = $data['emp_info']->row();
		$this->deep->emp_gru_id = $tep->ev_group;
		$this->deep->insert();

		}
		// insert 

		$this->load->model('M_evs_login','miog');
		$data_login = $this->miog->get_all()->result(); // show value year now
		//end set year now
		
		$chack_data_log = 0;
		for($i=0;$i<$count;$i++){
			$chack_data_log = 0;
			foreach($data_login as $index => $row ) { 
				if($empid[$i] == $row->log_user_id){
					$chack_data_log = 1;
				}
			}
			if($chack_data_log == 0){
				$this->miog->log_user_id = $empid[$i];
				$this->miog->log_password = $empid[$i];
				$this->miog->log_role = 1;
				$this->miog->insert();
			}// if
		}
		// for
		$data = $empid;
		echo json_encode($data);

	} // function insert_emp

	function delete_emp($pay_id){
      
		$this->load->model('M_evs_employee','mevg');
		$this->mevg->emp_pay_id= $pay_id;
		$data['select'] = $this->mevg->get_all_emp_delete();

		$this->output('/consent/ev_permission/v_list_permission_delete',$data);
	}
	// delete_emp()

	function select_emp_delete(){
		$emp_id = $this->input->post('emp_id');
		$this->load->model('Da_evs_employee','deemp');
		$this->deemp->emp_id = $emp_id;
		$this->deemp->delete();

		echo json_encode($status);

		
	}
	// select_emp_delete



 


}
?>