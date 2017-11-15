<?php


class CILUtil {
    public function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }
    public function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
    } 
    function has_string_keys(array $array) {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
    
    function outputOntoLink($onto)
    {
        
        if(isset($onto['onto_id']) && isset($onto['onto_name']))
        {
           return "<a class=\"\" href=\"\" title=\"Find all images annotated with term: <em>".
                   $onto['onto_name']."</em> (".$onto['onto_id'].")\">".
                "<em>".$onto['onto_name']."</em></a>";
        }
        else if(isset($onto['free_text']))
        {
            $text = $onto['free_text'];
            
            if($this->startsWith( $text,"NAME:"))
            {
                    $text = str_replace ("NAME:", "", $text);
                    
            }
            return "<em>".$text."</em>";
        }
        else 
            return "";
    }
    
    
    
    function outputDataSection($core,$name,$title)
    {
        $output = "";
        $output = $output."<div class=\"description\">";

        if(isset($core[$name]) )
        {
            $output = $output. "<div class=\"sub_header\">".$title."</div>";
            if($this->has_string_keys($core[$name]))
            {
                        
                $organism = $core[$name];
                $output = $output. $this->outputOntoLink($organism);
            }
            else 
            {
                $output=$output."<dl><dt></dt>";
                foreach($core[$name] as $organism)
                {
                            
                    $output = $output."<dd>".$this->outputOntoLink($organism)."</dd>";
                           
                }
                $output=$output."</dl>";
             }
                    
     
        }
       
        $output = $output . "</div>";
        return $output;
    }
    
    
    
    function outputDimension($core,$name,$title)
    {
        $output = "";
        $output = $output."<div class=\"description\">";
        $output = $output."<table class=\"table table-striped\"><thead>";
        $output = $output."<tr><td>Spatial Axis</td><td>Image Size</td><td>Pixel Size</td></td>";
        $output = $output."<tbody>";
        
        if(isset($core[$name]) )
        {
            
            if($this->has_string_keys($core[$name]))
            {
                        
                $organism = $core[$name];
                $output = $output.$this->outputSingleDimension($organism);
            }
            else 
            {
                
                foreach($core[$name] as $organism)
                {
                            
                    $output = $output.$this->outputSingleDimension($organism);
                           
                }
                
             }
                    
             $output = $output ."</tbody></table>";
        }
       
        $output = $output . "</div>";
        return $output;
    }
    
    private function outputSingleDimension($text)
    {
        
        $output = "<tr>";
        $row  ="";
        if(isset($text["free_text"]))
        {
            $row = $text["free_text"];
        }
        
        if($this->startsWith($row,"space:"))
        {
            $row = str_replace("space:", "", $row);
           
            $array = explode(";;;", $row);
            
            //echo "------array count:".count($array);
            if(count($array) == 4)
            {
                $output = $output."<td>".$array[0]."</td>".
                        "<td>".$array[3]."</td>".
                        "<td>".$array[1].$this->convertMetric($array[2])."</td>";
            }
        }
        $output =$output."</tr>";
        return $output;
    }
    
    private function convertMetric($text)
    {
        if(strcmp($text,"nanometers")==0)
                return "nm";
        else if(strcmp($text, "microns")==0)
                return "&#181;m";
        else
            return "";
                
                
    }
    
    
    public function getURLFileSize($url)
    {
        try
        {
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE);

            $data = curl_exec($ch);
            $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

            curl_close($ch);
            return $size;
        }
        catch(Exception $e)
        {
            return 0;
        }
        
    }
    
    
    /**
     * Calling from search result display page
     * @param type $image
     * @return boolean
     */
    public function hasReconstructionFromSearchResults($image)
    {
        if(!isset($image->_source))
            return false;
        
        $result = $image->_source;
        if(isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Downloadable_data) ||
            (isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->URL) &&
             isset($result->CIL_CCDB->CCDB->Reconstruction->Recon_Display_image->Description)))
        {
            return true;
        }
        
        return false;
    }
    
    public function hasImage2dFromSearchResults($image)
    {
        if(!isset($image->_source))
            return false;
        
        $result = $image->_source;
        if(isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Downloadable_data) ||
           (isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->URL) &&
            isset($result->CIL_CCDB->CCDB->Image2d->Image2D_Display_image->Description) ))
        {
            return true;
        }
        
        return false;
    }
    
    public function hasSegFromSearchResults($image)
    {
        if(!isset($image->_source))
            return false;
        
        $result = $image->_source;
        if(isset($result->CIL_CCDB->CCDB->Segmentation->Seg_Downloadable_data) ||
            (isset($result->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->URL) &&
             isset($result->CIL_CCDB->CCDB->Segmentation->Seg_Display_image->Description)))
        {
            return true;
        }
        return false;
    }
    
    
    public function findImageFileJSON($json, $type)
    {
        if(!isset($json->CIL_CCDB->CIL->Image_files))
            return null;
        
        $imageFiles = $json->CIL_CCDB->CIL->Image_files;
        foreach($imageFiles as $imageFile)
        {
            if(isset($imageFile->File_type) && strcmp($imageFile->File_type, $type) == 0)
            {
                return $imageFile;
            }
        }
        
        return null;
    } 
    
    function convertFileSize($size,$unit="") {
        if( (!$unit && $size >= 1<<30) || $unit == "GB")
          return number_format($size/(1<<30),2)."GB";
        if( (!$unit && $size >= 1<<20) || $unit == "MB")
          return number_format($size/(1<<20),2)."MB";
        if( (!$unit && $size >= 1<<10) || $unit == "KB")
          return number_format($size/(1<<10),2)."KB";
        return number_format($size)." bytes";
    }
    
    
    
}

?>
