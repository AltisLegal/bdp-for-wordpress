/*
 * BDP WP Core JS
 * V 1.0.0
 * Last Modified 06/02/2015
 * dependancies
	** Bootstrap
	** jQuery
	** Google Maps API V3
	** Slick Slider - https://github.com/kenwheeler/slick
	** jQuery Validate
*/

/**
 * BDP Wordpress Core
*/


	if (typeof markerURL === 'undefined'){
		markerURL = '';
	};


//function bdpWordpressCore(options){

	//define default settings
var settings = {
		'searchFormHandle' : '.bdf-searchForm', //search form handle
		'submitHandle' : '.bdf-Submit', //form submit button handle
		'cancelHandle' : '.bdf-cancel', //form cancel button handle
		'detailsMapId' : 'bdf-propertyMap', //id of the map ont he details page
		'detailsStreetViewId' : 'bdf-sView', //id of the streetview container
		'detailMainImgCarouselHandle' : '.bdf-detailMainImg', //main image carousel handle
		'detailThumbsCarouselHandle' : '.bdf-detailCarousel', //thumbnail carousel handle
		'streetviewHideHandle' : '.bdf-streetViewHide', //anything with this handle is hidden when streetview can't find data
		'mapTitleHandle' : '.bdf-mapTitle', //contents of this tag populates the map marker title
		'markerIconUrl' : markerURL, //sets a custom map marker icon
		'enquiryFormHandle' : '.bdf-enquiryForm',
		'errorMsgHandle' : '.bdf-errorMsg',
		'resultsMapId' : 'bdf-propertyMapResults', //id of the map ont he details page
		'searchMapId' : 'bdf-propertyMapSearch', //id of the map ont he search page
		'sendFriendFormHandle' : '.bdf-sendFriendForm',
		'homeReportFormHandle' : '.bdf-homeReportForm',
		'requestViewingFormHandle' : '.bdf-requestViewingForm',
		'requestMatchFormHandle' : '.bdf-requestMatchForm',
		'lazyLoadingOuterContainerHandle' : '.bdf-lazyLoading',
		'lazyLoadingContainerHandle' : '.bdf-lazyLoadingResContainer',
		'lazyLoadingGraphicHandle' : '.bdf-lazyLoader',
		'enquiryValidation' : {
			rules : {
				firstName : {
					required: true
				},
				lastName : {
					required: true
				},
				email : {
					required: true,
					email: true
				},
				tel : {

				},
				message : {

				},
			}

		}
	};

	//integrate the options
	//$.extend(true,settings,options);

	/**
	 * search forms
	*/
	jQuery(settings.searchFormHandle).each(function() {

			var form = jQuery(this);

			jQuery(settings.submitHandle,form).click(function(e){

				e.preventDefault();
				var sendData = form.serialize();



				var actionPath = form.attr('action');
				var resPath = actionPath + (actionPath.indexOf("?", 0) > -1 ? '&' : '?') + sendData;
				//relocate the user
				resPath = resPath.replace(/\+/g, "_");
				window.location.href = resPath;
			});
		});



	/**
	 * Main Detail Page Image
	*/
	/*jQuery(settings.detailMainImgCarouselHandle).slick({
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    fade: true,
	    arrows: true,
	    asNavFor: settings.detailThumbsCarouselHandle
	});*/
	/**
	 * Detail Page Carousel Images
	*/
	/*jQuery(settings.detailThumbsCarouselHandle).slick({
	    slidesToShow: 4,
	    slidesToScroll: 4,
	    asNavFor: settings.detailMainImgCarouselHandle,
	    arrows: false,
	    centerMode: true,
	    centerPadding: '30px',
	    focusOnSelect: true,
	    responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        centerPadding: '20px'
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 2,
	        centerPadding: '15px'
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        centerPadding: '10px'
	      }
	    }
	  ]
	});*/

	/**
	 * Google Maps
	*/
function initializemap() {

	if(jQuery('#'+settings.detailsMapId).length > 0){
		//console.log(propertyMapData);
		//set the latlng object for the map centre
		var latlngMap = new google.maps.LatLng(propertyMapData.mapCentreLat,propertyMapData.mapCentreLng);
		//set the latlng object for the marker
		var latlngMarker = new google.maps.LatLng(propertyMapData.markerLat,propertyMapData.markerLng);
		//set the map options

        if(window.innerWidth < 481){ $drag = false; }else{ $drag = true; }
		var myOptions = {
			zoom: 16,
			center: latlngMap,
            draggable: $drag,
            mapTypeId: 'terrain',
            styles: [
            {
                "featureType": "landscape",
                "stylers": [
                    {
                        "hue": "#FFBB00"
                    },
                    {
                        "saturation": 43.400000000000006
                    },
                    {
                        "lightness": 37.599999999999994
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "stylers": [
                    {
                        "hue": "#FFC200"
                    },
                    {
                        "saturation": -61.8
                    },
                    {
                        "lightness": 45.599999999999994
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "stylers": [
                    {
                        "hue": "#FF0300"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 51.19999999999999
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.local",
                "stylers": [
                    {
                        "hue": "#FF0300"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 52
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "water",
                "stylers": [
                    {
                        "hue": "#0078FF"
                    },
                    {
                        "saturation": -13.200000000000003
                    },
                    {
                        "lightness": 2.4000000000000057
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "poi",
                "stylers": [
                    {
                        "hue": "#00FF6A"
                    },
                    {
                        "saturation": -1.0989010989011234
                    },
                    {
                        "lightness": 11.200000000000017
                    },
                    {
                        "gamma": 1
                    }
                ]
            }
        ]
		};

		var map = new google.maps.Map(document.getElementById(settings.detailsMapId),myOptions);



        //console.log(settings.markerIconUrl)

		//set the marker image
		var markerData = {
			position: latlngMarker,
			map: map,
			//title:jQuery(settings.mapTitleHandle).html(),
			draggable: false,
			icon : settings.markerIconUrl,
		};

			var pData = locationMapData;
			map.markers = [];
					//console.log(markerShadowDims.width + ' :: ' + markerShadowDims.height);


					//loop through selected property coordinate arrays to set markers for each property
					for (var m in pData){
						var posn = new google.maps.LatLng(pData[m].lat,pData[m].lng);
						//console.log("creating image: " + pData[m].lat +" : "+ pData[m].lng);
						//console.log('marker icon: ' + mapData.markerIcon);
						var markerhome = new google.maps.Marker({
							position: posn,
							map: map,
							title: pData[m].title,
							filter: {
								type: pData[m].type
							},
							pData : pData[m],

							icon: '/wp-content/plugins/bdp-for-wordpress/includes/img/'+pData[m].type+'.png',
							draggable: false
						});

						map.markers.push(markerhome)

						//create info window
						var infowindow = new google.maps.InfoWindow({
							maxWidth: 450,
							height: 400
						});
						//open window when marker is clicked
						google.maps.event.addListener(markerhome, 'click', function(event){
							var doMarker = this;
							var template = '<div class="scrollFix"><div class="row cxd-infobox"><div><h4>{{ title }}</h4><br/></div></div></div>';
							var output = Mustache.render(template, doMarker.pData);
							//caption for info window
							infowindow.setContent(output);
							//infowindow.setPosition(event.latLng);
							infowindow.open(map, doMarker);

						});

						//markerBounds.extend(posn);
					}



		var marker = new google.maps.Marker(markerData);
		/**
		var marker = new google.maps.Marker({
			position: latlngMap,
			map: map
		});
		*/
		//street view code goes here
		var latlngSView = new google.maps.LatLng(propertyMapData.sViewLat,propertyMapData.sViewLng);
		var panoramaOptions = {
			addressControl : false,
			position: latlngSView,
			pov: {
				heading: propertyMapData.sViewHeading,
				pitch: propertyMapData.sViewPitch,
				zoom: propertyMapData.sViewZoom
			}
		};
		var panorama = new  google.maps.StreetViewPanorama(document.getElementById(settings.detailsStreetViewId), panoramaOptions);
		var client = new google.maps.StreetViewService();
		client.getPanoramaByLocation(panoramaOptions.position, 50, function(data,status){
			if(status == 'ZERO_RESULTS'){
				if(console){
					//console.log('Unable to retrieve Streetview data, removing Streetview functionality');
				}
				jQuery(settings.detailsStreetViewId).hide();
				jQuery(settings.streetviewHideHandle).hide();
			}
			else{
				if(console){
					//console.log('Streetview should now appear');

				}

			}
		});
		jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			initializemap();
			e.target // newly activated tab
			e.relatedTarget // previous active tab
			//resize the google map on tab load
			google.maps.event.trigger(map, 'resize');
			map.setCenter(latlngMap);
			panorama.setVisible(true);
		});


		jQuery('.filters a').click(function (e) {
			console.log(jQuery(this).attr('class'))
		   //infobox.close()
            e.preventDefault();
            var $target = jQuery(e.target);
            var eventid = $target.attr('id');
			//$target.toggleClass("x-btn");
			if($target.hasClass("disabled")){
				$target.removeClass("disabled")
			}else{
				$target.addClass("disabled")
			}
			if(eventid == "showall"){
				jQuery.each(map.markers, function () {

					  if (this.map == null) {
                        this.setMap(map);
                    }
					});
			} else {
			//console.log(eventid)
            jQuery.each(map.markers, function () {
				console.log(this.filter['type']);

				 if (this.filter['type'].indexOf(eventid) > -1){
					//alert(eventid)
               //if (this.filter[type] == eventid) {
                    if (this.map == null) {
                        this.setMap(map);
                    }else {
                    this.setMap(null);
                }
                } /*else {
                    this.setMap(null);
                }*/
            });
			}
        });


	}
}


/**
* Google Maps Results Only
	*/
	if(jQuery('#'+settings.resultsMapId).length > 0){

		$el = '#'+settings.resultsMapId;
			var maploaded = false;



	 jQuery('.property-results__tabs li a').bind('click touchstart', function(){
	//jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

			//e.target // newly activated tab
			//e.relatedTarget // previous active tab
			//resize the google map on tab load


       if (!maploaded){


	maploaded = true;
    function center_map(map) {

        // Vars
        var bounds = new google.maps.LatLngBounds();

        // Loop through all markers and create bounds
        jQuery.each(map.markers, function (i, marker) {
            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
            bounds.extend(latlng);
        });
        map.fitBounds(bounds);

/*		zoomChangeBoundsListener = google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
        if (this.getZoom()){
            this.setZoom(9);
        }
});
setTimeout(function(){google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);*/

    }


    function init($el) {
	//console.log($el)

        // Var
        var $markers = jQuery('#'+settings.resultsMapId).find('.marker');
		if(window.innerWidth < 481){ $drag = false; }else{ $drag = true; }
        // Vars
        var args = {
            center: new google.maps.LatLng(0, 0),
            backgroundColor: '#FFFFFF',
            zoom: 3,
            disableDefaultUI: false,
            zoomControl: true,
            disableDoubleClickZoom: false,
            panControl: false,
            mapTypeControl: false,
            scaleControl: false,
            scrollwheel: false,
            streetViewControl: false,
            draggable: $drag,
            overviewMapControl: false,
			styles: eval(gmapStyle),


        };

        // Create map
        var map = new google.maps.Map($el[0], args);

				var officelocations = [
						['18 Hardgate', 55.9567043,-2.7771647, 4],
						['22 Hardgate', 55.9564185,-2.7772601, 5],
						['39 High Street', 56.0011402,-2.517073, 3],
						['8 Westgate', 56.0582873,-2.7267233, 2],
						['121 High Street', 55.9431982,-2.9520539, 1]
					];
					//var officeinfowindow = new google.maps.InfoWindow();

							var officemarker, i;

							for (i = 0; i < officelocations.length; i++) {
								officemarker = new google.maps.Marker({
									position: new google.maps.LatLng(officelocations[i][1], officelocations[i][2]),
									icon: '/wp-content/themes/gsb-master/img/gsb-marker.png',
									map: map
								});

								//google.maps.event.addListener(officemarker, 'click', (function(officemarker, i) {
									//return function() {
										//infowindow.setContent(officelocations[i][0]);
										//infowindow.open(map, officemarker);
									//}
								//})(officemarker, i));
							}
        // Add a markers reference
        map.markers = [];

        // Add markers
        $markers.each(function () {

			if(jQuery(this).attr('data-lat').length > 0 && jQuery(this).attr('data-lng').length > 0){
				 add_marker(jQuery(this), map);

			}
        });

 	    // Center map
        center_map(map);
        return map;

    }


    function add_marker($marker, map) {

        // Var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
        //var icon = null;

		//set the marker image
		var markerData = {
			icon : null
		};



		if(settings.markerIconUrl){
			markerData.icon = settings.markerIconUrl;
		}


        var icon = markerData.icon;

        var marker = new google.maps.Marker({
            icon: icon,
            position: latlng,
            map: map,
            draggable: false,
            // Custom property to hold the filters options, it'a used below to filter the markers
            filter: {
                type: $marker.data('type')
            },
			zoomlevel: $marker.data('zoom'),
			//label:$marker.data('label'),
        });

	google.maps.event.addListener(marker, 'click', function () {


});


        // Add to array
        map.markers.push(marker);

        if ($marker.html()) {
            // Create info window
            var infoWindow = new google.maps.InfoWindow();


            /*infobox = new InfoBox({
                content: $marker.children().html(),
                disableAutoPan: false,
                maxWidth: 300,
                pixelOffset: new google.maps.Size(-150,-350),
                zIndex: null,

                closeBoxMargin: '12px 12px 12px 0',
                closeBoxURL:'/images/close-popup.png',
                infoBoxClearance: new google.maps.Size(1, 1)
            });*/

            // Show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function () {
                //console.log($marker.children().html());

                infoWindow.setContent($marker.children().html());
                infoWindow.open(map, marker);


                mapID = $marker.attr('id');
                jQuery('.' + mapID).show();
            });


 google.maps.event.trigger(map, 'resize');

        }

    }


        var map = null;

       jQuery('#'+settings.resultsMapId).each(function () {
            map = init(jQuery(this));
        });



		 	// Filtering links click handler, it uses the filtering values (data-filterby and title)
        // to filter the markers based on the filter (custom) property set when the marker is created.
       jQuery(document).on('click', '.filters a', function (event) {
		   infobox.close()
            event.preventDefault();
            var $target = jQuery(event.target);
            var eventid = $target.attr('id')

			if(eventid == "showall"){
				jQuery.each(map.markers, function () {

					  if (this.map == null) {
                        this.setMap(map);
                    }
					});
			} else {

            jQuery.each(map.markers, function () {


				 if (this.filter['type'].indexOf(eventid) > -1){

                    if (this.map == null) {
                        this.setMap(map);
                    }
                } else {
                    this.setMap(null);
                }
            });
			}
        });

	}

		});


		 jQuery('.vc_tta-panel-title>a').bind('click touchstart', function(){
	//jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

			//e.target // newly activated tab
			//e.relatedTarget // previous active tab
			//resize the google map on tab load


       if (!maploaded){


	maploaded = true;
    function center_map(map) {

        // Vars
        var bounds = new google.maps.LatLngBounds();

        // Loop through all markers and create bounds
        jQuery.each(map.markers, function (i, marker) {
            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
            bounds.extend(latlng);
        });
        map.fitBounds(bounds);

/*		zoomChangeBoundsListener = google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
        if (this.getZoom()){
            this.setZoom(9);
        }
});
setTimeout(function(){google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);*/

    }


    function init($el) {
	//console.log($el)

        // Var
        var $markers = jQuery('#'+settings.resultsMapId).find('.marker');
		if(window.innerWidth < 481){ $drag = false; }else{ $drag = true; }
        // Vars
        var args = {
            center: new google.maps.LatLng(0, 0),
            backgroundColor: '#FFFFFF',
            zoom: 8,
            disableDefaultUI: false,
            zoomControl: true,
            disableDoubleClickZoom: false,
            panControl: false,
            mapTypeControl: false,
            scaleControl: false,
            scrollwheel: false,
            streetViewControl: false,
            draggable: $drag,
            overviewMapControl: false,
			styles: eval(gmapStyle),


        };


        // Create map
        var map = new google.maps.Map($el[0], args);


        // Add a markers reference
        map.markers = [];

        // Add markers
        $markers.each(function () {

			if(jQuery(this).attr('data-lat').length > 0 && jQuery(this).attr('data-lng').length > 0){
				 add_marker(jQuery(this), map);

			}
        });

 	    // Center map
        center_map(map);
        return map;

    }


    function add_marker($marker, map) {

        // Var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
        //var icon = null;

		//set the marker image
		var markerData = {
			icon : null
		};



		if(settings.markerIconUrl){
			markerData.icon = settings.markerIconUrl;
		}


        var icon = markerData.icon;

        var marker = new google.maps.Marker({
            icon: icon,
            position: latlng,
            map: map,
            draggable: false,
            // Custom property to hold the filters options, it'a used below to filter the markers
            filter: {
                type: $marker.data('type')
            },
			zoomlevel: $marker.data('zoom'),
			//label:$marker.data('label'),
        });

	google.maps.event.addListener(marker, 'click', function () {


});


        // Add to array
        map.markers.push(marker);

        if ($marker.html()) {
            // Create info window
            var infoWindow = new google.maps.InfoWindow();


            /*infobox = new InfoBox({
                content: $marker.children().html(),
                disableAutoPan: false,
                maxWidth: 300,
                pixelOffset: new google.maps.Size(-150,-350),
                zIndex: null,

                closeBoxMargin: '12px 12px 12px 0',
                closeBoxURL:'/images/close-popup.png',
                infoBoxClearance: new google.maps.Size(1, 1)
            });*/

            // Show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function () {
                //console.log($marker.children().html());

                infoWindow.setContent($marker.children().html());
                infoWindow.open(map, marker);


                mapID = $marker.attr('id');
                jQuery('.' + mapID).show();
            });


 google.maps.event.trigger(map, 'resize');

        }

    }


        var map = null;

       jQuery('#'+settings.resultsMapId).each(function () {
            map = init(jQuery(this));
        });



		 	// Filtering links click handler, it uses the filtering values (data-filterby and title)
        // to filter the markers based on the filter (custom) property set when the marker is created.
       jQuery(document).on('click', '.filters a', function (event) {
		   infobox.close()
            event.preventDefault();
            var $target = jQuery(event.target);
            var eventid = $target.attr('id')

			if(eventid == "showall"){
				jQuery.each(map.markers, function () {

					  if (this.map == null) {
                        this.setMap(map);
                    }
					});
			} else {

            jQuery.each(map.markers, function () {


				 if (this.filter['type'].indexOf(eventid) > -1){

                    if (this.map == null) {
                        this.setMap(map);
                    }
                } else {
                    this.setMap(null);
                }
            });
			}
        });

	}

		});

	}




/**
* Search Map
*/


	if(jQuery('#'+settings.searchMapId).length > 0){

		$elmap = '#'+settings.searchMapId;
			var maploaded = false;

	jQuery('.mapsearchbtn').click(function (e) {

			//e.target // newly activated tab
			//e.relatedTarget // previous active tab
			//resize the google map on tab load


       if (!maploaded){


	maploaded = true;
    function center_map(map) {


    }


    function init($elmap) {
	console.log($elmap)

        // Var
        var $markers = jQuery('#'+settings.searchMapId).find('.marker');
		if(window.innerWidth < 481){ $drag = false; }else{ $drag = true; }
        // Vars
        var args = {
            center: new google.maps.LatLng(55.864237,-4.251806),
            backgroundColor: '#FFFFFF',
            zoom: 12,
            disableDefaultUI: false,
            zoomControl: true,
            disableDoubleClickZoom: false,
            panControl: false,
            mapTypeControl: false,
            scaleControl: false,
            scrollwheel: false,
            streetViewControl: false,
            draggable: $drag,
            overviewMapControl: false,
			styles: [
			{
					"featureType": "landscape",
					"stylers": [
							{
									"hue": "#FFBB00"
							},
							{
									"saturation": 43.400000000000006
							},
							{
									"lightness": 37.599999999999994
							},
							{
									"gamma": 1
							}
					]
			},
			{
					"featureType": "road.highway",
					"stylers": [
							{
									"hue": "#FFC200"
							},
							{
									"saturation": -61.8
							},
							{
									"lightness": 45.599999999999994
							},
							{
									"gamma": 1
							}
					]
			},
			{
					"featureType": "road.arterial",
					"stylers": [
							{
									"hue": "#FF0300"
							},
							{
									"saturation": -100
							},
							{
									"lightness": 51.19999999999999
							},
							{
									"gamma": 1
							}
					]
			},
			{
					"featureType": "road.local",
					"stylers": [
							{
									"hue": "#FF0300"
							},
							{
									"saturation": -100
							},
							{
									"lightness": 52
							},
							{
									"gamma": 1
							}
					]
			},
			{
					"featureType": "water",
					"stylers": [
							{
									"hue": "#0078FF"
							},
							{
									"saturation": -13.200000000000003
							},
							{
									"lightness": 2.4000000000000057
							},
							{
									"gamma": 1
							}
					]
			},
			{
					"featureType": "poi",
					"stylers": [
							{
									"hue": "#00FF6A"
							},
							{
									"saturation": -1.0989010989011234
							},
							{
									"lightness": 11.200000000000017
							},
							{
									"gamma": 1
							}
					]
			}
	]


        };


        // Create map
        var map = new google.maps.Map($elmap[0], args);


		var center = new google.maps.LatLng(55.864237,-4.251806);
		var circle = new google.maps.Circle({
center: center,
map: map,
radius: 1000,
fillColor: '#222874',
fillOpacity: 0.3,
strokeColor: "#FFF",
strokeWeight: 0,
editable: true });



google.maps.event.addListener(circle, 'radius_changed', function() {

	radius = circle.getRadius();
	center = circle.getCenter();

	radiusinmiles =   radius*0.000621371;
	radiusinmiles = Math.round( radiusinmiles * 10) / 10;
	count = 0;

  for(i = 0 ; i< map.markers.length; i++){
  if(radius > google.maps.geometry.spherical.computeDistanceBetween(map.markers[i].getPosition(),center)){
	map.markers[i].setVisible(true);
	count++;
  }else{
	map.markers[i].setVisible(false)
  }
  }
  jQuery('span.results').text(count+" Properties matched your search")
   jQuery('span.radius').text(radiusinmiles+" Mile Search Radius")

   jQuery('a.resultlink').attr('href','/property-for-sale/property-search-results/?keysearch=&stype=sale&nv=on&msearchrad='+radiusinmiles+'&mcenterlat='+ center.lat() +'&mcenterlng='+ center.lng());



});

google.maps.event.addListener(circle, 'center_changed', function() {
  	radius = circle.getRadius();
	center = circle.getCenter()

	radiusinmiles =   radius*0.000621371;
	radiusinmiles = Math.round( radiusinmiles * 10) / 10;
	count = 0;

  for(i = 0 ; i< map.markers.length; i++){
  if(radius > google.maps.geometry.spherical.computeDistanceBetween(map.markers[i].getPosition(),center)){
	map.markers[i].setVisible(true);
	count++;
  }else{
	map.markers[i].setVisible(false)
  }
  }
  jQuery('span.results').text(count+" Properties matched your search")
   jQuery('span.radius').text(radiusinmiles+" Mile Search Radius")
   jQuery('a.resultlink').attr('href','/property-for-sale/property-search-results/?keysearch=&stype=sale&nv=on&msearchrad='+radiusinmiles+'&mcenterlat='+ center.lat() +'&mcenterlng='+ center.lng());

});




        // Add a markers reference
        map.markers = [];

        // Add markers
        $markers.each(function () {

			if(jQuery(this).attr('data-lat').length > 0 && jQuery(this).attr('data-lng').length > 0){
				 add_marker(jQuery(this), map);

			}
        });




 	    // Center map
        center_map(map);
        return map;

    }





    function add_marker($marker, map) {

        // Var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
        //var icon = null;

		//set the marker image
		var markerData = {
			icon : null
		};



		if(settings.markerIconUrl){
			markerData.icon = settings.markerIconUrl;
		}


        var icon = markerData.icon;

        var marker = new google.maps.Marker({
            icon: icon,
            position: latlng,
            map: map,
            draggable: false,

            // Custom property to hold the filters options, it'a used below to filter the markers
            filter: {
                type: $marker.data('type')
            },
			zoomlevel: $marker.data('zoom'),
			//label:$marker.data('label'),
        });

	google.maps.event.addListener(marker, 'click', function () {


});


        // Add to array
        map.markers.push(marker);


        if ($marker.html()) {
            // Create info window
            var infoWindow = new google.maps.InfoWindow();


            /*infobox = new InfoBox({
                content: $marker.children().html(),
                disableAutoPan: false,
                maxWidth: 300,
                pixelOffset: new google.maps.Size(-150,-350),
                zIndex: null,

                closeBoxMargin: '12px 12px 12px 0',
                closeBoxURL:'/images/close-popup.png',
                infoBoxClearance: new google.maps.Size(1, 1)
            });*/

            // Show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function () {
                //console.log($marker.children().html());

                infoWindow.setContent($marker.children().html());
                infoWindow.open(map, marker);


                mapID = $marker.attr('id');
                jQuery('.' + mapID).show();
            });


 google.maps.event.trigger(map, 'resize');

        }


		 /* center = new google.maps.LatLng(55.941939,-3.19376);

	   for(i = 0 ; i< map.markers.length; i++){
		   console.log(center)
  if(10000 > google.maps.geometry.spherical.computeDistanceBetween(map.markers[i].getPosition(),center)){
	map.markers[i].setVisible(true)
  }else{
	map.markers[i].setVisible(false)
  }
  }*/
    }


        var map = null;

       jQuery('#'+settings.searchMapId).each(function () {
            map = init(jQuery(this));
			google.maps.event.trigger(map, 'resize');
        });


		 	// Filtering links click handler, it uses the filtering values (data-filterby and title)
        // to filter the markers based on the filter (custom) property set when the marker is created.
       jQuery(document).on('click', '.filters a', function (event) {
		   infobox.close()
            event.preventDefault();
            var $target = jQuery(event.target);
            var eventid = $target.attr('id')

			if(eventid == "showall"){
				jQuery.each(map.markers, function () {

					  if (this.map == null) {
                        this.setMap(map);
                    }
					});
			} else {

            jQuery.each(map.markers, function () {


				 if (this.filter['type'].indexOf(eventid) > -1){

                    if (this.map == null) {
                        this.setMap(map);
                    }
                } else {
                    this.setMap(null);
                }
            });
			}
        });

	}

		});

	}








	/**
	 * Enquiry Form
	*/

	//set form validation (jQuery validation)
	jQuery(settings.enquiryFormHandle).validate(settings.enquiryValidation);

	//set the submit button
	jQuery(settings.submitHandle,settings.enquiryFormHandle).click(function(e){

		e.preventDefault();
		//check that the form is valid, if not show the error message
			if(jQuery(settings.enquiryFormHandle).valid()){
				//the form fields are valid, post to the server and display the response
				//console.log('The enquiry form should now send');
				jQuery('#makeEnquiry').removeClass("fade").modal("hide");
				var formDataArr = jQuery(settings.enquiryFormHandle).serializeArray();

				var formData = {
					formData : '1',
					enqtype : 'denquiry'
				}
				for(var i in formDataArr){
					//console.log(formDataArr[i]);
					formData[formDataArr[i]['name']] = formDataArr[i]['value'];
				}

				bDig.loadModal({
					content : false,
					template : '/wp-content/plugins/bdp-for-wordpress/includes/jstemps/pleasewait.html',
					timeOut : false,
					tParams : {},
					removeId : settings.formModalId,
					onComplete : function(){


						console.log('the modal should now have appeared');
						console.log(formData);
						jQuery.ajax({
							url : window.location.href,
							type : 'POST',
							data : formData,
							statusCode: {
							404: function() {
							  console.log( "404 -page not found" );
							}
                            },
							success : function(data){
								var output = bDig.grabOutput(data);
								//console.log("success response: " +output)

								if(output){

									//load a modal with the success message
									bDig.loadModal({
										content : output,
										onComplete : function(){
											if(formSettings.submitFlag !== 'matchRequest'){
											setTimeout(function(){
												 jQuery('#bdModal').modal('hide');
												 //jQuery.fancybox.close();
											}, 2000);
											}
										},
										tParams : {
											modId : 'bdModal'
										}

									});

								}
								else{
									if(console){
										console.log('There was a problem submitting the form');
									}
								}
							}
						});
					}
				});
			}
			else{
				jQuery(formSettings.errorMsgHandle,formSettings.formHandle).slideDown();
		}

	});

	var sendFriendSetup = new popupFormHandle({
		formHandle : settings.sendFriendFormHandle,
		submitFlag : 'sendFriend',
		formModalId : 'sendFriend'
	});

	var homeReportSetup = new popupFormHandle({
		formHandle : settings.homeReportFormHandle,
		submitFlag : 'hreport',
		formModalId : 'espchr'
	});

	var requestViewingSetup = new popupFormHandle({
		formHandle : settings.requestViewingFormHandle,
		submitFlag : 'viewing',
		formModalId : 'bookViewing'
	});


	var requestMatchSetup = new popupFormHandle({
		formHandle : settings.requestMatchFormHandle,
		submitFlag : 'matchRequest',
		formModalId : 'matchEnquiry'
	});

	/**
	 * handles popup forms
	*/
	function popupFormHandle(options){

		var formSettings = {
			formHandle : '',
			submitHandle : settings.submitHandle,
			submitFlag : '',
			errorMsgHandle : settings.errorMsgHandle,
			formModalId : '',
			validation : {
				rules : {
					firstName : {
						required: true
					},
					lastName : {
						required: true
					},
					email : {
						required: true,
						email: true
					},
					tel1 : {
						required: true
					},
					message : {

					},
				}

			}
		};

		jQuery.extend(formSettings,options,true);

		//set form validation (jQuery validation)
		jQuery(formSettings.formHandle).validate(formSettings.validation);

		//set the submit button
		jQuery(formSettings.submitHandle,formSettings.formHandle).click(function(e){
			//console.log("request")
			e.preventDefault();

			//check that the form is valid, if not show the error message
			if(jQuery(formSettings.formHandle).valid()){
				//the form fields are valid, post to the server and display the response
				console.log('The enquiry form should now send');
				jQuery('#'+formSettings.formModalId).removeClass("fade").modal("hide");
				var formDataArr = jQuery(formSettings.formHandle).serializeArray();

				var formData = {
					formData : '1',
					enqtype : formSettings.submitFlag
				}
				for(var i in formDataArr){
					console.log(formDataArr[i]);
					formData[formDataArr[i]['name']] = formDataArr[i]['value'];
				}

				bDig.loadModal({
					content : false,
					template : '/wp-content/plugins/bdp-for-wordpress/includes/jstemps/pleasewait.html',
					timeOut : false,
					tParams : {},
					removeId : formSettings.formModalId,
					onComplete : function(){


						console.log('the modal should now have appeared');
						//console.log(formData);
						jQuery.ajax({
							url : window.location.href,
							type : 'POST',
							data : formData,
							statusCode: {
							404: function() {
							  console.log( "404 -page not found" );
							}
                            },
							success : function(data){
								var output = bDig.grabOutput(data);
								console.log("success response: " +output)

								if(output){

									//load a modal with the success message
									bDig.loadModal({
										content : output,
										onComplete : function(){
											if(formSettings.submitFlag !== 'matchRequest'){
											setTimeout(function(){
												 jQuery('#bdModal').modal('hide');
												 //jQuery.fancybox.close();
											}, 2000);
											}
										},
										tParams : {
											modId : 'bdModal'
										}

									});

								}
								else{
									if(console){
										console.log('There was a problem submitting the form');
									}
								}
							}
						});
					}
				});
			}
			else{
				jQuery(formSettings.errorMsgHandle,formSettings.formHandle).slideDown();
			}

		});
	}

	/**
	 * Search Results Page
	*/

	/**
	 * set a listener for the ordering dropdown box
	*/


	this.appGet=function(qString,newVals){
		var queryArr=[];
		var queryArrOut=new Object;
		var outputQString='';
		if(qString){var queryArr=qString.split('&');}
		for(var i in queryArr){
			sp=queryArr[i].split('=');
			if(sp.length>1){
				queryArrOut[sp[0]]=sp[1];
				}
			}
		newQueryArr=jQuery.extend(queryArrOut,newVals);
		var count=0;
		for(i in newQueryArr){
			if(newQueryArr[i]){
				outputQString=outputQString+'&'+i+'='+newQueryArr[i];count++;}
				}
		return outputQString;
	}


	appendGet=function(qString,name,val){
		var newVals=new Object;
		newVals[name]=val;
		return this.appGet(qString,newVals);
	}

	jQuery('#order_res').change(function(e){

		e.preventDefault();
		//create the new path

        var currPath = window.location.href;

        if(window.location.href.indexOf("keysearch") > -1){

        }
        else{
             currPath = currPath +"?keysearch="
        }

        var nQString = appendGet(currPath,'ord',jQuery(this).val());
		console.log("nQString path="+nQString)
		var doPath = currPath.split('&')[0];
		var doPath = doPath + (doPath.indexOf("?", 0) > -1 ? '&' : '?') + nQString;

        nQString = nQString.replace("&http", "http");
		if(nQString.indexOf("keysearch") <= -1){
		nQString = "?keysearch=" + nQString;
		}
		//console.log(nQString)
		//relocate the user
		window.location.href = nQString;
	});

	/**
	 * set a listener for the number results dropdown box
	*/
	jQuery('#nres').change(function(e){
		e.preventDefault();
		//create the new path
		 var currPath = window.location.href;
       	console.log("Current path="+currPath)
        if(window.location.href.indexOf("keysearch") > -1){

        }
        else{
             currPath = currPath +"?keysearch="
        }
        var nQString = appendGet(currPath,'nres',jQuery(this).val());
		var doPath = currPath.split('&')[0];
		var doPath = doPath + (doPath.indexOf("?", 0) > -1 ? '&' : '?') + nQString;
		//relocate the user
		nQString = nQString.replace("&http", "http");
		if(nQString.indexOf("keysearch") <= -1){
		nQString = "?keysearch=" + nQString;
		}
		//console.log(nQString)
		//relocate the user
		window.location.href = nQString;
	});


	/**
	 * sets the property video button

	bdp.setShootHome();
	*/

	/**
		 * set a lazy loading listener
		*/
		jQuery(settings.lazyLoadingOuterContainerHandle).each(function(){

			var nres = 5;

			var resContainer = this;
			var win = jQuery(window);
			var doScrollJax = false;
			var padding = (bDig.isIphone() ? 20 : 5);
			win.unbind('scroll');
			jQuery(settings.lazyLoadingGraphicHandle).hide();
			win.scroll(function(){
				var totalHeight = Number(jQuery(document).height()) - Number(win.height()) - padding;
				if(jQuery(window).scrollTop() >= totalHeight){

					//console.log("sending ajax data starting at result: " + jQuery('.search_result',resContainer).length);
					jQuery(settings.lazyLoadingGraphicHandle,resContainer).show();
					if(doScrollJax){
						doScrollJax.abort();
					}

					var resgroup = Math.ceil(jQuery('.search_result',resContainer).length / nres)+1;
					//console.log("There are currently " + jQuery('.search_result',resContainer).length + " results." + resgroup )

					 doScrollJax = jQuery.ajax({
						url: window.location.href +'&resgroup=' + resgroup,
						type: 'POST',
						//dataType: 'json',
						data : {
							//startRow : jQuery('.search_result',resContainer).length,
							lazyLoadRes : 1,
						},
						success : function(data){

							//console.log("received ajax success")
							//bDig.checkDebug(data);
							var output = bDig.grabOutput(data);
							var outputlength = (output.match(/.search_result/g) || []).length



							//console.log('output length: '+outputlength+' :: '+nres);
							if(outputlength < nres){
								if(output.replace(/ /g,'') == ''){
									win.unbind('scroll');
									//console.log(jQuery(settings.lazyLoadingGraphicHandle,resContainer).html());
									jQuery(settings.lazyLoadingGraphicHandle,resContainer).hide();
									//console.log('less results and trying to hide');
								}
								else{
									//console.log('output is less, but not hiding the graphic');

								}
							}
							else{
								var finalRes = bDig.grabData(data,'finalRes');

								//var beforeHeight = jQuery('#notifications_holder').height();
								var beforeScroll = jQuery('window').scrollTop();
								jQuery(settings.lazyLoadingContainerHandle,resContainer).append(output);
								//var scrollDiff = jQuery('#notifications_holder').height() - beforeHeight;
								jQuery('window').scrollTop(beforeScroll);
								jQuery(settings.lazyLoadingGraphicHandle,resContainer).hide();
								//console.log('appending');


							}
						}

					});


				}


			});
		});


//}
