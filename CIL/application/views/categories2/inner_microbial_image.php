<div class="row">
    <div class="col-md-12">
        <center>
            <div class="thumbnail-kenburn">
                <a href="/browse/micorbial/<?php if(isset($microbialType)) echo $microbialType; ?>" class="survey_plain" target="_self">
                    <img width="220" src="<?php 
                    
                    if(isset($item->_id))
                    {
                        $rid = $item->_id;
                        $rid = str_replace("CIL_", "", $rid);
                        $url ="";
                        if(isset($cil_data_host))
                        {
                           echo $cil_data_host."/media/thumbnail_display/".$rid."/".$rid."_thumbnailx220.jpg";
                        }
                        echo $url;
                    }
                    
                    ?>">
                </a>
            </div>
        </center>
    </div>
    <div class="col-md-12">
        <center><a href="/browse/microbial/<?php echo $microbialType; ?>" class="survey_plain" target="_self"><?php echo $microbialType."<br/>(".$total.")"; ?></a></center>
    </div>

    
</div>