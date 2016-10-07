<?php
spl_autoload_register(function($class){
    $path = str_replace("\\", "/", $class);
    //echo "<br/>Path---".$path;
   if (file_exists('/var/www/Elastica/lib/' . $path . '.php')) {
       
       //echo '/var/www/Elastica/lib/' . $path . '.php -- Found!';
        require_once('/var/www/Elastica/lib/' . $path . '.php');
    }
    else
         echo '/var/www/Elastica/lib/' . $path . '.php -- NOT Found!';

});
class CILServiceUtil 
{
    public function getImage($id)
    {
        $response = null;
        $elasticaClient = new \Elastica\Client();
        $elasticaIndex = $elasticaClient->getIndex('cil_ccdb');
        $elasticaType = $elasticaIndex->getType('cil_type');
        try {
            $response = $elasticaType->getDocument($id);
        } catch (Exception $e) {
           
        }
        //echo "<br/>-------Response";
        //var_dump($response);
        //echo "<br/>-------End Response";
        return $response;
    }
}
