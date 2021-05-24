<?php
/*
* M_evs_data_acm
* set data_acm management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_data_acm
* set data_acm management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_data_acm.php");

/*
* M_evs_data_acm
* set data_acm management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_data_acm
* set data_acm management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_data_acm extends Da_evs_data_acm {

	/*
	* get_data_acm_all
	* get data to database
	* @input -
	* @output data data_acm
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_data_acm_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_acm";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_data_acm_all

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
		FROM evs_database.evs_data_acm
		WHERE dta_evs_emp_id = ?
		ORDER BY `evs_data_acm`.`dta_sfa_id` ASC";
		$query = $this->db->query($sql, array($this->dta_evs_emp_id));
		return $query;
	
	}//get_all_com
	/*
	* update
	* Update Category into database
	* @input dta_id, dta_data_acm_name
	* @output -
	* @author jakkarin pimpaeng
	* @update Date 2563-10-26
	*/
	function update() {
	
		$sql = "UPDATE evs_database.evs_data_acm 
				SET	 dta_weight=?
				WHERE dta_evs_emp_id=? AND dta_sfa_id=? ";
	   
	   $this->db->query($sql, array( $this->dta_weight, $this->dta_evs_emp_id, $this->dta_sfa_id));
		
	}

} 
?>