<div class="container">
<div class="row">
    <div class="col-md-12">
        <!-- <h1> -->
        <div class="cil_title">
        Images of
        <span class="category">:</span>
        <span class="sub_category"><?php echo $category_title ?> (<?php echo $total; 
        if($total == 1 || $total == 0)
            echo " result";
        else
            echo " results";
        ?>)</span>
        </div>
        <!-- </h1> -->
    </div>
</div>
    <form action="" id="" method="get">
<div class="row">
    <div class="col-md-12">
 <?php

        include 'inner_type_selector.php';
       
?> 
    </div>
</div>
<br/>
        
<?php

        include 'inner_search_result.php';
       
?>        
        
<div class="row">
    <div class="col-md-12"> 
<?php

        //include 'inner_search_pagination.php';
        
       $paginationFile = getcwd()."/application/views/search/inner_ccdb_search_pagination2.php";
       //echo $paginationFile;
       include $paginationFile;
?>
        </div>
</div>
            
    
    </form>
</div>