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
		$this->output('/consent/ev_report/v_main_report_payroll');
	}
	// function report_payroll

}
?>