<?
include("db_connect.php");

class Apartment 
{
	public $id = 0;
	public $name_ge = "";
	
	public $user_id		   = 0;
	public $category_id	   = 0;
	public $subcategory_id = 0;
	public $contract_id	   = 0;
	public $location_id	   = 0;
	public $district_id	   = 0;
	public $renovation_id  = 0;	
	public $price 		   = 0;
	public $area 		   = 0;	
	public $rooms 		   = 0;	 	
	public $floors 		   = 0;	
	public $sleep_room 	   = 0;		
	public $parking 	   = 0;		
	public $hot_water 	   = 0;		
	public $heat 		   = 0;		
	public $gas 		   = 0;	
	public $phone 	  	   = 0;	
	public $internet 	   = 0;	
	public $tv 			   = 0;		
	public $air_cond 	   = 0;	
	public $elevator 	   = 0;	
	public $shelf 		   = 0;		
	public $balcony 	   = 0;		
	public $heading 	   = "";	
	public $address 	   = "";		
	public $desc 		   = "";	 
	
	function setApartmentId( $id )
	{
		$this->id = $id;
		
		$this->user_id		  = 0;
		$this->category_id	  = 0;
		$this->subcategory_id = 0;
		$this->contract_id	  = 0;
		$this->location_id	  = 0;
		$this->district_id	  = 0;
		$this->renovation_id  = 0;	
		$this->price 		  = 0.0;
		$this->area 		  = 0.0;	
		$this->rooms 		  = 0.0;	 	
		$this->floors 		  = 0;	
		$this->sleep_room 	  = 0;		
		$this->parking 	   	  = 0;		
		$this->hot_water 	  = 0;		
		$this->heat 		  = 0;		
		$this->gas 		      = 0;	
		$this->phone 	  	  = 0;	
		$this->internet 	  = 0;	
		$this->tv 			  = 0;		
		$this->air_cond 	  = 0;	
		$this->elevator 	  = 0;	
		$this->shelf 		  = 0;		
		$this->balcony 	      = 0;		
		$this->heading 	      = "a";	
		$this->address 	      = "a";		
		$this->desc 		  = "aasdadss";	 
	}
	
	function loadApartmentData()
	{
		$q 	 = mysql_query("SELECT * FROM apartment WHERE id=".$this->id) or die( mysql_error() );
		$res = mysql_fetch_array( $q );
		
		if(!empty( $res ))
		{
			$this->user_id		  = $res["user_id"];
			$this->category_id	  = $res["category_id"];
			$this->subcategory_id = $res["subcategory_id"];
			$this->contract_id	  = $res["contract_id"];
			$this->location_id	  = $res["location_id"];
			$this->district_id	  = $res["district_id"];
			$this->renovation_id  = $res["renovation_id"];
			$this->price 		  = $res["price"];
			$this->area 		  = $res["area"];
			$this->rooms 		  = $res["rooms"]; 	
			$this->floors 		  = $res["floor"]; 	
			$this->sleep_room 	  = $res["sleep_room"]; 		
			$this->parking 	   	  = $res["parking"]; 			
			$this->hot_water 	  = $res["hot_water"]; 			
			$this->heat 		  = $res["heat"]; 		
			$this->gas 		      = $res["gas"]; 	
			$this->phone 	  	  = $res["phone"]; 	
			$this->internet 	  = $res["internet"]; 	
			$this->tv 			  = $res["tv"]; 		
			$this->air_cond 	  = $res["air_cond"]; 	
			$this->elevator 	  = $res["elevator"]; 		
			$this->shelf 		  = $res["shelf"]; 		
			$this->balcony 	      = $res["balcony"]; 		
			$this->heading 	      = $res["heading"]; 		
			$this->address 	      = $res["address"]; 			
			$this->desc 		  = $res["descrioption"]; 		 
		}
	}
	
	function setUserId( $user_id )
	{
		$this->user_id = $user_id;
	}
	function getUserId()
	{
		return $this->user_id;
	}
	
	function setCategoryId( $category_id )
	{
		$this->category_id = $category_id;
	}
	function getCategoryId()
	{
		return $this->category_id;
	}
	
	function setSubcategoryId( $subcategory_id )
	{
		$this->subcategory_id = $subcategory_id;
	}
	function getSubcategoryId()
	{
		return $this->subcategory_id;
	}

	function setContractId( $contract_id )
	{
		$this->contract_id = $contract_id;
	}
	function getContractId()
	{
		return $this->contract_id;
	}	
	
	function setLocationId( $location_id )
	{
		$this->location_id = $location_id;
	}
	function getLocationId()
	{
		return $this->location_id;
	}	

	function setDistrictId( $district_id )
	{
		$this->district_id = $district_id;
	}
	function getDistrictId()
	{
		return $this->district_id;
	}

	function setRenovationId( $renovation_id )
	{
		$this->renovation_id = $renovation_id;
	}
	function getRenovationId()
	{
		return $this->renovation_id;
	}

	function setPrice( $price )
	{
		$this->price = $price;
	}
	function getPrice()
	{
		return $this->price;
	}

	function setArea( $area )
	{
		$this->area = $area;
	}
	function getArea()
	{
		return $this->area;
	}
	
	function setRooms( $rooms )
	{
		$this->rooms = $rooms;
	}
	function getRooms()
	{
		return $this->rooms;
	}

	function setFloor( $floor )
	{
		$this->floors = $floor;
	}
	function getFloor()
	{
		return $this->floors;
	}
	
	function setSleepRoom( $sleep_room )
	{
		$this->sleep_room = $sleep_room;
	}
	function getSleepRoom()
	{
		return $this->sleep_room;
	}

	function setParking( $parking )
	{
		$this->parking = $parking;
	}
	function getParking()
	{
		return $this->parking;
	}
	
	function setHotWater( $hot_water )
	{
		$this->hot_water = $hot_water;
	}
	function getHotWater()
	{
		return $this->hot_water;
	}
	
	function setHeat( $heat )
	{
		$this->heat = $heat;
	}
	function getHeat()
	{
		return $this->heat;
	}
	
	function setGas( $gas )
	{
		$this->gas = $gas;
	}
	function getGas()
	{
		return $this->gas;
	}

	function setPhone( $phone )
	{
		$this->phone = $phone;
	}
	function getPhone()
	{
		return $this->phone;
	} 
	
	function setInternet( $internet )
	{
		$this->internet = $internet;
	}
	function getInternet()
	{
		return $this->internet;
	}

	function setTv( $tv )
	{
		$this->tv = $tv;
	}
	function getTv()
	{
		return $this->tv;
	}
	
	function setAirCond( $air_cond )
	{
		$this->air_cond = $air_cond;
	}
	function getAirCond()
	{
		return $this->air_cond;
	}

	function setElevator( $elevator )
	{
		$this->elevator = $elevator;
	}
	function getElevator()
	{
		return $this->elevator;
	}
	
	function setShelf( $shelf )
	{
		$this->shelf = $shelf;
	}
	function getShelf()
	{
		return $this->shelf;
	}

	function setBalcony( $balcony )
	{
		$this->balcony = $balcony;
	}
	function getBalcony()
	{
		return $this->balcony;
	}

	function setHeading( $heading )
	{
		$this->heading = $heading;
	}
	function getHeading()
	{
		return $this->heading;
	}
	
	function setAddress( $address )
	{
		$this->address = $address;
	}
	function getAddress()
	{
		return $this->address;
	}

	function setDesc( $desc )
	{
		$this->desc = $desc;
	}
	function getDesc()
	{
		return $this->desc;
	}

	function addToDb()
	{
		mysql_query("INSERT INTO apartment(user_id,category_id,subcategory_id,contract_id,location_id,
										   district_id,renovation_id,price,area,rooms,floor,
										   sleep_room,parking,hot_water,heat,gas,
										   phone,internet,tv,air_cond,elevator,
										   shelf,balcony,heading,address,description)
								 VALUES(".$this->user_id.",".$this->category_id.",".$this->subcategory_id.",".$this->contract_id.",
								 		".$this->location_id.",".$this->district_id.",".$this->renovation_id.",".$this->price.",
								 		".$this->area.",".$this->rooms.",".$this->floors.",".$this->sleep_room.",".$this->parking.",
								 		".$this->hot_water.",".$this->heat.",".$this->gas.",".$this->phone.",".$this->internet.",
								 		".$this->tv.",".$this->air_cond.",".$this->elevator.",".$this->shelf.",".$this->balcony.",
								 		'".$this->heading."','".$this->address."','".$this->desc."')") or die( mysql_error() );
										
		return mysql_insert_id();
	}
}


?>