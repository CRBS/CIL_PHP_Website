<div class="row">
<div class="col-md-12">
    <div class="images">
    <div class="description">
    <!-- <h2 class='detailed_description'>Description</h2> -->
    <span class="cil_title2">Description</span>
    <p class="cil_description">

    <?php

        if(isset($json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text))
        {
            echo $json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text;
        }


    ?>
    </p>
    </div>
    </div>
</div>
</div>