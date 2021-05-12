<?php
/*
* Evs_g_and_o_form 
* Form G&O Management of Position
* @input  -   
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Evs_form.php");

/*
* Evs_g_and_o_form 
* Form G&O Management of Position
* @input  -   
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
class Evs_gcm_form extends MainController {

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
	* form_gcm
	* G&O Managnement Form
	* @input  -
	* @output Display v_g_and_o_form_insert
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-01
	*/
	/*
	* form_gcm
	* G&O Managnement Form
	* @input  -
	* @output Display v_g_and_o_form_insert
	* @author Piyasak Srijan
	* @Update Date 2563-12-30
	*/
	function form_gcm($pos_id,$year_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');
		// $this->load->model("M_evs_set_Evs_gcm","msfg");

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_id'] = $pos_id; // show value position by id
		$data['info_year_id'] = $year_id; // show value year_id
		
		$this->dpf->sfg_pos_id = $pos_id;
		$this->dpf->sfg_pay_id = $year_id;
		$data['qu_form'] = $this->dpf->get_by_key()->result(); // show value position by id by year_id

		// $this->msfg->sfg_pos_id = $pos_id;
		// $this->msfg->sfg_pay_id = $year_id;
		// $data['info_pos_form'] = $this->msfg->get_all_by_key_by_year(); // show value position form G&O by id by year_id
		
		// if(count($data['info_pos_form']->result()) == 0){
			$this->output("consent/form/v_gcm_form_insert",$data);
		// }else{
			// $this->output("consent/form/v_g_and_o_form_edit",$data);
		// }	
	}
	//function Evs_gcm_()

}
?>