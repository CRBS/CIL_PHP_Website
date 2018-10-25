<?php


/**
 * This class provides the general helper function.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class GeneralUtil
{
    public function startsWith($haystack, $needle)
    {
         $length = strlen($needle);
         return (substr($haystack, 0, $length) === $needle);
    }

    public function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
    
    public function handleResponse($response)
    {
        if(is_null($response))
            return null;
        
        $response = trim($response);
        if(strlen($response) == 0)
            return null;
        
        return $response;
    }
    
    
}

