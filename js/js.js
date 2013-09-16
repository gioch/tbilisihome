

function initControls( sender ) { 
	getCategory();
	getContracts(); 
	getLocations(); 
	getRenovation();
	initComboBoxOnChange();
	initPriceSlider();
	initAreaSlider();
	initRoomSlider();
	initFloorSlider();
	initToiletSlider();
	initSleepRoomSlider(); 
	initFilterSwitches( sender );
	initCheckboxes(); 
	initSubmitButton();
	initPopupBackground();
	initPopupLoginDlgButtons();
} 

function showDetails( apartmentId ) {
	if( apartmentId != 0 )
		window.location = "details.php?id="+apartmentId;
	else
		return;
}

function initGallery() {
	var thumbMain = $('#mainImg img');
	var selectedImageUrl = thumbMain.attr('src');
	   
	$('#otherImgs img').on('click',function() {
		var selectedImgUrl = $(this).attr('src');
		var mainImageUrl = thumbMain.attr('src');
		 	
		thumbMain.attr('src',selectedImgUrl);
		 	
		$(this).attr('src', mainImageUrl);
	});
}

function initComboBoxOnChange() {
	
	var apartmentSelect 	= $("#apartmentSelect");
	var structureTypeSelect = $("#structureTypeSelect"); 
	var locationSelect      = $("#locationSelect"); 
	
	apartmentSelect.change( function() {
		var catId = apartmentSelect.val();
		getSubcategory( catId ); 
	} );
	
	locationSelect.change( function() {
		var locationId = locationSelect.val();
		getDistricts( locationId ); 
	} );
}

function getCategory() { 
	var apartmentSelect = $("#apartmentSelect"); 
	$.post("php/action.php", { action: 'getCat' }, function( data ) {
		apartmentSelect.html( data ); 
	}); 	
}

function getSubcategory( catId ) { 
	var structureTypeSelect = $("#structureTypeSelect"); 
	$.post("php/action.php", { action: 'getSubcat', catId: catId }, function( data ) {
		structureTypeSelect.html( data ); 
	}); 	
}

function getContracts() {
	var contractSelect = $("#contractSelect"); 
	$.post("php/action.php", { action: 'getContracts' }, function( data ) {
		contractSelect.html( data ); 
	});  
}

function getLocations() {
	var locationSelect = $("#locationSelect"); 
	$.post("php/action.php", { action: 'getLocations' }, function( data ) {
		locationSelect.html( data ); 
	});  
}

function getDistricts( locationId )  {
	var districtSelect = $("#districtSelect"); 
	$.post("php/action.php", { action: 'getDistricts', locationId: locationId }, function( data ) {
		districtSelect.html( data ); 
	});  
}

function getRenovation()  {
	var renovationSelect = $("#renovationSelect"); 
	$.post("php/action.php", { action: 'getRenovation' }, function( data ) {
		renovationSelect.html( data ); 
	});  
}

function initPriceSlider() {
	
	var priceSlider = $("#price-slider");
	var priceMin    = $( "#price-min" );
	var priceMax    = $( "#price-max" );
	
	priceMin.val( "0" );
    priceMax.val( "1000000" );
	
	priceSlider.slider({
      range: true,
      min: 0,
      max: 1000000,
      values: [ 0, 1000000 ],
      slide: function( event, ui ) {
        priceMin.val( ui.values[ 0 ] );
        priceMax.val( ui.values[ 1 ] );
      }
    });
    
}

function initAreaSlider() {
	
	var areaSlider = $("#area-slider");
	var areaMin    = $("#area-min");
	var areaMax    = $("#area-max");
	
	areaMin.val( "0" );
    areaMax.val( "10000" );
	
	areaSlider.slider({
      range: true,
      min: 0,
      max: 10000,
      values: [ 0, 10000 ],
      slide: function( event, ui ) {
        areaMin.val( ui.values[ 0 ] );
        areaMax.val( ui.values[ 1 ] );
      }
    });
	
}

function initRoomSlider() {
	
	var roomSlider = $("#room-slider");
	var roomMin    = $("#room-min");
	var roomMax    = $("#room-max");
	
	roomMin.val( "0" );
    roomMax.val( "10" );
	
	roomSlider.slider({
      range: true,
      min: 0,
      max: 10,
      values: [ 0, 10 ],
      slide: function( event, ui ) {
        roomMin.val( ui.values[ 0 ] );
        roomMax.val( ui.values[ 1 ] );
      }
    });
}

function initFloorSlider() {
	
	var floorSlider = $("#floor-slider");
	var floorMin    = $("#floor-min");
	var floorMax    = $("#floor-max");
	
	floorMin.val( "0" );
    floorMax.val( "20" );
	
	floorSlider.slider({
      range: true,
      min: 0,
      max: 20,
      values: [ 0, 20 ],
      slide: function( event, ui ) {
        floorMin.val( ui.values[ 0 ] );
        floorMax.val( ui.values[ 1 ] );
      }
    });
}

function initToiletSlider() {
	
	var toiletSlider = $("#toilet-slider");
	var toiletMin    = $("#toilet-min");
	var toiletMax    = $("#toilet-max");
	
	toiletMin.val( "0" );
    toiletMax.val( "10" );
	
	toiletSlider.slider({
      range: true,
      min: 0,
      max: 10,
      values: [ 0, 10 ],
      slide: function( event, ui ) {
        toiletMin.val( ui.values[ 0 ] );
        toiletMax.val( ui.values[ 1 ] );
      }
    });
}

function initSleepRoomSlider() {
	
	var sleepRoomSlider = $("#sleep-room-slider");
	var sleepRoomMin    = $("#sleep-room-min");
	var sleepRoomMax    = $("#sleep-room-max");
	
	sleepRoomMin.val( "0" );
    sleepRoomMax.val( "10" );
	
	sleepRoomSlider.slider({
      range: true,
      min: 0,
      max: 10,
      values: [ 0, 10 ],
      slide: function( event, ui ) {
        sleepRoomMin.val( ui.values[ 0 ] );
        sleepRoomMax.val( ui.values[ 1 ] );
      }
    });
}

 
function initPopupBackground()
{
	var popupBg = $("#popupBackground");
	
	popupBg.click( function() {
		showHidePopupBgAndDialog( 0 );
	} );
	
}

function initSignUpDlgButtons()
{
	var signUpButton 	 = $("#signUpButton");
	var cancelButton 	 = $("#cancelButton");
	var signUpCloseThumb = $("#signUpCloseThumb"); 
	
	signUpButton.click( function() { 
	});
	 
	cancelButton.click( function() { 
		window.location = "index.html";
	});
	
	signUpCloseThumb.click( function () {
		window.location = "index.html";
	});
}

function initPopupLoginDlgButtons()
{
	var popupCloseThumb      = $("#popupCloseThumb");
	var popupDlgLoginButton  = $("#loginButton"); 
	var popupDlgSignUpButton = $("#signUpButton");	 
	
	popupCloseThumb.click( function() {
		showHidePopupBgAndDialog( 0 );
	});
	
	popupDlgLoginButton.click( function() {
		window.location = "index.html";
	});
	 
	popupDlgSignUpButton.click( function() {
		window.location = "signup.html";
	});
}

function showHidePopupBgAndDialog( visible ) 
{
	var pageWrap	  = $("#page-wrap");
	var popupBg       = $("#popupBackground");
	var popupLoginDlg = $("#popupLogin");
	
	if( visible == 1 )
	{
		pageWrap.addClass("blur-effect");
		popupBg.show();
		popupLoginDlg.show();
	}
	if( visible == 0 )
	{
		pageWrap.removeClass("blur-effect");
		popupBg.hide();
		popupLoginDlg.hide();
	} 
}

function initFilterSwitches( sender ) {
	
	var adminOperationsSwitch = $("#adminOperations");
	var filterWrap			  = $("#filterWrap");
	var addNewRecordButton	  = $("#addNewRecordButton");
	var changeAccountSettings = $("#changeAccountSettings");
	var logOut 				  = $("#logOut");
	
	var commonFiltersSwitch   = $("#commonFilters"); 
	var detailedFiltersSwitch = $("#detailedFilters"); 
	
	var districtFilterCombo     = $("#districtFilterCombo");
	var renovationFilterCombo   = $("#renovationFilterCombo");
	var floorFilterSlider       = $("#floorFilterSlider");
	var toiletFilterSlider		= $("#toiletFilterSlider");
	var sleepRoomFilterSlider   = $("#sleepRoomFilterSlider");
	var additionalOptionFilters = $("#additionalOptionFilters");
	
	switch(sender)
	{
		case "index":
			commonFiltersSwitch.click( function() {
				commonFiltersSwitch.removeClass("inactive-switch");
				commonFiltersSwitch.addClass("active-switch switch-separator-border-right");
				
				detailedFiltersSwitch.addClass("inactive-switch");
				detailedFiltersSwitch.removeClass("active-switch switch-separator-border-left");
				
				districtFilterCombo.hide();
				floorFilterSlider.hide();
				additionalOptionFilters.hide();
				toiletFilterSlider.hide();
				sleepRoomFilterSlider.hide();
				renovationFilterCombo.hide();
			} );
		
			detailedFiltersSwitch.click( function() {
				detailedFiltersSwitch.removeClass("inactive-switch");
				detailedFiltersSwitch.addClass("active-switch switch-separator-border-left");
				
				commonFiltersSwitch.addClass("inactive-switch");
				commonFiltersSwitch.removeClass("active-switch switch-separator-border-right");
				
				districtFilterCombo.show();
				floorFilterSlider.show();
				toiletFilterSlider.show();
				sleepRoomFilterSlider.show();
				additionalOptionFilters.show(); 
				renovationFilterCombo.show();
			} ); 
			
			break;
			
		case "admin":
			
			adminOperationsSwitch.click(function() {
				adminOperationsSwitch.removeClass("inactive-switch");
				adminOperationsSwitch.addClass("active-switch switch-separator-border-right");
				
				detailedFiltersSwitch.addClass("inactive-switch");
				detailedFiltersSwitch.removeClass("active-switch switch-separator-border-left");
				
				filterWrap.hide();
				
				addNewRecordButton.show();
				//changeAccountSettings.show();
				logOut.show();
			});
			
			detailedFiltersSwitch.click( function() {
				adminOperationsSwitch.addClass("inactive-switch");
				adminOperationsSwitch.removeClass("active-switch switch-separator-border-right");
				
				detailedFiltersSwitch.removeClass("inactive-switch");
				detailedFiltersSwitch.addClass("active-switch switch-separator-border-left"); 
				
				filterWrap.show();
				
				addNewRecordButton.hide();
				//changeAccountSettings.hide();
				logOut.hide();
			} );
		
			break;
	}
}

function initCheckboxes() {
	
	var checkboxes = $(".additional-filter-checkbox-container div");
	
	checkboxes.click(function () {
		
		var selElemId     = this.id;
		var selElemFormId = "#"+selElemId + "Form";  
		var selElemForm = $(selElemFormId);  
		
		if( $(this).hasClass("unchecked") ) 
		{
			$(this).removeClass("unchecked");
			$(this).addClass("checked");
			selElemForm.val(1);
		}
		else
		{
			$(this).removeClass("checked");
			$(this).addClass("unchecked");
			selElemForm.val(0);
		}
	});
}


function initSubmitButton() { 
	var submitSearchButton = $("#submitSearchButton");
	submitSearchButton.click(function() {
		getApartmentsFromDB();
	});
}

function getApartmentsFromDB() {
	
	var apartmentsDiv = $("#apartments");
	
	var apartmentSelect     = $("#apartmentSelect").val();
	var structureTypeSelect = $("#structureTypeSelect").val();
	var contractSelect      = $("#contractSelect").val();
	var locationSelect 	 	= $("#locationSelect").val();
	var districtSelect 	 	= $("#districtSelect").val();
	var renovationSelect 	= $("#renovationSelect").val();
	
	var priceEditMin = $("#price-min").val();
	var priceEditMax = $("#price-max").val();
	
	var areaEditMin = $("#area-min").val();
	var areaEditMax = $("#area-max").val();
	
	var roomEditMin = $("#room-min").val();
	var roomEditMax = $("#room-max").val();
	
	var floorEditMin = $("#floor-min").val();
	var floorEditMax = $("#floor-max").val();
	
	var toiletEditMin = $("#toilet-min").val();
	var toiletEditMax = $("#toilet-max").val();
	
	var sleepRoomEditMin = $("#sleep-room-min").val();
	var sleepRoomEditMax = $("#sleep-room-max").val();
	
	var balcony 	  	  = getCheckboxValue("#balcony");  
	var parking   		  = getCheckboxValue("#parking"); 
	var hot_water   	  = getCheckboxValue("#hot_water"); 
	var heat			  = getCheckboxValue("#heat"); 
	var shelf			  = getCheckboxValue("#shelf"); 
	var gas			      = getCheckboxValue("#gas"); 
	var phone			  = getCheckboxValue("#phone"); 
	var internet		  = getCheckboxValue("#internet"); 
	var tv				  = getCheckboxValue("#tv"); 
	var air_cond		  = getCheckboxValue("#air_cond"); 
	var elevator		  = getCheckboxValue("#elevator"); 
 
 	$.post("php/action.php", { action: 'getAppartments', 
 							   apartmentCategory: apartmentSelect,
 							   apartmentSubcategory: structureTypeSelect,
 							   contract: contractSelect,
 							   location: locationSelect,
 							   district: districtSelect,
 							   renovation: renovationSelect,
 							   priceMin: priceEditMin,
 							   priceMax: priceEditMax, 
 							   areaMin: areaEditMin,
 							   areaMax: areaEditMax,
 							   roomMin: roomEditMin,
 							   roomMax: roomEditMax,
 							   floorMin: floorEditMin,
 							   floorMax: floorEditMax,
 							   toiletMin: toiletEditMin,
 							   toiletMax: toiletEditMax,
 							   sleepRoomMin: sleepRoomEditMin,
 							   sleepRoomMax: sleepRoomEditMax, 
 							   balcony: balcony,
 							   parking: parking,
 							   hot_water: hot_water,
 							   heat: heat,
 							   shelf: shelf,
 							   gas: gas,
 							   phone: phone,
 							   internet: internet,
 							   tv: tv,
 							   air_cond: air_cond,
 							   elevator: elevator},
 							   function( data ) {
 							   
 							   apartmentsDiv.addClass("opacity05");
 							   apartmentsDiv.html( data );
 							   apartmentsDiv.removeClass("opacity05");
 							    
 							   });
}

function getCheckboxValue( handle ) { 
	var checkbox = $(handle);
	
	if( checkbox.hasClass("checked") )
		return 1;
		
	else if( checkbox.hasClass("unchecked") )
		return 0;
}
