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


} );

