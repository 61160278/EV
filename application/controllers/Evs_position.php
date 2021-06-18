<?php
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-10
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Piyasak Srijan	
* @Update Date 2563-10-1
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-2
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-10-5
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-12-15
*/
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/MainController.php");

/*
* Evs_position
* manage position 
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-10
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Piyasak Srijan	
* @Update Date 2563-10-1
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-2
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-10-5
*/
/*
* Evs_position
* manage position 
* @input  -
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-12-15
*/
class Evs_position extends mainController {

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
	* main_position
	* Display v_main_position
	* @input  data position
	* @output data position
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function main_position(){
		$this->load->model('M_evs_position_from','meps');
		$data['info_pos'] = $this->meps->get_all_by_pos(); //show value by position all
		$this->load->model('M_evs_position_level','mpsl');
		$data['info_pls'] = $this->mpsl->get_all(); //show value by position level
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); //show value by year now
		$data['patt_before_year'] = $this->myear->get_by_year_before_now_year(); // show value by before year now
		$this->output("consent/position/v_position_index",$data);
	}
	// function main_position()


	/*
	* show_position_all
	* Display v_main_position
	* @input position level id
	* @output show data manage position
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function show_position_all($pos_psl_id){
	
		$this->load->model('M_evs_position','mpos');
		$this->mpos->pos_psl_id = $pos_psl_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_pls_id(); //show value by position by id

		$this->load->model('M_evs_position_level','mpsl');
		$data['pos_lv'] = $this->mpsl->get_all(); //show value by position level all

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); //show value by year now

		$data['pls_level_from'] = $pos_psl_id; //show value by position level by id

		$this->output('consent/position/v_position_insert',$data);
	}// function show_position_all()

	/*
	* show_position_edit
	* Display v_main_position
	* @input position level id
	* @output edit manage position to database
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function show_position_edit($pos_psl_id){

		$this->load->model('M_evs_position','mpos');
		$this->mpos->pos_psl_id = $pos_psl_id; 
		$data['info_pos'] = $this->mpos->get_position_level_by_pls_id(); //show value position by id

		$this->load->model('M_evs_position_level','mpls');
		$data['pos_lv'] = $this->mpls->get_all(); //show value position level all
		

		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear'); 
		$data['patt_year'] = $this->myear->get_by_year_now_year(); //show value year now
		$year = $data['patt_year']->row(); // show value year now 
		//end set year now

		$year->pay_id;
		$data['data_pay_save'] = 0; // show value before year now

		$this->load->model('M_evs_position_from','mps'); 
		$this->mps->pos_psl_id = $pos_psl_id;
		$this->mps->ps_pay_id = $year->pay_id;
		$data['ps_pos'] = $this->mps->get_by_pos(); // show value position

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now 
	

		$data['pls_level_from'] = $pos_psl_id; // show value position level
		$this->output('consent/position/v_position_edit',$data);
	}// function show_position_edit()

	
	/*
	* show_position_new_year_edit
	* Display v_main_position
	* @input position level id
	* @output edit manage position to database
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function show_position_new_year_edit($pos_psl_id){

		$this->load->model('M_evs_position','mpos');
		$this->mpos->pos_psl_id = $pos_psl_id;
		$data['info_pos'] = $this->mpos->get_position_level_by_pls_id(); // show value position level by id

		$this->load->model('M_evs_position_level','mpsl');
		$data['pos_lv'] = $this->mpsl->get_all(); // show value position level all
		

		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_before_now_year(); // show value before year now
		$year = $data['patt_year']->row(); // show value before year now
		//end set year now

		$year->pay_id;
		$data['data_pay_save'] = 1; // show value before pattern now

		$this->load->model('M_evs_position_from','mps');
		$this->mps->pos_psl_id = $pos_psl_id;
		$this->mps->ps_pay_id = $year->pay_id;
		$data['ps_pos'] = $this->mps->get_by_pos(); // show value position by id

		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
	

		$data['pls_level_from'] = $pos_psl_id; // show value position level
		$this->output('consent/position/v_position_edit',$data);
	}// function show_position_edit()

	/*
	* position_insert
	* Display v_main_position
	* @input position level id
	* @output insert manage position to database
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function position_insert($pos_psl_id){
		$pos_length = count($this->input->post("arr_pos_id[]")); //length Position
		$pos_length_checked_PE = count($this->input->post("arr_checked_PE[]")); //length Position Check PE Tool
		$pos_length_checked_CE = count($this->input->post("arr_checked_CE[]"));	//length Position Check CE Tool
		$arr_checked_PE[] = NULL; //Check PE Tool
		$arr_checked_CE[] = NULL; //Check CE Tool
		$arr_checked_form_PE[] = NULL; //Check Form PE Tool
		$arr_checked_form_CE[] = NULL; //Check Form CE Tool
		$arr_checked_weight_PE[] = NULL; //Check weight PE Tool
		$arr_checked_weight_CE[] = NULL; //Check weight CE Tool
		$arr_checked_atd_PE[] = NULL; //Check attendance PE Tool
		$arr_checked_atd_CE[] = NULL; //Check attendance CE Tool
		
		//start for loop i
		 for($i = 0; $i < $pos_length; $i++){
			$arr_checked_PE[$i] = 0; //Check PE Tool
			$arr_checked_CE[$i] = 0; //Check CE Tool
			$arr_checked_form_PE[$i] = NULL; //Check Form PE Tool
			$arr_checked_form_CE[$i] = NULL; //Check Form CE Tool
			$arr_checked_weight_PE[$i] = 0; //Check weight PE Tool
		    $arr_checked_weight_CE[$i] = 0; //Check weight CE Tool
			$arr_checked_atd_PE[$i] = 0; //Check attendance PE Tool
			$arr_checked_atd_CE[$i] = 0; //Check attendance CE Tool
		
			//start for loop j
			for($j = 0; $j < $pos_length_checked_PE; $j++){

				//start if
				if ($this->input->post('arr_pos_id['.$i.']') == $this->input->post('arr_checked_PE['.$j.']')){
					$arr_checked_PE[$i] = 1; 
					$arr_checked_form_PE[$i] = $this->input->post('arr_formPE['.$j.']'); $arr_checked_weight_PE[$i] = $this->input->post('arr_form_adt_PE['.$j.']');
					$arr_checked_atd_PE[$i] = 100 - $this->input->post('arr_form_adt_PE['.$j.']');
				}
				//end if
			}
			//end for loop j

			//start for loop k
			for($k = 0; $k < $pos_length_checked_CE; $k++){
				
				//start if
				if ($this->input->post('arr_pos_id['.$i.']') == $this->input->post('arr_checked_CE['.$k.']')){
					$arr_checked_CE[$i] = 1; 
					$arr_checked_form_CE[$i] = $this->input->post('arr_formCE['.$k.']'); $arr_checked_weight_CE[$i] = $this->input->post('arr_form_adt_CE['.$k.']');
					$arr_checked_atd_CE[$i] = 100 - $this->input->post('arr_form_adt_CE['.$k.']');
				}
				//end if
			}
			//end for loop k
		}
		//end for loop i
		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now

		$this->load->model('Da_evs_position_from','dps');
		//start for loop
		for($m = 0; $m < $pos_length; $m++){
				
		
			$this->dps->ps_form_pe = $arr_checked_form_PE[$m]; //Position Form PE Tool
			$this->dps->ps_form_ce = $arr_checked_form_CE[$m]; //Position Form CE Tool
			$this->dps->ps_ratio_pe = $arr_checked_weight_PE[$m]; //Position ratio PE Tool
			$this->dps->ps_ratio_atd_pe = $arr_checked_atd_PE[$m]; //Position ratio attendance PE Tool
			$this->dps->ps_ratio_ce = $arr_checked_weight_CE[$m]; //Position Form CE Tool
			$this->dps->ps_ratio_atd_ce = $arr_checked_atd_CE[$m]; //Position ratio attendance CE Tool
			$this->dps->ps_status_form_pe = $arr_checked_PE[$m]; //Position status form PE Tool
			$this->dps->ps_status_form_ce = $arr_checked_CE[$m]; //Position status form CE Tool
			$this->dps->ps_status_set_form_pe = 1; //Position status set form PE Tool
			$this->dps->ps_status_set_form_ce = 1; //Position status set form CE Tool
			$this->dps->ps_status_form_update = $pos_psl_id; //Position status form update
			$this->dps->ps_pos_id = $this->input->post('arr_pos_id['.$m.']'); // person position ID
			$this->dps->ps_pay_id = $year->pay_id; // year and pattern ID
			$this->dps->insert();
		}
		//end for loop

		header("Location: " . base_url() . 'Evs_position/show_position_edit/'.$pos_psl_id.'');

	}
	// function position_insert()

	/*
	* position_edit
	* Display v_main_position
	* @input position level id
	* @output edit manage position to database
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-15
	*/
	function position_edit($pls_level_from){
		$pos_length = count($this->input->post("arr_pos_id[]")); //length Position
		$pos_length_checked_PE = count($this->input->post("arr_checked_PE[]")); //length Position Check PE Tool
		$pos_length_checked_CE = count($this->input->post("arr_checked_CE[]")); //length Position Check CE Tool
	

		$arr_checked_PE[] = NULL; //Check PE Tool
		$arr_checked_CE[] = NULL; //Check CE Tool
		$arr_checked_form_PE[] = NULL; //Check Form PE Tool
		$arr_checked_form_CE[] = NULL; //Check Form CE Tool
		$arr_checked_weight_PE[] = NULL; //Check weight PE Tool
		$arr_checked_weight_CE[] = NULL; //Check weight CE Tool
		$arr_checked_atd_PE[] = NULL; //Check attendance PE Tool
		$arr_checked_atd_CE[] = NULL; //Check attendance CE Tool
		
		//start for loop i
		 for($i = 0; $i < $pos_length; $i++){
			$arr_checked_PE[$i] = 0; //Check PE Tool
			$arr_checked_CE[$i] = 0; //Check CE Tool
			$arr_checked_form_PE[$i] = NULL; //Check Form PE Tool
			$arr_checked_form_CE[$i] = NULL; //Check Form CE Tool
			$arr_checked_weight_PE[$i] = 0; //Check weight PE Tool
		    $arr_checked_weight_CE[$i] = 0; //Check weight CE Tool
			$arr_checked_atd_PE[$i] = 0; //Check attendance PE Tool
			$arr_checked_atd_CE[$i] = 0; //Check attendance CE Tool
		
			//start for loop j
			for($j = 0; $j < $pos_length_checked_PE; $j++){

				//start if
				if ($this->input->post('arr_pos_id['.$i.']') == $this->input->post('arr_checked_PE['.$j.']')){
					$arr_checked_PE[$i] = 1; 
					$arr_checked_form_PE[$i] = $this->input->post('arr_formPE['.$j.']'); $arr_checked_weight_PE[$i] = $this->input->post('arr_form_adt_PE['.$j.']');
					$arr_checked_atd_PE[$i] = 100 - $this->input->post('arr_form_adt_PE['.$j.']');
				}
				//end if
			}
			//end for loop j

			//start for loop k
			for($k = 0; $k < $pos_length_checked_CE; $k++){

				//start if
				if ($this->input->post('arr_pos_id['.$i.']') == $this->input->post('arr_checked_CE['.$k.']')){
					$arr_checked_CE[$i] = 1; 
					$arr_checked_form_CE[$i] = $this->input->post('arr_formCE['.$k.']'); $arr_checked_weight_CE[$i] = $this->input->post('arr_form_adt_CE['.$k.']');
					$arr_checked_atd_CE[$i] = 100 - $this->input->post('arr_form_adt_CE['.$k.']');
				}
				//end if
			}
			//end for loop k
		 
		}
		//end for loop i

		//string set year now
		$this->load->model('M_evs_pattern_and_year','myear');
		$data['patt_year'] = $this->myear->get_by_year_now_year(); // show value year now
		$year = $data['patt_year']->row(); // show value year now
		//end set year now



		$this->load->model('M_evs_position_from','mps');

		//start for loop m
		for($m = 0; $m < $pos_length; $m++){
				
			
			// echo "<br>"; 
			$this->mps->ps_form_pe = $arr_checked_form_PE[$m]; //Position Form PE Tool
			$this->mps->ps_form_ce = $arr_checked_form_CE[$m]; //Position Form CE Tool
			$this->mps->ps_ratio_pe = $arr_checked_weight_PE[$m]; //Position ratio PE Tool
			$this->mps->ps_ratio_atd_pe = $arr_checked_atd_PE[$m]; //Position ratio attendance PE Tool
			$this->mps->ps_ratio_ce = $arr_checked_weight_CE[$m]; //Position ratio CE Tool
			$this->mps->ps_ratio_atd_ce = $arr_checked_atd_CE[$m]; //Position ratio attendance CE Tool
			$this->mps->ps_status_form_pe = $arr_checked_PE[$m]; //Position status form PE Tool
			$this->mps->ps_status_form_ce = $arr_checked_CE[$m]; //Position status form CE Tool
			$this->mps->ps_status_set_form_pe = 1; //Position status set form PE Tool
			$this->mps->ps_status_set_form_ce = 1; //Position status set form CE Tool
			$this->mps->ps_status_form_update = $pls_level_from; //Position status form update
			$this->mps->ps_pos_id = $this->input->post('arr_pos_id['.$m.']'); // person position ID
			$this->mps->ps_pay_id = $year->pay_id; //  year and pattern ID
			$this->mps->update_by_pay_id();
		}
		//end for loop m
		
		header("Location: " . base_url() . 'Evs_position/show_position_edit/'.$pls_level_from.'');

	}
	// function position_edit()

	
}