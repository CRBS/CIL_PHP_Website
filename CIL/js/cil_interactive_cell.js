$( function() {
$( "#cilia" ).mouseover(function() {
    console.log('cilia over');
    document.getElementById('cilia').className  = 'list-group-item selected_blue';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/cilia.png';
});

$( "#cilia" ).mouseout(function() {
    console.log('cilia out');
    document.getElementById('cilia').className  = 'list-group-item';
    document.getElementById('paramecium_img').src = '/pic/interactive_cells/paramecium/default.png';
    
});



} );