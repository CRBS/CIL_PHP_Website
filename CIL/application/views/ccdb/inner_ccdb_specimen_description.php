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
                        <a href="<?php echo $ccdb_direct_data_prefix."/".$result->CIL_CCDB->CCDB->Specimen_description->Map_location; ?>" target="_blank">View location</a>
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
                                    if($a_count[$i] == 0)
                                        echo "0";
                                    else
                                        echo $a_count[$i];
                                   
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