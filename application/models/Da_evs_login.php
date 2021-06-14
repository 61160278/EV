<?php
/*
* Da_evs_login
* login to system
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-10-26
*/
/*
* Da_evs_login
* login to system
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/ 

include_once("evs_model.php");

/*
* Da_evs_login
* login to system
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-10-26
*/
/*
* Da_evs_login
* login to system
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-04
*/
class Da_evs_login extends evs_model {		
	
	public $log_id; //Number Sequence	
    public $log_user_id; //user id for login	
    public $log_password; //passeord for login	
	public $log_role; //
	public $log_time;	

	function __construct() {
		parent::__construct();
		

	}
	/*
	* insert
	* Insert username and password
	* @input username, password
	* @output -
    * @author Tanadon Tangjaimongkhon
    * @Create Date 2563-10-26
	*/
	function insert() {
	 	$sql = "INSERT INTO evs_database.evs_login (log_user_id, log_password, log_role)
	 			VALUES(?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->log_user_id, $this->log_password, $this->log_role));
	
	 }

	/*
	* update
	* update username and password
	* @input username, password
	* @output -
    * @author Tanadon Tangjaimongkhon
    * @Create Date 2563-10-26
	*/
	function update() {
	 	$sql = "UPDATE evs_database.evs_login 
	 			SET	log_user_id=?, log_password=?, log_role=?
	 			WHERE log_id=?";
		
	 	$this->db->query($sql, array($this->log_user_id, $this->log_password, $this->log_role, $this->log_id));
		
	 }

	/*
	* delete
	* Delete username and password
	* @input username, password
	* @output -
    * @author Tanadon Tangjaimongkhon
    * @Create Date 2563-10-26
	*/
	function delete() {
	 	$sql = "DELETE FROM evs_database.evs_login
	 			WHERE log_id=?";
	 	$this->db->query($sql, array($this->log_id));
		
	 }
	 
	/*
	* get_by_key
	* Get username and password
	* @input log_id
	* @output log_id, log_user_id, log_password, log_per_id
    * @author Tanadon Tangjaimongkhon
    * @Create Date 2563-10-26
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_login
				WHERE log_id=?";
		$this->db->query($sql, array($this->log_id));
		return $query;
	}

	
}	