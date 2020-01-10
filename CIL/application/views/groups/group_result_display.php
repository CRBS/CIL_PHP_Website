<?php 
    //echo getcwd()."/application/views/CILUtil.php";
    require_once getcwd()."/application/views/CILUtil.php";
    $cutil = new CILUtil();
    
?>
<div class="container">
    <div class="col-md-12">
        <span class="cil_title">Grouped images - the images shown below are related</span>
    </div>
    <div class="col-md-12">
        <?php include 'group_inner_search_result2.php'; ?>
    </div>
</div>
