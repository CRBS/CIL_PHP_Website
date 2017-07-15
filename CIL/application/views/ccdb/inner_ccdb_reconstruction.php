
    <div class="row">
    <div class="col-md-12">
           <div class="row">
              <div class="col-md-12">
                <div class="grid_12" id="browse_header">
                <div class="grid_6" id="browse_header_text">
                Reconstruction

                </div>
                </div>    
              </div>
           </div>
        <!-- <div style="height:2px;font-size:1px;">&nbsp;</div> -->
        <div class="row top-buffer">
            <div class="col-md-12">
            <?php  
                $imageURL = $result->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->URL; 
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
        <!-- <div style="height:2px;font-size:1px;">&nbsp;</div> -->
        <!----------------------Download section-------------------------->
        <div class="row top-buffer">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
                <div class='download'>
                <div class='download_menu_div' onmouseout="document.getElementById('ITEMS').style.display='none'" onmouseover="document.getElementById('ITEMS').style.display='block'">
                <a class='dropdown_button mini' href='#download_options_button' name='download_options_button'>Image Data Download Options...</a>
                <div class='download_options_container' id='ITEMS' onmouseout="this.style.display='none'" onmouseover="this.style.display='block'">
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='download_jpeg/2.jpg'>Download in JPEG format</a>
                </div>
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://grackle.crbs.ucsd.edu:8080/OmeroWebService/images/2.tif'>Download in OME-TIF format</a>
                </div>
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://grackle.crbs.ucsd.edu:8080/OmeroWebService/images/2.raw'>Download Submitted Data (3.8 MB)</a>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6 ">
                <?php  
                    if(isset($result->CIL_CCDB->CCDB->Reconstruction->WIB))
                    {
                      
                ?>
                <span class="pull-right"><a class="button mini" href="#" onclick="openPopup('<?php 
                   
                        echo $result->CIL_CCDB->CCDB->Reconstruction->WIB;
                
                ?>'); return false;">Open Detailed Viewer</a></span>
                        
                <?php
                    }
                ?>
                </div>
                </div>
            </div>
        </div>
            
        
        <!----------------------End download section--------------------->
        
        <!---------------------Description------------------------------->
        
        <?php
            if(isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->Description))
            {
        ?>
         <div class="row top-buffer">
            <div class="col-md-12">
                <dl>
                    <dt><b>Display image description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End description--------------------------->
        
    </div>
    </div>
