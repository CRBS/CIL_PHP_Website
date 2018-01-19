<div class='biological_sources'>
<!-- <h2>Imaging</h2> -->
<span class="cil_title2">Imaging</span>
<dl>
<!------------------Imaging type---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->ITEMTYPE))
    {
        $imagetype = $json->CIL_CCDB->CIL->CORE->ITEMTYPE;
        if(!is_array($imagetype))
        {
            if(isset($imagetype->onto_id))
            {
?>
            
                <!-- <dt><b>Image Type</b></dt> -->
                <dt><span class="cil_small_title">Image Type</span></dt>
                <dd>
                <span>
                <a class='onto_term_link' href='<?php  
                    
                    if(isset($imagetype->onto_name))
                        echo "/images?image_search_parms%5Bitem_type_bim%5D=".$imagetype->onto_name."&advanced_search=Advanced+Search";
                    else
                        echo "/images?k=\"".$imagetype->onto_id."\"&simple_search=Search";
                
                ?>' title=''><?php 
                    if(isset($imagetype->onto_name))
                        echo $imagetype->onto_name; 
                    else 
                        echo $imagetype->onto_id;
                                                                                                                
                ?></a>
                </span>
                </dd>

<?php
            }
            else if(isset($imagetype->free_text))
            {
?>
                <!-- <dt><b>Image Type</b></dt> -->
                <dt><span class="cil_small_title">Image Type</span></dt>
                <dd>
                <?php echo  $imagetype->free_text; ?>
                </dd>
<?php
            }
        }
        else
        {
            //echo "<dt><b>Image Type</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Image Type</span></dt>";
            foreach ($imagetype as $itype) 
            {
                if(isset($itype->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                        
                        if(isset($itype->onto_name))
                        //if(false)
                            echo "/images?image_search_parms%5Bitem_type_bim%5D=".$itype->onto_name."&advanced_search=Advanced+Search";
                        else
                            echo "/images?k=\"".$itype->onto_id."\"&simple_search=Search";
                    ?>' title=''><?php 
                    
                        if(isset($itype->onto_name))
                            echo $itype->onto_name; 
                        else
                            $itype->onto_id;
                    
                    ?></a>
                    </span>
                    </dd>       
        
<?php
                }
                else if(isset($itype->free_text))
                {
?>
                    <dd class='eol_dd'>
                    <?php echo $itype->free_text ?>
                    </dd> 

<?php                    
                    
                }
                
            }
        }

    }
?>
<!------------------End Imaging type---------------------->      
    


<!------------------Imaging mode---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->IMAGINGMODE))
    {
        $imagemode = $json->CIL_CCDB->CIL->CORE->IMAGINGMODE;
        if(!is_array($imagemode))
        {
            if(isset($imagemode->onto_id))
            {
?>
                <!-- <dt><b>Image Mode</b></dt> -->
                <dt><span class="cil_small_title">Image Mode</span></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  
       
                    if(isset($imagemode->onto_name)) 
                        echo "/images?image_search_parms%5Bimage_mode_bim%5D=".$imagemode->onto_name."&advanced_search=Advanced+Search";
                    else 
                        echo "/images?k=\"".$imagemode->onto_id."\"&simple_search=Search";
                    
                ?>' title=''><?php 
                    if(isset($imagemode->onto_name)) 
                        echo $imagemode->onto_name;
                    else
                        $imagemode->onto_id;
                        
                ?></a>
                </span>
                </dd>

<?php
            }
            else if(isset($imagemode->free_text))
            {
?>
               <!-- <dt><b>Image Mode</b></dt> -->
               <dt><span class="cil_small_title">Image Mode</span></dt>
               <dd class='eol_dd'>
                <?php echo $imagemode->free_text; ?>
               </dd>

<?php                
            }
        }
        else
        {
            //echo "<dt><b>Image Mode</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Image Mode</span></dt>";
            foreach ($imagemode as $imode) 
            {
                if(isset($imode->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                          
                        if(isset($imode->onto_name)) 
                            echo "/images?image_search_parms%5Bimage_mode_bim%5D=".$imode->onto_name."&advanced_search=Advanced+Search";
                        else 
                            echo "/images?k=\"".$imode->onto_id."\"&simple_search=Search";
                    ?>' title=''><?php 
                        if(isset($imode->onto_name))
                            echo $imode->onto_name;
                        else
                            echo $imode->onto_id;
                    ?>
                    </a>
                    </span>
                    </dd>       
        
<?php
                }
                else if($imode->free_text)
                {
?>
                    <dd class='eol_dd'>
                    <?php echo $imode->free_text; ?>
                    </dd>   
                    
<?php
                }
                
            }
        }

    }
?>
<!------------------End Imaging mode---------------------->      
    

<!------------------Parameters Imaged---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->PARAMETERIMAGED))
    {
        $paramimage = $json->CIL_CCDB->CIL->CORE->PARAMETERIMAGED;
        if(!is_array($paramimage))
        {
           $json_items = $json->CIL_CCDB->CIL->CORE->PARAMETERIMAGED;
           $hprinter->printOntologyBlock($json_items,"Parameters Imaged");
?>


<?php
        }
        else
        {
            //echo "<dt><b>Parameters Imaged</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Parameters Imaged</span></dt>";
            foreach ($paramimage as $pimage) 
            {
?>
                
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                    if(isset($pimage->onto_name))
                      echo "/images?image_search_parms%5Bparameter_imaged_bim%5D=".$pimage->onto_name."&advanced_search=Advanced+Search";
                    else
                      echo "/images?k=\"".$pimage->onto_id."\"&simple_search=Search";
                    
                ?>' title=''><?php 
                
                   if(isset($pimage->onto_name))
                    echo $pimage->onto_name;
                   else
                     echo $pimage->onto_id;
                
                ?></a>
                </span>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End Parameters Imaged---------------------->   

<!------------------Source of Contrast---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->SOURCEOFCONTRAST))
    {
        $scontrast = $json->CIL_CCDB->CIL->CORE->SOURCEOFCONTRAST;
        if(!is_array($scontrast))
        {
?>
            <!-- <dt><b>Source of Contrast</b></dt> -->
            <dt><span class="cil_small_title">Source of Contrast</span></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($scontrast->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  
                if(isset($scontrast->onto_name))
                    echo "/images?image_search_parms%5Bsource_of_contrast_bim%5D=".$scontrast->onto_name."&advanced_search=Advanced+Search";   
                else 
                    echo "/images?k=\"".$scontrast->onto_id."\"&simple_search=Search";
                    
                
                ?>' title=''><?php 
                if(isset($scontrast->onto_name))
                    echo $scontrast->onto_name;
                else
                    echo $scontrast->onto_id;
                    
                        
            ?></a>
            </span>
            <?php
                }
                else if(isset($scontrast->free_text))
                {
             
                    echo $scontrast->free_text;
             
                }
             ?>
            </dd>

<?php
        }
        else
        {
            //echo "<dt><b>Source of Contrast</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Source of Contrast</span></dt>";
            foreach ($scontrast as $sc) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($sc->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                  
                    if(isset($sc->onto_name))
                        echo "/images?image_search_parms%5Bsource_of_contrast_bim%5D=".$sc->onto_name."&advanced_search=Advanced+Search";   
                    else 
                        echo "/images?k=\"".$sc->onto_id."\"&simple_search=Search";
                
                ?>' title=''><?php 
                
                    if(isset($sc->onto_name))
                        echo $sc->onto_name;
                    else
                        echo $sc->onto_id;
                                
                ?></a>
                </span>
                <?php
                    }
                    else if(isset($sc->free_text))
                    {
                        echo $sc->free_text;
                    }
                ?>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------Source of Contrast---------------------->




<!------------------Visualization Methods---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->VISUALIZATIONMETHODS))
    {
        $visual = $json->CIL_CCDB->CIL->CORE->VISUALIZATIONMETHODS;
        if(!is_array($visual))
        {
?>
            <!-- <dt><b>Visualization Methods</b></dt> -->
            <dt><span class="cil_small_title">Visualization Methods</span></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($visual->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  
                if(isset($visual->onto_name))
                    echo "/images?image_search_parms%5Bvisualization_methods_bim%5D=".$visual->onto_name."&advanced_search=Advanced+Search";
                else
                    echo "/images?k=\"".$visual->onto_id."\"&simple_search=Search"
                 
                
            ?>' title=''><?php 
                
                if(isset($visual->onto_name))
                    echo $visual->onto_name;
                else
                    echo $visual->onto_id;
                            
            ?></a>
            </span>
            <?php
                }
                else if(isset($visual->free_text))
                {
             
                    echo $visual->free_text;
             
                }
             ?>
            </dd>

<?php
        }
        else
        {
            //echo "<dt><b>Visualization Methods</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Visualization Methods</span></dt>";
            foreach ($visual as $vs) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($vs->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                
                    if(isset($vs->onto_name))
                        echo "/images?image_search_parms%5Bvisualization_methods_bim%5D=".$vs->onto_name."&advanced_search=Advanced+Search";
                    else
                        echo "/images?k=\"".$vs->onto_id."\"&simple_search=Search"
                 
                    ?>' title=''><?php 
                
                    if(isset($vs->onto_name))
                        echo $vs->onto_name;
                    else
                        echo $vs->onto_id;
                
                ?></a>
                </span>
                <?php
                    }
                    else if(isset($vs->free_text))
                    {
                        echo $vs->free_text;
                    }
                ?>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End Visualization Methods---------------------->


<!------------------Processing History---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->PROCESSINGHISTORY))
    {
        $phistory = $json->CIL_CCDB->CIL->CORE->PROCESSINGHISTORY;
        if(!is_array($phistory))
        {
?>
            <!-- <dt><b>Processing History</b></dt> -->
            <dt><span class="cil_small_title">Processing History</span></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($phistory->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  
                
                if(isset($phistory->onto_name))
                    echo "/images?image_search_parms%5Bprocessing_history_bim%5D=".$phistory->onto_name."&advanced_search=Advanced+Search"; 
                else
                    echo "/images?k=\"".$phistory->onto_id."\"&simple_search=Search";
                
            ?>' title=''><?php 
                if(isset($phistory->onto_name))
                    echo $phistory->onto_name; 
                else
                    echo $phistory->onto_id;
                        
            ?></a>
            </span>
            <?php
                }
                else if(isset($phistory->free_text))
                {
             
                    echo $phistory->free_text;
             
                }
             ?>
            </dd>

<?php
        }
        else
        {
            //echo "<dt><b>Processing History</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Processing History</span></dt>";
            foreach ($phistory as $ph) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($ph->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  

                    if(isset($phistory->onto_name))
                        echo "/images?image_search_parms%5Bprocessing_history_bim%5D=".$ph->onto_name."&advanced_search=Advanced+Search"; 
                    else
                        echo "/images?k=\"".$ph->onto_id."\"&simple_search=Search";
                    ?>' title=''><?php 
                
                    if(isset($ph->onto_name))
                        echo $ph->onto_name;
                    else
                        echo $ph->onto_id;
                        
                            
                ?></a>
                </span>
                <?php
                    }
                    else if(isset($ph->free_text))
                    {
                        echo $ph->free_text;
                    }
                ?>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End Processing History---------------------->




<!------------------DATAQUALIFICATION---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->DATAQUALIFICATION))
    {
        $dataquali = $json->CIL_CCDB->CIL->CORE->DATAQUALIFICATION;
        if(!is_array($dataquali))
        {
?>
            <!-- <dt><b>Data Qualifiers</b></dt> -->
            <dt><span class="cil_small_title">Data Qualifiers</span></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($dataquali->free_text))
                {
             
                    $dq_text =  $dataquali->free_text;
                    if($cutil->startsWith($dq_text,"RAW"))
                    {
                        echo "raw, unprocessed data";
                        if (strpos($dq_text, "spatialmeasurements") !== false)
                            echo "<dd class=\"data_qualifier_attrs\">suitable for spatial measurements</dd>";
                        
                    }
                    else if($cutil->startsWith($dq_text,"PROCESSED"))
                    {
                        echo "processed data";
                        if (strpos($dq_text, "spatialmeasurements") !== false)
                            echo "<dd class=\"data_qualifier_attrs\">suitable for spatial measurements</dd>";
                    }
                    else if($cutil->startsWith($dq_text,"ANIMATIONS"))
                    {
                        echo "animation";
                        
                    }

                }
             ?>
            </dd>

<?php
        }
        else
        {
            //echo "<dt><b>Data Qualifiers</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Data Qualifiers</span></dt>";
            foreach ($dataquali as $dq) 
            {
?>
                
                <dd class='eol_dd'>
                <?php
                     if(isset($dq->free_text))
                    {
                        $dq_text =  $dq->free_text;
                        if($cutil->startsWith($dq_text,"RAW"))
                        {
                            echo "raw, unprocessed data";
                            if (strpos($dq_text, "spatialmeasurements") !== false)
                                echo "<dd class=\"data_qualifier_attrs\">suitable for spatial measurements</dd>";

                        }
                        else if($cutil->startsWith($dq_text,"PROCESSED"))
                        {
                            echo "processed data";
                            if (strpos($dq_text, "spatialmeasurements") !== false)
                                echo "<dd class=\"data_qualifier_attrs\">suitable for spatial measurements</dd>";
                        }
                        else if($cutil->startsWith($dq_text,"ANIMATIONS"))
                        {
                            echo "animation";

                        }
                    }
                ?>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End DATAQUALIFICATION---------------------->



</dl>
</div>

