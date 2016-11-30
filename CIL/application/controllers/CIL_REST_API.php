<?php

//require_once 'C:\Users\Willy\Documents\apache\Apache24\html\CIL\application\libraries\REST_Controller.php';
require_once './application/libraries/REST_Controller.php';

class CIL_REST_API extends REST_Controller
{
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

