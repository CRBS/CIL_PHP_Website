<div class='biological_sources'>
<h2>Sample Preparation</h2>
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
            <a class='eol_onto_term_link' href='<?php  echo $method->onto_id;   ?>' title=''><?php echo $method->onto_name ?></a>
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
                <a class='eol_onto_term_link' href='<?php  echo $mh->onto_id;   ?>' title=''><?php echo $mh->onto_name ?></a>
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
            <a class='eol_onto_term_link' href='<?php  echo $intacell->onto_id;   ?>' title=''><?php echo $intacell->onto_name ?></a>
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
                <a class='eol_onto_term_link' href='<?php  echo $ic->onto_id;   ?>' title=''><?php echo $ic->onto_name ?></a>
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