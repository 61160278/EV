<?php
/*
* Da_evs_reasoning_master
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_reasoning_master
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_reasoning_master
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_reasoning_master
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_reasoning_master extends evs_model {		
	
	public $rms_id; 
	public $rms_name; 
	


	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input dmw_data_mbo_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Category into database
	* @input dmw_data_mbo_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_reasoning_master (rms_name)
	 			VALUES(?)";
		 
	 	$this->db->query($sql, array($this->rms_name));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input dmw_id, dmw_data_mbo_weight_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Category into database
	* @input dmw_id, dmw_data_mbo_weight_name
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_reasoning_master 
	 			SET	rms_name=?
	 			WHERE rms_id=?";
		
		$this->db->query($sql, array($this->rms_name));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input dmw_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* delete
	* Delete Category from database
	* @input dmw_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_reasoning_master
	 			WHERE rms_id=?";
	 	$this->db->query($sql, array($this->rms_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input dmw_id
	* @output dmw_id, dmw_data_mbo_weight_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Category from database
	* @input dmw_id
	* @output dmw_id, dmw_data_mbo_weight_name
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_reasoning_master
				WHERE rms_id=?";
		$query = $this->db->query($sql, array($this->rms_id));
		return $query;
	}

	
}	 
?>