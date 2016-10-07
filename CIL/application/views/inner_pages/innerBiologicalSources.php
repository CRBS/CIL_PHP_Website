<!-------Biological sources--------->
<?php
    if(isset($core['NCBIORGANISMALCLASSIFICATION']) || 
            isset($core['CELLTYPE'])||
            isset($core['CELLULARCOMPONENT']))
    {
        echo "<h2>Biological Sources</h2>";
        echo $cutil->outputDataSection($core,"NCBIORGANISMALCLASSIFICATION", "NCBI Organism Classification");
        echo $cutil->outputDataSection($core,"CELLTYPE", "Cell Type");
        echo $cutil->outputDataSection($core,"CELLULARCOMPONENT", "Cellular Component");
    }
?>
<!-------End Biological sources--------->
