<?php 
    if(isset($json->CIL_CCDB->CIL->CORE->DIMENSION))
    {
        $hasImageSize = false;
        $hasWavelength = false;
        $hasTime = false;
        
        $dimension = $json->CIL_CCDB->CIL->CORE->DIMENSION;
        
        //Checking whether image size exists
        foreach($dimension as $dim)
        {
            if(isset($dim->Space) && 
                    (isset($dim->Space->Image_size) ||
                     isset($dim->Space->Pixel_size)))
            {
                $hasImageSize = true;
                break;
            }
        }
        
        //Checking whether wavelength exists
        foreach($dimension as $dim)
        {
            if(isset($dim->Wavelength))
            {
                $hasWavelength = true;
                break;
            }
        }
        
        foreach($dimension as $dim)
        {
            if(isset($dim->Time))
            {
                $hasTime = true;
                break;
            }
        }
        
        
?>
        <div class='biological_sources'>
        <!-- <h2>Dimensions</h2> -->
        <span class="cil_title2">Dimensions</span>
<?php
        if($hasImageSize)
        {
?>
            <table cellspacing="0" summary="Image dimensions. There is one row of column headers, and one column of row headers describing the dimension">
            <thead></thead>
            <tbody>
            <tr class="even">

            <th class="cil_black_font">Spatial Axis</th>
            <th class="cil_black_font">Image Size</th>
            <th class="cil_black_font">Pixel Size</th>
            </tr>
            
<?php
            $nextColor= "odd";
            foreach($dimension as $dim)
            {
                if(isset($dim->Space->Image_size) || isset($dim->Space->Pixel_size))
                {
                
?>
                    <tr class="<?php echo $nextColor; ?>">
                    <th scope="row" class="cil_black_font">
                    <?php
                        if(isset($dim->Space->axis))
                            echo $dim->Space->axis;
                        else
                            echo "——";
                    ?>
                    </th>
                    <td class="cil_black_font">
                    <?php
                        if(isset($dim->Space->Image_size))
                        {
                            echo $dim->Space->Image_size;
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
                        if(isset($dim->Space->Pixel_size->value))
                            echo $dim->Space->Pixel_size->value;
                        else
                            echo "——";
                        if(isset($dim->Space->Pixel_size->unit))
                        {
                            
                            if(strcmp($dim->Space->Pixel_size->unit, "nanometers")==0)
                                echo "nm";
                                //echo "<abbr title=\"nanometers\">nm</abbr></td>";
                            else if(strcmp($dim->Space->Pixel_size->unit, "microns")==0)
                                echo "&micro;m";
                                //echo "<abbr title=\"microns\">&micro;m</abbr></td>";
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
       
        if($hasWavelength)
        {
?>
            <table cellspacing="0" summary="Image dimensions. There is one row of column headers, and one column of row headers describing the dimension">
            <thead></thead>
            <tbody>
            <tr class="even">
            <th class="wave_header_cell cil_black_font">Channel</th>
            <th class="wave_header_cell cil_black_font">Wavelength</th>
            <th class="wave_header_cell cil_black_font"></th>
            </tr>
            
<?php
            $nextColor= "odd";
            $counter = 0;
            foreach($dimension as $dim)
            {
                if(isset($dim->Wavelength))
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
                        if(isset($dim->Wavelength->value))
                        {
                            echo $dim->Wavelength->value;
                            if(strcmp($dim->Wavelength->unit, "nanometers")==0)
                                    echo "nm";
                                //echo "<abbr title=\"nanometers\">nm</abbr></td>";
                            else if(strcmp($dim->Wavelength->unit, "microns")==0)
                                    echo "&micro;m";
                                //echo "<abbr title=\"microns\">&micro;m</abbr></td>";
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
        
        
        
        $nextColor= "odd";
        if($hasTime)
        {
?>
            <table cellspacing="0" summary="Image dimensions. There is one row of column headers, and one column of row headers describing the dimension">
            <thead></thead>
            <tbody>
<?php
            $nextColor= "odd";
            $counter = 0;
            foreach($dimension as $dim)
            {
                if(isset($dim->Time))
                {
                    $counter++;
                    
?>
            <tr class="<?php echo $nextColor ?>">

                <th><span class="cil_black_font"><b>Time</b></span></th>
            <th><?php  
                    if(isset($dim->Time->value) &&
                            isset($dim->Time->unit))
                        echo $dim->Time->value." ".$dim->Time->unit;  
                
                ?></th>
            <th><?php 
                    if(isset($dim->Time->frame))
                        echo $dim->Time->frame; 
                ?></th>
            </tr>
<?php
                }
                 if(strcmp($nextColor,"odd")==0)
                       $nextColor = "even";
                   else
                       $nextColor = "odd";
                
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

