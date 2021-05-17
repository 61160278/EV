<?php
/*
* Da_evs_set_form_mhrd
* Category Weight of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_set_form_mhrd
* Category Weight of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/  
/*
* Da_evs_set_form_mhrd
* Category Weight of Position Management
* @author Jakkarin pimpaeng
* @update Date 2563-12-08
*/  
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_set_form_mhrd
* Category Weight of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_set_form_mhrd
* Category Weight of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
/*
* Da_evs_set_form_mhrd
* Category Weight of Position Management
* @author Jakkarin pimpaeng
* @update Date 2563-12-08
*/
class Da_evs_set_form_mhrd extends evs_model {		
	public $sfi_id; // category weight ID
	public $sfi_excel_import; // weight of category
	public $sfi_pay_id; // year
	public $sfi_pos_id; // Position ID
	public $sfi_itm_id; // category ID
	
	function __construct() {
		parent::__construct();
		
	}
	/*
	* insert
	* Insert Category Weight into database
	* @input  sfi_excel_import, sfi_pos_id, sfi_itm_id, sfi_pay_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category Weight into database
	* @input  sfi_excel_import, sfi_pos_id, sfi_itm_id, sfi_pay_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function insert() {
	 	 
	 	$sql = "INSERT INTO evs_database.evs_set_form_mhrd (sfi_excel_import, sfi_pos_id, sfi_itm_id, sfi_pay_id)
	 			VALUES(?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->sfi_excel_import, $this->sfi_pos_id, $this->sfi_itm_id, $this->sfi_pay_id));
	
	 }

	/*
	* update
	* update Category Weight into database
	* @input  sfi_excel_import, sfi_pos_id, sfi_itm_id, sfi_id, sfi_pay_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* update Category Weight into database
	* @input  sfi_excel_import, sfi_pos_id, sfi_itm_id, sfi_id, sfi_pay_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function update() {
	 	
	 	$sql = "UPDATE evs_database.evs_set_form_mhrd 
	 			SET	sfi_excel_import=?, sfi_pos_id=?, sfi_itm_id=?, sfi_pay_id=?
	 			WHERE sfi_id=?";
		
		$this->db->query($sql, array($this->sfi_excel_import, $this->sfi_pos_id, $this->sfi_itm_id,$this->sfi_id, $this->sfi_pay_id));
		
	 }

	/*
	* delete
	* Delete Category Weight from database
	* @input sfi_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category Weight from database
	* @input sfi_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function delete() {
	 
	 	$sql = "DELETE FROM evs_database.evs_set_form_mhrd
	 			WHERE sfi_pos_id=?";
	 	$this->db->query($sql, array($this->sfi_pos_id));
		
	 }
	 
	/*
	* get_by_key
	* Get Category Weight from database
	* @input sfi_id
	* @output sfi_id, sfi_excel_import, sfi_pay_id, sfi_pos_id, sfi_itm_id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category Weight from database
	* @input sfi_id
	* @output sfi_id, sfi_excel_import, sfi_pay_id, sfi_pos_id, sfi_itm_id
	* @author Jakkarin Pimpaeng
	* @update Date 2563-12-08
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_set_form_mhrd
				WHERE sfi_pos_id = ? AND sfi_pay_id = ?";
		$query = $this->db->query($sql, array($this->sfi_pos_id ,$this->sfi_pay_id));
		return $query;
	}

	
}	