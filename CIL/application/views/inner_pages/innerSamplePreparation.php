<!-------Biological sources--------->
<?php
    if(isset($core['PREPARATION']) || 
            isset($core['RELATIONTOINTACTCELL']))
    {
        echo "<h2>Sample Preparation</h2>";
        echo $cutil->outputDataSection($core,"PREPARATION", "Methods");
        echo $cutil->outputDataSection($core,"RELATIONTOINTACTCELL", "Relation To Intact Cell");
       
    }
?>
<!-------End Biological sources--------->
