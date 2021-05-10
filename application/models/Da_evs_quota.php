<?php
/*
* Da_evs_quota
* Position Management
* @author Piyasak Srijan
* @Create Date 2564-05-10
*/ 
/*
* Da_evs_quota
* Position Management
* @author Piyasak Srijan
* @update Date 2564-05-10
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_quota
* Position Management
* @author Piyasak Srijan
* @Create Date 2564-05-10
*/ 

class Da_evs_quota extends evs_model {		
	
	public $qut_id; //Quota ID	
	public $qut_type; //Quota type	
	public $qut_pos; //Position of quota
	


	function __construct() {
		parent::__construct();
	}
	/*
	* insert
	* Insert Quota into database
	* @input qut_id, qut_type,qut_pos
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-10
	*/
	function insert() {
	 	$sql = "INSERT INTO evs_database.evs_quota (evs_quota.qut_id, evs_quota.qut_type, evs_quota.qut_pos)
	 			VALUES(?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->qut_id, $this->qut_type, $this->qut_pos));
	
	 }

	/*
	* update
	* update Quota into database
	* @input qut_id, qut_type,qut_pos
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-10
	*/
	function update() {
	 	
	 	$sql = "UPDATE evs_database.evs_quota 
	 			SET	evs_quota.qut_id=?, evs_quota.qut_type=? , evs_quota.qut_pos=?
	 			WHERE evs_quota.qut_id=?";
		
	 	$this->db->query($sql, array($this->qut_id, $this->qut_type, $this->qut_pos));
		
	 }
	/*
	* update
	* update Quota into database
	* @input qut_id
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-10
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_quota
	 			WHERE evs_quota.qut_id=?";
	 	$this->db->query($sql, array($this->qut_id));
		
	 }

	/*
	* get_by_key
	* get_by_key Quota into database
	* @input qut_id
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-10
	*/
	function get_by_key($withSetAttributeValue=FALSE) {	
		$sql = "SELECT * 
				FROM evs_database.evs_quota
				WHERE evs_quota.qut_id=?";
		$query = $this->db->query($sql, array($this->qut_id));
		return $query;
	}

	
}	 