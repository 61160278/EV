<?php
/*
* Evs_mhrd_indicators_form
* Indicator by form mhrd
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-10
*/

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

/*
* Evs_mhrd_indicators_form
* Indicator by form mhrd
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-10
*/
class Evs_mhrd_indicators_form extends MainController {

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
	* main_indicator
	* Display v_ind_mhrd
	* @input  -
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function indicator_mhrd(){
		$this->load->model('M_evs_item','mitm');
		$this->load->model('M_evs_position_level','mepl');

		$data['cate_data'] = $this->mitm->get_item_all()->result(); //show value item all
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); // show value position all

		$this->output("consent/indicator/v_indicator_mhrd_table",$data);
	}
	// function indicator_mhrd()

	/*
	* indicator_mhrd_table
	* Display -
	* @input  -
	* @output show indicator by form mhrd on data table
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/

	/*
	* indicator_mhrd_table
	* Display -
	* @input  itm_id, pos_psl_id
	* @output show indicator by form mhrd on data table
	* @author Kunanya Singmee
	* @Update Date 2563-12-20
	*/
	function indicator_mhrd_table(){

		$itm_id = $this->input->post('itm_id'); //item id
		$pos_psl_id = $this->input->post('pos_psl_id'); //position level id

		//start if-else
		if($itm_id == 0 && $pos_psl_id == 0){
			$this->load->model('M_evs_item','mitm');
			$data = $this->mitm->get_item_table_all()->result(); //show value item all on table
			echo json_encode($data);

		}
		// if check to get all item

		else if($itm_id > 0 && $pos_psl_id == 0){
			$this->load->model('M_evs_item','mitm');
			$this->mitm->itm_id = $itm_id;
			$data = $this->mitm->get_item_table()->result(); //show value item by id on table
			echo json_encode($data);
		}
		// else if

		else if($itm_id == 0 && $pos_psl_id > 0){
			$this->load->model('M_evs_item','mitm');
			$this->mitm->pos_psl_id = $pos_psl_id;
			$data = $this->mitm->get_item_table_pos()->result(); //show value item by position id on table
			echo json_encode($data);
		}
		// else if

		else if($itm_id > 0 && $pos_psl_id > 0){
			$this->load->model('M_evs_item','mitm');
			$this->mitm->itm_id = $itm_id;
			$this->mitm->pos_psl_id = $pos_psl_id;
			$data = $this->mitm->get_item_table_pos_itm()->result(); //show value item by id by position level id on table
			echo json_encode($data);
		}
		// else if
		//end if-else

		

	}
	// function indicator_mhrd_table

	/*
	* indicator_mhrd_view_insert_data
	* Display v_ind_mhrd_add_data
	* @input  -
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/
	function indicator_mhrd_view_insert_data(){
		$this->output("consent/indicator/v_indicator_mhrd_insert");
	}
	// function indicator_mhrd_view_insert_data()



	/*
	* indicator_mhrd_view_edit_data
	* Display v_ind_mhrd_update_data
	* @input id item
	* @output update indicator by form mhrd to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/
	function indicator_mhrd_view_edit_data($id_item){
		$this->load->model('M_evs_item','mitm');
		$this->mitm->itm_id = $id_item;
		$data['item_table_id'] = $this->mitm->get_item_table_id(); //show value item by id on table
		$data['item_table'] = $this->mitm->get_item_table_for_update(); //show value item for update on table
		$this->load->model('M_evs_position','mpos');
		$data['item_position'] = $this->mpos->get_all(); //show value item by position all on table
		$this->output("consent/indicator/v_indicator_mhrd_edit",$data);
	}
	// function indicator_mhrd_view_edit_data()

	/*
	* indicator_mhrd_delete
	* Display indicator_mhrd
	* @input id item
	* @output delete indicator by form mhrd to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-10-18
	*/
	function indicator_mhrd_delete($id_item){
		$this->load->model('M_evs_set_form_mhrd','msfa');
		$this->load->model('M_evs_description','mdep');
		$this->load->model('Da_evs_description','ddep');
		$data_set_form_mhrd = $this->msfa->get_all(); // value mhrd form all
		$data_description = $this->mdep->get_description_all(); // value description on mhrd form all
		$save_dont_delete = 0; //check status for delete data
	//start foreach
	foreach ($data_set_form_mhrd->result() as $row) {
		//start if
		if($row->sfi_itm_id  == $id_item){
			$save_dont_delete = 1;
			header("Location: " . base_url() . "Evs_mhrd_indicators_form/indicator_mhrd");
		}
		//end if
	}
	//end foreach
		//start foreach
		if($save_dont_delete == 0){
			foreach ($data_description->result() as $row) {
			//start if
			if($row->dep_itm_id == $id_item){
				$this->ddep->dep_id = $row->dep_id; 
				$this->ddep->delete(); 		 
			}
			//end if
		}
		//end foreach
		
		$this->load->model('Da_evs_item','ditm');
		$this->ditm->itm_id = $id_item;
		$this->ditm->delete();
		
	 	header("Location: " . base_url() . "Evs_mhrd_indicators_form/indicator_mhrd");
		}
		
	}
	// function indicator_mhrd_delete()


	/*
	* indicator_mhrd_update
	* Display v_ind_mhrd_update_data
	* @input -
	* @output update indicator by form mhrd to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-10-15
	*/
	function indicator_mhrd_update(){
		
		$updete_pos_length_number_arry = count($this->input->post("arr_update_pos[]")); //max loop update position

		$this->load->model('Da_evs_description','ddep');
		$this->load->model('M_evs_item','mitm');

		$this->mitm->itm_id = $this->input->post("item_id");
		$data = $this->mitm->get_item_table_for_update(); ////show value item for update on table

		//start foreach
		foreach ($data->result() as $row) {
			$description_id_for_check = NULL; // check status for description id 

			//start for loop
			for($i = 0; $i < $updete_pos_length_number_arry; $i++){

				//start if
				if($row->dep_id == $this->input->post('arr_description_id['.$i.']')){
					$description_id_for_check = "check";
				}	
				//end if
			}
			//end for loop

			//start if
			if($description_id_for_check == NULL){
				$this->ddep->dep_id = $row->dep_id;
				$this->ddep->delete();					   
			}	
			//end if
		print_r("<br>");
		}
		//end foreach
		$itm_item_detail_en = $this->input->post("up_date_item_en"); //save item detail eng
		$itm_item_detail_th = $this->input->post("up_date_item_th"); //save item detail th
		$itm_item_id = $this->input->post("item_id"); //save item id
		$update_pos_length_number_arry = count($this->input->post("arr_update_pos[]")); //max loop update position
		
		print_r($itm_item_detail_en."<br>");
		print_r($itm_item_detail_th);

		// อัพเดต item_name
		$this->load->model('Da_evs_item','ditm');
		$this->ditm->itm_item_detail_en = $itm_item_detail_en;
		$this->ditm->itm_item_detail_th = $itm_item_detail_th;
		$this->ditm->itm_id = $itm_item_id;
		$this->ditm->update();


		$this->load->model('Da_evs_description','ddep');

		//start for loop
			$this->ddep->dep_description_detail_en = $this->input->post('arr_update_dep_en');
			$this->ddep->dep_description_detail_th = $this->input->post('arr_update_dep_th');
		for($j = 0; $j < $update_pos_length_number_arry; $j++){
			$this->ddep->dep_pos_id = $this->input->post('arr_update_pos['.$j.']');
		 	$this->ddep->dep_itm_id = $itm_item_id;
			$this->ddep->dep_id = $this->input->post('arr_description_id['.$j.']');
		    $this->ddep->update();
		}
		//end for loop
		
		$add_pos_length_number_arry = count($this->input->post("arr_add_pos[]"));//max loop insert position
		$item_id = 0; //set item id
		$this->load->model('M_evs_item','mitm');
		$data = $this->mitm->get_item_all(); //show value item all 

		//start foreach
		foreach ($data->result() as $row) {
			//start if
			if($row->itm_item_detail_en==$itm_item_detail_en){
				$item_id = $row->itm_id; 
			}
			//end if
		}
		//end foreach
		$this->load->model('Da_evs_description','ddep');

		$this->ddep->dep_description_detail_en = $this->input->post('arr_update_dep_en');
		$this->ddep->dep_description_detail_th = $this->input->post('arr_update_dep_th');
		//start for loop
		for($j = 0; $j < $add_pos_length_number_arry; $j++){
			$this->ddep->dep_pos_id = $this->input->post('arr_add_pos['.$j.']');
		 	$this->ddep->dep_itm_id = $item_id;

		  $this->ddep->insert();
		}
		//end for loop

		header("Location: " . base_url() . "Evs_mhrd_indicators_form/indicator_mhrd");
	}
	// function indicator_mhrd_update()

	/*
	* indicator_mhrd_insert
	* Display v_ind_mhrd_add_data
	* @input  -
	* @output insert indicator by form mhrd to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-30
	*/
	function indicator_mhrd_insert(){

		$itm_item_detail_en = $this->input->post("add_item_en"); //save item detail eng
		$itm_item_detail_th = $this->input->post("add_item_th"); //save item detail th
	
		$item_id = 0; //set item id
	
		$this->load->model('Da_evs_item','ditm');
		$this->ditm->itm_item_detail_en = $itm_item_detail_en;
		$this->ditm->itm_item_detail_th = $itm_item_detail_th;
		$this->ditm->insert();
		$this->load->model('M_evs_item','mitm');
		$data = $this->mitm->get_item_all(); //show value item all

		//start foreach
		foreach ($data->result() as $row) {
			//start if
		 	if($row->itm_item_detail_en==$itm_item_detail_en){
				$item_id = $row->itm_id;
			}
			//end if
		}
		//end foreach
		$this->load->model('Da_evs_description','ddep');

		//start for loop
		
			$this->ddep->dep_description_detail_en = $this->input->post('arr_add_dep_en['.$j.']');
			$this->ddep->dep_description_detail_th = $this->input->post('arr_add_dep_th['.$j.']');
			$this->ddep->dep_pos_id = $this->input->post('arr_add_pos['.$j.']');
		 	$this->ddep->dep_itm_id = $item_id;
		    $this->ddep->insert();
		

			$add_pos_new__length_number_arry = count($this->input->post("arr_add_new_pos[]")); //max loop insert position
			for($j = 0; $j < $add_pos_new__length_number_arry; $j++){
				$this->ddep->dep_pos_id = $this->input->post('arr_add_new_pos['.$j.']');
				$this->ddep->dep_itm_id = $item_id;
				$this->ddep->insert();
				}
		//end for loop

		header("Location: " . base_url() . "Evs_mhrd_indicators_form/indicator_mhrd");
	  
	}
	// function indicator_mhrd_insert()

	/*
	* get_position_indicator
	* Display v_ind_mhrd
	* @input  -
	* @output get indicator by position
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-10-2
	*/
	function get_position_indicator(){
		$key_pos_lv = $this->input->post("key_pos_lv");
		$this->load->model('M_evs_position','mpos');
		$this->mpos->pos_psl_id = $key_pos_lv;
		$data = $this->mpos->get_position_level_by_pls_id()->result(); //show value position level by position id
		echo json_encode($data);
	}
	// function get_position_indicator()





}