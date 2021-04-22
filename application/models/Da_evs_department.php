<?php
/*
* Da_evs_department
* department Management
* @author Piyasak Srijan
* @Create Date 2564-04-20
*/ 

?>
<?php
include_once("evs_model.php");

/*
* Da_evs_department
* department Management
* @author Piyasak Srijan
* @Create Date 2564-04-20
*/ 
 
class Da_evs_department extends evs_model {		
	
	public $Dep_id; //Department ID	
	public $Dep_Name; //Department Name		
	public $Dep_shortName; //Department shortname

	function __construct() {
		parent::__construct();
	}
	/*
	* insert
	* Insert department into database
	* @input Dep_id, Dep_Name,Dep_shortName
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	
	function insert() {
	 	$sql = "INSERT INTO dbmc.department (department.Dep_id, department.Dep_Name, department.Dep_shortName)
	 			VALUES(?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->Dep_id, $this->Dep_Name, $this->Dep_shortName));
	 }

	/*
	* update
	* update department into database
	* @input Dep_id, Dep_Name,Dep_shortName
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/

	function update() {
	 	
	 	$sql = "UPDATE dbmc.department 
	 			SET	department.Dep_id=?, department.Dep_Name=? , department.Dep_shortName=?
	 			WHERE department.Dep_shortName=?";
		
	 	$this->db->query($sql, array($this->Dep_id, $this->Dep_Name, $this->Dep_shortName));	
	 }
	/*
	* delete
	* delete Company into database
	* @input Dep_id, Dep_Name,Dep_shortName
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM dbmc.department
	 			WHERE department.Dep_id=?";
	 	$this->db->query($sql, array($this->Dep_id));
		
	 }

	/*
	* get_by_key
	* get_by_key department into database
	* @input Dep_id, Dep_Name,Dep_shortName
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/
	
	function get_by_key() {	
		$sql = "SELECT * 
				FROM dbmc.department
				WHERE department.Dep_id=?";
		$query = $this->db->query($sql, array($this->Dep_id));
		return $query;
	}

	
}	 