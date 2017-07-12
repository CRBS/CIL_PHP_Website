<div class="container">
    <div class="row">
        <div class="col-md-6">
            
            
        <div class="grid_12" id="browse_header">
        <div class="grid_6" id="browse_header_text">
        Explore the Cell Image Library by
        <span class="category">Cell Process</span>
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
        
    </div>
    <br/>
<?php
    $cell_processes = $summary->Cell_processes;
    $count = count($cell_processes);
    
        $newRow = false;
    $i = 0;
    $index = 0;
    while($i<$count)
    {
?>
        <div class="row">
            <div class="col-md-4">
<?php
        $cp = $cell_processes[$i];
        //echo $cp->Name;
        include 'inner_cell_processes_image.php';
        $i++;
?>
        </div>
        
        <div class="col-md-4">
<?php                
         if($i<$count)
         {
             $cp = $cell_processes[$i];
             //echo $cp->Name;
             include 'inner_cell_processes_image.php';
            $i++;
         }
?>
        </div>
        
        <div class="col-md-4">
<?php                
         if($i<$count)
         {
             $cp = $cell_processes[$i];
             //echo $cp->Name;
             include 'inner_cell_processes_image.php';
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