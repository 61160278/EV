<?php
/*
* M_evs_pattern_and_year
* set pettern and year management 
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_pattern_and_year
* set pettern and year management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/
include_once("Da_evs_pattern_and_year.php");

/*
* M_evs_pattern_and_year
* set pettern and year management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_pattern_and_year
* set pettern and year management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/

class M_evs_pattern_and_year extends Da_evs_pattern_and_year {

	/*
	* get_by_year
	* Get Year from database
	* @input  -
	* @output pettern and year data
	* @author Tanadon Tangjaimongkhon
	* @Create Date 2563-09-01
	*/
    function get_by_year() {	
		$sql = "SELECT *
				FROM evs_database.evs_pattern_and_year";
		$query = $this->db->query($sql);
		return $query;
	}//get_by_year

	/*
	* get_by_year_now_year
	* Get Year from database
	* @input  -
	* @output get new year
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2563-09-01
	*/
	function get_by_year_now_year() {
		$sql = "SELECT *
				FROM evs_database.evs_pattern_and_year
				ORDER BY pay_id DESC LIMIT 1";
				
		$query = $this->db->query($sql);
		return $query;
				
	}	
	// get_by_year_now_year

	/*
	* get_by_year_now_year
	* Get Year from database
	* @input  -
	* @output get before year
	* @author 	Jakkarin Pimpaeng
	* @Create Date 2564-20-01
	*/
	function get_by_year_before_now_year() {
		$sql = "SELECT * FROM evs_database.evs_pattern_and_year 
				ORDER BY pay_id DESC 
				LIMIT 1,1";
				
		$query = $this->db->query($sql);
		return $query;
				
	}	
	// get_by_year_now_year

	function get_all_year() {
		$sql = "SELECT * FROM evs_database.evs_pattern_and_year 
				ORDER BY pay_id ASC";
		$query = $this->db->query($sql);
		return $query;
				
	}	
	// get_by_year_now_year



} 
?>