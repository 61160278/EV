<?php
/*
* M_evs_department
* Set department Management
* @author Piyasak Srijan
* @Create Date 2564-04-22
*/ 

?>
<?php
include_once("Da_evs_department.php");

/*
* M_evs_company
* set Company management
* @author Piyasak Srijan
* @Create Date 2564-04-20
*/

class M_evs_department extends Da_evs_department {


	/*
	* get_all
	* Get All department Level from database
	* @input  -
	* @output company all
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/
	function get_all(){	
		$sql = "SELECT * 
				FROM dbmc.department" ;
		$query = $this->db->query($sql);
		return $query;
	}//get_all
}	
?>
