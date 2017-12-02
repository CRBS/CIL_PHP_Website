<div class="images">
<div class="description">
<!-- <h2 class='detailed_description'>Technical Details</h2> -->
<span class="cil_title2">Technical Details</span>
<p class="cil_description">

<?php

    if(isset($json->CIL_CCDB->CIL->CORE->TECHNICALDETAILS->free_text))
    {
        echo $json->CIL_CCDB->CIL->CORE->TECHNICALDETAILS->free_text;
    }


?>
</p>
</div>
</div>