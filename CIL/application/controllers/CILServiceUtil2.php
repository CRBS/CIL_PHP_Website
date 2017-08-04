<?php
//require_once './application/config/config.php';
class CILServiceUtil2
{
    //public $apiDocPrefix = "http://ec2-35-165-216-15.us-west-2.compute.amazonaws.com/CIL_RS/index.php/rest/documents/";
    
    //public $homepage_settings = "http://search-elastic-cil-tetapevux3gwwhdcbbrx4zjzhm.us-west-2.es.amazonaws.com/ccdbv7/website_settings/homepage";
    
    //public $elasticsearchPrefix = "http://search-elastic-cil-tetapevux3gwwhdcbbrx4zjzhm.us-west-2.es.amazonaws.com/ccdbv7";
    
    
    /**
     * This is a helpping method to call CURL PUT request with the username and key
     * 
     * @param type $url
     * @param type $data
     * @return type
     */
    private function curl_put($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($doc)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
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
    private function curl_post($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($doc)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
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
    private function curl_get($url)
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($doc)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "cil:32C7D1D31D817734B421CC346EE65");
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
    
    
    
    public function getHomepageSettings()
    {
        
        //$url = $config['homepage_settings'];
        //$homepage_settings = $this->config->item('homepage_settings');
        $CI = CI_Controller::get_instance();
        //var_dump($CI->config);
        $homepage_settings = $CI->config->item('homepage_settings');
        
        //echo $homepage_settings;
        $response = $this->just_curl_get($homepage_settings);
        return $response;
    }
    
    public function getImage($imageID)
    {
        $CI = CI_Controller::get_instance();
        $apiDocPrefix = $CI->config->item('apiDocPrefix');
        
        //$url = $this->apiDocPrefix.$imageID;
        $url = $apiDocPrefix.$imageID;
        //echo "<br/>".$url;
        $response = $this->curl_get($url);
        return $response;
    }
    
    public function getImges($data)
    {
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('elasticsearchPrefix')."/data/_search";
        
        //$url = $this->config->item('elasticsearchPrefix');
        //$url = $this->elasticsearchPrefix."/data/_search";
        //echo $url."<br/>";
        $response = $this->just_curl_get_data($url, $data);
        return $response;
    }
    
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
    
    
    
}
