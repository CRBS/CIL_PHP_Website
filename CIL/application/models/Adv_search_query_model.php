<?php

class Adv_search_query_model extends CI_Model {

    public $k;
    public $still;
    public $video;
    public $zstack;
    public $time; 
    public $grouped;
    public $computable;
    public $public_domain;
    public $attribution_cc;
    public $attribution_nc_sa;
    public $copyright;
    public $image_search_parms_biological_process;
    public $image_search_parms_cell_type;
    public $image_search_parms_cell_line;
    public $image_search_parms_foundational_model_anatomy;
    public $image_search_parms_cellular_component;
    public $image_search_parms_molecular_function;
    public $image_search_parms_ncbi;
    public $image_search_parms_item_type_bim;
    public $image_search_parms_image_mode_bim;
    public $image_search_parms_visualization_methods_bim;
    public $image_search_parms_source_of_contrast_bim;
    public $image_search_parms_relation_to_intact_cell_bim;
    public $image_search_parms_processing_history_bim;
    public $image_search_parms_preparation_bim;
    public $image_search_parms_parameter_imaged_bim;
    public $image_search_parms_human_dev_anatomy;
    public $image_search_parms_human_disease;
    public $image_search_parms_mouse_gross_anatomy;
    public $image_search_parms_mouse_pathology;
    public $image_search_parms_plant_growth;
    public $image_search_parms_teleost_anatomy;
    public $image_search_parms_xenopus_anatomy;
    public $image_search_parms_zebrafish_anatomy;
        
    public function print_model()
    {
        echo "<br/>-----------------Params----------------------";
        echo "<br/>k:".$this->k;
        echo "<br/>still:".$this->still;
        echo "<br/>video:".$this->video;
        echo "<br/>zstack:".$this->zstack;
        echo "<br/>time:".$this->time;
        echo "<br/>grouped:".$this->grouped;
        echo "<br/>computable:".$this->computable;
        echo "<br/>public_domain:".$this->public_domain;
        echo "<br/>attribution_cc:".$this->attribution_cc;
        echo "<br/>attribution_nc_sa:".$this->attribution_nc_sa;
        echo "<br/>copyright:".$this->copyright;
        echo "<br/>image_search_parms_biological_process:".$this->image_search_parms_biological_process;
        echo "<br/>image_search_parms_cell_type:".$this->image_search_parms_cell_type;
        echo "<br/>image_search_parms_molecular_function:".$this->image_search_parms_molecular_function;
        echo "<br/>image_search_parms_ncbi:".$this->image_search_parms_ncbi;
        echo "<br/>image_search_parms_item_type_bim:".$this->image_search_parms_item_type_bim;
        echo "<br/>image_search_parms_image_mode_bim:".$this->image_search_parms_image_mode_bim;
        echo "<br/>image_search_parms_visualization_methods_bim:".$this->image_search_parms_visualization_methods_bim;
        echo "<br/>image_search_parms_source_of_contrast_bim:".$this->image_search_parms_source_of_contrast_bim;
        echo "<br/>image_search_parms_relation_to_intact_cell_bim:".$this->image_search_parms_relation_to_intact_cell_bim;
        echo "<br/>image_search_parms_processing_history_bim:".$this->image_search_parms_processing_history_bim;
        echo "<br/>image_search_parms_preparation_bim:".$this->image_search_parms_preparation_bim;
        echo "<br/>image_search_parms_parameter_imaged_bim:".$this->image_search_parms_parameter_imaged_bim;
        echo "<br/>image_search_parms_human_dev_anatomy:".$this->image_search_parms_human_dev_anatomy;
        echo "<br/>image_search_parms_human_disease:".$this->image_search_parms_human_disease;
        echo "<br/>image_search_parms_mouse_gross_anatomy:".$this->image_search_parms_mouse_gross_anatomy;
        echo "<br/>image_search_parms_mouse_pathology:".$this->image_search_parms_mouse_pathology;
        echo "<br/>image_search_parms_plant_growth:".$this->image_search_parms_plant_growth;
        echo "<br/>image_search_parms_teleost_anatomy:".$this->image_search_parms_teleost_anatomy;
        echo "<br/>image_search_parms_xenopus_anatomy:".$this->image_search_parms_xenopus_anatomy;
        echo "<br/>image_search_parms_zebrafish_anatomy:".$this->image_search_parms_zebrafish_anatomy;
        echo "<br/>-----------------End Params----------------------";
        
    }
    
    
}
