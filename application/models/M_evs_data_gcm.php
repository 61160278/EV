<?php
/*
* M_evs_data_gcm
* set data_gcm management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_data_gcm
* set data_gcm management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_data_gcm.php");

/*
* M_evs_data_gcm
* set data_gcm management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_data_gcm
* set data_gcm management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_data_gcm extends Da_evs_data_gcm {

	/*
	* get_data_gcm_all
	* get data to database
	* @input -
	* @output data data_gcm
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_data_gcm_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_gcm";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_data_gcm_all

	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author 	Tippawan Aiemsaad
	* @Create Date 2564-04-08
	*/
	function get_by_empID(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_gcm
		WHERE dtg_evs_emp_id = ?
		ORDER BY `evs_data_gcm`.`dtg_sgc_id` ASC";
		$query = $this->db->query($sql, array($this->dtg_evs_emp_id));
		return $query;
	
	}//get_all_com
	/*
	* update
	* Update Category into database
	* @input dtg_id, dtg_data_gcm_name
	* @output -
	* @author jakkarin pimpaeng
	* @update Date 2563-10-26
	*/
	function update() {
	
		$sql = "UPDATE evs_database.evs_data_gcm 
				SET	 dtg_weight=?
				WHERE dtg_evs_emp_id=? AND dtg_sgc_id=? ";
	   
	   $this->db->query($sql, array( $this->dtg_weight, $this->dtg_evs_emp_id, $this->dtg_sgc_id));
		
	}

} 
?>