  <div class="row top-buffer">
    <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="grid_12" id="browse_header">
                <div class="grid_6" id="browse_header_text">
                Image 2D

                </div>
                </div>    
              </div>
           </div> 
        
        <!-----------------Display_image------------------------>
         <div class="row top-buffer">
            <div class="col-md-12">
            <?php  
                $imageURL = $result->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->URL; 
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
        <!-----------------Display_image------------------------>
        
        <!----------------------Download section-------------------------->
        <div class="row top-buffer">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
                <div class='download'>
                <div class='download_menu_div' onmouseout="document.getElementById('ITEMS2').style.display='none'" onmouseover="document.getElementById('ITEMS2').style.display='block'">
                <a class='dropdown_button mini' href='#download_options_button' name='download_options_button'>Image Data Download Options...</a>
                <div class='download_options_container' id='ITEMS2' onmouseout="this.style.display='none'" onmouseover="this.style.display='block'">
                <?php
                    if(isset($numeric_id))
                    {
                        
                 ?>
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='<?php echo $result->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->URL; ?>' download="<?php echo $numeric_id; ?>_512r.jpg">Download in JPEG format</a>
                </div>
                <?php
                    }
                ?>
                
                <?php
                    if(isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Downloadable_data->Full_resolution->URL))
                    {
                ?>    
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://ccdb.ucsd.edu/ccdbdata/<?php echo $result->CIL_CCDB->CCDB->Image2d->Image2D_Downloadable_data->Full_resolution->URL;  ?>'  download="<?php echo $image_id."_r_full_resolution"; ?>">Download full resolution image</a>
                </div>
                <?php
                    }
                ?>
                    
                <?php
                    if(isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Animation->URL))
                    {
                ?>    
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://ccdb.ucsd.edu/ccdbdata/<?php echo $result->CIL_CCDB->CCDB->Image2d->Image2D_Animation->URL;  ?>'  download="<?php echo $image_id."_r_animation"; ?>">Download animation file</a>
                </div>
                <?php
                    }
                ?>
                    
                
                    
                    
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6 ">
                <?php  
                    if(isset($result->CIL_CCDB->CCDB->Image2d->WIB))
                    {
                      
                ?>
                <span class="pull-right"><a class="button mini" href="#" onclick="openPopup('<?php 
                   
                        echo $result->CIL_CCDB->CCDB->Image2d->WIB;
                
                ?>'); return false;">Open Detailed Viewer</a></span>
                        
                <?php
                    }
                ?>
                </div>
                </div>
            </div>
        </div>
            
        
        <!----------------------End download section--------------------->
        
        
        <!---------------------Image2D_Display_image_Description------------------------------->
        <?php
            if(isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->Description))
            {
        ?>
         <div class="row top-buffer">
            <div class="col-md-12">
                <dl>
                    <dt><b>Display image description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Image2D_Display_image_Description--------------------------->
        
        <!---------------------Image2D_Downloadable_data_Description------------------------------->
        <?php
            if(isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Downloadable_data->Full_resolution->Description))
            {
        ?>
         <div class="row top-buffer">
            <div class="col-md-12">
                <dl>
                    <dt><b>Full resolution image description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Image2d->Image2D_Downloadable_data->Full_resolution->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Image2D_Display_image_Description--------------------------->
        
        <!---------------------Image2D_Animation_Description------------------------------->
        <?php
            if(isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Animation->Description))
            {
        ?>
         <div class="row top-buffer">
            <div class="col-md-12">
                <dl>
                    <dt><b>Animation description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Image2d->Image2D_Animation->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Image2D_Display_image_Description--------------------------->
        
        
    </div>
    </div>
