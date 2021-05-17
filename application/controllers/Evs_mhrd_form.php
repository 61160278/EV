<?php
/*
* Evs_mhrd_form 
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
* Evs_mhrd_form 
* Form G&O Management of Position
* @input  -   
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-15
*/
class Evs_mhrd_form extends MainController {

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
	* form_mhrd
	* Attitude & behavior Managnement Form
	* @input  -
	* @output -
	* @output Display v_form_mhrd
	* @author 	Tanadon Tangjaimongkhon
	* @Create Date 2563-10-13
	*/
	function form_mhrd($pos_id,$year_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');

		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); //show value position level by id
		$data['info_pos_id'] = $pos_id; //position id

		$this->dpf->ps_pos_id = $pos_id;
		$data['info_pos_form'] = $this->dpf->get_by_key()->result(); // show value position by id on manage form 

		$this->load->model('Da_evs_set_form_mhrd','dstf');
		$this->dstf->sfi_pos_id = $pos_id;
		$this->dstf->sfi_pay_id = $year_id;
		$data['info_pos_mhrd_form'] = $this->dstf->get_by_key()->result(); // show value position by id by year id on Attitude form
	

		//start if-else
		if(count($data['info_pos_mhrd_form']) == 0){
			$this->output("consent/form/v_mhrd_form_insert",$data);
		}else{
			$this->output("consent/form/v_mhrd_form_edit",$data);
		}
		//end if-else
	}
	//form_mhrd()

   /*
	* get_item
	* get item data from database
	* @input -
	* @output catagory data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_item(){
		$this->load->model('M_evs_item','mitm');
		$data = $this->mitm->get_item_description()->result(); // value item and description all
		echo json_encode($data);
	}
	//get_item()

	/*
	* get_item_by_position
	* get item data by position ID from database
	* @input  -
	* @output item data by position ID
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_item_by_position(){
		$this->load->model('M_evs_item','mitm');
		$item_id = $this->input->post('item_id'); // item ID
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mitm->itm_id = $item_id;
		$this->mitm->dep_itm_id = $item_id;
		$this->mitm->dep_pos_id = $pos_id;

		$data = $this->mitm->get_item_description_by_position()->result(); // value item and description all by position id
		echo json_encode($data);
	}
	//get_item_by_position()

	/*
	* form_mhrd_insert
	* insert item ID, position ID, weight of item ID to database
	* @input -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function form_mhrd_insert(){
		$this->load->model('Da_evs_set_form_mhrd','dsfi');
		$pos_id = $this->input->post('pos_id'); // position ID
		$index = $this->input->post('index'); // sum of index
		$year_id = $this->input->post('value_year_id'); // year now ID
		$arr_item = []; // array item data
		$checkbox_ex = []; // array weight of item

		//start for loop
		for($i=0 ; $i<$index ; $i++){
			$arr_item[$i] = $this->input->post('arr_item['.$i.']');
			$checkbox_ex[$i] = $this->input->post('checkbox_ex['.$i.']');
		}
		//end for loop

		//start for loop
		for($i=0 ; $i<$index ; $i++){
			$this->dsfi->sfi_excel_import = $checkbox_ex[$i];
			$this->dsfi->sfi_itm_id = $arr_item[$i];
			$this->dsfi->sfi_pos_id = $pos_id;
			$this->dsfi->sfi_pay_id = $year_id;
			$this->dsfi->insert();
		}
		//end for loop
		//header("Location: " . base_url() . "Evs_form/form_position/" . $pos_id . "/" . $year_id."");

	}
	//form_mhrd_insert()

	/*
	* get_item_weight
	* get item of weight data from database
	* @input -
	* @output item of weight data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_item_weight(){
		$this->load->model('M_evs_set_form_mhrd','msfi');
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->msfi->sfi_pos_id = $pos_id;
		$data = $this->msfi->get_item_weight_all()->result(); // value mhrd form all
		echo json_encode($data);

	}
	//function get_item_weight()

	/*
	* get_item_weight_sort
	* get item of weight data from database
	* @input -
	* @output item of weight data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_item_weight_sort(){
		$this->load->model('M_evs_set_form_mhrd','msfi');
		$pos_id = $this->input->post('pos_id'); // position ID
		$year_id = $this->input->post('year_id'); // position ID
		$this->msfi->sfi_pos_id = $pos_id;
		$this->msfi->sfi_pay_id = $year_id;
		$data = $this->msfi->get_item_by_position_sort()->result(); // value mhrd form by position id
		echo json_encode($data);
	}
	//function get_item_weight_sort()

	/*
	* get_description_weight_sort
	* get item of weight data from database
	* @input -
	* @output item of weight data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-10-15
	*/
	function get_description_weight_sort(){
		$this->load->model('M_evs_description','mdep');
		$pos_id = $this->input->post('pos_id'); // position ID
		$this->mdep->dep_pos_id = $pos_id;
		$data = $this->mdep->get_description_by_position_sort()->result(); // value mhrd form by position id
		echo json_encode($data);
	}
	//function get_description_weight_sort()


	/*
	* form_mhrd_update
	* update item ID, position ID, weight of item ID to database
	* @input -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-01
	*/
	function form_mhrd_update(){
		$this->load->model('Da_evs_set_form_mhrd','dsfi');
		$this->load->model('M_evs_set_form_mhrd','msfi');

		$pos_id = $this->input->post('pos_id'); // position ID
		$lenght_of_data = $this->input->post('index'); // sum of index
		$year_id = $this->input->post('value_year_id'); // year now ID
		$arr_item = []; // array item data
		$checkbox_ex = []; // array weight of item
		
		//start for loop
		for($i=0 ; $i<$lenght_of_data ; $i++){
			$arr_item[$i] = $this->input->post('arr_item['.$i.']');
			$checkbox_ex[$i] = $this->input->post('checkbox_ex['.$i.']');
		}
		//end for loop

		$this->msfi->sfi_pos_id = $pos_id;
		$this->msfi->sfi_pay_id = $year_id;
		$this->msfi->delete();
		//start for loop
		for($i=0 ; $i<$lenght_of_data ; $i++){

			//start if
				$this->dsfi->sfi_excel_import = $checkbox_ex[$i];
				$this->dsfi->sfi_pos_id = $pos_id;
				$this->dsfi->sfi_itm_id = $arr_item[$i];
				$this->dsfi->sfi_pay_id = $year_id;
				$this->dsfi->insert();
		
			//end if
			
		}
		//end for loop
		//header("Location: " . base_url() . "/Evs_form/form_position/" . $pos_id . "/" . $year_id."");
		

	}
	//form_mhrd_update()



	/*
	* indicator_mhrd_view_insert_data
	* Display v_ind_mhrd_form_indicator_table
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-03
	*/
	function indicator_mhrd_view_insert_data($pos_id){
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
		 $this->output("consent/form/v_mhrd_form_indicator_insert",$data);
	}
	// function indicator_mhrd_view_insert_data()


	/*
	* indicator_mhrd_table
	* Display v_ind_mhrd_form_indicator_table
	* @input  -
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-12-03
	*/
	function indicator_mhrd_table($pos_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');
		$this->load->model('M_evs_item','mitm');
		$this->load->model('M_evs_position_level','mepl');
		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); // show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_lvl'] = $this->mpos->get_position_level(); // show value position level all
		$data['info_pos_id'] = $pos_id; // position id
		$data['cate_data'] = $this->mitm->get_item_description()->result(); //show value item all
		$data['pos_lv_data'] = $this->mepl->get_all()->result(); // show value position all

		$this->dpf->ps_pos_id = $pos_id;
		$this->output("consent/form/v_mhrd_form_indicator_table",$data);
	}
	// function indicator_mhrd_table()

	/*
	* indicator_mhrd_view_edit_data
	* Display v_ind_mhrd_update_data
	* @input id item
	* @output update indicator by form mhrd to database
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-27
	*/
	function indicator_mhrd_view_edit_data($id_catagory,$pos_id){
		$this->load->model('Da_evs_position_from','dpf');
		$this->load->model('M_evs_position','mpos');
		$this->load->model('M_evs_pattern_and_year','myear');
		$this->load->model('M_evs_item','mitm');
		$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); // show value pattern and year by year now
		$this->mpos->pos_id = $pos_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
		$data['info_pos_lvl'] = $this->mpos->get_position_level(); // show value position level all
		$data['info_pos_id'] = $pos_id; // position id
		$this->mitm->itm_id = $id_catagory;
		$data['cattagory_table_id'] = $this->mitm->get_item_table_id(); //show value item by id on table
		$data['cattagory_table'] = $this->mitm->get_item_table_for_update(); //show value item for update on table
		$this->load->model('M_evs_position','mpos');
		$data['cattagory_position'] = $this->mpos->get_all(); //show value item by position all on table
		$this->output("consent/form/v_mhrd_form_indicator_edit",$data);
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
	function indicator_mhrd_delete($id_catagory, $pos_id){
	
		$this->load->model('M_evs_description','mdep');
		$this->load->model('Da_evs_description','ddep');
		$data = $this->mdep->get_description_all(); // // show value description all
		
		//start foreach
		foreach ($data->result() as $row) {
			//start if
			if($row->dep_itm_id == $id_catagory){
				$this->ddep->dep_id = $row->dep_id; 
				$this->ddep->delete(); 		 
			}
			//end if
		}
		//end foreach
		
		$this->load->model('Da_evs_item','ditm');
		$this->ditm->itm_id = $id_catagory;
		$this->ditm->delete();
		
		header("Location: " . base_url() . "Evs_mhrd_form/indicator_mhrd_table/". $pos_id);
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
	function indicator_mhrd_update($pos_id){

		$updete_pos_length_number_arry = count($this->input->post("arr_update_pos[]")); //max loop update position

		$this->load->model('Da_evs_description','ddep');
		$this->load->model('M_evs_item','mitm');

		$this->mitm->itm_id = $this->input->post("item_id"); 
		$data = $this->mitm->get_item_table_for_update(); // show value item for update on table

		//start foreach
		foreach ($data->result() as $row) {
			$description_id_for_check = NULL; // value check for description

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


		// อัพเดต item_name
		$this->load->model('Da_evs_item','ditm');
		$this->ditm->itm_item_detail_en = $itm_item_detail_en;
		$this->ditm->itm_item_detail_th = $itm_item_detail_th;
		$this->ditm->itm_id = $itm_item_id;
		$this->ditm->update();


		$this->load->model('Da_evs_description','ddep');

		//start for loop
		for($j = 0; $j < $update_pos_length_number_arry; $j++){
			$this->ddep->dep_description_detail_en = $this->input->post('arr_update_dep_en['.$j.']');
			$this->ddep->dep_description_detail_th = $this->input->post('arr_update_dep_th['.$j.']');
			$this->ddep->dep_pos_id = $this->input->post('arr_update_pos['.$j.']');
		 	$this->ddep->dep_itm_id = $itm_item_id;
			$this->ddep->dep_id = $this->input->post('arr_description_id['.$j.']');
		    $this->ddep->update();
		}
		//end for loop
		
		$add_pos_length_number_arry = count($this->input->post("arr_add_pos[]"));//max loop insert position
		$item_id = 0; //set item id
		$this->load->model('M_evs_item','mitm');
		$data = $this->mitm->get_item_all(); // show value item all

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
		for($j = 0; $j < $add_pos_length_number_arry; $j++){
			$this->ddep->dep_description_detail_en = $this->input->post('arr_add_dep_en['.$j.']');
			$this->ddep->dep_description_detail_th = $this->input->post('arr_add_dep_th['.$j.']');
			$this->ddep->dep_pos_id = $this->input->post('arr_add_pos['.$j.']');
		 	$this->ddep->dep_itm_id = $item_id;

		  $this->ddep->insert();
		}
		//end for loop

		header("Location: " . base_url() . "Evs_mhrd_form/indicator_mhrd_table/". $pos_id);
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
		$itm_item_detail_th = $this->input->post("add_item_th"); //save item detail eng
		//$add_pos_length_number_arry = count($this->input->post("arr_add_pos[]")); //max loop insert position
		$index_data = $this->input->post("index_data"); // index data
		$pos_id = $this->input->post("value_pos_id"); // position ID
		$item_id = 0; //set item id
	
		$this->load->model('Da_evs_item','ditm');
		$this->ditm->itm_item_detail_en = $itm_item_detail_en;
		$this->ditm->itm_item_detail_th = $itm_item_detail_th;
		$this->ditm->insert();
		$this->load->model('M_evs_item','mitm');
		$data = $this->mitm->get_item_all(); // show value item all

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
		for($j = 0; $j < $index_data; $j++){
			$this->ddep->dep_description_detail_en = $this->input->post('arr_add_dep_en['.$j.']');
			$this->ddep->dep_description_detail_th = $this->input->post('arr_add_dep_th['.$j.']');
			$this->ddep->dep_pos_id = $pos_id;
		 	$this->ddep->dep_itm_id = $item_id;
	
		  $this->ddep->insert();
		}
		//end for loop
		print_r($this->input->post('arr_add_dep_en[]'));
		print_r($this->input->post('arr_add_dep_th[]'));
		print_r($pos_id);
		header("Location: " . base_url() . "Evs_mhrd_form/indicator_mhrd_table/". $pos_id);
	  
	}
	// function indicator_mhrd_insert()

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