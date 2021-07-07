<?php
/*
* M_evs_data_mhrd_weight
* set data_mhrd_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_data_mhrd_weight
* set data_mhrd_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_data_mhrd_weight.php");

/*
* M_evs_data_mhrd_weight
* set data_mhrd_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_data_mhrd_weight
* set data_mhrd_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_data_mhrd_weight extends Da_evs_data_mhrd_weight {

	/*
	* get_data_mhrd_weight_all
	* get data to database
	* @input -
	* @output data data_mhrd_weight
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_data_mhrd_weight_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mhrd_weight";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_data_mhrd_weight_all

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
		FROM evs_database.evs_data_mhrd_weight
		WHERE mhw_evs_emp_id = ?
		ORDER BY `evs_data_mhrd_weight`.`mhw_id` ASC";
		$query = $this->db->query($sql, array($this->mhw_evs_emp_id));
		return $query;
	
	}//get_all_com
	/*
	* update
	* Update Category into database
	* @input mhw_id, mhw_data_mhrd_weight_name
	* @output -
	* @author jakkarin pimpaeng
	* @update Date 2563-10-26
	*/
	function update() {
	
		$sql = "UPDATE evs_database.evs_data_mhrd_weight 
				SET	 mhw_weight_1=?,mhw_weight_2=?
				WHERE mhw_evs_emp_id=? AND mhw_sfi_id=? ";
	   
	   $this->db->query($sql, array( $this->mhw_weight_1,$this->mhw_weight_2, $this->mhw_evs_emp_id, $this->mhw_sfi_id));
		
	}

	/*
	* get_all
	* Get All Group from database
	* @input  -
	* @output Group all
	* @author jakkarin pimpaeng
	* @Create Date 2564-07-07
	*/
	function get_data_by_pay_id(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_mhrd_weight
		INNER JOIN evs_database.evs_employee 
		ON emp_employee_id = mhw_evs_emp_id
		WHERE emp_pay_id = ?
		ORDER BY `evs_data_mhrd_weight`.`mhw_id` ASC";
		$query = $this->db->query($sql, array($this->emp_pay_id));
		return $query;
	
	}//get_all_com

} 
?>