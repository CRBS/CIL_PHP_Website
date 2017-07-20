<h2 class='detailed_description'>Experiment
<?php
    //if(isset($result->CIL_CCDB->CCDB->Experiment->ID))
      //  echo "(".$result->CIL_CCDB->CCDB->Experiment->ID.")";

?>

</h2>

<!--------------------Experiment ID------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Experiment->ID))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Experiment ID</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Experiment->ID; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End experiment ID------------------------->


<!--------------------Experiment Date------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Experiment->Date))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Experiment date</b></dt>
                    <dd class='eol_dd'>
                        <?php 
                        
                            $mil = $result->CIL_CCDB->CCDB->Experiment->Date;
                            $seconds = $mil / 1000;
                            echo date("m-d-Y", $seconds);
                        ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End experiment Date------------------------->


<!--------------------Experiment Title------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Experiment->Title))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Title</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Experiment->Title; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End experiment title------------------------->

<!--------------------Experiment Date------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Experiment->Purpose))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Purpose</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Experiment->Purpose; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End experiment Date------------------------->


<!-------------------Experimenters array------------------->
<?php   
    if(isset($result->CIL_CCDB->CCDB->Experiment->Experimenters))
    {
        $experimenters = $result->CIL_CCDB->CCDB->Experiment->Experimenters;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Experimenter(s)</b></dt>
<?php
                    foreach($experimenters as $experimenter)
                    {
                       
?>
                    <dd class='eol_dd'>
                        <?php echo $experimenter; ?>
                    </dd>
<?php
                    }
?>
                </dl>
            </div>
        </div>

<?php
    }
?>    
<!-------------------End leaders array-------------------> 