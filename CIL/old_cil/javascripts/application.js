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
  $.ajax({
    type: 'GET',
    url: final_url,
    datatype: 'text',
    async: false,
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
  error:function(){
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

