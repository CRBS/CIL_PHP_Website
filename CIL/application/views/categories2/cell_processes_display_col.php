<div class="container">
    <div class="row" id="browse_header">
        
        <div class="col-md-6">
           
        <div class="grid_12">
        <div class="grid_6" id="browse_header_text">
        Explore the Cell Image Library by
        <span class="category">Cell Process</span>
        </div> 
        </div>
            
        </div>
        <div class="col-md-6">
           <div class="pull-right">
            <a href="/browse/cellprocess?direction=desc&amp;sort=name&amp;view_type=grid" class="not_expected_results">Show Thumbnails</a>
           </div>
        </div>
        
    </div>
    <br/>
  <div class="row">
  <div class="col-md-12">
  <table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">
          <a class="cil_16_font_no_color_bold" target="_self" href="<?php
             if(isset($reversed_direction))
                echo "/browse/cellprocess?direction=".$reversed_direction."&sort=name&view_type=column";
             else
                echo "#";
             ?>">Name</a></th>
        <th scope="col">
            <a class="cil_16_font_no_color_bold" target="_self" href="
           <?php
             if(isset($sort) && strcmp($sort,"name")==0)
                echo "/browse/cellprocess?direction=desc&sort=image_count&view_type=column";   
             else if(isset($reversed_direction))
                echo "/browse/cellprocess?direction=".$reversed_direction."&sort=image_count&view_type=column";
             else
                echo "#";
             ?>">Images</a>
        </th>
    </tr>
  </thead>
  <tbody>
<?php

if(isset($result->hits->hits))
{
    $hits = $result->hits->hits;
    $count = count($hits);
    for($i=0;$i<$count;$i++)
    {
?>
<?php


            $item = $hits[$i];
            if(isset($item->_source->Name) &&
                isset($item->_source->Total))
            {
               echo "\n<tr>";
               echo "\n<td width=\"50%\">".
                       "<a href=\"/browse/cellprocess/".$item->_source->Name."\" class=\"cil_16_font_no_color\" target=\"_self\">".
                       $item->_source->Name."</a>"."</td>";
               echo "\n<td width=\"50%\"><span class=\"cil_16_font_no_color\">".$item->_source->Total."</span></td>";
               echo "\n</tr>";
            
            }
    }
?>
  </tbody>
  </table>
  </div>
  </div>
<br/>
<?php     
}
?>


    
    
</div> 