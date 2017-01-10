<?php
/*spl_autoload_register(function($class){
    $path = str_replace("\\", "/", $class);
    //echo "<br/>Path---".$path;
   if (file_exists('/var/www/Elastica/lib/' . $path . '.php')) {
       
       //echo '/var/www/Elastica/lib/' . $path . '.php -- Found!';
        require_once('/var/www/Elastica/lib/' . $path . '.php');
    }
    else
         echo '/var/www/Elastica/lib/' . $path . '.php -- NOT Found!';

});*/
class CILServiceUtil 
{
    
    public function getCIL_user_key($key)
    {
        $elasticaClient = new \Elastica\Client([
    'connections' => [
        ['transport' => 'Http', 'host' => 'search-elastic-cil-tetapevux3gwwhdcbbrx4zjzhm.us-west-2.es.amazonaws.com', 'port' => 80],
        
        ],
        ]);
        
        
        $elasticaIndex = $elasticaClient->getIndex('cil');
        $elasticaType = $elasticaIndex->getType('user_key');
        $query = "key:".$key;
        $result = $elasticaType->search($query);
        return $result;
        //var_dump($result);
        
    }
    
    
    
    public function getImage($id)
    {
        
        
        $response = null;
       /* $elasticaClient = new \Elastica\Client(array(
    'host' => 'search-elastic-cil-tetapevux3gwwhdcbbrx4zjzhm.us-west-2.es.amazonaws.com'
));*/
        //$elasticaIndex = $elasticaClient->getIndex('cil_ccdb');
        //$elasticaType = $elasticaIndex->getType('cil_type');
        
        $elasticaClient = new \Elastica\Client([
    'connections' => [
        ['transport' => 'Http', 'host' => 'search-elastic-cil-tetapevux3gwwhdcbbrx4zjzhm.us-west-2.es.amazonaws.com', 'port' => 80],
        
    ],
]);
        
        $elasticaIndex = $elasticaClient->getIndex('cil');
        $elasticaType = $elasticaIndex->getType('data');
        
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
