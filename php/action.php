<?

include("lib.php");

$action = "";

if(isset($_POST["action"]))
	$action = $_POST["action"];

if( $action == "" )
{ 
	echo("<script type='text/javascript'>
	  			window.location = '../index.php'
   	 		 </script>");
 	return;
}

$images_dir = '../photos';

switch( $action )
{
	case "add":
		
		$heading = "No Heading";
		
		$address = "No Address";
		
		$desc = "No Description"; 
		
		$category = $_POST["apartmentSelect"];
	
		$subcategory = $_POST["structureTypeSelect"];

		$contract = $_POST["contractSelect"];
	
		$location = $_POST["locationSelect"]; 
	
		$district = $_POST["districtSelect"];
		
		$renovation = $_POST["renovationSelect"];
		
		$price = $_POST["price"]; 
	
		$square = $_POST["square"];
	
		$room = $_POST["rooms"];
	
		$floor = $_POST["floor"];
		
		$sleepRoom = $_POST["sleepRoom"];
		
		$toilet = $_POST["toilet"];
	
		$balcony = $_POST["balcony"]; 
	
		$parking = $_POST["parking"];
	
		$hot_water = $_POST["hot_water"];
	
		$heat = $_POST["heat"];
	
		$shelf = $_POST["shelf"];
	
		$gas = $_POST["gas"];
	
		$phone = $_POST["phone"];
		
		$internet = $_POST["internet"];
	
		$tv = $_POST["tv"];
	
		$air_cond = $_POST["air_cond"];
	
		$elevator = $_POST["elevator"];
		
		$heading = $_POST["heading"];
		
		$address = $_POST["address"];
		
		$desc = $_POST["desc"]; 

		$heading = removeAllBadChars($heading); 
		$address = removeAllBadChars($address); 
		$desc    = removeAllBadChars($desc); 

		$heading = htmlspecialchars($heading);
		$address = htmlspecialchars($address);
		$desc 	 = htmlspecialchars($desc);
		
		$apartment = new Apartment();
		
		$apartment->setCategoryId($category);
		$apartment->setSubcategoryId($subcategory);
		$apartment->setContractId($contract);
		$apartment->setLocationId($location);
		$apartment->setDistrictId($district);
		$apartment->setRenovationId($renovation);
		$apartment->setPrice($price);
		$apartment->setSquare($square);
		$apartment->setRooms($room);
		$apartment->setFloor($floor);
		$apartment->setSleepRoom($sleepRoom);
		$apartment->setParking($parking);
		$apartment->setHotWater($hot_water);
		$apartment->setHeat($heat);
		$apartment->setGas($gas);
		$apartment->setPhone($phone);
		$apartment->setInternet($internet);
		$apartment->setTv($tv);
		$apartment->setAirCond($air_cond);
		$apartment->setElevator($elevator);
		$apartment->setShelf($shelf);
		$apartment->setBalcony($balcony);
		$apartment->setHeading($heading);
		$apartment->setAddress($address);
		$apartment->setDesc($desc);
		
		$newId = $apartment->addToDb(); 
		
		for($i = 1; $i <= 7; $i++)
		{ 
			$upload_form_name = "photo_".$i; 
			 
			$tmp_name = $_FILES[$upload_form_name]["tmp_name"];
			$name     = $_FILES[$upload_form_name]["name"];
			
			if($tmp_name == "" || $name == "")
			{
				continue;
			} 
			
			move_uploaded_file($_FILES[$upload_form_name]["tmp_name"], "../photos/".$_FILES[$upload_form_name]["name"]);   
			
			insertPhoto($newId, $_FILES[$upload_form_name]["name"]);
			
		}
		
		echo("<script type='text/javascript'>
	  			window.location = '../admin/';
   	 		 </script>");
 		return;
		
		break;
	
	case "getCat":
		getCategories();
		break;
		
	case "getSubcat": 
		if( isset( $_POST["catId"] ) )
			getSubcategories( $_POST["catId"] ); 
		break;
		
	case "getContracts":
		getContracts();
		break;
		
	case "getLocations":
		getLocations();
		break;
		
	case "getDistricts":
		if( isset( $_POST["locationId"] ) )
			getDistricts( $_POST["locationId"] );
		break;
		
	case "getRenovation":
		getRenovation();
		break;
		
	case "getAppartments":
		
		if(isset($_POST["apartmentCategory"]))
			$category = $_POST["apartmentCategory"];
		
		if(isset($_POST["apartmentSubcategory"]))
			$subcategory = $_POST["apartmentSubcategory"];
		
		if(isset($_POST["contract"]))
			$contract = $_POST["contract"];
		
		if(isset($_POST["location"]))
			$location = $_POST["location"];
		
		if(isset($_POST["district"]))
			$district = $_POST["district"];
			
		if(isset($_POST["renovation"]))
			$renovation = $_POST["renovation"];
			
		if(isset($_POST["priceMin"]))
			$priceMin = $_POST["priceMin"];
			
		if(isset($_POST["priceMax"]))
			$priceMax = $_POST["priceMax"];
		
		if(isset($_POST["areaMin"]))
			$areaMin = $_POST["areaMin"];
		
		if(isset($_POST["areaMax"]))
			$areaMax = $_POST["areaMax"];
		
		if(isset($_POST["roomMin"]))
			$roomMin = $_POST["roomMin"];
		
		if(isset($_POST["roomMax"]))
			$roomMax = $_POST["roomMax"];
		
		if(isset($_POST["floorMin"]))
			$floorMin = $_POST["floorMin"];
		
		if(isset($_POST["floorMax"]))
			$floorMax = $_POST["floorMax"];
			
		if(isset($_POST["sleepRoomMin"]))
			$sleepRoomMin = $_POST["sleepRoomMin"];
		
		if(isset($_POST["sleepRoomMax"]))
			$sleepRoomMax = $_POST["sleepRoomMax"];
		
		if(isset($_POST["balcony"]))
			$balcony = $_POST["balcony"]; 
		
		if(isset($_POST["parking"]))
			$parking = $_POST["parking"];
		
		if(isset($_POST["hot_water"]))
			$hot_water = $_POST["hot_water"];
		
		if(isset($_POST["heat"]))
			$heat = $_POST["heat"];
		
		if(isset($_POST["shelf"]))
			$shelf = $_POST["shelf"];
		
		if(isset($_POST["gas"]))
			$gas = $_POST["gas"];
		
		if(isset($_POST["phone"]))
			$phone = $_POST["phone"];
			
		if(isset($_POST["internet"]))
			$internet = $_POST["internet"];
		
		if(isset($_POST["tv"]))
			$tv = $_POST["tv"];
		
		if(isset($_POST["air_cond"]))
			$air_cond = $_POST["air_cond"];
		
		if(isset($_POST["elevator"]))
			$elevator = $_POST["elevator"];
		
		getAppartments( $category, $subcategory, $contract, $location, $district, $renovation, $priceMin, $priceMax, 
						$areaMin, $areaMax, $roomMin, $roomMax, $floorMin, $floorMax, $sleepRoomMin, $sleepRoomMax,
						$balcony, $parking, $hot_water, $heat, $shelf, $gas, $phone, $internet, $tv, $air_cond, 
						$elevator );
		 
		break;
}
	

?>