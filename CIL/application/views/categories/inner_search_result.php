<?php 

    $cwd = getcwd();
    $cwd = str_replace("\\", "/", $cwd);
    $path = $cwd."/application/controllers/GeneralUtil.php"; 
    require_once $path;
    
    $gutil = new GeneralUtil();
?>
<?php

    $hits = $result->hits->hits;
    $count = count($hits);
    //echo "COUNT:".$count;
    $i = 0;
    
    while($i < $count)
    {
?>
<br/>
<div class="row">
    <div class="col-md-6">
<?php

        $image = $hits[$i];
        $id = $image->_id;

        $isCIL = false;
        if($gutil->startsWith($id,"CIL_"))
        {
            $isCIL = true;
        }

        if($isCIL)
        {
            include 'inner_cil_search_image.php';
        }
        
        $i++;
?>
    </div>
    <div class="col-md-6">
<?php
        if($i < $count)
        {
            $image = $hits[$i];
            $id = $image->_id;

            $isCIL = false;
            if($gutil->startsWith($id,"CIL_"))
            {
                $isCIL = true;
            }

            if($isCIL)
            {
                include 'inner_cil_search_image.php';
            }
            $i++;
        }
?>       
    </div>
</div>


<?php        
    }
    
    
?>

