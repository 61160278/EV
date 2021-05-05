<?php
/*
* Da_evs_group
* C
* @author Jakkarin Pimpaeng
* @Create Date 2564-04-8
*/ 


include_once("evs_model.php");

/*
* Da_evs_group
* 
* @author Jakkarin Pimpaeng
* @Create Date 2564-04-8
*/ 
 
class Da_evs_group extends evs_model {		
	
	public $gru_id; //
	public $gru_name; //
	public $gru_head_dept; //

	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-8
	*/
	
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_group (gru_id, gru_name, gru_head_dept, gru_company_id)
	 	VALUES(?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->gru_id, $this->gru_name, $this->gru_head_dept, $this->gru_company_id));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-8
	*/

	function update() {
	
		$sql = "UPDATE evs_database.evs_group 
				SET	gru_name = ?, gru_head_dept = ? 
				WHERE gru_id = ?" ;
	     
	     $this->db->query($sql, array($this->gru_name ,$this->gru_head_dept, $this->gru_id ));
		
	}                       

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Tippawan Aiemsaad
	* @Create Date 2564-04-8
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_group 
		WHERE  gru_id = ? ";
	 	$this->db->query($sql, array($this->gru_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2564-04-8
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_group
				WHERE gru_id=?";
		$query = $this->db->query($sql, array($this->gru_id));
		return $query;
	}

}		 
?>