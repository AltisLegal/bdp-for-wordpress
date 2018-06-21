<?php

/**
 * BDP Web Plugin Class
*/
class bdpWebPlugin extends uni{

//bdp base url, used for BDP sourced assets such as images
//var $bdpUrl = 'https://app2.bdphq.com';
//var $bdpUrl = 'https://bdphq.com';
var $bdpUrl = 'http://bdphq.com/restapi/';

//carousel image data
/**
 * potential remove the below
var $carouselThumbData = 'w=104&h=85&q=80';
var $detailImageData = 'w=512&h=421&q=80';
var $proPicParams = 'w=160&h=120&q=80';
*/

//set the default templates path
var $defTplPath = 'templates/';

//curency setup
var $cSymbolPosition = 'pre';
var $currencySymbol = '&pound;';

var $homeResTitle = 'streetName';




//template map
var $tplMap = array(
	'sideBarSearch',
	'defaultSearch',
	'homeRes',
	'defaultResGrid',
	'defaultResOuterGrid',
	'detailPage',
);

var $modeMap = array(
	'home' => array(
		'tpl'=>'homeInner.html',
		'outerTpl'=>'homeOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=12&ord=decprice'
	),
	'featured' => array(
		'tpl'=> 'sresInner.html' ,
		'outerTpl'=>'featuredsresOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=8&ord=decprice&ft=1'
	),
	'featuredLet' => array(
		'tpl'=> 'featuredInnerLet.html' ,
		'outerTpl'=>'featuredOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=8&ord=decprice&tt=1'
	),
	'featuredSingle' => array(
		'tpl'=> 'featuredInnerSingle.html' ,
		'outerTpl'=>'featuredOuterSingle.html',
		'func'=>'searchResults',
		'searchParams'=>'ord=decprice&ft=1'
	),
	'featuredSingleRandom' => array(
		'tpl'=> 'featuredInnerSingle.html' ,
		'outerTpl'=>'featuredOuterSingle.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=all&ft=1&random=1'
	),
	'results' => array(
		'tpl'=>'sresInner.html',
		'outerTpl'=>'sresOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=12&ord=decprice'
	),
	'resultsLet' => array(
		'tpl'=>'sresInnerLet.html',
		'outerTpl'=>'sresOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=12&ord=decprice'
	),
	'resultsMap' => array(
		'tpl'=>'sresMapInner.html',
		'outerTpl'=>'sresMapOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=all&ismap=1'
	),
	'resultsMapLet' => array(
		'tpl'=>'sresMapInnerLet.html',
		'outerTpl'=>'sresMapOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=all&ismap=1'
	),
	'details' => array(
		'tpl'=> 'details.html',
		'lettpl'=> 'detailslet.html',
		'roomTpl'=>'room.html',
		'hrTpl'=>'bdpEspcHr.html',
		'func'=>'detailsPage',
	),
	'detailsLet' => array(
		'tpl'=> 'detailsLetting.html',
		'roomTpl'=>'room.html',
		'hrTpl'=>'bdpEspcHr.html',
		'func'=>'detailsPage',
	),
	'detailsSummary' => array(
		'tpl'=>'detailsSummary.html',
		'func'=>'detailsGet',
	),
	'detailsMap' => array(
		'tpl'=>'detailsMap.html',
		'func'=>'detailsMap',
	),
	'detailsStreetview' => array(
		'tpl'=>'detailsStreetview.html',
		'func'=>'detailsMap',
	),
	'detailsDescription' => array(
		'tpl'=>'detailsDescription.html',
		'func'=>'detailsGet',
	),
	'detailsSlideshow' => array(
		'tpl'=>'detailsSlideshow.html',
		'func'=>'detailsPage',
	),
	'detailsMoreInfo' => array(
		'tpl'=>'detailsMoreInfo.html',
		'func'=>'detailsGet',
	),
	'formHandler' => array(
		'func'=>'formHandler'
	),
	'searchForm' => array(
		'tpl'=>'searchform.html',
		'func'=>'searchForm'
	),
	'searchFormLetting' => array(
		'tpl'=>'searchformLetting.html',
		'func'=>'searchForm'
	),
	'searchFormSales' => array(
		'tpl'=>'searchformSales.html',
		'func'=>'searchForm'
	),
	'sideSearch' => array(
		'tpl'=>'sideBarSearchForm.html',
		'func'=>'searchForm'
	),
	'sideSearchLetting' => array(
		'tpl'=>'sideBarSearchFormLetting.html',
		'func'=>'searchForm'
	),
	'sideSearchSales' => array(
		'tpl'=>'sideBarSearchFormSales.html',
		'func'=>'searchForm'
	),
	'propAlert' => array(
		'tpl'=>'propalert.html',
		'func'=>'searchForm'
	),
	'recentlySold' => array(
		'tpl'=>'recentlySoldInner.html',
		'outerTpl'=>'recentlySoldOuter.html',
		'func'=>'searchResultsSold',
		'searchParams'=>'ord=latest'
	),
	'recentlyAdded' => array(
		'tpl'=>'recentlyAddedInner.html',
		'outerTpl'=>'recentlyAddedOuter.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=5&ord=latest&nv=on'
	),
	'featuredTestimonial' => array(
		'tpl'=> 'featuredInnerTestimonial.html' ,
		'outerTpl'=>'featuredOuterTestimonial.html',
		'func'=>'detailsPage',
		'searchParams'=>'nres=1&ord=decprice'
	),
	'propertyMeta' => array(
		'tpl'=>'propmeta.html',
		'func'=>'detailsPage',
		'searchParams'=>'meta'
	),
	'searchMap' => array(
		'tpl'=>'sresMapInner.html',
		'outerTpl'=>'searchMap.html',
		'func'=>'searchResults',
		'searchParams'=>'nres=all&nv=on'
	),

);



/**
 * startup function
*/
function startUp(){


	/*//set the includes path*/
	//$incPath = '/includes/';

	//include the config file
	//include('cfg.php');





	//class map
	$classMap = array(
		'defaultMapZoom',
		'defaultStreetViewZoom',
		'defaultStreetViewHeading',
		'defaultStreetViewPitch',
		'defaultMapType',
		'detailPageId',
		'resPageId',
		'resPageIdSales',
		'resPageIdLettings',
		'resPageIdMap',
		'chunkFolder',
		'imgTpls',
		'salePriceOptions',
		'letPriceOptions',
		'maxSalePrice',
		'maxLetPrice',
		'pTypeArr',
		'bedRoomsMax',
		'orderingOptions',
		'resultsOptions',
		'rOptionArr',
		'gmapPinPath',
        'gmapStyle',
		'lazyLoadingActive',
	);
	//setup the plugin
	foreach($classMap as $key => $map){
		if($$map){
			$this->$map = $$map;
		}
	}

	//echo 'key'. $this-> orderingOptions;
	//run the class
	$api = new gPropsRestClient();
	//set the api key
	//$api->apiKey = 'your api key';
	$api->apiKey = $this -> apiKey;
	//set the shared secret
	//$api->sharedSecret = 'your shared secret';
	$api->sharedSecret = $this -> sharedSecret;
	//set the api path
	$api->apiPath = 'https://bdphq.com/restapi';


	//set the firm id
	$api->accId = $this -> accId;
	$api->forceInsecure = true;
	//start the api client
	$api->startUp();

	if($_SESSION['bdSessId']){
		$api->bdSessId = $_SESSION['bdSessId'];
	}



	//echo $this->output;

	//set the api to the plugin
	$this->api = $api;

	$snippetEndTime = microtime(true);
	$totalSnippetTime = $snippetEndTime - $snippetStartTime;
	//$display .= 'Snippet Time: '. $totalSnippetTime .' milliseconds.';
	//$display .= 'API Time: '. $apiTimeTaken .' millisecopnds';

	if(array_key_exists($this->mode,$this->modeMap)){
		$this->modeData = $this->modeMap[$this->mode];
		//run the mode function
		if(method_exists($this,$this->modeData['func'])){
			//echo $this->mode;
			$func = $this->modeData['func'];
			$display = $this->$func();
		}

	}


	 return $display;
}


/**
 * applies standard logic to a property
*/
function applyLogic($prop){

	$prop['detailPath'] = $this->detailPageId . '?prop='. $prop['property_id'];
	$prop['pType'] = $prop['typeNames'][0];
	$prop['homeResTitle'] = $prop[$this->homeResTitle];
	$prop['imgPath'] = $prop['imagePath'];
	$prop['featured'] = $prop['featured'];
	$prop['closingDate'] = $prop['stats']['closingDate'];
	$prop['bedRoomsLabel'] = 'Bedrooms';
	if($prop['lDateAvailable']){
		//echo '<div style="display:none">'.$prop['lDateAvailable'].'</div>';
		$prop['lDateAvailable'] += 3600;
		$prop['lDateAvailable'] = date('d/m/Y', $prop['lDateAvailable']);
	}
	if($prop['hrValue']){
		$prop['hrValue'] = number_format($prop['hrValue']);
	}


	if($prop['parkingType']){
		$prop['parkingType'] = $prop['parkingType'];
		if ($prop['parkingType'] == "No Parking"){
			$prop['parkingType'] = '';
		}
	}else{
		$prop['parkingType'] = '';
	}

	if($prop['closingDateFormat']){
		$prop['closingDateFormat'] = $prop['closingDateFormat'];
			}else{
		$prop['closingDateFormat'] = '';
	}


	//echo "making url with id: ". $this->detailPageId;
	if (strpos($prop['summaryText'], 'UNDER OFFER') !== false) {
			 $prop['summaryText'] = str_replace("UNDER OFFER","UNDER OFFER ", $prop['summaryText']);
			}
    if (strlen($prop['summaryText']) > 180) {
        //limit hit!
        $prop['summaryText'] = substr($prop['summaryText'],0,180);

            //stop on a word.
            $prop['summaryText'] = substr($prop['summaryText'],0,strrpos($prop['summaryText'],' ')).'...';


    }




	return $prop;
}

/**
 * applies detailed logic to the property
*/
function applyDetailLogic($prop){

	//run map logic
	$prop = $this->parseMapData($prop);
	$prop['imgPath'] = $prop['imagePath'];
	//set the rooms
	$prop['roomText'] = '';
	//if the property has rooms, create the room text
	if(is_array($prop['rooms'])){
		foreach($prop['rooms'] as $room){
			$feetWidth = $this->metersToFeetInches($room['roomWidth']);
			$feetLength = $this->metersToFeetInches($room['roomLength']);
			$room['roomDimensions'] = (is_numeric($room['roomWidth']) && is_numeric($room['roomLength']) ? '('. number_format($room['roomWidth'],2,'.',',') .'m x '. number_format($room['roomLength'],2,'.',',') .'m / '. $feetWidth['feet'] ."'".$feetWidth['inches'] .'" x '. $feetLength['feet'] ."'".$feetLength['inches'] .'")' : '');

			$prop['roomText'] .= $this->processModeTpl($this->roomTpl,'roomTpl',$room);

		}
	}

	if($prop['featureList']){

		$data = '<ul>'.$prop['featureList'].'</ul>';
		$dom = new DOMDocument();
		$dom->loadHTML($data);
		$featureList = $dom->getElementsByTagName('ul');
		$initialitem = $featureList->item(0)->getElementsByTagName('li')->item(0)->nodeValue;
		//$initialitem = utf8_encode ($initialitem);
		//$initialitem = mb_convert_encoding($initialitem, "HTML-ENTITIES", "UTF-8");
		$initialitem = str_replace("â", "'", $initialitem);

		$prop['initialfeatureList'] = $initialitem;
	}

	$prop['landlordRefNo'] = '';
	if(is_array($prop['ownerDetailsSimple'])){
		$prop['landlordRefNo'] = $prop['ownerDetailsSimple']['landlordRefNo'];
	}


	if($prop['parkingType']){
		$prop['parkingType'] = $prop['parkingType'];
	}else{
		$prop['parkingType'] = '';
	}

	if($prop['closingDateFormat']){
		$prop['closingDateFormat'] = $prop['closingDateFormat'];
			}else{
		$prop['closingDateFormat'] = '';
	}

	if($prop['gardenType']){
		$prop['gardenType'] = $prop['gardenType'];
	}else{
		$prop['gardenType'] = '';
	}



		$prop['smokersConsidered'] = ($prop['smokersConsidered'] ? 'Yes' : 'No');
		$prop['petsAllowed'] = ($prop['petsAllowed'] ? 'Yes' : 'No');
		$prop['hmoLicence'] = ($prop['hmoLicence'] ? 'Yes' : 'No');
		$prop['benefitConsidered'] = ($prop['benefitConsidered'] ? 'Yes' : 'No');



	//parse the negotiator
	$negotiator = $prop['staffData']['negDetails'];
	$negotiator['proPicParsed'] = ($negotiator['proPic'] ? $this->bdpUrl .'?bdimg='. $negotiator['proPic'] .'&'. $this->proPicParams.'&fname='. $negotiator['proPic'] : '');


	foreach($negotiator as $key => $negParts){
		$prop['staffNeg_'.$key] = $negParts;
	}

	//check first for the espc home report id
	if($prop['escpHrId']){
		//set espc frame to true, a fancy box will appear containing the espc frame
		$prop['hrEspcFrame'] = true;
		$prop['hrPath'] = 'https://memberportal.espc.com/HomeReports/RequestHomeReport.aspx?id='. $prop['escpHrId'];
	}
	elseif($prop['espcId']){
		//set espc tab to true, the home report button will open a new tab, no fancybox
		$prop['hrEspcTab'] = true;
		$prop['hrPath'] = 'http://www.espc.co.uk/Buying/'. $prop['espcId'] .'/requestHomeReport.html';
	}
	else{
		//if neither the espc id or the homereport id ref are available use the custom in-house form
		$prop['hrBasic'] = true;
	}


	//set the image carousel
	//$prop = $this->grabDetailImages($prop);
	foreach($prop['images'] as $key => $image){
		if(is_array($this->imgTpls)){
			foreach($this->imgTpls as $imgKey => $imgTpl){
				$nameParts = explode ('.',$imgTpl);

				$useChunk = ((count($nameParts) > 1) ? false : true);

				if(!array_key_exists($imgKey,$prop)){
					$prop[$imgKey] = '';
				}
				if($useChunk){
					$prop[$imgKey] .= $this->processTpl($imgTpl,'',$image);
				}
				else{
					$prop[$imgKey] .= $this->processTpl('',$imgTpl,$image);
				}

			}
			//echo $imgKey .' :: '. $imgTpl;
		}
		else{
			if(!array_key_exists('imgString',$prop)){
				$prop['imgString'] = '';
			}

			$prop['imgString'] .= $this->processTpl('','imgstring.html',$image);
		}
	}

    $prop['video'] = $prop['video'];


	//exit;
	//var_dump($prop); exit;

	//set the form handler url
	$prop['formHandlePath'] = $this->enqDocId;
	return $prop;
}


/**
 * parses map data for a property
*/
function parseMapData($prop){
	//set the default map data


	$mapData = array(

		'mapZoom'=>$this->defaultMapZoom,
		'mapCentreLat'=>$prop['lat'],
		'mapCentreLng'=>$prop['lng'],
		'markerLat'=>$prop['lat'],
		'markerLng'=>$prop['lng'],
		'sViewLat'=>$prop['lat'],
		'sViewLng'=>$prop['lng'],
		'sViewZoom'=>$this->defaultStreetViewZoom,
		'sViewHeading'=>$this->defaultStreetViewHeading,
		'sViewPitch'=>$this->defaultStreetViewPitch,
		'mapType'=>$this->defaultMapType,



		);

	//grab the stored map data
	$storedData = json_decode($prop['mapData'],true);
	$storedData = (is_array($storedData) ? $storedData : array());
	//merge the map arrays
	$outputMapData = array_merge($mapData,$storedData);
	$processedMapData = array();
	foreach($outputMapData as $key=>$data){
		$processedMapData[$key] = ($key == 'mapType' ? strtoupper($data) : floatval($data));
	}

	//convert the output array back in to json for output
	$prop['outputMapDataString'] = json_encode($processedMapData);

	return $prop;
}

/**
 * viewing request logic and form
*/
function viewingRequest(){
	if(isset($_POST['formData'])){

		//setup the request data
		$rData = array(
			'propertyId'=>$this->currentRef,
			'createdDate'=>time(),
			'viewingRequested'=>true,
			'message'=>$_POST['message'],
			'contactData'=>array(
				'firstName'=>$_POST['firstName'],
				'lastName'=>$_POST['lastName'],
				'tel1'=>$_POST['tel'],
				'email'=>$_POST['email'],
			)
		);

		//run the api request
		$this->api->newRequest($rData);

		$modalOutput = $this->processTpl('','thanks.html',array());
		//send a success message to the user
		$this->jsonEcho($modalOutput);
	}
}

/**
 * handles detail requests
*/
function detailRequest(){
	if(isset($_POST['formData'])){

         date_default_timezone_set('Europe/London');
		$requestDate = date('d M Y H:i:s O');
		//setup the request data

		$rData = array(
			'propertyId'=>$this->currentRef,
			'createdDate'=>$requestDate,
			'detailsRequested'=>true,
			'message'=>$_POST['message'],
			'contactData'=>array(
				'firstName'=>$_POST['firstName'],
                'lastName'=>$_POST['lastName'],
				'tel1'=>$_POST['tel1'],
				'email'=>$_POST['email'],
			)
		);

		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6LdPnUMUAAAAALUGGTYbVAHSDPzqlX0riw7b6B1p';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):

		$decoy = $_POST['comments'];
		if(!$decoy):



		//run the api request
		//$this->api->newRequest($rData);

		$modalOutput = $this->processTpl('','thanks.html',array());

		//send a success message to the user
		$this->ajaxEcho($modalOutput);

		endif;


		else:
        $errMsg = 'Robot verification failed, please try again.';
        endif;

		else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    	endif;
	}
}

/**
 * handles send friend requests
*/
function sendFriendRequest(){


	if(isset($_POST['formData'])){

		date_default_timezone_set('Europe/London');
		$requestDate = date('d M Y H:i:s O');
        //setup the request data

		$rData = array(
			'propertyId'=>$this->currentRef,
			'createdDate'=>$requestDate,
			'sendFriend'=>true,
			'message'=>$_POST['message'],
			'friendData'=>array(
            'name'=>$_POST['friendsName'],
			'email'=>$_POST['friendsEmail'],
			),
			'contactData'=>array(
			'firstName'=>$_POST['firstName'],
				//'firstName'=>$_POST['lastName'],
				//'tel1'=>$_POST['tel'],
			'email'=>$_POST['email'],
			)
		);


		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6LdPnUMUAAAAALUGGTYbVAHSDPzqlX0riw7b6B1p';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):

		$decoy = $_POST['comments'];
		if(!$decoy):
		//run the api request
		//$this->api->newRequest($rData);

		$modalOutput = $this->processTpl('','thanks.html',array());

		//send a success message to the user
		$this->ajaxEcho($modalOutput);

		endif;


		else:
        $errMsg = 'Robot verification failed, please try again.';
        endif;

		else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    	endif;






	}
}

/**
 * viewing request logic and form
*/

function hReport(){
	if(isset($_POST['formData'])){

		//setup the request data
		$rData = array(
			'propertyId'=>$this->currentRef,
			'createdDate'=>date('m M Y H:i:s O'),
			'hrRequest'=>true,
			'message'=>$_POST['message'],
			'contactData'=>array(
				'firstName'=>$_POST['firstName'],
				'lastName'=>$_POST['lastName'],
				'tel1'=>$_POST['tel1'],
				'email'=>$_POST['email'],
			)
		);

		//run the api request
		$this->api->newRequest($rData);


		$modalOutput = $this->processTpl('','thanks.html',array());
		//send a success message to the user
		$this->jsonEcho($modalOutput);
	}
}

/**
 * viewing request logic and form
*/
function matchRequest(){


	if(isset($_POST['formData'])){

/*			$districtstring = $_POST['districtoptions'];
			$districtstring = str_replace('\\','',$districtstring);
			$districtstring2 = explode('","' , $districtstring);

		foreach($districtstring2 as $key=>$value){
 		$districtstring2[$key]=str_replace('"','',$value);

}*/




       //date_default_timezone_set('Europe/London');
		//$requestDate = date('d M Y H:i:s O');
        //setup the request data
		$rData = array(
			'propertyId'=>0,
			'createdDate'=>date('m M Y H:i:s O'),
			'viewingRequested'=>false,
			'detailsRequested'=>false,
			'hrRequest'=>false,
			'sendOtherData'=>true,
			'message'=>$_POST['message'],
			'contactData'=>array(
				'firstName'=>$_POST['firstName'],
				'lastName'=>$_POST['lastName'],
        'tel1'=>$_POST['tel1'],
				'email'=>$_POST['email'],
			),
			'buyingData'=>array(
				'transType' => $_POST['transType'],
				'minPrice' => $_POST['minPrice'],
				'maxPrice' => $_POST['maxPrice'],
				'bedRoomsMin' => $_POST['bedRoomsMin'],
				//'districts' => $districtstring2,
				'districts' => array($_POST['districts']),
				'propertyTypes' => array($_POST['propertyTypes']),
			)
		);

		//run the api request
		$this->api->newRequest($rData);

		$modalOutput = $this->processTpl('','thanks.html',array());
		//send a success message to the user
		$this->jsonEcho($modalOutput);
	}
}






/**
 * runs the search form stuff
*/
function searchForm(){


	//set the form fields


	$this->searchParams = array();
	//create the search params
	foreach($_GET as $key => $sParam){
		$this->searchParams[$key] = array(
			'Value'=>$sParam
		);
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Sale Price Options
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//set the price array
	$priceArr = explode(',',$this->salePriceOptions);
	//loop the array and create the options - min then max
	$this->minPriceOptionsSale = '';
	$this->maxPriceOptionsSale = '';

	foreach($priceArr as $price){
		$selected = false;
		$doBreak = false;
		if($this->searchParams['pricefrom']['Value'] == $price){
			$selected = true;
		}
		if($price > $this->maxSalePrice){
			$doBreak = true;
		}
		$this->minPriceOptionsSale .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}

	$maxSet = false;
	$priceTiers = count($priceArr);
	$pI = 0;
	//max price options
	foreach($priceArr as $price){
		$pI++;
		$selected = false;
		$doBreak = false;
		if(($this->searchParams['priceto']['Value'] == $price) && $price){
			$maxSet = true;
			$selected = true;
			//echo "selecting 1";
		}
		if($price > $this->maxSalePrice){
			$doBreak = true;
			if(!$maxSet){
				//echo "selecting 2";
				$selected = true;
			}
		}
		if(($pI >= $priceTiers) && !$maxSet){
			$selected = true;
		}
		//echo $price .' :: '. $selected ."\n";
		$this->maxPriceOptionsSale .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Let Price Options
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//set the price array
	$priceArr = explode(',',$this->letPriceOptions);
	//loop the array and create the options - min then max
	$this->minPriceOptionsLet = '';
	$this->maxPriceOptionsLet = '';

	foreach($priceArr as $price){
		$selected = false;
		$doBreak = false;
		if($this->searchParams['pricefrom']['Value'] == $price){
			$selected = true;
		}
		if($price > $this->maxLetPrice){
			$doBreak = true;
		}
		$this->minPriceOptionsLet .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}


	$maxSet = false;
	$priceTiers = count($priceArr);
	$pI = 0;
	//max price options
	foreach($priceArr as $price){
		$pI++;
		$selected = false;
		$doBreak = false;
		if(($this->searchParams['priceto']['Value'] == $price) && $price){
			$maxSet = true;
			$selected = true;
			//echo "selecting 1";
		}
		if($price > $this->maxLetPrice){
			$doBreak = true;
			if(!$maxSet){
				//echo "selecting 2";
				$selected = true;

			}
		}
		if(($pI >= $priceTiers) && !$maxSet){
			$selected = true;

		}
		//echo $price .' :: '. $selected ."\n";
		$this->maxPriceOptionsLet .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$this->minBedOptions = '';
	$this->maxBedOptions = '';

	//set the bedroom dropdowns (min then max)
	for($i=0;$i<$this->bedRoomsMax+1;$i++){
		$selected = false;
		if($this->searchParams['bedRoomsMin']['Value'] == $i){
			$selected = true;
		}
		if($i == 0){
			$this->minBedOptions .= $this->optionField($i,'Any',$selected);
		}

		else{
		$this->minBedOptions .= $this->optionField($i,$i.'+',$selected);
		}
	}
	$maxSet = false;
	for($i=0;$i<$this->bedRoomsMax+1;$i++){
		$selected = false;
		if(($this->searchParams['bedRoomsMax']['Value'] == $i) && $i){
			$maxSet = true;
			$selected = true;
		}
		if(($i == $this->bedRoomsMax) && (!$maxSet)){
			$selected = true;
		}
		$this->maxBedOptions .= $this->optionField($i,$i,$selected);
	}


	$this->pTypeOptions = '';
	//property type options


	foreach($this->pTypeArr as $option){
		$selected = false;
		if($this->searchParams['property_type']['Value'] == $option['value']){
			$selected = true;
		}
		$this->pTypeOptions .= $this->optionField($option['value'],$option['label'],$selected);
	}



	$this->radOptions = '';
	//set radius options


	foreach($this->rOptionArr as $option){
		$selected = false;
		if($this->searchParams['lrad']['Value'] == $option['value']){
			$selected = true;
		}
		$this->radOptions .= $this->optionField($option['value'],$option['label'],$selected);
	}


		//check keyword search value from querystring

	if (isset($_REQUEST['keysearch']))
	{
		$keysearch_Value = str_replace('_', ' ', $_GET['keysearch']);
	  $this->keysearch_Value = $keysearch_Value;
	   if(empty($_REQUEST['keysearch']))
	   {
		$this->keysearch_Value = '';
	   }
	}


			//check location search value from querystring

	if (isset($_REQUEST['ls']))
	{
	  $this->location_Value = $_GET['ls'];
	   if(empty($_REQUEST['ls']))
	   {
		$this->location_Value = '';
	   }
	}

			//check under offer exlcusion search value from querystring

	if (isset($_REQUEST['nv']))
	{
	  $this->nv_Value = $_GET['nv'];
	   if(empty($_REQUEST['nv']))
	   {
		$this->nv_Value = '';
	   }
	   else{
		  $this->nv_Value = 'checked';
	   }

	}else{
		$this->nv_Value = 'checked';
	}


			//check min price search value from querystring

	if (isset($_REQUEST['pricefrom']))
	{
	  $this->minprice_Value = $_GET['pricefrom'];
	   if(empty($_REQUEST['pricefrom']))
	   {
		$this->minprice_Value = '0';
	   }
	}

	else{
		$this->minprice_Value = '0';
	}

		//check max price search value from querystring

	if (isset($_REQUEST['priceto']))
	{
	  $this->maxprice_Value = $_GET['priceto'];
	   if(empty($_REQUEST['priceto']))
	   {
		$this->maxprice_Value = $this-> maxSalePrice;
	   }
	}else{
		$this->maxprice_Value = $this-> maxSalePrice;
	}


	if(isset($_POST['enqtype'])){

		if($_POST['enqtype'] == 'matchRequest'){
			$this->matchRequest();
		}
	}



	//integrate the outer template
	$display = $this->processModeTpl($this->tpl,'tpl',array(
		'keysearch_Value'=>$this->keysearch_Value,
		'location_Value'=>$this->location_Value,
		'minprice_Value'=>$this->minprice_Value,
		'maxprice_Value'=>$this->maxprice_Value,
		'minprice_ValueNo'=>  number_format($this->minprice_Value),
		'maxprice_ValueNo'=> number_format($this->maxprice_Value),
		'minPriceOptionsSale'=>$this->minPriceOptionsSale,
		'maxPriceOptionsSale'=>$this->maxPriceOptionsSale,
		'minPriceOptionsLet'=>$this->minPriceOptionsLet,
		'maxPriceOptionsLet'=>$this->maxPriceOptionsLet,
		'minBedOptions'=>$this->minBedOptions,
		'maxBedOptions'=>$this->maxBedOptions,
		'pTypeOptions'=>$this->pTypeOptions,
		'radOptions'=>$this->radOptions,
		'nv_Value'=>$this->nv_Value,
		//'formActionPath'=>$this->modx->makeUrl($this->resPageId,'','','full'),
		'formActionPathSales'=>$this->resPageIdSales,
		'formActionPathMap'=>$this->resPageIdMap,
		//'formActionPathLettings'=>$this->modx->makeUrl($this->resPageIdLettings,'','','full')
		'formActionPathLettings'=>$this->resPageIdLettings,

	));

	return $display;
}


/**
 * converts meters to feet
*/
function metersToFeetInches($meters){

	$valInFeet = $meters*3.2808399;
	$valFeet = (int)$valInFeet;
	$valInches = round(($valInFeet-$valFeet)*12);
	if($valInches == 12){
		$valFeet = $valFeet + 1;
		$valInches = 0;
	}
	return array(
		'feet'=>$valFeet,
		'inches'=>$valInches
	);
}


/**
 * outputs an option field
*/
function optionField($value='',$label='',$selected=false){
	return '<option value="'. $value .'" '. ($selected ? 'selected = "selected"' : '') .'>'. $label .'</option>';
}


/*
 * prepares a number or string as a currency string
 * @param $val string the cutrrency string or number
 * @param $decPlaces int the num,ber of decimal places to show, default is 2
*/
function prepareCurrency($val=0,$decPlaces = 2){
	$val = floatval(preg_replace("[^-0-9\.]","",$val));
	$val = number_format($val,$decPlaces,'.',',');
	$display = ($this->cSymbolPosition == 'pre' ? $this->currencySymbol : '') . $val . ($this->cSymbolPosition == 'post' ? $this->currencySymbol : '');
	return $display;
}


/**
 * processes a tpl based on a mode
*/
function processModeTpl($tpl,$tplKey,$data){

	return $this->processTpl($tpl,$this->modeData[$tplKey],$data);

}

/**
 * processes the templates and checks for a fallback 'default' alternative
*/
function processTpl($tpl,$tplFile,$data){
	if($tpl){
		$display = $this->modx->getChunk($tpl,$data);
	}
	elseif($tplFile){
		$content = false;
		//echo 'File: '. $this->modeData[$tplKey];
		$content = file_get_contents(BDP_PLUGIN_DIR . $this->defTplPath . $tplFile);
		//$contents = file_get_contents(BDP_PLUGIN_DIR . $this->defTplPath . "test.php");
		//echo "$contents";

		$display = $content;
	}
	//var_dump($data['pTypeOptions']);


	// add curly braces to keys to correspond with template placeholders
     if(is_array($data)){
	foreach ($data as $key => $val) {
    $data['{'.$key .'}'] = $val;
    unset($data[$key]);
	}

	// replace template values with data
	$find       = array_keys($data);
	$replace    = array_values($data);
	$display = str_replace($find, $replace, $content);

     }

	// test output of data
	/*foreach($data as $key => $item){
 		 print  "<strong>" . $key . "</strong>:<br> " . $item . "<br><br>";
	}*/

	return $display;

}


/*function radians($deg) {
  	return $deg * M_PI / 180;
	}*/

################################################################################################################
### Specific Mode Functions
################################################################################################################
/**
 * outputs standard search results
*/
function searchResults(){

	//grab the default search params (set in the snippet call)
	$callParams = $this->qStrArr($this->searchParams);

	//default params as set by default for a home output
	$defaultParams = $this->qStrArr($this->modeData['searchParams']);
	//merge the call params with the default params
	$defaultParams = array_merge($defaultParams,$callParams);
	//set the get parameters
	$getParams = $_GET;

	$soldonly = false;
	if(isset($_GET["stype"])){
	$stype=$_GET["stype"];
	if($stype == 'sold'){
	$soldonly = true;
	$getParams['nv'] = '';
	$getParams['nres'] = 'all';
	}
	}

	$mapsearch = false;
	if(isset($_GET["msearchrad"])){
		$mapsearch = true;
		$getParams['nres'] = 'all';
		//$getParams['nv'] = 'on';
		//echo "mapsearch";
	}

	//merge the get parameters with the default paramaters
	$params = array_merge($defaultParams,$getParams);



	//set the results numbers
	$nres = ($defaultParams['nres'] ? $defaultParams['nres'] : 5);

	if(isset($_POST['startRow'])){
		$page = ceil($_POST['startRow']/$nres)+1;
		$params['resgroup'] = $page;
	}

	unset($params['q']);





	//put the query string back together
	$qString = $this->arrQStr($params);

	//grab all property data with an askig price over 600k
	$preTime = microtime(true);
	$props = $this->api->getProperties($qString);

	//var_dump($props['nRes']);



	$postTime = microtime(true);

	$apiTimeTaken = $postTime - $preTime;

					$msearchrad = $_GET['msearchrad'];
					$mcenterlat = $_GET['mcenterlat'];
					$mcenterlng = $_GET['mcenterlng'];


	//$display = 'API Time: '. $timeTaken .' seconds.';

    $resultsOutput = '';


    //var_dump($props['properties']);

	//echo 'template: '. $this->tmp;
	if(is_array($props['properties'])){


			if($params['random']){
			$noprops = count($props['properties']);
			$getrandom = rand(0, $noprops-1);

			do {
  				$getrandom2 = rand(0, $noprops-1);
				} while ($getrandom == $getrandom2);
				do {
  				$getrandom3 = rand(0, $noprops-1);
				} while ($getrandom == $getrandom3 || $getrandom2 == $getrandom3);


			}

		$soldRes = 0;
		$propRes = 0;
		foreach($props['properties'] as $key => $prop){
			if($params['random']){
				if($getrandom == $key || $getrandom2 == $key|| $getrandom3 == $key){

				$prop = $this->applyLogic($prop);

			//$display .= $key .'_'. $prop['streetName'];
			$resultsOutput .= $this->processModeTpl($this->tpl,'tpl',$prop);
			}
			}else{
            /*if(in_array($prop['property_id'] , $featuredproplist)){
           $prop['featured'] = 'true';
			}*/
			// exclude temp withdrawn
			if($prop['statusId'] != '296'){



			//run logic on the property
			$prop = $this->applyLogic($prop);

			//$display .= $key .'_'. $prop['streetName'];

			//check if only showing sold properties
			if($soldonly){



			if($prop['statusId'] == '167' || $prop['statusId'] == '423' || $prop['statusId'] == '197' ){

				echo '<p style="display:none">' . $prop['statusId'] . '/'. $prop['sellingStatus'] .'</p>';

			$soldRes++;

			$resultsOutput .= $this->processModeTpl($this->tpl,'tpl',$prop);

			}
			}else{

				if($mapsearch){
					//$resultsOutput = "mapsearch";
					//$props['nRes'] = 0;

					$proplat = $prop['lat'];
					$proplng = $prop['lng'];

				/*	echo $proplat;
					echo $proplng;

					echo $mcenterlat;
					echo $mcenterlng;
					echo $msearchrad . '<br><br>';*/


//1 radian = 3959;
$distance = 3959 * acos(cos(deg2rad($mcenterlat)) * cos(deg2rad($proplat)) * cos(deg2rad($proplng) - deg2rad($mcenterlng)) + sin(deg2rad($mcenterlat)) * sin(deg2rad($proplat)));


    if ($distance < $msearchrad) {
		//var_dump($prop['dispAddress']);
		$propRes++;
		$resultsOutput .= $this->processModeTpl($this->tpl,'tpl',$prop);
	}
				}else{

			$resultsOutput .= $this->processModeTpl($this->tpl,'tpl',$prop);
				}
			}
			if($soldonly){
			$props['nRes'] = $soldRes;

			}

			if($mapsearch){
			$props['nRes'] = $propRes;

			}
			}
			}

		}
	}
	else{
		$resultsOutput .='Results could not be parsed';
	}



	//define paging or lazyloading

	$pagingOutput = '';



	if($this -> lazyLoadingActive){

		// set up lazy loading

	if(isset($_POST['lazyLoadRes'])){

		if($props['nRes'] <= $nres){
			$resultsOutput = '';
		}



		$this->ajaxEcho($resultsOutput);
	}
	}
	else{

		// set up pagination


		$numResults =  $props['nRes'];
		$resultsPerPage = $params['nres'];

		if($numResults){



		if($resultsPerPage == 'all'){
			$resultsPerPage = $numResults;
		}
		$totalPages = ceil($numResults/$resultsPerPage);
		$currentPage = $params['resgroup'];
		if(!$currentPage){
			$currentPage = 1;
		}


		$nextPage = $currentPage + 1;
		$prevPage = $currentPage - 1;



		$currMin = ((round(($currentPage+4/2)/5)*5) - $resultsPerPage);
		$currMax = round(($currentPage+4/2)/5)*5;




		if($nextPage > $totalPages){
			$disablenext = 'disabled';
		}

		if($prevPage < 1){
			$disableprev = 'disabled';
		}

		$pagePath =  '?'. str_replace('&resgroup='.$_GET['resgroup'], '', $_SERVER['QUERY_STRING']);

		$pagingOutput =  '<div class="pagination"><ul class="center-list center-text">';
		$pagingOutput .=  '<li class="p-first"><a href="'. $pagePath .'&resgroup=1"></a></li>';
		$pagingOutput .=  '<li class="'. $disableprev .' p-prev"><a href="'. $pagePath .'&resgroup=' . $currentPage .'"></a></li>';

		for($r = 1; $r <= $totalPages; $r++){
				if($r == $currentPage){
				$current[$r] = 'active current';
			}

			if($r > $currMin && $r <= $currMax){
				$pagingOutput .= '<li class="'.$current[$r].'"><a href="'. $pagePath .'&resgroup=' . $r . '">'  . $r .  '</a></li>';
			}

		}

		$pagingOutput .=  '<li class="p-next '. $disablenext .' "><a href="'. $pagePath .'&resgroup=' . $nextPage . '"></a></li>';
		$pagingOutput .=  '<li class="p-last"><a href="'. $pagePath .'&resgroup=' . $totalPages . '"></a></li>';
		$pagingOutput .=  '</ul></div>';

	}


	}
	//put the ordering fields together
	$orderingFields = '';
	if(is_array($this->orderingOptions)){
		foreach($this->orderingOptions as $option){
			//detect if the field is active
			$selected  = false;
			if(isset($params['ord'])){
				if($params['ord'] == $option['value']){
					$selected = true;
				}
			}
			//create the field
			$orderingFields .= '<option value="'. $option['value'] .'" '. ($selected ? 'selected = "selected"' : '') .'>'. $option['label'] .'</option>';
		}
	}
	else{
		$orderingFields .='Results could not be parsed';
	}



	//put the results no. fields together
	$nresultsFields = '';
	if(is_array($this->resultsOptions)){
		foreach($this->resultsOptions as $option){
			//detect if the field is active
			$selected  = false;
			if(isset($params['nres'])){
				if($params['nres'] == $option['value']){
					$selected = true;
				}
			}
			//create the field
			$nresultsFields .= '<option value="'. $option['value'] .'" '. ($selected ? 'selected = "selected"' : '') .'>'. $option['label'] .'</option>';
		}
	}
	else{
		$nresultsFields .='Results could not be parsed';
	}





	//integrate the outer template
	$display = $this->processModeTpl($this->outerTpl,'outerTpl',array(
		'resTotal'=>$props['nRes'],
		'resOutput'=>$resultsOutput,
		'orderingFields'=>$orderingFields,
		'nresultsFields'=>$nresultsFields,
		'lazyLoadingPath'=>$this->enqDocId,
		'pagingOutput' => $pagingOutput,
		'markerURL' => $this->gmapPinPath,
		'gmapStyle' => $this->gmapStyle

	));

	return $display;
}



/**
 * outputs search results for sold properties only
*/
function searchResultsSold(){

	//grab the default search params (set in the snippet call)
	$callParams = $this->qStrArr($this->searchParams);

	//default params as set by default for a home output
	$defaultParams = $this->qStrArr($this->modeData['searchParams']);
	//merge the call params with the default params
	$defaultParams = array_merge($defaultParams,$callParams);
	//set the get parameters
	$getParams = $_GET;
	//merge the get parameters with the default paramaters
	$params = array_merge($defaultParams,$getParams);



	//set the results numbers
	$nres = ($defaultParams['nres'] ? $defaultParams['nres'] : 5);

	if(isset($_POST['startRow'])){
		$page = ceil($_POST['startRow']/$nres)+1;
		$params['resgroup'] = $page;
	}

	unset($params['q']);




	//put the query string back together
	$qString = $this->arrQStr($params);

	//grab all property data with an askig price over 600k
	$preTime = microtime(true);
	$props = $this->api->getProperties($qString);

	$postTime = microtime(true);

	$apiTimeTaken = $postTime - $preTime;




	//$display = 'API Time: '. $timeTaken .' seconds.';

    $resultsOutput = '';


	//echo 'template: '. $this->tmp;
	if(is_array($props['properties'])){


		foreach($props['properties'] as $key => $prop){

 		$prop['featured'] = '';

			// exclude temp withdrawn
			if($prop['statusId'] == '165' || $prop['statusId'] == '197' ){

			//run logic on the property
			//$prop = $this->applyLogic($prop);

			//$display .= $key .'_'. $prop['streetName'];
			$resultsOutput .= $this->processModeTpl($this->tpl,'tpl',$prop);

			}

		}
	}
	else{
		$resultsOutput .='Results could not be parsed';
	}



	//define paging or lazyloading

	$pagingOutput = '';



	if($this -> lazyLoadingActive){

		// set up lazy loading

	if(isset($_POST['lazyLoadRes'])){

		if($props['nRes'] <= $nres){
			$resultsOutput = '';
		}



		$this->ajaxEcho($resultsOutput);
	}
	}
	else{

		// set up pagination


		$numResults =  $props['nRes'];
		$resultsPerPage = $params['nres'];

		if($numResults){



		if($resultsPerPage == 'all'){
			$resultsPerPage = $numResults;
		}
		$totalPages = ceil($numResults/$resultsPerPage);
		$currentPage = $params['resgroup'];
		if(!$currentPage){
			$currentPage = 1;
		}


		$nextPage = $currentPage + 1;
		$prevPage = $currentPage - 1;



		$currMin = ((round(($currentPage+4/2)/5)*5) - $resultsPerPage);
		$currMax = round(($currentPage+4/2)/5)*5;




		if($nextPage > $totalPages){
			$disablenext = 'disabled';
		}

		if($prevPage < 1){
			$disableprev = 'disabled';
		}

		$pagePath =  '?'. str_replace('&resgroup='.$_GET['resgroup'], '', $_SERVER['QUERY_STRING']);

		$pagingOutput =  '<div class="pagination"><ul class="center-list center-text">';
		$pagingOutput .=  '<li class="p-first"><a href="'. $pagePath .'&resgroup=1"></a></li>';
		$pagingOutput .=  '<li class="'. $disableprev .' p-prev"><a href="'. $pagePath .'&resgroup=' . $currentPage .'"></a></li>';

		for($r = 1; $r <= $totalPages; $r++){
				if($r == $currentPage){
				$current[$r] = 'active current';
			}

			if($r > $currMin && $r <= $currMax){
				$pagingOutput .= '<li class="'.$current[$r].'"><a href="'. $pagePath .'&resgroup=' . $r . '">'  . $r .  '</a></li>';
			}

		}

		$pagingOutput .=  '<li class="p-next '. $disablenext .' "><a href="'. $pagePath .'&resgroup=' . $nextPage . '"></a></li>';
		$pagingOutput .=  '<li class="p-last"><a href="'. $pagePath .'&resgroup=' . $totalPages . '"></a></li>';
		$pagingOutput .=  '</ul></div>';

	}


	}
	//put the ordering fields together
	$orderingFields = '';
	if(is_array($this->orderingOptions)){
		foreach($this->orderingOptions as $option){
			//detect if the field is active
			$selected  = false;
			if(isset($params['ord'])){
				if($params['ord'] == $option['value']){
					$selected = true;
				}
			}
			//create the field
			$orderingFields .= '<option value="'. $option['value'] .'" '. ($selected ? 'selected = "selected"' : '') .'>'. $option['label'] .'</option>';
		}
	}
	else{
		$orderingFields .='Results could not be parsed';
	}



	//put the results no. fields together
	$nresultsFields = '';
	if(is_array($this->resultsOptions)){
		foreach($this->resultsOptions as $option){
			//detect if the field is active
			$selected  = false;
			if(isset($params['nres'])){
				if($params['nres'] == $option['value']){
					$selected = true;
				}
			}
			//create the field
			$nresultsFields .= '<option value="'. $option['value'] .'" '. ($selected ? 'selected = "selected"' : '') .'>'. $option['label'] .'</option>';
		}
	}
	else{
		$nresultsFields .='Results could not be parsed';
	}





	//integrate the outer template
	$display = $this->processModeTpl($this->outerTpl,'outerTpl',array(
		'resTotal'=>$props['nRes'],
		'resOutput'=>$resultsOutput,
		'orderingFields'=>$orderingFields,
		'nresultsFields'=>$nresultsFields,
		'lazyLoadingPath'=>$this->enqDocId,
		'pagingOutput' => $pagingOutput,
		'markerURL' => $this->gmapPinPath,
		'gmapStyle' => $this->gmapStyle

	));

	return $display;
}

/**
 * outputs details page
*/

function detailsPage(){
	//set the property id

	if($this -> setproperty){
		//echo "SET";
		$pId =  $this -> setproperty;
	}
	else{

	$pId = intval($_GET["prop"]);
	}

	$this->currentRef = $pId;



	//check for a request to show the viewing form

	//grab all property data with an askig price over 600k
	$preTime = microtime(true);
	$prop = $this->api->getProperty($pId);

	//var_dump($prop);
	//--------------------------------

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Sale Price Options
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//set the price array
	$priceArr = explode(',',$this->salePriceOptions);
	//loop the array and create the options - min then max
	$this->minPriceOptionsSale = '';
	$this->maxPriceOptionsSale = '';

	foreach($priceArr as $price){
		$selected = false;
		$doBreak = false;
		if($this->searchParams['pricefrom']['Value'] == $price){
			$selected = true;
		}
		if($price > $this->maxSalePrice){
			$doBreak = true;
		}
		$this->minPriceOptionsSale .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}

	$prop['minPriceOptionsSale'] = $this->minPriceOptionsSale;

	$maxSet = false;
	$priceTiers = count($priceArr);
	$pI = 0;
	//max price options
	foreach($priceArr as $price){
		$pI++;
		$selected = false;
		$doBreak = false;
		if(($this->searchParams['priceto']['Value'] == $price) && $price){
			$maxSet = true;
			$selected = true;
			//echo "selecting 1";
		}
		if($price > $this->maxSalePrice){
			$doBreak = true;
			if(!$maxSet){
				//echo "selecting 2";
				$selected = true;
			}
		}
		if(($pI >= $priceTiers) && !$maxSet){
			$selected = true;
		}
		//echo $price .' :: '. $selected ."\n";
		$this->maxPriceOptionsSale .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}

	$prop['maxPriceOptionsSale'] = $this->maxPriceOptionsSale;

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Let Price Options
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//set the price array
	$priceArr = explode(',',$this->letPriceOptions);
	//loop the array and create the options - min then max
	$this->minPriceOptionsLet = '';
	$this->maxPriceOptionsLet = '';

	foreach($priceArr as $price){
		$selected = false;
		$doBreak = false;
		if($this->searchParams['pricefrom']['Value'] == $price){
			$selected = true;
		}
		if($price > $this->maxLetPrice){
			$doBreak = true;
		}
		$this->minPriceOptionsLet .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}

	$prop['minPriceOptionsLet'] = $this->minPriceOptionsLet;

	$maxSet = false;
	$priceTiers = count($priceArr);
	$pI = 0;
	//max price options
	foreach($priceArr as $price){
		$pI++;
		$selected = false;
		$doBreak = false;
		if(($this->searchParams['priceto']['Value'] == $price) && $price){
			$maxSet = true;
			$selected = true;
			//echo "selecting 1";
		}
		if($price > $this->maxLetPrice){
			$doBreak = true;
			if(!$maxSet){
				//echo "selecting 2";
				$selected = true;

			}
		}
		if(($pI >= $priceTiers) && !$maxSet){
			$selected = true;

		}
		//echo $price .' :: '. $selected ."\n";
		$this->maxPriceOptionsLet .= $this->optionField($price,$this->prepareCurrency($price,0),$selected);
		if($doBreak){
			break;
		}
	}

	$prop['maxPriceOptionsLet'] = $this->maxPriceOptionsLet;

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$this->minBedOptions = '';
	$this->maxBedOptions = '';

	//set the bedroom dropdowns (min then max)
	for($i=0;$i<$this->bedRoomsMax+1;$i++){
		$selected = false;
		if($this->searchParams['bedRoomsMin']['Value'] == $i){
			$selected = true;
		}
		if($i == 0){
			$this->minBedOptions .= $this->optionField($i,$i.'+',$selected);
		}

		else{
		$this->minBedOptions .= $this->optionField($i,$i,$selected);
		}
	}
	$maxSet = false;
	for($i=0;$i<$this->bedRoomsMax+1;$i++){
		$selected = false;
		if(($this->searchParams['bedRoomsMax']['Value'] == $i) && $i){
			$maxSet = true;
			$selected = true;
		}
		if(($i == $this->bedRoomsMax) && (!$maxSet)){
			$selected = true;
		}
		$this->maxBedOptions .= $this->optionField($i,$i,$selected);
	}

	$prop['minBedOptions'] = $this->minBedOptions;





	//--------------------------------





    //if(is_array($prop)){
		  if(!empty($prop['dispAddress'])){

    //var_dump($prop);

    $prop = $this->parseMapData($prop);
	$prop['markerURL'] = $this->gmapPinPath;
	$prop['gmapStyle'] = $this->gmapStyle;


	$postTime = microtime(true);

	$apiTimeTaken = $postTime - $preTime;

	//run standard logic on the property
	$prop = $this->applyLogic($prop);

	//run detail logic on the property
	$prop = $this->applyDetailLogic($prop);

	if(isset($_POST['enqtype'])){
		$this->prop = $prop;


		if($_POST['enqtype'] == 'sendFriend'){
			$this->sendFriendRequest();
		}

		if($_POST['enqtype'] == 'denquiry'){
			$this->detailRequest();
		}

		if($_POST['enqtype'] == 'viewing'){
			$this->viewingRequest();
		}

		if($_POST['enqtype'] == 'hreport'){
			$this->hReport();
		}

		if($_POST['enqtype'] == 'matchRequest'){
			$this->matchRequest();
		}
	}

	//var_dump($this->tpl);
	//integrate the outer template
	if(!empty($prop['letFurnType'])){

		$display = $this->processModeTpl($this->tpl,'lettpl',$prop);
	}else{
	$display = $this->processModeTpl($this->tpl,'tpl',$prop);
	}

	return $display;

        }

    else{

     if ($this->tpl == 'propmeta.html'){
        $display = $this->processTpl('','nodetails.html','');
	   return $display;
	 }

    }
}

/**
 * outputs details summary
*/
function detailsGet(){
	//set the property id
	$pId = intval($_GET["prop"]);
	$this->currentRef = $pId;
	$prop = $this->api->getProperty($pId);
	$prop['pType'] = $prop['typeNames'][0];




	if(isset($_POST['enqtype'])){
		$this->prop = $prop;


		if($_POST['enqtype'] == 'sendFriend'){
			$this->sendFriendRequest();
		}

		if($_POST['enqtype'] == 'denquiry'){
			$this->detailRequest();
		}

		if($_POST['enqtype'] == 'viewing'){
			$this->viewingRequest();
		}

		if($_POST['enqtype'] == 'hreport'){
			$this->hReport();
		}

		if($_POST['enqtype'] == 'matchRequest'){
			$this->matchRequest();
		}
	}


	//integrate the outer template
	$display = $this->processModeTpl($this->tpl,'tpl',$prop);

	return $display;
}


/**
 * outputs details map
*/
function detailsMap(){
	//set the property id
	$pId = intval($_GET["prop"]);
	$this->currentRef = $pId;
	$prop = $this->api->getProperty($pId);

	//run map logic
	$prop = $this->parseMapData($prop);
	$prop['markerURL'] = $this->gmapPinPath;
	$prop['gmapStyle'] = $this->gmapStyle;

	//integrate the outer template
	$display = $this->processModeTpl($this->tpl,'tpl',$prop);

	return $display;
}

/**
 * form handler function
*/
function formHandler(){
	if(isset($_POST['enqtype'])){
		if($_POST['enqtype'] == 'viewing'){
			$this->viewingRequest();
		}
	}
}




}
?>
