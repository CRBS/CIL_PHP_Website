<!-- <h2 class='detailed_description'>Imaging parameters</h2> -->
<span class="cil_title2">Imaging parameters</span>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Electron microscopy product
                    </dd>
                </dl>
            </div>
</div>
<!--------------------Recording_medium------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Recording_medium))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Recording medium</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Recording_medium; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Recording_medium------------------------->



<!--------------------Magification------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Magification))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Magification</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Magification; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Magification------------------------->




<!--------------------Energy_filter_type------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_type))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Energy filter type</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_type; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Magification------------------------->



<!--------------------Energy_filter_dispersion------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_dispersion))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Energy filter dispersion</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_dispersion; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Energy_filter_dispersion------------------------->



<!--------------------Energy_filter_slit------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_slit))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Energy filter slit</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_slit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Energy_filter_dispersion------------------------->


<!--------------------Energy_filter_type------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_type))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Energy filter type</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Energy_filter_type; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Energy_filter_dispersion------------------------->


<!--------------------Accelerating_voltage------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Accelerating_voltage->value) &&
            isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Accelerating_voltage->unit))
    {
        $v_value= $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Accelerating_voltage->value;
        $v_unit = $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Accelerating_voltage->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Accelerating voltage</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $v_value." ".$v_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Accelerating_voltage------------------------->


<!--------------------Notes------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Notes))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Notes</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product->Notes; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Notes------------------------->