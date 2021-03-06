<?php
/*
* M_evs_data_grade
* set data_grade management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_data_grade
* set data_grade management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_data_comment.php");

/*
* M_evs_data_comment
* @author Kunanya singmee
* @update Date 2564-8-19
*/

class M_evs_data_comment extends Da_evs_data_comment {

	/*
	* get_all
	* @input -
	* @output data 
* @author Kunanya singmee
* @update Date 2564-8-19
	*/
    function get_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_comment";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_all

	function get_by_emp() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_comment as dcm
				INNER JOIN dbmc.employee as emp
				ON emp.Emp_ID = dcm.dcm_aprprover
				WHERE dcm.dcm_emp_id = ?";
        $query = $this->db->query($sql,array($this->dcm_emp_id));
		return $query;
	}
	//get_all



} 
?>