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

//require_once 'C:\Users\Willy\Documents\apache\Apache24\html\CIL\application\libraries\REST_Controller.php';
require_once './application/libraries/REST_Controller.php';

class CIL_REST_API extends REST_Controller
{
    
  public function user_key_auth_get($key=0)
  {
      require_once 'CILServiceUtil.php';
      $sutil = new CILServiceUtil();
      $result = $sutil->getCIL_user_key($key);
      //var_dump($result[0]->getHit());
      
      
      
      $results = $result->getResults();
      if(count($results) >0)
      { 
          //$item = $hits = $results[0];
          //var_dump($item);
          $mainA = array();
          $mainA['valid_key'] =true;
          $this->response($mainA);
      }
      else
      {
          $mainA = array();
          $mainA['valid_key'] =false;
          $this->response(false);
      }
          
      //if(!is_null($result) && isset($result['_results']))
      //    var_dump($result['_results']);
      //$this->response('Testing...');
  }
    
  public function image_get($id=0,$type='ALL')
  {
    //$cwd =  getcwd();
    if(isset($id))
        $this->response('CIL REST GET:'.$id."---type:".$type);
    else
        $this->response('RETURN REST GET ALL');
  }

  public function image_post($id=0)
  {
    $entity = file_get_contents('php://input', 'r');  
    if(isset($id))
        $this->response('CIL REST POST:'.$id.'----'.$entity);
    else
        $this->response('RETURN REST POST ALL');
  }
  
  public function image_put($id=0)
  {
    $entity = file_get_contents('php://input', 'r');  
    
    if(isset($id))
        $this->response('CIL REST PUT:'.$id.'----'.$entity);
    else
        $this->response('RETURN REST PUT ALL');
  }
  
  public function image_delete($id=0)
  {
      if(isset($id))
        $this->response('CIL REST DELETE:'.$id);
    else
        $this->response('RETURN REST DELETE ALL');
  }
}


?>

