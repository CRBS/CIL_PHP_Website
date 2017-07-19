<h2 class='detailed_description'>Specimen preparation</h2>
<!--------------------Protocol_used------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_preparation->Protocol_used))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Protocol used</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Specimen_preparation->Protocol_used; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Protocol_used------------------------->
