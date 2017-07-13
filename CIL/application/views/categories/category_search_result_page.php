<div class="container">
<div class="row">
    <div class="col-md-12">
        <h1>
        Images of
        <span class="category">:</span>
        <span class="sub_category"><?php echo $category_title ?></span>
        </h1>
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

        include 'inner_search_pagination.php';
       
?>
        </div>
</div>
            
    
    </form>
</div>