<?php 
    //echo getcwd()."/application/views/CILUtil.php";
    require_once getcwd()."/application/views/CILUtil.php";
    $cutil = new CILUtil();
    
?>
<div class="container">
    <div class="col-md-12">
        <?php 
		if(strcmp($gimage_id, "54845") == 0)
		{
	?>
	<span class="cil_title">Grouped images - Defining the ultrastructure of the hematopoietic stem cell niche by correlative light and electron microscopy</span>
    	<?php
		}
		else
		{
	?>	
	<span class="cil_title">Grouped images - the images shown below are related</span>
    	<?php
		}
	?>

   </div>
    <div class="col-md-12">
        <?php include 'group_inner_search_result2.php'; ?>
    </div>
</div>
