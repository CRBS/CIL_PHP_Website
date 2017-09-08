<?php

require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';
class Project  extends CI_Controller 
{
    public function view($project_id)
    {
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        
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
        $from = $page*$size;
        
        $searchPrefix = $this->config->item('apiDocPrefix');
        $searchPostfix = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND&from=".$from."&size=".$size;
        $searchURL = $searchPrefix."?search=CIL_CCDB.CCDB.Project.ID:".$project_id.$searchPostfix;
        
        //echo $searchURL;
        
        //$data['test'] = "test";
        $response = $sutil->curl_get($searchURL);

        $result = json_decode($response);
            
        $data['page_num'] = $page;
        $data['size']=$size;
        $data['total']=$result->hits->total;
        $data['result']=$result;
        $data['project_id']=$project_id;
        
        ///////////////////////////pagination/////////////////////////////////
            //echo $size;
            $currentPage = $page+1;
            $data['currentPage'] = $currentPage;
            //echo $currentPage;
            
            $urlPattern = $this->config->item('base_url').
                    "/project/".$project_id."?page=";
            $data['urlPattern'] = $urlPattern;
            $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);
            
            $data['paginator'] = $paginator;
            
            
            
         ////////////////////////////End pagination/////////////////////////////////
        
        
        
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('search/project_search_results', $data);
        $this->load->view('templates/cil_footer2', $data);
        
    }
    
    
}
