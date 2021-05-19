<?php
/*
* Da_evs_data_mbo
* 
* @author Kunanya Singmee
* @Create Date 2564-04-19
*/ 


include_once("evs_model.php");

/*
* Da_evs_data_mbo
* 
* @author Kunanya Singmee
* @Create Date 2564-04-19
*/ 
 
class Da_evs_data_mbo extends evs_model {		
	
	public $dtm_id ; //
	public $dtm_mbo ; //
	public $dtm_weight ; //
	public $dtm_emp_id ; //
	public $dtm_year; //

	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-19
	*/
	
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_data_mbo (dtm_mbo,dtm_sdg, dtm_weight,dtm_emp_id,dtm_evs_emp_id)
	 	VALUES(?,?,?,?,?)";
		 
	 	$this->db->query($sql, array($this->dtm_mbo, $this->dtm_sdg, $this->dtm_weight, $this->dtm_emp_id, $this->dtm_evs_emp_id));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-19
	*/

	function update() {
	
	 	$sql = "UPDATE evs_database.evs_data_mbo 
	 			SET dtm_sdg=?, dtm_mbo=?, dtm_weight=?, dtm_emp_id=? , dtm_evs_emp_id=?
	 			WHERE dtm_id=?";
		
		$this->db->query($sql, array($this->dtm_sdg, $this->dtm_mbo, $this->dtm_weight, $this->dtm_emp_id, $this->dtm_evs_emp_id, $this->dtm_id));
		 
	 }

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-19
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_data_mbo 
		WHERE  dtm_id = ? ";
	 	$this->db->query($sql, array($this->dtm_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-04-19
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_data_mbo
				WHERE dtm_emp_id=? AND dtm_year=?";
		$query = $this->db->query($sql, array($this->dtm_emp_id), array($this->dtm_year));
		return $query;
	}

}		 
?>