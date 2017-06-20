<div class='biological_sources'>
<h2>Imaging</h2>
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
            
                <dt><b>Image Type</b></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $imagetype->onto_id;   ?>' title=''><em><?php echo $imagetype->onto_name ?></em></a>
                </span>
                </dd>

<?php
            }
            else if(isset($imagetype->free_text))
            {
?>
                <dt><b>Image Type</b></dt>
                <dd class='eol_dd'>
                <?php echo  $imagetype->free_text; ?>
                </dd>
<?php
            }
        }
        else
        {
            echo "<dt><b>Image Type</b></dt>";
            foreach ($imagetype as $itype) 
            {
                if(isset($itype->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $itype->onto_id;   ?>' title=''><em><?php echo $itype->onto_name ?></em></a>
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
                <dt><b>Image Mode</b></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $imagemode->onto_id;   ?>' title=''><em><?php echo $imagemode->onto_name ?></em></a>
                </span>
                </dd>

<?php
            }
            else if(isset($imagemode->free_text))
            {
?>
               <dt><b>Image Mode</b></dt>
                <?php echo $imagemode->free_text; ?>
                </dd>

<?php                
            }
        }
        else
        {
            echo "<dt><b>Image Mode</b></dt>";
            foreach ($imagemode as $imode) 
            {
                if(isset($imode->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $imode->onto_id;   ?>' title=''><em><?php echo $imode->onto_name ?></em></a>
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
<!------------------End Imaging type---------------------->      
    

<!------------------Parameters Imaged---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->PARAMETERIMAGED))
    {
        $paramimage = $json->CIL_CCDB->CIL->CORE->PARAMETERIMAGED;
        if(!is_array($paramimage))
        {
?>
            <dt><b>Parameters Imaged</b></dt>
            <dd class='eol_dd'>
            <span>
            <a class='eol_onto_term_link' href='<?php  echo $paramimage->onto_id;   ?>' title=''><em><?php echo $paramimage->onto_name ?></em></a>
            </span>
            </dd>

<?php
        }
        else
        {
            echo "<dt><b>Parameters Imaged</b></dt>";
            foreach ($paramimage as $pimage) 
            {
?>
                
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $pimage->onto_id;   ?>' title=''><em><?php echo $pimage->onto_name ?></em></a>
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
            <dt><b>Source of Contrast</b></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($scontrast->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  echo $paramimage->onto_id;   ?>' title=''><em><?php echo $paramimage->onto_name ?></em></a>
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
            echo "<dt><b>Source of Contrast</b></dt>";
            foreach ($scontrast as $sc) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($sc->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $pimage->onto_id;   ?>' title=''><em><?php echo $pimage->onto_name ?></em></a>
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
            <dt><b>Visualization Methods</b></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($visual->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  echo $visual->onto_id;   ?>' title=''><em><?php echo $visual->onto_name ?></em></a>
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
            echo "<dt><b>Visualization Methods</b></dt>";
            foreach ($visual as $vs) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($vs->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $vs->onto_id;   ?>' title=''><em><?php echo $vs->onto_name ?></em></a>
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
            <dt><b>Processing History</b></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($phistory->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  echo $phistory->onto_id;   ?>' title=''><em><?php echo $phistory->onto_name ?></em></a>
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
            echo "<dt><b>Processing History</b></dt>";
            foreach ($phistory as $ph) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($ph->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $ph->onto_id;   ?>' title=''><em><?php echo $ph->onto_name ?></em></a>
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
</dl>
</div>

