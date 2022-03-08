<?php
/*
* Da_evs_work_attendance
* -
* @author Jakkarin Pimpaeng
* @Create Date 2563-03-07
*/ 

include_once("evs_model.php");

/*
* Da_evs_work_attendance
* -
* @author Jakkarin Pimpaeng
* @Create Date 2565-03-07
*/

class Da_evs_work_attendance extends evs_model {		
	
	public $wad_id;
	public $wad_emp_id;		
	public $wad_late_return;		
	public $wad_absent;
	public $wad_sick;
	public $wad_business;	
	public $wad_suspension;	
	public $wad_edu_Inter;	
	public $wad_first_aid;
	public $wad_maternity;	
	public $wad_military;	
	public $wad_attendance;	
	public $wad_special_pregnant;		
	public $wad_special_leave;
	
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
	 
	 	$sql = "INSERT INTO evs_database.evs_work_attendance (wad_emp_id,wad_late_return,wad_absent,
		 					wad_sick,wad_business,wad_suspension,wad_edu_Inter,wad_first_aid,wad_maternity,wad_military,
							 wad_attendance,wad_special_pregnant,wad_special_leave)
	 			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->wad_emp_id, $this->wad_late_return,$this->wad_absent,$this->wad_sick,$this->wad_business,
		 							 $this->wad_suspension,$this->wad_edu_Inter,$this->wad_first_aid,$this->wad_maternity,$this->wad_military,
									 $this->wad_attendance,$this->wad_special_pregnant,$this->wad_special_leave));
	
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
	
	 	$sql = "UPDATE evs_database.evs_evs_work_attendance
	 			SET	wad_emp_id = ?, wad_late_return = ?,  wad_absent = ?,
					wad_sick = ?,wad_business = ?, wad_suspension = ?, wad_edu_Inter = ?, wad_first_aid = ?, wad_maternity = ?,
					wad_military = ?, wad_attendance = ?, wad_special_pregnant = ?, wad_special_leave = ?
	 			WHERE wad_id =?";
		
		$this->db->query($sql, array($this->wad_emp_id, $this->wad_late_return, $this->wad_absent ,$this->wad_sick, 
									$this->wad_business ,$this->wad_suspension,$this->wad_edu_Inter,$this->wad_first_aid,
									$this->wad_maternity ,$this->wad_military,$this->wad_attendance,$this->wad_special_pregnant,
									$this->wad_special_leave));
		 
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
	 	
	 	$sql = "DELETE FROM evs_database.evs_evs_work_attendance
	 			WHERE wad_id=?";
	 	$this->db->query($sql, array($this->wad_id));
		
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
				FROM evs_database.evs_work_attendance
				WHERE wad_id=?";
		$query = $this->db->query($sql, array($this->wad_id));
		return $query;
	}

	
}	 
?>