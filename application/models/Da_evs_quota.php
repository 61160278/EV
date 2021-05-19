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
* @update Date 2564-05-12
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
	public $qut_date; //Position of quota
	public $qut_grad_S; //Grade of quota
	public $qut_grad_A; //Grade of quota
	public $qut_grad_B; //Grade of quota
	public $qut_grad_B_N; //Grade of quota
	public $qut_grad_C; //Grade of quota
	public $qut_grad_D; //Grade of quota
	public $qut_total; //Grade of quota
	
	


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

	/*
	* insert
	* Insert Quota into database
	* @input qut_id, qut_type,qut_pos,qut_grad_S,qut_grad_A,qut_grad_B,qut_grad_B_N,qut_grad_C,qut_grad_D
	* @output -
	* @author Piyasak Srijan
	* @Update Date 2564-05-12
	*/
	function insert() {
	 	$sql = "INSERT INTO evs_database.evs_quota (evs_quota.qut_id, evs_quota.qut_type, evs_quota.qut_pos, evs_quota.qut_date,
		 		evs_quota.qut_grad_S, evs_quota.qut_grad_A, evs_quota.qut_grad_B, evs_quota.qut_grad_B_N, evs_quota.qut_grad_C,
				evs_quota.qut_grad_D,evs_quota.qut_total,evs_quota.qut_pay_id)
		 		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->qut_id, $this->qut_type, $this->qut_pos, $this->qut_date, $this->qut_grad_S,
						$this->qut_grad_A, $this->qut_grad_B, $this->qut_grad_B_N, $this->qut_grad_C, $this->qut_grad_D, $this->qut_total, $this->qut_pay_id));
	
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
		 SET  evs_quota.qut_date= ?,evs_quota.qut_grad_S= ?, evs_quota.qut_grad_A= ?, evs_quota.qut_grad_B= ?, evs_quota.qut_grad_B_N= ?, evs_quota.qut_grad_C= ?, 
		 evs_quota.qut_grad_D= ?, evs_quota.qut_total= ?
		 WHERE evs_quota.qut_id= ?";
	 	$this->db->query($sql, array($this->qut_date, $this->qut_grad_S, $this->qut_grad_A, $this->qut_grad_B, $this->qut_grad_B_N,$this->qut_grad_C, $this->qut_grad_D, $this->qut_total,$this->qut_id));
		  
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
	 			WHERE evs_quota.qut_id= ?";
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