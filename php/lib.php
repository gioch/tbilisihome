<?
include("db_connect.php");
include("category.php");
include("subcategory.php");
include("location.php");
include("district.php");
include("apartment.php");

function getCategories()
{
	$q = mysql_query("SELECT * FROM category") or die( mysql_error() );
	
	if( mysql_num_rows( $q ) > 0 )
	{
		$res = mysql_fetch_array( $q );
		
		echo( "<option value='0' selected> Category </option> ");
		
		do
		{
			printf( "<option value='%s' > %s  </option> ", $res["id"], $res["name_ge"] );
		}
		while( $res = mysql_fetch_array( $q ) );
	}
}

function getSubcategories( $catId )
{ 
	if( $catId != 0 )
	{
		$q = mysql_query("SELECT * FROM subcategory WHERE category_id=".$catId) or die( mysql_error() );
	
		if( mysql_num_rows( $q ) > 0 )
		{
			$res = mysql_fetch_array( $q );
			
			echo( "<option value='0' selected> Subcategory </option> ");
			
			do
			{
				printf( "<option value='%s' > %s  </option> ", $res["id"], $res["name_ge"] );
			}
			while( $res = mysql_fetch_array( $q ) );
		}
	}
}

function getContracts() 
{
	$q = mysql_query("SELECT * FROM contract") or die( mysql_error() );
	
	if( mysql_num_rows( $q ) > 0 )
	{
		$res = mysql_fetch_array( $q );
		
		echo( "<option value='0' selected> Contract type </option> ");
		
		do
		{
			printf( "<option value='%s' > %s  </option> ", $res["id"], $res["name_ge"] );
		}
		while( $res = mysql_fetch_array( $q ) );
	}
}

function getLocations() 
{
	$q = mysql_query("SELECT * FROM  location") or die( mysql_error() );
	
	if( mysql_num_rows( $q ) > 0 )
	{
		$res = mysql_fetch_array( $q );
		
		echo( "<option value='0' selected> City </option> ");
		
		do
		{
			printf( "<option value='%s' > %s  </option> ", $res["id"], $res["name_ge"] );
		}
		while( $res = mysql_fetch_array( $q ) );
	}
}

function getDistricts( $locationId )
{
	if( $locationId != 0 )
	{
		$q = mysql_query("SELECT * FROM district WHERE location_id=".$locationId) or die( mysql_error() );
	
		if( mysql_num_rows( $q ) > 0 )
		{
			$res = mysql_fetch_array( $q );
			
			echo( "<option value='0' selected> District </option> ");
			
			do
			{
				printf( "<option value='%s' > %s  </option> ", $res["id"], $res["name_ge"] );
			}
			while( $res = mysql_fetch_array( $q ) );
		}
	}
}

function getRenovation() 
{
	$q = mysql_query("SELECT * FROM renovation") or die( mysql_error() );
	
	if( mysql_num_rows( $q ) > 0 )
	{
		$res = mysql_fetch_array( $q );
		
		echo( "<option value='0' selected> Renovation </option> ");
		
		do
		{
			printf( "<option value='%s' > %s  </option> ", $res["id"], $res["name_ge"] );
		}
		while( $res = mysql_fetch_array( $q ) );
	}
}

function addApartment() // for testing 
{
	$apartment = new Apartment();
	
	$apartment->setApartmentId( 1 );
	
	$apartment->addToDb();
}

function getAppartments( $category, $subcategory, $contract, $location, $district, $renovation, $priceMin, $priceMax, 
						 $squareMin, $squareMax, $roomMin, $roomMax, $floorMin, $floorMax, $sleepRoomMin, $sleepRoomMax,
						 $balcony, $parking, $hot_water, $heat, $shelf, $gas, $phone, $internet, $tv, $air_cond, 
						 $elevator )
{
	
	$searchQuery = createQueryString ( $category, $subcategory, $contract, $location, $district, $renovation, $priceMin, $priceMax, 
						 	 		   $squareMin, $squareMax, $roomMin, $roomMax, $floorMin, $floorMax, $sleepRoomMin, $sleepRoomMax,
						 	 		   $balcony, $parking, $hot_water, $heat, $shelf, $gas, $phone, $internet, $tv, $air_cond, 
						 	 		   $elevator );
									   
									   
	$q = mysql_query( $searchQuery ) or die ( mysql_error() );
	
	if( mysql_num_rows( $q ) > 0 )
	{
		$res = mysql_fetch_array( $q );
		
		$cat      = new Category();
		$location = new Location();
		
		do 
		{
			$cat->setCatId( $res["category_id"] );
			$cat->loadCatData();
			
			$location->setLocationId( $res["location_id"] );
			$location->loadLocationData();
			
			if( $res["heading"] != "" ) 
				$heading = "<div class='heading-wrap'> ". $res["heading"] ." </div>"; 
			else
				$heading = "";
			
			$photoQuery = mysql_query("SELECT * FROM photos WHERE apartment_id=".$res["id"]);
			$photoRes   = mysql_fetch_array( $photoQuery );
			
			printf("<div class='appartment-wrap'>
						<div class='photo-wrap' onclick='showDetails(%s)'>
							<img src='photos/%s'>
							%s
						</div>
						<div class='desciption-small'> 
							<div class='description-item'>Area: %s მ<sup>2</sup></div> 
							<div class='description-item'>Category: %s</div>
							<div class='description-item'>Location: %s</div>
							<div class='description-item'>Price: %s$</div>
						</div>   
					</div> ", $res["id"], $photoRes["url"], $heading, $res["area"], $cat->getCatNameGe(), $location->getLocationNameGe(), $res["price"] );
		}
		while( $res = mysql_fetch_array( $q ) );
	}
	 
}

function getAppartmentsAdmin( $category, $subcategory, $contract, $location, $district, $renovation, $priceMin, $priceMax, 
						 	  $areaMin, $areaMax, $roomMin, $roomMax, $floorMin, $floorMax, $sleepRoomMin, $sleepRoomMax,
						 	  $balcony, $parking, $hot_water, $heat, $shelf, $gas, $phone, $internet, $tv, $air_cond, 
						 	  $elevator )
{
	
	$searchQuery = createQueryString ( $category, $subcategory, $contract, $location, $district, $renovation, $priceMin, $priceMax, 
						 	 		   $areaMin, $areaMax, $roomMin, $roomMax, $floorMin, $floorMax, $sleepRoomMin, $sleepRoomMax,
						 	 		   $balcony, $parking, $hot_water, $heat, $shelf, $gas, $phone, $internet, $tv, $air_cond, 
						 	 		   $elevator );
									   
	$q = mysql_query( $searchQuery ) or die ( mysql_error() );
	
	if( mysql_num_rows( $q ) > 0 )
	{
		$res = mysql_fetch_array( $q );
		
		$cat      = new Category();
		$location = new Location();
		
		do 
		{
			$cat->setCatId( $res["category_id"] );
			$cat->loadCatData();
			
			$location->setLocationId( $res["location_id"] );
			$location->loadLocationData();
			
			if( $res["heading"] != "" ) 
				$heading = "<div class='heading-wrap'> ". $res["heading"] ." </div>"; 
			else
				$heading = "";
			
			printf("<div class='appartment-wrap'>
						<div class='close-delete' onclick='delItem(%s);'> </div>
						<div class='photo-wrap'>
							<img src='http://assets.nydailynews.com/polopoly_fs/1.1078246!/img/httpImage/image.jpg_gen/derivatives/landscape_635/image.jpg'>
							%s
						</div>
						<div class='desciption-small'> 
							<div class='description-item'>Area: %s მ<sup>2</sup></div> 
							<div class='description-item'>Category: %s</div>
							<div class='description-item'>Location: %s</div>
							<div class='description-item'>Price: %s$</div>
						</div>   
					</div> ", $res["id"], $heading, $res["area"], $cat->getCatNameGe(), $location->getLocationNameGe(), $res["price"] );
		}
		while( $res = mysql_fetch_array( $q ) );
	}
	
	//echo($searchQuery);
}

function insertPhoto($id, $name)
{
	mysql_query("INSERT INTO photos(apartment_id,url) VALUES(".$id.",'".$name."')") or die( mysql_error() );
}

function createQueryString ( $category, $subcategory, $contract, $location, $district, $renovation, $priceMin, $priceMax, 
						 	 $areaMin, $areaMax, $roomMin, $roomMax, $floorMin, $floorMax, $sleepRoomMin, $sleepRoomMax,
						 	 $balcony, $parking, $hot_water, $heat, $shelf, $gas, $phone, $internet, $tv, $air_cond, 
						 	 $elevator ) 
{
	$query = "";
	
	if( $category != 0 )
		$query = $query." category_id=".$category; 
	
	if( $subcategory != 0 )
	{
		if( $query != "" )
			$query = $query." AND subcategory_id=".$subcategory; 
		else
			$query = $query." subcategory_id=".$subcategory; 
	}
	
	if( $contract != 0 )
	{
		if( $query != "" )
			$query = $query." AND contract_id=".$contract; 
		else
			$query = $query." contract_id=".$contract; 
	}
	
	if( $location != 0 )
	{
		if( $query != "" )
			$query = $query." AND location_id=".$location; 
		else
			$query = $query." location_id=".$location; 
	}
	
	if( $district != 0 )
	{
		if( $query != "" )
			$query = $query." AND district_id=".$district; 
		else
			$query = $query." district_id=".$district; 
	}
	
	if( $renovation != 0 )
	{
		if( $query != "" )
			$query = $query." AND renovation_id=".$renovation; 
		else
			$query = $query." renovation_id=".$renovation; 
	}
	
	if( $priceMax != 0 )
	{
		if( $query != "" )
			$query = $query." AND price BETWEEN ".$priceMin." AND  ".$priceMax; 
		else
			$query = $query." price BETWEEN ".$priceMin." AND  ".$priceMax; 
	}
	
	if( $areaMax != 0)
	{
		if( $query != "" )
			$query = $query." AND area BETWEEN ".$areaMin." AND  ".$areaMax; 
		else
			$query = $query." area BETWEEN ".$areaMin." AND  ".$areaMax; 
	}
	
	if( $roomMax != 0)
	{ 
		if( $query != "" )
			$query = $query." AND rooms BETWEEN ".$roomMin." AND  ".$roomMax; 
		else
			$query = $query." rooms BETWEEN ".$roomMin." AND  ".$roomMax; 
	}
	
	if( $floorMax != 0)
	{ 
		if( $query != "" )
			$query = $query." AND floor BETWEEN ".$floorMin." AND  ".$floorMax; 
		else
			$query = $query." floor BETWEEN ".$floorMin." AND  ".$floorMax; 
	}
	
	if( $sleepRoomMax != 0)
	{ 
		if( $query != "" )
			$query = $query." AND sleep_room BETWEEN ".$sleepRoomMin." AND  ".$sleepRoomMax; 
		else
			$query = $query." sleep_room BETWEEN ".$sleepRoomMin." AND  ".$sleepRoomMax; 
	}
	
	if( $balcony != 0 )
	{
		if( $query != "" )
			$query = $query." AND balcony=1"; 
		else
			$query = $query." balcony=1"; 
	}
	
	if( $parking != 0 )
	{
		if( $query != "" )
			$query = $query." AND parking=1"; 
		else
			$query = $query." parking=1"; 
	}
	
	if( $hot_water != 0 )
	{
		if( $query != "" )
			$query = $query." AND hot_water=1"; 
		else
			$query = $query." hot_water=1"; 
	}
	
	if( $heat != 0 )
	{
		if( $query != "" )
			$query = $query." AND heat=1"; 
		else
			$query = $query." heat=1"; 
	}
	
	if( $shelf != 0 )
	{
		if( $query != "" )
			$query = $query." AND shelf=1"; 
		else
			$query = $query." shelf=1"; 
	}
	
	if( $gas != 0 )
	{
		if( $query != "" )
			$query = $query." AND gas=1"; 
		else
			$query = $query." gas=1"; 
	}
	
	if( $phone != 0 )
	{
		if( $query != "" )
			$query = $query." AND phone=1"; 
		else
			$query = $query." phone=1"; 
	}
		
	if( $internet != 0 )
	{
		if( $query != "" )
			$query = $query." AND internet=1"; 
		else
			$query = $query." internet=1"; 
	}
	
	if( $tv != 0 )
	{
		if( $query != "" )
			$query = $query." AND tv=1"; 
		else
			$query = $query." tv=1"; 
	}
	
	if( $air_cond != 0 )
	{
		if( $query != "" )
			$query = $query." AND air_cond=1"; 
		else
			$query = $query." air_cond=1"; 
	}
		
	if( $elevator != 0 )
	{
		if( $query != "" )
			$query = $query." AND elevator=1"; 
		else
			$query = $query." elevator=1"; 
	}
	
	if($query != "")
		$query = "SELECT * FROM apartment WHERE ".$query;
	else
		$query = "SELECT * FROM apartment";
	
	return $query;
	
}

function removeAllBadChars( $string ) 
{
	$string = str_replace("&", "", $string);
	$string = str_replace("*", "", $string);
	$string = str_replace(";", "", $string);
	$string = str_replace("<", "", $string);
	$string = str_replace(">", "", $string);
	$string = str_replace("{", "", $string);
	$string = str_replace("}", "", $string);
	$string = str_replace("[", "", $string);
	$string = str_replace("]", "", $string);
	$string = str_replace("+", "", $string);
	$string = str_replace("%", "", $string);
	$string = str_replace("~", "", $string);

	return $string;
}


?>