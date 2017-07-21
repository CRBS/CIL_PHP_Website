    <div class="row">
    <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="grid_12" id="browse_header">
                <div class="grid_6" id="browse_header_text">
                Segmentation

                </div>
                </div>    
              </div>
           </div> 
        
        <!---------------Display_image---------------------------->
        <div class="row top-buffer">
            <div class="col-md-12">
            <?php  
                $imageURL = $result->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->URL; 
            ?>
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <img src="<?php echo $imageURL;   ?>" width="512" class="img-thumbnail"/>
                    </center>
                </div>
            </div>
            </div>
        </div>
        <!-----------------End Display_image-------------------------->
        
        
        <!----------------------Download section-------------------------->
        <div class="row top-buffer">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
                <div class='download'>
                <div class='download_menu_div' onmouseout="document.getElementById('ITEMS3').style.display='none'" onmouseover="document.getElementById('ITEMS3').style.display='block'">
                <a class='dropdown_button mini' href='#download_options_button' name='download_options_button'>Image Data Download Options...</a>
                <div class='download_options_container' id='ITEMS3' onmouseout="this.style.display='none'" onmouseover="this.style.display='block'">
                <?php
                    if(isset($result->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->URL))
                    {
                        
                 ?>
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='<?php echo $result->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->URL; ?>' download="<?php echo $numeric_id; ?>_512s.jpg">Download in JPEG format</a>
                </div>
                <?php
                    }
                ?>
                
                <?php
                    if(isset($result->CIL_CCDB->CCDB->Segmentation->Seg_Downloadable_data->Full_resolution->URL))
                    {
                ?>    
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://ccdb.ucsd.edu/ccdbdata/<?php echo $result->CIL_CCDB->CCDB->Segmentation->Seg_Downloadable_data->Full_resolution->URL;  ?>'  download="<?php echo $image_id."_s_full_resolution"; ?>">Download segmentation file</a>
                </div>
                <?php
                    }
                ?>
                    
          
                    
              
                    
                    
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6 ">
              
                </div>
                </div>
            </div>
        </div>
            
        
        <!----------------------End download section--------------------->
        
        <!---------------------Display_image_Description------------------------------->
        <?php
            if(isset($result->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->Description))
            {
        ?>
         <div class="row top-buffer">
            <div class="col-md-12">
                <dl>
                    <dt><b>Display image description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Display_image_Description--------------------------->
        
        
               <!---------------------Seg_Downloadable_data_Full_resolution_Description------------------------------->
        <?php
            if(isset($result->CIL_CCDB->CCDB->Segmentation->Seg_Downloadable_data->Full_resolution->Description))
            {
        ?>
         <div class="row top-buffer">
            <div class="col-md-12">
                <dl>
                    <dt><b>Segmentation file description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Segmentation->Seg_Downloadable_data->Full_resolution->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Seg_Downloadable_data_Full_resolution_Description--------------------------->
           
    </div>
    </div>
