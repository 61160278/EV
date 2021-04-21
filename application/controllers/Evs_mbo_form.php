<?php
/*
* Evs_form_mbo 
* Form Management of Position
* @input  -   
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

/*
* Evs_form 
* Form Management of Position
* @input  -   
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
class Evs_mbo_form extends MainController {

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
	* form_mbo
	* MBO Managnement Form
	* @input  -
	* @output Display v_mbo_form_insert
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-25
	*/
	function form_mbo($pos_id,$year_id){
		$this->load->model('M_evs_set_form_mbo','msfm');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');
		$this->load->model('M_evs_position_from','mpf');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); // show value pattern and year by year_id
		$data['info_pos'] = $this->mpos->get_all(); // show value position all
		$data['info_pos_id'] = $pos_id; // show value position all by id

		$this->msfm->sfm_pos_id = $pos_id;
		$this->msfm->sfm_pay_id = $year_id;
		$data['info_pos_form_mbo'] = $this->msfm->get_all_by_key_by_year(); // show value position by form MBO by year

		$this->mpf->ps_pos_id = $pos_id;
		$this->mpf->ps_pay_id = $year_id;
		$data['info_position_form'] = $this->mpf->get_all_by_key_by_year(); // show value position by form MBO by year

		foreach($data['info_position_form']->result() as $row){ 
			//start if
			if($row->ps_status_set_form_pe == 1){
				$this->output("consent/form/v_mbo_form_insert",$data);
			}
			else if($row->ps_status_set_form_pe == 2){
				$this->output("consent/form/v_mbo_form_edit",$data);
			}
			// end if-else
		}
	
	}
	//function form_mbo()

	/*
	* index_mbo_insert
	* insert index mbo form, position ID to database
	* @input index mbo, position ID
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2563-10-19
	*/
	function index_mbo_insert(){
		$this->load->model('Da_evs_set_form_mbo','dsfm');
		$this->dsfm->sfm_index_field = $this->input->post('index_mbo');
		$this->dsfm->sfm_pos_id = $this->input->post('pos_id');
		$this->dsfm->sfm_pay_id = $this->input->post('year_id');
		$this->dsfm->insert();

	}
	//function index_mbo_insert_()

	/*
	* index_mbo_update
	* update index mbo form, position ID to database
	* @input index mbo, position ID
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2563-10-19
	*/
	function index_mbo_update(){
		$this->load->model('Da_evs_set_form_mbo','dsfm');
		$index_field = $this->input->post('index_mbo'); //index field of MBO form
		$pos_id = $this->input->post('pos_id'); // position id
		$year_id = $this->input->post('year_id'); // year id
		$this->dsfm->sfm_pos_id = $pos_id;
		$this->dsfm->get_by_key($pos_id);
		$this->dsfm->sfm_pay_id = $year_id;
		$this->dsfm->sfm_index_field = $index_field;
		$this->dsfm->sfm_pos_id = $pos_id;
		$this->dsfm->update();

	}
	//function index_mbo_update()

	/*
	* get_mbo_form
	* get mbo form data from database
	* @input -
	* @output mbo form by position data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-30
	*/
	function get_mbo_form(){
		$this->load->model('Da_evs_set_form_mbo','dsfm');
		$pos_id = $this->input->post('pos_id'); //position id
		$year_id = $this->input->post('year_id'); // year id
		$data = $this->dsfm->get_by_key($pos_id,$year_id)->result();
		echo json_encode($data);
	}
	//get_mbo_form()

}
?>
