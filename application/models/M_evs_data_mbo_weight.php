<?php
/*
* M_evs_data_mbo_weight
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_data_mbo_weight
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_data_mbo_weight.php");

/*
* M_evs_data_mbo_weight
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_data_mbo_weight
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_data_mbo_weight extends Da_evs_data_mbo_weight {

	/*
	* get_data_mbo_weight_all
	* get data to database
	* @input -
	* @output data data_mbo_weight
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_data_mbo_weight_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mbo_weight";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_data_mbo_weight_all

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
		FROM evs_database.evs_data_mbo_weight
		WHERE dmw_evs_emp_id = ?
		ORDER BY `evs_data_mbo_weight`.`dmw_id` ASC";
		$query = $this->db->query($sql, array($this->dmw_evs_emp_id));
		return $query;
	
	}//get_by_empID

	
	function get_by_emp_app(){	
		$sql = "SELECT dmw_approver,log_role
				FROM evs_database.evs_data_mbo_weight as mbo
				INNER JOIN evs_database.evs_login as evslog
				ON evslog.log_user_id = mbo.dmw_approver
				WHERE mbo.dmw_evs_emp_id = ?
				GROUP BY mbo.dmw_approver
				ORDER BY mbo.dmw_id ASC";
		$query = $this->db->query($sql, array($this->dmw_evs_emp_id));
		return $query;
	
	}//get_by_emp_app 				

	function get_by_empID_app2(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_mbo_weight AS mbo
		INNER JOIN evs_database.evs_data_approve  AS app
		ON app.dma_emp_id = mbo.dmw_evs_emp_id
		WHERE mbo.dmw_evs_emp_id = ? AND mbo.dmw_approver = ?
		ORDER BY mbo.dmw_id ASC";
		$query = $this->db->query($sql, array($this->dmw_evs_emp_id,$this->dmw_approver));
		return $query;
	
	}//get_by_empID

	function get_by_empID_app(){	
		$sql = "SELECT *
		FROM evs_database.evs_data_mbo_weight AS mbo
		WHERE mbo.dmw_evs_emp_id = ? AND mbo.dmw_approver = ?
		ORDER BY mbo.dmw_id ASC";
		$query = $this->db->query($sql, array($this->dmw_evs_emp_id,$this->dmw_approver));
		return $query;
	
	}//get_by_empID
	/*
	* update
	* Update Category into database
	* @input dmw_id, dmw_data_mbo_weight_name
	* @output -
	* @author jakkarin pimpaeng
	* @update Date 2563-10-26
	*/
	function update() {
	
		$sql = "UPDATE evs_database.evs_data_mbo_weight 
				SET	 dmw_weight=?
				WHERE dmw_evs_emp_id=? AND dmw_dtm_id=? ";
	   
	   $this->db->query($sql, array( $this->dmw_weight, $this->dmw_evs_emp_id, $this->dmw_dtm_id));
		
	}

} 
?>