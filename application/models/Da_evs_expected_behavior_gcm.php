<?php
/*
* Da_evs_expected_behavior_gcm
* Expected & behavior of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_expected_behavior_gcm
* Expected & behavior of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_expected_behavior_gcm
* Expected & behavior of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_expected_behavior_gcm
* Expected & behavior of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_expected_behavior_gcm extends evs_model {		
	
	public $epg_id; //Number Sequence	
	public $epg_expected_detail_en; //expected behavior detail english	
	public $epg_expected_detail_th; //expected behavior detail thai	
	public $epg_year; //Year of evaluate	
	public $epg_point; 	
	public $epg_pos_id; //Position Sequence	
	public $epg_kcg_id; //key compentency Sequence	


	function __construct() {
		parent::__construct();
	}
	/*
	* insert
	* Insert Expected & behavior into database
	* @input epg_expected_detail, epg_pos_id, epg_kcg_id 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Expected & behavior into database
	* @input epg_expected_detail, epg_pos_id, epg_kcg_id 
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 	 
	 	$sql = "INSERT INTO evs_database.evs_expected_behavior_gcm (epg_expected_detail_en, epg_expected_detail_th, epg_pos_id, epg_kcg_id,epg_point)
	 			VALUES(?, ?, ?, ?, ?)";
	 	$this->db->query($sql, array($this->epg_expected_detail_en, $this->epg_expected_detail_th, $this->epg_pos_id, $this->epg_kcg_id,$this->epg_point));

	 }

	/*
	* update
	* Update Expected & behavior into database
	* @input epg_id, epg_expected_detail, epg_year, epg_pos_id, epg_kcg_id, epg_ps_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Expected & behavior into database
	* @input epg_id, epg_expected_detail, epg_year, epg_pos_id, epg_kcg_id, epg_ps_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	 	
	 	$sql = "UPDATE evs_database.evs_expected_behavior_gcm 
	 			SET	epg_expected_detail_en=?, epg_expected_detail_th=?, epg_pos_id=?, epg_kcg_id=?,epg_point=?
	 			WHERE epg_id=?";
		
		$this->db->query($sql, array($this->epg_expected_detail_en, $this->epg_expected_detail_th, $this->epg_pos_id, $this->epg_kcg_id, $this->epg_point, $this->epg_id));
		
	 }

	/*
	* delete
	* Delete Expected & behavior from database
	* @input epg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_expected_behavior_gcm
	 			WHERE epg_id=?";
	 	$this->db->query($sql, array($this->epg_id));
		
	 }

	/*
	* get_by_key
	* Get Expected & behavior from database
	* @input epg_id
	* @output epg_id, epg_expected_detail, epg_year, epg_pos_id, epg_kcg_id, epg_ps_id
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Expected & behavior from database
	* @input epg_id
	* @output epg_id, epg_expected_detail, epg_year, epg_pos_id, epg_kcg_id, epg_ps_id
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_expected_behavior_gcm
				WHERE epg_id=?";
		$query = $this->db->query($sql, array($this->epg_id));
		return $query;
	}

	
}	 