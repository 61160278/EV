<?php
/*
* M_evs_grad_master
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/ 
/*
* M_evs_grad_master
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/ 
?>
<?php
include_once("Da_evs_grad_master.php");

/*
* M_evs_grad_master
* set data_mbo_weight management
* @author 	Jakkarin Pimpaeng
* @Create Date 2563-09-01
*/
/*
* M_evs_grad_master
* set data_mbo_weight management
* @author Tanadon Tangjaimongkhon
* @Update Date 2563-10-4
*/  
class M_evs_grad_master extends Da_evs_grad_master {

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
				FROM evs_database.evs_grad_master";
        $query = $this->db->query($sql);
		return $query;
	}
	//get_all

	


} 
?>