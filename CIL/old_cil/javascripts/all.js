// Place your application-specific JavaScript functions and classes here
// This file is automatically included by javascript_include_tag :defaults
var selected_download_total=0;
var megabyte = 1024*1024;
$.ajaxSetup ({
        cache: false
    });
function group_download_toggle_all(toggle) {
    selected_download_total = 0;
      $("input[type='checkbox']:not([disabled='disabled'])").attr('checked', toggle);
}
function group_download_click_all() {
      $("input[type='checkbox']:not([disabled='disabled'])").click();
}
function any_group_download_checked() {
    return ($("input:checked[name=download_ids]").length > 0);
}

var AdvancedSearch = {
	toggle: function(ontology_id, toggle_element) {
		var parent = toggle_element.parent();
		$('.ontology_viewer').hide();

		if (parent.hasClass('ontology_open')) {
			$('.advanced_search_field').removeClass('ontology_open').children('.toggle').text('Browse Terms');
			$('#advanced_search').removeClass('open');
			$('#' + ontology_id).hide();
			toggle_element.text('Browse Terms');
		} else {
			$('.advanced_search_field').removeClass('ontology_open').children('.toggle').text('Browse Terms');
			parent.addClass('ontology_open');
			$('#advanced_search').addClass('open');
			$('#' + ontology_id).show();
			toggle_element.text('Close Terms');
		}
	},

	createOntoBrowser: function(dom_id, method, ontology_name, category, tree_data, is_tree_empty) {
		$('#ontologies').append("<div id='" + dom_id + "' class='ontology_viewer'></div>");
		$('#' + dom_id).hide().bind('select_node.jstree', function(event, data) {
                        if(!is_tree_empty)
			{
                            $('#image_search_parms_' + method).val(data.inst.get_text(data.inst.get_selected()));
                        }

		}).jstree({
			json_data: {
				data: tree_data,
				ajax: {
					url: function(node) {
						return "/ontologies/" + ontology_name + "/" + node.attr('id') + "/children.json?category=" + category;
					}
				}
			},
			ui: {
				select_limit: 1,
				selected_parent_close: "deselect"
			},
			themes: {
				url: '/stylesheets/jstree_themes/classic/style.css',
				theme: 'classic',
				icons: false
			},
			core: {
				animation: 200
			},
			plugins: ["themes", "json_data", 'ui']
		});
	}
};



function openPopup(url) {
	owindow = window.open(url, 'anew', config = 'height=600,width=850,left=50,top=50,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');
	if (!owindow.closed) owindow.focus();
	return false;
}

function remove_fields(link, element_id_to_hide) {
  $(link).prev("input[type=hidden]").attr("value", "1");
  $('#' + element_id_to_hide).hide();
}

function add_fields(link, association, content) {
  var new_id = new Date().getTime();
  var regexp = new RegExp("new_" + association, "g")
    $('#add_row').before(content.replace(regexp, new_id));
}

function retrieve_image(index, url)
{
    image_id = $('#image_id_'+index).val()
    if(image_id == '')
        {
            alert('Please enter an image id');
            return false;
        }
    final_url = url.replace('@@@', image_id)
    $('#image_'+index).attr("src",final_url)
}

function add_image_row(url)
{
    var start_index = find_top_image_id();
initial_cell_html = "<td>"+
    "<span class='top_image_index'>@@@index_plus_one@@@</span>" +
    "<br />"+
    "<img height='140' id='image_@@@index@@@' src='' width='140' />"+
    "<br />"+
    "<label for='image_id_@@@index@@@'>Image Id</label>"+
    "<input id='image_id_@@@index@@@' name='image_id_@@@index@@@' type='text' />"+
    "<br />"+
    "<input onclick=\"retrieve_image(@@@index@@@, '@@@url@@@/@@@/140');\" type='button' value='Retrieve Image' />" +
  "</td>";
  initial_cell_html = initial_cell_html.replace('@@@url@@@', url);
  cells_html = "";
  for(bump=0; bump < 5; ++bump)
  {
     cell_html = initial_cell_html.replace('@@@index_plus_one@@@', start_index+bump+1);
     var regexp = new RegExp("@@@index@@@", "g") // do all occurences
     cell_html = cell_html.replace(regexp, start_index + bump);
     cells_html = cells_html + cell_html;
  }
  html = '<tr>' + cells_html + '</tr>';
  $('#add_image_row').before(html);
}

function find_top_image_id()
{
    var image_count = 0;
    $("[name^='image_id']").each(function() {
      image_count++
    })
    return image_count;
}

function copy_checkbox_status(src_field_id, dest_field_id)
{
    dest_selector = '#'+dest_field_id;
    src_selector = '#'+src_field_id;
    $(dest_selector).attr("checked", $(src_selector).is(":checked"));
}
function trigger_basic_search()
{
    copy_refresh_form_value('basic_search_form', 'still');
    copy_refresh_form_value('basic_search_form', 'video');
    copy_refresh_form_value('basic_search_form', 'zstack');
    copy_refresh_form_value('basic_search_form', 'time');
    $('#basic_search_button').click();
}
var create_and_add = false;
function prep_photobox_dialog(ctrl_id, image_id)
{
    var ctrlidstr = '#' + ctrl_id;
    $('#photobox_clicked_ctrl_id').val(ctrlidstr);
    $('#photobox_image_id').val(image_id);

    var orig_text = $(ctrlidstr).text();
    button_text = 'Add Image';
    $('#photobox_button_id').val(button_text);
    // get the options to show
    // clear what is there and add in new
    $('#photobox_list').children().remove();
    var pb_hash =  get_photobox_options_for_image(image_id, true);
    var filtered_photoboxes =  pb_hash["filtered_photoboxes"];
    if(filtered_photoboxes.length == 0)
    {
        $('#new_photobox_name_div').show();
    }
    else
    {
        $('#photobox_select_list_div').show();
        $('#new_photobox_name_div').hide();
        for(i=0; i < filtered_photoboxes.length; ++i)
        {
            $('<option/>').attr("value",filtered_photoboxes[i]['elgg_id']).text(filtered_photoboxes[i]['name']).appendTo("#photobox_list");
        }
    }
    $('<option id="new_photobox_option_id"/>').attr("value",'-1').text('-- create new photobox --').appendTo("#photobox_list");
    photobox_dialog.dialog('open');
}

function show_new_photobox_div()
{
    if($('#photobox_list').val() == '-1')
    {
       $('#new_photobox_name_div').show();
    }
    else
    {
       $('#new_photobox_name_div').hide();
    }
}

function get_photobox_options_for_image(image_id, filter_by_image)
{
    var final_url = '/accounts/get_photobox_options_for_image_json/' + image_id + '?filter_by_image=';
        final_url += (filter_by_image==true) ? 'true' : 'false';
    var pb_array = new Array();
    pb_array["total_photobox_count"] = 0;
    pb_array["filtered_photoboxes"] = [];
  $.ajax({
    type: 'GET',
    url: final_url,
    datatype: 'json',
    data: {  },
    async: false,
    success:function(data, textStatus, jqXHR){
        pb_array = data;

  },
  error:function(){
  }
});
    return pb_array;
}

function create_and_add_image(acct_url)
{
    create_and_add = true;
    toggle_img_to_photobox(acct_url);
}

function toggle_img_to_photobox(acct_url)
{

    acct_url = acct_url.replace("http://cellimagelibrary.org","http://www.cellimagelibrary.org");

    // did they enter a new photobox name?
    if( create_and_add && $('#photobox_name_id').attr('value') == '')
    {
        alert('Please enter a new photobox name.');
        return false;
    }

    // are we adding?
    var ctrlidstr = $('#photobox_clicked_ctrl_id').val();
    var arrayOfClasses = $(ctrlidstr).attr('class').split(' ');
    var isButton = false;
    for (var j=0; j<arrayOfClasses.length; j++)
    {
        if (arrayOfClasses[j].match ("mini")) isButton = true;
    }
    var orig_text = $(ctrlidstr).text();

var new_text_no_symbol = new_text = 'Add to Photobox';
if (!isButton)
{
   new_text = '+ ' + new_text;
}
    var api = (create_and_add) ? 'add_img_to_new_photobox' : 'add_img_to_photobox';
    var final_url = '';
    if(create_and_add)
    {
        final_url = acct_url + '/' + api + '/'  + $('#photobox_image_id').val() + '?new_photobox_name=' + $('#photobox_name_id').attr('value');
    }
    else
    {
        final_url = acct_url + '/' + api + '/' + $('#photobox_list').val() + '/' + $('#photobox_image_id').val();
    }

   //alert('----------------'+final_url+'------------------');

  $.ajax({
    type: 'GET',
    url: final_url,
    datatype: 'text',
    async: true,
    data: {  },
    success:function(data, textStatus, jqXHR){
        if (data== 'not_logged_in')
        {
            photobox_dialog.dialog('close');
            window.location.href = '/accounts/login_prompt_required'
            return;
        }
      // now flip the text
      $(ctrlidstr).text(new_text);
      photobox_dialog.dialog('close');
  },
  error:function(xhr, ajaxOptions, thrownError){
        //alert(thrownError);
	//alert(ajaxOptions);	
	//var xmlhttp = new XMLHttpRequest();
        //xmlhttp.open("GET", final_url , true);
        //xmlhttp.send(); 

    $(ctrlidstr).text(new_text);
      photobox_dialog.dialog('close');
  }
});
}

function save_image_id(id)
{
      $("#photobox_image_id").attr("value", id );
}
function li_user(url)
{
  var final_url = url + '/liu';
  $.ajax({
    type: 'GET',
    url: final_url,
    datatype: 'text',
    async: false,
    data: {  },
    success:function(data, textStatus, jqXHR){
      show_banner( url, (data=='true') ? true : false   );
  },
  error:function(){
        show_banner(url, false);
  }
});
}


function show_banner(url, logged_in)
{
  if(!logged_in)
  {
      $('#logged_in_banner').hide();
      $('#logged_out_banner').show();
      return;
  }
  var final_url = url + '/ufn'
  $.ajax({
    type: 'GET',
    url: final_url,
    datatype: 'text',
    async: false,
    data: {  },
    success:function(data, textStatus, jqXHR){
      $('#logged_out_banner').hide();
      $('#logged_in_banner').show();
      // flip text
      $('#welcome_user_link').text('Welcome ' + data + '!');
  },
  error:function(){
      // flip text
      $('#welcome_user_link').text('Welcome!');
  }
});
}

function confirm_photobox_delete(photobox_name, delete_url)
{
    var r=confirm("Are you sure you want to delete photobox " + photobox_name + "?");
    if (r==true)
      {
         window.location.href = delete_url
      }
      return false;
}

function remove_image_from_photobox(ctrl_id, img_id, photobox_id, acct_url)
{
    // are we adding?
    var ctrlidstr = '#'+ctrl_id;
    var arrayOfClasses = $(ctrlidstr).attr('class').split(' ');
    for (var j=0; j<arrayOfClasses.length; j++)
    {
        if (arrayOfClasses[j].match ("mini")) isButton = true;
    }
    var orig_text = $(ctrlidstr).text();
    if($(ctrlidstr).text().indexOf('Add') != -1)
    {
        api = 'add_img_to_photobox';
        new_text = '- Remove from box';
    }
    else
    {
        api = 'remove_img_from_photobox';
        new_text = '+ Add to box';
    }
      $(ctrlidstr).text('Updating...');
    var final_url = acct_url + '/' + api + '/' + photobox_id + '/' + img_id;
  $.ajax({
    type: 'GET',
    url: final_url,
    datatype: 'text',
    async: false,
    data: {  },
    success:function(data, textStatus, jqXHR){
        if (data== 'not_logged_in')
        {
            window.location.href = '/accounts/login_prompt_required'
            return;
        }
      // now flip the text
      $(ctrlidstr).text(new_text);
  },
  error:function(){
      $(ctrlidstr).text(new_text);
  }
});
}

function prep_add_to_favorites_button(url, image_id)
{
    var logged_in = false;
  var final_url = url + '/liu';
  $.ajax({
    type: 'GET',
    url: final_url,
    datatype: 'text',
    async: false,
    data: {  },
    success:function(data, textStatus, jqXHR){
      logged_in = (data=='true') ? true : false;
  },
  error:function(){
        logged_in = false;
  }
});
        if(logged_in)
        {
           $('#img_add_favorites_div_logged_out').hide();
           $('#img_add_favorites_div_logged_in').show();
        }
        else
        {
           $('#img_add_favorites_div_logged_in').hide();
           $('#img_add_favorites_div_logged_out').show();
        }
}



/**
 * hashgrid (jQuery version)
 * http://github.com/dotjay/hashgrid
 * Version 4, 29 Mar 2010
 * By Jon Gibbins, accessibility.co.uk
 *
 * // Using a basic #grid setup
 * var grid = new hashgrid();
 *
 * // Using #grid with a custom id (e.g. #mygrid)
 * var grid = new hashgrid("mygrid");
 *
 * // Using #grid with additional options
 * var grid = new hashgrid({
 *     id: 'mygrid',            // id for the grid container
 *     modifierKey: 'alt',      // optional 'ctrl', 'alt' or 'shift'
 *     showGridKey: 's',        // key to show the grid
 *     holdGridKey: 'enter',    // key to hold the grid in place
 *     foregroundKey: 'f',      // key to toggle foreground/background
 *     jumpGridsKey: 'd',       // key to cycle through the grid classes
 *     numberOfGrids: 2,        // number of grid classes used
 *     classPrefix: 'class',    // prefix for the grid classes
 *     cookiePrefix: 'mygrid'   // prefix for the cookie name
 * });
 */


/**
 * You can call hashgrid from your own code, but it's loaded here by
 * default for convenience.
 */
$(document).ready(function() {

	var grid = new hashgrid({
		numberOfGrids: 2
	});

});


/**
 * hashgrid overlay
 */
var hashgrid = function(set) {

	var options = {
		id: 'grid',             // id for the grid container
		modifierKey: null,      // optional 'ctrl', 'alt' or 'shift'
		showGridKey: 'g',       // key to show the grid
		holdGridKey: 'h',       // key to hold the grid in place
		foregroundKey: 'f',     // key to toggle foreground/background
		jumpGridsKey: 'j',      // key to cycle through the grid classes
		numberOfGrids: 1,       // number of grid classes used
		classPrefix: 'grid-',   // prefix for the grid classes
		cookiePrefix: 'hashgrid'// prefix for the cookie name
	};
	var overlayOn = false,
		sticky = false,
		overlayZState = 'B',
		overlayZBackground = -1,
		overlayZForeground = 9999,
		classNumber = 1;

	// Apply options
	if (typeof set == 'object') {
		var k;
		for (k in set) options[k] = set[k];
	}
	else if (typeof set == 'string') {
		options.id = set;
	}

	// Remove any conflicting overlay
	if ($('#' + options.id).length > 0) {
		$('#' + options.id).remove();
	}

	// Create overlay, hidden before adding to DOM
	var overlayEl = $('<div></div>');
	overlayEl
		.attr('id', options.id)
		.css('display', 'none');
	$("body").prepend(overlayEl);
	var overlay = $('#' + options.id);

	// Unless a custom z-index is set, ensure the overlay will be behind everything
	if (overlay.css('z-index') == 'auto') overlay.css('z-index', overlayZBackground);

	// Override the default overlay height with the actual page height
	var pageHeight = parseFloat($(document).height());
	overlay.height(pageHeight);

	// Add the first grid line so that we can measure it
	overlay.append('<div class="horiz first-line">');

	// Calculate the number of grid lines needed
	var overlayGridLines = overlay.children('.horiz'),
		overlayGridLineHeight = parseFloat(overlayGridLines.css('height')) + parseFloat(overlayGridLines.css('border-bottom-width'));

	// Break on zero line height
	if (overlayGridLineHeight <= 0) return true;

	// Add the remaining grid lines
	var i, numGridLines = Math.floor(pageHeight / overlayGridLineHeight);
	for (i = numGridLines - 1; i >= 1; i--) {
		overlay.append('<div class="horiz"></div>');
	}

	// Check for saved state
	var overlayCookie = readCookie(options.cookiePrefix + options.id);
	if (typeof overlayCookie == 'string') {
		var state = overlayCookie.split(',');
		state[2] = Number(state[2]);
		if ((typeof state[2] == 'number') && !isNaN(state[2])) {
			classNumber = state[2].toFixed(0);
			overlay.addClass(options.classPrefix + classNumber);
		}
		if (state[1] == 'F') {
			overlayZState = 'F';
			overlay.css('z-index', overlayZForeground);
		}
		if (state[0] == '1') {
			overlayOn = true;
			sticky = true;
			overlay.show();
		}
	}
	else {
		overlay.addClass(options.classPrefix + classNumber)
	}

	// Keyboard controls
	$(document).bind('keydown', keydownHandler);
	$(document).bind('keyup', keyupHandler);

	/**
	 * Helpers
	 */

	function getModifier(e) {
		if (options.modifierKey == null) return true; // Bypass by default
		var m = true;
		switch(options.modifierKey) {
			case 'ctrl':
				m = (e.ctrlKey ? e.ctrlKey : false);
				break;

			case 'alt':
				m = (e.altKey ? e.altKey : false);
				break;

			case 'shift':
				m = (e.shiftKey ? e.shiftKey : false);
				break;
		}
		return m;
	}

	function getKey(e) {
		var k = false, c = (e.keyCode ? e.keyCode : e.which);
		// Handle keywords
		if (c == 13) k = 'enter';
		// Handle letters
		else k = String.fromCharCode(c).toLowerCase();
		return k;
	}

	function saveState() {
		createCookie(options.cookiePrefix + options.id, (sticky ? '1' : '0') + ',' + overlayZState + ',' + classNumber, 1);
	}

	/**
	 * Event handlers
	 */

	function keydownHandler(e) {
		var source = e.target.tagName.toLowerCase();
		if ((source == 'input') || (source == 'textarea') || (source == 'select')) return true;
		var m = getModifier(e);
		if (!m) return true;
		var k = getKey(e);
		if (!k) return true;
		switch(k) {
			case options.showGridKey:
				if (!overlayOn) {
					overlay.show();
					overlayOn = true;
				}
				else if (sticky) {
					overlay.hide();
					overlayOn = false;
					sticky = false;
					saveState();
				}
				break;
			case options.holdGridKey:
				if (overlayOn && !sticky) {
					// Turn sticky overlay on
					sticky = true;
					saveState();
				}
				break;
			case options.foregroundKey:
				if (overlayOn) {
					// Toggle sticky overlay z-index
					if (overlay.css('z-index') == overlayZForeground) {
						overlay.css('z-index', overlayZBackground);
						overlayZState = 'B';
					}
					else {
						overlay.css('z-index', overlayZForeground);
						overlayZState = 'F';
					}
					saveState();
				}
				break;
			case options.jumpGridsKey:
				if (overlayOn && (options.numberOfGrids > 1)) {
					// Cycle through the available grids
					overlay.removeClass(options.classPrefix + classNumber);
					classNumber++;
					if (classNumber > options.numberOfGrids) classNumber = 1;
					overlay.addClass(options.classPrefix + classNumber);
					if (/webkit/.test( navigator.userAgent.toLowerCase() )) {
						forceRepaint();
					}
					saveState();
				}
				break;
		}
	}

	function keyupHandler(e) {
		var m = getModifier(e);
		if (!m) return true;
		var k = getKey(e);
		if (!k) return true;
		if ((k == options.showGridKey) && !sticky) {
			overlay.hide();
			overlayOn = false;
		}
	}

}


/**
 * Cookie functions
 *
 * By Peter-Paul Koch:
 * http://www.quirksmode.org/js/cookies.html
 */
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}


/**
 * Forces a repaint (because WebKit has issues)
 * http://www.sitepoint.com/forums/showthread.php?p=4538763
 * http://www.phpied.com/the-new-game-show-will-it-reflow/
 */
function forceRepaint() {
	var ss = document.styleSheets[0];
	try {
		ss.addRule('.xxxxxx', 'position: relative');
		ss.removeRule(ss.rules.length - 1);
	} catch(e){}
}

/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

/**
 * Create a cookie with the given name and value and other optional parameters.
 *
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Set the value of a cookie.
 * @example $.cookie('the_cookie', 'the_value', { expires: 7, path: '/', domain: 'jquery.com', secure: true });
 * @desc Create a cookie with all available options.
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Create a session cookie.
 * @example $.cookie('the_cookie', null);
 * @desc Delete a cookie by passing null as value. Keep in mind that you have to use the same path and domain
 *       used when the cookie was set.
 *
 * @param String name The name of the cookie.
 * @param String value The value of the cookie.
 * @param Object options An object literal containing key/value pairs to provide optional cookie attributes.
 * @option Number|Date expires Either an integer specifying the expiration date from now on in days or a Date object.
 *                             If a negative value is specified (e.g. a date in the past), the cookie will be deleted.
 *                             If set to null or omitted, the cookie will be a session cookie and will not be retained
 *                             when the the browser exits.
 * @option String path The value of the path atribute of the cookie (default: path of page that created the cookie).
 * @option String domain The value of the domain attribute of the cookie (default: domain of page that created the cookie).
 * @option Boolean secure If true, the secure attribute of the cookie will be set and the cookie transmission will
 *                        require a secure protocol (like HTTPS).
 * @type undefined
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Get the value of a cookie with the given name.
 *
 * @example $.cookie('the_cookie');
 * @desc Get the value of a cookie.
 *
 * @param String name The name of the cookie.
 * @return The value of the cookie.
 * @type String
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

/**
 * jquery.autocomplete.js
 * Version 3.1
 * Copyright (c) Dylan Verheul <dylan.verheul@gmail.com>
 */
(function($) {

    /**
     * Autocompleter Object
     * @param {jQuery} $elem jQuery object with one input tag
     * @param {Object=} options Settings
     * @constructor
     */
    $.Autocompleter = function($elem, options) {

        /**
         * Cached data
         * @type Object
         * @private
         */
        this.cacheData_ = {};

        /**
         * Number of cached data items
         * @type number
         * @private
         */
        this.cacheLength_ = 0;

        /**
         * Class name to mark selected item
         * @type string
         * @private
         */
        this.selectClass_ = 'jquery-autocomplete-selected-item';

        /**
         * Handler to activation timeout
         * @type ?number
         * @private
         */
        this.keyTimeout_ = null;
        
        /**
         * Last key pressed in the input field (store for behavior)
         * @type ?number
         * @private
         */
        this.lastKeyPressed_ = null;
        
        /**
         * Last value processed by the autocompleter
         * @type ?string
         * @private
         */
        this.lastProcessedValue_ = null;
        
        /**
         * Last value selected by the user
         * @type ?string
         * @private
         */
        this.lastSelectedValue_ = null;
        
        /**
         * Is this autocompleter active?
         * @type boolean
         * @private
         */
        this.active_ = false;
        
        /**
         * Is it OK to finish on blur?
         * @type boolean
         * @private
         */
        this.finishOnBlur_ = true;

        /**
         * Assert parameters
         */
        if (!$elem || !($elem instanceof jQuery) || $elem.length !== 1 || $elem.get(0).tagName.toUpperCase() !== 'INPUT') {
            alert('Invalid parameter for jquery.Autocompleter, jQuery object with one element with INPUT tag expected');
            return;
        }

        /**
         * Init and sanitize options
         */
        if (typeof options === 'string') {
            this.options = { url:options };
        } else {
            this.options = options;            
        }
                this.options.maxCacheLength = parseInt(this.options.maxCacheLength);
                if (isNaN(this.options.maxCacheLength) || this.options.maxCacheLength < 1) {
                        this.options.maxCacheLength = 1;
                }
                this.options.minChars = parseInt(this.options.minChars);
                if (isNaN(this.options.minChars) || this.options.minChars < 1) {
                        this.options.minChars = 1;
                }

        /**
         * Init DOM elements repository
         */
        this.dom = {};
        
        /**
         * Store the input element we're attached to in the repository, add class
         */
        this.dom.$elem = $elem;
                if (this.options.inputClass) {
                        this.dom.$elem.addClass(this.options.inputClass);
                }

        /**
         * Create DOM element to hold results
         */
                this.dom.$results = $('<div></div>').hide();
                if (this.options.resultsClass) {
                        this.dom.$results.addClass(this.options.resultsClass);
                }
                this.dom.$results.css({
                        position: 'absolute'
                });
                $('body').append(this.dom.$results);

        /**
         * Shortcut to self
         */
        var self = this;

        /**
         * Position results element and reposition on window resize
         */
                this.position();
                $(window).resize(function() {
                    self.position();
                });

        /**
         * Attach keyboard monitoring to $elem
         */
                $elem.keydown(function(e) {
                        self.lastKeyPressed_ = e.keyCode;
                        switch(self.lastKeyPressed_) {

                                case 38: // up
                                        e.preventDefault();
                                        if (self.active_) {
                                                self.focusPrev();
                                        } else {
                                                self.activate();
                                        }
                                        return false;                                                   
                                break;
                                
                                case 40: // down
                                        e.preventDefault();
                                        if (self.active_) {
                                                self.focusNext();
                                        } else {
                                                self.activate();
                                        }
                                        return false;                                                   
                                break;
                                
                                case 9: // tab
                                case 13: // return
                                        if (self.active_) {
                                                e.preventDefault();
                                                self.selectCurrent();
                                                return false;                                                   
                                        }
                                break;

                                default:
                                        self.activate();
                                        
                        }
                });
                $elem.blur(function() {
                        if (self.finishOnBlur_) {
                                setTimeout(function() { self.finish(); }, 200);                                 
                        }
                });
        
    };
    
    $.Autocompleter.prototype.position = function() {
        var offset = this.dom.$elem.offset();
                this.dom.$results.css({
                        top: offset.top + this.dom.$elem.outerHeight(),
                        left: offset.left
                });        
    };
    
        $.Autocompleter.prototype.cacheRead = function(filter) {
                var filterLength, searchLength, search, maxPos, pos;
                if (this.options.useCache) {
                        filter = String(filter);
                        filterLength = filter.length;
                        if (this.options.matchSubset) {
                                searchLength = 1;
                        } else {
                                searchLength = filterLength;
                        }
                        while (searchLength <= filterLength) {
                                if (this.options.matchInside) {
                                        maxPos = filterLength - searchLength;
                                } else {
                                        maxPos = 0;
                                }
                                pos = 0;
                                while (pos <= maxPos) {
                                        search = filter.substr(0, searchLength);
                                        if (this.cacheData_[search] !== undefined) {
                                                return this.cacheData_[search];
                                        }
                                        pos++;
                                }
                                searchLength++;
                        }                               
                }
                return false;
    };

        $.Autocompleter.prototype.cacheWrite = function(filter, data) {
                if (this.options.useCache) {
                        if (this.cacheLength_ >= this.options.maxCacheLength) {
                                this.cacheFlush();
                        }
                        filter = String(filter);
                        if (this.cacheData_[filter] !== undefined) {
                                this.cacheLength_++;
                        }
                        return this.cacheData_[filter] = data;
                }
                return false;       
    };

        $.Autocompleter.prototype.cacheFlush = function() {
            this.cacheData_ = {};
            this.cacheLength_ = 0;
    };

        $.Autocompleter.prototype.callHook = function(hook, data) {
                var f = this.options[hook];
                if (f && $.isFunction(f)) {
                        return f(data, this);
                }
                return false;
        };
        
        $.Autocompleter.prototype.activate = function() {
            var self = this;
            var activateNow = function() {
                self.activateNow(); 
            };
                var delay = parseInt(this.options.delay);
                if (isNaN(delay) || delay <= 0) {
                        delay = 250;
                }
                if (this.keyTimeout_) {
                        clearTimeout(this.keyTimeout_);
                }
                this.keyTimeout_ = setTimeout(activateNow, delay);
        };

    $.Autocompleter.prototype.activateNow = function() {
                var value = this.dom.$elem.val();
                if (value !== this.lastProcessedValue_ && value !== this.lastSelectedValue_) {
                        if (value.length >= this.options.minChars) {
                                this.active_ = true;
                                this.lastProcessedValue_ = value;
                                this.fetchData(value);                          
                        }                                                       
                }
        };              
        
        $.Autocompleter.prototype.fetchData = function(value) {
                if (this.options.data) {
                        this.filterAndShowResults(this.options.data, value);
                } else {
                    var self = this;
                        this.fetchRemoteData(value, function(remoteData) {
                                self.filterAndShowResults(remoteData, value);                                   
                        });
                }                       
        };

        $.Autocompleter.prototype.fetchRemoteData = function(filter, callback) {
                var data = this.cacheRead(filter);
                if (data) {
                        callback(data); 
                } else {
                        try {
                    var self = this;
                                this.dom.$elem.addClass(this.options.loadingClass);                             
                                $.get(this.makeUrl(filter), function(data) {
                                        var parsed = self.parseRemoteData(data);
                                        self.cacheWrite(filter, parsed);
                                        self.dom.$elem.removeClass(self.options.loadingClass);
                                        callback(parsed);
                                });                             
                        } catch(e) {
                                this.dom.$elem.removeClass(this.options.loadingClass);
                                callback(false);
                        }                               
                }
        };

    $.Autocompleter.prototype.setExtraParam = function(name, value) {
        var index = $.trim(String(name));
        if (index) {
            if (!this.options.extraParams) {
                this.options.extraParams = {};
            }
            if (this.options.extraParams[index] !== value) {
                this.options.extraParams[index] = value;
                this.cacheFlush();
            }
        }
    };

        $.Autocompleter.prototype.makeUrl = function(param) {
            var self = this;
                var paramName = this.options.paramName || 'q';
                var url = this.options.url;
                var params = $.extend({}, this.options.extraParams);
                var urlAppend = [];
                params[paramName] = param;
                $.each(params, function(index, value) {
                        urlAppend.push(self.makeUrlParam(index, value));
                });
                url += url.indexOf('?') == -1 ? '?' : '&';
                url += urlAppend.join('&');
                return url;
        };
        
        $.Autocompleter.prototype.makeUrlParam = function(name, value) {
                return String(name) + '=' + encodeURIComponent(value);
        }
        
        $.Autocompleter.prototype.parseRemoteData = function(remoteData) {
                var results = [];
                var text = String(remoteData).replace('\r\n', '\n');
                var i, j, data, line, lines = text.split('\n');
                var value;
                for (i = 0; i < lines.length; i++) {
                        line = lines[i].split('|');
                        data = [];
                        for (j = 0; j < line.length; j++) {
                                data.push(unescape(line[j]));
                        }
                        value = data.shift();
                        results.push({ value: unescape(value), data: data });
                }
                return results;
        };
        
        $.Autocompleter.prototype.filterAndShowResults = function(results, filter) {
                this.showResults(this.filterResults(results, filter), filter);
        };
        
        $.Autocompleter.prototype.filterResults = function(results, filter) {
                
                var filtered = [];
                var value, data, i, result, type;
                var regex, pattern, attributes = '';
                
                for (i = 0; i < results.length; i++) {
                        result = results[i];
                        type = typeof result;
                        if (type === 'string') {
                                value = result;
                                data = {};
                        } else if ($.isArray(result)) {
                                value = result.shift();
                                data = result;
                        } else if (type === 'object') {
                                value = result.value;
                                data = result.data;
                        }
                        value = String(value);
                        // Condition below means we do NOT do empty results
                        if (value) {
                                if (typeof data !== 'object') {
                                        data = {};
                                }
                                pattern = String(filter);
                                if (!this.options.matchInside) {
                                        pattern = '^' + pattern;
                                }
                                if (!this.options.matchCase) {
                                        attributes = 'i';
                                }
                                regex = new RegExp(pattern, attributes);
                                if (regex.test(value)) {
                                        filtered.push({ value: value, data: data });
                                }                                       
                        }
                }
                
                if (this.options.sortResults) {
                        return this.sortResults(filtered);
                }
                
                return filtered;
                
        };

        $.Autocompleter.prototype.sortResults = function(results) {
            var self = this;
                if ($.isFunction(this.options.sortFunction)) {
                        results.sort(this.options.sortFunction);
                } else {
                        results.sort(function(a, b) { return self.sortValueAlpha(a, b); });
                }
                return results;
        };
        
        $.Autocompleter.prototype.sortValueAlpha = function(a, b) {
                a = String(a.value);
                b = String(b.value);
                if (!this.options.matchCase) {
                        a = a.toLowerCase();
                        b = b.toLowerCase();
                }
                if (a > b) {
                        return 1;
                }
                if (a < b) {
                        return -1;
                }
                return 0;
        };
        
        $.Autocompleter.prototype.showResults = function(results, filter) {
            var self = this;
                var $ul = $('<ul></ul>');
                var i, result, $li, extraWidth, first = false, $first = false;
                var numResults = results.length;
                for (i = 0; i < numResults; i++) {
                        result = results[i];
                        $li = $('<li>' + this.showResult(result.value, result.data) + '</li>');
                        $li.data('value', result.value);
                        $li.data('data', result.data);
                        $li.click(function() {
                                var $this = $(this);
                                self.selectItem($this);
                        }).mousedown(function() {
                                self.finishOnBlur_ = false;
                        }).mousedown(function() {
                                self.finishOnBlur_ = true;
                        });
                        $ul.append($li);
                        if (first === false) {
                                first = String(result.value);
                                $first = $li;
                                $li.addClass(this.options.firstItemClass);
                        }
                        if (i == numResults - 1) {
                                $li.addClass(this.options.lastItemClass);
                        }
                }
                this.dom.$results.html($ul).show();
                extraWidth = this.dom.$results.outerWidth() - this.dom.$results.width();
                this.dom.$results.width(this.dom.$elem.outerWidth() - extraWidth);
                $('li', this.dom.$results).hover(
                        function() { self.focusItem(this); },
                        function() { /* void */ }
                );
                if (this.autoFill(first, filter)) {
                        this.focusItem($first);
                }
        };
        
        $.Autocompleter.prototype.showResult = function(value, data) {
                if ($.isFunction(this.options.showResult)) {
                        return this.options.showResult(value, data);
                } else {
                        return value;
                }                       
        };
        
        $.Autocompleter.prototype.autoFill = function(value, filter) {
                var lcValue, lcFilter, valueLength, filterLength;
                if (this.options.autoFill && this.lastKeyPressed_ != 8) {
                        lcValue = String(value).toLowerCase();
                        lcFilter = String(filter).toLowerCase();
                        valueLength = value.length;
                        filterLength = filter.length;
                        if (lcValue.substr(0, filterLength) === lcFilter) {
                                this.dom.$elem.val(value);
                                this.selectRange(filterLength, valueLength);
                                return true;
                        }
                }
                return false;
        };
        
        $.Autocompleter.prototype.focusNext = function() {
                this.focusMove(+1);
        };

        $.Autocompleter.prototype.focusPrev = function() {
                this.focusMove(-1);
        };

        $.Autocompleter.prototype.focusMove = function(modifier) {
                var i, $items = $('li', this.dom.$results);
                modifier = parseInt(modifier);
                for (var i = 0; i < $items.length; i++) {
                        if ($($items[i]).hasClass(this.selectClass_)) {
                                this.focusItem(i + modifier);
                                return;
                        }
                }
                this.focusItem(0);
        };
        
        $.Autocompleter.prototype.focusItem = function(item) {
                var $item, $items = $('li', this.dom.$results);
                if ($items.length) {
                        $items.removeClass(this.selectClass_).removeClass(this.options.selectClass);
                        if (typeof item === 'number') {
                                item = parseInt(item);
                                if (item < 0) {
                                        item = 0;
                                } else if (item >= $items.length) {
                                        item = $items.length - 1;
                                }
                                $item = $($items[item]);
                        } else {
                                $item = $(item);
                        }
                        if ($item) {
                                $item.addClass(this.selectClass_).addClass(this.options.selectClass);                           
                        }                               
                }
        };
        
        $.Autocompleter.prototype.selectCurrent = function() {
                var $item = $('li.' + this.selectClass_, this.dom.$results);
                if ($item.length == 1) {
                        this.selectItem($item);                         
                } else {
                        this.finish();
                }
        };
        
        $.Autocompleter.prototype.selectItem = function($li) {
                var value = $li.data('value');
                var data = $li.data('data');
                var displayValue = this.displayValue(value, data);
                this.lastProcessedValue_ = displayValue;
                this.lastSelectedValue_ = displayValue;
                this.dom.$elem.val(displayValue).focus();
                this.setCaret(displayValue.length);
                this.callHook('onItemSelect', { value: value, data: data });
                this.finish();
        };
        
        $.Autocompleter.prototype.displayValue = function(value, data) {
                if ($.isFunction(this.options.displayValue)) {
                        return this.options.displayValue(value, data);
                } else {
                        return value;
                }                       
        };
        
        $.Autocompleter.prototype.finish = function() {
                if (this.keyTimeout_) {
                        clearTimeout(this.keyTimeout_);
                }
                if (this.dom.$elem.val() !== this.lastSelectedValue_) {
                        if (this.options.mustMatch) {
                                this.dom.$elem.val('');                                 
                        }
                        this.callHook('onNoMatch');
                }
                this.dom.$results.hide();
                this.lastKeyPressed_ = null;
                this.lastProcessedValue_ = null;
                if (this.active_) {
                        this.callHook('onFinish');
                }
                this.active_ = false;                   
        };
        
        $.Autocompleter.prototype.selectRange = function(start, end) {
                var input = this.dom.$elem.get(0);
                if (input.setSelectionRange) {
                        input.focus();
                        input.setSelectionRange(start, end);
                } else if (this.createTextRange) {
                        var range = this.createTextRange();
                        range.collapse(true);
                        range.moveEnd('character', end);
                        range.moveStart('character', start);
                        range.select();
                }
        };
        
        $.Autocompleter.prototype.setCaret = function(pos) {
                this.selectRange(pos, pos);
        };
                        
    /**
     * autocomplete plugin
     */
    $.fn.autocomplete = function(options) {

        if (typeof options === 'string') {
            options = { url:options };
        }
        
        var o = $.extend({}, $.fn.autocomplete.defaults, options);

                return this.each(function() {
                    var $this = $(this);
                    var ac = new $.Autocompleter($this, o);
                    $this.data('autocompleter', ac);
                });

        };

    /**
     * Default options for autocomplete plugin
     */
        $.fn.autocomplete.defaults = {
                minChars: 1,
                loadingClass: 'acLoading',
                resultsClass: 'acResults',
                inputClass: 'acInput',
                selectClass: 'acSelect',
                mustMatch: false,
                matchCase: false,
                matchInside: true,
                matchSubset: true,
                useCache: true,
                maxCacheLength: 10,
                autoFill: false,
                sortResults: true,
                sortFunction: false,
                onItemSelect: false,
                onNoMatch: false
        };
        
})(jQuery);

/* 
 * flowplayer.js 3.2.4. The Flowplayer API
 * 
 * Copyright 2009 Flowplayer Oy
 * 
 * This file is part of Flowplayer.
 * 
 * Flowplayer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Flowplayer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Flowplayer.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * Date: 2010-08-25 12:48:46 +0000 (Wed, 25 Aug 2010)
 * Revision: 551 
 */
(function(){function g(o){console.log("$f.fireEvent",[].slice.call(o))}function k(q){if(!q||typeof q!="object"){return q}var o=new q.constructor();for(var p in q){if(q.hasOwnProperty(p)){o[p]=k(q[p])}}return o}function m(t,q){if(!t){return}var o,p=0,r=t.length;if(r===undefined){for(o in t){if(q.call(t[o],o,t[o])===false){break}}}else{for(var s=t[0];p<r&&q.call(s,p,s)!==false;s=t[++p]){}}return t}function c(o){return document.getElementById(o)}function i(q,p,o){if(typeof p!="object"){return q}if(q&&p){m(p,function(r,s){if(!o||typeof s!="function"){q[r]=s}})}return q}function n(s){var q=s.indexOf(".");if(q!=-1){var p=s.slice(0,q)||"*";var o=s.slice(q+1,s.length);var r=[];m(document.getElementsByTagName(p),function(){if(this.className&&this.className.indexOf(o)!=-1){r.push(this)}});return r}}function f(o){o=o||window.event;if(o.preventDefault){o.stopPropagation();o.preventDefault()}else{o.returnValue=false;o.cancelBubble=true}return false}function j(q,o,p){q[o]=q[o]||[];q[o].push(p)}function e(){return"_"+(""+Math.random()).slice(2,10)}var h=function(t,r,s){var q=this,p={},u={};q.index=r;if(typeof t=="string"){t={url:t}}i(this,t,true);m(("Begin*,Start,Pause*,Resume*,Seek*,Stop*,Finish*,LastSecond,Update,BufferFull,BufferEmpty,BufferStop").split(","),function(){var v="on"+this;if(v.indexOf("*")!=-1){v=v.slice(0,v.length-1);var w="onBefore"+v.slice(2);q[w]=function(x){j(u,w,x);return q}}q[v]=function(x){j(u,v,x);return q};if(r==-1){if(q[w]){s[w]=q[w]}if(q[v]){s[v]=q[v]}}});i(this,{onCuepoint:function(x,w){if(arguments.length==1){p.embedded=[null,x];return q}if(typeof x=="number"){x=[x]}var v=e();p[v]=[x,w];if(s.isLoaded()){s._api().fp_addCuepoints(x,r,v)}return q},update:function(w){i(q,w);if(s.isLoaded()){s._api().fp_updateClip(w,r)}var v=s.getConfig();var x=(r==-1)?v.clip:v.playlist[r];i(x,w,true)},_fireEvent:function(v,y,w,A){if(v=="onLoad"){m(p,function(B,C){if(C[0]){s._api().fp_addCuepoints(C[0],r,B)}});return false}A=A||q;if(v=="onCuepoint"){var z=p[y];if(z){return z[1].call(s,A,w)}}if(y&&"onBeforeBegin,onMetaData,onStart,onUpdate,onResume".indexOf(v)!=-1){i(A,y);if(y.metaData){if(!A.duration){A.duration=y.metaData.duration}else{A.fullDuration=y.metaData.duration}}}var x=true;m(u[v],function(){x=this.call(s,A,y,w)});return x}});if(t.onCuepoint){var o=t.onCuepoint;q.onCuepoint.apply(q,typeof o=="function"?[o]:o);delete t.onCuepoint}m(t,function(v,w){if(typeof w=="function"){j(u,v,w);delete t[v]}});if(r==-1){s.onCuepoint=this.onCuepoint}};var l=function(p,r,q,t){var o=this,s={},u=false;if(t){i(s,t)}m(r,function(v,w){if(typeof w=="function"){s[v]=w;delete r[v]}});i(this,{animate:function(y,z,x){if(!y){return o}if(typeof z=="function"){x=z;z=500}if(typeof y=="string"){var w=y;y={};y[w]=z;z=500}if(x){var v=e();s[v]=x}if(z===undefined){z=500}r=q._api().fp_animate(p,y,z,v);return o},css:function(w,x){if(x!==undefined){var v={};v[w]=x;w=v}r=q._api().fp_css(p,w);i(o,r);return o},show:function(){this.display="block";q._api().fp_showPlugin(p);return o},hide:function(){this.display="none";q._api().fp_hidePlugin(p);return o},toggle:function(){this.display=q._api().fp_togglePlugin(p);return o},fadeTo:function(y,x,w){if(typeof x=="function"){w=x;x=500}if(w){var v=e();s[v]=w}this.display=q._api().fp_fadeTo(p,y,x,v);this.opacity=y;return o},fadeIn:function(w,v){return o.fadeTo(1,w,v)},fadeOut:function(w,v){return o.fadeTo(0,w,v)},getName:function(){return p},getPlayer:function(){return q},_fireEvent:function(w,v,x){if(w=="onUpdate"){var z=q._api().fp_getPlugin(p);if(!z){return}i(o,z);delete o.methods;if(!u){m(z.methods,function(){var B=""+this;o[B]=function(){var C=[].slice.call(arguments);var D=q._api().fp_invoke(p,B,C);return D==="undefined"||D===undefined?o:D}});u=true}}var A=s[w];if(A){var y=A.apply(o,v);if(w.slice(0,1)=="_"){delete s[w]}return y}return o}})};function b(q,G,t){var w=this,v=null,D=false,u,s,F=[],y={},x={},E,r,p,C,o,A;i(w,{id:function(){return E},isLoaded:function(){return(v!==null&&v.fp_play!==undefined&&!D)},getParent:function(){return q},hide:function(H){if(H){q.style.height="0px"}if(w.isLoaded()){v.style.height="0px"}return w},show:function(){q.style.height=A+"px";if(w.isLoaded()){v.style.height=o+"px"}return w},isHidden:function(){return w.isLoaded()&&parseInt(v.style.height,10)===0},load:function(J){if(!w.isLoaded()&&w._fireEvent("onBeforeLoad")!==false){var H=function(){u=q.innerHTML;if(u&&!flashembed.isSupported(G.version)){q.innerHTML=""}if(J){J.cached=true;j(x,"onLoad",J)}flashembed(q,G,{config:t})};var I=0;m(a,function(){this.unload(function(K){if(++I==a.length){H()}})})}return w},unload:function(J){if(this.isFullscreen()&&/WebKit/i.test(navigator.userAgent)){if(J){J(false)}return w}if(u.replace(/\s/g,"")!==""){if(w._fireEvent("onBeforeUnload")===false){if(J){J(false)}return w}D=true;try{if(v){v.fp_close();w._fireEvent("onUnload")}}catch(H){}var I=function(){v=null;q.innerHTML=u;D=false;if(J){J(true)}};setTimeout(I,50)}else{if(J){J(false)}}return w},getClip:function(H){if(H===undefined){H=C}return F[H]},getCommonClip:function(){return s},getPlaylist:function(){return F},getPlugin:function(H){var J=y[H];if(!J&&w.isLoaded()){var I=w._api().fp_getPlugin(H);if(I){J=new l(H,I,w);y[H]=J}}return J},getScreen:function(){return w.getPlugin("screen")},getControls:function(){return w.getPlugin("controls")._fireEvent("onUpdate")},getLogo:function(){try{return w.getPlugin("logo")._fireEvent("onUpdate")}catch(H){}},getPlay:function(){return w.getPlugin("play")._fireEvent("onUpdate")},getConfig:function(H){return H?k(t):t},getFlashParams:function(){return G},loadPlugin:function(K,J,M,L){if(typeof M=="function"){L=M;M={}}var I=L?e():"_";w._api().fp_loadPlugin(K,J,M,I);var H={};H[I]=L;var N=new l(K,null,w,H);y[K]=N;return N},getState:function(){return w.isLoaded()?v.fp_getState():-1},play:function(I,H){var J=function(){if(I!==undefined){w._api().fp_play(I,H)}else{w._api().fp_play()}};if(w.isLoaded()){J()}else{if(D){setTimeout(function(){w.play(I,H)},50)}else{w.load(function(){J()})}}return w},getVersion:function(){var I="flowplayer.js 3.2.4";if(w.isLoaded()){var H=v.fp_getVersion();H.push(I);return H}return I},_api:function(){if(!w.isLoaded()){throw"Flowplayer "+w.id()+" not loaded when calling an API method"}return v},setClip:function(H){w.setPlaylist([H]);return w},getIndex:function(){return p},_swfHeight:function(){return v.clientHeight}});m(("Click*,Load*,Unload*,Keypress*,Volume*,Mute*,Unmute*,PlaylistReplace,ClipAdd,Fullscreen*,FullscreenExit,Error,MouseOver,MouseOut").split(","),function(){var H="on"+this;if(H.indexOf("*")!=-1){H=H.slice(0,H.length-1);var I="onBefore"+H.slice(2);w[I]=function(J){j(x,I,J);return w}}w[H]=function(J){j(x,H,J);return w}});m(("pause,resume,mute,unmute,stop,toggle,seek,getStatus,getVolume,setVolume,getTime,isPaused,isPlaying,startBuffering,stopBuffering,isFullscreen,toggleFullscreen,reset,close,setPlaylist,addClip,playFeed,setKeyboardShortcutsEnabled,isKeyboardShortcutsEnabled").split(","),function(){var H=this;w[H]=function(J,I){if(!w.isLoaded()){return w}var K=null;if(J!==undefined&&I!==undefined){K=v["fp_"+H](J,I)}else{K=(J===undefined)?v["fp_"+H]():v["fp_"+H](J)}return K==="undefined"||K===undefined?w:K}});w._fireEvent=function(Q){if(typeof Q=="string"){Q=[Q]}var R=Q[0],O=Q[1],M=Q[2],L=Q[3],K=0;if(t.debug){g(Q)}if(!w.isLoaded()&&R=="onLoad"&&O=="player"){v=v||c(r);o=w._swfHeight();m(F,function(){this._fireEvent("onLoad")});m(y,function(S,T){T._fireEvent("onUpdate")});s._fireEvent("onLoad")}if(R=="onLoad"&&O!="player"){return}if(R=="onError"){if(typeof O=="string"||(typeof O=="number"&&typeof M=="number")){O=M;M=L}}if(R=="onContextMenu"){m(t.contextMenu[O],function(S,T){T.call(w)});return}if(R=="onPluginEvent"||R=="onBeforePluginEvent"){var H=O.name||O;var I=y[H];if(I){I._fireEvent("onUpdate",O);return I._fireEvent(M,Q.slice(3))}return}if(R=="onPlaylistReplace"){F=[];var N=0;m(O,function(){F.push(new h(this,N++,w))})}if(R=="onClipAdd"){if(O.isInStream){return}O=new h(O,M,w);F.splice(M,0,O);for(K=M+1;K<F.length;K++){F[K].index++}}var P=true;if(typeof O=="number"&&O<F.length){C=O;var J=F[O];if(J){P=J._fireEvent(R,M,L)}if(!J||P!==false){P=s._fireEvent(R,M,L,J)}}m(x[R],function(){P=this.call(w,O,M);if(this.cached){x[R].splice(K,1)}if(P===false){return false}K++});return P};function B(){if($f(q)){$f(q).getParent().innerHTML="";p=$f(q).getIndex();a[p]=w}else{a.push(w);p=a.length-1}A=parseInt(q.style.height,10)||q.clientHeight;E=q.id||"fp"+e();r=G.id||E+"_api";G.id=r;t.playerId=E;if(typeof t=="string"){t={clip:{url:t}}}if(typeof t.clip=="string"){t.clip={url:t.clip}}t.clip=t.clip||{};if(q.getAttribute("href",2)&&!t.clip.url){t.clip.url=q.getAttribute("href",2)}s=new h(t.clip,-1,w);t.playlist=t.playlist||[t.clip];var I=0;m(t.playlist,function(){var K=this;if(typeof K=="object"&&K.length){K={url:""+K}}m(t.clip,function(L,M){if(M!==undefined&&K[L]===undefined&&typeof M!="function"){K[L]=M}});t.playlist[I]=K;K=new h(K,I,w);F.push(K);I++});m(t,function(K,L){if(typeof L=="function"){if(s[K]){s[K](L)}else{j(x,K,L)}delete t[K]}});m(t.plugins,function(K,L){if(L){y[K]=new l(K,L,w)}});if(!t.plugins||t.plugins.controls===undefined){y.controls=new l("controls",null,w)}y.canvas=new l("canvas",null,w);u=q.innerHTML;function J(L){var K=w.hasiPadSupport&&w.hasiPadSupport();if(/iPad|iPhone|iPod/i.test(navigator.userAgent)&&!/.flv$/i.test(F[0].url)&&!K){return true}if(!w.isLoaded()&&w._fireEvent("onBeforeClick")!==false){w.load()}return f(L)}function H(){if(u.replace(/\s/g,"")!==""){if(q.addEventListener){q.addEventListener("click",J,false)}else{if(q.attachEvent){q.attachEvent("onclick",J)}}}else{if(q.addEventListener){q.addEventListener("click",f,false)}w.load()}}setTimeout(H,0)}if(typeof q=="string"){var z=c(q);if(!z){throw"Flowplayer cannot access element: "+q}q=z;B()}else{B()}}var a=[];function d(o){this.length=o.length;this.each=function(p){m(o,p)};this.size=function(){return o.length}}window.flowplayer=window.$f=function(){var p=null;var o=arguments[0];if(!arguments.length){m(a,function(){if(this.isLoaded()){p=this;return false}});return p||a[0]}if(arguments.length==1){if(typeof o=="number"){return a[o]}else{if(o=="*"){return new d(a)}m(a,function(){if(this.id()==o.id||this.id()==o||this.getParent()==o){p=this;return false}});return p}}if(arguments.length>1){var t=arguments[1],q=(arguments.length==3)?arguments[2]:{};if(typeof t=="string"){t={src:t}}t=i({bgcolor:"#000000",version:[9,0],expressInstall:"http://static.flowplayer.org/swf/expressinstall.swf",cachebusting:true},t);if(typeof o=="string"){if(o.indexOf(".")!=-1){var s=[];m(n(o),function(){s.push(new b(this,k(t),k(q)))});return new d(s)}else{var r=c(o);return new b(r!==null?r:o,t,q)}}else{if(o){return new b(o,t,q)}}}return null};i(window.$f,{fireEvent:function(){var o=[].slice.call(arguments);var q=$f(o[0]);return q?q._fireEvent(o.slice(1)):null},addPlugin:function(o,p){b.prototype[o]=p;return $f},each:m,extend:i});if(typeof jQuery=="function"){jQuery.fn.flowplayer=function(q,p){if(!arguments.length||typeof arguments[0]=="number"){var o=[];this.each(function(){var r=$f(this);if(r){o.push(r)}});return arguments.length?o[arguments[0]]:new d(o)}return this.each(function(){$f(this,k(q),p?k(p):{})})}}})();(function(){var h=document.all,j="http://www.adobe.com/go/getflashplayer",c=typeof jQuery=="function",e=/(\d+)[^\d]+(\d+)[^\d]*(\d*)/,b={width:"100%",height:"100%",id:"_"+(""+Math.random()).slice(9),allowfullscreen:true,allowscriptaccess:"always",quality:"high",version:[3,0],onFail:null,expressInstall:null,w3c:false,cachebusting:false};if(window.attachEvent){window.attachEvent("onbeforeunload",function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){}})}function i(m,l){if(l){for(var f in l){if(l.hasOwnProperty(f)){m[f]=l[f]}}}return m}function a(f,n){var m=[];for(var l in f){if(f.hasOwnProperty(l)){m[l]=n(f[l])}}return m}window.flashembed=function(f,m,l){if(typeof f=="string"){f=document.getElementById(f.replace("#",""))}if(!f){return}if(typeof m=="string"){m={src:m}}return new d(f,i(i({},b),m),l)};var g=i(window.flashembed,{conf:b,getVersion:function(){var m,f;try{f=navigator.plugins["Shockwave Flash"].description.slice(16)}catch(o){try{m=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");f=m&&m.GetVariable("$version")}catch(n){try{m=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");f=m&&m.GetVariable("$version")}catch(l){}}}f=e.exec(f);return f?[f[1],f[3]]:[0,0]},asString:function(l){if(l===null||l===undefined){return null}var f=typeof l;if(f=="object"&&l.push){f="array"}switch(f){case"string":l=l.replace(new RegExp('(["\\\\])',"g"),"\\$1");l=l.replace(/^\s?(\d+\.?\d+)%/,"$1pct");return'"'+l+'"';case"array":return"["+a(l,function(o){return g.asString(o)}).join(",")+"]";case"function":return'"function()"';case"object":var m=[];for(var n in l){if(l.hasOwnProperty(n)){m.push('"'+n+'":'+g.asString(l[n]))}}return"{"+m.join(",")+"}"}return String(l).replace(/\s/g," ").replace(/\'/g,'"')},getHTML:function(o,l){o=i({},o);var n='<object width="'+o.width+'" height="'+o.height+'" id="'+o.id+'" name="'+o.id+'"';if(o.cachebusting){o.src+=((o.src.indexOf("?")!=-1?"&":"?")+Math.random())}if(o.w3c||!h){n+=' data="'+o.src+'" type="application/x-shockwave-flash"'}else{n+=' classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'}n+=">";if(o.w3c||h){n+='<param name="movie" value="'+o.src+'" />'}o.width=o.height=o.id=o.w3c=o.src=null;o.onFail=o.version=o.expressInstall=null;for(var m in o){if(o[m]){n+='<param name="'+m+'" value="'+o[m]+'" />'}}var p="";if(l){for(var f in l){if(l[f]){var q=l[f];p+=f+"="+(/function|object/.test(typeof q)?g.asString(q):q)+"&"}}p=p.slice(0,-1);n+='<param name="flashvars" value=\''+p+"' />"}n+="</object>";return n},isSupported:function(f){return k[0]>f[0]||k[0]==f[0]&&k[1]>=f[1]}});var k=g.getVersion();function d(f,n,m){if(g.isSupported(n.version)){f.innerHTML=g.getHTML(n,m)}else{if(n.expressInstall&&g.isSupported([6,65])){f.innerHTML=g.getHTML(i(n,{src:n.expressInstall}),{MMredirectURL:location.href,MMplayerType:"PlugIn",MMdoctitle:document.title})}else{if(!f.innerHTML.replace(/\s/g,"")){f.innerHTML="<h2>Flash version "+n.version+" or greater is required</h2><h3>"+(k[0]>0?"Your version is "+k:"You have no flash plugin installed")+"</h3>"+(f.tagName=="A"?"<p>Click here to download latest version</p>":"<p>Download latest version from <a href='"+j+"'>here</a></p>");if(f.tagName=="A"){f.onclick=function(){location.href=j}}}if(n.onFail){var l=n.onFail.call(this);if(typeof l=="string"){f.innerHTML=l}}}}if(h){window[n.id]=document.getElementById(n.id)}i(this,{getRoot:function(){return f},getOptions:function(){return n},getConf:function(){return m},getApi:function(){return f.firstChild}})}if(c){jQuery.tools=jQuery.tools||{version:"3.2.4"};jQuery.tools.flashembed={conf:b};jQuery.fn.flashembed=function(l,f){return this.each(function(){$(this).data("flashembed",flashembed(this,l,f))})}}})();

/*	SWFObject v2.2 <http://code.google.com/p/swfobject/> 
	is released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
var swfobject=function(){var D="undefined",r="object",S="Shockwave Flash",W="ShockwaveFlash.ShockwaveFlash",q="application/x-shockwave-flash",R="SWFObjectExprInst",x="onreadystatechange",O=window,j=document,t=navigator,T=false,U=[h],o=[],N=[],I=[],l,Q,E,B,J=false,a=false,n,G,m=true,M=function(){var aa=typeof j.getElementById!=D&&typeof j.getElementsByTagName!=D&&typeof j.createElement!=D,ah=t.userAgent.toLowerCase(),Y=t.platform.toLowerCase(),ae=Y?/win/.test(Y):/win/.test(ah),ac=Y?/mac/.test(Y):/mac/.test(ah),af=/webkit/.test(ah)?parseFloat(ah.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,X=!+"\v1",ag=[0,0,0],ab=null;if(typeof t.plugins!=D&&typeof t.plugins[S]==r){ab=t.plugins[S].description;if(ab&&!(typeof t.mimeTypes!=D&&t.mimeTypes[q]&&!t.mimeTypes[q].enabledPlugin)){T=true;X=false;ab=ab.replace(/^.*\s+(\S+\s+\S+$)/,"$1");ag[0]=parseInt(ab.replace(/^(.*)\..*$/,"$1"),10);ag[1]=parseInt(ab.replace(/^.*\.(.*)\s.*$/,"$1"),10);ag[2]=/[a-zA-Z]/.test(ab)?parseInt(ab.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0}}else{if(typeof O.ActiveXObject!=D){try{var ad=new ActiveXObject(W);if(ad){ab=ad.GetVariable("$version");if(ab){X=true;ab=ab.split(" ")[1].split(",");ag=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}}catch(Z){}}}return{w3:aa,pv:ag,wk:af,ie:X,win:ae,mac:ac}}(),k=function(){if(!M.w3){return}if((typeof j.readyState!=D&&j.readyState=="complete")||(typeof j.readyState==D&&(j.getElementsByTagName("body")[0]||j.body))){f()}if(!J){if(typeof j.addEventListener!=D){j.addEventListener("DOMContentLoaded",f,false)}if(M.ie&&M.win){j.attachEvent(x,function(){if(j.readyState=="complete"){j.detachEvent(x,arguments.callee);f()}});if(O==top){(function(){if(J){return}try{j.documentElement.doScroll("left")}catch(X){setTimeout(arguments.callee,0);return}f()})()}}if(M.wk){(function(){if(J){return}if(!/loaded|complete/.test(j.readyState)){setTimeout(arguments.callee,0);return}f()})()}s(f)}}();function f(){if(J){return}try{var Z=j.getElementsByTagName("body")[0].appendChild(C("span"));Z.parentNode.removeChild(Z)}catch(aa){return}J=true;var X=U.length;for(var Y=0;Y<X;Y++){U[Y]()}}function K(X){if(J){X()}else{U[U.length]=X}}function s(Y){if(typeof O.addEventListener!=D){O.addEventListener("load",Y,false)}else{if(typeof j.addEventListener!=D){j.addEventListener("load",Y,false)}else{if(typeof O.attachEvent!=D){i(O,"onload",Y)}else{if(typeof O.onload=="function"){var X=O.onload;O.onload=function(){X();Y()}}else{O.onload=Y}}}}}function h(){if(T){V()}else{H()}}function V(){var X=j.getElementsByTagName("body")[0];var aa=C(r);aa.setAttribute("type",q);var Z=X.appendChild(aa);if(Z){var Y=0;(function(){if(typeof Z.GetVariable!=D){var ab=Z.GetVariable("$version");if(ab){ab=ab.split(" ")[1].split(",");M.pv=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}else{if(Y<10){Y++;setTimeout(arguments.callee,10);return}}X.removeChild(aa);Z=null;H()})()}else{H()}}function H(){var ag=o.length;if(ag>0){for(var af=0;af<ag;af++){var Y=o[af].id;var ab=o[af].callbackFn;var aa={success:false,id:Y};if(M.pv[0]>0){var ae=c(Y);if(ae){if(F(o[af].swfVersion)&&!(M.wk&&M.wk<312)){w(Y,true);if(ab){aa.success=true;aa.ref=z(Y);ab(aa)}}else{if(o[af].expressInstall&&A()){var ai={};ai.data=o[af].expressInstall;ai.width=ae.getAttribute("width")||"0";ai.height=ae.getAttribute("height")||"0";if(ae.getAttribute("class")){ai.styleclass=ae.getAttribute("class")}if(ae.getAttribute("align")){ai.align=ae.getAttribute("align")}var ah={};var X=ae.getElementsByTagName("param");var ac=X.length;for(var ad=0;ad<ac;ad++){if(X[ad].getAttribute("name").toLowerCase()!="movie"){ah[X[ad].getAttribute("name")]=X[ad].getAttribute("value")}}P(ai,ah,Y,ab)}else{p(ae);if(ab){ab(aa)}}}}}else{w(Y,true);if(ab){var Z=z(Y);if(Z&&typeof Z.SetVariable!=D){aa.success=true;aa.ref=Z}ab(aa)}}}}}function z(aa){var X=null;var Y=c(aa);if(Y&&Y.nodeName=="OBJECT"){if(typeof Y.SetVariable!=D){X=Y}else{var Z=Y.getElementsByTagName(r)[0];if(Z){X=Z}}}return X}function A(){return !a&&F("6.0.65")&&(M.win||M.mac)&&!(M.wk&&M.wk<312)}function P(aa,ab,X,Z){a=true;E=Z||null;B={success:false,id:X};var ae=c(X);if(ae){if(ae.nodeName=="OBJECT"){l=g(ae);Q=null}else{l=ae;Q=X}aa.id=R;if(typeof aa.width==D||(!/%$/.test(aa.width)&&parseInt(aa.width,10)<310)){aa.width="310"}if(typeof aa.height==D||(!/%$/.test(aa.height)&&parseInt(aa.height,10)<137)){aa.height="137"}j.title=j.title.slice(0,47)+" - Flash Player Installation";var ad=M.ie&&M.win?"ActiveX":"PlugIn",ac="MMredirectURL="+O.location.toString().replace(/&/g,"%26")+"&MMplayerType="+ad+"&MMdoctitle="+j.title;if(typeof ab.flashvars!=D){ab.flashvars+="&"+ac}else{ab.flashvars=ac}if(M.ie&&M.win&&ae.readyState!=4){var Y=C("div");X+="SWFObjectNew";Y.setAttribute("id",X);ae.parentNode.insertBefore(Y,ae);ae.style.display="none";(function(){if(ae.readyState==4){ae.parentNode.removeChild(ae)}else{setTimeout(arguments.callee,10)}})()}u(aa,ab,X)}}function p(Y){if(M.ie&&M.win&&Y.readyState!=4){var X=C("div");Y.parentNode.insertBefore(X,Y);X.parentNode.replaceChild(g(Y),X);Y.style.display="none";(function(){if(Y.readyState==4){Y.parentNode.removeChild(Y)}else{setTimeout(arguments.callee,10)}})()}else{Y.parentNode.replaceChild(g(Y),Y)}}function g(ab){var aa=C("div");if(M.win&&M.ie){aa.innerHTML=ab.innerHTML}else{var Y=ab.getElementsByTagName(r)[0];if(Y){var ad=Y.childNodes;if(ad){var X=ad.length;for(var Z=0;Z<X;Z++){if(!(ad[Z].nodeType==1&&ad[Z].nodeName=="PARAM")&&!(ad[Z].nodeType==8)){aa.appendChild(ad[Z].cloneNode(true))}}}}}return aa}function u(ai,ag,Y){var X,aa=c(Y);if(M.wk&&M.wk<312){return X}if(aa){if(typeof ai.id==D){ai.id=Y}if(M.ie&&M.win){var ah="";for(var ae in ai){if(ai[ae]!=Object.prototype[ae]){if(ae.toLowerCase()=="data"){ag.movie=ai[ae]}else{if(ae.toLowerCase()=="styleclass"){ah+=' class="'+ai[ae]+'"'}else{if(ae.toLowerCase()!="classid"){ah+=" "+ae+'="'+ai[ae]+'"'}}}}}var af="";for(var ad in ag){if(ag[ad]!=Object.prototype[ad]){af+='<param name="'+ad+'" value="'+ag[ad]+'" />'}}aa.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+ah+">"+af+"</object>";N[N.length]=ai.id;X=c(ai.id)}else{var Z=C(r);Z.setAttribute("type",q);for(var ac in ai){if(ai[ac]!=Object.prototype[ac]){if(ac.toLowerCase()=="styleclass"){Z.setAttribute("class",ai[ac])}else{if(ac.toLowerCase()!="classid"){Z.setAttribute(ac,ai[ac])}}}}for(var ab in ag){if(ag[ab]!=Object.prototype[ab]&&ab.toLowerCase()!="movie"){e(Z,ab,ag[ab])}}aa.parentNode.replaceChild(Z,aa);X=Z}}return X}function e(Z,X,Y){var aa=C("param");aa.setAttribute("name",X);aa.setAttribute("value",Y);Z.appendChild(aa)}function y(Y){var X=c(Y);if(X&&X.nodeName=="OBJECT"){if(M.ie&&M.win){X.style.display="none";(function(){if(X.readyState==4){b(Y)}else{setTimeout(arguments.callee,10)}})()}else{X.parentNode.removeChild(X)}}}function b(Z){var Y=c(Z);if(Y){for(var X in Y){if(typeof Y[X]=="function"){Y[X]=null}}Y.parentNode.removeChild(Y)}}function c(Z){var X=null;try{X=j.getElementById(Z)}catch(Y){}return X}function C(X){return j.createElement(X)}function i(Z,X,Y){Z.attachEvent(X,Y);I[I.length]=[Z,X,Y]}function F(Z){var Y=M.pv,X=Z.split(".");X[0]=parseInt(X[0],10);X[1]=parseInt(X[1],10)||0;X[2]=parseInt(X[2],10)||0;return(Y[0]>X[0]||(Y[0]==X[0]&&Y[1]>X[1])||(Y[0]==X[0]&&Y[1]==X[1]&&Y[2]>=X[2]))?true:false}function v(ac,Y,ad,ab){if(M.ie&&M.mac){return}var aa=j.getElementsByTagName("head")[0];if(!aa){return}var X=(ad&&typeof ad=="string")?ad:"screen";if(ab){n=null;G=null}if(!n||G!=X){var Z=C("style");Z.setAttribute("type","text/css");Z.setAttribute("media",X);n=aa.appendChild(Z);if(M.ie&&M.win&&typeof j.styleSheets!=D&&j.styleSheets.length>0){n=j.styleSheets[j.styleSheets.length-1]}G=X}if(M.ie&&M.win){if(n&&typeof n.addRule==r){n.addRule(ac,Y)}}else{if(n&&typeof j.createTextNode!=D){n.appendChild(j.createTextNode(ac+" {"+Y+"}"))}}}function w(Z,X){if(!m){return}var Y=X?"visible":"hidden";if(J&&c(Z)){c(Z).style.visibility=Y}else{v("#"+Z,"visibility:"+Y)}}function L(Y){var Z=/[\\\"<>\.;]/;var X=Z.exec(Y)!=null;return X&&typeof encodeURIComponent!=D?encodeURIComponent(Y):Y}var d=function(){if(M.ie&&M.win){window.attachEvent("onunload",function(){var ac=I.length;for(var ab=0;ab<ac;ab++){I[ab][0].detachEvent(I[ab][1],I[ab][2])}var Z=N.length;for(var aa=0;aa<Z;aa++){y(N[aa])}for(var Y in M){M[Y]=null}M=null;for(var X in swfobject){swfobject[X]=null}swfobject=null})}}();return{registerObject:function(ab,X,aa,Z){if(M.w3&&ab&&X){var Y={};Y.id=ab;Y.swfVersion=X;Y.expressInstall=aa;Y.callbackFn=Z;o[o.length]=Y;w(ab,false)}else{if(Z){Z({success:false,id:ab})}}},getObjectById:function(X){if(M.w3){return z(X)}},embedSWF:function(ab,ah,ae,ag,Y,aa,Z,ad,af,ac){var X={success:false,id:ah};if(M.w3&&!(M.wk&&M.wk<312)&&ab&&ah&&ae&&ag&&Y){w(ah,false);K(function(){ae+="";ag+="";var aj={};if(af&&typeof af===r){for(var al in af){aj[al]=af[al]}}aj.data=ab;aj.width=ae;aj.height=ag;var am={};if(ad&&typeof ad===r){for(var ak in ad){am[ak]=ad[ak]}}if(Z&&typeof Z===r){for(var ai in Z){if(typeof am.flashvars!=D){am.flashvars+="&"+ai+"="+Z[ai]}else{am.flashvars=ai+"="+Z[ai]}}}if(F(Y)){var an=u(aj,am,ah);if(aj.id==ah){w(ah,true)}X.success=true;X.ref=an}else{if(aa&&A()){aj.data=aa;P(aj,am,ah,ac);return}else{w(ah,true)}}if(ac){ac(X)}})}else{if(ac){ac(X)}}},switchOffAutoHideShow:function(){m=false},ua:M,getFlashPlayerVersion:function(){return{major:M.pv[0],minor:M.pv[1],release:M.pv[2]}},hasFlashPlayerVersion:F,createSWF:function(Z,Y,X){if(M.w3){return u(Z,Y,X)}else{return undefined}},showExpressInstall:function(Z,aa,X,Y){if(M.w3&&A()){P(Z,aa,X,Y)}},removeSWF:function(X){if(M.w3){y(X)}},createCSS:function(aa,Z,Y,X){if(M.w3){v(aa,Z,Y,X)}},addDomLoadEvent:K,addLoadEvent:s,getQueryParamValue:function(aa){var Z=j.location.search||j.location.hash;if(Z){if(/\?/.test(Z)){Z=Z.split("?")[1]}if(aa==null){return L(Z)}var Y=Z.split("&");for(var X=0;X<Y.length;X++){if(Y[X].substring(0,Y[X].indexOf("="))==aa){return L(Y[X].substring((Y[X].indexOf("=")+1)))}}}return""},expressInstallCallback:function(){if(a){var X=c(R);if(X&&l){X.parentNode.replaceChild(l,X);if(Q){w(Q,true);if(M.ie&&M.win){l.style.display="block"}}if(E){E(B)}}a=false}}}}();
