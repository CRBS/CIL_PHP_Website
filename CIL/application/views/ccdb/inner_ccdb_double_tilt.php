<h2 class='detailed_description'>Imaging product type</h2>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Double tilt
                    </dd>
                </dl>
            </div>
</div>


<!--------------------X_min_range------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_min_range->value) && 
          isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_min_range->unit)  )
    {
        $x_min_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_min_range->value;
        $x_min_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_min_range->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>X min range</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $x_min_value." ".$x_min_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End X_min_range------------------------->


<!--------------------X_max_range------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_max_range->value) && 
          isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_max_range->unit)  )
    {
        $x_max_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_max_range->value;
        $x_max_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_max_range->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>X max range</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $x_max_value." ".$x_max_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End X_max_range------------------------->



<!--------------------X_tilt_increment------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_tilt_increment->value) && 
          isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_tilt_increment->unit)  )
    {
        $x_tilt_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_tilt_increment->value;
        $x_tilt_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->X_tilt_increment->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>X tilt increment</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $x_tilt_value." ".$x_tilt_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End X_tilt_increment------------------------->


<!--------------------Y_min_range------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_min_range->value) && 
          isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_min_range->unit)  )
    {
        $y_min_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_min_range->value;
        $y_min_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_min_range->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Y min range</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $y_min_value." ".$y_min_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Y_min_range------------------------->



<!--------------------Y_max_range------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_max_range->value) && 
          isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_max_range->unit)  )
    {
        $y_max_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_max_range->value;
        $y_max_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_max_range->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Y max range</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $y_max_value." ".$y_max_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Y_max_range------------------------->


<!--------------------Y_tilt_increment------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_tilt_increment->value) && 
          isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_tilt_increment->unit)  )
    {
        $y_tilt_value = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_tilt_increment->value;
        $y_tilt_unit = $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Y_tilt_increment->unit;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Y tilt increment</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $y_tilt_value." ".$y_tilt_unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Y_tilt_increment------------------------->


<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Description))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->