<?php
    $core = NULL;
    $nid = str_replace("CCDB_", "", $id);
?>
<div class="row search_result_row">
    <div class="col-md-5">
<?php
     
     $imageURL = "";
     if(isset($image->_source->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->URL))
         $imageURL = $image->_source->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->URL;
     else if(isset($image->_source->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->URL))
         $imageURL =  $image->_source->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->URL;
     else if(isset($image->_source->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->URL))
          $imageURL = $image->_source->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->URL;
     
     //echo "---ImageURL:".$imageURL."<br/>";
?>
        <center><div class="thumbnail-kenburn">
                <a href="/images/<?php echo $id; ?>"><img width="140" src="<?php echo $imageURL; ?>"/></a>
            </div>
        </center>
    </div>
    <div class="col-md-5">
        <!---------------testing--------------->
<div class="container_6  ">
<a href="/images/<?php echo $id; ?>" class="pull-left">

<dl class="cil_info">
    <dt class="cil"><b>CCDB:<?php echo $nid; ?></b></dt>
</dl>
<dl class="biological_sources">
<dt><b>Species</b></dt>
<dd>
<span title="">
<em>
<?php
    if(isset($image->_source->CIL_CCDB->CCDB->Subject->Species))
    {
        echo $image->_source->CIL_CCDB->CCDB->Subject->Species;
    }
    else 
    {
        echo "none specified";
    }

?></em>
</span>
</dd>
<dt><b>Organ</b></dt>
<dd>
<span>
<?php
    if(isset($image->_source->CIL_CCDB->CCDB->Specimen_description->Organ))
    {
        echo $image->_source->CIL_CCDB->CCDB->Specimen_description->Organ;
    }
    else 
    {
        echo "none specified";
    }

?>
</span>
</dd>
<dt><b>Cell type</b></dt>
<dd>
<span title="">
<?php
    if(isset($image->_source->CIL_CCDB->CCDB->Specimen_description->Cell_type))
    {
        echo $image->_source->CIL_CCDB->CCDB->Specimen_description->Cell_type;
    }
    else 
    {
        echo "none specified";
    }

?>
</span>
</dd>
<dt><b>System</b></dt>
<dd>
<span title="">
<?php
    if(isset($image->_source->CIL_CCDB->CCDB->Specimen_description->System))
    {
        echo $image->_source->CIL_CCDB->CCDB->Specimen_description->System;
    }
    else 
    {
        echo "none specified";
    }

?>
</span>
</dd>
<dt><b>Structure</b></dt>
<dd>
<span title="">
<?php
    if(isset($image->_source->CIL_CCDB->CCDB->Specimen_description->Structure))
    {
        echo $image->_source->CIL_CCDB->CCDB->Specimen_description->Structure;
    }
    else 
    {
        echo "none specified";
    }

?>
</span>
</dd>
</dl>
    <div class="description">
<?php
    if(isset($image->_source->CIL_CCDB->CCDB->Experiment->Title))
    {
        echo $image->_source->CIL_CCDB->CCDB->Experiment->Title;
    }
    else 
    {
        echo "none specified";
    }

?>
        
    </div>

</a>
</div>

    </div>
    <div class="col-md-2">
        
    </div>
    
</div>
