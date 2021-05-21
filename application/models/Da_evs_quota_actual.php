<?php
/*
* Da_evs_quota_actual
* Position Management
* @author Piyasak Srijan
* @Create Date 2564-05-12
*/ 
 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_quota_actual
* Position Management
* @author Piyasak Srijan
* @Create Date 2564-05-10
*/ 

class Da_evs_quota_actual extends evs_model {		
	
	public $qua_id; //Quota ID	
	public $qua_grad_S; //Grade of quota
	public $qua_grad_A; //Grade of quota
	public $qua_grad_B; //Grade of quota
	public $qua_grad_B_N; //Grade of quota
	public $qua_grad_C; //Grade of quota
	public $qua_grad_D; //Grade of quota
	public $qua_total; //Total of quota
	


	function __construct() {
		parent::__construct();
	}
	/*
	* insert
	* Insert Quota Actual into database
	* @input qua_id,qua_grad_S,qua_grad_A,qua_grad_B,qua_grad_B_N,qua_grad_C,qua_grad_D,qua_total
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-12
	*/

	function insert() {
	 	$sql = "INSERT INTO evs_database.evs_quota_actual (evs_quota_actual.qua_id, evs_quota_actual.qua_grad_S, evs_quota_actual.qua_grad_A, 
		 		evs_quota_actual.qua_grad_B, evs_quota_actual.qua_grad_B_N, evs_quota_actual.qua_grad_C, evs_quota_actual.qua_grad_D, evs_quota_actual.qua_total,evs_quota_actual.qua_pay_id,evs_quota_actual.qua_qut_id,evs_quota_actual.qua_Position_ID,evs_quota_actual.qua_qup_id)
		 		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->qua_id,$this->qua_grad_S,$this->qua_grad_A, $this->qua_grad_B,$this->qua_grad_B_N,$this->qua_grad_C,
		$this->qua_grad_D, $this->qua_total,$this->qua_pay_id, $this->qua_qut_id,$this->qua_Position_ID, $this->qua_qup_id));
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
	 	
	 	$sql = "UPDATE evs_database.evs_quota_actual 
		 SET evs_quota_actual.qua_grad_S= ?,evs_quota_actual.qua_grad_A= ?,evs_quota_actual.qua_grad_B= ?,evs_quota_actual.qua_grad_B_N= ?,
		 evs_quota_actual.qua_grad_C= ?,evs_quota_actual.qua_grad_D= ?,evs_quota_actual.qua_total= ?
		 WHERE evs_quota_actual.qua_id=?";
		
	 	$this->db->query($sql, array($this->qua_grad_S, $this->qua_grad_A, $this->qua_grad_B, $this->qua_grad_B_N, $this->qua_grad_C,
		 $this->qua_grad_D, $this->qua_total,$this->qua_id));
		
	 }
	/*
	* update
	* update Quota into database
	* @input qut_id
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-10
	*/
	// function delete() {
	 	
	//  	$sql = "DELETE FROM evs_database.evs_quota
	//  			WHERE evs_quota.qut_id=?";
	//  	$this->db->query($sql, array($this->qut_id));
		
	//  }

	/*
	* get_by_key
	* get_by_key Quota into database
	* @input qut_id
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-10
	*/
	// function get_by_key($withSetAttributeValue=FALSE) {	
	// 	$sql = "SELECT * 
	// 			FROM evs_database.evs_quota
	// 			WHERE evs_quota.qut_id=?";
	// 	$query = $this->db->query($sql, array($this->qut_id));
	// 	return $query;
	// }

	
}	 