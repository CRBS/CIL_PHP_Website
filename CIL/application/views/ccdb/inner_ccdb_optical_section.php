<span class="cil_title2">Imaging product type</span>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Optical section
                    </dd>
                </dl>
            </div>
</div>

<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->


<!--------------------Cutting_plane------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Cutting_plane) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Cutting plane</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Cutting_plane; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Cutting_plane------------------------->


<!--------------------Z_resolution------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Z_resolution->value) &&
          isset($result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Z_resolution->unit)  )
    {
        $o_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Z_resolution->value;
        $o_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Z_resolution->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Z resolution</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $o_value." ".$o_unit; ?>
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

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Notes))
    {

?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Notes</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Optical_section->Notes; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Notes------------------------->