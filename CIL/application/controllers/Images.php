<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';
require_once 'Adv_query_util.php';
class Images  extends CI_Controller 
{
    
    public function Index()
    {
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        
        $basic_still = null;
        $basic_video = null;
        $basic_zstack = null;
        $basic_time = null;
        
        $keywords = $this->input->get('k', TRUE);
        $data['keywords'] = $keywords;
        $queryString = urlencode($keywords);
        $simple_search = $this->input->get('simple_search',TRUE);
        $adv_search = $this->input->get('advanced_search',TRUE);
        $page = 0;
        $size = 10;
        
        $temp = $this->input->get('page',TRUE);
        if(!is_null($temp))
        {
            $page = intval($temp);
            $page = $page-1;
            //echo "---------page after:".$page."<br/>";
            if($page < 0)
                $page = 0;
        }
        
        $temp = $this->input->get('per_page',TRUE);
        if(!is_null($temp))
        {
            $size = intval($temp);
            if($size < 0)
                $size = 10;
        }
        
        $temp = $this->input->get('basic_still',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_still = true;
                $data['basic_still'] = true;
            }
        }
        
        $temp = $this->input->get('basic_video',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_video = true;
                $data['basic_video'] = true;
            }
        }
        
        $temp = $this->input->get('basic_zstack',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_zstack = true;
                $data['basic_zstack'] = true;
            }
        }
        
        $temp = $this->input->get('basic_time',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_time = true;
                $data['basic_time'] = true;
            }
        }
        
        $from = $page*$size;
        $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
        
        $data['base_url'] = $this->config->item('base_url');
        //echo $keywords."<br/>";
        //echo $simple_search."<br/>";
        if(!is_null($keywords) && strcmp("$simple_search", "Search")==0)
        {
            /*$searchPrefix2 = $this->config->item('data_search_url');
            $searchPostfix2 = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND&from=".$from."&size=".$size;
            $searchURL2 = $searchPrefix2."?q=".$queryString.$searchPostfix2;
            echo "<br/>".$searchURL2;
            $response = $sutil->just_curl_get($searchURL2);*/
            
            $searchPrefix = $this->config->item('apiDocPrefix');
            $searchPostfix = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND&from=".$from."&size=".$size;
            $searchURL = $searchPrefix."?search=".$queryString.$searchPostfix;
            if(!is_null($basic_still) || !is_null($basic_video)
                    || !is_null($basic_zstack) || !is_null($basic_time))
            {
                $searchURL = $searchPrefix."?search=".$queryString;
                if(!is_null($basic_still))
                    $searchURL = $searchURL."+CIL_CCDB.Data_type.Still_image:true";
                
                if(!is_null($basic_video))
                    $searchURL = $searchURL."+CIL_CCDB.Data_type.Video:true";
                
                if(!is_null($basic_zstack))
                    $searchURL = $searchURL."+CIL_CCDB.Data_type.Z_stack:true";
                
                if(!is_null($basic_time))
                    $searchURL = $searchURL."+CIL_CCDB.Data_type.Time_series:true";
                
                $searchURL = $searchURL.$searchPostfix;
                
            }
            
            
            //echo "<br/>".$searchURL;
            $response = $sutil->curl_get($searchURL);
            
            
            //echo "<br/><br/>".$response;
            $result = json_decode($response);
            if(isset($result->error))
            {
                $data['result'] = $result;
                $data['keywords']=$keywords;
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('search/search_error_display', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
            
            
            $data['page_num'] = $page;
            $data['size']=$size;
            $data['total']=$result->hits->total;
            $data['result']=$result;
            $data['keywords']=$keywords;
            $data['queryString']=$queryString;
            ///////////////////////////pagination/////////////////////////////////
            //echo $size;
            $currentPage = $page+1;
            $data['currentPage'] = $currentPage;
            //echo $currentPage;
            
            $urlPattern = $this->config->item('base_url').
                    "/images?k=".$queryString."&simple_search=Search&per_page=".$size."&page=";
            if(!is_null($basic_still) || !is_null($basic_video)
                    || !is_null($basic_zstack) || !is_null($basic_time))
            {
                $urlPattern = $this->config->item('base_url').
                    "/images?k=".$queryString;
                if(!is_null($basic_still))
                    $urlPattern = $urlPattern."&basic_still=true";
                
                if(!is_null($basic_video))
                    $urlPattern = $urlPattern."&basic_video=true";
                
                if(!is_null($basic_zstack))
                    $urlPattern = $urlPattern."&basic_zstack=true";
                
                if(!is_null($basic_time))
                    $urlPattern = $urlPattern."&basic_time=true";
            }
            $urlPattern = $urlPattern."&simple_search=Search&per_page=".$size."&page=";
            $data['urlPattern'] = $urlPattern;
            
            
            $results_per_pageURL = $this->config->item('base_url').
                     "/images?k=".$queryString;
            if(!is_null($basic_still) || !is_null($basic_video)
                    || !is_null($basic_zstack) || !is_null($basic_time))
            {
                $results_per_pageURL = $this->config->item('base_url').
                    "/images?k=".$queryString;
                if(!is_null($basic_still))
                    $results_per_pageURL = $results_per_pageURL."&basic_still=true";
                
                if(!is_null($basic_video))
                    $results_per_pageURL = $results_per_pageURL."&basic_video=true";
                
                if(!is_null($basic_zstack))
                    $results_per_pageURL = $results_per_pageURL."&basic_zstack=true";
                
                if(!is_null($basic_time))
                    $results_per_pageURL = $results_per_pageURL."&basic_time=true";
            }
            $results_per_pageURL = $results_per_pageURL."&simple_search=Search&&page=";
            $data['results_per_pageURL'] = $results_per_pageURL;
            
            
            $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);
            
            $data['paginator'] = $paginator;
            
            
            
            ////////////////////////////End pagination/////////////////////////////////////
            
            
            
            
            
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('search/search_results', $data);
            $this->load->view('templates/cil_footer2', $data);
             
        }
        else if(!is_null($adv_search))
        {
            $array = $this->handleAdvSearchInputs($this->input);
            var_dump($array);
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('advanced_search/results/adv_search_results', $data);
            $this->load->view('templates/cil_footer2', $data);
        }
    }
    

    private function handleAdvSearchInputs($input)
    {
        $autil = new Adv_query_util();
        $this->load->model('Adv_search_query_model');
        //$this->Adv_search_query_model->k = "test";
        //echo "<br/>k:".$this->Adv_search_query_model->k."<br/>";
        $array = array();
        $amodel = $this->Adv_search_query_model;
        
        $autil->handleText($amodel, $input, 'k');
        $autil->handleBoolean($amodel, $input, 'still');
        $autil->handleBoolean($amodel, $input, 'video');
        $autil->handleBoolean($amodel, $input, 'zstack');
        $autil->handleBoolean($amodel, $input, 'time');
        $autil->handleYesOrNo($amodel, $input, 'grouped', 'ungrouped');
        $autil->handleYesOrNo($amodel, $input, 'computable', 'uncomputable');
        $autil->handleBoolean($amodel, $input, 'public_domain');
        $autil->handleBoolean($amodel, $input,'attribution_cc');
        $autil->handleBoolean($amodel, $input,'attribution_nc_sa');
        $autil->handleBoolean($amodel, $input,'copyright');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_biological_process', 'image_search_parms[biological_process]');
        
        
        $amodel->print_model();
        $query_str = $autil->generateEsQuery($amodel);
        echo "<br/>".$query_str."<br/>";
        
        echo "<br/><br/>";
        echo "<br/>curl -XGET \"http://stretch.crbs.ucsd.edu:9200/ccdbv8/data/_search\" -d '".
                $query_str."' > test.json";
        echo "<br/><br/>";
        //echo "<br/>k:".$this->Adv_search_query_model->k."<br/>";
        
        /*$temp = $input->get('k',TRUE);
        if(!is_null($temp))
        {
            $array['k'] = trim($temp);
        }
        
        
        $temp = $input->get('basic_still',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_still = true;
                $data['basic_still'] = true;
            }
        }*/
        
        return $array;
    }
    
    
    public function view($imageID)
    {
        if(strcmp($imageID,"advanced_search")==0)
        {
            $data['test'] = "test";
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('advanced_search/advanced_search_display', $data);
            $this->load->view('templates/cil_footer2', $data);
            return;
        }
        
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
             if($gutil->startsWith($imageID, "CCDB_"))
             {
                 $numeric_id = str_replace("CCDB_", "", $imageID);
                 $data['$numeric_id'] = $numeric_id;
             }
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
    
    
    public function Advanced_search()
    {
        
    }
    
}

