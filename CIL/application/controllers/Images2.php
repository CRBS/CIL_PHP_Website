<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
class Images2  extends CI_Controller 
{
    
    
    public function view($imageID)
    {
        
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        
        
        
        
        $response = $sutil->getImage($imageID);
        $json = json_decode($response);
        $data['test'] = "test";
        $data['json'] = $json;
        $data['response'] = $response;
        
        if(isset($json->CIL_CCDB))
        {
           if(isset($json->CIL_CCDB->CCDB))
           {
             
               
             $this->load->view('templates/cil_header', $data);
             $this->load->view('ccdb_image_display', $data);
           }
           else if(isset($json->CIL_CCDB->CIL))
           {
             if($gutil->startsWith($imageID,"CIL_"))
             {
                 
                $numeric_id = str_replace("CIL_", "", $imageID); 
                $data['numeric_id'] =$numeric_id;
                $data['has_video'] = $sutil->is_url_exist("http://www.cellimagelibrary.org/videos/".$numeric_id.".flv");
                $data['video_url'] = "http://www.cellimagelibrary.org/videos/".$numeric_id.".flv";
             }
             else 
             {
                 $data['numeric_id'] = $imageID;
             }    
             $this->load->view('templates/cil_header4', $data);
             $this->load->view('cil_image_display', $data);
             $this->load->view('templates/cil_footer2', $data);
           }
        }
        else
        {
            show_404();
            return;
        }
        
    }
    
    
}

