<?php
/*
* Evs_attitude_form 
* Form Attitude & Behavior Management of Position
* @input  -
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Evs_form.php");

/*
* Evs_attitude_form 
* Form Attitude & Behavior Management of Position
* @input  -
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
class Evs_attitude_form extends Evs_form {

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
	* form_attitude
	* Attitude & behavior Managnement Form
	* @input  -
	* @output -
	* @output Display v_form_attitude
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-10-13
	*/
	function form_attitude($pos_id,$year_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); //show value position level by id
		$data['info_pos_id'] = $pos_id; //position id

		$this->dpf->ps_pos_id = $pos_id;
		$data['info_pos_form'] = $this->dpf->get_by_key()->result(); // show value position by id on manage form 

		$this->load->model('Da_evs_set_form_attitude','dstf');
		$this->dstf->sft_pos_id = $pos_id;
		$this->dstf->sft_pay_id = $year_id;
		$data['info_pos_attitude_form'] = $this->dstf->get_by_key()->result(); // show value position by id by year id on Attitude form
	

		//start if-else
		if(count($data['info_pos_attitude_form']) == 0){
			$this->output("consent/form/v_attitude_form_insert",$data);
		}else{
			$this->output("consent/form/v_attitude_form_edit",$data);
		}
		//end if-else
	}
	//form_attitude()

   /*
	* get_category
	* get category data from database
	* @input -
	* @output catagory data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_category(){
		$this->load->model('M_evs_category','mctg');
		$data = $this->mctg->get_category_identification()->result(); // value category and identification all
		echo json_encode($data);
	}
	//get_category()

	/*
	* get_category_by_position
	* get category data by position ID from database
	* @input  -
	* @output category data by position ID
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_category_by_position(){
		$this->load->model('M_evs_category','mctg');
		$category_id = $this->input->post('category_id'); // category ID
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mctg->ctg_id = $category_id;
		$this->mctg->idf_ctg_id = $category_id;
		$this->mctg->idf_pos_id = $pos_id;

		$data = $this->mctg->get_category_identification_by_position()->result(); // value category and identification all by position id
		echo json_encode($data);
	}
	//get_category_by_position()

	/*
	* form_attitude_insert
	* insert category ID, position ID, weight of category ID to database
	* @input -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function form_attitude_insert(){
		$this->load->model('Da_evs_set_form_attitude','dctw');
		$pos_id = $this->input->post('pos_id'); // position ID
		$index = $this->input->post('index'); // sum of index
		$year_id = $this->input->post('value_year_id'); // year now ID
		$arr_category = []; // array category data
		$arr_weight = []; // array weight of category

		//start for loop
		for($i=0 ; $i<$index ; $i++){
			$arr_category[$i] = $this->input->post('arr_category['.$i.']');
			$arr_weight[$i] = $this->input->post('arr_weight['.$i.']');
		}
		//end for loop

		//start for loop
		for($i=0 ; $i<$index ; $i++){
			$this->dctw->sft_weight = $arr_weight[$i];
			$this->dctw->sft_ctg_id = $arr_category[$i];
			$this->dctw->sft_pos_id = $pos_id;
			$this->dctw->sft_pay_id = $year_id;
			$this->dctw->insert();
		}
		//end for loop
		//header("Location: " . base_url() . "Evs_form/form_position/" . $pos_id . "/" . $year_id."");

	}
	//form_attitude_insert()

	/*
	* get_category_weight
	* get category of weight data from database
	* @input -
	* @output category of weight data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_category_weight(){
		$this->load->model('M_evs_set_form_attitude','mctw');
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mctw->ctw_pos_id = $pos_id;
		$data = $this->mctw->get_category_weight_all()->result(); // value attitude form all
		echo json_encode($data);

	}
	//function get_category_weight()

	/*
	* get_category_weight_sort
	* get category of weight data from database
	* @input -
	* @output category of weight data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_category_weight_sort(){
		$this->load->model('M_evs_set_form_attitude','mctw');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // position ID
		$this->mctw->sft_pos_id = $pos_id;
		$this->mctw->sft_pay_id = $year_id;
		$data = $this->mctw->get_category_by_position_sort()->result(); // value attitude form by position id
		echo json_encode($data);
	}
	//function get_category_weight_sort()

	/*
	* get_identification_weight_sort
	* get category of weight data from database
	* @input -
	* @output category of weight data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_identification_weight_sort(){
		$this->load->model('M_evs_identification','midf');
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->midf->idf_pos_id = $pos_id;
		$data = $this->midf->get_identification_by_position_sort()->result(); // value attitude form by position id
		echo json_encode($data);
	}
	//function get_identification_weight_sort()


	/*
	* form_attitude_update
	* update category ID, position ID, weight of category ID to database
	* @input -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-01
	*/
	function form_attitude_update(){
		$this->load->model('Da_evs_set_form_attitude','dctw');
		$this->load->model('M_evs_set_form_attitude','mctw');

		$pos_id = $this->input->post('pos_id'); // position ID
		$lenght_of_data = $this->input->post('index'); // sum of index
		$year_id = $this->input->post('value_year_id'); // year now ID
		$arr_category = []; // array category data
		$arr_weight = []; // array weight of category
		
		//start for loop
		for($i=0 ; $i<$lenght_of_data ; $i++){
			$arr_category[$i] = $this->input->post('arr_category['.$i.']');
			$arr_weight[$i] = $this->input->post('arr_weight['.$i.']');
		}
		//end for loop

		$this->mctw->sft_pos_id = $pos_id;
		$this->mctw->sft_pay_id = $year_id;
		$this->mctw->delete();
		//start for loop
		for($i=0 ; $i<$lenght_of_data ; $i++){

			//start if
				$this->dctw->sft_weight = $arr_weight[$i];
				$this->dctw->sft_pos_id = $pos_id;
				$this->dctw->sft_ctg_id = $arr_category[$i];
				$this->dctw->sft_pay_id = $year_id;
				$this->dctw->insert();
		
			//end if
			
		}
		//end for loop
		//header("Location: " . base_url() . "/Evs_form/form_position/" . $pos_id . "/" . $year_id."");
		

	}
	//form_attitude_update()



	/*
	* indicator_attitude_view_insert_data
	* Display v_ind_attitude_form_indicator_table
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-03
	*/
	function indicator_attitude_view_insert_data($pos_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); //show value position level by id
		$data['info_pos_lvl'] = $this->mpos->get_position_level(); // show value position level all
		$data['info_pos_id'] = $pos_id; //position id
		

		$this->dpf->ps_pos_id = $pos_id;
		$data['info_pos_form'] = $this->dpf->get_by_key()->result(); // show value position by id on manage form
		 $this->output("consent/form/v_attitude_form_indicator_insert",$data);
	}
	// function indicator_attitude_view_insert_data()


	/*
	* indicator_attitude_table
	* Display v_ind_attitude_form_indicator_table
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-03
	*/
	function indicator_attitude_table($pos_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');
		$this->load->model('M_evs_category','mctg');
		$this->load->model('M_evs_position_level','mepl');
		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); // show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_lvl'] = $this->mpos->get_position_level(); // show value position level all
		$data['info_pos_id'] = $pos_id; // position id
		$data['cate_data'] = $this->mctg->get_category_identification()->result(); //show value category all
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); // show value position all

		$this->dpf->ps_pos_id = $pos_id;
		$this->output("consent/form/v_attitude_form_indicator_table",$data);
	}
	// function indicator_attitude_table()

	/*
	* indicator_attitude_view_edit_data
	* Display v_ind_attitude_update_data
	* @input id category
	* @output update indicator by form attitude to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/
	function indicator_attitude_view_edit_data($id_catagory,$pos_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');
		$this->load->model('M_evs_category','mctg');
		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); // show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_lvl'] = $this->mpos->get_position_level(); // show value position level all
		$data['info_pos_id'] = $pos_id; // position id
		$this->mctg->ctg_id = $id_catagory;
		$data['cattagory_table_id'] = $this->mctg->get_category_table_id(); //show value category by id on table
		$data['cattagory_table'] = $this->mctg->get_category_table_for_update(); //show value category for update on table
		$this->load->model('M_evs_position','mpos');
		$data['cattagory_position'] = $this->mpos->get_all(); //show value category by position all on table
		$this->output("consent/form/v_attitude_form_indicator_edit",$data);
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
	function indicator_attitude_delete($id_catagory, $pos_id){
	
		$this->load->model('M_evs_identification','midf');
		$this->load->model('Da_evs_identification','didf');
		$data = $this->midf->get_identification_all(); // // show value identification all
		
		//start foreach
		foreach ($data->result() as $row) {
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
		
		header("Location: " . base_url() . "Evs_attitude_form/indicator_attitude_table/". $pos_id);
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
	function indicator_attitude_update($pos_id){

		$updete_pos_length_number_arry = count($this->input->post("arr_update_pos[]")); //max loop update position

		$this->load->model('Da_evs_identification','didf');
		$this->load->model('M_evs_category','mctg');

		$this->mctg->ctg_id = $this->input->post("category_id"); 
		$data = $this->mctg->get_category_table_for_update(); // show value category for update on table

		//start foreach
		foreach ($data->result() as $row) {
			$identification_id_for_check = NULL; // value check for identification

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
		$data = $this->mctg->get_category_all(); // show value category all

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

		header("Location: " . base_url() . "Evs_attitude_form/indicator_attitude_table/". $pos_id);
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
		$ctg_category_detail_th = $this->input->post("add_category_th"); //save category detail eng
		//$add_pos_length_number_arry = count($this->input->post("arr_add_pos[]")); //max loop insert position
		$index_data = $this->input->post("index_data"); // index data
		$pos_id = $this->input->post("value_pos_id"); // position ID
		$category_id = 0; //set category id
	
		$this->load->model('Da_evs_category','dctg');
		$this->dctg->ctg_category_detail_en = $ctg_category_detail_en;
		$this->dctg->ctg_category_detail_th = $ctg_category_detail_th;
		$this->dctg->insert();
		$this->load->model('M_evs_category','mctg');
		$data = $this->mctg->get_category_all(); // show value category all

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
		for($j = 0; $j < $index_data; $j++){
			$this->didf->idf_identification_detail_en = $this->input->post('arr_add_iden_en['.$j.']');
			$this->didf->idf_identification_detail_th = $this->input->post('arr_add_iden_th['.$j.']');
			$this->didf->idf_pos_id = $pos_id;
		 	$this->didf->idf_ctg_id = $category_id;
	
		  $this->didf->insert();
		}
		//end for loop
		print_r($this->input->post('arr_add_iden_en[]'));
		print_r($this->input->post('arr_add_iden_th[]'));
		print_r($pos_id);
		header("Location: " . base_url() . "Evs_attitude_form/indicator_attitude_table/". $pos_id);
	  
	}
	// function indicator_attitude_insert()

	/*
	* get_position_level
	* Display -
	* @input  -
	* @output get position level data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-03
	*/
	function get_position_level(){
		$this->load->model('M_evs_position','mpos');		
		$data = $this->mpos->get_position_level()->result(); // show value position level all
		echo json_encode($data);
	}
	// function get_position_level()





}



?>