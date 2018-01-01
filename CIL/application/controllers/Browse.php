<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';
class Browse  extends CI_Controller 
{
    private function getQueryFileName(&$summary,$input)
    {
        $cell_processes = $summary->Cell_process;
        foreach($cell_processes as $cp)
        {
            if(strcmp($cp->Name,$input)==0)
            {
                return $cp->Query_file;
            }
        }
        return null;
        
    }
    
    private function getQueryFileName2(&$summary,$input,$title)
    {
        //Replace the slash with the underscore
        $input = str_replace("+", "/", $input);
        //echo "<br/>INPUT:".$input;
        
        $cell_processes = $summary->{$title};
        foreach($cell_processes as $cp)
        {
            if(strcmp($cp->Name,$input)==0)
            {
                return $cp->Query_file;
            }
        }
        return null;
        
    }
    
    
    
    public function cellprocess($input="None")
    {
        
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
       $api_host = $this->config->item('service_api_host');
       $url = $api_host."/rest/category/cell_process/Name/asc/0/10000";
       $response = $sutil->curl_get($url); 
       $response = $gutil->handleResponse($response);
       
       //Error handling
       if(is_null($response))
       {
           $data['category'] = "cellprocess";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       $result = json_decode($response);
       if(is_null($result))
       {
           $data['category'] = "cellprocess";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       
       if(strcmp($input,"None")==0)
       {
        
        $data['result'] = $result;
        $data['category'] = "cellprocess";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('categories2/cell_processes_display', $data);
        $this->load->view('templates/cil_footer2', $data);
       }
       else //if(strcmp($input,"Actin%20Based%20Processes")==0)
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "cellprocess";
           $data['category_title'] = $input;
           //echo "<br/>Name:".$input."---";
           $response = $sutil->searchCategoryByName("cell_process", $input);
           echo "<br/>Response:".$response;
           /*
           $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
           
           $this->load->view('templates/cil_header4', $data);
           
           
           $queryFileName = $this->getQueryFileName($configJson, $input);
           $query = file_get_contents(getcwd()."/application/json_config/cell_processes/".$queryFileName);
             
           $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
           $response = $sutil->curl_get_data($query_url,$query);
           
           //echo $response;
           $result = json_decode($response);
           if($result->hits->total > 0)
           {
                $data['result'] = $result;
                $data['total'] = $result->hits->total;
                $data['size'] = $size;
                $data['category'] = $category;
                $data['context_name'] = $context_name;
                $data['page_num'] = $page;//$page_num;
                
            ///////////////////////////pagination/////////////////////////////////
            //echo $size;
            $currentPage = $page+1;
            $data['currentPage'] = $currentPage;
            //echo $currentPage;
            
            $urlPattern = $this->config->item('base_url').
                    "/browse/cellprocess/".$input."?per_page=".$size."&page=";
            $data['urlPattern'] = $urlPattern;
            $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);
            
            $results_per_pageURL = $this->config->item('base_url').
                     "/browse/cellprocess/".$input."?page=";
            $data['results_per_pageURL'] = $results_per_pageURL;
            
            $data['paginator'] = $paginator;
            ////////////////////////////End pagination/////////////////////////////////////
                
                
                $this->load->view('categories/category_search_result_page', $data);
           }
           $this->load->view('templates/cil_footer2', $data);
            
            */
       }
    }
    
    /*
    public function cellprocess($input="None")
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
        
        
       $sconfig = file_get_contents(getcwd()."/application/json_config/cell_processes/cell_process_summary.json");
       $configJson = json_decode($sconfig);
       if(strcmp($input,"None")==0)
       {
        
        $data['summary'] = $configJson;
        $data['category'] = "cellprocess";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('categories/cell_processes_display', $data);
        $this->load->view('templates/cil_footer2', $data);
       }
       else //if(strcmp($input,"Actin%20Based%20Processes")==0)
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "cellprocess";
           $data['category_title'] = $input;
           $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
           
           $this->load->view('templates/cil_header4', $data);
           
           
           $queryFileName = $this->getQueryFileName($configJson, $input);
           $query = file_get_contents(getcwd()."/application/json_config/cell_processes/".$queryFileName);
             
           $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
           $response = $sutil->curl_get_data($query_url,$query);
           
           //echo $response;
           $result = json_decode($response);
           if($result->hits->total > 0)
           {
                $data['result'] = $result;
                $data['total'] = $result->hits->total;
                $data['size'] = $size;
                $data['category'] = $category;
                $data['context_name'] = $context_name;
                $data['page_num'] = $page;//$page_num;
                
            ///////////////////////////pagination/////////////////////////////////
            //echo $size;
            $currentPage = $page+1;
            $data['currentPage'] = $currentPage;
            //echo $currentPage;
            
            $urlPattern = $this->config->item('base_url').
                    "/browse/cellprocess/".$input."?per_page=".$size."&page=";
            $data['urlPattern'] = $urlPattern;
            $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);
            
            $results_per_pageURL = $this->config->item('base_url').
                     "/browse/cellprocess/".$input."?page=";
            $data['results_per_pageURL'] = $results_per_pageURL;
            
            $data['paginator'] = $paginator;
            ////////////////////////////End pagination/////////////////////////////////////
                
                
                $this->load->view('categories/category_search_result_page', $data);
           }
           $this->load->view('templates/cil_footer2', $data);
       }
    }
    */
    
    
    
    /*
    public function cellcomponent($input="None",$page_num=0,$size=10)
    {
       $from = $page_num*$size;
       $sutil = new CILServiceUtil2();
       $gutil = new GeneralUtil();
        
       $sconfig = file_get_contents(getcwd()."/application/json_config/cell_component/cell_component_summary.json");
       $configJson = json_decode($sconfig);
       if(strcmp($input,"None")==0)
       {
        
        $data['summary'] = $configJson;
        $data['category'] = "cellcomponent";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('categories/cell_component_display', $data);
        $this->load->view('templates/cil_footer2', $data);
       }
       else
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "cellcomponent";
           $data['category_title'] = $input;
           $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
           
           $this->load->view('templates/cil_header4', $data);
           
           
           $queryFileName = $this->getQueryFileName2($configJson, $input, "Cell_component");
           $query = file_get_contents(getcwd()."/application/json_config/cell_component/".$queryFileName);
           //echo $query;
           //$query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
           //$response = $sutil->just_curl_get_data($query_url,$query);
           //echo $query_url;
           
           $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
           $response = $sutil->curl_get_data($query_url,$query);
          
           //echo $response;
           $result = json_decode($response);
           if($result->hits->total > 0)
           {
                $data['result'] = $result;
                $data['total'] = $result->hits->total;
                $data['size'] = $size;
                
                $data['category'] = $category;
                $data['context_name'] = $context_name;
                //echo "<br/>Category".$category;
                $data['page_num'] = $page_num;
                $this->load->view('categories/category_search_result_page', $data);
           }
           $this->load->view('templates/cil_footer2', $data);
       }
    }
    */
    public function cellcomponent($input="None")
    {
       //$from = $page_num*$size;
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
        
       $sconfig = file_get_contents(getcwd()."/application/json_config/cell_component/cell_component_summary.json");
       $configJson = json_decode($sconfig);
       if(strcmp($input,"None")==0)
       {
        
        $data['summary'] = $configJson;
        $data['category'] = "cellcomponent";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('categories/cell_component_display', $data);
        $this->load->view('templates/cil_footer2', $data);
       }
       else
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "cellcomponent";
           $data['category_title'] = $input;
           $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
           
           $this->load->view('templates/cil_header4', $data);
           
           
           $queryFileName = $this->getQueryFileName2($configJson, $input, "Cell_component");
           $query = file_get_contents(getcwd()."/application/json_config/cell_component/".$queryFileName);
           //echo $query;
           //$query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
           //$response = $sutil->just_curl_get_data($query_url,$query);
           //echo $query_url;
           
           $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
           $response = $sutil->curl_get_data($query_url,$query);
          
           //echo $response;
           $result = json_decode($response);
           if($result->hits->total > 0)
           {
                $data['result'] = $result;
                $data['total'] = $result->hits->total;
                $data['size'] = $size;
                
                $data['category'] = $category;
                $data['context_name'] = $context_name;
                //echo "<br/>Category".$category;
                $data['page_num'] = $page;//$page_num;
               ///////////////////////////pagination/////////////////////////////////
                //echo $size;
                $currentPage = $page+1;
                $data['currentPage'] = $currentPage;
                //echo $currentPage;

                $urlPattern = $this->config->item('base_url').
                        "/browse/cellcomponent/".$input."?per_page=".$size."&page=";
                $data['urlPattern'] = $urlPattern;
                
                $results_per_pageURL = $this->config->item('base_url').
                     "/browse/cellcomponent/".$input."?page=";
                $data['results_per_pageURL'] = $results_per_pageURL;
                
                
                $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);

                $data['paginator'] = $paginator;
                ////////////////////////////End pagination/////////////////////////////////////
                $this->load->view('categories/category_search_result_page', $data);
           }
           $this->load->view('templates/cil_footer2', $data);
       }
    }
    
    
    
    /*
    public function celltype($input="None",$page_num=0,$size=10)
    {
        $from = $page_num*$size;
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
       $sconfig = file_get_contents(getcwd()."/application/json_config/cell_type/cell_type_summary.json");
       $configJson = json_decode($sconfig);
       if(strcmp($input,"None")==0)
       {
        
        $data['summary'] = $configJson;
        $data['category'] = "celltype";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('categories/cell_type_display', $data);
        $this->load->view('templates/cil_footer2', $data);
       }
       else
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "celltype";
           $data['category_title'] = $input;
           $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
           
           $this->load->view('templates/cil_header4', $data);
           
           
           $queryFileName = $this->getQueryFileName2($configJson, $input, "Cell_type");
           $query = file_get_contents(getcwd()."/application/json_config/cell_type/".$queryFileName);
           //echo $query;
           //$query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
           //$response = $sutil->just_curl_get_data($query_url,$query);
           //echo $query_url;
           
           $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
           $response = $sutil->curl_get_data($query_url,$query);
           
           //echo $response;
           $result = json_decode($response);
           if($result->hits->total > 0)
           {
                $data['result'] = $result;
                $data['total'] = $result->hits->total;
                $data['size'] = $size;
                
                $data['category'] = $category;
                $data['context_name'] = $context_name;
                //echo "<br/>Category".$category;
                $data['page_num'] = $page_num;
                $this->load->view('categories/category_search_result_page', $data);
           }
           $this->load->view('templates/cil_footer2', $data);
       }
    }
    */
    public function celltype($input="None")
    {
        //$from = $page_num*$size;
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
        
       $sconfig = file_get_contents(getcwd()."/application/json_config/cell_type/cell_type_summary.json");
       $configJson = json_decode($sconfig);
       if(strcmp($input,"None")==0)
       {
        
        $data['summary'] = $configJson;
        $data['category'] = "celltype";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('categories/cell_type_display', $data);
        $this->load->view('templates/cil_footer2', $data);
       }
       else
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "celltype";
           $data['category_title'] = $input;
           $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
           
           $this->load->view('templates/cil_header4', $data);
           
           
           $queryFileName = $this->getQueryFileName2($configJson, $input, "Cell_type");
           $query = file_get_contents(getcwd()."/application/json_config/cell_type/".$queryFileName);
           //echo $query;
           //$query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
           //$response = $sutil->just_curl_get_data($query_url,$query);
           //echo $query_url;
           
           $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
           $response = $sutil->curl_get_data($query_url,$query);
           
           //echo $response;
           $result = json_decode($response);
           if($result->hits->total > 0)
           {
                $data['result'] = $result;
                $data['total'] = $result->hits->total;
                $data['size'] = $size;
                
                $data['category'] = $category;
                $data['context_name'] = $context_name;
                //echo "<br/>Category".$category;
                $data['page_num'] = $page;//$page_num;
                ///////////////////////////pagination/////////////////////////////////
                //echo $size;
                $currentPage = $page+1;
                $data['currentPage'] = $currentPage;
                //echo $currentPage;

                $urlPattern = $this->config->item('base_url').
                        "/browse/celltype/".$input."?per_page=".$size."&page=";
                $data['urlPattern'] = $urlPattern;
                
                
                $results_per_pageURL = $this->config->item('base_url').
                     "/browse/celltype/".$input."?page=";
                $data['results_per_pageURL'] = $results_per_pageURL;
                
                
                $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);

                $data['paginator'] = $paginator;
                ////////////////////////////End pagination/////////////////////////////////////
                
                
                $this->load->view('categories/category_search_result_page', $data);
           }
           $this->load->view('templates/cil_footer2', $data);
       }
    }
    
    
    /*
     public function organism($input="None",$page_num=0,$size=10)
     {
            $from = $page_num*$size;
            $sutil = new CILServiceUtil2();
            $gutil = new GeneralUtil();

           $sconfig = file_get_contents(getcwd()."/application/json_config/organism/organism_summary.json");
           $configJson = json_decode($sconfig);
           if(strcmp($input,"None")==0)
           {

            $data['summary'] = $configJson;
            $data['category'] = "organism";
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('categories/organism_display', $data);
            $this->load->view('templates/cil_footer2', $data);
           }
           else
            {
               $category = $input;
               $input = str_replace("%20", " ", $input);
               $context_name = "organism";
               $data['category_title'] = $input;
               $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');

               $this->load->view('templates/cil_header4', $data);


               $queryFileName = $this->getQueryFileName2($configJson, $input, "Organism");
               $query = file_get_contents(getcwd()."/application/json_config/organism/".$queryFileName);
               //echo $query;
               //$query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
               //$response = $sutil->just_curl_get_data($query_url,$query);
               //echo $query_url;
               
               $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
               $response = $sutil->curl_get_data($query_url,$query);
               //echo $query_url;
               
               //echo $response;
               $result = json_decode($response);
               if($result->hits->total > 0)
               {
                    $data['result'] = $result;
                    $data['total'] = $result->hits->total;
                    $data['size'] = $size;

                    $data['category'] = $category;
                    $data['context_name'] = $context_name;
                    //echo "<br/>Category".$category;
                    $data['page_num'] = $page_num;
                    $this->load->view('categories/category_search_result_page', $data);
               }
               $this->load->view('templates/cil_footer2', $data);
            }
           
       }
     
     */
     public function organism($input="None")
     {
            //$from = $page_num*$size;
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

           $sconfig = file_get_contents(getcwd()."/application/json_config/organism/organism_summary.json");
           $configJson = json_decode($sconfig);
           if(strcmp($input,"None")==0)
           {

            $data['summary'] = $configJson;
            $data['category'] = "organism";
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('categories/organism_display', $data);
            $this->load->view('templates/cil_footer2', $data);
           }
           else
            {
               $category = $input;
               $input = str_replace("%20", " ", $input);
               $context_name = "organism";
               $data['category_title'] = $input;
               $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');

               $this->load->view('templates/cil_header4', $data);


               $queryFileName = $this->getQueryFileName2($configJson, $input, "Organism");
               $query = file_get_contents(getcwd()."/application/json_config/organism/".$queryFileName);
               //echo $query;
               //$query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
               //$response = $sutil->just_curl_get_data($query_url,$query);
               //echo $query_url;
               
               $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
               $response = $sutil->curl_get_data($query_url,$query);
               //echo $query_url;
               
               //echo $response;
               $result = json_decode($response);
               if($result->hits->total > 0)
               {
                    $data['result'] = $result;
                    $data['total'] = $result->hits->total;
                    $data['size'] = $size;

                    $data['category'] = $category;
                    $data['context_name'] = $context_name;
                    //echo "<br/>Category".$category;
                    $data['page_num'] = $page; //$page_num;
                    ///////////////////////////pagination/////////////////////////////////
                    //echo $size;
                    $currentPage = $page+1;
                    $data['currentPage'] = $currentPage;
                    //echo $currentPage;

                    $urlPattern = $this->config->item('base_url').
                            "/browse/organism/".$input."?per_page=".$size."&page=";
                    $data['urlPattern'] = $urlPattern;
                    
                    $results_per_pageURL = $this->config->item('base_url').
                     "/browse/organism/".$input."?page=";
                    $data['results_per_pageURL'] = $results_per_pageURL;
                    
                    
                    $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);

                    $data['paginator'] = $paginator;
                    ////////////////////////////End pagination/////////////////////////////////////
                    $this->load->view('categories/category_search_result_page', $data);
               }
               $this->load->view('templates/cil_footer2', $data);
            }
           
       }
}

?>
