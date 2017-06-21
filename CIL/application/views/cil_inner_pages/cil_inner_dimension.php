<?php 
    if(isset($json->CIL_CCDB->CIL->CORE->DIMENSION))
    {
        $hasImageSize = false;
        
        $dimension = $json->CIL_CCDB->CIL->CORE->DIMENSION;
        foreach($dimension as $dim)
        {
            if(isset($dim->Image_size))
            {
                $hasImageSize = true;
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
                            echo "<abbr title=\"pixels\">px</abbr>";
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
                            
                            if(strcmp($dim->Pixel_size->unit, "nanometers"))
                                echo "<abbr title=\"nanometers\">nm</abbr></td>";
                            else if(strcmp($dim->Pixel_size->unit, "microns"))
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
?>

        </div>

<?php
    }
?>

