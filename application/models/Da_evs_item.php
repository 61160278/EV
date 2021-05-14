<?php
/*
* Da_evs_item
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_item
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_item
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_item
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_item extends evs_model {		
	
	public $itm_id; //Number sequence	
	public $itm_item_detail_en; //Category detail english	
	public $itm_item_detail_th; //Category detail thai	

	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input itm_item_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category into database
	* @input itm_item_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_item (itm_item_detail_en, itm_item_detail_th)
	 			VALUES(?, ?)";
		 
	 	$this->db->query($sql, array($this->itm_item_detail_en, $this->itm_item_detail_th));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input itm_id, itm_item_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Category into database
	* @input itm_id, itm_item_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_item 
	 			SET	itm_item_detail_en=?, itm_item_detail_th=?
	 			WHERE itm_id=?";
		
		$this->db->query($sql, array($this->itm_item_detail_en, $this->itm_item_detail_th, $this->itm_id));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input itm_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category from database
	* @input itm_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_item
	 			WHERE itm_id=?";
	 	$this->db->query($sql, array($this->itm_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input itm_id
	* @output itm_id, itm_item_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category from database
	* @input itm_id
	* @output itm_id, itm_item_name
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_item
				WHERE itm_id=?";
		$query = $this->db->query($sql, array($this->itm_id));
		return $query;
	}

	
}	 
?>