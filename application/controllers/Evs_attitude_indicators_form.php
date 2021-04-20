<?php
/*
* Evs_attitude_indicators_form
* Indicator by form attitude
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-10
*/

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

/*
* Evs_attitude_indicators_form
* Indicator by form attitude
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-10
*/
class Evs_attitude_indicators_form extends MainController {

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
	* Display v_ind_attitude
	* @input  -
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function indicator_attitude(){
		$this->load->model('M_evs_category','mctg');
		$this->load->model('M_evs_position_level','mepl');

		$data['cate_data'] = $this->mctg->get_category_all()->result(); //show value category all
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); // show value position all

		$this->output("consent/indicator/v_indicator_attitude_table",$data);
	}
	// function indicator_attitude()

	/*
	* indicator_attitude_table
	* Display -
	* @input  -
	* @output show indicator by form attitude on data table
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/

	/*
	* indicator_attitude_table
	* Display -
	* @input  ctg_id, pos_psl_id
	* @output show indicator by form attitude on data table
	* @author Kunanya Singmee
	* @Update Date 2563-12-20
	*/
	function indicator_attitude_table(){

		$ctg_id = $this->input->post('ctg_id'); //category id
		$pos_psl_id = $this->input->post('pos_psl_id'); //position level id

		//start if-else
		if($ctg_id == 0 && $pos_psl_id == 0){
			$this->load->model('M_evs_category','mctg');
			$data = $this->mctg->get_category_table_all()->result(); //show value category all on table
			echo json_encode($data);

		}
		// if check to get all category

		else if($ctg_id > 0 && $pos_psl_id == 0){
			$this->load->model('M_evs_category','mctg');
			$this->mctg->ctg_id = $ctg_id;
			$data = $this->mctg->get_category_table()->result(); //show value category by id on table
			echo json_encode($data);
		}
		// else if

		else if($ctg_id == 0 && $pos_psl_id > 0){
			$this->load->model('M_evs_category','mctg');
			$this->mctg->pos_psl_id = $pos_psl_id;
			$data = $this->mctg->get_category_table_pos()->result(); //show value category by position id on table
			echo json_encode($data);
		}
		// else if

		else if($ctg_id > 0 && $pos_psl_id > 0){
			$this->load->model('M_evs_category','mctg');
			$this->mctg->ctg_id = $ctg_id;
			$this->mctg->pos_psl_id = $pos_psl_id;
			$data = $this->mctg->get_category_table_pos_ctg()->result(); //show value category by id by position level id on table
			echo json_encode($data);
		}
		// else if
		//end if-else

		

	}
	// function indicator_attitude_table

	/*
	* indicator_attitude_view_insert_data
	* Display v_ind_attitude_add_data
	* @input  -
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/
	function indicator_attitude_view_insert_data(){
		$this->output("consent/indicator/v_indicator_attitude_insert");
	}
	// function indicator_attitude_view_insert_data()



	/*
	* indicator_attitude_view_edit_data
	* Display v_ind_attitude_update_data
	* @input id category
	* @output update indicator by form attitude to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/
	function indicator_attitude_view_edit_data($id_catagory){
		$this->load->model('M_evs_category','mctg');
		$this->mctg->ctg_id = $id_catagory;
		$data['cattagory_table_id'] = $this->mctg->get_category_table_id(); //show value category by id on table
		$data['cattagory_table'] = $this->mctg->get_category_table_for_update(); //show value category for update on table
		$this->load->model('M_evs_position','mpos');
		$data['cattagory_position'] = $this->mpos->get_all(); //show value category by position all on table
		$this->output("consent/indicator/v_indicator_attitude_edit",$data);
	}
	// function indicator_attitude_view_edit_data()

	/*
	* indicator_attitude_delete
	* Display indicator_attitude
	* @input id category
	* @output delete indicator by form attitude to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-10-18
	*/
	function indicator_attitude_delete($id_catagory){
		$this->load->model('M_evs_set_form_attitude','msfa');
		$this->load->model('M_evs_identification','midf');
		$this->load->model('Da_evs_identification','didf');
		$data_set_form_attitude = $this->msfa->get_all(); // value attitude form all
		$data_identification = $this->midf->get_identification_all(); // value identification on attitude form all
		$save_dont_delete = 0; //check status for delete data
	//start foreach
	foreach ($data_set_form_attitude->result() as $row) {
		//start if
		if($row->sft_ctg_id  == $id_catagory){
			$save_dont_delete = 1;
			header("Location: " . base_url() . "Evs_attitude_indicators_form/indicator_attitude");
		}
		//end if
	}
	//end foreach
		//start foreach
		if($save_dont_delete == 0){
			foreach ($data_identification->result() as $row) {
			//start if
			if($row->idf_ctg_id == $id_catagory){
				$this->didf->idf_id = $row->idf_id; 
				$this->didf->delete(); 		 
			}
			//end if
		}
		//end foreach
		
		$this->load->model('Da_evs_category','dctg');
		$this->dctg->ctg_id = $id_catagory;
		$this->dctg->delete();
		
	 	header("Location: " . base_url() . "Evs_attitude_indicators_form/indicator_attitude");
		}
		
	}
	// function indicator_attitude_delete()


	/*
	* indicator_attitude_update
	* Display v_ind_attitude_update_data
	* @input -
	* @output update indicator by form attitude to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-10-15
	*/
	function indicator_attitude_update(){
		
		$updete_pos_length_number_arry = count($this->input->post("arr_update_pos[]")); //max loop update position

		$this->load->model('Da_evs_identification','didf');
		$this->load->model('M_evs_category','mctg');

		$this->mctg->ctg_id = $this->input->post("category_id");
		$data = $this->mctg->get_category_table_for_update(); ////show value category for update on table

		//start foreach
		foreach ($data->result() as $row) {
			$identification_id_for_check = NULL; // check status for identification id 

			//start for loop
			for($i = 0; $i < $updete_pos_length_number_arry; $i++){

				//start if
				if($row->idf_id == $this->input->post('arr_identification_id['.$i.']')){
					$identification_id_for_check = "check";
				}	
				//end if
			}
			//end for loop

			//start if
			if($identification_id_for_check == NULL){
				$this->didf->idf_id = $row->idf_id;
				$this->didf->delete();					   
			}	
			//end if
		print_r("<br>");
		}
		//end foreach
		$ctg_category_detail_en = $this->input->post("up_date_category_en"); //save category detail eng
		$ctg_category_detail_th = $this->input->post("up_date_category_th"); //save category detail th
		$ctg_category_id = $this->input->post("category_id"); //save category id
		$update_pos_length_number_arry = count($this->input->post("arr_update_pos[]")); //max loop update position


		// อัพเดต category_name
		$this->load->model('Da_evs_category','dctg');
		$this->dctg->ctg_category_detail_en = $ctg_category_detail_en;
		$this->dctg->ctg_category_detail_th = $ctg_category_detail_th;
		$this->dctg->ctg_id = $ctg_category_id;
		$this->dctg->update();


		$this->load->model('Da_evs_identification','didf');

		//start for loop
		for($j = 0; $j < $update_pos_length_number_arry; $j++){
			$this->didf->idf_identification_detail_en = $this->input->post('arr_update_iden_en['.$j.']');
			$this->didf->idf_identification_detail_th = $this->input->post('arr_update_iden_th['.$j.']');
			$this->didf->idf_pos_id = $this->input->post('arr_update_pos['.$j.']');
		 	$this->didf->idf_ctg_id = $ctg_category_id;
			$this->didf->idf_id = $this->input->post('arr_identification_id['.$j.']');
		    $this->didf->update();
		}
		//end for loop
		
		$add_pos_length_number_arry = count($this->input->post("arr_add_pos[]"));//max loop insert position
		$category_id = 0; //set category id
		$this->load->model('M_evs_category','mctg');
		$data = $this->mctg->get_category_all(); //show value category all 

		//start foreach
		foreach ($data->result() as $row) {
			//start if
			if($row->ctg_category_detail_en==$ctg_category_detail_en){
				$category_id = $row->ctg_id; 
			}
			//end if
		}
		//end foreach
		$this->load->model('Da_evs_identification','didf');

		//start for loop
		for($j = 0; $j < $add_pos_length_number_arry; $j++){
			$this->didf->idf_identification_detail_en = $this->input->post('arr_add_iden_en['.$j.']');
			$this->didf->idf_identification_detail_th = $this->input->post('arr_add_iden_th['.$j.']');
			$this->didf->idf_pos_id = $this->input->post('arr_add_pos['.$j.']');
		 	$this->didf->idf_ctg_id = $category_id;

		  $this->didf->insert();
		}
		//end for loop

		header("Location: " . base_url() . "Evs_attitude_indicators_form/indicator_attitude");
	}
	// function indicator_attitude_update()

	/*
	* indicator_attitude_insert
	* Display v_ind_attitude_add_data
	* @input  -
	* @output insert indicator by form attitude to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-30
	*/
	function indicator_attitude_insert(){

		$ctg_category_detail_en = $this->input->post("add_category_en"); //save category detail eng
		$ctg_category_detail_th = $this->input->post("add_category_th"); //save category detail th
		$add_pos_length_number_arry = count($this->input->post("arr_add_pos[]")); //max loop insert position
		$category_id = 0; //set category id
	
		$this->load->model('Da_evs_category','dctg');
		$this->dctg->ctg_category_detail_en = $ctg_category_detail_en;
		$this->dctg->ctg_category_detail_th = $ctg_category_detail_th;
		$this->dctg->insert();
		$this->load->model('M_evs_category','mctg');
		$data = $this->mctg->get_category_all(); //show value category all

		//start foreach
		foreach ($data->result() as $row) {
			//start if
		 	if($row->ctg_category_detail_en==$ctg_category_detail_en){
				$category_id = $row->ctg_id;
			}
			//end if
		}
		//end foreach
		$this->load->model('Da_evs_identification','didf');

		//start for loop
		for($j = 0; $j < $add_pos_length_number_arry; $j++){
			$this->didf->idf_identification_detail_en = $this->input->post('arr_add_iden_en['.$j.']');
			$this->didf->idf_identification_detail_th = $this->input->post('arr_add_iden_th['.$j.']');
			$this->didf->idf_pos_id = $this->input->post('arr_add_pos['.$j.']');
		 	$this->didf->idf_ctg_id = $category_id;
	
		  $this->didf->insert();
		}
		//end for loop

		header("Location: " . base_url() . "Evs_attitude_indicators_form/indicator_attitude");
	  
	}
	// function indicator_attitude_insert()

	/*
	* get_position_indicator
	* Display v_ind_attitude
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