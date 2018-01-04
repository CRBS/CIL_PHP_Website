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
      <th scope="col">Name</th>
      <th scope="col">Images</th>
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