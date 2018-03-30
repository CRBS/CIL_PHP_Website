<?php

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
    
    public function contains($haystack, $needle)
    {
        if (strpos($haystack, $needle) !== false) {
            return true;
        }
        else 
        {
            return false;
        }
    }
}
