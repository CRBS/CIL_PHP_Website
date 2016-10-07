<!-------Biological sources--------->
<?php
    if(isset($core['ITEMTYPE']) || 
            isset($core['IMAGINGMODE'])||
            isset($core['PARAMETERIMAGED'])||
            isset($core['SOURCEOFCONTRAST'])||
            isset($core['VISUALIZATIONMETHODS']) ||
            isset($core['PROCESSINGHISTORY'])
            )
    {
        echo "<h2>Imaging</h2>";
        echo $cutil->outputDataSection($core,"ITEMTYPE", "Image Type");
        echo $cutil->outputDataSection($core,"IMAGINGMODE", "Imaging Mode");
        echo $cutil->outputDataSection($core,"PARAMETERIMAGED", "Parameters Imaged");
        echo $cutil->outputDataSection($core,"SOURCEOFCONTRAST", "Source of Contrast");
        echo $cutil->outputDataSection($core,"VISUALIZATIONMETHODS", "Visualization Methods");
        echo $cutil->outputDataSection($core,"PROCESSINGHISTORY", "Processing History");
    }
?>
<!-------End Biological sources--------->
