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