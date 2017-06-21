
<div class='biological_sources'>
<h2>Biological Sources</h2>
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

                    <dt><b>NCBI Organism Classification</b></dt>
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $ncbi->onto_id;   ?>' title=''><em><?php echo $ncbi->onto_name ?></em></a>
                    </span>
                    </dd>
                    

<?php
            }
            else if(isset($ncbi->free_text))
            {
?>
                    <dt><b>NCBI Organism Classification</b></dt>
                    <dd class='eol_dd'>
                    <?php echo $ncbi->free_text ?>
                    </dd>
<?php
            }
        }
        else //if it is an array 
        {
            echo "<dt><b>NCBI Organism Classification</b></dt>";
            foreach($ncbi as $nc)
            {
                if(isset($nc->onto_id))
                {
?>
                     
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $nc->onto_id;   ?>' title=''><em><?php echo $nc->onto_name ?></em></a>
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
            <dt><b>Cell Type</b></dt>
            <dd class='eol_dd'>
            <span>
            <a class='eol_onto_term_link' href='<?php  echo $celltype->onto_id;   ?>' title=''><em><?php echo $celltype->onto_name ?></em></a>
            </span>
            </dd>

<?php
            }
            else if(isset($celltype->free_text))
            {
?>
                <dt><b>Cell Type</b></dt>
                <?php echo $celltype->free_text ?>
                </dd>
            
<?php    
            }

        }
        else
        {
            echo "<dt><b>Cell Type</b></dt>";
            foreach($celltype as $ct)
            {
                if(isset($ct->onto_id))
                {
?>
                    <dt><b>Cell Type</b></dt>
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $ct->onto_id;   ?>' title=''><em><?php echo $ct->onto_name ?></em></a>
                    </span>
                    </dd>
                
<?php
                    
                }
                else if(isset($celltype->free_text))   
                {
                   
?>
                    <dt><b>Cell Type</b></dt>
                    <?php echo $ct->free_text ?>
                    </dd>
<?php
                }
            }
        }

    }
?>
<!------------------End Cell type---------------------->        
        


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
                <dt><b>Cell Type</b></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $ccomponent->onto_id;   ?>' title=''><em><?php echo $ccomponent->onto_name ?></em></a>
                </span>
                </dd>

<?php
            }
            else if(isset($ccomponent->free_text))
            {
?>                
                <dt><b>Cell Type</b></dt>
                <dd class='eol_dd'>
                <?php echo $ccomponent->free_text; ?>
                </dd>
<?php
            }
        }
        else
        {
            echo "<dt><b>Cellular Component</b></dt>";
            foreach ($ccomponent as $comp) 
            {
                if(isset($comp->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $comp->onto_id;   ?>' title=''><em><?php echo $comp->onto_name ?></em></a>
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
<!------------------End Cell type----------------------> 
        

</dl>
</div>




