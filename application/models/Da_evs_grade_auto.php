<?php
/*
* Da_evs_grade_auto
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_grade_auto
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_grade_auto
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/
/*
* Da_evs_grade_auto
* Category of Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 
class Da_evs_grade_auto extends evs_model {		
	
	public $grd_id; 
	public $grd_emp_id; 
	public $grd_grade; 
	public $grd_status;

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
	 
	 	$sql = "INSERT INTO evs_database.evs_grade_auto (grd_emp_id,grd_grade,grd_status)
	 			VALUES(?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->grd_emp_id, $this->grd_grade,$this->grd_status));
	
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
	
	 	$sql = "UPDATE evs_database.evs_grade_auto 
	 			SET	grd_emp_id=?, grd_grade=? grd_status=?
	 			WHERE grd_id=?";
		
		$this->db->query($sql, array($this->grd_emp_id, $this->grd_grade, $this->grd_id ,$this->grd_status));
		 
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
	 	
	 	$sql = "DELETE FROM evs_database.evs_grade_auto
	 			WHERE grd_id=?";
	 	$this->db->query($sql, array($this->grd_id));
		
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
				FROM evs_database.evs_grade_auto
				WHERE grd_id=?";
		$query = $this->db->query($sql, array($this->grd_id));
		return $query;
	}

	
}	 
?>