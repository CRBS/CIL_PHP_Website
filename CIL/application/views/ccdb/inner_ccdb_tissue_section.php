<h2 class='detailed_description'>Tissue section</h2>
<!--------------------Anatomical_location------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Tissue_section->Anatomical_location))
    {
        $a_location = $result->CIL_CCDB->CCDB->Subject->Tissue_section->Anatomical_location;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Anatomical location</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $a_location; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Anatomical_location------------------------->




<!--------------------Microtome------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Tissue_section->Microtome))
    {
        $microtome = $result->CIL_CCDB->CCDB->Subject->Tissue_section->Microtome;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Microtome</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $microtome; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Microtome------------------------->


<!--------------------Orientation------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Tissue_section->Orientation))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Orientation</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Subject->Tissue_section->Orientation; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Orientation------------------------->


<!--------------------Tissue_product_storage------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Tissue_section->Tissue_product_storage))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Tissue product storage</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Subject->Tissue_section->Tissue_product_storage; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Tissue_product_storage------------------------->


<!--------------------Thickness------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Tissue_section->Thickness->value)  &&
          isset($result->CIL_CCDB->CCDB->Subject->Tissue_section->Thickness->unit)  )
    {
        $tvalue = $result->CIL_CCDB->CCDB->Subject->Tissue_section->Thickness->value;
        $tunit = $result->CIL_CCDB->CCDB->Subject->Tissue_section->Thickness->unit;
        if(strcmp($tunit, "um")==0)
              $tunit = "&micro;m";
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Thickness</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $tvalue." ".$tunit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Thickness------------------------->
