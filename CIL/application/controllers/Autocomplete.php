<?php

require_once './application/libraries/REST_Controller.php';
require_once 'CILServiceUtil2.php';
class Autocomplete extends REST_Controller
{
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
                array_push($auto_results, $option->text);
         }
         $this->response($auto_results);
       }
       
   }
    
}

