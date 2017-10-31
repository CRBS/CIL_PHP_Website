<?php 
    
    require_once getcwd()."/application/views/CILUtil.php";
    $cutil = new CILUtil();
    
?>
<div class="container">
    <div class="row" id="browse_header">
        
        <div class="col-md-6">
           
            <div class="grid_12">
        <div class="grid_6" id="browse_header_text">
        Search Results for
        <em><?php 
                if(isset($keywords))
                    echo $keywords;
            
            ?></em>
        </div> <?php echo "(".$result->hits->total. " results)" ?>

        </div>
            
        </div>
        <div class="col-md-6 pull-left">
           
            <a href="/pages/search_help#basic_search" class="not_expected_results">(Not the results you were expecting?)</a>
            <a href="/pages/search_help#submit_search_comments" class="not_expected_results">(Comments)</a>
            
        </div>
        
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
        <?php

            //  include 'inner_type_selector.php';

       ?> 
       </div>
   </div> 
  <?php

      include 'inner_adv_search_result.php';
        
       
    ?>
    <div class="row">
        <div class="col-md-12">
        <?php

            include 'inner_ccdb_search_pagination2.php';
        ?>
        </div>
       
    </div>    
</div>


