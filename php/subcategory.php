<?
include("db_connect.php");

class Subcategory 
{ 
	public $catId = 0;
	public $subcatId = 0;
	public $name_ge = "";
	public $name_en = "";
	
	function setIds( $catId, $subcatId)
	{
		$this->catId 	= $catId;
		$this->subcatId = $subcatId;
		$this->name_ge  = ""; 
		$this->name_en  = ""; 
	}
	
	function loadSubcatData()
	{
		$q 	 = mysql_query("SELECT * FROM subcategory WHERE category_id=".$this->catId." AND id=".$this->subcatId) or die( mysql_error() );
		$res = mysql_fetch_array( $q );
		
		if(!empty( $res ))
		{
			$this->name_ge = $res["name_ge"]; 
		}
	}
	
	function getSubcatNameGe()
	{
		return $this->name_ge;
	}
}

?>