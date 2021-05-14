<?php
/*
* Da_evs_sdgs
* Da_evs_sdgs
* @author Kunanya Singmee
* @Create Date 2564-05-14
*/ 


include_once("evs_model.php");
 
class Da_evs_sdgs extends evs_model {		
	
	public $sdg_id; //
	public $sdg_name_th; //
	public $sdg_name_en; //

	function __construct() {
		parent::__construct();
	
	}

	/*
	* insert
	* Insert  to database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-14
	*/
	
	function insert() {
	 
	 	$sql = "INSERT INTO evs_database.evs_sdgs (sdg_id,sdg_name_th,sdg_name_en)
	 	VALUES(?, ?, ?)";
	 	$this->db->query($sql, array($this->sdg_id, $this->sdg_name_th, $this->sdg_name_en));
	 }
	 
	/*
	* update
	* Update  into database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-14
	*/

	function update() {
	
		$sql = "UPDATE evs_database.evs_sdgs 
				SET	sdg_name_th = ?, sdg_name_en = ? 
				WHERE sdg_id = ?" ;
	     
	     $this->db->query($sql, array($this->sdg_name_th ,$this->sdg_name_en, $this->sdg_id ));
		
	}                       

	/*
	* delete
	* Delete from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-14
	*/

	function delete() {
	 	
	 	$sql = "DELETE FROM evs_database.evs_sdgs 
		WHERE  sdg_id = ? ";
	 	$this->db->query($sql, array($this->sdg_id));
	 }

	/*
	* get_by_key
	* Get  from database
	* @input 
	* @output -
	* @author Kunanya Singmee
	* @Create Date 2564-05-14
	*/
	function get_by_key() {	
		$sql = "SELECT * 
				FROM evs_database.evs_sdgs
				WHERE sdg_id=?";
		$query = $this->db->query($sql, array($this->sdg_id));
		return $query;
	}

}		 
?>