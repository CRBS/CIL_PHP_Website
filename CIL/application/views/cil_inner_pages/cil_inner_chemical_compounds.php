<div class='biological_sources'>
<span class="cil_title2">Compounds</span>
<dl>
<!------------------Compounds---------------------->

<?php
    $compoundArray = $json->CIL_CCDB->CIL->CORE->CHEMICAL_COMPOUNDS;
    foreach($compoundArray as $compound)
    {
?>
        <dd class='eol_dd'>
        <?php echo $compound; ?>
        </dd> 

<?php
    }
?>

<!------------------End compounds---------------------->
</dl>
</div>