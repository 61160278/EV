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
	

    // /*
	// * form_g_and_o
	// * G&O Managnement Form
	// * @input  -
	// * @output Display v_g_and_o_form_insert
	// * @author Tanadon Tangjaimongkhon
	// * @Create Date 2563-10-01
	// */
	// /*
	// * form_g_and_o
	// * G&O Managnement Form
	// * @input  -
	// * @output Display v_g_and_o_form_insert
	// * @author Piyasak Srijan
	// * @Update Date 2563-12-30
	// */
	// function form_mhrd($pos_id,$year_id){
	// 	$this->load->model('Da_evs_position_from','dpf');
	// 	$this->load->model('M_evs_position','mpos');
	// 	$this->load->model('M_evs_pattern_and_year','myear');
	// 	//$this->load->model("M_evs_set_form_g_and_o","msfg");

	// 	$data['info_pattern_year'] = $this->myear->get_by_year_now_year(); //show value pattern and year by year now
	// 	$this->mpos->pos_id = $pos_id;
	// 	$data['info_pos'] = $this->mpos->get_position_level_by_id(); // show value position level by id
	// 	$data['info_pos_id'] = $pos_id; // show value position by id
	// 	$data['info_year_id'] = $year_id; // show value year_id
		
	// 	$this->dpf->sfg_pos_id = $pos_id;
	// 	$this->dpf->sfg_pay_id = $year_id;
	// 	$data['qu_form'] = $this->dpf->get_by_key()->result(); // show value position by id by year_id

	// 	// $this->msfg->sfg_pos_id = $pos_id;
	// 	// $this->msfg->sfg_pay_id = $year_id;
	// 	// $data['info_pos_form'] = $this->msfg->get_all_by_key_by_year(); // show value position form G&O by id by year_id
		
	// 	// if(count($data['info_pos_form']->result()) == 0){
	// 		$this->output("consent/form/v_mhrd_form_insert",$data);
	// 	// }else{
	// 		//$this->output("consent/form/v_g_and_o_form_edit",$data);
	// 	// }	
	// }
	// //function form_g_and_o_()

	// function fetch()//ดึงจาาต้าเบส
	// {
	// 	 $this->load->model($this->config->item('acr_m_folder') . 'Import_model', "im");
	// 	$data = $this->im->select();
	// 	$output = '
	// 	<h3 align="center">Total Data - '.$data->num_rows().'</h3>
	// 	<table class="table table-striped table-bordered">
	// 		<tr>
	// 			<th>Customer Name</th>
	// 			<th>Address</th>
	// 			<th>City</th>
	// 			<th>Postal Code</th>
	// 			<th>Country</th>
	// 		</tr>
	// 	';
	// 	foreach($data->result() as $row)
	// 	{
	// 		$output .= '
	// 		<tr>
	// 			<td>'.$row->CustomerName.'</td>
	// 			<td>'.$row->Address.'</td>
	// 			<td>'.$row->City.'</td>
	// 			<td>'.$row->PostalCode.'</td>
	// 			<td>'.$row->Country.'</td>
	// 		</tr>
	// 		';
	// 	}
	// 	$output .= '</table>';
	// 	echo $output;
	// }

	// function import()//เอาเขาาต้าเบส
	// {

	// 	if(isset($_FILES["file"]["name"]))
	// 	{
	// 		$path = $_FILES["file"]["tmp_name"];
	// 		$object = PHPExcel_IOFactory::load($path);
	// 		foreach($object->getWorksheetIterator() as $worksheet)
	// 		{
	// 			$highestRow = $worksheet->getHighestRow();
	// 			$highestColumn = $worksheet->getHighestColumn();
	// 			for($row=2; $row<=$highestRow; $row++)
	// 			{
	// 				$customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	// 				$address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	// 				$city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	// 				$postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
	// 				$country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
	// 				$data[] = array(
	// 					'CustomerName'		=>	$customer_name,
	// 					'Address'			=>	$address,
	// 					'City'			=>	$city,
	// 					'PostalCode'		=>	$postal_code,
	// 					'Country'			=>	$country
	// 				);
	// 			}
	// 		}
	// 		// $this->load->model('M_evs_pattern_and_year','im');
	// 		//  $this->load->model($this->config->item('acr_m_folder') . 'Import_model', "im");
	// 		// $this->im->insert($data);
	// 		echo json_encode($data);
	// 	}	
	// }


}
?>