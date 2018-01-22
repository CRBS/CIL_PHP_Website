<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span class="cil_title">Datasets</span>
        </div>
    </div>
    <div class="row top-buffer">
        
        <div class="col-md-2">
            
            <center>
            <div class="thumbnail-kenburn">
            <a href="/pages/project_20269" target="_self">
                <img src="http://www.cellimagelibrary.org/Cy5.png" width="100px" height="100px">
            </a>
            </div>
            </center>
        </div>
        <div class="col-md-10">
            <!-- <div class="alert alert-warning">Featured Image</div> -->
            <div class="row">
              <div class="col-md-12">
                  <span style="font-size:12px;"><b>Featured data set:</b></span>
              </div>
              <div class="col-md-12">
                
              </div>
              <div class="col-md-12">
                <a href="/pages/project_20269" target="_self"><h3>Human U2OS cells - compound cell-painting experiment (375)</h3></a><br/>
              </div>
              <div class="col-md-12">
                        <b>Project ID:</b> P20269
              </div>
              <div class="col-md-12 top-buffer">
                <b>Description: </b><span style="font-size:12px;font-weight: normal;">Phenotypic profiling attempts to summarize multiparametric, feature-based analysis of cellular phenotypes of each sample so that similarities between profiles reflect similarities between samples. This image set provides a basis for testing image-based profiling methods wrt. to their ability to distinguish the effects of small molecules.</span>
              </div>
                
            </div>
        </div>
    </div>
    <hr>
    
    <?php
        //var_dump($datasets);
        $projects = $datasets->Projects;
        foreach($projects as $project)
        {
     ?>
        <div class="row top-buffer">
            <div class="col-md-2">
                <center>
                <div class="thumbnail-kenburn">
                <a href="<?php echo "/project/".$project->ID; ?>" target="_self">
                    <img src="<?php echo $project->Image_url;  ?>" width="100px" height="100px">
                </a>
                </div>
                </center>
            </div>
            <div class="col-md-10">
                <!-- <a href="<?php //echo "/project/".$project->ID; ?>" target="_self"><h3><?php //echo $project->Name;  ?></h3></a><br/><b>CIL Project: <?php //echo $project->ID  ?></b><br/>
                <span style="font-size:12px;font-weight: normal;"><?php 
                //if(isset($project->Description))
                //echo $project->Description;  ?></span>  -->
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo "/project/".$project->ID; ?>" target="_self"><h3><?php echo $project->Name." (".$project->size.")";  ?></h3></a>
                    </div>
                    <div class="col-md-12">
                        <br/>
                    </div>
                    <div class="col-md-12">
                        <b>Project ID:</b> <?php echo $project->ID  ?></b>
                    </div>
                    <div class="col-md-12 top-buffer">
                        <span style="font-size:12px;font-weight: normal;"><?php 
                            if(isset($project->Description))
                                echo "<b>Description:</b> ".$project->Description;  ?></span>
                    </div>
                    <div class="col-md-12 top-buffer">
                        <span style="font-size:12px;font-weight: normal;"><?php 
                            if(isset($project->Funding_agency))
                                echo "<b>Funding agency:</b> ".$project->Funding_agency;  ?></span>
                    </div>
                    <div class="col-md-12 top-buffer">
                        <span style="font-size:12px;font-weight: normal;"><?php 
                            if(isset($project->Publication))
                                echo "<b>Publication:</b> ".$project->Publication;  ?></span>
                    </div>
                </div>
                
                
            </div>
        </div>
    <hr>
    
    <?php
        }
    ?>

</div>