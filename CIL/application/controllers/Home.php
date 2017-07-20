<?php
require_once 'CILServiceUtil2.php';
require_once 'QueryUtil.php';
require_once 'GeneralUtil.php';

class Home  extends CI_Controller 
{
     public function index()
     {
         $sutil = new CILServiceUtil2();
         $qutil = new QueryUtil();
         $gutil = new GeneralUtil();
         
         $settings_response = $sutil->getHomepageSettings();
         
         //echo $settings_response;
         $settings_json = json_decode($settings_response);
         $summary = array();
         $data['title'] = 'The Cell Image Library';
         
         if($settings_json->_source->Home_page->Featured_image)
         {
             $video_folder =  $this->config->item('video_folder');
             $featured_id = $settings_json->_source->Home_page->Featured_image[0];
             //echo "<br/>Featured image:".$featured_id;
             $base_url = $this->config->base_url();
             $data['featured_id']  = $featured_id;
             //$data['featured_has_video'] = $sutil->is_url_exist($base_url."/videos/".$featured_id .".flv");
             $data['featured_has_video'] = file_exists($video_folder."/".$featured_id .".flv");
             $data['featured_video_url'] = $base_url."/videos/".$featured_id .".flv";
             $image_id = $featured_id;
             if(is_numeric($featured_id))
             {
                 $image_id = "CIL_".$image_id;
             }
             $response = $sutil->getImage($image_id);
             //echo $response;
             $json = json_decode($response);
             
             $data['featured_info'] = null;
             if(!is_null($json))
                 $data['featured_info'] = $json;
             //var_dump($json);
         }
         
         
         if(isset($settings_json->_source->Home_page->Image_of_note))
         {
             $images = array();
             foreach($settings_json->_source->Home_page->Image_of_note as $image)
             {
                 if(!$gutil->startsWith($image,"CIL_"))
                    array_push($images, "CIL_".$image);
                 else
                     array_push ($images, $image);
             }
            
            $squery = $qutil->get_ids_query($images);
            $response = $sutil->getImges($squery);
            $json = json_decode($response);
            
            
            
            if($json->hits->total > 0)
            {
                //echo "<br/>Hit total:".$json->hits->total;
                $this->setSummary($json,$summary);
               
            }
            
         }
         $data['summary'] = $summary;
         $data['test'] = "test";
         $data['settings'] = $settings_json;
         $this->load->view('templates/cil_header4', $data);
         $this->load->view('main_page/main_display.php', $data);
         $this->load->view('templates/cil_footer2', $data);
     }
    
     private function setSummary(&$json, &$summary)
     {
         $hits = $json->hits->hits;
         foreach($hits as $image)
         {
             $id = $image->_id;
            
             if(isset($image->_source->CIL_CCDB->CIL))
             {
                 $summary[$id] = $id.";";
                 //$summary[$id] = "";
                 //  echo $summary[$id]."<br/>";
                 $cil = $image->_source->CIL_CCDB->CIL;
                 if(isset($cil->CORE->NCBIORGANISMALCLASSIFICATION))
                 {
                    if(!is_array($cil->CORE->NCBIORGANISMALCLASSIFICATION))
                    {
                        if(isset($cil->CORE->NCBIORGANISMALCLASSIFICATION->onto_name))
                            $summary[$id] .= " NCBI Organism:".$cil->CORE->NCBIORGANISMALCLASSIFICATION->onto_name.";";
                    }
                    else
                    {
                        $count = count($cil->CORE->NCBIORGANISMALCLASSIFICATION);
                        $i = 0;
                        $summary[$id] .= " NCBI Organism:";
                        foreach($$cil->CORE->NCBIORGANISMALCLASSIFICATION as $ncbi)
                        {
                            if(isset($ncbi->onto_name))
                            {
                                $summary[$id] .=$ncbi->onto_name;
                            }
                            
                            if($i != $count)
                                 $summary[$id] .= ", ";
                        }
                        $summary[$id] .= ";";
                    }
                 }
                 
                 
                 //------------------Cell type--------------------------
                 if(isset($cil->CORE->CELLTYPE))
                 {
                     
                     if(!is_array($cil->CORE->CELLTYPE))
                     {
                        
                         if(isset($cil->CORE->CELLTYPE->onto_name))
                         {
                              
                            $summary[$id] .= " Cell Types:".$cil->CORE->CELLTYPE->onto_name;
                           // echo $summary[$id];
                         }
                                 
                     }
                     else
                     {
                         $count = count($cil->CORE->CELLTYPE);
                         $i = 0;
                         $summary[$id] .= " Cell Types:";
                         foreach($cil->CORE->CELLTYPE as $cell)
                         {
                             if(isset($cell->onto_name))
                                $summary[$id] .= $cell->onto_name;
                             
                             $i++;
                             
                             if($i != $count)
                               $summary[$id] .=  ", ";
                         }
                         $summary[$id] .= ";";
                     }
                 }
                 //------------------End Cell type--------------------------
                 
                 
                 //---------------Cell components--------------------
                 if(isset($cil->CORE->CELLULARCOMPONENT))
                 {
                     
                     if(!is_array($cil->CORE->CELLULARCOMPONENT))
                     {
                        
                         if(isset($cil->CORE->CELLULARCOMPONENT->onto_name))
                         {
                              
                            $summary[$id] .= " Cell Components:".$cil->CORE->CELLULARCOMPONENT->onto_name;
                            //echo $summary[$id];
                         }
                                 
                     }
                     else
                     {
                         $count = count($cil->CORE->CELLULARCOMPONENT);
                         $i = 0;
                         $summary[$id] .= " Cell Components:";
                         foreach($cil->CORE->CELLULARCOMPONENT as $cell)
                         {
                             if(isset($cell->onto_name))
                                $summary[$id] .= $cell->onto_name;
                             
                             $i++;
                             
                             if($i != $count)
                               $summary[$id] .=  ", ";
                         }
                         $summary[$id] .= ";";
                     }
                     
                     
                     
                 }
                 //--------------------End cell component----------------------
                 
                 
                 //--------------------Biological process------------------------
                 
                 if(isset($cil->CORE->BIOLOGICALPROCESS))
                 {
                     
                     if(!is_array($cil->CORE->BIOLOGICALPROCESS))
                     {
                        
                         if(isset($cil->CORE->BIOLOGICALPROCESS->onto_name))
                         {
                              
                            $summary[$id] .= " Biological process:".$cil->CORE->BIOLOGICALPROCESS->onto_name;
                           // echo $summary[$id];
                         }
                                 
                     }
                     else
                     {
                         $count = count($cil->CORE->BIOLOGICALPROCESS);
                         $i = 0;
                         $summary[$id] .= " Biological process:";
                         foreach($cil->CORE->BIOLOGICALPROCESS as $bio)
                         {
                             if(isset($bio->onto_name))
                                $summary[$id] .= $bio->onto_name;
                             
                             $i++;
                             
                             if($i != $count)
                               $summary[$id] .=  ", ";
                         }
                         $summary[$id] .= ";";
                     }
                 
                 }
                 //--------------------End biological process---------------------
             }
         }
     }
}
