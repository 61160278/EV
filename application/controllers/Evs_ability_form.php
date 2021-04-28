<?php
/*
* Evs_form 
* Form Management of Position
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
* Evs_form 
* Form Management of Position
* @input  -
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
class Evs_ability_form extends Evs_form {

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
	* form_ability
	* Ability Managnement Form
	* @input -
	* @output Display v_form_ability
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-3
	*/
	function form_ability($pos_id,$year_id){

		$this->load->model('M_evs_set_form_ability','msfa');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now 
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_id'] = $pos_id; // position id


		$this->msfa->sfa_pos_id = $pos_id;
		$this->msfa->sfa_pay_id = $year_id;
		$data['info_pos_ability_form'] = $this->msfa->get_all_by_id_by_year()->result(); // show value position by id by year id on ability form 
		
		//start foreach
		if (count($data['info_pos_ability_form']) == 0)
		{
			$this->output("consent/form/v_ability_form_insert",$data);
		}
		else
		{
			//$data['info_key_ability_form'] = $this->sfa->get_all_key_component_by_indicator()->result(); // show value key component all
			//echo json_encode($data['info_key_ability_form']);
			$this->output("consent/form/v_ability_form_edit",$data);	
		}
		//end if-else
	}
	//form_ability()

	/*
	* get_ability_form
	* get all data by ability form
	* @input -
	* @output data by ability form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-01-02
	*/
	function get_ability_form(){
		$this->load->model('M_evs_set_form_ability','msfa');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // year now ID
		$this->msfa->sfa_pos_id = $pos_id;
		$this->msfa->sfa_pay_id = $year_id;
		$data = $this->msfa->get_all_competency_by_indicator()->result(); // show value competency all 
		echo json_encode($data);
	}
	//get_ability_form()

	/*
	* get_key_component_ability_form
	* get all data by ability form
	* @input -
	* @output data by ability form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-01-02
	*/
	function get_key_component_ability_form(){
		$this->load->model('M_evs_set_form_ability','msfa');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // year now ID
		$this->msfa->sfa_pos_id = $pos_id;
		$this->msfa->sfa_pay_id = $year_id;
		$data = $this->msfa->get_all_key_component_by_indicator()->result(); // show value key component all
		echo json_encode($data);
	}
	//get_key_component_ability_form()

	/*
	* get_expected_ability_form
	* get all data by ability form
	* @input -
	* @output data by ability form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-01-05
	*/
	function get_expected_ability_form(){
		$this->load->model('M_evs_set_form_ability','msfa');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // year now ID
		$this->msfa->ept_pos_id = $pos_id;
		$this->msfa->sfa_pay_id = $year_id;
		$data_expected = $this->msfa->get_all_expected_by_indicator()->result(); // show value expected & behavior all
		echo json_encode($data_expected);
	}
	//get_expected_ability_form()

	/*
	* get_compentency
	* get all compentency
	* @input -
	* @output compentency indicator by ability form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-04
	*/
	function get_compentency(){
		$this->load->model('M_evs_expected_behavior','mept');
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mept->ept_pos_id = $pos_id;
		$data = $this->mept->get_all_competency_by_id()->result(); // show value competency by id
		echo json_encode($data);
	}
	//get_compentency()

    /*
	* get_key_component
	* get all key component 
	* @input -
	* @output key component indicator by ability form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-04
	*/
	function get_key_component(){
		$this->load->model('M_evs_expected_behavior','mept');
		$competency_id = $this->input->post('competency_id'); // competency ID
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mept->ept_pos_id = $pos_id;
		$this->mept->kcp_cpn_id = $competency_id;
		$data = $this->mept->get_all_key_component_by_id()->result(); // show value key component all
		echo json_encode($data);
	}
	//get_key_component()

	/*
	* get_expected
	* get all get expected
	* @input -
	* @output expected indicator by ability form
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-04
	*/
	function get_expected(){
		$this->load->model('M_evs_expected_behavior','mept');
		$competency_id = $this->input->post('competency_id'); // competency ID
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mept->ept_pos_id = $pos_id;
		$this->mept->kcp_cpn_id = $competency_id;
		$data = $this->mept->get_all_indicator_by_ability_group_by()->result(); // show value expected & behavior by id 
		echo json_encode($data);
	}
	//get_expected()

	

	/*
	* form_ability_input
	* insert position ID, competency ID, keycomponent ID, year now ID, weight to competency to database
	* @input position ID, competency ID, keycomponent ID, year now ID, weight
	* @output -
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function form_ability_input(){
		$this->load->model('Da_evs_set_form_ability','dcpw');
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
			$this->dcpw->sfa_weight = $arr_weight[$i];
			$this->dcpw->sfa_cpn_id = $arr_competency[$i];
			$this->dcpw->sfa_pos_id = $pos_id;
			$this->dcpw->sfa_pay_id = $year_id;
			$this->dcpw->insert();
		}
		//end for loop
	
	}
	//form_ability_input()

	/*
	* form_ability_update
	* update position ID, competency ID, keycomponent ID, year now ID, weight to competency to database
	* @input position ID, competency ID, keycomponent ID, year now ID, weight
	* @output -
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-12-31
	*/
	function form_ability_update(){
		$this->load->model('Da_evs_set_form_ability','dcpw');
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
		$this->load->model('M_evs_set_form_ability','mcpw');
		$this->mcpw->sfa_pos_id = $pos_id;
		$this->mcpw->sfa_pay_id = $year_id;
		$this->mcpw->delete_competency();
		//start for loop
		for($i=0 ; $i<$index ; $i++)
		{
			$this->dcpw->sfa_weight = $arr_weight[$i];
			$this->dcpw->sfa_cpn_id = $arr_competency[$i];
			$this->dcpw->sfa_pos_id = $pos_id;
			$this->dcpw->sfa_pay_id = $year_id;
			$this->dcpw->insert();
		}
		//end for loop
		
	}
	//form_ability_update()


	/*
	* indicator_ability
	* Display v_ind_ability
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2564-02-9
	*/
	function indicator_ability($pos_id){
		$this->load->model('M_evs_set_form_ability','msfa');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now 
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_id'] = $pos_id; // position id
		
		$this->load->model('M_evs_competency','mcpt');
		$this->mcpt->ept_pos_id = $pos_id;
		$data['compet_data'] = $this->mcpt->get_competency_join_by_id()->result(); //show value competency data
		$this->load->model('M_evs_position_level','mepl');
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); //show value position
		$this->output("consent/form/v_ability_form_indicator_table",$data);
		
	}
	// function indicator_ability()

	/*
	* indicator_ability_view_insert_data
	* Display v_ind_ability_add_data
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-25
	*/
	function indicator_ability_view_insert_data($pos_id){
		$this->load->model('M_evs_set_form_ability','msfa');
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
		$this->output("consent/form/v_ability_form_indicator_insert",$data);
	}
	// function indicator_ability_view_insert_data()



}
?>