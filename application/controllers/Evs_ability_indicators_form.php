<?php
/*
* Evs_ability_indicator_form
* Indicator by form ability
* @input  -
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-10
*/
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

/*
* Evs_indicator_ability
* Indicator by form ability
* @input  -
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-10
*/
class Evs_ability_indicators_form extends MainController {

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
	* indicator_ability
	* Display v_ind_ability
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-15
	*/
	function indicator_ability(){
		$this->load->model('M_evs_competency','mcpt');
		$data['compet_data'] = $this->mcpt->get_all()->result(); //show value competency data
		$this->load->model('M_evs_position_level','mepl');
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); //show value position
		$this->output("consent/indicator/v_indicator_ability_table",$data);
		
	}
	// function indicator_ability()

		/*
	* indicator_ability_com
	* Display v_ind_ability_table
	* @input  -
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-01-04
	*/
	function indicator_ability_com(){
		$cpn_id = $this->input->post('cpn_id'); // competency id
		$this->load->model('Da_evs_competency','dcpt');
		$this->dcpt->cpn_id = $cpn_id;
		$data = $this->dcpt->get_by_key()->row(); //show value competency
		echo json_encode($data);
	}
	// function indicator_ability_com()

	/*
	* indicator_ability_view_insert_data
	* Display v_indicator_ability_insert
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-25
	*/
	function indicator_ability_view_edit_data($competency_id){
		$this->load->model('M_evs_position','mpos');
		$data['position_data'] = $this->mpos->get_all(); //show value position all

		
		$this->load->model('M_evs_competency','mcpt');
		$this->mcpt->cpn_id = $competency_id;
		$data['competency_data'] = $this->mcpt->get_by_key();	 //show value competency all


		$this->mcpt->kcp_cpn_id = $competency_id;
		$data['competency_table'] = $this->mcpt->get_competency_table()->result(); //show value competency table
			
		$data['competency_id'] = $competency_id;
		$this->output("consent/indicator/v_indicator_ability_edit",$data);
	}
	// function indicator_ability_view_insert_data()


	/*
	* indicator_ability_view_insert_data
	* Display v_ind_ability_add_data
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-25
	*/
	function indicator_ability_view_insert_data(){
		$this->load->model('M_evs_position','mpos');
		$data['position_data'] = $this->mpos->get_all(); //show value  position data
		$this->load->model('M_evs_position_level','mepl');
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); //show value position
		$this->output("consent/indicator/v_indicator_ability_insert",$data);
	}
	// function indicator_ability_view_insert_data()



	
		/*
	* indicator_ability_search
	* Display -
	* @input  - kcp_cpn_id and psl_id 
	* @output get all competency on table data
	* @author Kunanya Singmee
	* @Update Date 2563-11-03
	*/
	
	function indicator_ability_search(){

		$kcp_cpn_id = $this->input->post('kcp_cpn_id'); // competency id
		$pos_psl_id = $this->input->post('pos_psl_id'); // position level id

		if($pos_psl_id == 0){
			$this->load->model('M_evs_competency','mcpt');
			$this->mcpt->kcp_cpn_id = $kcp_cpn_id;
			$data = $this->mcpt->get_competency_table()->result(); //show value competency table
			echo json_encode($data);
		}
		// if check level

		else if($pos_psl_id > 0){
			$this->load->model('M_evs_competency','mcpt');
			$this->mcpt->kcp_cpn_id = $kcp_cpn_id;
			$this->mcpt->pos_psl_id = $pos_psl_id;
			$data = $this->mcpt->get_competency_table_by_poslv()->result(); //show value competency table by pos id
			echo json_encode($data);
		}
		// if check level
   		
	}
	// function indicator_ability_search

	/*
	* get_position_indicator
	* Display -
	* @input  -
	* @output get competency by position on table data 
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-28
	*/
	function get_position_indicator(){
		$key_pos_lv = $this->input->post("key_pos_lv"); // position level id
		$this->load->model('M_evs_position','mpos');
		$this->mpos->pos_psl_id = $key_pos_lv;
		$data = $this->mpos->get_position_level_by_pls_id()->result(); //show value position bt pls id
		echo json_encode($data);
	}
	// function get_position_indicator()
	

	/*
	* competency_to_database_insert
	* Display -
	* @input  competency
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-22-12
	*/
	function competency_to_database_insert(){
		$save_component_en_todatabase = $this->input->post("save_component_en_todatabase"); // save component en to database
		$save_component_th_todatabase = $this->input->post("save_component_th_todatabase"); // save component th to database
		$save_definition_en_todatabase = $this->input->post("save_definition_en_todatabase");  //save definition en to database
		$save_definition_th_todatabase = $this->input->post("save_definition_th_todatabase");  //save definition th to database
		$this->load->model('Da_evs_competency','dcpt');
		$this->dcpt->cpn_competency_detail_en = $save_component_en_todatabase;
		$this->dcpt->cpn_competency_detail_th = $save_component_th_todatabase;
		$this->dcpt->cpn_definition_detail_en = $save_definition_en_todatabase;
		$this->dcpt->cpn_definition_detail_th = $save_definition_th_todatabase;
		$this->dcpt->insert();
		$status = "competency_to_database_insert";
		echo json_encode($status);
	}
	// function competency_to_database_insert()

		/*
	* competency_to_database_insert
	* Display -
	* @input  competency
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-25-01
	*/
	function competency_to_database_edit(){
	
		$save_component_en_todatabase = $this->input->post("save_component_en_todatabase"); // save component en to database
		$save_component_th_todatabase = $this->input->post("save_component_th_todatabase"); // save component th to database
		$save_definition_en_todatabase = $this->input->post("save_definition_en_todatabase");  //save definition en to database
		$save_definition_th_todatabase = $this->input->post("save_definition_th_todatabase");  //save definition th to database
		$save_competency_id_todatabase = $this->input->post("save_competency_id_todatabase"); // save competency id to database
		$this->load->model('Da_evs_competency','dcpt');
		$this->dcpt->cpn_competency_detail_en = $save_component_en_todatabase;
		$this->dcpt->cpn_competency_detail_th = $save_component_th_todatabase;
		$this->dcpt->cpn_definition_detail_en = $save_definition_en_todatabase;
		$this->dcpt->cpn_definition_detail_th = $save_definition_th_todatabase;
		$this->dcpt->cpn_id = $save_competency_id_todatabase;
		$this->dcpt->update();
		$status = "competency_to_database_edit";
		echo json_encode($status);
	}
	// function competency_to_database_insert()
	
	/*
	* key_component_and_expected_behavior_to_database_insert
	* Display -
	* @input  competency
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-22-12
	*/
	function key_component_and_expected_behavior_to_database_insert(){
		$competency_id = "";

		$save_key_component_en_todatabase = $this->input->post("save_key_component_en_todatabase"); //save_key_component_en_todatabase
		$save_key_component_th_todatabase = $this->input->post("save_key_component_th_todatabase"); //save_key_component_th_todatabase
		$add_expected_behavior = count($this->input->post("arr_save_expected_en_todatabase"));//max loop key component
	
		$this->load->model('M_evs_competency','mcpt');
		$data = $this->mcpt->get_all();

	
		//start foreach
		foreach ($data->result() as $row) {
			//start if
			if($row->cpn_competency_detail_en==$this->input->post("save_component_id_todatabase")){$competency_id = $row->cpn_id;}
			//end if
		}
		//end foreach
	

		$this->load->model('Da_evs_key_component','dkcp');
		$this->dkcp->kcp_key_component_detail_en = $save_key_component_en_todatabase;
		$this->dkcp->kcp_key_component_detail_th = $save_key_component_th_todatabase;
		$this->dkcp->kcp_cpn_id = $competency_id;
		$this->dkcp->insert();

		$this->load->model('M_evs_key_component','mkcp');
		$data_kcp = $this->mkcp->get_all();

			//start foreach 
			foreach ($data_kcp->result() as $row) {
				//start if
				if($row->kcp_key_component_detail_en==$save_key_component_en_todatabase ){
					$key_component_id = $row->kcp_id;
				}
				//end if
			}
			//end foreach

		$this->load->model('M_evs_position','mpos');
		$data_pos= $this->mpos->get_all();
			

		$this->load->model('Da_evs_expected_behavior','debv');
		for($j = 0; $j < $add_expected_behavior; $j++){
		$this->debv->ept_expected_detail_en = $this->input->post("arr_save_expected_en_todatabase[".$j."]");
		$this->debv->ept_expected_detail_th = $this->input->post("arr_save_expected_th_todatabase[".$j."]");

		
		//start foreach 
			foreach ($data_pos->result() as $row) {
				//start if
				if($row->Position_name==$this->input->post("arr_save_posittion_to_database[".$j."]") ){
					$this->debv->ept_pos_id = $row->Position_ID;
				}
				//end if
			}
			//end foreach

		$this->debv->ept_kcp_id = $key_component_id;
		$this->debv->insert();
		}
	
		for($i = 0; $i < $add_expected_behavior; $i++){
			$chack_posittion_other_to_database = false;
			$add_position_other = count($this->input->post("arr_save_posittion_other_to_database[".$i."]"));
			for($m = 0; $m < $add_position_other; $m++){
				$chack_arr_posittion_other_to_database = $this->input->post("arr_save_posittion_other_to_database[".$i."][".$m."]");

				if($chack_arr_posittion_other_to_database != "0"){$chack_posittion_other_to_database = true;}
		
				if($chack_arr_posittion_other_to_database){
					
						$this->debv->ept_expected_detail_en = $this->input->post("arr_save_expected_en_todatabase[".$i."]");
						$this->debv->ept_expected_detail_th = $this->input->post("arr_save_expected_th_todatabase[".$i."]");
				
					//start foreach 
					foreach ($data_pos->result() as $row) {
							//start if
						if($row->Position_name==$this->input->post("arr_save_posittion_other_to_database[".$i."][".$m."]") ){
							$this->debv->ept_pos_id = $row->Position_ID;
						}
						//end if
					}
						//end foreach
						$this->debv->ept_kcp_id = $key_component_id;
						$this->debv->insert();
				
					
				}//if chack_arr_posittion_other_to_database
			}//for loop M
		}//for loop I
	
		$status = "get_post_key_component_and_expected_behavior_to_database";
		echo json_encode($status);
	}
	// function key_component_and_expected_behavior_to_database_insert()



/*
	* get_position_indicator
	* Display -
	* @input  -
	* @output get competency by position on table data 
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-28
	*/
	function get_key_component_and_expected_behavior_form_database(){
		$kcp_id = $this->input->post("kcp_id"); // key component id
		$this->load->model('M_evs_key_component','mkcp');
		$this->mkcp->kcp_id = $kcp_id;
		$data = $this->mkcp->get_key_and_expected_behavior_by_kcp_id()->result();
		echo json_encode($data);
	}
	// function get_position_indicator()




/*
	* key_component_and_expected_behavior_to_database_edit
	* Display -
	* @input  competency
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-22-12
	*/
	function key_component_and_expected_behavior_to_database_edit(){

		$save_key_component_en_todatabase = $this->input->post("save_key_component_en_todatabase"); //save_key_component_en_todatabase
		$save_key_component_th_todatabase = $this->input->post("save_key_component_th_todatabase"); //save_key_component_th_todatabase
		$add_expected_behavior = count($this->input->post("arr_save_expected_en_todatabase"));//max loop key component
	
		$this->load->model('M_evs_competency','mcpt');
		$data = $this->mcpt->get_all();

	
		//start foreach
		foreach ($data->result() as $row) {
			//start if
			if($row->cpn_competency_detail_en==$this->input->post("save_component_id_todatabase")){$competency_id = $row->cpn_id;}
			//end if
		}
		//end foreach


		$this->load->model('M_evs_key_component','mkcp');
		$data_mkcp = $this->mkcp->get_all();

	
		//start foreach
		foreach ($data_mkcp->result() as $row) {
			//start if
			if($row->kcp_cpn_id==$competency_id){$key_component_id = $row->kcp_id;}
			//end if
		}
		//end foreach
		

		$this->load->model('Da_evs_key_component','dkcp');
		$this->dkcp->kcp_key_component_detail_en = $save_key_component_en_todatabase;
		$this->dkcp->kcp_key_component_detail_th = $save_key_component_th_todatabase;
		$this->dkcp->kcp_cpn_id = $competency_id;
		$this->dkcp->kcp_id = $key_component_id;
		$this->dkcp->update();

	
		$this->load->model('M_evs_position','mpos');
		$data_pos= $this->mpos->get_all();
			

	


		$this->load->model('Da_evs_expected_behavior','debv');

		for($j = 0; $j < $add_expected_behavior; $j++){
			$this->debv->ept_expected_detail_en = $this->input->post("arr_save_expected_en_todatabase[".$j."]");
			$this->debv->ept_expected_detail_th = $this->input->post("arr_save_expected_th_todatabase[".$j."]");
							
			$add_position_other = count($this->input->post("arr_save_posittion_other_to_database[".$j."]"));//max loop key component
	
			for($k = 0; $k < $add_position_other; $k++){
			//start foreach 
				foreach ($data_pos->result() as $row) {
					//start if
					if($row->Position_name==$this->input->post("arr_save_posittion_other_to_database[".$j."][".$k."]") ){
						$this->debv->ept_pos_id = $row->Position_ID;
					}
					//end if
				}
			//end foreach
			$this->debv->ept_kcp_id = $key_component_id;
			$this->debv->ept_id = $this->input->post("arr_save_expected_id[".$j."][".$k."]");
			$this->debv->update();
			}
	
		}

		$status = "key_component_and_expected_behavior_to_database_edit";
		echo json_encode($key_component_and_expected_behavior_to_database_edit);
	}
	// function key_component_and_expected_behavior_to_database_edit()





	/*
	* key_component_and_expected_to_database_delete
	* Display -
	* @input  competency
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-22-12
	*/
	function key_component_and_expected_to_database_delete(){
		$delete_key_component_en_to_database = $this->input->post("delete_key_component_en_to_database"); // delete key component 
		$save_dont_delete = 0; //chack dont delete

	    $this->load->model('M_evs_key_component','mkcp');
		$data_mkcp = $this->mkcp->get_all();

			//start foreach 
			foreach ($data_mkcp->result() as $row) {
				//start if
				if($row->kcp_key_component_detail_en==$delete_key_component_en_to_database ){
					$key_component_id = $row->kcp_id;
					$component_id = $row->kcp_cpn_id;
				}
				//end if
			}
			//end foreach

			$this->load->model('M_evs_set_form_ability','msfa');
			$data_set_form_ability = $this->msfa->get_all();
		
		
			//start foreach
		foreach ($data_set_form_ability->result() as $row) {
			//start if
			if($row->sfa_cpn_id   == $component_id){
				$save_dont_delete = 1;
			}
			//end if
		}
		//end foreach
		if($save_dont_delete == 0){


		
		$this->mkcp->kcp_id = $key_component_id;
		$this->mkcp->delete();

		$this->load->model('M_evs_expected_behavior','mept');
		$data_mept = $this->mept->get_all();

		//start foreach 
		foreach ($data_mept->result() as $row) {
			//start if
			if($row->ept_kcp_id==$key_component_id ){
				$this->mept->ept_id = $row->ept_id;
		        $this->mept->delete();
			}
			//end if
		}
		//end foreach
		}

		$status = "delete_key_component_and_expected_to_database";

		echo json_encode($status);
	}
	// function delete_key_component_and_expected_to_database()
	
	/*
	* data_componet_to_data_base_delete
	* Display -
	* @input  competency
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-22-12
	*/
	function data_componet_to_data_base_delete(){
		$save_component_en_todatabase = $this->input->post("save_component_en_todatabase"); //delete component en 
		$save_dont_delete = 0; //chack dont delete

		$this->load->model('M_evs_competency','mcpn');
		$data_mcpn = $this->mcpn->get_all();

			//start foreach 
			foreach ($data_mcpn->result() as $row) {
				//start if
				if($row->cpn_competency_detail_en==$save_component_en_todatabase ){
					$component_id = $row->cpn_id;
				}
				//end if
			}
			//end foreach

		$this->load->model('M_evs_set_form_ability','msfa');
		$data_set_form_ability = $this->msfa->get_all();
	
	
		//start foreach
	foreach ($data_set_form_ability->result() as $row) {
		//start if
		if($row->sfa_cpn_id   == $component_id){
			$save_dont_delete = 1;
		}
		//end if
	}
	//end foreach
	if($save_dont_delete == 0){


		$this->load->model('M_evs_competency','mcpn');
		$this->mcpn->cpn_id = $component_id;
		$this->mcpn->delete();



	    $this->load->model('M_evs_key_component','mkcp');
		$data_mkcp = $this->mkcp->get_all();

			//start foreach 
			foreach ($data_mkcp->result() as $row) {
				//start if
				if($row->kcp_cpn_id==$component_id ){
					$key_component_id = $row->kcp_id;
					$this->mkcp->kcp_id = $row->kcp_id;
					$this->mkcp->delete();
				}
				//end if
			}
			//end foreach

	

		$this->load->model('M_evs_expected_behavior','mept');
		$data_mept = $this->mept->get_all();

		//start foreach 
		foreach ($data_mept->result() as $row) {
			//start if
			if($row->ept_kcp_id==$key_component_id ){
				$this->mept->ept_id = $row->ept_id;
		        $this->mept->delete();
			}
			//end if
		}
		//end foreach

		}
		$status = "clear_data_componet_to_data_base";
		echo json_encode($status);
	}
	// function clear_data_componet_to_data_base()
	

}