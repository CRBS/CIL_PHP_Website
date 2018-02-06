<div class="images">
<div class="description">
<!-- <h2 class='detailed_description'>Technical Details</h2> -->
<span class="cil_title2">Technical Details</span>
<p class="cil_description">

<?php

    if(isset($json->CIL_CCDB->CIL->CORE->TECHNICALDETAILS->free_text))
    {
        $tech = $json->CIL_CCDB->CIL->CORE->TECHNICALDETAILS->free_text;
        $image = "http://www.cellimagelibrary.org/bioscapeslogo.png";
        if(strpos($tech, $image)
                === FALSE)
        {
            echo $json->CIL_CCDB->CIL->CORE->TECHNICALDETAILS->free_text;
        }
        else
        {
            echo str_replace($image, "/pic/bioscapeslogo.png", $tech);
        }
    }


?>
</p>
</div>
</div>