<div class="container">
    <div class="row" id="browse_header">
        
        <div class="col-md-6">
           
        <div class="grid_12">
        <div class="grid_6" id="browse_header_text">
        Explore the Cell Image Library by
        <span class="category">Organism</span>
        </div> 
        </div>
            
        </div>
        <div class="col-md-6">
           <div class="pull-right">
<?php
            if(isset($direction) && isset($reversed_sort) 
                    && isset($reversed_sort_name))
            {
                echo "<a href=\"/browse/organism?direction=".$direction.
                        "&sort=".$reversed_sort."\" class=\"not_expected_results\" target=\"_self\">".$reversed_sort_name."</a>";
            }        
 ?>
            <!-- <a href="/pages/search_help#submit_search_comments" class="not_expected_results">Hide Thumbnails</a> -->
            <a href="/browse/organism?direction=desc&amp;sort=name&amp;view_type=column" class="not_expected_results">Hide Thumbnails</a>
           </div>
        </div>
        
    </div>

    
    
    
    <br/>
<?php

if(isset($result->hits->hits))
{
    $hits = $result->hits->hits;
    $count = count($hits);
    for($i=0;$i<$count;$i++)
    {
?>
    <div class="row">
        <div class="col-md-4">
<?php

        if($i < $count)
        {
            $item = $hits[$i];
            if(isset($item->_source->Name) &&
                isset($item->_source->Total) &&
                isset($item->_source->Rep_id))
            {
                include 'inner_organism_image.php';
            }
            $i++;
        }
?>
        </div>
        
        <div class="col-md-4">
<?php                
         
        if($i < $count)
        {
            $item = $hits[$i];
            if(isset($item->_source->Name) &&
                isset($item->_source->Total) &&
                isset($item->_source->Rep_id))
            {
                include 'inner_organism_image.php';
            }
            $i++;
        }
?>
        </div>
        
        <div class="col-md-4">
<?php                
   
        if($i < $count)
        {
            $item = $hits[$i];
            if(isset($item->_source->Name) &&
                isset($item->_source->Total) &&
                isset($item->_source->Rep_id))
            {
                include 'inner_organism_image.php';
            }
            
        }
?>
        </div>
       
        </div>
        <br/>
<?php   
    }
}
?>
 
</div> 

