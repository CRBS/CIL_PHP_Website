<div class="container">
    <!-- <div class="row">
        <div class="col-md-6">
            
            
        <div class="grid_12" id="browse_header">
        <div class="grid_6" id="browse_header_text">
        Explore the Cell Image Library by
        <span class="category">Cell Component</span>
        </div>

        </div>
        </div>
        
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                     <a class="survey_plain pull-right" href="/browse/cellprocess?direction=desc&amp;sort=image_count">Sort by Image Count</a>
                </div>
                <div class="col-md-6">    
                    <a class="survey_plain pull-left" href="/browse/cellprocess?direction=desc&amp;sort=image_count">Hide Thumbnails</a>
                </div>
            </div>
        </div>
        
    </div> -->
        <div class="row" id="browse_header">
            <div class="col-md-6">

            <div class="grid_12">
            <div class="grid_6" id="browse_header_text">
            Explore the Cell Image Library by
            <span class="category">Cell Component</span>
            </div> 
            </div>

            </div>
            <div class="col-md-6 pull-left">

                <a href="/pages/search_help#basic_search" class="not_expected_results">(Not the results you were expecting?)</a>
                <a href="/pages/search_help#submit_search_comments" class="not_expected_results">(Comments)</a>

            </div>
        </div>
    
    
    
    
    <br/>
<?php
    $cell_component = $summary->Cell_component;

    $count = count($cell_component);
    
        $newRow = false;
    $i = 0;
    $index = 0;
    while($i<$count)
    {
?>
        <div class="row">
            <div class="col-md-4">
<?php
        $cc = $cell_component[$i];
        
        //Debug
        /*if($i==0)
        {
          $cell_component_jstr = json_encode($cc, JSON_PRETTY_PRINT);
          echo $cell_component_jstr;
        }*/
        
        //echo $cp->Name;
        include 'inner_cell_component_image.php';
        $i++;
?>
        </div>
        
        <div class="col-md-4">
<?php                
         if($i<$count)
         {
             $cc = $cell_component[$i];
             //echo $cp->Name;
             include 'inner_cell_component_image.php';
            $i++;
         }
?>
        </div>
        
        <div class="col-md-4">
<?php                
         if($i<$count)
         {
             $cc = $cell_component[$i];
             //echo $cp->Name;
             include 'inner_cell_component_image.php';
            $i++;
         }
?>
        </div>
       
        </div>
        <br/>
<?php                
    }
?>
    
</div>
