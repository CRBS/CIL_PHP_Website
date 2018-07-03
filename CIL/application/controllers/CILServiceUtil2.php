<?php

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
    
    public function getMicrobial($name,$from,$size)
    {
        $CI = CI_Controller::get_instance();
        $microbialPrefix = $CI->config->item('microbialPrefix');
        $url = $microbialPrefix."/".$name."?from=".$from."&size=".$size;
        //echo "<br/>".$url;
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
        //echo "<br/>".$url;
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
