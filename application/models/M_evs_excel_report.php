<?php
/*
* M_evs_excel_report
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_excel_report
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_excel_report.php");

/*
* M_evs_excel_report
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_excel_report
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_excel_report extends Da_evs_excel_report {

	/*
	* get_all
	* get data to database
	* @input -
	* @output data data_mbo_weight
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
    function get_all() {	
		$sql = "SELECT * 
				FROM evs_database.evs_excel_report";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_all

	


} 
?>