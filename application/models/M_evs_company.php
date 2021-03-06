<?php
/*
* M_evs_company
* Set Company Management
* @author Piyasak Srijan
* @Create Date 2564-04-20
*/ 

?>
<?php
include_once("Da_evs_company.php");

/*
* M_evs_company
* set Company management
* @author Piyasak Srijan
* @Create Date 2564-04-20
*/

class M_evs_company extends Da_evs_company {


	/*
	* get_all
	* Get All Company Level from database
	* @input  -
	* @output company all
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM dbmc.company" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_all


/*
	* get_all
	* Get All Company Level from database
	* @input  -
	* @output company all
	* @author jakkarin pimpaeng
	* @Create Date 2564-04-20
	*/
	function get_company(){	
		$sql = "SELECT * 
		FROM `master_mapping` 
		WHERE Company_id != ''
		Group BY Company  
		ORDER BY `master_mapping`.`Company_id` ASC" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_all


}
?>
