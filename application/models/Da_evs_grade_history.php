<?php
/*
* Da_evs_category
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 

?>
<?php
include_once("evs_model.php");

/*
* Da_evs_category
* Category of Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/

class Da_evs_grad_history extends evs_model {		
	
	public $ghr_id; 
	public $ghr_emp_id; 
	public $ghr_grade;
	public $ghr_pay_id; 	

	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert Category into database
	* @input ctg_category_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/

	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_grade_history (ghr_grade, dhr_pay_id,ghr_emp_id)
	 			VALUES(?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->ghr_grade, $this->dhr_pay_id,$this->ghr_emp_id));
	
	 }
	 
	/*
	* update
	* Update Category into database
	* @input ctg_id, ctg_category_name
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	
	
	function update() {
	
	 	$sql = "UPDATE evs_database.evs_grade_history 
	 			SET	ghr_grade=?, dhr_pay_id=?,ghr_emp_id=?
	 			WHERE ghr_id=?";
		
		$this->db->query($sql, array($this->ghr_grade, $this->dhr_pay_id, $this->ghr_emp_id,$this->ghr_id));
		 
	 }

	/*
	* delete
	* Delete Category from database
	* @input ctg_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	
	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_grade_history
	 			WHERE ghr_id=?";
	 	$this->db->query($sql, array($this->ghr_id));
		
	 }

	/*
	* get_by_key
	* Get Category from database
	* @input ctg_id
	* @output ctg_id, ctg_category_name
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_grade_history
				WHERE ghr_id=?";
		$query = $this->db->query($sql, array($this->ghr_id));
		return $query;
	}

	
}	 
?>