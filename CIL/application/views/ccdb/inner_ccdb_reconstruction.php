<!-- <h2 class='detailed_description'>Reconstruction</h2> -->
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
            <?php  
                if(isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->URL))
                {
                    $imageURL = $result->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->URL; 
            ?>
            <div class="col-md-12">
            
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <img src="<?php echo $imageURL;   ?>" width="512" class="img-thumbnail"/>
                    </center>
                </div>
            </div>
            </div>
            <?php
                }
            ?>
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
                <?php
                    if(isset($numeric_id))
                    {
                        
                 ?>
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://www.cellimagelibrary.org/ccdbimages/<?php echo $numeric_id; ?>_512v.jpg' download="<?php echo $numeric_id; ?>_512v.jpg">Download in JPEG format</a>
                </div>
                <?php
                    }
                ?>
                
                <?php
                    if(isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Downloadable_data->Full_resolution->URL))
                    {
                ?>    
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://ccdb.ucsd.edu/ccdbdata/<?php echo $result->CIL_CCDB->CCDB->Reconstruction->Recon_Downloadable_data->Full_resolution->URL;  ?>'  download="<?php echo $image_id."_full_resolution"; ?>">Download full resolution image</a>
                </div>
                <?php
                    }
                ?>
                    
                <?php
                    if(isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Downsampled->URL))
                    {
                ?>     
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://ccdb.ucsd.edu/ccdbdata/<?php echo $result->CIL_CCDB->CCDB->Reconstruction->Recon_Downsampled->URL;  ?>'  download="<?php echo $image_id."_downsampled"; ?>">Download downsampled image</a>
                </div>
                <?php
                    }
                ?>
                    
                <?php
                    if(isset($result->CIL_CCDB->CCDB->Reconstruction->Animation->URL))
                    {
                ?>     
                <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
                <a class='download_menu_anchor' href='http://ccdb.ucsd.edu/ccdbdata/<?php echo $result->CIL_CCDB->CCDB->Reconstruction->Animation->URL;  ?>'  download="<?php echo $image_id."_downsampled"; ?>">Download animation file</a>
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
        
       <!---------------------Full_resolution------------------------------->
        
        <?php
            if(isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Downloadable_data->Full_resolution->Description))
            {
        ?>
         <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Full resolution image description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Reconstruction->Recon_Downloadable_data->Full_resolution->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Full_resolution--------------------------->
        
        <!---------------------Recon_Downsampled------------------------------->
        
        <?php
            if(isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Downsampled->Description))
            {
        ?>
         <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Downsampled image description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Reconstruction->Recon_Downsampled->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Recon_Downsampled--------------------------->
        
        <!---------------------File_format------------------------------->
        
        <?php
            if(isset($result->CIL_CCDB->CCDB->Reconstruction->File_format))
            {
        ?>
         <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>File format</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Reconstruction->File_format; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End File_format--------------------------->
        
        <!---------------------Volume_dimension------------------------------->
        
        <?php
            if(isset($result->CIL_CCDB->CCDB->Reconstruction->Volume_dimension))
            {
        ?>
         <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Volume_dimension</b></dt>
                    <dd class='eol_dd'>
                        <?php 
                            $v_dim = $result->CIL_CCDB->CCDB->Reconstruction->Volume_dimension;
                            if(is_array($v_dim))
                            {
                                $v_size = count($v_dim);
                                for($i=0;$i<$v_size;$i++)
                                {
                                    $vd =$v_dim[$i];
                                    if($vd == 0)
                                        echo "0";
                                    else 
                                        echo $vd;
                                    
                                    if($i+1 < $v_size)
                                        echo ", ";
                                    
                                }
                            }
                            
                         ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Volume_dimension--------------------------->
        
        <!---------------------Volume_scale------------------------------->
        
        <?php
            if(isset($result->CIL_CCDB->CCDB->Reconstruction->Volume_scale))
            {
        ?>
         <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Volume scale</b></dt>
                    <dd class='eol_dd'>
                        <?php 
                            $v_dim = $result->CIL_CCDB->CCDB->Reconstruction->Volume_scale;
                            if(is_array($v_dim))
                            {
                                $v_size = count($v_dim);
                                for($i=0;$i<$v_size;$i++)
                                {
                                    $vd =$v_dim[$i];
                                    if($vd == 0)
                                        echo "0";
                                    else 
                                        echo $vd;
                                    
                                    if($i+1 < $v_size)
                                        echo ", ";
                                    
                                }
                            }
                            
                         ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Volume_scale--------------------------->
        
        <!---------------------Animation_description------------------------------->
        
        <?php
            if(isset($result->CIL_CCDB->CCDB->Reconstruction->Animation->Description))
            {
        ?>
         <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Animation description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Reconstruction->Animation->Description; ?>
                    </dd>
                </dl>
            </div>
         </div>
             
        <?php
            }
        ?>
        <!---------------------End Animation_description--------------------------->
        
    </div>
    </div>
