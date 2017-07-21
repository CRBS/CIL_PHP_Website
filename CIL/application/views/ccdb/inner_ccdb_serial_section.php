<h2 class='detailed_description'>Imaging product type</h2>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Serial section
                    </dd>
                </dl>
            </div>
</div>


<!--------------------Cutting_plane------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Cutting_plane) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Cutting plane</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Cutting_plane; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Cutting_plane------------------------->

<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->


<!--------------------Z_resolution------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Z_resolution->value) &&
            isset($result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Z_resolution->unit))
    {
        $zr_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Z_resolution->value;
        $zr_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Z_resolution->unit;
        
        if(strcmp($zr_unit, "um")==0)
           $zr_unit = "&micro;m";
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Z resolution</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $zr_value." ".$zr_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Z_resolution------------------------->


<!--------------------Notes------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Notes) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Notes</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Serial_section->Notes; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Notes------------------------->