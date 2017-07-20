<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
class Images  extends CI_Controller 
{
    
    public function Index()
    {
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $keywords = $this->input->get('k', TRUE);
        $data['keywords'] = $keywords;
        $queryString = urlencode($keywords);
        $simple_search = $this->input->get('simple_search',TRUE);
        $page = 0;
        $size = 10;
        
        $temp = $this->input->get('page',TRUE);
        if(!is_null($temp))
        {
            $page = intval($temp);
            $page = $page-1;
            //echo "---------page after:".$page."<br/>";
        }
        
        $from = $page*$size;
        $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
        
        //echo $keywords."<br/>";
        //echo $simple_search."<br/>";
        if(!is_null($keywords) && strcmp("$simple_search", "Search")==0)
        {
            $searchPrefix = $this->config->item('data_search_url');
            $searchPostfix = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND&from=".$from."&size=".$size;
            $searchURL = $searchPrefix."?q=".$queryString.$searchPostfix;
            
            //echo $searchURL;
            $response = $sutil->just_curl_get($searchURL);
            //echo $response;
            $result = json_decode($response);
            
            $data['page_num'] = $page;
            $data['size']=$size;
            $data['total']=$result->hits->total;
            $data['result']=$result;
            $data['keywords']=$keywords;
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('search/search_results', $data);
            $this->load->view('templates/cil_footer2', $data);
             
        }
    }
    
    public function view($imageID)
    {
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        
        if(is_numeric($imageID))
        {
            $imageID = "CIL_".$imageID;
        
        }
        
        $data['ccdb_direct_data_prefix'] = $this->config->item('ccdb_direct_data_prefix');
        
        $response = $sutil->getImage($imageID);
        $json = json_decode($response);
        $data['test'] = "test";
        $data['json'] = $json;
        $data['response'] = $response;
        
        if(isset($json->CIL_CCDB))
        {
           if(isset($json->CIL_CCDB->CCDB))
           {
             $data['image_id'] = $imageID;
             $data['result'] = $json;
             $this->load->view('templates/cil_header4', $data);
             $this->load->view('ccdb/ccdb_image_display', $data);
             $this->load->view('templates/cil_footer2', $data);

           }
           else if(isset($json->CIL_CCDB->CIL))
           {
             if($gutil->startsWith($imageID,"CIL_"))
             {
               // echo "<br/>Host name:".$this->config->base_url();;
                 $base_url = $this->config->base_url();
                $numeric_id = str_replace("CIL_", "", $imageID); 
                $data['numeric_id'] =$numeric_id;
                //$data['has_video'] = $sutil->is_url_exist("http://www.cellimagelibrary.org/videos/".$numeric_id.".flv");
                //$data['video_url'] = "http://www.cellimagelibrary.org/videos/".$numeric_id.".flv";
                
                //$data['has_video'] = $sutil->is_url_exist($base_url."/videos/".$numeric_id.".flv");
                $video_folder =  $this->config->item('video_folder');
                $data['has_video'] = file_exists($video_folder."/".$numeric_id .".flv");
                $data['video_url'] = $base_url."/videos/".$numeric_id.".flv";
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

