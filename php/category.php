<?
include("db_connect.php");

class Category 
{
	public $id = 0;
	public $name_ge = "";
	public $name_en = "";
	
	function setCatId( $id )
	{
		$this->id = $id;
		$this->name_ge = ""; 
		$this->name_en = ""; 
	}
	
	function loadCatData()
	{
		$q 	 = mysql_query("SELECT * FROM category WHERE id=".$this->id) or die(mysql_error());
		$res = mysql_fetch_array( $q );
		
		if(!empty( $res ))
		{
			$this->name_ge = $res["name_ge"]; 
		}
	}
	
	function getCatNameGe()
	{
		return $this->name_ge;
	}
}


?>