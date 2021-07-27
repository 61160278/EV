<?php
/*
* Evs_Controller
* Form Management
* @input  -   
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* Evs_Controller
* Form Management
* @input  -   
* @output -
* @author Piyasak Srijan	
* @Update Date 2563-10-1
*/
/*
* Evs_Controller
* Form Management
* @input  -   
* @output -
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-2
*/
/*
* Evs_Controller
* Form Management
* @input  -   
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 256310-5
*/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

/*
* Evs_Controller
* Form Management
* @author 	Piyasak
* @Create Date 2563-09-01
*/
/*
* Evs_Controller
* Form Management
* @input  -   
* @output -
* @author Piyasak Srijan	
* @Update Date 2563-10-1
*/
/*
* Evs_Controller
* Form Management
* @input  -   
* @output -
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-2
*/
/*
* Evs_Controller
* Form Management
* @input  -   
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 256310-5
*/
class Evs_Controller extends MainController {

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
	* 
	* @input 
	* @output 
	* @author 	Piyasak Sriajn
	* @Create Date 2563-09-01
	*/
	function index()
	{
		$this->output('Main_index');
	}
	// function index()
 
	/*
	* index
	* Form Management
	* @input  -
	* @output -
	* @author Piyasak Sriajn
	* @Create Date 2563-09-01
	*/
	function main_manage_form(){

		$this->load->model('M_evs_position','mpos');
		$data['info_pos'] = $this->mpos->get_all(); //show value position all

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now all

		$this->output('/consent/Main_manageform',$data);
	}
	// function index()


	function insert_year_pattern(){
		$yap_year = $this->input->post('fisical_year'); //fiscal year
		$yap_pattern = $this->input->post('ptn_grade'); // pattern grade

		$this->load->model('Da_evs_pattern_and_year','depy');
		$this->depy->pay_year = $yap_year;
		$this->depy->pay_pattern = $yap_pattern;
		$this->depy->insert();
		
		header("Location: " . base_url() . 'Evs_Controller/main_manage_form');
	}
	// function index()
}
