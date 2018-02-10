<?php
require_once './application/libraries/REST_Controller.php';
require_once 'CILServiceUtil2.php';
class CIL_Download_Service extends REST_Controller
{
    public function track_download_post()
    {
       $cutil = new CILServiceUtil2();
       $input = file_get_contents('php://input', 'r');
       //file_put_contents("C:/Test/".uniqid().".txt", $input);
       $service_api_host = $this->config->item('service_api_host');
       $url = $service_api_host."/rest/download_statistics";
       $response = $cutil->curl_post($url, $input);
       //$this->response("success");
       //file_put_contents("C:/Test/".uniqid().".txt", $response);
    }
}
