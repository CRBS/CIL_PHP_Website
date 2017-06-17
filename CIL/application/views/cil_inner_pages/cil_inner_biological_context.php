
<div class='biological_sources'>
<h2>Biological Context</h2>
<dl>
    
<!------------------Biological process---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->BIOLOGICALPROCESS))
    {
        $bprocess = $json->CIL_CCDB->CIL->CORE->BIOLOGICALPROCESS;
        if(!is_array($bprocess))
        {
?>
            <dt><b>Biological Process</b></dt>
            <dd class='eol_dd'>
            <span>
            <a class='eol_onto_term_link' href='<?php  echo $bprocess->onto_id;   ?>' title=''><em><?php echo $bprocess->onto_name ?></em></a>
            </span>
            </dd>

<?php
        }
        else
        {
            echo "<dt><b>Biological Process</b></dt>";
            foreach ($bprocess as $bp) 
            {
?>
                
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $bp->onto_id;   ?>' title=''><em><?php echo $bp->onto_name ?></em></a>
                </span>
                </dd>       
        
<?php
                
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
?>
            <dt><b>Molecular Function</b></dt>
            <dd class='eol_dd'>
            <span>
            <a class='eol_onto_term_link' href='<?php  echo $mfunction->onto_id;   ?>' title=''><em><?php echo $mfunction->onto_name ?></em></a>
            </span>
            </dd>

<?php
        }
        else
        {
            echo "<dt><b>Molecular Function</b></dt>";
            foreach ($mfunction as $mf) 
            {
?>
                
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $mf->onto_id;   ?>' title=''><em><?php echo $mf->onto_name ?></em></a>
                </span>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End Biological process---------------------->     
    
    
    
</dl>
</div>

