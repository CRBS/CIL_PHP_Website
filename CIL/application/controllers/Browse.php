<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';


/**
 * This class is a CodeIgniter controller which handles the  
 * category queries such as the cell type, cell component, cell process,
 * and organism.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
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
    
    public function microbial($input="None")
    {
        $data['cil_data_host'] = $this->config->item('cil_data_host');
        $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
        $data['category_title'] = $input;
        
        $adv_debug = $this->config->item('adv_debug');
        $cutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $data['test'] = "test"; //Just to initialize $data
        ////////Handle page and size////////////
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
        ////////End handle page and size////////////
        
        
        ///////Handle the image filter/////////////
        $basic_still = false;
        $basic_video = false;
        $basic_zstack = false;
        $basic_time = false;
        $filter_query_str = "";
        
        $temp = $this->input->get('refresh_still',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_still = true;
                $data['refresh_still'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_video',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_video = true;
                $data['refresh_video'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_zstack',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_zstack = true;
                $data['refresh_zstack'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_time',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_time = true;
                $data['refresh_time'] = true;
            }
        }
        ///////End handle the image filter/////////
        
        if(strcmp($input,"None")==0)
        {
            $algaeResults = $cutil->getMicrobial("algae", 0, 1,false,false,false,false);
            $fungiResults = $cutil->getMicrobial("fungi", 0, 1,false,false,false,false);
            $bacteriaResults = $cutil->getMicrobial("bacteria", 0, 1,false,false,false,false);
            $protozoaResults = $cutil->getMicrobial("protozoa", 0, 1,false,false,false,false);
            $virusResults = $cutil->getMicrobial("virus", 0, 1,false,false,false,false);

            if(!is_null($algaeResults))
                $data['algaeResults'] = json_decode($algaeResults);
            
            if(!is_null($fungiResults))
                $data['fungiResults'] = json_decode($fungiResults);
            
            if(!is_null($bacteriaResults))
                $data['bacteriaResults'] = json_decode($bacteriaResults);
            
            if(!is_null($protozoaResults))
                $data['protozoaResults'] = json_decode($protozoaResults);
            
            if(!is_null($virusResults))
                $data['virusResults'] = json_decode($virusResults);
            
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('categories2/microbial_display', $data);
            $this->load->view('templates/cil_footer2', $data);
        }
        else 
        {
            //echo "<br/>Input:".$input;
            $input = strtolower($input);
            $response = $cutil->getMicrobial($input, $from, $size,
                $basic_time,$basic_still,$basic_zstack,$basic_video);
            $result = json_decode($response);
            $category = $input;
            $this->load->view('templates/cil_header4', $data);
            $context_name = "microbial";
            //Non-empty results
            if(isset($result->hits->total))
            {
                //echo "<br/>---------Results hit";
                $data['result'] = $result;
                $data['total'] = $result->hits->total;
                $data['size'] = $size;
                $data['category'] = $category;
                $data['context_name'] = $context_name;
                $data['page_num'] = $page;//$page_num;

                ///////////////////////////pagination/////////////////////////////////
                $currentPage = $page+1;
                $data['currentPage'] = $currentPage;
                
                         
                /////////Filter params for the pagination/////////
                $additional_params = "";
                if($basic_still)
                {
                    if(strlen($additional_params)>0)
                        $additional_params=$additional_params."&";
                    $additional_params="refresh_still=true";
                }
                         
                if($basic_video)
                {
                    if(strlen($additional_params)>0)
                        $additional_params=$additional_params."&";
                    $additional_params="refresh_video=true";
                }
                         
                if($basic_zstack)
                {
                    if(strlen($additional_params)>0)
                        $additional_params=$additional_params."&";
                    $additional_params="refresh_zstack=true";
                }
                         
                if($basic_time)
                {
                    if(strlen($additional_params)>0)
                        $additional_params=$additional_params."&";
                    $additional_params="refresh_time=true";
                }
                /////////End filter params for the pagination/////////
                         
                $urlPattern = "";
                if(strlen($additional_params)==0)
                    $urlPattern = $this->config->item('base_url').
                        "/browse/microbial/".$input."?per_page=".$size."&page=";
                else 
                    $urlPattern = $this->config->item('base_url').
                        "/browse/microbial/".$input."?".$additional_params."&per_page=".$size."&page=";
                     
                $data['urlPattern'] = $urlPattern;
                $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);

                $results_per_pageURL ="";
                if(strlen($additional_params)==0)
                    $results_per_pageURL = $this->config->item('base_url').
                        "/browse/microbial/".$input."?page=";
                else 
                    $results_per_pageURL = $this->config->item('base_url').
                        "/browse/microbial/".$input."?".$additional_params."&page=";
                      
                $data['results_per_pageURL'] = $results_per_pageURL;

                $data['paginator'] = $paginator;
                ////////////////////////////End pagination/////////////////////////////////////

                $this->load->view('categories2/category_search_result_page', $data);
            }
            //End non empty result
            $this->load->view('templates/cil_footer2', $data);
                        
        }
        
    }
    
    
    public function cellprocess($input="None")
    {
        $data['cil_data_host'] = $this->config->item('cil_data_host');
        $adv_debug = $this->config->item('adv_debug');
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $data['test'] = "test"; //Just to initialize $data
        ////////Handle page and size////////////
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
        ////////End handle page and size////////////
        
        
        ////////Handle the direction and sorting/////
        $direction = "desc";
        $reversed_direction = "asc";
        $sort = "name";
        $reversed_sort = "image_count";
        $reversed_sort_name = "Sort by Image Count";
        $temp = $this->input->get('direction',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"desc") || strcmp($temp,"asc"))
            {
                $direction = $temp;
                if(strcmp($direction,"desc")==0)
                  $reversed_direction = "asc";
              else 
                  $reversed_direction = "desc";
              
            }
        }
        
        $temp = $this->input->get('sort',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"name") ==0 || strcmp($temp,"image_count")==0)
            {
                $sort = $temp;
                if(strcmp($sort,"name")==0)
                {
                   $reversed_sort = "image_count";
                   $reversed_sort_name = "Sort by Image Count";
                }
                else if(strcmp($sort,"image_count")==0)
                {
                   $reversed_sort = "name";
                   $reversed_sort_name = "Sort by Name";
                }
                
            }
        }
        $data['direction'] = $direction;
        $data['reversed_direction'] = $reversed_direction;
        $data['sort'] = $sort;
        $data['reversed_sort'] = $reversed_sort;
        $data['reversed_sort_name'] = $reversed_sort_name;
        ////////End handle the direction and sorting/////
        
        
        ///////Handle view type////////
        $view_type="grid";
        
        $temp = $this->input->get('view_type',TRUE);
        //echo "<br/>view_type-temp:".$temp."---";
        if(!is_null($temp))
        {
            if(strcmp($temp,"grid")==0 || strcmp($temp,"column")==0)
            {
                $view_type = $temp;
                
            }
        }
        //echo "<br/>view_type:".$view_type;
        ///////End handle view type////////
        
        
        ///////Handle the image filter/////////////
        $basic_still = false;
        $basic_video = false;
        $basic_zstack = false;
        $basic_time = false;
        $filter_query_str = "";
        
        $temp = $this->input->get('refresh_still',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_still = true;
                $data['refresh_still'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_video',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_video = true;
                $data['refresh_video'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_zstack',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_zstack = true;
                $data['refresh_zstack'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_time',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_time = true;
                $data['refresh_time'] = true;
            }
        }
        ///////End handle the image filter/////////
        
       $api_host = $this->config->item('service_api_host');
       $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
       $data['queryString'] = $this->input->server('QUERY_STRING');
       //echo "<br/>".$data['queryString'];
       $data['base_url'] = $this->config->item('base_url');
       
       if(strcmp($sort,"name") == 0)
       {
          //$url = $api_host."/rest/category/cell_process/Name/asc/0/10000";
           //The current website reserves the direction for some reason
           if(strcmp($direction,"asc")==0) 
              $direction = "desc";
           else
              $direction = "asc";
           
           
           $url = $api_host."/rest/category/cell_process/Name/".$direction."/0/10000";
       }
       else if(strcmp($sort,"image_count") == 0)
       {
          $url = $api_host."/rest/category/cell_process/Total/".$direction."/0/10000";
       }
          
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
        if(strcmp($view_type,"grid")==0)
           $this->load->view('categories2/cell_processes_display', $data);
       else 
           $this->load->view('categories2/cell_processes_display_col', $data);
       
        
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
           //echo "<br/>Response:".$response;
           $response = $gutil->handleResponse($response);
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
            
            if(!isset($result->hits->total) || 
                    $result->hits->total == 0)
            {
                $data['category'] = "cellprocess";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_results', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
           
            if(isset($result->hits->hits))
            {
                $count = count($result->hits->hits);
                if($count > 0)
                {
                    $hit = $result->hits->hits[0];
                    if(isset($hit->_source->Query_string))
                    {
                        //header('Content-Type: application/json');
                        $query = $hit->_source->Query_string;
                        //echo "\nQuery:".$query."----";
                        $json_query = json_decode($query);
                        $query_str = $json_query->query->query_string->query;
                        $query_str = trim($query_str);
                        
                        
                        //////////////Filter query params/////////////////////
                        if($basic_still)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Still_image:true ";
                        }
                        
                        if($basic_video)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Video:true ";
                        }
                        
                        if($basic_zstack)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Z_stack:true ";
                        }
                        
                        if($basic_time)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Time_series:true ";
                        }
                        
                        if(strlen($filter_query_str)>0)
                            $query_str = "(".$filter_query_str.") AND ".$query_str;
                        
                        if($adv_debug)
                            echo "<br/>".$query_str;
                        //////////////End filter query params/////////////////////
                        
                        
                        $json_query->query->query_string->query = $query_str;
                        $query = json_encode($json_query);
                        //echo $query;
                        
                        
                        
                        $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;;
                        $response = $sutil->curl_get_data($query_url,$query);
                        //echo $response;
                        $result = json_decode($response);
                                   
           
                        $this->load->view('templates/cil_header4', $data);
                        //if($result->hits->total > 0)
                        
                        //Non-empty results
                        if(isset($result->hits->total))
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
                         
                         /////////Filter params for the pagination/////////
                         $additional_params = "";
                         if($basic_still)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_still=true";
                         }
                         
                         if($basic_video)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_video=true";
                         }
                         
                         if($basic_zstack)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_zstack=true";
                         }
                         
                         if($basic_time)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_time=true";
                         }
                         /////////End filter params for the pagination/////////
                         
                         $urlPattern = "";
                         if(strlen($additional_params)==0)
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/cellprocess/".$input."?per_page=".$size."&page=";
                         else 
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/cellprocess/".$input."?".$additional_params."&per_page=".$size."&page=";
                     
                         $data['urlPattern'] = $urlPattern;
                         $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);


                         $results_per_pageURL ="";
                         if(strlen($additional_params)==0)
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/cellprocess/".$input."?page=";
                        else 
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/cellprocess/".$input."?".$additional_params."&page=";
                      
                         $data['results_per_pageURL'] = $results_per_pageURL;

                         $data['paginator'] = $paginator;
                         ////////////////////////////End pagination/////////////////////////////////////


                             //$this->load->view('categories/category_search_result_page', $data);
                             //$this->load->view('search/search_results', $data);
                             $this->load->view('categories2/category_search_result_page', $data);
                        }
                        //End non empty result
                        $this->load->view('templates/cil_footer2', $data);
                        
                    }
                }
            }
            
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
    
    /*
    /////////////////////old cellcomponent////////////////////////
    public function cellcomponent($input="None")
    {
       //$from = $page_num*$size;
       $data['cil_data_host'] = $this->config->item('cil_data_host');
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
    /////////////////////End old cellcomponent////////////////////////
    */
    
    
    /*
    /////////////////////old celltype////////////////////////
    public function celltype($input="None")
    {
        //$from = $page_num*$size;
        $data['cil_data_host'] = $this->config->item('cil_data_host');
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
    /////////////////////End old celltype////////////////////////
    */
    
    
    /*
    //////////////////////Old organism//////////////////////////////
     public function organism($input="None")
     {
            //$from = $page_num*$size;
            $data['cil_data_host'] = $this->config->item('cil_data_host');
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
       //////////////////////End old organism//////////////////////////////
       */
       
    ///////////////////New cellcomponent////////////////
    public function cellcomponent($input="None")
    {
        $data['cil_data_host'] = $this->config->item('cil_data_host');
        $adv_debug = $this->config->item('adv_debug');
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $data['test'] = "test"; //Just to initialize $data
        ////////Handle page and size////////////
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
        ////////End handle page and size////////////
        
        
        ////////Handle the direction and sorting/////
        $direction = "desc";
        $reversed_direction = "asc";
        $sort = "name";
        $reversed_sort = "image_count";
        $reversed_sort_name = "Sort by Image Count";
        $temp = $this->input->get('direction',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"desc") || strcmp($temp,"asc"))
            {
                $direction = $temp;
                if(strcmp($direction,"desc")==0)
                  $reversed_direction = "asc";
              else 
                  $reversed_direction = "desc";
              
            }
        }
        
        $temp = $this->input->get('sort',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"name") ==0 || strcmp($temp,"image_count")==0)
            {
                $sort = $temp;
                if(strcmp($sort,"name")==0)
                {
                   $reversed_sort = "image_count";
                   $reversed_sort_name = "Sort by Image Count";
                }
                else if(strcmp($sort,"image_count")==0)
                {
                   $reversed_sort = "name";
                   $reversed_sort_name = "Sort by Name";
                }
                
            }
        }
        $data['direction'] = $direction;
        $data['reversed_direction'] = $reversed_direction;
        $data['sort'] = $sort;
        $data['reversed_sort'] = $reversed_sort;
        $data['reversed_sort_name'] = $reversed_sort_name;
        ////////End handle the direction and sorting/////
        
        
        ///////Handle view type////////
        $view_type="grid";
        
        $temp = $this->input->get('view_type',TRUE);
        //echo "<br/>view_type-temp:".$temp."---";
        if(!is_null($temp))
        {
            if(strcmp($temp,"grid")==0 || strcmp($temp,"column")==0)
            {
                $view_type = $temp;
                
            }
        }
        //echo "<br/>view_type:".$view_type;
        ///////End handle view type////////
        
        
        ///////Handle the image filter/////////////
        $basic_still = false;
        $basic_video = false;
        $basic_zstack = false;
        $basic_time = false;
        $filter_query_str = "";
        
        $temp = $this->input->get('refresh_still',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_still = true;
                $data['refresh_still'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_video',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_video = true;
                $data['refresh_video'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_zstack',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_zstack = true;
                $data['refresh_zstack'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_time',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_time = true;
                $data['refresh_time'] = true;
            }
        }
        ///////End handle the image filter/////////
        
       $api_host = $this->config->item('service_api_host');
       $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
       $data['queryString'] = $this->input->server('QUERY_STRING');
       //echo "<br/>".$data['queryString'];
       $data['base_url'] = $this->config->item('base_url');
       
       if(strcmp($sort,"name") == 0)
       {
           if(strcmp($direction,"asc")==0) 
              $direction = "desc";
           else
              $direction = "asc";
           
           
           $url = $api_host."/rest/category/cell_component/Name/".$direction."/0/10000";
       }
       else if(strcmp($sort,"image_count") == 0)
       {
          $url = $api_host."/rest/category/cell_component/Total/".$direction."/0/10000";
       }
          
       $response = $sutil->curl_get($url); 
       $response = $gutil->handleResponse($response);
       
       //Error handling
       if(is_null($response))
       {
           $data['category'] = "cellcomponent";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       $result = json_decode($response);
       if(is_null($result))
       {
           $data['category'] = "cellcomponent";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       
       if(strcmp($input,"None")==0)
       {
        
        $data['result'] = $result;
        $data['category'] = "cellcomponent";
        $this->load->view('templates/cil_header4', $data);
        if(strcmp($view_type,"grid")==0)
           $this->load->view('categories2/cell_component_display', $data);
       else 
           $this->load->view('categories2/cell_component_display_col', $data);
       
        
        $this->load->view('templates/cil_footer2', $data);
       }
       else 
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "cellcomponent";
           $data['category_title'] = $input;
           //echo "<br/>Name:".$input."---";
           $response = $sutil->searchCategoryByName("cell_component", $input);
           //echo "<br/>searchCategoryByName Response:".$response;
           $response = $gutil->handleResponse($response);
           if(is_null($response))
           {
                $data['category'] = "cellcomponent";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
           }
           $result = json_decode($response);
            if(is_null($result))
            {
                $data['category'] = "cellcomponent";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
            
            if(!isset($result->hits->total) || 
                    $result->hits->total == 0)
            {
                $data['category'] = "cellcomponent";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_results', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
           
            if(isset($result->hits->hits))
            {
                $count = count($result->hits->hits);
                if($count > 0)
                {
                    $hit = $result->hits->hits[0];
                    if(isset($hit->_source->Query_string))
                    {
                        //header('Content-Type: application/json');
                        $query = $hit->_source->Query_string;
                        //echo "\nQuery:".$query."----";
                        $json_query = json_decode($query);
                        $query_str = $json_query->query->query_string->query;
                        $query_str = trim($query_str);
                        
                        
                        //////////////Filter query params/////////////////////
                        if($basic_still)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Still_image:true ";
                        }
                        
                        if($basic_video)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Video:true ";
                        }
                        
                        if($basic_zstack)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Z_stack:true ";
                        }
                        
                        if($basic_time)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Time_series:true ";
                        }
                        
                        if(strlen($filter_query_str)>0)
                            $query_str = "(".$filter_query_str.") AND ".$query_str;
                        
                        if($adv_debug)
                            echo "<br/>".$query_str;
                        //////////////End filter query params/////////////////////
                        
                        
                        $json_query->query->query_string->query = $query_str;
                        $query = json_encode($json_query);
                        //echo $query;
                        
                        
                        
                        $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;;
                        $response = $sutil->curl_get_data($query_url,$query);
                        //echo $response;
                        $result = json_decode($response);
                                   
           
                        $this->load->view('templates/cil_header4', $data);
                        //if($result->hits->total > 0)
                        if(isset($result->hits->total))
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
                         
                         /////////Filter params for the pagination/////////
                         $additional_params = "";
                         if($basic_still)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_still=true";
                         }
                         
                         if($basic_video)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_video=true";
                         }
                         
                         if($basic_zstack)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_zstack=true";
                         }
                         
                         if($basic_time)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_time=true";
                         }
                         /////////End filter params for the pagination/////////
                         
                         $urlPattern = "";
                         if(strlen($additional_params)==0)
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/cellcomponent/".$input."?per_page=".$size."&page=";
                         else 
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/cellcomponent/".$input."?".$additional_params."&per_page=".$size."&page=";
                     
                         $data['urlPattern'] = $urlPattern;
                         $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);


                         $results_per_pageURL ="";
                         if(strlen($additional_params)==0)
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/cellcomponent/".$input."?page=";
                        else 
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/cellcomponent/".$input."?".$additional_params."&page=";
                      
                         $data['results_per_pageURL'] = $results_per_pageURL;

                         $data['paginator'] = $paginator;
                         ////////////////////////////End pagination/////////////////////////////////////
                         if(strcasecmp($input, "Endoplasmic Reticulum") == 0)
                         {
                             $data['centered_interactive_cell'] = true;
                             $this->load->view('main_page2/endoplasmic_reticulum', $data);
                         }
                         else if(strcasecmp($input, "Endosome") == 0)
                         {
                             $data['centered_interactive_cell'] = true;
                             $this->load->view('main_page2/endosome', $data);
                         } 
                         else if(strcasecmp($input, "Microtubule Organizing Centers") == 0)
                         {
                             $data['centered_interactive_cell'] = true;
                             $this->load->view('main_page2/microtubule', $data);
                         }

                         $this->load->view('categories2/category_search_result_page', $data);
                        }
                        $this->load->view('templates/cil_footer2', $data);
                        
                    }
                }
            }
            
           
       }
    }
    ///////////////////End new cellcomponent//////////////// 
    
    
    ///////////////////New celltype////////////////
    public function celltype($input="None")
    {
        $data['cil_data_host'] = $this->config->item('cil_data_host');
        $adv_debug = $this->config->item('adv_debug');
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $data['test'] = "test"; //Just to initialize $data
        ////////Handle page and size////////////
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
        ////////End handle page and size////////////
        
        
        ////////Handle the direction and sorting/////
        $direction = "desc";
        $reversed_direction = "asc";
        $sort = "name";
        $reversed_sort = "image_count";
        $reversed_sort_name = "Sort by Image Count";
        $temp = $this->input->get('direction',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"desc") || strcmp($temp,"asc"))
            {
                $direction = $temp;
                if(strcmp($direction,"desc")==0)
                  $reversed_direction = "asc";
              else 
                  $reversed_direction = "desc";
              
            }
        }
        
        $temp = $this->input->get('sort',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"name") ==0 || strcmp($temp,"image_count")==0)
            {
                $sort = $temp;
                if(strcmp($sort,"name")==0)
                {
                   $reversed_sort = "image_count";
                   $reversed_sort_name = "Sort by Image Count";
                }
                else if(strcmp($sort,"image_count")==0)
                {
                   $reversed_sort = "name";
                   $reversed_sort_name = "Sort by Name";
                }
                
            }
        }
        $data['direction'] = $direction;
        $data['reversed_direction'] = $reversed_direction;
        $data['sort'] = $sort;
        $data['reversed_sort'] = $reversed_sort;
        $data['reversed_sort_name'] = $reversed_sort_name;
        ////////End handle the direction and sorting/////
        
        
        ///////Handle view type////////
        $view_type="grid";
        
        $temp = $this->input->get('view_type',TRUE);
        //echo "<br/>view_type-temp:".$temp."---";
        if(!is_null($temp))
        {
            if(strcmp($temp,"grid")==0 || strcmp($temp,"column")==0)
            {
                $view_type = $temp;
                
            }
        }
        //echo "<br/>view_type:".$view_type;
        ///////End handle view type////////
        
        
        ///////Handle the image filter/////////////
        $basic_still = false;
        $basic_video = false;
        $basic_zstack = false;
        $basic_time = false;
        $filter_query_str = "";
        
        $temp = $this->input->get('refresh_still',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_still = true;
                $data['refresh_still'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_video',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_video = true;
                $data['refresh_video'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_zstack',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_zstack = true;
                $data['refresh_zstack'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_time',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_time = true;
                $data['refresh_time'] = true;
            }
        }
        ///////End handle the image filter/////////
        
       $api_host = $this->config->item('service_api_host');
       $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
       $data['queryString'] = $this->input->server('QUERY_STRING');
       //echo "<br/>".$data['queryString'];
       $data['base_url'] = $this->config->item('base_url');
       
       if(strcmp($sort,"name") == 0)
       {
           if(strcmp($direction,"asc")==0) 
              $direction = "desc";
           else
              $direction = "asc";
           
           
          $url = $api_host."/rest/category/cell_type/Name/".$direction."/0/10000";
       }
       else if(strcmp($sort,"image_count") == 0)
       {
          $url = $api_host."/rest/category/cell_type/Total/".$direction."/0/10000";
       }
          
       $response = $sutil->curl_get($url); 
       $response = $gutil->handleResponse($response);
       
       //Error handling
       if(is_null($response))
       {
           $data['category'] = "celltype";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       $result = json_decode($response);
       if(is_null($result))
       {
           $data['category'] = "celltype";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       
       if(strcmp($input,"None")==0)
       {
        
        $data['result'] = $result;
        $data['category'] = "celltype";
        $this->load->view('templates/cil_header4', $data);
        if(strcmp($view_type,"grid")==0)
           $this->load->view('categories2/cell_type_display', $data);
       else 
           $this->load->view('categories2/cell_type_display_col', $data);
       
        
        $this->load->view('templates/cil_footer2', $data);
       }
       else 
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "celltype";
           $data['category_title'] = $input;
           //echo "<br/>Name:".$input."---";
           $response = $sutil->searchCategoryByName("cell_type", $input);
           //echo "<br/>searchCategoryByName Response:".$response;
           $response = $gutil->handleResponse($response);
           if(is_null($response))
           {
                $data['category'] = "celltype";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
           }
           $result = json_decode($response);
            if(is_null($result))
            {
                $data['category'] = "celltype";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
            
            if(!isset($result->hits->total) || 
                    $result->hits->total == 0)
            {
                $data['category'] = "celltype";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_results', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
           
            if(isset($result->hits->hits))
            {
                $count = count($result->hits->hits);
                if($count > 0)
                {
                    $hit = $result->hits->hits[0];
                    if(isset($hit->_source->Query_string))
                    {
                        //header('Content-Type: application/json');
                        $query = $hit->_source->Query_string;
                        //echo "\nQuery:".$query."----";
                        $json_query = json_decode($query);
                        $query_str = $json_query->query->query_string->query;
                        $query_str = trim($query_str);
                        
                        
                        //////////////Filter query params/////////////////////
                        if($basic_still)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Still_image:true ";
                        }
                        
                        if($basic_video)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Video:true ";
                        }
                        
                        if($basic_zstack)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Z_stack:true ";
                        }
                        
                        if($basic_time)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Time_series:true ";
                        }
                        
                        if(strlen($filter_query_str)>0)
                            $query_str = "(".$filter_query_str.") AND ".$query_str;
                        
                        if($adv_debug)
                            echo "<br/>".$query_str;
                        //////////////End filter query params/////////////////////
                        
                        
                        $json_query->query->query_string->query = $query_str;
                        $query = json_encode($json_query);
                        //echo $query;
                        
                        
                        
                        $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;;
                        $response = $sutil->curl_get_data($query_url,$query);
                        //echo $response;
                        $result = json_decode($response);
                                   
           
                        $this->load->view('templates/cil_header4', $data);
                        //if($result->hits->total > 0)
                        if(isset($result->hits->total))
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
                         
                         /////////Filter params for the pagination/////////
                         $additional_params = "";
                         if($basic_still)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_still=true";
                         }
                         
                         if($basic_video)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_video=true";
                         }
                         
                         if($basic_zstack)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_zstack=true";
                         }
                         
                         if($basic_time)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_time=true";
                         }
                         /////////End filter params for the pagination/////////
                         
                         $urlPattern = "";
                         if(strlen($additional_params)==0)
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/celltype/".$input."?per_page=".$size."&page=";
                         else 
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/celltype/".$input."?".$additional_params."&per_page=".$size."&page=";
                     
                         $data['urlPattern'] = $urlPattern;
                         $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);


                         $results_per_pageURL ="";
                         if(strlen($additional_params)==0)
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/celltype/".$input."?page=";
                        else 
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/celltype/".$input."?".$additional_params."&page=";
                      
                         $data['results_per_pageURL'] = $results_per_pageURL;

                         $data['paginator'] = $paginator;
                         ////////////////////////////End pagination/////////////////////////////////////

                         $this->load->view('categories2/category_search_result_page', $data);
                        }
                        $this->load->view('templates/cil_footer2', $data);
                        
                    }
                }
            }
            
           
       }
    }
    ///////////////////End new celltype////////////////
    
    
    
    ///////////////////New organism////////////////
    public function organism($input="None")
    {
        $data['cil_data_host'] = $this->config->item('cil_data_host');
        $adv_debug = $this->config->item('adv_debug');
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $data['test'] = "test"; //Just to initialize $data
        ////////Handle page and size////////////
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
        ////////End handle page and size////////////
        
        
        ////////Handle the direction and sorting/////
        $direction = "desc";
        $reversed_direction = "asc";
        $sort = "name";
        $reversed_sort = "image_count";
        $reversed_sort_name = "Sort by Image Count";
        $temp = $this->input->get('direction',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"desc") || strcmp($temp,"asc"))
            {
                $direction = $temp;
                if(strcmp($direction,"desc")==0)
                  $reversed_direction = "asc";
              else 
                  $reversed_direction = "desc";
              
            }
        }
        
        $temp = $this->input->get('sort',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp,"name") ==0 || strcmp($temp,"image_count")==0)
            {
                $sort = $temp;
                if(strcmp($sort,"name")==0)
                {
                   $reversed_sort = "image_count";
                   $reversed_sort_name = "Sort by Image Count";
                }
                else if(strcmp($sort,"image_count")==0)
                {
                   $reversed_sort = "name";
                   $reversed_sort_name = "Sort by Name";
                }
                
            }
        }
        $data['direction'] = $direction;
        $data['reversed_direction'] = $reversed_direction;
        $data['sort'] = $sort;
        $data['reversed_sort'] = $reversed_sort;
        $data['reversed_sort_name'] = $reversed_sort_name;
        ////////End handle the direction and sorting/////
        
        
        ///////Handle view type////////
        $view_type="grid";
        
        $temp = $this->input->get('view_type',TRUE);
        //echo "<br/>view_type-temp:".$temp."---";
        if(!is_null($temp))
        {
            if(strcmp($temp,"grid")==0 || strcmp($temp,"column")==0)
            {
                $view_type = $temp;
                
            }
        }
        //echo "<br/>view_type:".$view_type;
        ///////End handle view type////////
        
        
        ///////Handle the image filter/////////////
        $basic_still = false;
        $basic_video = false;
        $basic_zstack = false;
        $basic_time = false;
        $filter_query_str = "";
        
        $temp = $this->input->get('refresh_still',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_still = true;
                $data['refresh_still'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_video',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_video = true;
                $data['refresh_video'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_zstack',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_zstack = true;
                $data['refresh_zstack'] = true;
            }
        }
        
        $temp = $this->input->get('refresh_time',TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $basic_time = true;
                $data['refresh_time'] = true;
            }
        }
        ///////End handle the image filter/////////
        
       $api_host = $this->config->item('service_api_host');
       $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
       $data['queryString'] = $this->input->server('QUERY_STRING');
       //echo "<br/>".$data['queryString'];
       $data['base_url'] = $this->config->item('base_url');
       
       if(strcmp($sort,"name") == 0)
       {
           if(strcmp($direction,"asc")==0) 
              $direction = "desc";
           else
              $direction = "asc";
           
           
          $url = $api_host."/rest/category/organism/Name/".$direction."/0/10000";
       }
       else if(strcmp($sort,"image_count") == 0)
       {
          $url = $api_host."/rest/category/organism/Total/".$direction."/0/10000";
       }
          
       $response = $sutil->curl_get($url); 
       $response = $gutil->handleResponse($response);
       
       //Error handling
       if(is_null($response))
       {
           $data['category'] = "organism";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       $result = json_decode($response);
       if(is_null($result))
       {
           $data['category'] = "organism";
           $this->load->view('templates/cil_header4', $data);
           $this->load->view('cil_errors/empty_response_error', $data);
           $this->load->view('templates/cil_footer2', $data);
           return;
       }
       
       
       if(strcmp($input,"None")==0)
       {
        
        $data['result'] = $result;
        $data['category'] = "organism";
        $this->load->view('templates/cil_header4', $data);
        if(strcmp($view_type,"grid")==0)
           $this->load->view('categories2/organism_display', $data);
       else 
           $this->load->view('categories2/organism_display_col', $data);
       
        
        $this->load->view('templates/cil_footer2', $data);
       }
       else 
       {
           $category = $input;
           $input = str_replace("%20", " ", $input);
           $context_name = "organism";
           $data['category_title'] = $input;
           //echo "<br/>Name:".$input."---";
           $response = $sutil->searchCategoryByName("organism", $input);
           //echo "<br/>searchCategoryByName Response:".$response;
           $response = $gutil->handleResponse($response);
           if(is_null($response))
           {
                $data['category'] = "organism";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
           }
           $result = json_decode($response);
            if(is_null($result))
            {
                $data['category'] = "organism";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
            
            if(!isset($result->hits->total) || 
                    $result->hits->total == 0)
            {
                $data['category'] = "organism";
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_results', $data);
                $this->load->view('templates/cil_footer2', $data);
                return;
            }
           
            if(isset($result->hits->hits))
            {
                $count = count($result->hits->hits);
                if($count > 0)
                {
                    $hit = $result->hits->hits[0];
                    if(isset($hit->_source->Query_string))
                    {
                        //header('Content-Type: application/json');
                        $query = $hit->_source->Query_string;
                        //echo "\nQuery:".$query."----";
                        $json_query = json_decode($query);
                        $query_str = $json_query->query->query_string->query;
                        $query_str = trim($query_str);
                        
                        
                        //////////////Filter query params/////////////////////
                        if($basic_still)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Still_image:true ";
                        }
                        
                        if($basic_video)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Video:true ";
                        }
                        
                        if($basic_zstack)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Z_stack:true ";
                        }
                        
                        if($basic_time)
                        {
                            if(strlen($filter_query_str) > 0)
                                $filter_query_str = $filter_query_str." AND ";
                            $filter_query_str = $filter_query_str." CIL_CCDB.Data_type.Time_series:true ";
                        }
                        
                        if(strlen($filter_query_str)>0)
                            $query_str = "(".$filter_query_str.") AND ".$query_str;
                        
                        if($adv_debug)
                            echo "<br/>".$query_str;
                        //////////////End filter query params/////////////////////
                        
                        
                        $json_query->query->query_string->query = $query_str;
                        $query = json_encode($json_query);
                        //echo $query;
                        
                        
                        
                        $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;;
                        $response = $sutil->curl_get_data($query_url,$query);
                        //echo $response;
                        $result = json_decode($response);
                                   
           
                        $this->load->view('templates/cil_header4', $data);
                        //if($result->hits->total > 0)
                        if(isset($result->hits->total))
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
                         
                         /////////Filter params for the pagination/////////
                         $additional_params = "";
                         if($basic_still)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_still=true";
                         }
                         
                         if($basic_video)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_video=true";
                         }
                         
                         if($basic_zstack)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_zstack=true";
                         }
                         
                         if($basic_time)
                         {
                            if(strlen($additional_params)>0)
                                $additional_params=$additional_params."&";
                            $additional_params="refresh_time=true";
                         }
                         /////////End filter params for the pagination/////////
                         
                         $urlPattern = "";
                         if(strlen($additional_params)==0)
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/organism/".$input."?per_page=".$size."&page=";
                         else 
                            $urlPattern = $this->config->item('base_url').
                                 "/browse/organism/".$input."?".$additional_params."&per_page=".$size."&page=";
                     
                         $data['urlPattern'] = $urlPattern;
                         $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);


                         $results_per_pageURL ="";
                         if(strlen($additional_params)==0)
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/organism/".$input."?page=";
                        else 
                            $results_per_pageURL = $this->config->item('base_url').
                                  "/browse/organism/".$input."?".$additional_params."&page=";
                      
                         $data['results_per_pageURL'] = $results_per_pageURL;

                         $data['paginator'] = $paginator;
                         ////////////////////////////End pagination/////////////////////////////////////

                         $this->load->view('categories2/category_search_result_page', $data);
                        }
                        $this->load->view('templates/cil_footer2', $data);
                        
                    }
                }
            }
            
           
       }
    }
    ///////////////////End new organism////////////////
}

?>
