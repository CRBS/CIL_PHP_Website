<span class="cil_title2">Imaging product type</span>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Time series
                    </dd>
                </dl>
            </div>
</div>

<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->


<!--------------------Time_series_type------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Time series type</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Time_series_type; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Time_series_type------------------------->


<!--------------------Frame_count------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Frame_count) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Frame count</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Frame_count; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Frame_count------------------------->


<!--------------------Frame_interval------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Frame_interval) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Frame_interval</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Frame_interval; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Frame_count------------------------->


<!--------------------Notes------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Frame_interval) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Notes</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Time_series->Notes; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Notes------------------------->