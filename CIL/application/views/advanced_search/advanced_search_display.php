<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>Now special <strong> only € 5,- </strong> express delivery!</div> -->
            <div class="alert alert-warning">The advanced search is not functional yet!</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            
                <div class="row" id="browse_header">
        
                    <div class="col-md-6">
                        <span class="general_text">General</span>

                    </div>
                    <div class="col-md-6 pull-right">

                        <a href="/pages/search_help" class="button search_help" id="advanced_help" title="Search Help">?</a>
                        <button  type="submit">Advanced Search</button>
                        
                    </div>

                </div>
                <div class="row top-buffer">
                    
                            <div class="col-md-3">General Keywords</div>
                            <div class="col-md-6 pull-left">
                                <input id="k_adv" name="k" style="width: 100%" type="text" value="">
                            </div>
                            <div class="col-md-3"></div>
                </div>
                <div class="row" id="browse_header">
                    <div class="col-md-12">
                        <span class="general_text">Image Attributes</span>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-4">
                        
                        Still&nbsp;<input id="still" name="still"  type="checkbox" value="true">
                       
                    </div>
                    <div class="col-md-4">
                        <img src="/pix/movie.jpg">&nbsp;Video/Animation&nbsp;<input id="video" name="video" type="checkbox" value="true">
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="image_attributes_spacer_div"></div>
                <div class="row">
                    <div class="col-md-4">
                        
                        <img src="/pix/zstack.jpg">&nbsp;Z-Stack&nbsp;<input id="zstack" name="zstack" type="checkbox"  value="true">
                       
                    </div>
                    <div class="col-md-4">
                        <img src="/pix/clock.jpg">&nbsp;Time Series&nbsp;<input id="time" name="time"  type="checkbox" value="true">
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="image_attributes_spacer_div"></div>
                <div class="row">
                    <div class="col-md-4">
                        
                        <img src="/pix/group.jpg">&nbsp;Grouped: Yes &nbsp;<input id="grouped" name="grouped" type="checkbox" value="true">&nbsp;No&nbsp;<input id="ungrouped" name="ungrouped"  type="checkbox" value="true">
                       
                    </div>
                    <div class="col-md-8">
                        <img src="/pix/calculator.jpg">&nbsp;Suitable for Quantitation: Yes &nbsp;<input id="computable" name="computable" type="checkbox" value="true">&nbsp;No&nbsp;<input id="uncomputable" name="uncomputable"  type="checkbox" value="true">
                    </div>
                    
                </div>
                
                <!-------------------------License---------------------------------------->
                <div class="row top-buffer" id="browse_header">
        
                    <div class="col-md-12">
                        <span class="general_text">License </span>&nbsp;&nbsp;<a href="/pages/license">?</a>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        Public Domain&nbsp;&nbsp;<input id="public_domain" name="public_domain" type="checkbox" value="true">
                    </div>
                    <div class="col-md-3">
                        Attribution By&nbsp;&nbsp;<input id="attribution_cc" name="attribution_cc" type="checkbox" value="true">
                    </div>
                    <div class="col-md-4">
                        Attribution Non-Commercial&nbsp;&nbsp;<input id="attribution_nc_sa" name="attribution_nc_sa" type="checkbox" value="true">
                    </div>
                    <div class="col-md-2">
                        Copyright&nbsp;&nbsp;<input id="copyright" name="copyright" type="checkbox" value="true">
                    </div>
                </div>
                <!-------------------------End License---------------------------------------->
                
                
                <!-------------------------Biology---------------------------------------->
                <div class="row top-buffer" id="browse_header">
                    <div class="col-md-12">
                        <span class="general_text">Biology </span>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                Biological Process
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_biological_process" name="image_search_parms[biological_process]" style="width: 100%" type="text" value="" />
                            </div>
                            <div class="col-md-4">
                                <a  data-toggle="modal" data-target="#biological_process_modal" class='toggle' href='#biological_process_ontology_terms' id='biological_process_toggle'>Browse Terms</a>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="row top-buffer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                Cell Type
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_cell_type" name="image_search_parms[cell_type]" style="width: 100%" type="text" value="" />
                            </div>
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#cell_type_modal" class='toggle' href='#cell_type_ontology_terms' id='cell_type_toggle'>Browse Terms</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                Cell Line
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_cell_line" name="image_search_parms[cell_line]" style="width: 100%" type="text" value="" >
                            </div>
                            <div class="col-md-4">
                                <a class="toggle" href="#cell_line_ontology_terms" id="cell_line_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                Anatomical Entity
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_foundational_model_anatomy" name="image_search_parms[foundational_model_anatomy]" style="width: 100%" type="text" value="">
                            </div>
                            <div class="col-md-4">
                                <a class="toggle" href="#anatomical_entity_ontology_terms" id="anatomical_entity_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                Cellular Component
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_cellular_component" name="image_search_parms[cellular_component]" style="width: 100%" type="text" value="">
                            </div>
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#cellular_component_modal" class="toggle" href="#cellular_component_ontology_terms" id="cellular_component_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                Molecular Function
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_molecular_function" name="image_search_parms[molecular_function]" style="width: 100%" type="text" value="">
                            </div>
                            <div class="col-md-4">
                                <a class="toggle" href="#molecular_function_ontology_terms" id="molecular_function_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                NCBI Organism
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_ncbi" name="image_search_parms[ncbi]" style="width: 100%" type="text" value="">
                            </div>
                            <div class="col-md-4">
                                <a class="toggle" href="#ncbi_organism_ontology_terms" id="ncbi_organism_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-------------------------End Biology---------------------------------------->
                <div class="row"><br/><br/><br/></div>
                
        </div>
        <div class="col-md-6">
            
            
        </div>
    </div>
    <?php include_once 'biological_process_modal.php' ?>
    <?php include_once 'cell_type_modal.php' ?>
    <?php include_once 'cellular_component_modal.php' ?>
</div>

