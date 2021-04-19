
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController_avenxo.php");

/*
* Evs_form
* Form
* @author 	Kunanya Singmee
* @Create Date 2564-04-05
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
	function add_quota()
	{
		$this->output('/consent/ev_quota/v_add_quota');
	}
	// function add_quota()
	
	/*
	* hd_report_curve
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-06
	*/
	function hd_report_curve()
	{
		$pos_psl_id = $this->input->post('pos_psl_id'); //position id
		$this->output('/consent/ev_quota/v_hd_report_curve');
	}
	// function hd_report_curve()
	
	/*
	* hr_report_curve
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-06
	*/
	function hr_report_curve()
	{
		$this->output('/consent/ev_quota/v_hr_report_curve');
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
		$this->output('/consent/ev_quota/v_manage_quota');
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
	function hd_quota_evaluation_status()
	{
		$this->output('/consent/ev_quota/v_hd_quota_evaluation_status');
	}
	// function hd_quota_evaluation_status()
	
	/*
	* hr_quota_evaluation_status
	* @input
	* @output 
	* @author 	Piyasak Srijan
	* @Create Date 2564-04-07
	*/
	function hr_quota_evaluation_status()
	{
		$this->output('/consent/ev_quota/v_hr_quota_evaluation_status');
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
	
}
?>