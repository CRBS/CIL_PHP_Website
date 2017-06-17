
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
?>

    <dt><b>NCBI Organism Classification</b></dt>
    <dd class='eol_dd'>
    <span>
    <a class='eol_onto_term_link' href='<?php  echo $ncbi->onto_id;   ?>' title=''><em><?php echo $ncbi->onto_name ?></em></a>
    </span>
    </dd>

<?php
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
?>
        <dt><b>Cell Type</b></dt>
        <dd class='eol_dd'>
        <span>
        <a class='eol_onto_term_link' href='<?php  echo $celltype->onto_id;   ?>' title=''><em><?php echo $celltype->onto_name ?></em></a>
        </span>
        </dd>

<?php
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
?>
        <dt><b>Cell Type</b></dt>
        <dd class='eol_dd'>
        <span>
        <a class='eol_onto_term_link' href='<?php  echo $ccomponent->onto_id;   ?>' title=''><em><?php echo $ccomponent->onto_name ?></em></a>
        </span>
        </dd>

<?php
        }
        else
        {
            echo "<dt><b>Cellular Component</b></dt>";
            foreach ($ccomponent as $comp) 
            {
?>
                
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $comp->onto_id;   ?>' title=''><em><?php echo $comp->onto_name ?></em></a>
                </span>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End Cell type----------------------> 
        

</dl>
</div>




