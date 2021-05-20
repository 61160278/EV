<?php
/*
* Da_evs_quota_plan
* Position Management
* @author Piyasak Srijan
* @Create Date 2564-05-12
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

class Da_evs_quota_plan extends evs_model {		
	
	public $qup_id; //Quota ID	
	public $qup_grad_S; //Grade of quota
	public $qup_grad_A; //Grade of quota
	public $qup_grad_B; //Grade of quota
	public $qup_grad_B_N; //Grade of quota
	public $qup_grad_C; //Grade of quota
	public $qup_grad_D; //Grade of quota
	public $qup_total; //Grade of quota
	


	function __construct() {
		parent::__construct();
	}
	/*
	* insert
	* Insert Quota into database
	* @input qup_id,qup_grad_S,qup_grad_A,qup_grad_B,qup_grad_B_N,qup_grad_C,qup_grad_D,qup_total
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-05-10
	*/

	/*
	* insert
	* Insert Quota Plan into database
	* @input qup_id,qup_grad_S,qup_grad_A,qup_grad_B,qup_grad_B_N,qup_grad_C,qup_grad_D,qup_total
	* @output -
	* @author Piyasak Srijan
	* @Update Date 2564-05-12
	*/
	function insert() {
	 	$sql = "INSERT INTO evs_database.evs_quota_plan (evs_quota_plan.qup_id, evs_quota_plan.qup_grad_S, evs_quota_plan.qup_grad_A, 
		 		evs_quota_plan.qup_grad_B, evs_quota_plan.qup_grad_B_N, evs_quota_plan.qup_grad_C, evs_quota_plan.qup_grad_D,
				 evs_quota_plan.qup_total,evs_quota_plan.qup_pay_id,evs_quota_plan.qup_qut_id,evs_quota_plan.qup_Position_ID)
		 		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->qup_id, $this->qup_grad_S, $this->qup_grad_A, $this->qup_grad_B, $this->qup_grad_B_N, $this->qup_grad_C,
		$this->qup_grad_D, $this->qup_total, $this->qup_pay_id, $this->qup_qut_id, $this->qup_Position_ID));
	
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
	 	
	 	$sql = "UPDATE evs_database.evs_quota_plan 
	 			SET evs_quota_plan.qup_grad_S= ?,evs_quota_plan.qup_grad_A= ?,evs_quota_plan.qup_grad_B= ?,evs_quota_plan.qup_grad_B_N= ?,
				 evs_quota_plan.qup_grad_C= ?,evs_quota_plan.qup_grad_D= ?,evs_quota_plan.qup_total= ?
	 			WHERE evs_quota_plan.qup_id=?";
		
	 	$this->db->query($sql, array($this->qup_grad_S, $this->qup_grad_A, $this->qup_grad_B, $this->qup_grad_B_N, $this->qup_grad_C, $this->qup_grad_D, $this->qup_total, $this->qup_id));
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