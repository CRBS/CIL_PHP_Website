<!-- <div class="images">
<div class="description"> -->
<!-- 
<div class="row">
<div class="col-md-12">
<span class=" pull-right cil_id_font" >CCDB:<?php 
    /*if(!is_null($numeric_id))
    {
        echo $numeric_id;
    }*/
    ?><sup class="detailed_cil_asterisk">*</sup>
</span>
</div>
</div>
-->     
    <div class="row">
        <div class="col-md-12">
            <span class="cil_14_san_regular_font pull-right">CCDB:<?php 
                    if(!is_null($numeric_id))
                    {
                        echo $numeric_id;
                    }
                ?><sup class="detailed_cil_asterisk">*</sup><?php
                    if(isset($json->CIL_CCDB->Citation->Title) && isset($json->CIL_CCDB->Citation->DOI))
                    {
                ?>&nbsp;<a href="#cite" id="citation_btn_id" name="citation_btn_id" class="btn btn-info semi-circle btn-xs">&nbsp;Cite&nbsp;</a></span><?php
                    }
                ?>
                                
        </div>              
    </div>
    
    




<div class="row">
<div class="col-md-12">
<span class="cil_title2">Project: <?php
    if(isset($result->CIL_CCDB->CCDB->Project->ID))
    {
        
 ?>
        <a href="<?php echo "/project/".$result->CIL_CCDB->CCDB->Project->ID; ?>" target="_self"><?php
            echo $result->CIL_CCDB->CCDB->Project->ID;
        ?></a> 
<?php
    }
?>
</span>
</div>

</div>
    

<!-- </h2> -->
<?php

      
    if(isset($result->CIL_CCDB->CCDB->Project->Name))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Project name</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Project->Name; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>

<?php

      
    if(isset($result->CIL_CCDB->CCDB->Project->Description))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Description</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Project->Description; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }

?>
    
<?php   
    if(isset($result->CIL_CCDB->CCDB->Project->Funding_agency))
    {
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Funding agency</b></dt>
                    <dd class='eol_dd'>
                        <?php echo $result->CIL_CCDB->CCDB->Project->Funding_agency; ?>
                    </dd>
                </dl>
            </div>
        </div>

<?php
    }
?>    
   
    
<!-------------------Leaders array------------------->
<?php   
    if(isset($result->CIL_CCDB->CCDB->Project->Leaders))
    {
        $leaders = $result->CIL_CCDB->CCDB->Project->Leaders;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Leader(s)</b></dt>
<?php
                    foreach($leaders as $leader)
                    {
                       
?>
                    <dd class='eol_dd'>
                        <?php echo $leader; ?>
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


<!-------------------Collaborator array------------------->
<?php   
    if(isset($result->CIL_CCDB->CCDB->Project->Collaborator))
    {
        $collaborators = $result->CIL_CCDB->CCDB->Project->Collaborator;
?>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt><b>Collaborator(s)</b></dt>
<?php
                    foreach($collaborators as $collaborator)
                    {
                       
?>
                    <dd class='eol_dd'>
                        <?php echo $collaborator; ?>
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

        <div class="row">
            <div class="col-md-4">
                <dl>
                    <dt><b>Start date</b></dt>
                    <dd class='eol_dd'>
                        <?php 
                        
                            if(isset($result->CIL_CCDB->CCDB->Project->Start_date))
                            {
                                $mil = $result->CIL_CCDB->CCDB->Project->Start_date;
                                $seconds = $mil / 1000;
                                echo date("m-d-Y", $seconds);
                                
                            }
                            else
                            {
                                echo "unspecified";
                            }
                            
                        ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl>
                    <dt><b>End date</b></dt>
                    <dd class='eol_dd'>
                        <?php 
                        
                            if(isset($result->CIL_CCDB->CCDB->Project->End_date))
                            {
                                $mil = $result->CIL_CCDB->CCDB->Project->End_date;
                                $seconds = $mil / 1000;
                                echo date("m-d-Y", $seconds);
                                
                            }
                            else
                            {
                                echo "unspecified";
                            }
                            
                        ?>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4">
                &nbsp;
            </div>
        </div>


    
<!--
</div>
</div> -->
