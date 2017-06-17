<div class='biological_sources'>
<h2>Attribution</h2>
<dl>
<!------------------Attribution---------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->ATTRIBUTION->Contributors))
    {
        $contributors = $json->CIL_CCDB->CIL->CORE->ATTRIBUTION->Contributors;
        if(!is_array($contributors))
        {
?>
            <dt><b>Names</b></dt>
            <dd class='eol_dd'>
            <?php echo $contributors ?>
            </dd>

<?php
        }
        else
        {
            echo "<dt><b>Names</b></dt>";
            foreach ($contributors as $contributor) 
            {
?>
                
                <dd class='eol_dd'>
                <?php echo $contributor ?>
                </dd>       
        
<?php
                
            }
        }

    }
?>
<!------------------End Biological process---------------------->      
    
    
    
</dl>
</div>
