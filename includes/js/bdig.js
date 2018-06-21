/*
 * JS to be found in both the CMS and Front End
*/
function bDig(){

//Variables
var basePath;
var fullPagePath;

/*
 * jquery on document ready functions
*/
jQuery(document).ready(function(){

	//set the base path
	bDig.getBasePath();

	//set the full page path (ajax friendly)
	bDig.getFullPath();

	//set the get forms on page load
	bDig.setGForms();

	//set search forms on page load
	bDig.setSForms();

});

/**
 * grabs the root base path
*/
this.getBasePath = function(){
	if(!(this.basePath)){
		this.basePath = jQuery('base').attr('href');
	}
}

/**
 * grabs the file path - using the get var
*/
this.getFullPath = function(){
	//remove the basepath from the href
	fullPagePath = jQuery('base').attr('href') + '?a='+ window.location.href.replace(jQuery('base').attr('href'),'');
	return fullPagePath;
}

/*
 * checks a response for debug html
*/
this.checkDebug = function(data){

	var dbOutput = (data.debugOutput ? data.debugOutput : jQuery(data).find('debug').text());
	//console.log(dbOutput)
	if(dbOutput.length > 0){
		//check if the debug panel is already open, if so add to the existing panel
		if(jQuery('#bd_debug').length > 0){
			//grab the internal output
			jQuery('#debug_output').append(jQuery(dbOutput).find('#debug_output').html());
		}else{
			dbOutput = jQuery(dbOutput).addClass('hide');
			jQuery('body').prepend(dbOutput);

			jQuery('#bd_debug').show('slow');
		}
	}
}

/*
 * grabs the output from an echo'd set of xml
*/
function grabOutput(data){
	//console.log(data)
	var output = ((data.output != undefined) ? data.output : jQuery(data).find('htmlOutput').html());
	console.log(output)
	return output;

}
this.grabOutput = grabOutput;

/*
 * grabs the data of a given node
*/
this.grabData = function(data,nodeName){
	var output = ((data[nodeName] != undefined) ? data[nodeName] : jQuery(data).find(nodeName).html());
	return output;
}

/**
 * set any search get forms for blogs
*/
this.setGForms = function (){
	jQuery('.bdig_gform').click(function(e){
		e.preventDefault();
		//put the full path together
		output = getSearchQString(jQuery(this).attr('value'));
		//relocate to the output path
		window.location.href = output;
	});
	jQuery('.bdig_gform_reset').click(function(e){
		e.preventDefault();
		//put the full path together
		output = getSearchQString(jQuery(this).attr('value'),true);
		//relocate to the output path
		window.location.href = output;
	});
}

/**
 * returns a query string for a search form
 * @param formId id of the form
*/
function getSearchQString(formId,doReset){

	var newQueryArr = getSearchQArr(formId,doReset);
	var outputQString = '';
	//create the new query string, filter blank values
	for(i in newQueryArr){
		if(newQueryArr[i]){
			outputQString = outputQString + '&' + i +'=' + newQueryArr[i];
		}
	}
	var queryArr = window.location.href.split( '&' );
	var queryArrOrig = queryArr.shift();
	//put the full path together
	output = queryArrOrig + outputQString;
	output = output.replace(/"/g,'');
	return output;
}
this.getSearchQString = getSearchQString;

/**
 * returns a query string for a search form
 * @param formId id of the form
*/
function getSearchQArr(formId,doReset){
	var formArr =  jQuery(':input:not(.nogo), select', jQuery('#'+ formId)).serializeArray();
	var queryArr = window.location.href.split( '&' );
	var queryArrOrig = queryArr.shift();
	var formArrOut = new Object;
	var queryArrOut = new Object;
	var i=0;
	var sp = [];

	var newQueryArr;
	var output = '';
	var cBoxes = new Array;
	var reset = (doReset ? true : false);

	//set an array of form values
	for(i in formArr){
		formArrOut[formArr[i].name] = formArr[i].value;
		if(reset){
			formArrOut[formArr[i].name] = '';
		}
	}
	//gather the checkboxes - add blank values for empty checkboxes
	jQuery('input[type=checkbox]', jQuery('#'+ formId)).each(function(){
		if(!formArrOut[jQuery(this).attr('name')]){
			formArrOut[jQuery(this).attr('name')] = '';
		}
	});
	//grab an array of the current query string
	for(i in queryArr){
		sp = queryArr[i].split('=');
		queryArrOut[sp[0]] = sp[1];
	}
	delete queryArrOut['resgroup'];



	//put an array of new query values
	newQueryArr = jQuery.extend(queryArrOut,formArrOut);

	//console.log(output);

	//return the output
	return newQueryArr;
}
this.getSearchQArr = getSearchQArr;


/**
 * sets search forms
*/
this.setSForms = function(){

	//set the autocomplete cells
	jQuery(".bdig_thelp").each(function(){
		//set the auto complete
		jQuery(this).autocomplete({
			//multiple: true
			source: fullPagePath + '&' + jQuery(this).attr('id') + 'jax=1',
			dataType: "json",
			success: function(data) {
				return jQuery.map(data, function(row) {

					return {
						data: row,
						value: row.name,
						label: row.name,
						result: row.name
					}
				});
			},
			select: function( event, ui ) {

			},
			open: function() {
				//jQuery( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			},
			close: function() {
				//jQuery( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			}
		});
	});

}


	/**
	 * fires a given variable and calls a callback
	 *@param string of vars or a single var name
	 *@param cBack mixed cakkback function
	*/
	this.sjb = function sjb(vars,cBack,timeOut){
		var doVars;
		if(typeof vars == 'string'){
			doVars = (vars.indexOf('=') == -1 ? vars+'=1' : vars);
		}
		else{
			doVars = vars;
		}

		jQuery.ajax({
			type: "POST",
			url:window.location.href,
			data: doVars,
			success: function(data){
				bDig.checkDebug(data);
				jQuery.fancybox({
					content : grabOutput(data),
					scrolling : 'no',
					padding : 0,
					showCloseButton : (timeOut ? false : true),
					onComplete : function(){
						if (typeof cBack == "function"){
							cBack(data);
						}
						else{
							eval(cBack);
						}
						if(timeOut){
							setTimeout(function(){
								jQuery.fancybox.close();
							},timeOut);
						}
					}
				});
			}
		});
	}

	/**
	 * modal equivalent to sjb
	 *@param string of vars or a single var name
	 *@param cBack mixed cakkback function
	*/
	this.sjm = function sjm(options){
		var settings = {
			timeOut : false
		};

		jQuery.extend(true,settings,options);

		var doVars;
		if(typeof settings.vars == 'string'){
			doVars = (settings.vars.indexOf('=') == -1 ? settings.vars+'=1' : settings.vars);
		}
		else{
			doVars = settings.vars;
		}

		jQuery.ajax({
			type: "POST",
			url:window.location.href,
			data: doVars,
			success: function(data){
				bDig.checkDebug(data);
				var modalSettings = settings;
				modalSettings.content = bDig.grabOutput(data)
				bDig.loadModal(modalSettings);
			}
		});
	}

	/**
	 * loads a modal
	*/
	this.loadModal = function loadModal(options){
		var settings = {
			content : false,
			template : '/wp-content/plugins/bdp-for-wordpress/includes/jstemps/confirmbox.html',
			timeOut : false,
			tParams : {
				title : 'Please Confirm',
				msg : 'Are you sure?',
				modId : 'bdModal'
			}
		};
		var modalContent = '';
		//extend the settings with custom options
		jQuery.extend(true,settings,options);

		if(settings.content){
			modalContent = settings.content;
			runModal();
		}
		else{
			//console.log(bla);
			jQuery.get(settings.template, function(template) {
				modalContent = Mustache.render(template, settings.tParams);
				runModal();
			});
		}

		function runModal(){
			if (!(jQuery('#bdModalContainer').length)){
				jQuery('body').prepend('<div id="bdModalContainer"></div>');
			}
			var existingModal = (settings.removeId ? jQuery('#'+settings.removeId) : jQuery('#'+settings.tParams.modId));
			if(existingModal.length > 0){
				existingModal.on('hidden.bs.modal', function (e) {
					//progressNewModal();
				});
				//console.log(existingModal);
				existingModal.removeClass("fade").modal("hide");
				progressNewModal();
			}
			else{
				progressNewModal();
			}

			/**
			 * progresses the modal to completion
			*/
			function progressNewModal(){

				jQuery('#bdModalContainer').html(modalContent);
				var myModal = jQuery('#'+settings.tParams.modId);
				//run the on complete function
				bDig.handleCallBack(settings.onComplete,myModal);
				//modal code goes here
				myModal.modal();

				myModal.addClass("fade").modal("show");
				//if a timeout is specified, run the timeout and close
				if(settings.timeOut){
					setTimeout(function(){
						jQuery('#'+settings.tParams.modId).modal('hide');
						jQuery('body').removeClass('modal-open');
						jQuery('.modal-backdrop').remove();
					},settings.timeOut);
				}
			}

		}

	}

	/**
	 * function to handle callback parameters and arguments
	*/
	function handleCallBack(cBack,data,data2){
		if (typeof cBack == "function"){
			cBack(data,data2);
		}
		else{
			eval(cBack);
		}
	}
	this.handleCallBack = handleCallBack;

	/**
	 * detects if the broswer is an iphone
	*/
	function isIphone(){
		if (navigator && navigator.userAgent && navigator.userAgent != null) {
			var strUserAgent = navigator.userAgent.toLowerCase();
			var arrMatches = strUserAgent.match(/(iphone|ipod|ipad)/);
			if (arrMatches)
				 return true;
		} // End if (navigator && navigator.userAgent)

		return false;
	}
	this.isIphone = isIphone;
}
var bDig = new bDig();
