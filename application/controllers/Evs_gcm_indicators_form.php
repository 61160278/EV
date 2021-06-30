<?php
/*
* Evs_gcm_indicator_form
* Indicator by form gcm
* @input  -
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-10
*/
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

/*
* Evs_indicator_gcm
* Indicator by form gcm
* @input  -
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-10
*/
class Evs_gcm_indicators_form extends MainController {

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
	* indicator_gcm
	* Display v_ind_gcm
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-15
	*/
	function indicator_gcm(){
		$this->load->model('M_evs_competency_gcm','mcpg');
		$data['compet_data'] = $this->mcpg->get_all()->result(); //show value competency data
		$this->load->model('M_evs_position_level','mepl');
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); //show value position
		$this->output("consent/indicator/v_indicator_gcm_table",$data);
		
	}
	// function indicator_gcm()

		/*
	* indicator_gcm_com
	* Display v_ind_gcm_table
	* @input  -
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-01-04
	*/
	function indicator_gcm_com(){
		$cpg_id = $this->input->post('cpg_id'); // competency id
		$this->load->model('Da_evs_competency_gcm','dcpg');
		$this->dcpg->cpg_id = $cpg_id;
		$data = $this->dcpg->get_by_key()->row(); //show value competency
		echo json_encode($data);
	}
	// function indicator_gcm_com()

	/*
	* indicator_gcm_view_edit_data
	* Display v_indicator_gcm_insert
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-25
	*/
	function indicator_gcm_view_edit_data($competency_id){
		$this->load->model('M_evs_position','mpos');
		$data['position_data'] = $this->mpos->get_all(); //show value position all

		
		$this->load->model('M_evs_competency_gcm','mcpg');
		$this->mcpg->cpg_id = $competency_id;
		$data['competency_data'] = $this->mcpg->get_by_key();	 //show value competency all


		$this->mcpg->kcg_cpg_id = $competency_id;
		$data['competency_table'] = $this->mcpg->get_competency_table()->result(); //show value competency table
			
		$data['competency_id'] = $competency_id;
		$this->output("consent/indicator/v_indicator_gcm_edit",$data);
	}
	// function indicator_gcm_view_edit_data()


	/*
	* indicator_gcm_view_insert_data
	* Display v_ind_gcm_add_data
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-25
	*/
	function indicator_gcm_view_insert_data(){
		$this->load->model('M_evs_position','mpos');
		$data['position_data'] = $this->mpos->get_all(); //show value  position data
		$this->load->model('M_evs_position_level','mepl');
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); //show value position
		$this->output("consent/indicator/v_indicator_gcm_insert",$data);
	}
	// function indicator_gcm_view_insert_data()



	
		/*
	* indicator_gcm_search
	* Display -
	* @input  - kcg_cpg_id and psl_id 
	* @output get all competency on table data
	* @author Kunanya Singmee
	* @Update Date 2563-11-03
	*/
	
	function indicator_gcm_search(){

		$kcg_cpg_id = $this->input->post('kcg_cpg_id'); // competency id
		$pos_psl_id = $this->input->post('pos_psl_id'); // position level id

		if($pos_psl_id == 0){
			$this->load->model('M_evs_competency_gcm','mcpg');
			$this->mcpg->kcg_cpg_id = $kcg_cpg_id;
			$data = $this->mcpg->get_competency_table()->result(); //show value competency table
			echo json_encode($data);
		}
		// if check level

		else if($pos_psl_id > 0){
			$this->load->model('M_evs_competency_gcm','mcpg');
			$this->mcpg->kcg_cpg_id = $kcg_cpg_id;
			$this->mcpg->pos_psl_id = $pos_psl_id;
			$data = $this->mcpg->get_competency_table_by_poslv()->result(); //show value competency table by pos id
			echo json_encode($data);
		}
		// if check level
   		
	}
	// function indicator_gcm_search

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
		$this->load->model('Da_evs_competency_gcm','dcpg');
		$this->dcpg->cpg_competency_detail_en = $save_component_en_todatabase;
		$this->dcpg->cpg_competency_detail_th = $save_component_th_todatabase;
		$this->dcpg->cpg_definition_detail_en = $save_definition_en_todatabase;
		$this->dcpg->cpg_definition_detail_th = $save_definition_th_todatabase;
		$this->dcpg->insert();
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
		$this->load->model('Da_evs_competency_gcm','dcpg');
		$this->dcpg->cpg_competency_detail_en = $save_component_en_todatabase;
		$this->dcpg->cpg_competency_detail_th = $save_component_th_todatabase;
		$this->dcpg->cpg_definition_detail_en = $save_definition_en_todatabase;
		$this->dcpg->cpg_definition_detail_th = $save_definition_th_todatabase;
		$this->dcpg->cpg_id = $save_competency_id_todatabase;
		$this->dcpg->update();
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
		
	
		$this->load->model('M_evs_competency_gcm','mcpg');
		$data = $this->mcpg->get_all();

	
		//start foreach
		foreach ($data->result() as $row) {
			//start if
			if($row->cpg_competency_detail_en==$this->input->post("save_component_id_todatabase")){$competency_id = $row->cpg_id;}
			//end if
		}
		//end foreach
	

		$this->load->model('Da_evs_key_component_gcm','dkcg');
		$this->dkcg->kcg_key_component_detail_en = $save_key_component_en_todatabase;
		$this->dkcg->kcg_key_component_detail_th = $save_key_component_th_todatabase;
		$this->dkcg->kcg_cpg_id = $competency_id;
		$this->dkcg->insert();

		$this->load->model('M_evs_key_component_gcm','mkcg');
		$data_kcg = $this->mkcg->get_all();

			//start foreach 
			foreach ($data_kcg->result() as $row) {
				//start if
				if($row->kcg_key_component_detail_en==$save_key_component_en_todatabase ){
					$key_component_id = $row->kcg_id;
				}
				//end if
			}
			//end foreach

		$this->load->model('M_evs_position','mpos');
		$data_pos= $this->mpos->get_all();
			

		$this->load->model('Da_evs_expected_behavior_gcm','depg');
		for($j = 0; $j < $add_expected_behavior; $j++){
		$this->depg->epg_expected_detail_en = $this->input->post("arr_save_expected_en_todatabase[".$j."]");
		$this->depg->epg_expected_detail_th = $this->input->post("arr_save_expected_th_todatabase[".$j."]");
		$this->depg->epg_point = $this->input->post("arr_save_point_to_database[".$j."]");
		
		//start foreach 
			foreach ($data_pos->result() as $row) {
				//start if
				if($row->Position_name==$this->input->post("arr_save_posittion_to_database[".$j."]") ){
					$this->depg->epg_pos_id = $row->Position_ID;
				}
				//end if
			}
			//end foreach

		$this->depg->epg_kcg_id = $key_component_id;
		$this->depg->insert();
		}
		

		for($i = 0; $i < $add_expected_behavior; $i++){
			$chack_posittion_other_to_database = false;
			$add_position_other = count($this->input->post("arr_save_posittion_other_to_database[".$i."]"));
			for($m = 0; $m < $add_position_other; $m++){
				$chack_arr_posittion_other_to_database = $this->input->post("arr_save_posittion_other_to_database[".$i."][".$m."]");

				if($chack_arr_posittion_other_to_database != "0"){$chack_posittion_other_to_database = true;}
		
				if($chack_arr_posittion_other_to_database){
					
						$this->depg->epg_expected_detail_en = $this->input->post("arr_save_expected_en_todatabase[".$i."]");
						$this->depg->epg_expected_detail_th = $this->input->post("arr_save_expected_th_todatabase[".$i."]");
						$this->depg->epg_point = $this->input->post("arr_save_point_to_database[".$i."]");
				
					//start foreach 
					foreach ($data_pos->result() as $row) {
							//start if
						if($row->Position_name==$this->input->post("arr_save_posittion_other_to_database[".$i."][".$m."]") ){
							$this->depg->epg_pos_id = $row->Position_ID;
						}
						//end if
					}
						//end foreach
						$this->depg->epg_kcg_id = $key_component_id;
						$this->depg->insert();
				
					
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
		$kcg_id = $this->input->post("kcg_id"); // key component id
		$this->load->model('M_evs_key_component_gcm','mkcg');
		$this->mkcg->kcg_id = $kcg_id;
		$data = $this->mkcg->get_key_and_expected_behavior_by_kcg_id()->result();
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
	
		$this->load->model('M_evs_competency_gcm','mcpg');
		$data = $this->mcpg->get_all();

	
		//start foreach
		foreach ($data->result() as $row) {
			//start if
			if($row->cpg_competency_detail_en==$this->input->post("save_component_id_todatabase")){$competency_id = $row->cpg_id;}
			//end if
		}
		//end foreach


		$this->load->model('M_evs_key_component_gcm','mkcg');
		$data_mkcg = $this->mkcg->get_all();

	
		//start foreach
		foreach ($data_mkcg->result() as $row) {
			//start if
			if($row->kcg_cpg_id==$competency_id){$key_component_id = $row->kcg_id;}
			//end if
		}
		//end foreach
		

		$this->load->model('Da_evs_key_component_gcm','dkcg');
		$this->dkcg->kcg_key_component_detail_en = $save_key_component_en_todatabase;
		$this->dkcg->kcg_key_component_detail_th = $save_key_component_th_todatabase;
		$this->dkcg->kcg_cpg_id = $competency_id;
		$this->dkcg->kcg_id = $key_component_id;
		$this->dkcg->update();

	
		$this->load->model('M_evs_position','mpos');
		$data_pos= $this->mpos->get_all();
			

		// $this->load->model('M_evs_expected_behavior_gcm','mebv');
		// $data_mebv = $this->mebv->get_all();

		//  $i = 0; 
		// //start foreach
		// foreach ($data_mebv->result() as $row) {
		// 	//start if
		// 	if($row->epg_kcg_id==$key_component_id){$expected_behavior_id[$i] = $row->epg_id; $i++;}
		// 	//end if

		// }
		// //end foreach


		$this->load->model('Da_evs_expected_behavior_gcm','depg');

		for($j = 0; $j < $add_expected_behavior; $j++){
			$this->depg->epg_expected_detail_en = $this->input->post("arr_save_expected_en_todatabase[".$j."]");
			$this->depg->epg_expected_detail_th = $this->input->post("arr_save_expected_th_todatabase[".$j."]");
			$this->depg->epg_point = $this->input->post("arr_save_point_to_database[".$j."]");
			
			$add_position_other = count($this->input->post("arr_save_posittion_other_to_database[".$j."]"));//max loop key component
	
			for($k = 0; $k < $add_position_other; $k++){
			//start foreach 
				foreach ($data_pos->result() as $row) {
					//start if
					if($row->Position_name==$this->input->post("arr_save_posittion_other_to_database[".$j."][".$k."]") ){
						$this->depg->epg_pos_id = $row->Position_ID;
					}
					//end if
				}
			//end foreach
			$this->depg->epg_kcg_id = $key_component_id;
			$this->depg->epg_id = $this->input->post("arr_save_expected_id[".$j."][".$k."]");
			$this->depg->update();
			}
	
		}

		$status = "key_component_and_expected_behavior_to_database_edit";
		echo json_encode($status);
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

	    $this->load->model('M_evs_key_component_gcm','mkcg');
		$data_mkcg = $this->mkcg->get_all();

			//start foreach 
			foreach ($data_mkcg->result() as $row) {
				//start if
				if($row->kcg_key_component_detail_en==$delete_key_component_en_to_database ){
					$key_component_id = $row->kcg_id;
					$component_id = $row->kcg_cpg_id;
				}
				//end if
			}
			//end foreach

			$this->load->model('M_evs_set_form_gcm','msfa');
			$data_set_form_gcm = $this->msfa->get_all();
		
		
			//start foreach
		foreach ($data_set_form_gcm->result() as $row) {
			//start if
			if($row->sfa_cpg_id   == $component_id){
				$save_dont_delete = 1;
			}
			//end if
		}
		//end foreach
		if($save_dont_delete == 0){


		
		$this->mkcg->kcg_id = $key_component_id;
		$this->mkcg->delete();

		$this->load->model('M_evs_expected_behavior_gcm','mepg');
		$data_mepg = $this->mepg->get_all();

		//start foreach 
		foreach ($data_mepg->result() as $row) {
			//start if
			if($row->epg_kcg_id==$key_component_id ){
				$this->mepg->epg_id = $row->epg_id;
		        $this->mepg->delete();
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

		$this->load->model('M_evs_competency_gcm','mcpg');
		$data_mcpg = $this->mcpg->get_all();

			//start foreach 
			foreach ($data_mcpg->result() as $row) {
				//start if
				if($row->cpg_competency_detail_en==$save_component_en_todatabase ){
					$component_id = $row->cpg_id;
				}
				//end if
			}
			//end foreach

		$this->load->model('M_evs_set_form_gcm','msfa');
		$data_set_form_gcm = $this->msfa->get_all();
	
	
		//start foreach
	foreach ($data_set_form_gcm->result() as $row) {
		//start if
		if($row->sag_cpg_id   == $component_id){
			$save_dont_delete = 1;
		}
		//end if
	}
	//end foreach
	if($save_dont_delete == 0){


		$this->load->model('M_evs_competency_gcm','mcpg');
		$this->mcpg->cpg_id = $component_id;
		$this->mcpg->delete();



	    $this->load->model('M_evs_key_component_gcm','mkcg');
		$data_mkcg = $this->mkcg->get_all();

			//start foreach 
			foreach ($data_mkcg->result() as $row) {
				//start if
				if($row->kcg_cpg_id==$component_id ){
					$key_component_id = $row->kcg_id;
					$this->mkcg->kcg_id = $row->kcg_id;
					$this->mkcg->delete();
				}
				//end if
			}
			//end foreach

	

		$this->load->model('M_evs_expected_behavior_gcm','mepg');
		$data_mepg = $this->mepg->get_all();

		//start foreach 
		foreach ($data_mepg->result() as $row) {
			//start if
			if($row->epg_kcg_id==$key_component_id ){
				$this->mepg->epg_id = $row->epg_id;
		        $this->mepg->delete();
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