<?php

require_once './application/libraries/REST_Controller.php';
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
class Autocomplete extends REST_Controller
{
   public function cell_types_get($prefix="") 
   {
        $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Cell_type_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
        
   }
   
   public function cellular_components_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Cellular_component_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   public function biological_processes_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Biological_processes_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   public function anatomical_entities_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Anatomical_entities_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   
   public function ncbi_organism_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"NCBI_organism_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   public function molecular_functions_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Molecular_function_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   public function cell_lines_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Cell_line_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   
   public function imaging_methods_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Imaging_method_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   public function human_development_anatomies_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Human_development_anatomy_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
    
   public function human_diseases_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Human_disease_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
    
   public function mouse_gross_anatomies_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Mouse_gross_anatomy_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
       //echo $query;
        $this->handleAutoComplete($prefix, $query);
   }
   
   public function mouse_pathologies_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Mouse_pathology_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
       //echo $query;
        $this->handleAutoComplete($prefix, $query);
   }
   
   public function plant_growths_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Plant_growth_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
       //echo $query;
        $this->handleAutoComplete($prefix, $query);
   }
   
   
   
   public function general_terms_get($prefix="")
   {
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"General_term_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
        $this->handleAutoComplete($prefix, $query);
   }
   
   /*
   public function celltype_get($prefix="")
   {
       $sutil = new CILServiceUtil2();
       $array = array();
       if(strlen($prefix) < 2)
       {
           $this->response($array);
           return;
       }
       $raw = false;
       
       $temp = $this->input->get('raw',TRUE);
       if(!is_null($temp))
       {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $raw = true;
            }
       }
       //$array = array();
       //$array[0] = "tern_suggest";
       $query = "{\n".
                    "\"term_suggest\":{"."\n".
                        "\"text\":\"".$prefix."\","."\n".
                        "\"completion\": {"."\n".
                        "\"field\" : \"Cell_type_suggest\""."\n".
                        "}".
                    "}\n".
                "}";
       //$input = json_decode($query);
       
       
       $esOntoSuggestURL = $this->config->item('esOntoSuggest');
       $response = $sutil->just_curl_get_data($esOntoSuggestURL,$query);
       $array = json_decode($response);
       
       if($raw)
       {
         $this->response($array);
         return true;
       }
       
       $results = $array->term_suggest;
       $result = $results[0];
      
       $options = $result->options;
       if(count($options)==0)
         $this->response($array);
       else
       {
         $auto_results = array();
         foreach($options as $option)
         {
             if(isset($option->text))
                array_push($auto_results, "\"".$option->text."\"");
         }
         $this->response($auto_results);
       }
       
   }
   */
   
   private function handleAutoComplete($prefix, $query)
   {
       $sutil = new CILServiceUtil2();
       $gutil = new GeneralUtil();
       
       $array = array();
       if(strlen($prefix) < 2)
       {
           $this->response($array);
           return;
       }
       $raw = false;
       $advanced = false;
       $temp = $this->input->get('raw',TRUE);
       if(!is_null($temp))
       {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $raw = true;
            }
       }
       
       
       $temp = $this->input->get('advanced',TRUE);
       if(!is_null($temp))
       {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $advanced = true;
            }
       }
       
       //$array = array();
       //$array[0] = "tern_suggest";

       //$input = json_decode($query);
       
       
       $esOntoSuggestURL = $this->config->item('esOntoSuggest');
       //echo $esOntoSuggestURL."<br/>";
       //echo $query."<br/>";
       $response = $sutil->just_curl_get_data($esOntoSuggestURL,$query);
       
       
       
       $array = json_decode($response);
       
       if($raw)
       {
         $this->response($array);
         return;
       }
       
       $results = $array->term_suggest;
       $result = $results[0];
      
       $options = $result->options;
       if(count($options)==0)
       {
         //$this->response($array);
         $emptyResult = array();
         $this->response($emptyResult);
         return;  
       }
       else
       {
         $auto_results = array();
         $uniqueKeys = array();
         foreach($options as $option)
         {
             if(isset($option->text))
             {
                if($advanced)
                   array_push($auto_results, $option->text." [".$option->_source->Onto_id."]");
                else if(!array_key_exists($option->text,$uniqueKeys))
                {
                   array_push($auto_results, $option->text);
                   $uniqueKeys[$option->text] = $option->text;
                           
                           
                }
                    
                
             }
         }
         $this->response($auto_results);
       }
   }
    
}

