<?php

$folder = "C:/Users/wawong/Documents/apache/CIL_website/Apache24/html/CIL_PHP_Website/CIL/pic/thumbnail_display";

$jsonFolder = "C:/CIL_GIT/CIL-CCDB_JSON/Version8_9/DATA/CIL_PUBLIC_DATA";
$ifolders = scandir($folder);
$counter = 0;
foreach($ifolders as $ifolder)
{
    if(strcmp($ifolder, ".")==0 || strcmp($ifolder, "..")==0 || !is_numeric($ifolder))
           continue;
    
    
    $jsonPath = $jsonFolder."/".$ifolder.".json";
    if(!file_exists($jsonPath))
        continue;
    //if(strcmp($ifolder,"9984")!=0)
    //   continue;
    
    echo "\n".$ifolder;
    
    
    
    $json_str = file_get_contents($jsonPath);
    
    //$jsonOutputPath = $folder."/".$ifolder."/".$ifolder.".json";
    //file_put_contents($jsonOutputPath, $json_str);
    $json = json_decode($json_str);
    $name = NULL;
    
    
    if(is_null($name))
    {
        if(isset($json->CIL_CCDB->CIL->CORE->CELLTYPE))
        {
            foreach($json->CIL_CCDB->CIL->CORE->CELLTYPE as $cc)
            {
                if(is_array($json->CIL_CCDB->CIL->CORE->CELLTYPE))
                {
                    foreach($json->CIL_CCDB->CIL->CORE->CELLTYPE as $cc)
                    {
                        if(isset($cc->onto_name))
                        {
                            if(is_null($name))
                                $name = $cc->onto_name;
                            else if(strlen($name) > strlen($cc->onto_name))
                                $name = $cc->onto_name;

                        }
                        else if(isset($cc->free_text))
                        {
                            if(is_null($name))
                                $name = $cc->free_text;
                            else if(strlen($name) > strlen($cc->free_text))
                                $name = $cc->free_text;
                        }

                    }
                }
                else
                {
                    if(isset($json->CIL_CCDB->CIL->CORE->CELLTYPE->onto_name))
                        $name = $json->CIL_CCDB->CIL->CORE->CELLTYPE->onto_name;
                    else if(isset($json->CIL_CCDB->CIL->CORE->CELLTYPE->free_text))
                        $name = $json->CIL_CCDB->CIL->CORE->CELLTYPE->free_text;

                }
                
            }
        }
    }
        
    if(is_null($name))
    {
        if(isset($json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT))
        {
            if(is_array($json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT))
            {
                foreach($json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT as $cc)
                {
                    if(isset($cc->onto_name))
                    {
                        if(is_null($name))
                            $name = $cc->onto_name;
                        else if(strlen($name) > strlen($cc->onto_name))
                            $name = $cc->onto_name;

                    }
                    else if(isset($cc->free_text))
                    {
                        if(is_null($name))
                            $name = $cc->free_text;
                        else if(strlen($name) > strlen($cc->free_text))
                            $name = $cc->free_text;
                    }

                }
            }
            else
            {
                if(isset($json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT->onto_name))
                    $name = $json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT->onto_name;
                else if(isset($json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT->free_text))
                    $name = $json->CIL_CCDB->CIL->CORE->CELLULARCOMPONENT->free_text;

            }
        }
    }
        
        $imageFile=$folder."/".$ifolder."/".$ifolder."_thumbnailx512.jpg";
        
        if(!is_null($name) && file_exists($imageFile))
        {
            $original_name = $name;
            $counter++;
            $name = urlencode($name);
            $outputFile = $folder."/".$ifolder."/".$name.".jpg";
            $jsonOutput = $folder."/".$ifolder."/image.json";
            $array = array();
            $array['Image_name']=$name.".jpg";
            $array['Name']=$original_name;
            $ijson_str = json_encode($array,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            file_put_contents($jsonOutput, $ijson_str);
            copy($imageFile, $outputFile);
        }
        
        
    
    
   echo "\nCount:".$counter;
}

