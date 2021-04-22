
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
		$this->output('/consent/ev_permission/v_main_permission');
	}
	// function index()
	
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
		$count = $this->input->post("count");
		
		$this->load->model('Da_evs_employee','deep');
		for($i=0;$i<$count;$i++){

		$this->deep->emp_employee_id = $empid[$i];
		$this->deep->emp_position_id = $Posid[$i];
		$this->deep->emp_section_code_ID = $Sectioncode[$i];
		$this->deep->emp_company_id = $Company[$i];

		$this->deep->emp_pay_id = 2;
		$this->deep->emp_ghr_id = 1;
		$this->deep->insert();

		}
		//emp_employee_id,emp_company_id,emp_position_id,emp_section_code_ID,emp_pay_id,emp_ghr_id	
	} // function insert_emp

	function delete_emp()
	{
		$this->output('/consent/ev_permission/v_list_permission_delete');
	}
	// delete_emp()

	function select_emp_delete()
	{
		$date = $this->input->post("Date");
		$this->load->model('M_evs_employee','mevg');
		$this->mevg->Emp_startingdate = $date;
		
		
		
		$data['select'] = $this->mevg->get_all_emp();
		$this->output('/consent/ev_permission/v_list_permission_delete',$data);
	}
	// select_emp_delete



 


}
?>