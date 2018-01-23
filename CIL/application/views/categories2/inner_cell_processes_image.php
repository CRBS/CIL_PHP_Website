<div class="row">
    <div class="col-md-12">
        <center>
            <div class="thumbnail-kenburn">
                <a href="/browse/cellprocess/<?php echo $item->_source->Name; ?>" class="survey_plain" target="_self">
                    <img width="220" src="<?php 
                    $rid = $item->_source->Rep_id;
                    $url ="";
                    if(isset($cil_data_host))
                    {
                       echo $cil_data_host."/media/thumbnail_display/".$rid."/".$rid."_thumbnailx220.jpg";
                    }
                    //else
                    //    $url = "http://www.cellimagelibrary.org/cil_ccdb/display_images/".$rid."/display_".$rid.".png";
                    echo $url;
                    
                    ?>">
                </a>
            </div>
        </center>
    </div>
    <div class="col-md-12">
        <center><a href="/browse/cellprocess/<?php echo $item->_source->Name; ?>" class="survey_plain" target="_self"><?php echo $item->_source->Name."<br/>(".$item->_source->Total.")"; ?></a></center>
    </div>

    
</div>
