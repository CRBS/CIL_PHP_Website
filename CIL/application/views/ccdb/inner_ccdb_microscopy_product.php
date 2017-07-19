<h2 class='detailed_description'>Microscopy product</h2>
<!--------------------ID------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Microscopy_product->ID))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Microscopy product ID</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Microscopy_product->ID; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End ID------------------------->


<!--------------------Instrument------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Instrument))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Instrument</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Microscopy_product->Instrument; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Instrument------------------------->


<!--------------------Microscopy_type------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Microscopy_type))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Microscopy type</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Microscopy_product->Microscopy_type; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Microscopy_type------------------------->


<!--------------------Product_type------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Product_type))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Product type</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Microscopy_product->Product_type; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Product_type------------------------->

<!--------------------Image_basename------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Image_basename))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Image basename</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Microscopy_product->Image_basename; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Image_basename------------------------->

<!----------------------X,Y,Z-------------------------------------->
<?php
    if(isset($result->CIL_CCDB->CCDB->Microscopy_product->X_size))
    {
        
?>
    
<table cellspacing="0" summary="Image dimensions. There is one row of column headers, and one column of row headers describing the dimension">
            <thead></thead>
            <tbody>
            <tr class="even">

            <th>Spatial Axis</th>
            <th>Image Size</th>
            <th>Pixel Size</th>
            </tr>
                    
                    <tr class="odd">
                    <th scope="row">
                    X</th>
                    <td>
                    <?php   
                        echo $result->CIL_CCDB->CCDB->Microscopy_product->X_size;
                    ?>px</td>
                    <td>
                    <?php
                        if(isset($result->CIL_CCDB->CCDB->Microscopy_product->X_resolution->value) &&
                            isset($result->CIL_CCDB->CCDB->Microscopy_product->X_resolution->unit))
                        {
                            $x_value = $result->CIL_CCDB->CCDB->Microscopy_product->X_resolution->value;
                            $x_unit = $result->CIL_CCDB->CCDB->Microscopy_product->X_resolution->unit;
                            if(strcmp($x_unit, "um/pixel" )==0)
                                    $x_unit = "µm";
                            
                            echo $x_value." ".$x_unit;
                               
                        }
                    
                    ?>
                    </td></tr>
<?php
        if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Y_size))
        {
 ?>
                    <tr class="even">
                    <th scope="row">
                    Y</th>
                    <td>
                    <?php 
                        if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Y_size))
                        {
                            echo $result->CIL_CCDB->CCDB->Microscopy_product->Y_size;
                        }
                    ?>px</td>
                    <td>
                     <?php 
                        if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Y_resolution->value) && 
                             isset($result->CIL_CCDB->CCDB->Microscopy_product->Y_resolution->unit)    )
                        {
                            $y_value = $result->CIL_CCDB->CCDB->Microscopy_product->Y_resolution->value;
                            $y_unit = $result->CIL_CCDB->CCDB->Microscopy_product->Y_resolution->unit;
                            if(strcmp($y_unit, "um/pixel" )==0)
                                    $y_unit = "µm";
                            
                            echo $y_value." ".$y_unit;
                        }
                    ?>                   
                    </td></tr>
<?php
        }
?>
<?php
        if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Z_size))
        {
 ?>
                    <tr class="odd">
                    <th scope="row">
                    Y</th>
                    <td>
                    <?php 
                        if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Z_size))
                        {
                            echo $result->CIL_CCDB->CCDB->Microscopy_product->Z_size;
                        }
                    ?>px</td>
                    <td>
                     <?php 
                        if(isset($result->CIL_CCDB->CCDB->Microscopy_product->Z_resolution->value) && 
                             isset($result->CIL_CCDB->CCDB->Microscopy_product->Z_resolution->unit)    )
                        {
                            $z_value = $result->CIL_CCDB->CCDB->Microscopy_product->Z_resolution->value;
                            $z_unit = $result->CIL_CCDB->CCDB->Microscopy_product->Z_resolution->unit;
                            if(strcmp($z_unit, "um/pixel" )==0)
                                    $z_unit = "µm";
                            
                            echo $z_value." ".$z_unit;
                        }
                    ?>                   
                    </td></tr>
<?php
        }
?>

            </tbody>
</table>
<?php

    }
?>
<!----------------------END X,Y,Z-------------------------------------->