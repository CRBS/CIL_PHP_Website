<div class="row">
    <div class="col-md-12">
        <center> 
            <div class="thumbnail-kenburn">
                <a href="/browse/organism/<?php echo $org->Name; ?>" class="survey_plain" target="_self">
                    <img width="220" src="<?php echo $org->image_url; ?>">
                </a>
            </div>
        </center>
    </div>
    <div class="col-md-12">
        <center><a href="/browse/organism/<?php echo str_replace("[", "+", $org->Name) ; ?>" class="survey_plain" target="_self"><?php echo $org->Name."<br/>(".$org->Count.")"; ?></a></center>
    </div>

    
</div>
