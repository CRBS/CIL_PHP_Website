<?php
    
    $icell = "";
    if(isset($settings->_source->Home_page->{"Interactive cells"}))
        $icell = $settings->_source->Home_page->{"Interactive cells"};
       
    if(strcmp($icell,"Paramecium")==0)
        include_once 'paramecium.php';
    else if(strcmp($icell,"Eukaryotic")==0)
        include_once 'eukaryotic.php';
    else
        include_once 'escherichia.php';
?>

