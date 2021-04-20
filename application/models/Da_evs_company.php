<?php
/*
* Da_evs_company
* Company Management
* @author Piyasak Srijan
* @Create Date 2564-04-20
*/ 

?>
<?php
include_once("evs_model.php");

/*
* Da_evs_company
* Company Management
* @author Piyasak Srijan
* @Create Date 2564-04-20
*/ 
 
class Da_evs_company extends evs_model {		
	
	public $Company_ID; //Company ID	
	public $Company_name; //Company Name	
	public $Company_name_th; //Company Name Thai	
	public $Company_shortname; //Company shortname

	function __construct() {
		parent::__construct();
	}
	/*
	* insert
	* Insert Company into database
	* @input Company_ID, Company_name,Company_name_th,Company_shortname
	* @output -
	* @author Jakkarin Pimpaeng
	* @Create Date 2563-09-28
	*/
	
	function insert() {
	 	$sql = "INSERT INTO dbmc.company (company.Company_ID, company.Company_name, company.Company_name_th, company.Company_shortname)
	 			VALUES(?, ?, ?, ?)";
		 
	 	$this->db->query($sql, array($this->Company_ID, $this->Company_name, $this->Company_name_th,  $this->Company_shortname));
	 }

	/*
	* update
	* update Company into database
	* @input Company_ID, Company_name,Company_name_th,Company_shortname
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/

	function update() {
	 	
	 	$sql = "UPDATE dbmc.company 
	 			SET	company.Company_ID=?, company.Company_name=? , company.Company_name_th=?
	 			WHERE company.Company_shortname=?";
		
	 	$this->db->query($sql, array($this->Company_ID, $this->Company_name, $this->Company_name_th, $this->Company_shortname));
		
	 }
	/*
	* delete
	* delete Company into database
	* @input Company_ID,Company_name,Company_name_th,Company_shortname
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/
	function delete() {
	 	
	 	$sql = "DELETE FROM dbmc.company
	 			WHERE company.Company_ID=?";
	 	$this->db->query($sql, array($this->Company_ID));
		
	 }

	/*
	* get_by_key
	* get_by_key Company into database
	* @input Company_ID,Company_name,Company_name_th,Company_shortname
	* @output -
	* @author Piyasak Srijan
	* @Create Date 2564-04-20
	*/
	
	function get_by_key() {	
		$sql = "SELECT * 
				FROM dbmc.company
				WHERE company.Company_ID=?";
		$query = $this->db->query($sql, array($this->Company_ID));
		return $query;
	}

	
}	 