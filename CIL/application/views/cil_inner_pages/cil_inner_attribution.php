<div class='biological_sources'>
<!-- <h2>Attribution</h2> -->
<span class="cil_title2">Attribution</span>
<dl>
<!------------------Names---------------------->
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
<!------------------End Names---------------------->      


<!------------------Published----------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->ATTRIBUTION->PUBLISHED))
    {
        $published = $json->CIL_CCDB->CIL->CORE->ATTRIBUTION->PUBLISHED;
        foreach($published as $pub)
        {
?>
            <dt><b>Published</b></dt>
            <dd class='eol_dd'>
            <?php echo $pub; ?>
            </dd>

<?php
        }
    }
?>
<!------------------END Published----------------------->            
            
<!------------------Pubmed----------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->ATTRIBUTION->PUBMED))
    {
        $pubmed = $json->CIL_CCDB->CIL->CORE->ATTRIBUTION->PUBMED;
        foreach($pubmed as $pub)
        {
?>
            <dt><b>Pubmed</b></dt>
            <dd class='eol_dd'>
                <a href="https://www.ncbi.nlm.nih.gov/pubmed/<?php echo $pub; ?>" target="_blank">
                <?php echo $pub; ?>
                </a>
            </dd>

<?php
        }
    }
?>
<!------------------END Pubmed----------------------->    


<!------------------Link----------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->ATTRIBUTION->URLs))
    {
        $urls = $json->CIL_CCDB->CIL->CORE->ATTRIBUTION->URLs;
        echo "<dt><b>Link</b></dt>";
        foreach($urls as $url)
        {
?>
            
            <dd class='eol_dd'>
                <a href="<?php echo $url->Href; ?>" target="_blank">
                <?php 
                    
                    if(isset($url->Label))
                        echo $url->Label; 
                    else
                        echo $url->Href;
                
                ?>
                </a>
            </dd>

<?php
        }
    }
?>
<!------------------END Link----------------------->       



<!------------------Other----------------------->
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->ATTRIBUTION->OTHER))
    {
        $others = $json->CIL_CCDB->CIL->CORE->ATTRIBUTION->OTHER;
        echo "<dt><b>OTHER</b></dt>";
        foreach($others as $other)
        {
?>
            
            <dd class='eol_dd'>
            <?php echo $other; ?>
            </dd>

<?php
        }
    }
?>
<!------------------END Other----------------------->    
            
</dl>
</div>
