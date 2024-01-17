<?php
require_once 'Adv_query_util.php';
/**
 * This class provides all helper functions to access the REST API.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class CILServiceUtil2
{    
    /**
     * This is a helpping method to call CURL PUT request with the username and key
     * 
     * @param type $url
     * @param type $data
     * @return type
     */
    private function curl_put($url, $data)
    {
        $CI = CI_Controller::get_instance();
        $cil_auth = $CI->config->item('cil_auth');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
        curl_setopt($ch, CURLOPT_USERPWD, $cil_auth);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    
    
    
    
    /**
     * This is a helpping method to calll CURL Delete request with user-name and password
     * 
     * @param type $url
     * @return type
     */
    private function curl_delete($url)
    {
        $CI = CI_Controller::get_instance();
        $cil_auth = $CI->config->item('cil_auth');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
        curl_setopt($ch, CURLOPT_USERPWD, $cil_auth);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    /**
     * This is a helpping method to call CURL POST request with the user name and password.
     * @param type $url
     * @param type $data
     * @return type
     * 
     */
    public function curl_post($url, $data)
    {
        $CI = CI_Controller::get_instance();
        $cil_auth = $CI->config->item('cil_auth');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($doc)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
        curl_setopt($ch, CURLOPT_USERPWD, $cil_auth);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //On dev server only
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    /**
     * This is a helpping method to call CURL GET request with the user name and key
     * 
     * @param type $url
     * @return type
     * 
     */
    public function curl_get($url)
    {
        //echo "<br/>".$url;
        $CI = CI_Controller::get_instance();
        $cil_auth = $CI->config->item('cil_auth');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($doc)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
        curl_setopt($ch, CURLOPT_USERPWD, $cil_auth);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //On dev server only
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    
    public function curl_get_data($url,$data)
    {
        //echo "<br/>URL:".$url;
        //echo "<br/>Data:".$data;
        
        $CI = CI_Controller::get_instance();
        $cil_auth = $CI->config->item('cil_auth');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
        curl_setopt($ch, CURLOPT_USERPWD, $cil_auth);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //On dev server only
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;

    }
    
    
    public function just_curl_get($url)
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($doc)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    public function just_curl_get_data($url,$data)
    {
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($doc)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;

    }
    
    public function getMicrobial($name,$from,$size,
            $time_series, $still_image, $z_stack, $video)
    {
        $CI = CI_Controller::get_instance();
        $microbialPrefix = $CI->config->item('microbialPrefix');
        $service_api_host = $CI->config->item('service_api_host');
        $url = $microbialPrefix."/".$name."?from=".$from."&size=".$size;
        if($time_series)
            $url = $url."&time_series=true";
        if($still_image)
            $url = $url."&still_image=true";
        if($z_stack)
            $url = $url."&z_stack=true";
        if($video)
            $url = $url."&video=true";
        
        //echo "<br/>Name:".$name;
        if(strcmp($name,"virus")==0)
        {
            $aquery = new Adv_query_util();
            $json = $aquery->ontologyExpansion("ncbi_organism", "Name", "Viruses");
            //echo "<br/>Expansion json:".json_encode($json);
            
            if(!is_null($json) && isset($json->hits->total) && $json->hits->total > 0 &&
                   isset($json->hits->hits[0]->_source->Expansion->Terms) )
            {
                $term_query = "( \\\"".$json->hits->hits[0]->_source->Expansion->Onto_id."\\\"";
                $terms = $json->hits->hits[0]->_source->Expansion->Terms;
                $count = count($terms);
                $i=0;
                foreach($terms as $term)
                {
                   if(isset($term->Onto_id))
                   {
                       if($i==0)
                         $term_query = $term_query." OR ";
                       //echo "<br/>Onto ID:".$term->Onto_id;
                       $term_query = $term_query." \\\"".$term->Onto_id." \\\"";
                       if($i+1<$count)
                           $term_query = $term_query." OR ";
                   }
                   
                   $i++;
                }
                $term_query = $term_query.")";
                //echo "<br/>".$term_query;
                
                $vquery = "{\"query\":{\"query_string\":{\"query\":\"(CIL_CCDB.Status.Is_public:true AND CIL_CCDB.Status.Deleted:false) ";
                if($still_image)
                   $vquery = $vquery." AND (CIL_CCDB.Data_type.Still_image:true)";
                if($time_series)
                   $vquery = $vquery." AND (CIL_CCDB.Data_type.Time_series:true)";
                if($time_series)
                   $vquery = $vquery." AND (CIL_CCDB.Data_type.Time_series:true)";
                if($video)
                   $vquery = $vquery." AND (CIL_CCDB.Data_type.Video:true)";
                if($z_stack)
                   $vquery = $vquery." AND (CIL_CCDB.Data_type.Z_stack:true)";

                $vquery = $vquery." AND ".$term_query;
                $vquery = $vquery."\"}}}";
                
                //echo "<br/>".$vquery;
                $url = $service_api_host."/rest/advanced_document_search?from=".$from."&size=".$size;
                $response = $this->curl_get_data($url, $vquery);
                //echo $response;
                return $response;
            }
            
        }

        
        //echo "<br/>".$url;
        $response = $this->curl_get($url);
        return $response;
    }
    
    public function getDataPermissions($id="0")
    {
        $CI = CI_Controller::get_instance();
        $service_api_host = $CI->config->item('service_api_host');
        $url =  $service_api_host."/rest/data_permission/".$id;
        $response = $this->curl_get($url);
        return $response;
    }
    
    
    public function getHomepageSettings()
    {
        
        //$url = $config['homepage_settings'];
        //$homepage_settings = $this->config->item('homepage_settings');
        $CI = CI_Controller::get_instance();
        //var_dump($CI->config);
        $homepage_settings = $CI->config->item('homepage_settings');
        //echo $homepage_settings;
        //echo "<br/>".$homepage_settings;
        //echo $homepage_settings;
        //$response = $this->just_curl_get($homepage_settings);
        $response = $this->curl_get($homepage_settings);
        
        return $response;
    }
    
    public function getImage($imageID)
    {
        $CI = CI_Controller::get_instance();
        $apiDocPrefix = $CI->config->item('apiDocPrefix');
        
        //$url = $this->apiDocPrefix.$imageID;
        $url = $apiDocPrefix."/".$imageID;
        
        echo "<br/>".$url;
        $response = $this->curl_get($url);
        return $response;
    }
    
    public function getImges($data)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('service_api_host')."/rest/adv_data_search";
        $response = $this->curl_get_data($url, $data);
        return $response;
    }
    
    public function getImagesByIDs($data,$from,$size)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('service_api_host').
                "/rest/adv_data_search?from=".$from."&size=".$size;
        $response = $this->curl_get_data($url, $data);
        return $response;
    }
    
    public function getGroupInfo($imageID)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('service_api_host')."/rest/groups/".$imageID;
        //echo $url;
        $response = $this->curl_get($url);
        return $response;
    }
    
    public function searchCategoryByName($category_name,$name)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('service_api_host')."/rest/category_search/".$category_name;
        $query = "{\"query\": { ".
                "\"term\" : { \"Name\" : \"".$name."\" } ". 
                "}}";
        
        $response = $this->curl_get_data($url, $query);
        return $response;
    }
    
    
    public function listTrainedModels()
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('service_api_host')."/rest/list_trained_models";
        $response = $this->curl_get($url);
        return $response;
    }
    
    public function trackUserQueryInfo($base_url, $query_string, $ip_address)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('service_api_host')."/rest/web_user_query_info";
        
        $array = array();
        $array['Base_url'] = $base_url;
        $array['Query_string'] = $query_string;
        $array['Ip_address'] = $ip_address;
        
        $json_str = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $response = $this->curl_post($url, $json_str);
        return $response;
    }
    
    
    public function trackImageView($base_url, $image_id, $ip_address, $user_agent)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('service_api_host')."/statistics_rest/web_image_access";
        
        $array = array();
        $array['Base_url'] = $base_url;
        $array['Image_id'] = $image_id;
        $array['Ip_address'] = $ip_address;
        $array['User_agent'] = $user_agent;
        
        $json_str = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $response = $this->curl_post($url, $json_str);
        return $response;
    }
    
    
    
    /*public function getImges($data)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('elasticsearchPrefix')."/data/_search";
        echo "<br/>-----".$url;
        //$url = $CI->config->item('advanced_search');
        //$url = $this->config->item('elasticsearchPrefix');
        //$url = $this->elasticsearchPrefix."/data/_search";
        //echo $url."<br/>";
        $response = $this->just_curl_get_data($url, $data);
        return $response;
    }*/
    
    function is_url_exist($url){
        $ch = curl_init($url);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 200){
           $status = true;
        }else{
          $status = false;
        }
        curl_close($ch);
       return $status;
    }
    
    //Unused
    /*function get_ontology_term($type,$onto_id)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('ontology_prefix')."/".$type."/".$onto_id;
        return $this->just_curl_get($url);
        
    }*/
    
     
    
}
