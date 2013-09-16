<?
include("db_connect.php");

class District 
{ 
	public $locationId = 0;
	public $districtId = 0;
	public $name_ge = "";
	public $name_en = "";
	
	function setIds( $locationId, $districtId)
	{
		$this->locationId = $locationId;
		$this->districtId = $districtId;
		$this->name_ge  = ""; 
		$this->name_en  = ""; 
	}
	
	function loadDistrictData()
	{
		$q 	 = mysql_query("SELECT * FROM subcategory WHERE location_id=".$this->locationId." AND id=".$this->districtId) or die( mysql_error() );
		$res = mysql_fetch_array( $q );
		
		if(!empty( $res ))
		{
			$this->name_ge = $res["name_ge"]; 
		}
	}
	
	function getDistrictNameGe()
	{
		return $this->name_ge;
	}
}

?>