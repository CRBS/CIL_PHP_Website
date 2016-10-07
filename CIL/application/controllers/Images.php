<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
spl_autoload_register(function($class){
    $path = str_replace("\\", "/", $class);
    //echo "<br/>Path---".$path;
    
    $folder = "C:/Users/Willy/Documents/php-lib/Elastica/lib/";
    //$folder = '/var/www/Elastica/lib/';
   if (file_exists($folder . $path . '.php')) {
       
       //echo '/var/www/Elastica/lib/' . $path . '.php -- Found!';
        require_once($folder . $path . '.php');
    }
    else
         echo $folder . $path . '.php -- NOT Found!';

});
class Images  extends CI_Controller 
{
    public function view($imageID)
    {
        require_once 'CILServiceUtil.php';
        $sutil = new CILServiceUtil();
        $response = $sutil->getImage($imageID);
        if(is_null($response))
        {
            show_404();
            return;
        }
        
        $cil_data = $response->getData();
        $data['cil_data'] = $cil_data;
        /*echo "<br/>-------Data";
        echo json_encode($cil_data);
        echo "<br/>-------End data";*/
        
        $data['page_title'] = "CIL: ".$imageID;
        $data['imageID'] = $imageID;
        $this->load->view('templates/cil_header', $data);
        $this->load->view('image_display', $data);
        $this->load->view('templates/cil_footer', $data);
        
    }
}
