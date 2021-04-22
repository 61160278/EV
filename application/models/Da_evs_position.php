<?php
/*
* Da_evs_position
* Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_position
* Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-26
*/ 
?>
<?php
include_once("evs_model.php");

/*
* Da_evs_position
* Position Management
* @author Jakkarin Pimpaeng
* @Create Date 2563-09-28
*/ 
/*
* Da_evs_position
* Position Management
* @author Tanadon Tangjaimongkhon
* @update Date 2563-10-26
*/ 
class Da_evs_position extends evs_model {		
	
	public $Num; //Position Sequence
	public $Position_ID; //Position ID	
	public $Position_name; //Position Name	
	public $Pos_shortName; //Position Name Shotcut	
	public $Position_Level; //Position Level Sequence


	function __construct() {
		parent::__construct();
	}
	/*
	* insert
	* Insert Position into database
	* @input pos_name, pos_name_short,pos_psl_id,pos_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* insert
	* Insert Position into database
	* @input pos_name, pos_name_short,pos_psl_id,pos_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function insert() {
	 	$sql = "INSERT INTO dbmc.position (position.Position_ID, position.Position_name, position.Pos_shortName, position.position_level_id)
	 			VALUES(?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->Position_ID, $this->Position_name, $this->Pos_shortName,  $this->position_level_id));
	
	 }

	/*
	* update
	* Update Position into database
	* @input pos_id,pos_name, pos_name_short,pos_psl_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* update
	* Update Position into database
	* @input pos_id,pos_name, pos_name_short,pos_psl_id
	* @output -
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function update() {
	 	
	 	$sql = "UPDATE dbmc.position 
	 			SET	position.Position_name=?, position.Pos_shortName=? , position.position_level_id=?
	 			WHERE position.Position_ID=?";
		
	 	$this->db->query($sql, array($this->Position_name, $this->Pos_shortName, $this->position_level_id, $this->Position_ID));
		
	 }
	/*
	* delete
	* Delete Position from database
	* @input pos_id
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM dbmc.position
	 			WHERE position.Position_ID=?";
	 	$this->db->query($sql, array($this->Position_ID));
		
	 }

	/*
	* get_by_key
	* Get Position from database
	* @input pos_id
	* @output pos_id,pos_name, pos_name_short,pos_level
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	/*
	* get_by_key
	* Get Position from database
	* @input pos_id
	* @output pos_id,pos_name, pos_name_short,pos_level
	* @author Tanadon Tangjaimongkhon
	* @update Date 2563-10-26
	*/
	function get_by_key($withSetAttributeValue=FALSE) {	
		$sql = "SELECT * 
				FROM dbmc.position
				WHERE position.Position_ID=?";
		$query = $this->db->query($sql, array($this->Position_ID));
		return $query;
	}

	
}	 