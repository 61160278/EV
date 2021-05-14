<?php
/*
* Da_evs_description
* Identification of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_description
* Identification of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");
/*
* Da_evs_description
* Identification of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_description
* Identification of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/
class Da_evs_description extends evs_model {		
	
	public $dep_id; //Number Sequence	
	public $dep_description_detail_en; //description detail english	
	public $dep_description_detail_th; //description detail thai	
	public $dep_pay_id; //Year of evaluate	
	public $dep_pos_id; //Position Sequence	
	public $dep_itm_id; //item Sequence	

	function __construct() {
		parent::__construct();
		

	}
	/*
	* insert
	* Insert Identification into database
	* @input dep_description_detal, dep_pos_id, dep_itm_id, dep_ps_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function insert() {
	 	 
	 	$sql = "INSERT INTO evs_database.evs_description (dep_description_detail_en, dep_description_detail_th, dep_pos_id, dep_itm_id)
	 			VALUES(?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->dep_description_detail_en, $this->dep_description_detail_th, $this->dep_pos_id, $this->dep_itm_id));
	
	 }

	/*
	* update
	* Update Identification into database
	* @input dep_id, dep_description_detal, dep_pos_id, dep_itm_id, dep_ps_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_description 
	 			SET	dep_description_detail_en=?, dep_description_detail_th=?, dep_pos_id=?, dep_itm_id=?  
	 			WHERE dep_id=?";
		
		$this->db->query($sql, array($this->dep_description_detail_en, $this->dep_description_detail_th, $this->dep_pos_id, $this->dep_itm_id, $this->dep_id));
		
	 }
	 
	/*
	* delete
	* Delete Identification from database
	* @input dep_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function delete() {
	 	$sql = "DELETE FROM evs_database.evs_description
	 			WHERE dep_id=?";
	 	$this->db->query($sql, array($this->dep_id));
		
	 }

	 /*
	* get_by_key
	* Get Identification from database
	* @input  dep_id
	* @output dep_id, dep_description_detal, dep_pos_id, dep_itm_id, dep_ps_id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_description
				WHERE dep_id=?";
		$this->db->query($sql, array($this->dep_id));
		return $query;
	}


	
}	