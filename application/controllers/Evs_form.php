<?php
/*
* Evs_form 
* Form Management of Position
* @input  -   
* @output -
* @author 	Tanadon Tangjaimongkhon
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
class Evs_form extends MainController {

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
	* main_form
	* Display Form
	* @input  -
	* @output Display v_form_index 
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-15
	*/
	function main_form(){
		$this->load->model('M_evs_position_level','mpos');
		$data['info_pos_lv'] = $this->mpos->get_all();
		
		$this->output("consent/form/v_form_index",$data);
	}
	// function main_form()

	/*
	* preview_form
	* Display Form
	* @input  -
	* @output Display v_preview_form 
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-02-10
	*/
	function preview_form($pos_id,$year_id){
		$this->load->model('M_evs_position_from','mpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_expected_behavior','mept');
		$this->load->model('M_evs_identification','midf');
		$this->load->model('M_evs_set_form_attitude','mstf');
		$this->load->model('M_evs_set_form_ability','msfa');
		$this->load->model('M_evs_set_form_g_and_o','msfg');
		$this->load->model('M_evs_set_form_mbo','msfm');
		$this->load->model('M_evs_pattern_and_year','myear');
		$this->load->model('M_evs_set_form_gcm','msgc');
		$this->load->model('M_evs_expected_behavior_gcm','mepg');
		$this->load->model('M_evs_description','mdep');
		$this->load->model('M_evs_set_form_mhrd','msfi');

		$this->midf->idf_pos_id = $pos_id;
		$data['info_identification'] = $this->midf->get_identification_all_by_pos(); // key component and expected behavior data

		$data['info_expected'] = $this->mept->get_all_by_pos(); // key component and expected behavior data

		$this->msfa->sfa_pos_id = $pos_id;
		$this->msfa->sfa_pay_id = $year_id;
		$data['info_ability_form'] = $this->msfa->get_all_competency_by_indicator(); // ability form
		
		$this->mstf->sft_pos_id = $pos_id;
		$this->mstf->sft_pay_id = $year_id;
		$data['info_attitude_form'] = $this->mstf->get_category_by_position_sort(); // attitude form

		$this->msfg->sfg_pos_id = $pos_id;
		$this->msfg->sfg_pay_id = $year_id;
		$data['info_g_and_o_form'] = $this->msfg->get_all_by_key_by_year(); // G&O form

		$this->msfm->sfm_pos_id = $pos_id;
		$this->msfm->sfm_pay_id = $year_id;
		$data['info_mbo_form'] = $this->msfm->get_all_by_key_by_year(); // MBO form

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); // year now id

		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // position id by position level
		
		$data['info_pos_id'] = $pos_id; // position id

		$this->mpf->ps_pos_id = $pos_id;
		$this->mpf->ps_pay_id = $year_id;
		$data['info_pos_form'] = $this->mpf->get_all_by_key_by_year(); // position form by year


		$data['info_expected_gcm'] = $this->mepg->get_all_by_pos(); // key component and expected behavior data

		$this->msgc->sgc_pos_id = $pos_id;
		$this->msgc->sgc_pay_id = $year_id;
		$data['info_gcm_form'] = $this->msgc->get_all_competency_by_indicator(); // ability form


		$this->mdep->dep_pos_id = $pos_id;
		$data['info_description'] = $this->mdep->get_description_all_by_pos(); // key component and expected behavior data

		$this->msfi->sfi_pos_id = $pos_id;
		$this->msfi->sfi_pay_id = $year_id;
		$data['info_mhrd_form'] = $this->msfi->get_item_by_position_sort(); // attitude form

		$this->output("consent/form/v_preview_form",$data);
	}
	// function preview_form()

	/*
	* manage_form
	* Form Managnement of position by position level
	* @input  -
	* @output Display v_top_form_insert 
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-10
	*/
	function manage_form($position_level){
		$this->load->model('M_evs_position_from','mpf');

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now
		$pay_id = $year->pay_id;

		$this->mpf->pos_psl_id = $position_level;
		$this->mpf->ps_pay_id = $pay_id;
		$data['info_position'] = $this->mpf->get_by_level_pos(); //show value position level by position id
		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now
		$data['position_level'] = $position_level; // show value position level 

		$this->output("consent/form/v_form_insert",$data);
	}
	// function manage_form()

	
	/*
	* form_position
	* manage form by position 
	* @input position id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-01
	*/
	function form_position($pos_id,$year_id){
		$this->load->model('M_evs_position_from','mpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_set_form_attitude','mstf');
		$this->load->model('M_evs_set_form_ability','msfa');
		$this->load->model('M_evs_set_form_g_and_o','msfg');
		$this->load->model('M_evs_set_form_mbo','msfm');
		$this->load->model('M_evs_pattern_and_year','myear');
		$this->load->model('M_evs_set_form_gcm','msgc');

		$this->msfa->sfa_pos_id = $pos_id;
		$this->msfa->sfa_pay_id = $year_id;
		$data['info_ability_form'] = $this->msfa->get_all_by_key_by_year()->result(); // ability form
		
		$this->mstf->sft_pos_id = $pos_id;
		$this->mstf->sft_pay_id = $year_id;
		$data['info_attitude_form'] = $this->mstf->get_all_by_key_by_year()->result(); // attitude form

		$this->msfg->sfg_pos_id = $pos_id;
		$this->msfg->sfg_pay_id = $year_id;
		$data['info_g_and_o_form'] = $this->msfg->get_all_by_key_by_year()->result(); // G&O form

		$this->msfm->sfm_pos_id = $pos_id;
		$this->msfm->sfm_pay_id = $year_id;
		$data['info_mbo_form'] = $this->msfm->get_all_by_key_by_year()->result(); // MBO form

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); // year now id

		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // position id by position level
		
		$data['info_pos_id'] = $pos_id; // position id

		$this->mpf->ps_pos_id = $pos_id;
		$this->mpf->ps_pay_id = $year_id;
		$data['info_pos_form'] = $this->mpf->get_all_by_key_by_year(); // position form by year


		$this->msgc->sgc_pos_id = $pos_id;
		$this->msgc->sgc_pay_id = $year_id;
		$data['info_gcm_form'] = $this->msgc->get_all_competency_by_indicator(); // form
		
		$data['year_id'] = $year_id;

		$this->output("consent/form/v_position_form_insert",$data);
	}
	//function form_position()
	
	/*
	* change_status_ce
	* change status CE tool by form
	* @input  position ID, form name
	* @output change status CE tool by form to database
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-24
	*/
	function change_status_ce(){
		// ACM, Attitude, ACM & Attitude, GCM
		$this->load->model('M_evs_position_from','mpf');
		$pos_id = $this->input->post('pos_id'); // position ID
		$form_name = $this->input->post('form_name'); // form name
		$this->mpf->ps_pos_id = $pos_id;
		$this->mpf->ps_form_ce = $form_name;
		$this->mpf->ps_status_set_form_ce = 2;
		$this->mpf->update_status_ce();
	}
	//chang_status_ce()

	/*
	* change_status_pe
	* change status PE tool by form
	* @input  position ID, form name
	* @output change status PE tool by form to database
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-24
	*/
	function change_status_pe(){
		// MBO, G&O, MHRD
		$this->load->model('M_evs_position_from','mpf');
		$pos_id = $this->input->post('pos_id'); // position ID
		$form_name = $this->input->post('form_name'); // form name
		$this->mpf->ps_pos_id = $pos_id;
		$this->mpf->ps_form_ce = $form_name;
		$this->mpf->ps_status_set_form_pe = 2;
		$this->mpf->update_status_pe();
	}
	//chang_status_pe()

	


	
}
