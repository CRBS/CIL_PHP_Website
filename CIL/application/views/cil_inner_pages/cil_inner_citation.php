<div class='biological_sources'>
<!-- <h2>Attribution</h2> -->
<span class="cil_title2">Citation</span>
<dl>
    <?php 
                                           
        if(isset($json->CIL_CCDB->Citation->DOI))
        {
            
    ?>
            <dt><span class="cil_small_title">Digital Object Identifier (DOI)</span></dt>
            <dd class='eol_dd'><?php
                echo $json->CIL_CCDB->Citation->DOI;
            ?></dd>
    <?php
        }
    ?>
    <?php 
                                           
        if(isset($json->CIL_CCDB->Citation->ARK))
        {
            
    ?>
            <dt><span class="cil_small_title">Archival Resource Key (ARK)</span></dt>
            <dd class='eol_dd'><?php
                echo $json->CIL_CCDB->Citation->ARK;
            ?></dd>
    <?php
        }
    ?>
</dl>
</div>