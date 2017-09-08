<div class="container">
    <!-- <div class="row">
        <div class="col-md-6">
            
            
        <div class="grid_12" id="browse_header">
        <div class="grid_6" id="browse_header_text">
        Explore the Cell Image Library by
        <span class="category">Cell Type</span>
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
            <span class="category">Cell Type</span>
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
    
    
        //echo var_dump($summary);
        
    ?>
<?php
    $cell_type = $summary->Cell_type;
    $count = count($cell_type);
    
        $newRow = false;
    $i = 0;
    $index = 0;
    while($i<$count)
    {
?>
        <div class="row">
            <div class="col-md-4">
<?php
        $ct = $cell_type[$i];
        //echo $cp->Name;
        include 'inner_cell_type_image.php';
        $i++;
?>
        </div>
        
        <div class="col-md-4">
<?php                
         if($i<$count)
         {
             $ct = $cell_type[$i];
             //echo $cp->Name;
             include 'inner_cell_type_image.php';
            $i++;
         }
?>
        </div>
        
        <div class="col-md-4">
<?php                
         if($i<$count)
         {
             $ct = $cell_type[$i];
             //echo $cp->Name;
             include 'inner_cell_type_image.php';
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


