
//<![CDATA[
document.onclick=check;

var autocomplete_receiving_field_id = "";

var button_div_map_array = new Array();
button_div_map_array['biological_process_button'] = 'biological_process_div';
button_div_map_array['cell_type_button'] =  'cell_type_div';
button_div_map_array['cellular_component_button'] = 'cellular_component_div';
button_div_map_array['molecular_function_button'] = 'molecular_function_div';
button_div_map_array['ncbi_button'] = 'ncbi_div';
button_div_map_array['item_type_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['image_mode_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['parameter_imaged_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['preparation_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['processing_history_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['relation_to_intact_cell_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['source_of_contrast_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['visualization_methods_bim_button'] = 'biological_imaging_method_div';
button_div_map_array['identity_bim_button'] = 'biological_imaging_method_div';

button_div_map_array['teleost_anatomy_button'] = 'teleost_anatomy_div';
button_div_map_array['human_disease_button'] = 'human_disease_div';
button_div_map_array['human_dev_anatomy_button'] = 'human_dev_anatomy_div';
button_div_map_array['human_disease_button'] = 'human_disease_div';
button_div_map_array['teleost_anatomy_button'] = 'teleost_anatomy_div';
button_div_map_array['mouse_pathology_button'] = 'mouse_pathology_div';
button_div_map_array['zebrafish_anatomy_button'] = 'zebrafish_anatomy_div';
button_div_map_array['xenopus_anatomy_button'] = 'xenopus_anatomy_div';
button_div_map_array['mouse_gross_anatomy_button'] = 'mouse_gross_anatomy_div';
button_div_map_array['plant_growth_button'] = 'plant_growth_div';

// copy the divs above into a new array
var button_div_list = new Array()
var k = 0;
  for (var i in button_div_map_array)
  {
    button_div_list[k++] = new String(button_div_map_array[i]);
  }

function accept_term(popup_div)
{
  /* copy from hidden to autocomplete field */
  var hidden_ctrl = document.getElementById('hidden_popup_value_field');
  var autocomplete_ctr = document.getElementById(autocomplete_receiving_field_id);

  if(hidden_ctrl.value == '')
    {
      alert("Please select a term.");
      return;
    }
  autocomplete_ctr.value = hidden_ctrl.value;
  cancel_viewer(popup_div);
}
function cancel_viewer(popup_div)
{
    var div_obj = document.getElementById(popup_div);
    if(div_obj != null)
    {
      popup_fade(popup_div,false);
    }
}

function prepForOntoPopup(receiving_field_id_prefix)
{
  // let the onto popup know the field it should put the selected value into
  autocomplete_receiving_field_id = 'image_search_parms_' + receiving_field_id_prefix;
  // reset to nothing selected
  document.getElementById('hidden_popup_value_field').value = ''
}

function cancelOtherViewers(id)
{
  var isOpenButton = false;

  for (var i in button_div_map_array)
  {
    if(id == i)
      {
        isOpenButton = true;
        for(j=0; j < button_div_list.length; ++j)
          {
              var divNameToClose = button_div_list[j];
              if(divNameToClose != button_div_map_array[i])
                {
                  cancel_viewer(divNameToClose);
                }
          }
          return true;
      }
    }
    return isOpenButton;
}
function check(e){
  var target = (e && e.target) || (event && event.srcElement);

  /* if one of the buttons close the others */
  if(cancelOtherViewers(target.id))
    {
      return; // if it was an open button then don't do any more'
    }

  <%=  div_check_blocks onto_list %>

}

function checkParent(t, compDiv){
  while(t.parentNode){
    if(t==document.getElementById(compDiv)){
      return false
    }
    t=t.parentNode
  }
  return true
}

function hide_show_div(div_id, button_id) {
	var ele = document.getElementById(div_id);
	var button = document.getElementById(button_id);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
                button.value = "Show Advanced Filters";
  	}
	else {
		ele.style.display = "block";
                button.value = 'Hide Advanced Filters';
	}
}