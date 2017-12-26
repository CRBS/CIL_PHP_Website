<div class='biological_sources'>
    <!-- <h2>Grouping</h2> -->
    <span class="cil_title2">Grouping</span>
    This image is part of a <a href="<?php 
        if(isset($numeric_id) && 
                isset($json->CIL_CCDB->CIL->CORE->GROUP_ID))
        {
            //echo $json->CIL_CCDB->CIL->CORE->GROUP_ID; 
            echo "/groups/".$numeric_id;
        }
        else
        {
            echo "#";
        }
        
    ?>" target="_self">group</a>.
</div>
