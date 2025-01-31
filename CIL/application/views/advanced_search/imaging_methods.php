<!-------------------------Imaging Methods------------------------------------>
                <div class="row top-buffer" id="browse_header">
        
                    <div class="col-md-4">
                    <span class="cil_18_san_regular_font700">Imaging Methods</span>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 pull-right">
                        <a href="#ImagingMethods" class="toggle" onclick="openOrCloseImagingMethods()" id="ImagingMethodsShowOptionsLink">Show options</a>

                    </div>

                </div>
                
                <div  class="row"  style="display: none" id="ImagingMethods">
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Item Type
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_item_type_bim" name="image_search_parms[item_type_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#item_type_modal" class="toggle" href="#item_type_ontology_terms" id="item_type_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Image Mode
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_image_mode_bim" name="image_search_parms[image_mode_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#image_mode_modal" class="toggle" href="#image_mode_ontology_terms" id="image_mode_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Visualization Method
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_visualization_methods_bim" name="image_search_parms[visualization_methods_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#visualization_method_modal" class="toggle" href="#visualization_method_ontology_terms" id="visualization_method_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Source of Contrast
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_source_of_contrast_bim" name="image_search_parms[source_of_contrast_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#source_of_contrast_modal" class="toggle" href="#source_of_contrast_ontology_terms" id="source_of_contrast_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Relation to Intact Cell
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_relation_to_intact_cell_bim" name="image_search_parms[relation_to_intact_cell_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#rel_to_intact_cell_modal" class="toggle" href="#relation_to_intact_cell_ontology_terms" id="relation_to_intact_cell_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Processing History
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_processing_history_bim" name="image_search_parms[processing_history_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#processing_history_modal" class="toggle" href="#processing_history_ontology_terms" id="processing_history_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Preparation
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_preparation_bim" name="image_search_parms[preparation_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#preparation_modal" class="toggle" href="#preparation_ontology_terms" id="preparation_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row top-buffer">
                            <div class="col-md-3 cil_13_san_regular_font cil_black_font cil_text_box_align">
                                Parameter Imaged
                            </div>
                            <div class="col-md-5">
                                <input id="image_search_parms_parameter_imaged_bim" name="image_search_parms[parameter_imaged_bim]" style="width: 100%" type="text" value="" class="acInput form-control cil_san_regular_font">
                            </div>
                            <div class="col-md-4  cil_text_box_align">
                                <a data-toggle="modal" data-target="#parameter_imaged_modal" class="toggle" href="#parameter_imaged_ontology_terms" id="parameter_imaged_toggle">Browse Terms</a>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
                
<!-------------------------End Imaging Methods-------------------------------->