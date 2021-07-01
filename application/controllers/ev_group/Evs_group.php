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
		$this->select_company_sdm();

		$this->load->model('M_evs_login','miog');
		$data_login = $this->miog->get_all()->result();
		$chack_data_log = 0;

			foreach($data_login as $index => $row ) { 

				if($Emp_id == $row->log_user_id){
					$chack_data_log = 1;
				}
				// if
			}
			// foreach 

			if($chack_data_log == 1){
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->updatte_role();
			}
			// if
			else{
				$this->load->model('M_evs_login','miog');
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_password = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->insert();
			}
			// else 
	
	}
	// function add_group_sdm

	/*
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-19
	*/
	function add_group_skd()
	{
		$group = $this->input->post("group");
		$Emp_id = $this->input->post("Emp_id");
		
		$this->load->model('M_evs_group','meg');
		$this->meg->gru_name = $group;
		$this->meg->gru_head_dept = $Emp_id;
		$this->meg->gru_company_id = 2;
		$this->select_company_skd();
		$this->meg->insert();

		$this->load->model('M_evs_login','miog');
		$data_login = $this->miog->get_all()->result();
		$chack_data_log = 0;

			foreach($data_login as $index => $row ) { 

				if($Emp_id == $row->log_user_id){
					$chack_data_log = 1;
				}
				// if
			}
			// foreach 

			if($chack_data_log == 1){
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->updatte_role();
			}
			// if
			else{
				$this->load->model('M_evs_login','miog');
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_password = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->insert();
			}
			// else 
		
	}
	// function add_group_skd

	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-19
	*/
	function select_company_sdm()
	{
		$this->load->model('M_evs_group','mevg');
		$this->mevg->gru_company_id = 1;
		$data['grp_sdm'] = $this->mevg->get_all_com();
		
		$this->output('/consent/ev_group/v_main_group_sdm',$data);
	}
	// function select_company_sdm
	
	/*
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-23
	*/
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
	* @Create Date 2564-04-22
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
	* @Create Date 2564-04-22
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
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-19
	*/
	function search_by_employee_id_sdm(){
		$Emp_id = $this->input->post('Emp_id');
		$this->load->model('M_evs_group','mevg');
		$this->mevg->Emp_ID = $Emp_id;
		$this->mevg->gru_company_id = 1;
		$data = $this->mevg->get_name_emp_by_IDemp_sdm();
		echo json_encode($data);
	}
	// function search_by_employee_id_sdm

	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-19
	*/
	function search_by_employee_id_skd(){
		$Emp_id = $this->input->post('Emp_id');
		$this->load->model('M_evs_group','mevg');
		$this->mevg->Emp_ID = $Emp_id;
		$this->mevg->gru_company_id = 2;
		$data = $this->mevg->get_name_emp_by_IDemp_skd();
		echo json_encode($data);
	}
	// function search_by_employee_id_skd

	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-26
	*/
	function save_edit_sdm()
	{
		$gru_id = $this->input->post('gru_id');
		$group = $this->input->post("grouptext");
		$Emp_id = $this->input->post("Emp_id");

		$this->load->model('Da_evs_group','sedt');
		$this->sedt->gru_id = $gru_id;
		$this->sedt->gru_name = $group;
		$this->sedt->gru_head_dept = $Emp_id;
		$this->sedt->gru_company_id = 1;
		$this->sedt->update();
				
		$this->load->model('M_evs_login','miog');
		$data_login = $this->miog->get_all()->result();
		$chack_data_log = 0;

			foreach($data_login as $index => $row ) { 

				if($Emp_id == $row->log_user_id){
					$chack_data_log = 1;
				}
				// if
			}
			// foreach 

			if($chack_data_log == 1){
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->updatte_role();
			}
			// if
			else{
				$this->load->model('M_evs_login','miog');
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_password = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->insert();
			}
			// else 

			$data = "update group";

			echo json_encode($data);
			
	}
	// function save_edit_sdm


	/*
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-26
	*/
	function save_edit_skd()
	{

		$gru_id = $this->input->post('gru_id');
		$group = $this->input->post("group_text");
		$Emp_id = $this->input->post("Emp_id");

		$this->load->model('Da_evs_group','sav_edit');
		$this->sav_edit->gru_id = $gru_id;
		$this->sav_edit->gru_name = $group;
		$this->sav_edit->gru_head_dept = $Emp_id;
		$this->sav_edit->gru_company_id = 2;
		$this->sav_edit->update();

		$this->load->model('M_evs_login','miog');
		$data_login = $this->miog->get_all()->result();
		$chack_data_log = 0;

			foreach($data_login as $index => $row ) { 

				if($Emp_id == $row->log_user_id){
					$chack_data_log = 1;
				}
				// if
			}
			// foreach 

			if($chack_data_log == 1){
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->updatte_role();
			}
			// if
			else{
				$this->load->model('M_evs_login','miog');
				$this->miog->log_user_id = $Emp_id;
				$this->miog->log_password = $Emp_id;
				$this->miog->log_role = 2;
				$this->miog->insert();
			}
			// else 
			
			$data = "save_edit_sdm";
			echo json_encode($data);


		$this->select_company_skd();
	}
	// function save_edit_skd

	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-27
	*/
	function select_group_company_sdm($gru_id)
	{
		$this->load->model('M_evs_group','mgc');
		$this->mgc->gru_company_id = 1;
		$data['gcp_gcm'] = $this->mgc->get_all_com();

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_group','mevg');
		$this->mevg->emp_gru_id = $gru_id;
		$this->mevg->emp_pay_id = $pay_id;
		$data['group_sdm'] = $this->mevg->get_group();
		
		$this->mevg->gru_id = $gru_id;
		$data['grpsdm'] = $this->mevg->get_by_id();
		$this->output('/consent/ev_group/v_add_group_sdm',$data);
	}
	// function select_group_company_sdm   

	/*
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-27
	*/
	function select_group_company_skd($gru_id)
	{
		$this->load->model('M_evs_group','mdk');
		$this->mdk->gru_company_id = 2;
		$data['gcp_gkd'] = $this->mdk->get_all_com();

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_group','mevg');
		$this->mevg->emp_gru_id = $gru_id;
		$this->mevg->emp_pay_id = $pay_id;
		$data['group_skd'] = $this->mevg->get_group();
		$this->mevg->gru_id = $gru_id;
		$data['grpskd'] = $this->mevg->get_by_id();
		$this->output('/consent/ev_group/v_add_group_skd',$data);
		
	}
	// function select_group_company_skd

	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-26
	*/
	function get_group_sdm()
	{
		$this->load->model('M_evs_group','mggp');
		$this->mggp->gru_company_id = 1;
		$data = $this->mggp->get_all_group()->result();
		echo json_encode($data);
	}
	// get_group_sdm

	/*
	* @author  Tippawan Aiemsaad
	* @Create Date 2564-04-26
	*/
	function get_group_skd()
	{
		$this->load->model('M_evs_group','mggp');
		$this->mggp->gru_company_id = 2;
		$data = $this->mggp->get_all_group()->result();
		echo json_encode($data);
	}
	// get_group_skd

	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-27
	*/	
	function query_man(){
		$gru_id = $this->input->post('gru_id');

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_group','mevg');
		$this->mevg->emp_gru_id = $gru_id;
		$this->mevg->emp_pay_id = $pay_id;
		$data = $this->mevg->get_group()->result();
		echo json_encode($data);

	}
	// query_man ข้อมูลของพนักงาน

	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-27
	*/	
	function query_man_new(){
		$gru_id = $this->input->post('gru_id');

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;


		$this->load->model('M_evs_group','mevg');
		$this->mevg->emp_gru_id = $gru_id;
		$this->mevg->emp_pay_id = $pay_id;
		$data = $this->mevg->get_group()->result();
		echo json_encode($data);

	}
	// query_man_new
		
	/*
	* @author  Jirayu Jaravichit
	* @Create Date 2564-04-27
	*/	
	function add_new_group()
	{

		
		$group = $this->input->post('group');
		$get_emp = $this->input->post("get_emp");
		$count = $this->input->post("count");
		

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->load->model('M_evs_group','egs');
		for ($i = 0; $i < $count; $i++) {
			$this->egs->emp_gru_id = $group;
			$this->egs->emp_employee_id = $get_emp[$i];
			$this->egs->emp_pay_id = $pay_id;
			$this->egs->update_group();
		}
		// for

		$data = "save_edit_sdm";
		echo json_encode($get_emp);
	}
	// function add_new_group
}
?>