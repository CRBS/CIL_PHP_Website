<?php

class CILHtmlPrinter
{
    public function printOntologyBlock($json_items, $title)
    {
        
        if(!is_array($json_items))
        {
            if(isset($json_items->onto_id))
            {

                //echo "\n<dt><b>".$title."</b></dt>";
                echo "<dt><span class=\"cil_small_title\">".$title."</span></dt>";
                echo "\n<dd class='eol_dd'>";
                echo "\n<span>";
                if(isset($json_items->onto_name))
                {
                    if(strcmp($title,"Parameters Imaged")==0)
                        echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bparameter_imaged_bim%5D=".$json_items->onto_name."&advanced_search=Advanced+Search' title=''>".$json_items->onto_name."</a>";    
                    else if(strcmp($title,"Human Development Anatomy")==0)
                        echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bhuman_dev_anatomy%5D=".$json_items->onto_name."&advanced_search=Advanced+Search' title='".$json_items->onto_id."'>".$json_items->onto_name."</a>"; 
                    else if(strcmp($title,"Human Disease")==0)
                        echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bhuman_disease%5D=".$json_items->onto_name."&advanced_search=Advanced+Search' title='".$json_items->onto_id."'>".$json_items->onto_name."</a>"; 
                    else if(strcmp($title,"Mouse Gross Anatomy")==0)
                        echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bmouse_gross_anatomy%5D=".$json_items->onto_name."&advanced_search=Advanced+Search' title='".$json_items->onto_id."'>".$json_items->onto_name."</a>"; 
                    else if(strcmp($title,"Plant Growth")==0)
                        echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bplant_growth%5D=".$json_items->onto_name."&advanced_search=Advanced+Search' title='".$json_items->onto_id."'>".$json_items->onto_name."</a>"; 
                    else if(strcmp($title,"Xenopus Anatomy")==0)
                        echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms[xenopus_anatomy]=".$json_items->onto_name."&advanced_search=Advanced+Search' title='".$json_items->onto_id."'>".$json_items->onto_name."</a>"; 
                    else
                        echo "\n<a class='eol_onto_term_link' href='/images?k=".$json_items->onto_name."&simple_search=Search' title=''>".$json_items->onto_name."</a>";
                }
                else 
                {
                    echo "\n<a class='eol_onto_term_link' href='/images?k=".$json_items->onto_id."&simple_search=Search' title=''>".$json_items->onto_id."</a>";
                }
                echo "\n</span>";
                echo "\n</dd>";


            }
            else if(isset($json_items->free_text))
            {

                //echo "\n<dt><b>".$title."</b></dt>";
                echo "<dt><span class=\"cil_small_title\">".$title."</span></dt>";
                echo "\n<dd class='eol_dd'>";
                echo "\n".$json_items->free_text; 
                echo "\n</dd>";
                
            }
        }
        else
        {
            //echo "\n<dt><b>".$title."</b></dt>";
            echo "<dt><span class=\"cil_small_title\">".$title."</span></dt>";
            foreach ($json_items as $mf) 
            {
                if(isset($mf->onto_id))
                {

                    echo "\n<dd class='eol_dd'>";
                    echo "\n<span>";
                    //if(strcmp($title,"Parameters Imaged")==0)
                    if(isset($mf->onto_name))
                    {
                        if(strcmp($title,"Parameters Imaged")==0)
                           echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bparameter_imaged_bim%5D=".$mf->onto_name."&advanced_search=Advanced+Search' title=''>".$mf->onto_name."</a>";    
                        else if(strcmp($title,"Human Development Anatomy")==0)
                           echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bhuman_dev_anatomy%5D=".$mf->onto_name."&advanced_search=Advanced+Search' title='".$mf->onto_id."'>".$mf->onto_name."</a>";    
                        else if(strcmp($title,"Human Disease")==0)
                           echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bhuman_disease%5D=".$mf->onto_name."&advanced_search=Advanced+Search' title='".$mf->onto_id."'>".$mf->onto_name."</a>";
                        else if(strcmp($title,"Mouse Gross Anatomy")==0)
                           echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bmouse_gross_anatomy%5D=".$mf->onto_name."&advanced_search=Advanced+Search' title='".$mf->onto_id."'>".$mf->onto_name."</a>";
                        else if(strcmp($title,"Plant Growth")==0)
                            echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms%5Bplant_growth%5D=".$mf->onto_name."&advanced_search=Advanced+Search' title='".$mf->onto_id."'>".$mf->onto_name."</a>"; 
                        else if(strcmp($title,"Xenopus Anatomy")==0)
                            echo "\n<a class='eol_onto_term_link' href='/images?image_search_parms[xenopus_anatomy]=".$mf->onto_name."&advanced_search=Advanced+Search' title='".$mf->onto_id."'>".$mf->onto_name."</a>"; 
                        else
                           echo "\n<a class='eol_onto_term_link' href='/images?k=".$mf->onto_name."&simple_search=Search' title=''>".$mf->onto_name."</a>";
                    }
                    else
                    {
                        echo "\n<a class='eol_onto_term_link' href='/images?k=".$mf->onto_id."&simple_search=Search' title=''>".$mf->onto_id."</a>";
                    }

                    echo "</a>";
                    echo "\n</span>";
                    echo "\n</dd>";       
        

                }
                else if(isset($mf->free_text))
                {
                
                    echo "\n<dd class='eol_dd'>";
                    echo "\n".$mf->free_text;
                    echo "\n</dd>";     
                }
                
            }
        }
        
        
    }



}

?>

