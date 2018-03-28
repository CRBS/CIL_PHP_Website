<?php 
    require_once 'CILUtil.php';
    require_once 'CILHtmlPrinter.php';
    $cutil = new CILUtil();
    $hprinter = new CILHtmlPrinter();

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                 <br/>
                <div class="col-md-12">
                     <?php include_once 'cil_inner_pages/cil_inner_image.php' ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                
                     <?php include_once 'cil_inner_pages/cil_inner_license.php' ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <?php include_once 'cil_inner_pages/cil_inner_social_media.php' ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                
                     <?php include_once 'cil_inner_pages/cil_inner_comments.php' ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                 
                <div class="col-md-12">
                     <br/> 
                    <!-- <button class="btn-u btn-u-xs rounded-4x btn-u-green" type="button">Add to photobox</button> -->
                    
                    <!-- <a href="/accounts/login_prompt_required" class="mini button" id="toggle_img_favorites_2_logged_out">Add to Photobox</a> -->
                        <div class="row">
                        
                        <div class="col-md-12">
                            <span class="cil_14_regular_font pull-right">CIL:<?php 
                                if(!is_null($numeric_id))
                                {
                                    echo $numeric_id;
                                }
                            ?><sup class="detailed_cil_asterisk">*</sup><?php
                                    if(isset($json->CIL_CCDB->Citation->Title) &&
                                        isset($json->CIL_CCDB->Citation->DOI))
                                    {
                                ?>&nbsp;<a href="#cite" id="citation_btn_id" name="citation_btn_id" class="btn btn-info semi-circle btn-xs">&nbsp;Cite&nbsp;</a></span><?php
                                    }
                                ?>
                                
                        </div>
                        
                        </div>
                    <?php 
                        if(isset($json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text))
                            include_once 'cil_inner_pages/cil_inner_description.php' 
                    ?>
                    
                </div>
                
                <div class="col-md-12">
                     <?php 
                           if(isset($json->CIL_CCDB->CIL->CORE->TECHNICALDETAILS->free_text))
                                include_once 'cil_inner_pages/cil_inner_technical.php' 
                        ?>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                        <?php
                                            if(isset($json->CIL_CCDB->CIL->CORE->NCBIORGANISMALCLASSIFICATION)
                                               || isset($json->CIL_CCDB->CIL->CORE->CELLTYPE)
                                               || isset($json->CIL_CCDB->CIL->CORE->CELLLINE)
                                               || isset($json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT)
                                                )
                                                include_once 'cil_inner_pages/cil_inner_biological_sources.php' 
                                        ?>
                                    
                                </div>
                                <div class="col-md-12">
                                        <?php 
                                        if(isset($json->CIL_CCDB->CIL->CORE->BIOLOGICALPROCESS)
                                            || isset($json->CIL_CCDB->CIL->CORE->MOLECULARFUNCTION)
                                            || isset($json->CIL_CCDB->CIL->CORE->HUMAN_DEV_ANATOMY)
                                            || isset($json->CIL_CCDB->CIL->CORE->HUMAN_DISEASE)
                                            || isset($json->CIL_CCDB->CIL->CORE->MOUSE_GROSS_ANATOMY)
                                            || isset($json->CIL_CCDB->CIL->CORE->XENOPUS_ANATOMY)
                                            || isset($json->CIL_CCDB->CIL->CORE->ZEBRAFISH_ANATOMY))
                                            include_once 'cil_inner_pages/cil_inner_biological_context.php' 
                                        ?>

                                </div>
                                <div class="col-md-12 top-buffer">
                                        <?php 
                                            if(isset($json->CIL_CCDB->CIL->CORE->ATTRIBUTION))
                                                include_once 'cil_inner_pages/cil_inner_attribution.php' 
                                        ?>

                                </div>
                                <div class="col-md-12 top-buffer">
                                        <?php 
                                           
                                            if(isset($json->CIL_CCDB->Citation->Title) &&
                                                isset($json->CIL_CCDB->Citation->DOI))
                                            {
                                                include_once 'cil_inner_pages/cil_inner_citation.php';
                                                
                                            }
                                        ?>

                                </div>
                                <div class="col-md-12 top-buffer">
                                        <?php 
                                            if(isset($json->CIL_CCDB->CIL->CORE->GROUP_ID))
                                                include_once 'cil_inner_pages/cil_inner_grouping.php';
                                        ?>

                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                        
                                     <?php 
                                          if(isset($json->CIL_CCDB->CIL->CORE->ITEMTYPE) 
                                            || isset($json->CIL_CCDB->CIL->CORE->IMAGINGMODE)
                                            || isset($json->CIL_CCDB->CIL->CORE->PARAMETERIMAGED)
                                            || isset($json->CIL_CCDB->CIL->CORE->SOURCEOFCONTRAST)
                                            || isset($json->CIL_CCDB->CIL->CORE->VISUALIZATIONMETHODS)
                                            || isset($json->CIL_CCDB->CIL->CORE->PROCESSINGHISTORY)
                                            || isset($json->CIL_CCDB->CIL->CORE->DATAQUALIFICATION))
                                            include_once 'cil_inner_pages/cil_inner_imaging.php' 
                                     
                                       ?>
                                   
                                </div>
                                <div class="col-md-12">
                                        <?php 
                                        if(isset($json->CIL_CCDB->CIL->CORE->PREPARATION)
                                           || isset($json->CIL_CCDB->CIL->CORE->RELATIONTOINTACTCELL))
                                            include_once 'cil_inner_pages/cil_inner_sample_prep.php'; 
                                        ?>

                                </div>
                                <div class="col-md-12">
                                        <?php 
                                        if(isset($json->CIL_CCDB->CIL->CORE->DIMENSION))
                                            include_once 'cil_inner_pages/cil_inner_dimension.php';  
                                        ?>

                                </div>
                                <div class="col-md-12">
                                        <?php
                                        if(isset($json->CIL_CCDB->CIL->CORE->CHEMICAL_COMPOUNDS) &&
                                             count($json->CIL_CCDB->CIL->CORE->CHEMICAL_COMPOUNDS) > 0)
                                            include_once 'cil_inner_pages/cil_inner_chemical_compounds.php';
                                        ?>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
    
    
        </div>
        
    </div>

</div>
            <!----------Model--------------------->
            <div class="modal fade" id="citation_modal2" role="dialog">
                <div class="modal-dialog">

                  
                  <div class="modal-content">
                      <div class="modal-header" style="background-color: #92d4f0" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <span class="cil_16_font_white">Citation Information</span>
                      </div>
                    <div class="modal-body" id="modal-body-id">
                    <?php
                        if(isset($json->CIL_CCDB->Citation->Title) &&
                            isset($json->CIL_CCDB->Citation->DOI))
                        {
                            
                        ?>
                        <span class="cil_description">
                    <?php
                    
                    
                            echo $json->CIL_CCDB->Citation->Title.". ";
                            echo "https://doi.org/".$json->CIL_CCDB->Citation->DOI;
                            
                    
                    ?>
                        </span>
                    <?php
                        }
                        
                    ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div> 
            <!----------End modal----------------->



            
<script>
    $( function() {

        $( "#citation_btn_id" ).click(function() 
        {
            
            $('#citation_modal2').modal({
                show: true
              })
        });
    });
</script>