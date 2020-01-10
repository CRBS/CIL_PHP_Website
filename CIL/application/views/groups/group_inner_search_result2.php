<?php 

    $cwd = getcwd();
    $cwd = str_replace("\\", "/", $cwd);
    $path = $cwd."/application/controllers/GeneralUtil.php"; 
    require_once $path;
    
    $gutil = new GeneralUtil();
?>
<div class="row">
<?php

    if(!isset($result))
    {
        echo "No data can be found!";
        return;
    }

    $hits = $result->hits->hits;
    
    foreach($members as $member)
    {
        foreach($hits as $hit)
        {
            $member_id = "CIL_".$member;
?>



<?php

           
        $image = $hit;
        $id = $image->_id;
        
        if(strcmp($member_id, $id)==0)
        {
            $isCIL = true;

            
                echo "<div class='col-md-6'>";
                include 'inner_cil_search_image.php';
                echo "</div>";
            
        }
            
       
?>

    




<?php

        }
    }
    
    
?>

</div>