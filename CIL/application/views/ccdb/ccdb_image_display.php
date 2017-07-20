<?php 
    //$nid = str_replace("CCDB_", "", $id);
   $id =  $image_id;
   $nid = str_replace("CCDB_", "", $image_id);
   //echo "ID:".$id;
    $numeric_id =$nid;
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                 <br/>
                <div class="col-md-12">
                     <?php //include_once 'cil_inner_pages/cil_inner_image.php' ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                
                     <?php 
                            if(isset($result->CIL_CCDB->CCDB->Reconstruction))
                                include_once 'inner_ccdb_reconstruction.php'; 
                     ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <?php //include_once 'cil_inner_pages/cil_inner_social_media.php' ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                
                     <?php //include_once 'cil_inner_pages/cil_inner_comments.php' ?>
                </div>
            </div>
        </div>
        <!-----Starting right panel------------------->
        <div class="col-md-6">
            <div class="row">
                 
                <div class="col-md-12">
                    <br/>
                    <!-- <button class="btn-u btn-u-xs rounded-4x btn-u-green" type="button">Add to photobox</button> -->
                    
                    <a href="/accounts/login_prompt_required" class="mini button" id="toggle_img_favorites_2_logged_out">Add to Photobox</a>
                    <span class="cil pull-right">CCDB:<?php 
                        if(!is_null($numeric_id))
                        {
                            echo $numeric_id;
                        }
                    ?><sup class="detailed_cil_asterisk">*</sup></span> 
                    <?php 
                        
                        if(isset($result->CIL_CCDB->CCDB->Project))
                            include_once  'inner_ccdb_project.php';
                    ?>
                </div>
                
                <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-6">
                        <?php 
                        
                        if(isset($result->CIL_CCDB->CCDB->Experiment))
                            include_once  'inner_ccdb_experiment.php';
                        ?>
                        </div>
                         <div class="col-md-6">
                        <?php 
                        
                        if(isset($result->CIL_CCDB->CCDB->Microscopy_product))
                            include_once  'inner_ccdb_microscopy_product.php';
                        ?>
                        </div>
                     </div>
                </div>
                
                <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-6">
                        <?php 
                        
                        if(isset($result->CIL_CCDB->CCDB->Subject))
                            include_once  'inner_ccdb_subject.php';
                        ?>
                        </div>
                         <div class="col-md-6">
                         <?php 
                        
                        if(isset($result->CIL_CCDB->CCDB->Subject->Tissue_section))
                            include_once  'inner_ccdb_tissue_section.php';
                        ?>
                        </div>
                     </div>
                </div>
                
                
                <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-6">
                        <?php 
                        if(isset($result->CIL_CCDB->CCDB->Specimen_description))
                            include_once  'inner_ccdb_specimen_description.php';
                        ?>
                        </div>
                         <div class="col-md-6">
                        <?php 
                        if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Lm_microscopy_product))
                            include_once  'inner_ccdb_lm_product.php';
                        else if(isset($result->CIL_CCDB->CCDB->Imaging_parameters->Em_microscopy_product))
                            include_once  'inner_ccdb_em_product.php';
                        ?>
                        </div>
                     </div>
                </div>
                 
                <div class="col-md-12">
                     <div class="row">
                         <div class="col-md-12">
                         <?php 
                            if(isset($result->CIL_CCDB->CCDB->Specimen_preparation->Protocol_used))
                                include_once  'inner_ccdb_specimen_preparation.php';
                         ?>
                         </div>
                     </div>
                </div>
                <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-6">
                        <?php 
                        
                        if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Double_tilt))
                            include_once  'inner_ccdb_double_tilt.php';
                        else if(isset($result->CIL_CCDB->CCDB->Imaging_product_types->Mosaic))
                            include_once 'inner_ccdb_mosaic.php';
                        
                        ?>
                        </div>
                         <div class="col-md-6">
                         
                        </div>
                     </div>
                </div>    
                         
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                        <?php
                                           // if(isset($json->CIL_CCDB->CIL->CORE->NCBIORGANISMALCLASSIFICATION))
                                           //     include_once 'cil_inner_pages/cil_inner_biological_sources.php' 
                                        ?>
                                    
                                </div>
                                <div class="col-md-12">
                                        <?php 
                                        //if(isset($json->CIL_CCDB->CIL->CORE->BIOLOGICALPROCESS))
                                        //    include_once 'cil_inner_pages/cil_inner_biological_context.php' 
                                        ?>

                                </div>
                                <div class="col-md-12">
                                        <?php 
                                            //if(isset($json->CIL_CCDB->CIL->CORE->ATTRIBUTION))
                                            //    include_once 'cil_inner_pages/cil_inner_attribution.php' 
                                        ?>

                                </div>
                                <div class="col-md-12">
                                        <?php 
                                           // if(isset($json->CIL_CCDB->CIL->CORE->GROUP_ID))
                                          //      include_once 'cil_inner_pages/cil_inner_grouping.php' 
                                        ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                        
                                     <?php 
                                         // if(isset($json->CIL_CCDB->CIL->CORE->ITEMTYPE) || isset($json->CIL_CCDB->CIL->CORE->IMAGINGMODE))
                                          //  include_once 'cil_inner_pages/cil_inner_imaging.php' 
                                     
                                       ?>
                                   
                                </div>
                                <div class="col-md-12">
                                        <?php 
                                       /// if(isset($json->CIL_CCDB->CIL->CORE->PREPARATION))
                                         //   include_once 'cil_inner_pages/cil_inner_sample_prep.php'; 
                                        ?>

                                </div>
                                <div class="col-md-12">
                                        <?php 
                                       // if(isset($json->CIL_CCDB->CIL->CORE->DIMENSION))
                                          //  include_once 'cil_inner_pages/cil_inner_dimension.php';  
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
