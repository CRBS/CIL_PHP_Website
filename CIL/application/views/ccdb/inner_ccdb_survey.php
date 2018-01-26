<span class="cil_title2">Imaging product type</span>
<div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Type</b></dt>
                    <dd class='eol_dd'>
                        Survey
                    </dd>
                </dl>
            </div>
</div>

<!--------------------Description------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Survey->Description) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Survey->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Description------------------------->



<!--------------------Notes------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Survey->Notes) )
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Notes</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Imaging_product_types->Survey->Notes; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Notes------------------------->