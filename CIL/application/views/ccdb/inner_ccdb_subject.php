<h2 class='detailed_description'>Subject</h2>
<!--------------------Species------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Species))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Species</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Subject->Species; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Species------------------------->


<!--------------------Scientific_name------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Scientific_name))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Scientific name</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Subject->Scientific_name; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Scientific_name------------------------->

<!--------------------Strain------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Strain))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Strain</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Subject->Strain; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Group_by------------------------->



<!--------------------Group_by------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Group_by))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Group by</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Subject->Group_by; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Group_by------------------------->

<!--------------------Treatment------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Treatment))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Treatment</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Subject->Treatment; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Treatment------------------------->


<!--------------------Age------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Organism->Age))
    {
        $age = $result->CIL_CCDB->CCDB->Subject->Organism->Age;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Age</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $age->value." ".$age->unit; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Age------------------------->


<!--------------------Age_class------------------------->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Subject->Organism->Age_class))
    {
        $age_class = $result->CIL_CCDB->CCDB->Subject->Organism->Age_class;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Age class</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $age_class; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
<!--------------------End Age_class------------------------->
