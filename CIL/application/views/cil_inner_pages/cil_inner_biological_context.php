
<div class='biological_sources'>
<!-- <h2>Biological Context</h2> -->
<span class="cil_title2">Biological Context</span>
<dl>
    
<!------------------Biological process---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->BIOLOGICALPROCESS))
    {
        $bprocess = $json->CIL_CCDB->CIL->CORE->BIOLOGICALPROCESS;
        if(!is_array($bprocess))
        {
            if(isset($bprocess->onto_id))
            {
?>
                <!-- <dt><b>Biological Process</b></dt> -->
                <dt><span class="cil_small_title">Biological Process</span></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                
                //echo $bprocess->onto_id;
                    if(isset($bprocess->onto_name))
                        echo "/images?image_search_parms%5Bbiological_process%5D=".$bprocess->onto_name."&advanced_search=Advanced+Search";
                    else 
                        echo "/images?k=".$bprocess->onto_id."&simple_search=Search";
                        
                    
                ?>' title=''><?php 
                    if(isset($bprocess->onto_name))
                       echo $bprocess->onto_name;
                    else
                       echo  $bprocess->onto_id;
                            
                ?></a>
                </span>
                </dd>

<?php
            }
            else if(isset($bprocess->free_text))
            {
?>
                <!-- <dt><b>Biological Process</b></dt> -->
                <dt><span class="cil_small_title">Biological Process</span></dt>
                <?php echo $bprocess->free_text ?>
                </dd>

<?php                
            }
        }
        else
        {
            //echo "<dt><b>Biological Process</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Biological Process</span></dt>";
            foreach ($bprocess as $bp) 
            {
                if(isset($bp->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                    
                        //echo $bp->onto_id;
                                        //echo $bprocess->onto_id;
                    if(isset($bp->onto_name))
                        echo "/images?image_search_parms%5Bbiological_process%5D=".$bp->onto_name."&advanced_search=Advanced+Search";
                    else 
                        echo "/images?k=".$bp->onto_id."&simple_search=Search";
                      
                    
                    ?>' title=''><?php 
                        if(isset($bp->onto_name))
                            echo $bp->onto_name;
                        else
                            echo $bp->onto_id;
                                
                    ?></a>
                    </span>
                    </dd>       
        
<?php
                }
                else if(isset($bp->free_text))
                {
?>
                    <dd class='eol_dd'>
                    <?php echo $bp->free_text; ?>
                    </dd>
<?php
                }
            }
        }

    }
?>
<!------------------End Biological process---------------------->    
    
    
    
<!------------------Molecular Function---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->MOLECULARFUNCTION))
    {
        $mfunction = $json->CIL_CCDB->CIL->CORE->MOLECULARFUNCTION;
        if(!is_array($mfunction))
        {
            if(isset($mfunction->onto_id))
            {
?>
                <!-- <dt><b>Molecular Function</b></dt> -->
                <dt><span class="cil_small_title">Molecular Function</span></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                    if(isset($mfunction->onto_name))
                        echo "/images?image_search_parms%5Bmolecular_function%5D=".$mfunction->onto_name."&advanced_search=Advanced+Search";
                    else 
                        echo "/images?k=".$mfunction->onto_id."&simple_search=Search";
                    
                ?>' title=''><?php 
                    
                    if(isset($mfunction->onto_name))
                        echo $mfunction->onto_name;
                    else
                        echo $mfunction->onto_id;
                            
                ?></a>
                </span>
                </dd>

<?php
            }
            else if(isset($mfunction->free_text))
            {
?>
                <!-- <dt><b>Molecular Function</b></dt> -->
                <dt><span class="cil_small_title">Molecular Function</span></dt>
                <dd class='eol_dd'>
                <?php echo $mfunction->free_text; ?>
                </dd>
                
<?php
            }
        }
        else
        {
            //echo "<dt><b>Molecular Function</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Molecular Function</span></dt>";
            foreach ($mfunction as $mf) 
            {
                if(isset($mf->onto_id))
                {
?>
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                    
                        if(isset($mf->onto_name))
                            echo "/images?image_search_parms%5Bmolecular_function%5D=".$mf->onto_name."&advanced_search=Advanced+Search";
                        else 
                            echo "/images?k=".$mf->onto_id."&simple_search=Search";
                        
                    ?>' title=''><?php 
                    
                        if(isset($mf->onto_name))
                            echo $mf->onto_name;
                        else
                            echo $mf->onto_id; 
      
                    ?></a>
                    </span>
                    </dd>       
        
<?php
                }
                else if(isset($mf->free_text))
                {
?>                   
                    <dd class='eol_dd'>
                    <?php echo $mf->free_text; ?>
                    </dd>     
<?php
                }
                
            }
        }

    }
?>
<!------------------End Biological process---------------------->     



<!------------------Human Development Anatomy---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->HUMAN_DEV_ANATOMY))
    {
       $json_items = $json->CIL_CCDB->CIL->CORE->HUMAN_DEV_ANATOMY;
       $hprinter->printOntologyBlock($json_items,"Human Development Anatomy");

    }
?>
<!------------------Human Development Anatomy---------------------->

<!------------------Human Disease---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->HUMAN_DISEASE))
    {
       $json_items = $json->CIL_CCDB->CIL->CORE->HUMAN_DISEASE;
       $hprinter->printOntologyBlock($json_items,"Human Disease");

    }
?>
<!------------------Human Disease---------------------->
    
    
    
</dl>
</div>

