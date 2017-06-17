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
class TestSearch  extends CI_Controller 
{
    public function view($key)
    {
        require_once 'CILServiceUtil.php';
      $sutil = new CILServiceUtil();
      $result = $sutil->getCIL_user_key($key);
      var_dump($result);
    }
    
}