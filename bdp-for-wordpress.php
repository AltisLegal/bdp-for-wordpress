<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
Plugin Name: BDP for WordPress
*/

//  DEFINE OPTIONS
// ============================================================================================

define( 'BDP_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );


//  LOAD EXTERNAL FILES
// ============================================================================================

function load_js_file()
{
	wp_enqueue_script('jquery_validate', '//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js');
	wp_enqueue_script('bdig_js', plugins_url('includes/js/bdig.js',__FILE__) );
	wp_enqueue_script('mustache_js', '//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.8.1/mustache.min.js' );
	wp_enqueue_script('jquery_ui', '//code.jquery.com/ui/1.11.4/jquery-ui.js' );
	//wp_enqueue_script('google_recaptcha', 'https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit' );
	//wp_enqueue_script('google_recaptcha', 'https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit' );


	/*if(is_page('property') or is_page('property-search') or is_page('property-search-map') or is_page('property-details')) {
	wp_enqueue_script('google_maps', "http://www.google.com/jsapi?autoload={'modules':[{name:'maps',version:3,other_params:'sensor=false'}]}" );
	}; */
	/*if(!is_page(26)){
	wp_enqueue_script('google_maps', "http://www.google.com/jsapi?autoload={'modules':[{name:'maps',version:3,other_params:'sensor=false',libraries=geometry}]}" );
}*/
	wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    wp_enqueue_script('bdp_js', plugins_url('includes/js/bdp.wp.core.1.0.0.js?v=1.1',__FILE__));

}

add_action('wp_footer', 'load_js_file');

function load_css()
{

	//wp_enqueue_style('fancybox', plugins_url('includes/fancybox/jquery.fancybox.css',__FILE__) );
	wp_enqueue_style('bdp_skeleton', plugins_url('includes/css/bdp.wp.css.option1.v1.0.0.css?v=1.4',__FILE__) );
	//wp_enqueue_style('ss_pika', plugins_url('includes/css/ss-pika.css',__FILE__) );
	//wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css' );

}

add_action('wp_head', 'load_css');





// OTHER VARIABLES
//========================================================================================




//  DEFINE SHORTCODE
// ============================================================================================

function bdp_func($atts){

$dir = plugin_dir_path( __FILE__ );
$setmode = shortcode_atts( array(
        'mode' => 'results', // set default value if not present in shortcode
		'output' => 'all', // set default value if not present in shortcode
		'property' => '', // set default value if not present in shortcode
    ), $atts );

$mode = $setmode['mode'];
$setoutput = $setmode['output'];
$setproperty = $setmode['property'];
if($mode == 'details'){
switch ($setoutput) {
   		case 'summary':
        $mode = "detailsSummary";
        break;
    	case 'map':
        $mode = "detailsMap";
        break;
		 case 'streetview':
        $mode = "detailsStreetview";
        break;
		case 'description':
        $mode = "detailsDescription";
        break;
		case 'slideshow':
        $mode = "detailsSlideshow";
        break;
		case 'moreinfo':
        $mode = "detailsMoreInfo";
        break;


    default:
        $mode = "details";
}
}



//echo 'Mpode:' .$mode;

///load the bdpconfig options
$apiKey = 'wvghfwsgyifug43798rh4wrkbflvb';
$sharedSecret = '12348564w68gf165regbyu';
$accId = '174'; //CHANGE FOR CLIENT
//$accId = '14';
$detailPageId = '/property/search-property/property-detail/'; //add bdp
$resPageIdSales = '/property/search-property/search-results/'; //add bdp
$resPageIdLettings = '/property/search-property/search-results-lettings/'; //add bdp
$resPageIdMap = '/property/property-search-map/'; //add bdp
$lazyLoadingActive = '';
$gmapPinPath = plugins_url('includes/img/map-marker.png',__FILE__);
$gmapStyle = '[]';


$salePriceOptions = '0,50000,75000,100000,125000,150000,175000,200000,225000,250000,275000,300000,325000,350000,400000,450000,500000,600000,700000,800000,900000,1000000,1250000,1500000,2000000,2500000,3000000,3500000,4000000,4500000,5000000,6000000,7500000,10000000,15000000,20000000,30000000,40000000,50000000,75000000,100000000,150000000';
$letPriceOptions = '0,200,500,750,1000,1250,1500,2000,2500,3000,4000,5000,10000,20000';
$maxSalePrice = '2000000';
$maxLetPrice = '20000';
$pTypeArr = array(
		array(
			'label'=>'Any',
			'value'=>'',
		),
		array(
			'label'=>'Houses',
			'value'=>'46',
		),
		array(
			'label'=>'Flats & Maisonettes',
			'value'=>'47',
		),
		array(
			'label'=>'Garage / Parking',
			'value'=>'83',
		),
		array(
			'label'=>'Bungalows',
			'value'=>'60',
		),
		array(
			'label'=>'Retirement Property',
			'value'=>'84',
		),
		array(
			'label'=>'Land',
			'value'=>'71',
		),
		array(
			'label'=>'Commercial Property',
			'value'=>'70',
		),


	);
$rOptionArr = array(
		array(
			'label'=>'Any',
			'value'=>'0',
		),
		array(
			'label'=>'2 Miles',
			'value'=>'2',
		),
		array(
			'label'=>'5 Miles',
			'value'=>'5',
		),
		array(
			'label'=>'10 Miles',
			'value'=>'10',
		),
		array(
			'label'=>'20 Miles',
			'value'=>'20',
		),
		array(
			'label'=>'50 Miles',
			'value'=>'50',
		),
	);
$bedRoomsMax = '10';
$orderingOptions = array(
	array(
	'label'=>'Highest Price First',
	'value'=>'decprice'
	),
	array(
	'label'=>'Lowest Price First',
	'value'=>'ascprice'
	),
	array(
	'label'=>'Newest to Oldest',
	'value'=>'latest'
	),
);
$resultsOptions = array(
	array(
	'label'=>'12',
	'value'=>'11'
	),
	array(
	'label'=>'24',
	'value'=>'23'
	),
	array(
	'label'=>'36',
	'value'=>'35'
	),
	array(
	'label'=>'All',
	'value'=>'all'
	),
);
$defaultStreetViewZoom = '2';
$defaultStreetViewHeading = '1';
$defaultStreetViewPitch = '0';
$defaultMapType = 'ROADMAP';
$defaultMapZoom = '12';
/**
 * sets the display to blank
*/
$display = '';

//Load BD Lite
define("incPath","");

//load standard bd functions & utilities
require_once('bdlite/class.universal.php');
require_once('bdlite/class.uni.php');
require_once('bdlite/class.htmlgrab.php');

//load the BDP Rest Client
require_once('restclient/class.bdCoreRestClient.php');
require_once('restclient/class.gPropsRestClient.php');


//load the core web plugin
require_once('includes/class.bdpWebPlugin.php');

//set the plugin name
$pluginName = 'bdpWebPlugin';

//set the consurction map
$constructionMap = array(
	'modx',
	'detailPageId',
	'resPageId',
	'tpl',
	'outerTpl',
	'roomTpl',
	'rViewingTpl',
	'hrTpl',
	'detailImageData',
	'searchParams',
	'enqDocId',
	'sResTpl',
	'mode',
	'setoutput',
	'setproperty',
	'apiKey',
	'accId',
	'sharedSecret',
	'resPageIdSales',
	'resPageIdLettings',
	'resPageIdLettings',
	'resPageIdMap',
	'lazyLoadingActive',
	'gmapPinPath',
	'gmapStyle',
	'salePriceOptions',
	'letPriceOptions',
	'maxSalePrice',
	'maxLetPrice',
	'pTypeArr',
	'rOptionArr',
	'bedRoomsMax',
	'orderingOptions',
	'resultsOptions',
	'defaultStreetViewZoom',
	'defaultStreetViewHeading',
	'defaultStreetViewPitch',
	'defaultMapType',
	'defaultMapZoom',

);

//run the utilities class
$plugin = new $pluginName();

//setupt the plugin
foreach($constructionMap as $key => $map){
	$plugin->$map = $$map;
}

//if(current_user_can('administrator')){

$propvar = $_GET["prop"];

if($propvar == '72420'){
//echo $propvar;
}else{

//start the plugin
$display = $plugin->startUp();

//return the output
return $display;
echo "bdp";
}

}

//}

add_shortcode( 'bdp', 'bdp_func' );

?>
