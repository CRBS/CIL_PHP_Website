<div class='biological_sources'>
<!-- <h2>Sample Preparation</h2> -->
<span class="cil_title2">Sample Preparation</span>
<dl>
    
<!------------------Methods---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->PREPARATION))
    {
        $method = $json->CIL_CCDB->CIL->CORE->PREPARATION;
        if(!is_array($method))
        {
?>
            <dt><b>Methods</b></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($method->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  
            
                if(isset($method->onto_name ))
                    echo "/images?image_search_parms%5Bvisualization_methods_bim%5D=".$method->onto_name."&advanced_search=Advanced+Search";
                else
                    echo "/images?k=".$method->onto_id."&simple_search=Search";    
                
            ?>' title=''><?php 
                if(isset($method->onto_name ))
                    echo $method->onto_name;
                else
                    echo $method->onto_id; 
                        
            ?>
            </a>
            </span>
            <?php
                }
                else if(isset($method->free_text))
                {
             
                    echo $method->free_text;
             
                }
             ?>
            </dd>

<?php
        }
        else
        {
            echo "<dt><b>Methods</b></dt>";
            foreach ($method as $mh) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($mh->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                       
                    if(isset($mh->onto_name ))
                        echo "/images?image_search_parms%5Bvisualization_methods_bim%5D=".$mh->onto_name."&advanced_search=Advanced+Search";
                    else
                        echo "/images?k=".$mh->onto_id."&simple_search=Search"; 
                ?>' title=''><?php
                    if(isset($mh->onto_name))
                        echo  $mh->onto_name;
                    else
                        echo $mh->onto_id;
                
                ?></a>
                </span>
                <?php
                    }
                    else if(isset($mh->free_text))
                    {
                        echo $mh->free_text;
                    }
                ?>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End Methods---------------------->    


<!------------------Relation To Intact Cell---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->RELATIONTOINTACTCELL))
    {
        $intacell = $json->CIL_CCDB->CIL->CORE->RELATIONTOINTACTCELL;
        if(!is_array($intacell))
        {
?>
            <dt><b>Relation To Intact Cell</b></dt>
            <dd class='eol_dd'>
            <?php
                if(isset($intacell->onto_id))
                {
             ?>    
             
            <span>
            <a class='eol_onto_term_link' href='<?php  
            
                if(isset($intacell->onto_name))
                    echo "/images?image_search_parms%5Brelation_to_intact_cell_bim%5D=".$intacell->onto_name."&advanced_search=Advanced+Search"; 
                else
                    echo "/images?k=".$intacell->onto_id."&simple_search=Search";   
                
            ?>' title=''><?php 
                if(isset($intacell->onto_name))
                    echo $intacell->onto_name; 
                else
                    echo $intacell->onto_id;
            ?></a>
            </span>
            <?php
                }
                else if(isset($intacell->free_text))
                {
             
                    echo $intacell->free_text;
             
                }
             ?>
            </dd>

<?php
        }
        else
        {
            echo "<dt><b>Methods</b></dt>";
            foreach ($intacell as $ic) 
            {
?>
                
                <dd class='eol_dd'>
                <?php 
                    if(isset($ic->onto_id))
                    {
                ?>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                 
                    if(isset($ic->onto_name))
                        echo "/images?image_search_parms%5Brelation_to_intact_cell_bim%5D=".$ic->onto_name."&advanced_search=Advanced+Search"; 
                    else
                        echo "/images?k=".$ic->onto_id."&simple_search=Search";   
                
                ?>' title=''><?php 
                    if(isset($ic->onto_name))
                        echo $ic->onto_name;
                    else
                        echo $ic->onto_id;
                            
                ?></a>
                </span>
                <?php
                    }
                    else if(isset($ic->free_text))
                    {
                        echo $ic->free_text;
                    }
                ?>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------Relation To Intact Cell---------------------->    
    
</dl>
</div>