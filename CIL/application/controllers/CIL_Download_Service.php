<?php
require_once './application/libraries/REST_Controller.php';
class CIL_Download_Service extends REST_Controller
{
    public function track_download_post()
    {
       $input = file_get_contents('php://input', 'r');
       file_put_contents("C:/Test/".uniqid().".txt", $input);
       
       $this->response("success");
    }
}
