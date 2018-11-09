<?php
include_once 'CILServiceUtil2.php';
class Download extends CI_Controller
{
    public function web_mp4($numeric_id)
    {
        $this->load->helper('download');
        $cutil = new CILServiceUtil2();
        $download_prefix = $this->config->item('download_server_prefix');
        $url = $download_prefix."/media/videos/".$numeric_id."/".$numeric_id."_web.mp4";
        //$data = file_get_contents($url);
        $filename = $numeric_id."_web.mp4";
        $data = $cutil->curl_get($url);
        /*header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream'); 
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');*/
        
        force_download($filename, $data);
    }
    
    public function web_jpeg($dataType="image",$numeric_id)
    {
        $this->load->helper('download');
        $cutil = new CILServiceUtil2();
        $download_prefix = $this->config->item('download_server_prefix');
        //https://cildata.crbs.ucsd.edu/media/videos/10725/10725.jpg
        //https://cildata.crbs.ucsd.edu/media/images/40499/40499.jpg
        $filename=$numeric_id.".jpg";
        $url = "";
        if(strcmp($dataType,"video")==0)
            $url = $download_prefix."/media/videos/".$numeric_id."/".$numeric_id.".jpg";
        else
            $url = $download_prefix."/media/images/".$numeric_id."/".$numeric_id.".jpg";
            
        $data = $cutil->curl_get($url);
        force_download($filename, $data);
    }
}    
/* 
and open the template in the editor.
 */

