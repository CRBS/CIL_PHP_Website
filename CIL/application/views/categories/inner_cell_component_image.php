<div class="row">
    <div class="col-md-12">
        <center>
            <div class="thumbnail-kenburn">
                <a href="/browse/cellcomponent/<?php echo $cc->Name; ?>" class="survey_plain" target="_self">
                    <img width="220" src="<?php 
                    $iarray = explode("/", $cc->image_url);
                    $rid = null;
                    foreach($iarray as $item)
                    {
                        if(is_numeric($item))
                        {
                            $rid=  $item;
                            break;
                        }
                    }
                    if(!is_null($rid))
                    {
                        echo $cil_data_host."/media/thumbnail_display/".$rid."/".$rid."_thumbnailx220.jpg";
                    }
                    else
                    {
                        echo $cc->image_url."?rid=".$rid; 
                    }
                    
                    ?>">
                </a>
            </div>
        </center>
    </div>
    <div class="col-md-12">
        <center><a href="/browse/cellcomponent/<?php echo $cc->Name; ?>" class="survey_plain" target="_self"><?php echo $cc->Name."<br/>(".$cc->Count.")"; ?></a></center>
    </div>

    
</div>
