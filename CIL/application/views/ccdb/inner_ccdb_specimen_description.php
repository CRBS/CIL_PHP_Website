<h2 class='detailed_description'>Specimen description</h2>
<!--------------------Organ------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_description->Organ))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Organ</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Specimen_description->Organ; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Organ------------------------->



<!--------------------System------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_description->Organ))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>System</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Specimen_description->System; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End System------------------------->


<!--------------------Structure------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_description->Structure))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Structure</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Specimen_description->Structure; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Structure------------------------->


<!--------------------Tissue------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_description->Tissue))
    {
        $tissue = $result->CIL_CCDB->CCDB->Specimen_description->Tissue;
        if(strlen($tissue) > 0)
        {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Tissue</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Specimen_description->Tissue; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
        }
    }

?>
<!--------------------End Tissue------------------------->





<!--------------------Map_location------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_description->Map_location))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Map location</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Specimen_description->Map_location; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
        
    }

?>
<!--------------------End Map_location------------------------->


<!--------------------Cell_type------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_description->Cell_type))
    {
        
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Cell type</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Specimen_description->Cell_type; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
        
    }

?>
<!--------------------End Cell_type------------------------->


<!--------------------Atlas_coordinate------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Specimen_description->Atlas_coordinate))
    {
        $atlas_coordinate =$result->CIL_CCDB->CCDB->Specimen_description->Atlas_coordinate;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Atlas coordinate</b></dt>
                    <dd class='eol_dd'>
                        <?php 
                            if(is_array($atlas_coordinate))
                            {
                                $a_count = count($atlas_coordinate);
                                for($i=0;$i<$a_count;$i++)
                                {
                                    echo $a_count[$i];
                                    $i++;
                                    if($i<$a_count)
                                    {
                                        echo ", ";
                                    }
                                }
                                
                            }

                        ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
        
    }

?>
<!--------------------End Atlas_coordinate------------------------->