<!-------Biological sources--------->
<?php
    if(isset($core['BIOLOGICALPROCESS']) || 
            isset($core['MOLECULARFUNCTION']))
    {
        echo "<h2>Biological Context</h2>";
        echo $cutil->outputDataSection($core,"BIOLOGICALPROCESS", "Biological Process");
        echo $cutil->outputDataSection($core,"MOLECULARFUNCTION", "Molecular Function");
       
    }
?>
<!-------End Biological sources--------->
