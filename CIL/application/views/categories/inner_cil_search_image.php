<?php
    $core = $image->_source->CIL_CCDB->CIL->CORE;

?>
<div class="row search_result_row">
    <div class="col-md-5">
<?php
     $nid = str_replace("CIL_", "", $id);
     //echo "id:".$nid."<br/>";
     //$imageURL = $cil_image_prefix."/".$nid."/display_".$nid.".png";
     $imageURL = $cil_image_prefix."/".$nid."/".$nid."_thumbnailx140.jpg";
?>
        <center><div class="thumbnail-kenburn">
                <a href="/images/<?php echo $nid; ?>"><img width="140" src="<?php echo $imageURL; ?>"/></a>
            </div>
        </center>
    </div>
    <div class="col-md-5">
        <!---------------testing--------------->
<div class="container_6  ">
<a href="/images/<?php echo $nid; ?>" class="pull-left">

<dl class="cil_info">
    <dt class="cil"><b>CIL:<?php echo $nid; ?></b></dt>
</dl>
<dl class="biological_sources">
<dt><b>NCBI Organism Classification</b></dt>
<dd>
<span title="">
<em>
<?php
    if(isset($core->NCBIORGANISMALCLASSIFICATION))
    {
        if(!is_array($core->NCBIORGANISMALCLASSIFICATION))
        {
            if(isset($core->NCBIORGANISMALCLASSIFICATION->onto_name))
                echo $core->NCBIORGANISMALCLASSIFICATION->onto_name;
            else if(isset($core->NCBIORGANISMALCLASSIFICATION->free_text))
                echo $core->NCBIORGANISMALCLASSIFICATION->free_text;
        }
        else if(is_array($core->NCBIORGANISMALCLASSIFICATION) && count($core->NCBIORGANISMALCLASSIFICATION)> 0)
        {
            $ncbio = $core->NCBIORGANISMALCLASSIFICATION[0];
            if(isset($ncbio->onto_name))
                echo $ncbio->onto_name;
            else if(isset($ncbio->free_text))
                echo $ncbio->free_text;
        }
        else 
        {
            echo "none specified";
        }
    }
    else 
    {
        echo "none specified";
    }

?></em>
</span>
</dd>
<dt><b>Biological Process</b></dt>
<dd>
<span>
<?php
    if(isset($core->BIOLOGICALPROCESS))
    {
        if(!is_array($core->BIOLOGICALPROCESS))
        {
            if(isset($core->BIOLOGICALPROCESS->onto_name))
                echo $core->BIOLOGICALPROCESS->onto_name;
            else if(isset($core->BIOLOGICALPROCESS->free_text))
                echo $core->BIOLOGICALPROCESS->free_text;
        }
        else if(is_array($core->BIOLOGICALPROCESS) && count($core->BIOLOGICALPROCESS)> 0)
        {
            $bio = $core->BIOLOGICALPROCESS[0];
            if(isset($bio->onto_name))
                echo $bio->onto_name;
            else if(isset($bio->free_text))
                echo $bio->free_text;
        }
        else 
        {
            echo "none specified";
        }
    }
    else 
    {
        echo "none specified";
    }

?>
</span>
</dd>
<dt><b>Cellular Component</b></dt>
<dd>
<span title="">
<?php
    if(isset($core->CELLULARCOMPONENT))
    {
        if(!is_array($core->CELLULARCOMPONENT))
        {
            if(isset($core->CELLULARCOMPONENT->onto_name))
                echo $core->CELLULARCOMPONENT->onto_name;
            else if(isset($core->CELLULARCOMPONENT->free_text))
                echo $core->CELLULARCOMPONENT->free_text;
        }
        else if(is_array($core->CELLULARCOMPONENT) && count($core->CELLULARCOMPONENT)> 0)
        {
            $cellc = $core->CELLULARCOMPONENT[0];
            if(isset($cellc->onto_name))
                echo $cellc->onto_name;
            else if(isset($cellc->free_text))
                echo $cellc->free_text;
        }
        else 
        {
            echo "none specified";
        }
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
    if(isset($core->IMAGEDESCRIPTION->free_text))
    {
        $length = 200;
        $desc = "";
        $desc_count = strlen($core->IMAGEDESCRIPTION->free_text);
        if($desc_count > $length)
        {
            $desc = substr($core->IMAGEDESCRIPTION->free_text, 0, $length)."...";
        }
        else 
        {
            $desc = $core->IMAGEDESCRIPTION->free_text;
        }
        echo $desc;
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
