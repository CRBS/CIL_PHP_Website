<?php 

    
    $is_video = false;
    if(isset($json->CIL_CCDB->Data_type->Video) && $json->CIL_CCDB->Data_type->Video)
        $is_video = true;
    //if(!$has_video)
    if(!$is_video)
    {
?>

        <div class="row">
            <div class="col-md-12">
                <center>
                <!-- <img src="<?php //echo $cil_image_prefix.$numeric_id;   ?>/<?php echo "display_".$numeric_id;   ?>.png" width="100%" class="img-thumbnail pull-right"/> -->
                <img src="<?php echo $cil_image_prefix.$numeric_id."/".$numeric_id."_thumbnailx512.jpg";   ?>" width="100%" class="img-thumbnail pull-right"/>
                </center>
            </div>
        </div>
<?php
    }
    else
    {
?>
        <!-- <div id='detailed_page_flowplayer'>
        <center>
        <a href="<?php //echo $video_url ?>" id="player" style="display:block;width:460px;height:330px"></a>
        </center>
        <script type="text/javascript" language="javascript" >
            flowplayer("player", "/swf/flowplayer-3.2.5.swf", { clip:{scaling: "orig", onBeforeFinish: function() { return false; }, autoPlay:true, autoBuffering:true}});
        </script>
        </div> -->
        <!-- <video  width="100%" height="100%" controls autoplay loop>  -->
        <div class="row">
            <!-- <div class="col-md-12" style="background-color: black"> -->
            <div class="col-md-12">
                <center>
                <video width="100%" height="100%" controls autoplay loop>
                <source src="<?php  echo $cil_data_host."/media/videos/".$numeric_id."/".$numeric_id."_web.mp4"; ?>" type="video/mp4">
                </video>
                </center>
            </div>
        </div>
<?php
    }
?>


<?php
    if(isset($json->CIL_CCDB->Data_type->Video) && !$json->CIL_CCDB->Data_type->Video)
    {
        
        $jpeg = $cutil->findImageFileJSON($json,'Jpeg');
        $zip = $cutil->findImageFileJSON($json,'Zip');
        $tif = $cutil->findImageFileJSON($json,'OME_tif');
        
?>
<div class="row top-buffer">
    <div class="col-md-6">
        <div class='download'>
        <div class='download_menu_div' onmouseout="document.getElementById('ITEMS').style.display='none'" onmouseover="document.getElementById('ITEMS').style.display='block'">
        <a class='dropdown_button mini' href='#download_options_button' name='download_options_button'>Image Data Download Options...</a>
        <div class='download_options_container' id='ITEMS' onmouseout="this.style.display='none'" onmouseover="this.style.display='block'">
        
        <?php 
        if(!is_null($jpeg))
        {
        ?>
            <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
            <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/images/".$numeric_id."/".$jpeg->File_path;  ?>' download>Download in JPEG format</a>
            
            </div>
        <?php
        }
        ?>
        
        <?php 
        if(!is_null($tif))
        {
        ?>
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/images/".$numeric_id."/".$tif->File_path;  ?>'>Download in OME-TIF format (<?php echo $cutil->convertFileSize($tif->Size);   ?>)</a>
        </div>
        <?php
        }
        ?>    
            
        <?php 
        if(!is_null($zip))
        {
        ?>    
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/images/".$numeric_id."/".$zip->File_path;  ?>'>Download Submitted Data (<?php echo $cutil->convertFileSize($zip->Size);   ?>)</a>
        </div>
        <?php
        }
        ?>
            
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <span class="pull-right"><a class="button mini" href="#" onclick="openPopup('http://am.celllibrary.org/ascb_il/full_viewer/<?php echo $numeric_id ?>'); return false;">Open Detailed Viewer</a></span>
    </div>
</div>
<?php
    }   
?>



<?php
    if(isset($json->CIL_CCDB->Data_type->Video) && $json->CIL_CCDB->Data_type->Video)
    {
        
        $jpeg = $cutil->findImageFileJSON($json,'Jpeg');
        $zip = $cutil->findImageFileJSON($json,'Zip');
        $flv = $cutil->findImageFileJSON($json,'Flv');
        
?>
<div class="row top-buffer">
    <div class="col-md-6">
        <div class='download'>
        <div class='download_menu_div' onmouseout="document.getElementById('ITEMS').style.display='none'" onmouseover="document.getElementById('ITEMS').style.display='block'">
        <a class='dropdown_button mini' href='#download_options_button' name='download_options_button'>Image Data Download Options...</a>
        <div class='download_options_container' id='ITEMS' onmouseout="this.style.display='none'" onmouseover="this.style.display='block'">
        
        <?php 
        if(!is_null($jpeg))
        {
        ?>
            <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
            <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/videos/".$numeric_id."/".$jpeg->File_path;  ?>' download>Download in JPEG format</a>
            
            </div>
        <?php
        }
        ?>
        
        <?php 
        if(!is_null($flv))
        {
        ?>
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/videos/".$numeric_id."/".$flv->File_path;  ?>'>Download Flash Video (<?php echo $cutil->convertFileSize($flv->Size);   ?>)</a>
        </div>
        <?php
        }
        ?>    
            
        <?php 
        if(!is_null($zip))
        {
        ?>    
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/videos/".$numeric_id."/".$zip->File_path;  ?>'>Download Submitted Data (<?php echo $cutil->convertFileSize($zip->Size);   ?>)</a>
        </div>
        <?php
        }
        ?>
            
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <!-- <span class="pull-right"><a class="button mini" href="#" onclick="openPopup('http://am.celllibrary.org/ascb_il/full_viewer/<?php echo $numeric_id ?>'); return false;">Open Detailed Viewer</a></span> -->
    </div>
</div>
<?php
    }   
?>