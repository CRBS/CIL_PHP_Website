<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'GeneralUtil.php';
/**
 * @covers Email
 */
final class TestWebsite extends TestCase
{
    public $host = "http://localhost";
    private $jsonDir = "C:/CIL_GIT/CIL-CCDB_JSON/Version8_5/DATA/CIL_PUBLIC_DATA";
    private $testLog = "test.log";
    private $successLog = "success.log";
    
    private function curl_get($url)
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
    
    public function testHomePage()
    {
        $gutil = new GeneralUtil();
        $url = $this->host."/home";
        echo "\nTesting:".$url;
        $response = $this->curl_get($url);
        $response = $this->handleResponse($response);
        $error = $gutil->contains($response, "PHP Error");
        if(!$error)
            $this->assertTrue(true);
        else
            $this->assertTrue(false);
    }
    
    
    public function testOneImage()
    {
        $gutil = new GeneralUtil();
        $url = $this->host."/images/13007";
        echo "\nTesting:".$url;
        $response = $this->curl_get($url);
        $response = $this->handleResponse($response);
        $error = $gutil->contains($response, "PHP Error");
        if(!$error)
            $this->assertTrue(true);
        else
            $this->assertTrue(false);
    }
    
    /*
    public function testReadingSuccessIDs()
    {
        $array = $this->getSuccessIDs();
        foreach($array as $item)
        {
            echo "\n".$item;
        }
        $this->assertTrue(true);
    }
    */
    
    public function testAllImages()
    {
       $gutil = new GeneralUtil();
       $fileArray =  scandir($this->jsonDir);
       $successArray = $this->getSuccessIDs();
       //if(file_exists($this->testLog))
       //  unlink($this->testLog);
       foreach($fileArray as $file)
       {
           $name = basename($file);
           //echo "\n".$name;
           if(!$gutil->endsWith($name, ".json"))
              continue;
           $id = str_replace(".json", "", $name);
           $skip = false;
           foreach($successArray as $sid)
           {
               if(strcmp($id,$sid)==0)
               {
                   $skip = true;
                   break;
               }
                  
           }
           if($skip)
               continue;
           
           $url = $this->host."/images/".$id;
           
           //error_log("\nTesting:".$url, 3, "test.log");
           $response = $this->curl_get($url);
           $response = $this->handleResponse($response);
           $error = $gutil->contains($response, "PHP Error");
           if(!$error)
           {
             //$this->assertTrue(true);
               error_log("\n".$id, 3, $this->successLog);
           }
           else
           {
             error_log("\nError in ".$id."!!!!", 3, $this->testLog);
             $this->assertTrue(false);
             exit(0);
           }
           
           
       }
       
       $this->assertTrue(true);
    }
    
    
    ////////Helper functions/////////////////////////////////////
    private function getSuccessIDs()
    {
        $array = array();
        $content = file_get_contents($this->successLog);
        $items = explode("\n", $content);
        foreach($items as $item)
        {
            if(is_numeric($item))
            {
                array_push($array, trim($item));
            }
        }
        return $array;
    }
    
    private function handleResponse($response)
    {
        if(is_null($response))
            return null;
        
        $response = trim($response);
        if(strlen($response) == 0)
            return null;
        
        return $response;
    }
    ////////End helper functions///////////////////////////////////
    
}



