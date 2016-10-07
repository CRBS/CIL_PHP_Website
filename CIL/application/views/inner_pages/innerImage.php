<div class="row">
                 
                
<?php
        $cil_zero_size = 5198;
        //echo $imageID;
        $displayURL = "http://www.cellimagelibrary.org/cil_ccdb/images/".$imageID."/".$imageID.".jpg";
        $size =  $cutil->getURLFileSize($displayURL);
        
        if($size > $cil_zero_size )
        {
?>
    <div class="col-md-12">
        <center><img src="<?php echo $displayURL; ?>" class="img-rounded" width="450"></center>
    </div>  
<?php
        }
?>

    
</div>