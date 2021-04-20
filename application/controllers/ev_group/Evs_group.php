
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

class Evs_group extends MainController_avenxo {

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
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-06
	*/
	function index()
	{
		$this->output('/consent/ev_group/v_select_company');
	}
	// function index
	
	/*
	* Evs_form
	* Form
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-07
	*/
	function add_group_sdm()
	{
		$group = $this->input->post("group");
		$Emp_id = $this->input->post("Emp_id");
		
		$this->load->model('M_evs_group','meg');
		$this->meg->gru_name = $group;
		$this->meg->gru_head_dept = $Emp_id;
		$this->meg->gru_company_id = 1;
		$this->meg->insert();
		$this->meg->connect();
	
	}
	// function add_group_sdm

	function add_group_skd()
	{
		$group = $this->input->post("group");
		$Emp_id = $this->input->post("Emp_id");
		
		$this->load->model('M_evs_group','meg');
		$this->meg->gru_name = $group;
		$this->meg->gru_head_dept = $Emp_id;
		$this->meg->gru_company_id = 2;
		$this->meg->insert();
		$this->output('/consent/ev_group/v_add_group_skd');
	}
	// function add_group_skd
	
	function select_company_sdm()
	{
		$this->load->model('M_evs_group','mevg');
		$this->mevg->gru_company_id = 1;
		$data['grp_sdm'] = $this->mevg->get_all_com();
		
		$this->output('/consent/ev_group/v_main_group_sdm',$data);
	}
	// function select_company_sdm
	
	function select_company_skd()
	{
		$this->load->model('M_evs_group','mevg');
		$this->mevg->gru_company_id = 2;
		$data['grp_sdm'] = $this->mevg->get_all_com();
		$this->output('/consent/ev_group/v_main_group_skd',$data);
	}
	// function select_company_skd
	
	
	/*
	* Evs_form
	* Form
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-16
	*/
	
	function delete_group_sdm()
	{

		$gru_id = $this->input->post('gru_id');
		$this->load->model('Da_evs_group','degd');
		$this->degd->gru_id = $gru_id;
		$this->degd->delete();

		echo json_encode($status);
	}
	// function delete_group_sdm
	
	/*
	* Evs_form
	* Form
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-17
	*/
	function delete_group_skd()
	{

		$gru_id = $this->input->post('gru_id');
		$this->load->model('Da_evs_group','degd');
		$this->degd->gru_id = $gru_id;
		$this->degd->delete();

		echo json_encode($status);
	}
	// function delete_group_skd
	
	/*
	* Evs_form
	* Form
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-19
	*/
	function search_by_employee_id(){
		$empid = $this->input->post('empid');
		$this->load->model('M_evs_group','mevg');
		$this->mevg->Emp_ID = $empid;
		echo json_encode($this->mevg->get_name_emp_by_IDemp());
	}
	// function search_by_employee_id


	function save_edit_sdm()
	{
		$gru_id = $this->input->post('gru_id');
		$empid = $this->input->post('empid');

		$this->load->model('Da_evs_group','sedt');
		$this->sedt->gru_id = $gru_id;
		$this->sedt->gru_head_dept = $Emp_id;
		$this->sedt->update();

		echo json_encode($status);
	}
	// function save_edit_sdm



	/*
	* Evs_form
	* Form
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-19
	*/
	function save_edit_skd()
	{

		$this->load->model('Da_evs_group','sve_edt');
		$sve_edt = $this->input->post('sve_edt');
		$this->sve_edt->update();

		echo json_encode($status);
	}
	// function save_edit_skd
	
	
		
		
		
		
	
	
}
?>