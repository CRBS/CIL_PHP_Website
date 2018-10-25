<?php

require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';

/**
 * This class is a CodeIgniter controller and its main function is
 * to list the CCDB images under a project ID.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
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
        
        $temp = $this->input->get('per_page',TRUE);
        if(!is_null($temp))
        {
            $size = intval($temp);
            
            if($size < 0)
                $size = 10;
        }
        
        
        
        $from = $page*$size;
        
        $searchPrefix = $this->config->item('apiDocPrefix');
        $searchPostfix = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND&from=".$from."&size=".$size;
        $searchURL = $searchPrefix."?search=CIL_CCDB.CCDB.Project.ID:".$project_id.$searchPostfix;
        
        //echo $searchURL;
        
        //$data['test'] = "test";
        $response = $sutil->curl_get($searchURL);

        $result = json_decode($response);
        if(is_null($result))
        {
            $data['title'] = 'The Cell Image Library';
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('cil_errors/empty_response_error', $data);
            $this->load->view('templates/cil_footer2', $data); 
            return;
        }    
        
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
                    "/project/".$project_id."?per_page=".$size."&page=";
            
            $results_per_pageURL = $this->config->item('base_url').
                    "/project/".$project_id."?page=";
            $data['results_per_pageURL'] = $results_per_pageURL;
            
            $data['urlPattern'] = $urlPattern;
            $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);
            
            $data['paginator'] = $paginator;
            
            
            
         ////////////////////////////End pagination/////////////////////////////////
        
        
        
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('search/project_search_results', $data);
        $this->load->view('templates/cil_footer2', $data);
        
    }
    
    
}
