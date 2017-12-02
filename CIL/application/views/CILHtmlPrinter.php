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
                    echo "\n<a class='eol_onto_term_link' href='".$json_items->onto_id."' title=''>".$json_items->onto_name."</a>";
                else 
                    echo "\n<a class='eol_onto_term_link' href='".$json_items->onto_id."' title=''>".$json_items->onto_id."</a>";
                
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
                    echo "\n<a class='eol_onto_term_link' href='".$mf->onto_id."' title=''>";
                    if(isset($mf->onto_name))
                      echo $mf->onto_name;
                    else
                      echo $mf->onto_id;
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

