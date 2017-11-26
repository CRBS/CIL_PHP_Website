$( function() {
$( "#cilia" ).mouseover(function() {
    console.log('cilia in');
    document.getElementById('cilia').className  = 'list-group-item selected_blue';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/cilia.png';
});

$( "#cilia" ).mouseout(function() {
    console.log('cilia out');
    document.getElementById('cilia').className  = 'list-group-item';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/default.png';
    
});


$( "#contractile_vacuole" ).mouseover(function() {
    console.log('contractile_vacuole in');
    document.getElementById('contractile_vacuole').className  = 'list-group-item selected_blue';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/contractile_vacuole.png';
});

$( "#contractile_vacuole" ).mouseout(function() {
    console.log('contractile_vacuole out');
    document.getElementById('contractile_vacuole').className  = 'list-group-item';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/default.png';
    
});

$( "#cytoplasm" ).mouseover(function() {
    console.log('cytoplasm in');
    document.getElementById('cytoplasm').className  = 'list-group-item selected_blue';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/cytoplasm.png';
});

$( "#cytoplasm" ).mouseout(function() {
    console.log('cytoplasm out');
    document.getElementById('cytoplasm').className  = 'list-group-item';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/default.png';
    
});

} );