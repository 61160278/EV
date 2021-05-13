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
		$this->load->model('M_evs_quota','mqut');
 		$data['qut_data'] = $this->mqut->get_all()->result(); // show value quota all
		$this->output('/consent/ev_quota/v_main_quota',$data);
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
		// $this->load->model('M_evs_quota','mqut');
 		// $data['qut_data'] = $this->mqut->get_quota_plan()->result(); 
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
	function edit_quota_ca($qut_id)
	{
		$this->load->model('M_evs_quota','mqut');
		$this->mqut->qut_id = $qut_id;
		$data['qut_data'] = $this->mqut->get_quota_id(); // show value quota to edit
		$this->output('/consent/ev_quota/v_edit_quota',$data);
	}
	// function edit_quota()

	/*
	* edit_quota_pa
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-07
	*/
	function edit_quota_pa()
	{
		$this->output('/consent/ev_quota/v_edit_quota_pa');
	}

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
	function get_position_level(){
		$pos_sel = $this->input->post("position_level_id");
		 $this->load->model('M_evs_position','mpos');
		if($pos_sel == 0 ){
			
		 	$data = $this->mpos->get_position_all()->result();
		}
		else{
			$this->mpos->pos_psl_id = $pos_sel;
			$data = $this->mpos->get_position_level_by_pls_id()->result(); 		
		}	
			echo json_encode($data);
	}

function get_search_data(){
	$pos_lv_select ="";
	$com_select = "";
	$dep_sel ="";
	$pos_select ="";

	$com_select = $this->input->post("com_select");
	$dep_sel = $this->input->post("dep_sel");
	$pos_lv_select = $this->input->post("pos_lv_select");
	$pos_select = $this->input->post("pos_select");
	
		$this->load->model('M_evs_position','mpos');	

		if ($com_select == "3"){

			$this->mpos->Company_ID = '1 OR employee.Company_ID = 2';

		}else{

			$this->mpos->Company_ID = $com_select;

		}
		$this->mpos->Dep_id = $dep_sel;
		$this->mpos->psl_id = $pos_lv_select;
		$this->mpos->Position_ID = $pos_select;
		$data = $this->mpos->get_pos_com_dep()->result();
		echo json_encode($data);

}//get_search_data

function all_data(){
	$this->load->model('M_evs_position','mpos');
	$data = $this->mpos->get_pos_com_dep_all()->result();
		echo json_encode($data);
}//all_data()

function all_position(){
	$this->load->model('M_evs_position','mpos');
	$data['pos_data'] = $this->meps->get_position()->result();
	$this->output('/consent/ev_quota/v_hr_report_cureve',$data);
}//all_data()

function quota_insert(){
	$qut_type = $this->input->post("quotaType"); // quota type
	$qut_pos = $this->input->post("groupPosition"); //group position of quota
	$qut_date = $this->input->post("savedate"); // date save
	$qut_grad_S = $this->input->post("gradeS"); // date sav
	$qut_grad_A = $this->input->post("gradeA"); // date sav
	$qut_grad_B = $this->input->post("gradeB"); // date sav
	$qut_grad_B_N = $this->input->post("gradeB_N"); // date sav
	$qut_grad_C = $this->input->post("gradeC"); // date sav
	$qut_grad_D = $this->input->post("gradeD"); // date sav
	$qut_total = $this->input->post("sum_quota"); // date sav
		$this->load->model("Da_evs_quota","dqut");

		$this->dqut->qut_id = $qut_id;
		$this->dqut->qut_type = $qut_type;
		$this->dqut->qut_pos = $qut_pos;
		$this->dqut->qut_date = $qut_date;
		$this->dqut->qut_grad_S = $qut_grad_S;
		$this->dqut->qut_grad_A = $qut_grad_A;
		$this->dqut->qut_grad_B = $qut_grad_B;
		$this->dqut->qut_grad_B_N = $qut_grad_B_N;
		$this->dqut->qut_grad_C = $qut_grad_C;
		$this->dqut->qut_grad_D = $qut_grad_D;
		$this->dqut->qut_total = $qut_total;
		
		$this->dqut->insert();
		echo json_encode("Success by insert");

}//quota_insert
// function show_data_main_quota()
// 	{
// 		$this->load->model('M_evs_quota','mqut');
// 		$data['qut_data'] = $this->mqut->get_all()->result(); // show value position all
// 		$this->output('/consent/ev_quota/v_main_quota',$data);
// 		//echo json_encode($data);
	
// 	}//show_data_main_quota

function quota_plan_insert(){

	$qup_grad_S = $this->input->post("qup_gradeS");
	$qup_grad_A = $this->input->post("qup_gradeA"); 
	$qup_grad_B = $this->input->post("qup_gradeB"); 
	$qup_grad_B_N = $this->input->post("qup_gradeB_N");
	$qup_grad_C = $this->input->post("qup_gradeC"); 
	$qup_grad_D = $this->input->post("qup_gradeD"); 
	$qup_total = $this->input->post("sum_quota_plan"); 

		$this->load->model("Da_evs_quota_plan","dqup");
		
		$this->dqup->qup_id = $qup_id;
		$this->dqup->qup_grad_S = $qup_grad_S;
		$this->dqup->qup_grad_A = $qup_grad_A;
		$this->dqup->qup_grad_B = $qup_grad_B;
		$this->dqup->qup_grad_B_N = $qup_grad_B_N;
		$this->dqup->qup_grad_C = $qup_grad_C;
		$this->dqup->qup_grad_D = $qup_grad_D;
		$this->dqup->qup_total = $qup_total;
		
		$this->dqup->insert();
		echo json_encode("Success by insert");

}//quota_plan_insert

function quota_actual_insert(){

	$qua_grad_S = $this->input->post("qua_gradeS");
	$qua_grad_A = $this->input->post("qua_gradeA"); 
	$qua_grad_B = $this->input->post("qua_gradeB"); 
	$qua_grad_B_N = $this->input->post("qua_gradeB_N");
	$qua_grad_C = $this->input->post("qua_gradeC"); 
	$qua_grad_D = $this->input->post("qua_gradeD"); 
	$qua_total = $this->input->post("sum_actual"); 

		$this->load->model("Da_evs_quota_actual","dqua");
		
		$this->dqua->qua_id = $qua_id;
		$this->dqua->qua_grad_S = $qua_grad_S;
		$this->dqua->qua_grad_A = $qua_grad_A;
		$this->dqua->qua_grad_B = $qua_grad_B;
		$this->dqua->qua_grad_B_N = $qua_grad_B_N;
		$this->dqua->qua_grad_C = $qua_grad_C;
		$this->dqua->qua_grad_D = $qua_grad_D;
		$this->dqua->qua_total = $qua_total;
		
		$this->dqua->insert();
		echo json_encode("Success by insert");
}//quota_actual_insert()

function delete_quota(){

	$qut_id = $this->input->post('qut_id');
	$this->load->model('Da_evs_quota','dqut');
	$this->dqut->qut_id = $qut_id;
	$this->dqut->delete();
	echo json_encode("Success by insert");
}//delete_quota
function edit_quota(){

	$qut_grad_S = $this->input->post("gradeS"); // date sav
	$qut_grad_A = $this->input->post("gradeA"); // date sav
	$qut_grad_B = $this->input->post("gradeB"); // date sav
	$qut_grad_B_N = $this->input->post("gradeB_N"); // date sav
	$qut_grad_C = $this->input->post("gradeC"); // date sav
	$qut_grad_D = $this->input->post("gradeD"); // date sav
	$qut_total = $this->input->post("sum_quota"); // date sav
		$this->load->model("Da_evs_quota","dqut");

		$this->dqut->qut_id = $qut_id;
		$this->dqut->qut_type = $qut_type;
		$this->dqut->qut_pos = $qut_pos;
		$this->dqut->qut_date = $qut_date;
		$this->dqut->qut_grad_S = $qut_grad_S;
		$this->dqut->qut_grad_A = $qut_grad_A;
		$this->dqut->qut_grad_B = $qut_grad_B;
		$this->dqut->qut_grad_B_N = $qut_grad_B_N;
		$this->dqut->qut_grad_C = $qut_grad_C;
		$this->dqut->qut_grad_D = $qut_grad_D;
		$this->dqut->qut_total = $qut_total;
		
		$this->dqut->update();
	


}

}// end class
?>