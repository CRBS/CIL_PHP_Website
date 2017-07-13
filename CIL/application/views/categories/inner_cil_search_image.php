
<div class="row">
    <div class="col-md-6">
<?php
     $nid = str_replace("CIL_", "", $id);
     //echo "id:".$nid."<br/>";
     $imageURL = $cil_image_prefix."/".$nid."/display_".$nid.".png";
?>
    <img width="140" src="<?php echo $imageURL; ?>"/>
    </div>
    <div class="col-md-6">
        
        
    </div>
    
</div>