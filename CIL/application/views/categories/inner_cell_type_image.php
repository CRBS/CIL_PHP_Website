<div class="row">
    <div class="col-md-12">
        <center>
            <div class="thumbnail-kenburn">
                <a href="/browse/celltype/<?php echo $ct->Name; ?>" class="survey_plain" target="_self">
                    <img width="220" src="<?php echo $ct->image_url; ?>">
                </a>
            </div>
        </center>
    </div>
    <div class="col-md-12">
        <center><a href="/browse/celltype/<?php echo $ct->Name; ?>" class="survey_plain" target="_self"><?php echo $ct->Name."<br/>(".$ct->Count.")"; ?></a></center>
    </div>

    
</div>
