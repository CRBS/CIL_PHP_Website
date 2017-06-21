<?php 
    if(isset($json->CIL_CCDB->CIL->CORE->DIMENSION))
    {
        $hasImageSize = false;
        $hasWavelength = false;
        
        $dimension = $json->CIL_CCDB->CIL->CORE->DIMENSION;
        
        //Checking whether image size exists
        foreach($dimension as $dim)
        {
            if(isset($dim->Image_size))
            {
                $hasImageSize = true;
                break;
            }
        }
        
        //Checking whether wavelength exists
        foreach($dimension as $dim)
        {
            if(isset($dim->Space) && strcmp($dim->Space,"wavelength") == 0)
            {
                $hasWavelength = true;
                break;
            }
        }
        
        
?>
        <div class='biological_sources'>
        <h2>Dimensions</h2>
<?php
        if(isset($hasImageSize))
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
            
<?php
            $nextColor= "odd";
            foreach($dimension as $dim)
            {
                if(isset($dim->Image_size) || isset($dim->Pixel_size))
                {
                
?>
                    <tr class="<?php echo $nextColor; ?>">
                    <th scope="row">
                    <?php
                        if(isset($dim->Space))
                            echo $dim->Space;
                        else
                            echo "——";
                    ?>
                    </th>
                    <td>
                    <?php
                        if(isset($dim->Image_size))
                        {
                            echo $dim->Image_size;
                            //echo "<abbr title=\"pixels\">px</abbr>";
                            echo "px";
                        }
                        else
                        {
                            echo "——";
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if(isset($dim->Pixel_size->value))
                            echo $dim->Pixel_size->value;
                        else
                            echo "——";
                        if(isset($dim->Pixel_size->unit))
                        {
                            
                            if(strcmp($dim->Pixel_size->unit, "nanometers")==0)
                                echo "<abbr title=\"nanometers\">nm</abbr></td>";
                            else if(strcmp($dim->Pixel_size->unit, "microns")==0)
                                echo "<abbr title=\"microns\">&micro;m</abbr></td>";
                            else 
                                echo "——";
                            
                        }
                    ?>
                     
                    </tr>

<?php
                    if(strcmp($nextColor,"odd")==0)
                       $nextColor = "even";
                   else
                       $nextColor = "odd";
                       
                   }
                }
                  
?>

            </tbody>
            </table>
<?php
        }
       
        if(isset($hasImageSize))
        {
?>
            <table cellspacing="0" summary="Image dimensions. There is one row of column headers, and one column of row headers describing the dimension">
            <thead></thead>
            <tbody>
            <tr class="even">
            <th class="wave_header_cell">Channel</th>
            <th class="wave_header_cell">Wavelength</th>
            <th class="wave_header_cell"></th>
            </tr>
            
<?php
            $nextColor= "odd";
            $counter = 0;
            foreach($dimension as $dim)
            {
                if(isset($dim->Space) && strcmp($dim->Space,"wavelength") == 0)
                {
                    $counter++;
?>
                    <tr class="<?php echo $nextColor; ?>">
                    <th scope="row">
                    <?php
                        echo $counter;
                    ?>
                    </th>
                    
                    <td>
                    <?php
                        if(isset($dim->Value))
                        {
                            echo $dim->Value;
                            if(strcmp($dim->Unit, "nanometers")==0)
                                echo "<abbr title=\"nanometers\">nm</abbr></td>";
                            else if(strcmp($dim->Unit, "microns")==0)
                                echo "<abbr title=\"microns\">&micro;m</abbr></td>";
                            else 
                                echo "——";
                        }
                        else
                        {
                            echo "——";
                        }
                    ?>
                    </td>
                    <td></td>
                    </tr>
                   
<?php
                   if(strcmp($nextColor,"odd")==0)
                       $nextColor = "even";
                   else
                       $nextColor = "odd";
                }
            }

?>
          
            </tbody>
            </table>
<?php
        }
?>

        </div>

<?php
    }
?>

