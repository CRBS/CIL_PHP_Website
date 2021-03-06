$( function() {
$('#k_adv').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/general_terms/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_biological_process').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/biological_processes/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_cell_type').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/cell_types/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_foundational_model_anatomy').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/anatomical_entities/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_cellular_component').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/cellular_components/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_ncbi').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/ncbi_organism/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_molecular_function').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/molecular_functions/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_cell_line').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/cell_lines/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_item_type_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});


$('#image_search_parms_image_mode_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_visualization_methods_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_source_of_contrast_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});


$('#image_search_parms_relation_to_intact_cell_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_processing_history_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});


$('#image_search_parms_preparation_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_parameter_imaged_bim').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/imaging_methods/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});


$('#image_search_parms_human_dev_anatomy').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/human_development_anatomies/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_human_disease').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/human_diseases/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_mouse_gross_anatomy').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/mouse_gross_anatomies/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});


$('#image_search_parms_mouse_pathology').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/mouse_pathologies/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_plant_growth').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/plant_growths/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_teleost_anatomy').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/teleost_anatomies/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_xenopus_anatomy').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/xenopus_anatomies/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});

$('#image_search_parms_zebrafish_anatomy').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/zebrafish_anatomies/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});


} );

