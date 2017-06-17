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

class CCDB  extends CI_Controller 
{
    public function view($ccdbID)
    {
        require_once 'CILServiceUtil.php';
        $sutil = new CILServiceUtil();
        $response = $sutil->getCCDBImage($ccdbID);
        
        if(is_null($response))
        {
            show_404();
            return;
        }
        
        //var_dump($response);
        $ccdb_data = $response->getData();
        $data['ccdb_data'] = $ccdb_data;
        $data['page_title'] = "CCDB-".$ccdbID;
        
        $data['ccdbID'] = $ccdbID;
        $this->load->view('templates/cil_header', $data);
        $this->load->view('ccdb_display', $data);
        $this->load->view('templates/cil_footer', $data);
    }
    
    
}

?>

