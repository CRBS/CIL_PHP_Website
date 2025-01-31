<form action="/images" method="get">
<div class="container">
     
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>Now special <strong> only € 5,- </strong> express delivery!</div> -->
            <!-- <div class="alert alert-warning">The advanced search is not fully functional yet!</div> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">

            
                <div class="row" id="browse_header">
        
                    <div class="col-md-6">
                        <span class="cil_18_san_regular_font700">General</span>

                    </div>
                    <div class="col-md-6"  style="height: 24px">
                        <div class="pull-right" >
                            <a href="/pages/search_help" class="button search_help" id="advanced_help" title="Search Help">?</a>
                            <input class=" btn btn-xs btn-default" style="font-family: DroidSansRegular" name="advanced_search" type="submit" value="Advanced Search" />
                        </div>
                    </div>
                    
                </div>

                <div class="row top-buffer">
                    
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align"> 
                            General keywords
                            </div>
                            <div class="col-md-6 pull-left">
                                <input id="k_adv" name="k" style="width: 100%" type="text" value="" class="form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-3"></div>
                </div>
                <div class="row top-buffer" id="browse_header">
                    <div class="col-md-12">
                        <span class="cil_18_san_regular_font700">Image Attributes</span>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        
                        Still&nbsp;<input id="still" name="still"  type="checkbox" value="true">
                       
                    </div>
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        <img src="/pix/movie.jpg">&nbsp;Video/Animation&nbsp;<input id="video" name="video" type="checkbox" value="true">
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="image_attributes_spacer_div"></div>
                <div class="row">
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        
                        <img src="/pix/zstack.jpg">&nbsp;Z-Stack&nbsp;<input id="zstack" name="zstack" type="checkbox"  value="true">
                       
                    </div>
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        <img src="/pix/clock.jpg">&nbsp;Time Series&nbsp;<input id="time" name="time"  type="checkbox" value="true">
                    </div>
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        
                    </div>
                </div>
                <div class="image_attributes_spacer_div"></div>
                <div class="row">
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        
                        <img src="/pix/group.jpg">&nbsp;Grouped: Yes &nbsp;<input id="grouped" name="grouped" type="checkbox" value="true">&nbsp;No&nbsp;<input id="ungrouped" name="ungrouped"  type="checkbox" value="true">
                       
                    </div>
                    <div class="col-md-8 cil_san_regular_font cil_black_font">
                        <img src="/pix/calculator.jpg">&nbsp;Suitable for Quantitation: Yes &nbsp;<input id="computable" name="computable" type="checkbox" value="true">&nbsp;No&nbsp;<input id="uncomputable" name="uncomputable"  type="checkbox" value="true">
                    </div>
                    
                </div>
                <div class="image_attributes_spacer_div"></div>
                <div class="row">
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        
                        <img src="/pix/raw3.png" width="30px">&nbsp;Image 2D &nbsp;<input id="image2d" name="image2d" type="checkbox" value="true">
                       
                    </div>
                    <div class="col-md-8 cil_san_regular_font cil_black_font">
                        <img src="/pix/puzzle2.png" width="30px">&nbsp;Reconstruction &nbsp;<input id="reconstruction" name="reconstruction" type="checkbox" value="true">
                    </div>
                    
                </div>
                
                <div class="image_attributes_spacer_div"></div>
                <div class="row">
                    <div class="col-md-4 cil_san_regular_font cil_black_font">
                        
                        <img src="/pix/seg.png" width="30px">&nbsp;Segmentation &nbsp;<input id="segmentation" name="segmentation" type="checkbox" value="true">
                       
                    </div>
                    <div class="col-md-8 cil_san_regular_font cil_black_font">

                    </div>
                    
                </div>
                <br/>
                
                
                <?php include_once 'license.php' ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <p>&nbsp;</p>
                    </div>
                </div>
                
                <?php include_once 'biology.php' ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <p>&nbsp;</p>
                    </div>
                </div>
                <?php include_once 'imaging_methods.php' ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <p>&nbsp;</p>
                    </div>
                </div>
                <?php include_once 'anatomy.php' ?>
                <div class="row">
                    <div class="col-md-12">
                        <p>&nbsp;</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <input class="btn btn-default cil_san_regular_font" name="advanced_search" type="submit" value="Advanced Search" />
                        </div>
                    </div>
                </div>
                
                <div class="row"><br/><br/><br/></div>
                
        </div>
        <div class="col-md-4">
            
            
        </div>
    </div>
    
    <!------biology modal-------------->
    <?php include_once 'biological_process_modal.php'; ?>
    <?php include_once 'cell_type_modal.php'; ?>
    <?php include_once 'cellular_component_modal.php'; ?>
    <?php include_once 'anatomical_entity_modal.php'; ?>
    <?php include_once 'ncbi_organism_modal.php'; ?>
    <?php include_once 'molecular_function_modal.php'; ?>
    <?php include_once 'cell_line_modal.php'; ?>
    <!------End biology modal-------------->
    
    <!------Imaging method modal-------------->
    <?php include_once 'item_type_modal.php'; ?>
    <?php include_once 'image_mode_modal.php'; ?>
    <?php include_once 'visualization_method_modal.php'; ?>
    <?php include_once 'source_of_contrast_modal.php'; ?>
    <?php include_once 'relation_to_intact_cell_modal.php'; ?>
    <?php include_once 'processing_history_modal.php'; ?>
    <?php include_once 'preparation_modal.php'; ?>
    <?php include_once 'parameter_imaged_modal.php'; ?>
    <!------End imaging method modal-------------->
    
    
    <!------Anatomy modal---------------------->
    <?php include_once 'human_development_anatomy_modal.php'; ?>
    <?php include_once 'human_disease_modal.php'; ?>
    <?php include_once 'mouse_gross_anatomy_modal.php'; ?>
    <?php include_once 'mouse_pathology_modal.php'; ?>
    <?php include_once 'plant_growth_modal.php'; ?>
    <?php include_once 'teleost_anatomy_modal.php'; ?>
    <?php include_once 'xenopus_anatomy_modal.php'; ?>
    <?php include_once 'zebrafish_anatomy_modal.php'; ?>
    <!------End Anatomy modal---------------------->
    
</div>
</form>

