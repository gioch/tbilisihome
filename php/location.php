<?
include("db_connect.php");

class Location 
{
	public $id = 0;
	public $name_ge = "";
	public $name_en = "";
	
	function setLocationId( $id )
	{
		$this->id = $id;
		$this->name_ge = ""; 
		$this->name_en = ""; 
	}
	
	function loadLocationData()
	{
		$q 	 = mysql_query("SELECT * FROM location WHERE id=".$this->id) or die(mysql_error());
		$res = mysql_fetch_array( $q );
		
		if(!empty( $res ))
		{
			$this->name_ge = $res["name_ge"]; 
		}
	}
	
	function getLocationNameGe()
	{
		return $this->name_ge;
	}
}


?>