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
                <?php
                    $localImageJsonPath = getcwd()."/pic/thumbnail_display/".$numeric_id."/image.json";
                    $localName = NULL;
                    $localFile = NULL;
                    
                    if(isset($local_image_display) && $local_image_display && file_exists($localImageJsonPath))
                    {
                        //echo $localImageJsonPath;
                        $ljson_str = file_get_contents($localImageJsonPath);
                        //echo $ljson_str;
                        $ljson = json_decode($ljson_str);
                        $hasSpecialCharacters = false;
                        
                        if(strpos($ljson->Image_name, "(") !== false || strpos($ljson->Image_name, "%28") !== false
                                || strpos($ljson->Image_name, "}") !== false || strpos($ljson->Image_name, "%29") !== false)
                        {
                            $hasSpecialCharacters = true;
                        }
                        
                        //echo "<br/>Name:".$ljson->Image_name;
                        if(isset($ljson->Image_name) && isset($ljson->Name) && !$hasSpecialCharacters)
                        {
                            //echo "<br/>In If";
                            $imagePath = getcwd()."/pic/thumbnail_display/".$numeric_id."/".$ljson->Image_name;
                            //echo $imagePath;
                            if(file_exists($imagePath))
                            {
                                $localName = $ljson->Name;
                                $localFile = "/pic/thumbnail_display/".$numeric_id."/".$ljson->Image_name;
                            }
                        }
                       
                    }
                    if(isset($local_image_display) && $local_image_display && !is_null($localFile) && !is_null($localName))
                    {
                        
                ?>
                    <img  alt="<?php if(!is_null($localName)) echo $localName ?>" src="<?php echo $localFile;   ?>" width="100%" class="img-thumbnail pull-right"/>
                <?php
                    }
                    else
                    {
                        
                ?>
                    <img  alt="<?php if(isset($summary)) echo $summary ?>" src="<?php echo $cil_image_prefix.$numeric_id."/".$numeric_id."_thumbnailx512.jpg";   ?>" width="100%" class="img-thumbnail pull-right"/>
                <?php
                    }
                ?>
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
            <!-- <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='<?php //echo $download_prefix."/media/images/".$numeric_id."/".$jpeg->File_path;  ?>'  download>Download in JPEG format</a>
            
            </div> -->
            
            <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
            <a class='download_menu_anchor' href='/download/web_jpeg/image/<?php echo $numeric_id;  ?>' download>Download in JPEG format</a>
            </div>
        <?php
        }
        ?>
        
        <?php 
        if(!is_null($tif) && isset($tif->File_path) && isset($tif->Size)
                && !isset($json->CIL_CCDB->CIL->Alternative_image_files))
        {
        ?>
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
            <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/images/".$numeric_id."/".$tif->File_path;  ?>' onclick='trackDownload(this,<?php echo $numeric_id; ?>,<?php echo $tif->Size;  ?>)'>Download in OME-TIF format (<?php echo $cutil->convertFileSize($tif->Size);   ?>)</a>
        </div>
        <?php
        }
        ?>    
            
        <?php 
        if(!is_null($zip) && isset($zip->File_path) && isset($zip->Size)
                && !isset($json->CIL_CCDB->CIL->Alternative_image_files))
        {
        ?>    
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/images/".$numeric_id."/".$zip->File_path;  ?>' onclick='trackDownload(this,<?php echo $numeric_id; ?>,<?php echo $zip->Size;  ?>)'>Download Submitted Data (<?php echo $cutil->convertFileSize($zip->Size);   ?>)</a>
        </div>
        <?php
        }
        ?>
            
        <!---------Adding the alternative download links-------->
         <?php
         if(isset($json->CIL_CCDB->CIL->Alternative_image_files)
            && count($json->CIL_CCDB->CIL->Alternative_image_files) > 0)
         {
             $alt_images = $json->CIL_CCDB->CIL->Alternative_image_files;
             foreach($alt_images as $altimage)
             {
                 if(isset($altimage->URL_postfix) 
                         && isset($altimage->Size)
                         && $altimage->Size > 0
                         && isset($altimage->File_path))
                 {
         ?>
                    <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                    <a class='download_menu_anchor' href='<?php echo $download_prefix.$altimage->URL_postfix;  ?>' onclick='trackDownload(this,<?php echo $numeric_id; ?>,<?php echo $altimage->Size;  ?>)'><?php echo $altimage->File_path; ?> (<?php echo $cutil->convertFileSize($altimage->Size);   ?>)</a>
                    </div>
         <?php
                 }
             }
         }
            
         ?>
        <!---------End adding the alternative download links-------->
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <span class="pull-right"><a class="button mini" href="#" onclick="openPopupAndTrack('<?php echo $image_viewer_prefix;  ?>/CIL_<?php echo $numeric_id ?>','CIL_<?php echo $numeric_id ?>'); return false;">Open Detailed Viewer</a></span>
        <!-- <span class="pull-right"><a class="button mini" href="#" onclick="openPopup('<?php //echo $image_viewer_prefix;  ?>/CIL_<?php //echo $numeric_id ?>'); return false;">Open Detailed Viewer</a></span> -->
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
        //$flv = $cutil->findImageFileJSON($json,'Flv');
        $flv = $cutil->findImageFileJSON($json,'Mp4');
        
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
            <!--
            <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
            <a class='download_menu_anchor' href='<?php //echo $download_prefix."/media/videos/".$numeric_id."/".$jpeg->File_path;  ?>' download>Download in JPEG format</a>
            </div>
            -->
            <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
            <a class='download_menu_anchor' href='/download/web_jpeg/video/<?php echo $numeric_id;  ?>' download>Download in JPEG format</a>
            </div>
            
        <?php
        }
        ?>
        
        <?php 
        if(!is_null($flv) && isset($flv->File_path) && isset($flv->Size))
        {
        ?>
        <!-- <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='<?php //echo $download_prefix."/media/videos/".$numeric_id."/".$flv->File_path;  ?>' onclick='trackDownload(this,<?php //echo $numeric_id; ?>,<?php //echo $flv->Size;  ?>)'>Download Flash Video (<?php //echo $cutil->convertFileSize($flv->Size);   ?>)</a>
        </div> -->
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
            <a class='download_menu_anchor' href='/download/web_mp4/<?php echo $numeric_id;  ?>' onclick='trackDownload(this,<?php echo $numeric_id; ?>,<?php echo $flv->Size;  ?>)' >Download MP4 Video (<?php echo $cutil->convertFileSize($flv->Size);   ?>)</a>
        </div>
        <?php
        }
        ?>

            
        <?php 
        if(!is_null($zip) && isset($zip->File_path) && isset($zip->Size))
        {
        ?>    
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='<?php echo $download_prefix."/media/videos/".$numeric_id."/".$zip->File_path;  ?>' onclick='trackDownload(this,<?php echo $numeric_id; ?>,<?php echo $zip->Size;  ?>)'>Download Submitted Data (<?php echo $cutil->convertFileSize($zip->Size);   ?>)</a>
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