<h2 class='detailed_description'>Imaging product type</h2>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Single tilt
                    </dd>
                </dl>
            </div>
</div>

<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->



<!--------------------Min_range------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Min_range->value) &&  
            isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Max_range->unit))
    {
        $m_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Min_range->value;
        $m_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Max_range->unit;
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Min range</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $m_value." ".$m_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Min_range------------------------->



<!--------------------Max_range------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Max_range->value) &&  
            isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Max_range->unit))
    {
        $m_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Max_range->value;
        $m_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Max_range->unit;
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Max range</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $m_value." ".$m_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Max_range------------------------->


<!--------------------Tilt_increment------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Tilt_increment->value) &&  
            isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Tilt_increment->unit))
    {
        $t_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Tilt_increment->value;
        $t_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Tilt_increment->unit;
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Tilt increment</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $t_value." ".$t_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Tilt_increment------------------------->



<!--------------------Notes------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Notes) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Notes</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Single_tilt->Notes; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Notes------------------------->