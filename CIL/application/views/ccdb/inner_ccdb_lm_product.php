<h2 class='detailed_description'>Imaging parameters</h2>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Light microscopy product
                    </dd>
                </dl>
            </div>
</div>


<!--------------------Immersion_medium------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Immersion_medium))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Immersion medium</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Immersion_medium; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Immersion_medium------------------------->


<!--------------------Mounting_medium------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Mounting_medium))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Mounting medium</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Mounting_medium; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Mounting_medium------------------------->


<!--------------------Lens------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Lens))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Lens</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Lens; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Lens------------------------->


<!--------------------Lens_magnification------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Lens_magnification))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Lens magnification</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Lens_magnification; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Lens_magnification------------------------->


<!--------------------Numerical_aperture------------------------->
<?php

    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Numerical_aperture))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Numerical aperture</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Numerical_aperture; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Numerical_aperture------------------------->




<!--------------------Refractive_index------------------------->
<?php

    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Refractive_index))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Refractive index</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Refractive_index; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Numerical_aperture------------------------->


<!--------------------Notes------------------------->
<?php

    if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Notes))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Notes</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product->Notes; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Notes------------------------->