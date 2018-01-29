
<div class='biological_sources'>
<!-- <h2>Biological Sources2</h2>  -->
<span class="cil_title2">Biological Sources</span>
<dl>
    
    
<!------------------NCBI Organism Classification---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->NCBIORGANISMALCLASSIFICATION))
    {
        $ncbi = $json->CIL_CCDB->CIL->CORE->NCBIORGANISMALCLASSIFICATION;
        if(!is_array($ncbi))
        {
            if(isset($ncbi->onto_id))
            {
?>

                    <!-- <dt><b>NCBI Organism Classification</b></dt> -->
                    <dt><span class="cil_small_title">NCBI Organism Classification</span></dt>
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                    
                      if(isset($ncbi->onto_name))
                          echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bncbi%5D=".$ncbi->onto_name;
                      else
                      {
                        echo "/images?k=\"".$ncbi->onto_id."\"&simple_search=Search";
                        //echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bncbi%5D=".$ncbi->onto_id;   
                      }
                    
                    ?>' title=''><em><?php 
                        if(isset($ncbi->onto_name))
                            echo $ncbi->onto_name; 
                        else
                            echo $ncbi->onto_id;
                    ?></em></a>
                    </span>
                    </dd>
                    

<?php
            }
            else if(isset($ncbi->free_text))
            {
?>
                <!-- <dt><b>NCBI Organism Classification</b></dt> -->
                <dt><span class="cil_small_title">NCBI Organism Classification</span></dt>
                <dd class='eol_dd'>
                <?php echo $ncbi->free_text ?>
                </dd>
<?php
            }
        }
        else //if it is an array 
        {
            //echo "<dt><b>NCBI Organism Classification</b></dt>";
            echo "<dt><span class=\"cil_small_title\">NCBI Organism Classification</span></dt>";
            foreach($ncbi as $nc)
            {
                if(isset($nc->onto_id))
                {
?>
                     
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                    
                        //echo $nc->onto_id;   
                        if(isset($nc->onto_name))
                          echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bncbi%5D=".$nc->onto_name;
                        else
                        {
                            echo "/images?k=\"".$nc->onto_id."\"&simple_search=Search";
                           //echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bncbi%5D=".$nc->onto_id;   
                        }
                        
                    ?>' title=''><em><?php 
                        if(isset($nc->onto_name))
                            echo $nc->onto_name;
                        else
                            echo $nc->onto_id;
                        
                    ?></em></a>
                    </span>
                    </dd>
<?php
                }
                else if(isset($nc->free_text))
                {
?>
                    
                    <dd class='eol_dd'>
                    <?php echo $nc->free_text ?>
                    </dd>
<?php
                }
            }
            
        }

    }
?>

<!------------------End NCBI Organism Classification---------------------->    
    

<!------------------Cell type---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->CELLTYPE))
    {
        $celltype = $json->CIL_CCDB->CIL->CORE->CELLTYPE;
        if(!is_array($celltype))
        {
           
            if(isset($celltype->onto_id))
            {
?>
            <!-- <dt><b>Cell Type</b></dt> -->
            <dt><span class="cil_small_title">Cell Type</span></dt>
            <dd class='eol_dd'>
            <span>
            <a class='eol_onto_term_link' href='<?php  
            
                if(isset($celltype->onto_name))
                    echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bcell_type%5D=".$celltype->onto_name;
                else
                {
                    echo "/images?k=\"".$celltype->onto_id."\"&simple_search=Search";
                    //echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bcell_type%5D=". $celltype->onto_id;   
                }
                
                ?>' title=''><?php 
            
                if(isset($celltype->onto_name))
                    echo $celltype->onto_name;
                else
                    echo $celltype->onto_id;
                        
            ?></a>
            </span>
            </dd>

<?php
            }
            else if(isset($celltype->free_text))
            {
?>
                
                <!-- <dt><b>Cell Type</b></dt> -->
                <dt><span class="cil_small_title">Cell Type</span></dt>
                <dd class='eol_dd'>
                    <?php echo $celltype->free_text ?>
                </dd>
            
<?php    
            }

        }
        else
        {
            //echo "<dt><b>Cell Type</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Cell Type</span></dt>";
            foreach($celltype as $ct)
            {
                if(isset($ct->onto_id))
                {
?>
                   
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                    
                        if(isset($ct->onto_name))
                            echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bcell_type%5D=".$ct->onto_name;
                        else
                        {
                            echo "/images?k=\"".$ct->onto_id."\"&simple_search=Search";
                            //echo "/images?advanced_search=Advanced+Search&image_search_parms%5Bcell_type%5D=". $ct->onto_id;   
                            //echo $ct->onto_id;   
                        }
                        
                        ?>' title=''><?php 
                        
                        if(isset($ct->onto_name))
                            echo $ct->onto_name;
                        else
                            echo $ct->onto_id;
                                
                    ?></a>
                    </span>
                    </dd>
                
<?php
                    
                }
                else if(isset($ct->free_text))   
                {
                   
?>
                    <dd>
                    <?php echo $ct->free_text ?>
                    </dd>
<?php
                }
            }
        }

    }
?>
<!------------------End Cell type---------------------->        
        



<!------------------Cell LINE---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->CELLLINE))
    {
        $cellline = $json->CIL_CCDB->CIL->CORE->CELLLINE;
        if(!is_array($cellline))
        {
           
            if(isset($cellline->onto_id))
            {
?>
            <!-- <dt><b>Cell Line</b></dt> -->
            <dt><span class="cil_small_title">Cell Line</span></dt>
            <dd class='eol_dd'>
            <span>
            <a class='eol_onto_term_link' href='<?php  
                
                if(isset($cellline->onto_name))
                {
                    /*
                    $clink = "<a class='eol_onto_term_link' href='";
                    $clink = $clink . "/images?image_search_parms[cell_line]=".$cellline->onto_name."&advanced_search=Advanced+Search";
                    $clink = $clink."' title=''>";
                    $clink = $clink . $cellline->onto_name;
                    $clink = $clink . "</a>";
                    echo $clink;
                     */
                    echo "/images?image_search_parms[cell_line]=".$cellline->onto_name."&advanced_search=Advanced+Search";
                }    
                else
                {
                    /*$clink = "<a class='eol_onto_term_link' href='";
                    $clink = $clink . "/images?k=\"".$cellline->onto_id."\"&simple_search=Search";
                    $clink = $clink."' title=''>";
                    $clink = $clink . $cellline->onto_id;
                    $clink = $clink . "</a>";
                    echo $clink;*/
                    echo "/images?k=\"".$cellline->onto_id."\"&simple_search=Search";
                }
                
                ?>' title=''><?php 
                
                if(isset($cellline->onto_name))
                    echo $cellline->onto_name;
                else
                    echo $cellline->onto_id;
                        
            ?></a>
            </span>
            </dd>

<?php
            }
            else if(isset($cellline->free_text))
            {
?>
                <!-- <dt><b>Cell Line</b></dt> -->
                <dt><span class="cil_small_title">Cell Line</span></dt>
                <dd class='eol_dd'>
                    <?php echo $cellline->free_text ?>
                </dd>
            
<?php    
            }

        }
        else
        {
            //echo "<dt><b>Cell Line</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Cell Line</span></dt>";
            foreach($cellline as $cl)
            {
                if(isset($cl->onto_id))
                {
?>
                   
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                    
                        //echo $cl->onto_id;   
                        if(isset($cl->onto_name))
                            echo "/images?image_search_parms[cell_line]=".$cl->onto_name."&advanced_search=Advanced+Search";   
                        else 
                            echo "/images?k=\"".$cl->onto_id."\"&simple_search=Search";
                        
                        
                     ?>' title=''><?php 
                        
                        if(isset($cl->onto_name))
                            echo $cl->onto_name;
                        else
                            echo $cl->onto_id;

                
                                
                    ?></a>
                    </span>
                    </dd>
                
<?php
                    
                }
                else if(isset($cl->free_text))   
                {
                   
?>
                    <dd>
                    <?php echo $cl->free_text ?>
                    </dd>
<?php
                }
            }
        }

    }
?>
<!------------------End Cell Line---------------------->







<!------------------Cell Components---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT))
    {
        $ccomponent = $json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT;
        if(!is_array($ccomponent))
        {
            if(isset($ccomponent->onto_id))
            {
?>
                <!-- <dt><b>Cellular Component</b></dt> -->
                <dt><span class="cil_small_title">Cellular Component</span></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  
                
                //echo $ccomponent->onto_id;
                    if(isset($ccomponent->onto_name))
                        echo "/images?image_search_parms%5Bcellular_component%5D=".$ccomponent->onto_name."&advanced_search=Advanced+Search";
                    else
                        echo "/images?k=".$ccomponent->onto_id."&simple_search=Search";
  
                
                ?>' title=''><?php 
                    if(isset($ccomponent->onto_name))
                        echo $ccomponent->onto_name;
                    else
                        echo $ccomponent->onto_id;
                            
                ?></a>
                </span>
                </dd>

<?php
            }
            else if(isset($ccomponent->free_text))
            {
?>                 
                <!-- <dt><b>Cell Type</b></dt> -->
                <dt><span class="cil_small_title">Cellular Component</span></dt>
                <dd class='eol_dd'>
                <?php echo $ccomponent->free_text; ?>
                </dd>
<?php
            }
        }
        else
        {
            //echo "<dt><b>Cellular Component</b></dt>";
            echo "<dt><span class=\"cil_small_title\">Cellular Component</span></dt>";
            foreach ($ccomponent as $comp) 
            {
                if(isset($comp->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  
                    
                        //echo $comp->onto_id;   
                        if(isset($comp->onto_name))
                            echo "/images?image_search_parms%5Bcellular_component%5D=".$comp->onto_name."&advanced_search=Advanced+Search";
                        else
                            echo "/images?k=\"".$comp->onto_id."\"&simple_search=Search";
  
                    
                    ?>' title=''><?php 
                    
                        if(isset($comp->onto_name))
                            echo $comp->onto_name;
                        else 
                            $comp->onto_id;
                         
                                
                    ?></a>
                    </span>
                    </dd>       
        
<?php
                }
                else if(isset($comp->free_text))
                {
                    
?>                  <dd class='eol_dd'>
                    <?php echo $comp->free_text; ?>
                    </dd>
<?php
                }
            }
        }

    }
?>
<!------------------End Cellular Component----------------------> 
        

</dl>
</div>




