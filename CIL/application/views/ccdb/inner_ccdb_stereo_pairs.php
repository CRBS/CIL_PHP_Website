<span class="cil_title2">Imaging product type</span>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Stereo pairs
                    </dd>
                </dl>
            </div>
</div>

<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Stereo_pairs->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Stereo_pairs->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->

<!--------------------Stereo_angles------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Stereo_pairs->Stereo_angles) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Stereo angles</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Stereo_pairs->Stereo_angles; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->