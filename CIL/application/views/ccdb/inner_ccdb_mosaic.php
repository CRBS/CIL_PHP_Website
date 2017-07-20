<h2 class='detailed_description'>Imaging product type</h2>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Mosaic
                    </dd>
                </dl>
            </div>
</div>

<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Mosaic->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Mosaic->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->


<!--------------------X_position------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Mosaic->X_position) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>X position</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Mosaic->X_position; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End X_position------------------------->


<!--------------------Y_position------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Mosaic->X_position) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Y position</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Mosaic->Y_position; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Y_position------------------------->