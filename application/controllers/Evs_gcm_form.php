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
	

    function form_gcm($pos_id,$year_id){

		$this->load->model('M_evs_set_form_gcm','msgc');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now 
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_id'] = $pos_id; // position id


		$this->msgc->sgc_pos_id = $pos_id;
		$this->msgc->sgc_pay_id = $year_id;
		$data['info_pos_gcm_form'] = $this->msgc->get_all_by_id_by_year()->result(); // show value position by id by year id on gcm form 
		
		//start foreach
		if (count($data['info_pos_gcm_form']) == 0)
		{
			$this->output("consent/form/v_gcm_form_insert",$data);
		}
		else
		{
			//$data['info_key_gcm_form'] = $this->sgc->get_all_key_component_by_indicator()->result(); // show value key component all
			//echo json_encode($data['info_key_gcm_form']);
			$this->output("consent/form/v_gcm_form_edit",$data);	
		}
		//end if-else
	}
	//form_gcm()

	/*
	* get_gcm_form
	* get all data by gcm form
	* @input -
	* @output data by gcm form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-01-02
	*/
	function get_gcm_form(){
		$this->load->model('M_evs_set_form_gcm','msgc');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // year now ID
		$this->msgc->sgc_pos_id = $pos_id;
		$this->msgc->sgc_pay_id = $year_id;
		$data = $this->msgc->get_all_competency_by_indicator()->result(); // show value competency all 
		echo json_encode($data);
	}
	//get_gcm_form()

	/*
	* get_key_component_gcm_form
	* get all data by gcm form
	* @input -
	* @output data by gcm form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-01-02
	*/
	function get_key_component_gcm_form(){
		$this->load->model('M_evs_set_form_gcm','msgc');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // year now ID
		$this->msgc->sgc_pos_id = $pos_id;
		$this->msgc->sgc_pay_id = $year_id;
		$data = $this->msgc->get_all_key_component_by_indicator()->result(); // show value key component all
		echo json_encode($data);
	}
	//get_key_component_gcm_form()

	/*
	* get_expected_gcm_form
	* get all data by gcm form
	* @input -
	* @output data by gcm form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-01-05
	*/
	function get_expected_gcm_form(){
		$this->load->model('M_evs_set_form_gcm','msgc');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // year now ID
		$this->msgc->epg_pos_id = $pos_id;
		$this->msgc->sgc_pay_id = $year_id;
		$data_expected = $this->msgc->get_all_expected_by_indicator()->result(); // show value expected & behavior all
		echo json_encode($data_expected);
	}
	//get_expected_gcm_form()

	/*
	* get_compentency
	* get all compentency
	* @input -
	* @output compentency indicator by gcm form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-04
	*/
	function get_compentency(){
		$this->load->model('M_evs_expected_behavior_gcm','mepg');
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mepg->epg_pos_id = $pos_id;
		$data = $this->mepg->get_all_competency_by_id()->result(); // show value competency by id
		echo json_encode($data);
	}
	//get_compentency()

    /*
	* get_key_component
	* get all key component 
	* @input -
	* @output key component indicator by gcm form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-04
	*/
	function get_key_component(){
		$this->load->model('M_evs_expected_behavior_gcm','mepg');
		$competency_id = $this->input->post('competency_id'); // competency ID
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mepg->epg_pos_id = $pos_id;
		$this->mepg->kcg_cpg_id = $competency_id;
		$data = $this->mepg->get_all_key_component_by_id()->result(); // show value key component all
		echo json_encode($data);
	}
	//get_key_component()

	/*
	* get_expected
	* get all get expected
	* @input -
	* @output expected indicator by gcm form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-04
	*/
	function get_expected(){
		$this->load->model('M_evs_expected_behavior_gcm','mepg');
		$competency_id = $this->input->post('competency_id'); // competency ID
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mepg->epg_pos_id = $pos_id;
		$this->mepg->kcg_cpg_id = $competency_id;
		$data = $this->mepg->get_all_indicator_by_gcm_group_by()->result(); // show value expected & behavior by id 
		echo json_encode($data);
	}
	//get_expected()

	

	/*
	* form_gcm_input
	* insert position ID, competency ID, keycomponent ID, year now ID, weight to competency to database
	* @input position ID, competency ID, keycomponent ID, year now ID, weight
	* @output -
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function form_gcm_input(){
		$this->load->model('Da_evs_set_form_gcm','dsgc');
		$pos_id = $this->input->post('pos_id'); // position ID
		$index = $this->input->post('index'); // sum of index
		$year_id = $this->input->post('year_id'); // sum of index
		$arr_competency = []; // array competency data
		$arr_weight = []; // array weight data
		//start for loop
		for($i=0 ; $i<$index ; $i++)
		{
			$arr_competency[$i] = intval($this->input->post('arr_competency['.$i.']'));
			$arr_weight[$i] = intval($this->input->post('arr_weight['.$i.']'));
		}
		//end for loop

		//start for loop
		for($i=0 ; $i<$index ; $i++)
		{
			$this->dsgc->sgc_weight = $arr_weight[$i];
			$this->dsgc->sgc_cpg_id = $arr_competency[$i];
			$this->dsgc->sgc_pos_id = $pos_id;
			$this->dsgc->sgc_pay_id = $year_id;
			$this->dsgc->insert();
		}
		//end for loop
	
	}
	//form_gcm_input()

	/*
	* form_gcm_update
	* update position ID, competency ID, keycomponent ID, year now ID, weight to competency to database
	* @input position ID, competency ID, keycomponent ID, year now ID, weight
	* @output -
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
	function form_gcm_update(){
		$this->load->model('Da_evs_set_form_gcm','dsgc');
		$pos_id = $this->input->post('pos_id'); // position ID
		$index = $this->input->post('index'); // sum of index
		$year_id = $this->input->post('year_id'); // sum of index
		$arr_competency = []; // array competency data
		$arr_weight = []; // array weight data
		//$arr_key_component = []; // array key component
		//start for loop
		for($i=0 ; $i<$index ; $i++)
		{
			$arr_competency[$i] = $this->input->post('arr_competency['.$i.']');
			$arr_weight[$i] = $this->input->post('arr_weight['.$i.']');
			//$arr_key_component[$i] = $this->input->post('arr_key_component['.$i.']');
		}
		//end for loop

		print_r($pos_id);
		print_r($year_id);
		$this->load->model('M_evs_set_form_gcm','msgc');
		$this->msgc->sgc_pos_id = $pos_id;
		$this->msgc->sgc_pay_id = $year_id;
		$this->msgc->delete_competency();
		//start for loop
		for($i=0 ; $i<$index ; $i++)
		{
			$this->dsgc->sgc_weight = $arr_weight[$i];
			$this->dsgc->sgc_cpg_id = $arr_competency[$i];
			$this->dsgc->sgc_pos_id = $pos_id;
			$this->dsgc->sgc_pay_id = $year_id;
			$this->dsgc->insert();
		}
		//end for loop
		
	}
	//form_gcm_update()


	/*
	* indicator_gcm
	* Display v_ind_gcm
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-02-9
	*/
	function indicator_gcm($pos_id){
		$this->load->model('M_evs_set_form_gcm','msgc');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now 
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_id'] = $pos_id; // position id
		
		$this->load->model('M_evs_competency','mcpt');
		$this->mcpt->epg_pos_id = $pos_id;
		$data['compet_data'] = $this->mcpt->get_competency_join_by_id()->result(); //show value competency data
		$this->load->model('M_evs_position_level','mepl');
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); //show value position
		$this->output("consent/form/v_gcm_form_indicator_table",$data);
		
	}
	// function indicator_gcm()

	/*
	* indicator_gcm_view_insert_data
	* Display v_ind_gcm_add_data
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-25
	*/
	function indicator_gcm_view_insert_data($pos_id){
		$this->load->model('M_evs_set_form_gcm','msgc');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now 
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_id'] = $pos_id; // position id

		$this->load->model('M_evs_position','mpos');
		$data['position_data'] = $this->mpos->get_all(); //show value  position data
		$this->load->model('M_evs_position_level','mepl');
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); //show value position
		$this->output("consent/form/v_gcm_form_indicator_insert",$data);
	}
	// function indicator_gcm_view_insert_data()


}
?>