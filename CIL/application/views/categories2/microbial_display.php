<div class="container">
    <div class="row" id="browse_header">
        
        <div class="col-md-6">
           
        <div class="grid_12">
        <div class="grid_6" id="browse_header_text">
        Explore the Microbial Data
        </div> 
        </div>
            
        </div>
        <div class="col-md-6">

        </div>
        
    </div>

    
    
    
    <br/>
    
    <div class="row">
        <div class="col-md-4">
    <?php
        
    
    if(isset($algaeResults) && !is_null($algaeResults)
        && isset($algaeResults->hits->total)
        && $algaeResults->hits->total > 0)
    {
        //echo $algaeResults->hits->total;
        $microbialType = "Algae";
        $item = $algaeResults->hits->hits[0];
        $total = $algaeResults->hits->total;
        include 'inner_microbial_image.php';
    ?> 
    
    <?php    
    }
    ?>
        </div>
        
        <div class="col-md-4">
    <?php
        
    
    if(isset($bacteriaResults) && !is_null($bacteriaResults)
        && isset($bacteriaResults->hits->total)
        && $bacteriaResults->hits->total > 0)
    {
        //echo $algaeResults->hits->total;
        $microbialType = "Bacteria";
        $item = $bacteriaResults->hits->hits[0];
        $total = $bacteriaResults->hits->total;
        include 'inner_microbial_image.php';
    ?> 
    
    <?php    
    }
    ?>            
        </div>
        <div class="col-md-4">
    <?php
        
    
    if(isset($fungiResults) && !is_null($fungiResults)
        && isset($fungiResults->hits->total)
        && $fungiResults->hits->total > 0)
    {
        //echo $algaeResults->hits->total;
        $microbialType = "Fungi";
        $item = $fungiResults->hits->hits[0];
        $total = $fungiResults->hits->total;
        include 'inner_microbial_image.php';
    ?> 
    
    <?php    
    }
    ?>          
            
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-4">
    <?php
        
    
    if(isset($protozoaResults) && !is_null($protozoaResults)
        && isset($protozoaResults->hits->total)
        && $protozoaResults->hits->total > 0)
    {
        //echo $algaeResults->hits->total;
        $microbialType = "Protozoa";
        $item = $protozoaResults->hits->hits[0];
        $total = $protozoaResults->hits->total;
        include 'inner_microbial_image.php';
    ?> 
    
    <?php    
    }
    ?>                
        </div>
        <div class="col-md-4">
    <?php
        
    
    if(isset($virusResults) && !is_null($virusResults)
        && isset($virusResults->hits->total)
        && $virusResults->hits->total > 0)
    {
        //echo $algaeResults->hits->total;
        $microbialType = "Virus";
        $item = $virusResults->hits->hits[0];
        $total = $virusResults->hits->total;
        include 'inner_microbial_image.php';
    ?> 
    
    <?php    
    }
    ?>            
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-12"><br/></div>
    </div>
</div>
