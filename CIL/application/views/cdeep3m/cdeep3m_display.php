<div class="container">
    <div class="row" id="browse_header">
        
        <div class="col-md-6">
           
        <div class="grid_12">
        <div class="grid_6" id="browse_header_text">
        CDeep3M
        </div> 
        </div>
            
        </div>
        <div class="col-md-6">
           <div class="pull-right">
           </div>
        </div>
        

        
    </div>
    <br/>
    
    
    <div class="row">
        <div class="col-md-6">
            <!-- <img src="/pix/uCT_Hippo0112.png" width="100%" /> -->
            <img src="/pic/cdeep3m/CDeep3M_overview_image_v2_2-01.png" width="100%" /><br/>
            <div class=" cil_description">Adapted from: Haberl, et al., (2018) CDeep3M: plug-and-play cloud based deep learning for image segmentation, Nat Methods 15 (2018) 677–680.</div>
        </div>
        
        <div class="col-md-6">
            <div class="row">
            <div class="col-md-12">
                <span class="cil_title2">Description</span>
            </div>
            <div class="col-md-12  cil_description">
            
            As biological imaging datasets increase in size, deep neural networks are considered vital tools for efficient image segmentation. While a number of different network architectures have been developed for segmenting even the most challenging biological images, community access is still limited by the difficulty of setting up complex computational environments and processing pipelines, and the availability of compute resources. Here, we address these bottlenecks, providing a ready-to-use image segmentation solution for any lab, with a pre-configured, publicly available, cloud-based deep convolutional neural network on Amazon Web Services (AWS). We provide simple instructions for training and applying CDeep3M for segmentation of large and complex 2D and 3D microscopy datasets of diverse biomedical imaging modalities. <a href="https://www.biorxiv.org/content/early/2018/06/21/353425" target="_blank">Read more.</a>
            <br/><br/>
            Email us at <a href="mailto:cdeep3m@ucsd.edu">cdeep3m@ucsd.edu</a> to set up an account for the CDeep3M PRP Demo.
            <br/>
            <a class="button mini" alt="CDeep3M PRP Demo" href="/cdeep3m/prp_demo" target="_self">CDeep3M PRP Demo</a>
            <br/><br/> 
            <br/>
            </div>
            </div>
        </div>
        
        <div class="col-md-12"><br/><br/></div>
    <!------Model start-------------->
    
    <?php

        if(isset($models_json) && !is_null($models_json) && isset($models_json->hits) && $models_json->hits->total >0)
        {
            $hits = $models_json->hits->hits;
            foreach($hits as $item)
            {
                $title = "";
                if(isset($item->_source->Cdeepdm_model->ITEMTYPE))
                {
                    foreach($item->_source->Cdeepdm_model->ITEMTYPE as $mp_type)
                    {
                        if(isset($mp_type->onto_id) && isset($mp_type->onto_name))
                            $title = $title." ".$mp_type->onto_name;

                        if(isset($mp_type->free_text))
                            $title = $title." ".$mp_type->free_text;
                    }
                }
                if(isset($item->_source->Cdeepdm_model->CELLULARCOMPONENT))
                {
                    foreach($item->_source->Cdeepdm_model->CELLULARCOMPONENT as $mp_type)
                    {
                        if(isset($mp_type->onto_id) && isset($mp_type->onto_name))
                            $title = $title." ".$mp_type->onto_name;

                        if(isset($mp_type->free_text))
                            $title = $title." ".$mp_type->free_text;
                    }
                }
                
                $title = $title." (".$item->_id.")";
    ?>        
     
           <div class="col-md-12">
                <!-- <span class="cil_title2"><?php //if(isset($item->_source->Cdeepdm_model->Name)) echo $item->_source->Cdeepdm_model->Name; ?> (<?php //echo $item->_id ?>)</span> -->
               <span class="cil_title2"><?php echo $title; ?></span>
            </div>
             <!------Model content---------------->
            <div class="col-md-6">
               <div class="biological_sources">

            <dl>
    

                    <dt><span class="cil_small_title">Trained model</span></dt>
                    <dd class="eol_dd">
                    <span>
                        <?php if(isset($item->_source->Cdeepdm_model->Name)) echo $item->_source->Cdeepdm_model->Name; ?>
                    </span>
                    </dd>


                <dt><span class="cil_small_title">Description</span></dt>
                <dd class="eol_dd">
                <span>
                <?php if(isset($item->_source->Cdeepdm_model->Description)) echo $item->_source->Cdeepdm_model->Description; ?>
                </span>
                </dd>

                
                <dt><span class="cil_small_title">X Voxelsize</span></dt>
                <dd class="eol_dd">
                <span>
                <?php if(isset($item->_source->Cdeepdm_model->X_voxelsize->Value)) echo $item->_source->Cdeepdm_model->X_voxelsize->Value; ?>
                <?php if(isset($item->_source->Cdeepdm_model->X_voxelsize->Unit)) echo $item->_source->Cdeepdm_model->X_voxelsize->Unit; ?>
                </span>
                </dd>
                
                <dt><span class="cil_small_title">Y Voxelsize</span></dt>
                <dd class="eol_dd">
                <span>
                <?php if(isset($item->_source->Cdeepdm_model->Y_voxelsize->Value)) echo $item->_source->Cdeepdm_model->Y_voxelsize->Value; ?>
                <?php if(isset($item->_source->Cdeepdm_model->Y_voxelsize->Unit)) echo $item->_source->Cdeepdm_model->Y_voxelsize->Unit; ?>
                </span>
                </dd>
                
                <dt><span class="cil_small_title">Z Voxelsize</span></dt>
                <dd class="eol_dd">
                <span>
                <?php if(isset($item->_source->Cdeepdm_model->Z_voxelsize->Value)) echo $item->_source->Cdeepdm_model->Z_voxelsize->Value; ?>
                <?php if(isset($item->_source->Cdeepdm_model->Z_voxelsize->Unit)) echo $item->_source->Cdeepdm_model->Z_voxelsize->Unit; ?>
                </span>
                </dd>

                <?php
                    if(isset($item->_source->Cdeepdm_model->ITEMTYPE) && is_array($item->_source->Cdeepdm_model->ITEMTYPE))
                    {
                ?>
                
                <dt><span class="cil_small_title">Microscopy type</span></dt>
                        <?php
                            foreach($item->_source->Cdeepdm_model->ITEMTYPE as $mp_type)
                            {
                                
                                
                        ?>
                
                <dd class="eol_dd">
                <span>
                <?php if(isset($mp_type->onto_id) && isset($mp_type->onto_name)) echo $mp_type->onto_name; ?>
                <?php if(isset($mp_type->free_text)) echo $mp_type->free_text; ?>
                </span>
                </dd>
                        <?php
                                
                            }
                        ?>
                <?php
                    }
                ?>
                
                <!------------------Cellular component -------------->
                <?php
                    if(isset($item->_source->Cdeepdm_model->CELLULARCOMPONENT) && is_array($item->_source->Cdeepdm_model->CELLULARCOMPONENT))
                    {
                ?>
                
                <dt><span class="cil_small_title">Cellular component</span></dt>
                        <?php
                            foreach($item->_source->Cdeepdm_model->CELLULARCOMPONENT as $mp_type)
                            {
                                
                                
                        ?>
                
                <dd class="eol_dd">
                <span>
                <?php if(isset($mp_type->onto_id) && isset($mp_type->onto_name)) echo $mp_type->onto_name; ?>
                <?php if(isset($mp_type->free_text)) echo $mp_type->free_text; ?>
                </span>
                </dd>
                        <?php
                                
                            }
                        ?>
                <?php
                    }
                ?>
                <!------------------End Cellular component -------------->
                
                
                <!------------------Author -------------->
                <?php
                    if(isset($item->_source->Cdeepdm_model->Contributors) && is_array($item->_source->Cdeepdm_model->Contributors))
                    {
                ?>
                
                <dt><span class="cil_small_title">Author</span></dt>
                        <?php
                            foreach($item->_source->Cdeepdm_model->Contributors as $author)
                            {
                                
                                
                        ?>
                
                <dd class="eol_dd">
                <span>
                <?php  echo $author; ?>
                
                </span>
                </dd>
                        <?php
                                
                            }
                        ?>
                <?php
                    }
                ?>
                <!------------------End Author -------------->
                
                
                <dt><span class="cil_small_title">DOI</span></dt>
                       
                
                <dd class="eol_dd">
                <span>
                <?php  echo "https://doi.org/10.7295/W9CDEEP3M".$item->_id; ?>
                
                </span>
                </dd>
                
            </dl>
            </div>
                
                
            </div>
             
            <!------End Model content---------------->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <a href="https://cildata.crbs.ucsd.edu/media/model_display/<?php echo $item->_id ?>/<?php echo $item->_id ?>_thumbnailx512.jpg" title="<?php if(isset($item->_source->Cdeepdm_model->Name)) echo $item->_source->Cdeepdm_model->Name; ?>" alt="<?php if(isset($item->_source->Cdeepdm_model->Name)) echo $item->_source->Cdeepdm_model->Name; ?>" target="_blank"><img width="512px" height="512px" src="https://cildata.crbs.ucsd.edu/media/model_display/<?php echo $item->_id ?>/<?php echo $item->_id ?>_thumbnailx512.jpg" /></a>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-12"><br/></div>
            <div class="col-md-12 cil_description">
                <center><a class="button mini" href="https://doi.org/10.7295/W9CDEEP3M<?php echo $item->_id ?>" target="_self">Download</a></center>
            </div>
            <div class="col-md-12"><br/></div>
    <?php
                
            }
        }
        
    ?>
    
    
    <!-------End model--->             
                
    <!------Model start-------------->      
           <div class="col-md-12">
                <span class="cil_title2">SEMTEM membranes</span>
            </div>
            
            <!------Model content---------------->
            <div class="col-md-6">
               <div class="biological_sources">

            <dl>
    

                    <dt><span class="cil_small_title">Trained model</span></dt>
                    <dd class="eol_dd">
                    <span>
                        Membranes
                    </span>
                    </dd>


                <dt><span class="cil_small_title">Modality</span></dt>
                <dd class="eol_dd">
                <span>
                Transmission electron microscopy, serial block-face scanning electron microscopy
                </span>
                </dd>


                <dt><span class="cil_small_title">Voxelsize</span></dt>
                <dd class="eol_dd">
                <span>
                ~5nm
                </span>
                </dd>


            </dl>
            </div>     
            </div>
            <!------End Model content---------------->
            <div class="col-md-6">
                <!--<div class="row">
                    <div class="col-md-12">
                        <a href="/pic/cdeep3m/membranes_accuracy.jpg" title="Validation accuracy" alt="Validation accuracy" target="_blank"><img width="100%" src="/pic/cdeep3m/membranes_accuracy.jpg" /></a>
                    </div>
                    <div class="col-md-12">
                        <center><a href="/pic/cdeep3m/membranes_loss.jpg" title="Training vs Validation Loss" alt="Training vs Validation Loss" target="_blank" class="cil_16_font">View the training accuracy</a></center>
                    </div>
                </div>-->
            </div>
            
            <br/><br/>
            
            <div class="col-md-12 cil_description">
                <center><a class="button mini" href="https://cildata.crbs.ucsd.edu/media/cdeep3m/SEMTEM_membranes_TrainedNet.tar" target="_self">Download</a></center>
            </div>
            <br/><br/> 
            <!-------End model--->          
    <!------Model start-------------->      
           <div class="col-md-12">
                <span class="cil_title2">Tomo Vesicles</span>
            </div>
            <div class="col-md-12">
               <div class="biological_sources">

            <dl>
    

                    <dt><span class="cil_small_title">Trained model</span></dt>
                    <dd class="eol_dd">
                    <span>
                        Synaptic Vesicles
                    </span>
                    </dd>

                <dt><span class="cil_small_title">Sample</span></dt>
                <dd class="eol_dd">High-Pressure Frozen, Hippocampus Mouse Brain</dd>
   

                <dt><span class="cil_small_title">Modality</span></dt>
                <dd class="eol_dd">
                <span>
                Serial section electron tomography
                </span>
                </dd>


                <dt><span class="cil_small_title">Voxelsize</span></dt>
                <dd class="eol_dd">
                <span>
                1.6nm
                </span>
                </dd>


            </dl>
            </div>     
            </div>
            <br/><br/>
            
            <div class="col-md-12 cil_description">
                <center><a class="button mini" href="https://cildata.crbs.ucsd.edu/media/cdeep3m/Tomo_VesiclesTrainedNet.tar" target="_self">Download</a></center>
            </div>
            <div class="col-md-12">
            <br/><br/>
            </div>
            <!-------End model--->            
            
            

           

                
           <!------Model start-------------->      
           <div class="col-md-12">
                <span class="cil_title2">XRM nuclei</span>
            </div>
            <div class="col-md-12">
               <div class="biological_sources">

            <dl>
    

                    <dt><span class="cil_small_title">Trained model</span></dt>
                    <dd class="eol_dd">
                    <span>
                        Nucleus segmentation
                    </span>
                    </dd>

                <dt><span class="cil_small_title">Sample</span></dt>
                <dd class="eol_dd">Hippocampus Mouse Brain Stained for SBEM</dd>
   

                <dt><span class="cil_small_title">Modality</span></dt>
                <dd class="eol_dd">
                <span>
                X-Ray micro CT
                </span>
                </dd>

                <dt><span class="cil_small_title">Objective</span></dt>
                <dd class="eol_dd">
                <span>
                40x
                </span>
                </dd>

                <dt><span class="cil_small_title">Voxelsize</span></dt>
                <dd class="eol_dd">
                <span>
                0.4159µm
                </span>
                </dd>


            </dl>
            </div>     
            </div>
            <br/><br/>
            
            <div class="col-md-12 cil_description">
                <center><a class="button mini" href="https://cildata.crbs.ucsd.edu/media/cdeep3m/XRM_Nuclei_TrainedNet_062018.zip" target="_self">Download</a></center>
            </div>
            <div class="col-md-12">
            <br/>
            </div>
            <!-------End model--->
            
            

           </div>
            
        </div>
    


        
