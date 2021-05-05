
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
*/

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Update Date 2564-04-20
*/

class Evs_quota extends MainController_avenxo {

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
		$this->output('/consent/ev_quota/v_main_quota');
	}
	// function index()
	
	/*
	* add_quota
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-05
	*/
	function add_quota_ca()
	{
		$this->output('/consent/ev_quota/v_add_quota');
	}
	// function add_quota()
	
	/*
	* add_quota
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-05
	*/
	function add_quota_pa()
	{
		$this->output('/consent/ev_quota/v_add_quota_pa');
	}
	
	/*
	* hd_report_curve
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Update Date 2564-04-20
	*/
	function hd_report_curve()
	{
		$this->load->model('M_evs_position','meps');
		$data['pos_data'] = $this->meps->get_all()->result(); // show value position all
		
		$this->output('/consent/ev_quota/v_hd_report_curve',$data);
	}
	// function hd_report_curve()
	
	/*
	* hr_report_curve
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Update Date 2564-04-20
	*/
	function hr_report_curve()
	{
		$this->load->model('M_evs_department','mdep');
		$data['dep_data'] = $this->mdep->get_all(); // show value department all
		$this->load->model('M_evs_position','meps');
		$data['pos_data'] = $this->meps->get_all()->result(); // show value position all
		$this->load->model('M_evs_company','mcpn');
		$data['com_data'] = $this->mcpn->get_all(); // show value company all
		
		$this->output('/consent/ev_quota/v_hr_report_curve',$data);
	}
	// function hr_report_curve()
	
	/*
	* manage_quota
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-06
	*/
	function manage_quota()
	{
		$this->load->model('M_evs_department','mdep');
		$data['dep_data'] = $this->mdep->get_all(); // show value department all

		$this->load->model('M_evs_position_level','mepsl');
		$data['psl_data'] = $this->mepsl->get_all(); // show value position level all

		$this->load->model('M_evs_position','meps');
		$data['pos_data'] = $this->meps->get_pos_com_dep(); // show value position all

		$this->load->model('M_evs_company','mcpn');
		$data['com_data'] = $this->mcpn->get_all(); // show value company all

		
		$this->output('/consent/ev_quota/v_manage_quota',$data);
	}
	// function manage_quota(
	
	/*
	* detail_quota
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-07
	*/
	function detail_quota()
	{
		$this->output('/consent/ev_quota/v_detail_quota');
	}
	// function detail_quota(
	
	/*
	* hd_quota_evaluation_status
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-07
	*/
	
	/*
	* hd_quota_evaluation_status
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Update Date 2564-04-20
	*/
	function hd_quota_evaluation_status()
	{
		$this->load->model('M_evs_position','meps');
		$data['pos_data'] = $this->meps->get_all()->result(); // show value position all
		
		$this->output('/consent/ev_quota/v_hd_quota_evaluation_status',$data);
	}
	// function hd_quota_evaluation_status()
	
	/*
	* hr_quota_evaluation_status
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-07
	*/
	
	/*
	* hr_quota_evaluation_status
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Update Date 2564-04-20
	*/
	function hr_quota_evaluation_status()
	{
		$this->load->model('M_evs_position','meps');
		$data['pos_data'] = $this->meps->get_all()->result(); // show value position all
		$this->load->model('M_evs_company','mcpn');
		$data['com_data'] = $this->mcpn->get_all()->result(); // show value company all
		
		$this->output('/consent/ev_quota/v_hr_quota_evaluation_status',$data);
	}
	// function hr_quota_evaluation_status()
	
	/*
	* edit_quota
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-07
	*/
	function edit_quota()
	{
		$this->output('/consent/ev_quota/v_edit_quota');
	}
	// function edit_quota()

	function get_depamant(){
		
		$dep_sel = $this->input->post("dep_id");
		$this->load->model('M_evs_position','mpos');
		if( $dep_sel == 1 || $dep_sel == 2){
			$this->mpos->Company_ID = $dep_sel;
			$data = $this->mpos->get_department_by_id()->result();	
		}else{
		$data = $this->mpos->get_department()->result();
		}
		echo json_encode($data);
	}

	
}
	function get_position_level(){
		$pos_sel = $this->input->post("position_level_id");
		 $this->load->model('M_evs_position','mpos');
		// if($pos_sel == 0 ){
			
		 	$data = $this->mpos->get_position_all()->result();
		// }
		// else{
		// 	$this->mpos->pos_psl_id = $pos_sel;
		// 	$data = $this->mpos->get_position_level_by_pls_id()->result(); 		
		// }	
			echo json_encode($data);
	}

?>