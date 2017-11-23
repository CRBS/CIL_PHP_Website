
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
                <dt><b>Biological Process</b></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $bprocess->onto_id;   ?>' title=''><?php echo $bprocess->onto_name ?></a>
                </span>
                </dd>

<?php
            }
            else if(isset($bprocess->free_text))
            {
?>
                <dt><b>Biological Process</b></dt>
                <?php echo $bprocess->free_text ?>
                </dd>

<?php                
            }
        }
        else
        {
            echo "<dt><b>Biological Process</b></dt>";
            foreach ($bprocess as $bp) 
            {
                if(isset($bp->onto_id))
                {
?>
                
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $bp->onto_id;   ?>' title=''><?php echo $bp->onto_name ?></a>
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
                <dt><b>Molecular Function</b></dt>
                <dd class='eol_dd'>
                <span>
                <a class='eol_onto_term_link' href='<?php  echo $mfunction->onto_id;   ?>' title=''><?php echo $mfunction->onto_name ?></a>
                </span>
                </dd>

<?php
            }
            else if(isset($mfunction->free_text))
            {
?>
                <dt><b>Molecular Function</b></dt>
                <dd class='eol_dd'>
                <?php echo $mfunction->free_text; ?>
                </dd>
                
<?php
            }
        }
        else
        {
            echo "<dt><b>Molecular Function</b></dt>";
            foreach ($mfunction as $mf) 
            {
                if(isset($mf->onto_id))
                {
?>
                    <dd class='eol_dd'>
                    <span>
                    <a class='eol_onto_term_link' href='<?php  echo $mf->onto_id;   ?>' title=''><?php echo $mf->onto_name ?></a>
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


    
    
    
</dl>
</div>

