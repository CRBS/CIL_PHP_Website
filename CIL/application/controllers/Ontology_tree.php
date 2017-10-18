<?php

require_once './application/libraries/REST_Controller.php';
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';

class Ontology_tree extends REST_Controller
{
   public function biological_processes_get($test="") 
   { 
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("biological_processes_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("biological_process_root");
       
       $url = $urlPrefix."/".$type."/".$id;
       //echo $url;
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        //$result = $this->debug_input($url);
        $this->response($result);
   }
   
   public function cell_types_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("cell_types_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("cell_type_root");
       
       $url = $urlPrefix."/".$type."/".$id;
       //echo $url;
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        $this->response($result);
   }
   
   public function cellular_components_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("cellular_components_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("cellular_component_root");
       
       $url = $urlPrefix."/".$type."/".$id;
       //echo $url;
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        $this->response($result);
   }
   
   public function anatomical_entities_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("anatomical_entities_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("anatomical_entity_root");
       
       $url = $urlPrefix."/".$type."/".$id;
       //echo $url;
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        $this->response($result);
   }
   
   public function ncbi_organism_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("ncbi_organism_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("ncbi_organism_root");
       
       $url = $urlPrefix."/".$type."/".$id;
        
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        //$result = $this->debug_input($url);
        $this->response($result);
   }
   
   public function molecular_functions_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("molecular_functions_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("molecular_function_root");
       
       $url = $urlPrefix."/".$type."/".$id;
        
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        //$result = $this->debug_input($url);
        $this->response($result);
   }
   
   public function cell_lines_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("cell_lines_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("cell_line_root");
       
       $url = $urlPrefix."/".$type."/".$id;
        
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        //$result = $this->debug_input($url);
        $this->response($result);
   }
   
   public function item_types_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("item_types_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("item_type_root");
       
       $url = $urlPrefix."/".$type."/".$id;
        
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        //$result = $this->debug_input($url);
        $this->response($result);
   }
   
   
   public function image_modes_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("image_modes_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
       {
          $roots = $this->config->item("image_mode_root");
          $main = array();
          foreach($roots as $id)
          {
              $url = $urlPrefix."/".$type."/".$id;
              $json = $this->handleTreeRequest($url);
              $element = $this->convertElementArray($json);
              array_push($main, $element);
              $string_result = json_encode($main);
              $result = json_decode($string_result);
          }
       }
       else 
       {
            $url = $urlPrefix."/".$type."/".$id;
        
            $json = $this->handleTreeRequest($url);
            $result = $this->convertJSON($json);
       }
        $this->response($result);
   }
   
   /*
   public function visualization_methods_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("visualization_methods_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
       {
          $roots = $this->config->item("visualization_method_roots");
          $main = array();
          foreach($roots as $id)
          {
              $url = $urlPrefix."/".$type."/".$id;
              $json = $this->handleTreeRequest($url);
              $element = $this->convertElementArray($json);
              array_push($main, $element);
              $string_result = json_encode($main);
              $result = json_decode($string_result);
          }
       }
       else 
       {
            $url = $urlPrefix."/".$type."/".$id;
        
            $json = $this->handleTreeRequest($url);
            $result = $this->convertJSON($json);
       }
        $this->response($result);
   }
    
    */
   public function visualization_methods_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("visualization_methods_type");
       $root_config_name = "visualization_method_roots";
       $this->handle_multiple_roots($urlPrefix,$type,$id,$root_config_name);      
   }
                   
   public function source_of_contrasts_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("source_of_contrasts_type");
       $root_config_name = "source_of_contrast_roots";
       $this->handle_multiple_roots($urlPrefix,$type,$id,$root_config_name);      
   }
   
   public function relation_to_intact_cells_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("rel_to_intact_cells_type");
       $root_config_name = "rel_to_intact_cell_roots";
       $this->handle_multiple_roots($urlPrefix,$type,$id,$root_config_name);      

   }
   
   public function processing_history_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("processing_history_type");
       $root_config_name = "processing_history_roots";
       $this->handle_multiple_roots($urlPrefix,$type,$id,$root_config_name);      
   }
   
   public function preparation_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("preparation_type");
       $root_config_name = "preparation_roots";
       $this->handle_multiple_roots($urlPrefix,$type,$id,$root_config_name);      
   }
   
   public function parameter_imaged_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("parameter_imaged_type");
       $root_config_name = "parameter_imaged_roots";
       $this->handle_multiple_roots($urlPrefix,$type,$id,$root_config_name);   
   }
   
   
   private function handle_multiple_roots($urlPrefix,$type,$id,$root_config_name)
   {
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
       {
          $roots = $this->config->item($root_config_name);
          $main = array();
          foreach($roots as $id)
          {
              $url = $urlPrefix."/".$type."/".$id;
              $json = $this->handleTreeRequest($url);
              $element = $this->convertElementArray($json);
              array_push($main, $element);
              $string_result = json_encode($main);
              $result = json_decode($string_result);
          }
       }
       else 
       {
            $url = $urlPrefix."/".$type."/".$id;
        
            $json = $this->handleTreeRequest($url);
            $result = $this->convertJSON($json);
       }
       $this->response($result);
   }
   
   public function human_development_anatomies_get()
   {
       $id="";
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("human_dev_anatomies_type");
       if(strcmp($id, "")==0 || strcmp($id, "#")==0)
         $id = $this->config->item("human_dev_anatomy_root");
       
       $url = $urlPrefix."/".$type."/".$id;
        
        $json = $this->handleTreeRequest($url);
        $result = $this->convertJSON($json);
        //$result = $this->debug_input($url);
        $this->response($result);
   }
   
   public function human_diseases_get()
   {
       $id="";
       $result = NULL;
       $temp = $this->input->get('id',TRUE);
        if(!is_null($temp) && strlen($temp) > 0)
        {
            $id = $temp;
        }
       $urlPrefix = $this->config->item("ontology_prefix");
       $type = $this->config->item("human_diseases_type");
       $root_config_name = "human_disease_roots";
       $this->handle_multiple_roots($urlPrefix,$type,$id,$root_config_name); 
   }
   
   
   
   private function debug_input($url)
   {
      $main = array();
      $array = array();
      $array["id"] = "test";
      $array["text"]= $url;
      $childrenArray = array();
      $array['children'] =$childrenArray;
      array_push($main, $array);
      $string_result = json_encode($main);
      $result = json_decode($string_result);
      return $result;
      
   }
   /*
    * [{
  "id":1,"text":"Root node","children":[
    {"id":2,"text":"Child node 1","children":true},
    {"id":3,"text":"Child node 2"}
  ]
}]
    */
   private function convertElementArray($json)
   {
      
      $array = array();
      
      
      $id = $json->_source->Onto_id;
      $id = str_replace(":","_",$id);
      $name =  $json->_source->Name;
      $array["id"] = $id;
      $array["text"]= $name;
      
      $ochildren = array();
      if(isset($json->_source->Onto_children))
        $ochildren = $json->_source->Onto_children;
      
      $childrenArray = array();
      foreach($ochildren as $ochild)
      {
         $node = array();
         $node['id'] =  str_replace(":","_",$ochild->Onto_id);
         $node['text'] = $ochild->Onto_name;
         $node['children'] = true;
         array_push($childrenArray,$node);
      }
      $array['children'] =$childrenArray;
      
      
      return $array;
      //;
   }
   
   
   
   private function convertJSON($json)
   {
      $main = array();
      $array = array();
      
      
      $id = $json->_source->Onto_id;
      $id = str_replace(":","_",$id);
      $name =  $json->_source->Name;
      $array["id"] = $id;
      $array["text"]= $name;
      
      $ochildren = array();
      if(isset($json->_source->Onto_children))
        $ochildren = $json->_source->Onto_children;
      
      $childrenArray = array();
      foreach($ochildren as $ochild)
      {
         $node = array();
         $node['id'] =  str_replace(":","_",$ochild->Onto_id);
         $node['text'] = $ochild->Onto_name;
         $node['children'] = true;
         array_push($childrenArray,$node);
      }
      $array['children'] =$childrenArray;
      
      array_push($main, $array);
      $string_result = json_encode($main);
      $result = json_decode($string_result);
      return $result;
      //;
   }
   
   private function handleTreeRequest($url)
   {
       $sutil = new CILServiceUtil2();
       
       $response = $sutil->just_curl_get($url);
       $json = json_decode($response);
       return $json;
   }

}


?>