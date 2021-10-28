<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';
require_once 'Adv_query_util.php';

/**
 * This class is a CodeIgniter controller has two functions. The first
 * one is to display the image information. The second one is to query
 * for images. 
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class Images  extends CI_Controller 
{
    /*
     * This function is used for the general keyword search and
     * the advanced ontology search. If simple_search is set in URL
     * parameter, it will search by keyword. If advanced_search is set
     * in the URL parameter, it will perform the advanced search. In 
     * addition, this function also filters the image types and manages
     * the number of displayable results on a page.
     * 
     */
    public function Index()
    {
        
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        $adv_debug = $this->config->item('adv_debug');
        
        $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
        $data['ccdb_image_prefix'] = $this->config->item('ccdb_image_prefix');
        
        $basic_still = null;
        $basic_video = null;
        $basic_zstack = null;
        $basic_time = null;
        
        $keywords = $this->input->get('k', TRUE);
        
        //echo "<br/>keywords:".$keywords;
        //if(strpos(strtolower($keywords), "<script>") !== false)
        //    show_404 ();
        
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
        
        
        //////////Trying to implement the di_onto_term but it might not be worth////////////////
        /*
        $di_onto_term = $this->input->get('di_onto_term',TRUE);
        $di_onto_cat = $this->input->get('di_onto_cat',TRUE);
        if(!is_null($di_onto_cat) && !is_null($di_onto_term))
        {
            $queryString = $this->input->server('QUERY_STRING');
            
            $autil = new Adv_query_util();
            $this->load->model('Adv_search_query_model');
            $array = array();
            $amodel = $this->Adv_search_query_model;
            
            $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_ncbi', 'image_search_parms[ncbi]');
        }
        else 
        */
        //////////END Trying to implement the di_onto_term but it might not be worth////////////////
        
        if(!is_null($keywords) && strcmp($simple_search, "Search")==0)
        {
            /*$searchPrefix2 = $this->config->item('data_search_url');
            $searchPostfix2 = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND&from=".$from."&size=".$size;
            $searchURL2 = $searchPrefix2."?q=".$queryString.$searchPostfix2;
            echo "<br/>".$searchURL2;
            $response = $sutil->just_curl_get($searchURL2);*/
            
            $base_url0 = $this->config->item('base_url');
            $query_string0 = $this->input->server('QUERY_STRING');
            $ip_address = $this->input->ip_address();
            
            //echo "<br/>".$base_url0;
            //echo "<br/>".$query_string0;
            //echo "<br/>".$ip_address;
            
            $sutil->trackUserQueryInfo($base_url0, $query_string0, $ip_address);
            
            $data['title'] = $keywords." | CIL Search";
            
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
            if(is_null($result))
            {
                $data['title'] = 'The Cell Image Library';
                //$this->load->view('templates/cil_header4', $data);
                $this->load->view('templates/cil_header_light', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data); 
                return;
            }
            
            if(isset($result->error))
            {
                $data['result'] = $result;
                $data['keywords']=$keywords;
                //$this->load->view('templates/cil_header4', $data);
                $this->load->view('templates/cil_header_light', $data);
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
            
            //$urlPattern = $this->config->item('base_url').
            //        "/images?k=".$queryString."&simple_search=Search&per_page=".$size."&page=";
            $urlPattern = $this->config->item('base_url')."/images?k=".$queryString;
            //echo "<br/>URL pattern in Images:".$urlPattern;
            
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
            $results_per_pageURL = $results_per_pageURL."&simple_search=Search&page=";
            $data['results_per_pageURL'] = $results_per_pageURL;
            
            
            $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);
            
            $data['paginator'] = $paginator;
            
            
            
            ////////////////////////////End pagination/////////////////////////////////////
            
            
            
            
            
            //$this->load->view('templates/cil_header4', $data);
            $this->load->view('templates/cil_header_light', $data);
            $this->load->view('search/search_results', $data);
            $this->load->view('templates/cil_footer2', $data);
             
        }
        else if(!is_null($adv_search))
        {
            
            $base_url0 = $this->config->item('base_url');
            $query_string0 = $this->input->server('QUERY_STRING');
            $ip_address = $this->input->ip_address();
            $sutil->trackUserQueryInfo($base_url0, $query_string0, $ip_address);
            
            
            
            $query_url =  $this->config->item('advanced_search')."?from=".$from."&size=".$size;
            //$query = $this->handleAdvSearchInputs($this->input);
            $rarray = $this->handleAdvSearchInputs($this->input);
            $query = $rarray['query_str'];
            $amodel = $rarray['amodel'];
            $data['amodel'] = $amodel;
            
            if($amodel->search_for)
            {
               $length = 35;
               $search_for = $amodel->search_for;
               $count = strlen($amodel->search_for);
               //echo "<br/>Count:".$count;
               if($count > $length)
                   $search_for = substr ($search_for, 0, $length)."...";
               $data ['search_for'] = $search_for;
               
            }

            $response = $sutil->curl_get_data($query_url,$query);
            
            //error_log($query, 3, "C:/Test3/query/query.json");
            //echo $response;
            //echo "<br/>".$query_url;
            //echo "<br/>curl -XGET '".$query_url."' -d '".$query." '";
            //echo "<hr><br/><br/>Response:".$response;
            
            $result = json_decode($response);
            if(is_null($result))
            {
                $data['title'] = 'The Cell Image Library';
                $this->load->view('templates/cil_header4', $data);
                $this->load->view('cil_errors/empty_response_error', $data);
                $this->load->view('templates/cil_footer2', $data); 
                return;
            }
            
            
            $queryString = $this->input->server('QUERY_STRING');
            
            if($adv_debug)
            {
                echo "<br/>queryString:".$queryString;
            }
            
            $data['page_num'] = $page;
            $data['size']=$size;
            $data['total']=$result->hits->total;
            $data['result']=$result;
            $data['keywords']=$keywords;
            
            $currentPage = $page+1;
            $data['currentPage'] = $currentPage;
            $urlPattern = $this->config->item('base_url').
                    "/images?".$queryString."&per_page=".$size."&page=";;
            $data['urlPattern'] = $urlPattern;
            
            
            $results_per_pageURL = $urlPattern = $this->config->item('base_url').
                    "/images?".$queryString."&page=";
            $data['results_per_pageURL'] = $results_per_pageURL;
            
            
            $paginator = new Paginator($result->hits->total, $size, $currentPage, $urlPattern);
            $data['paginator'] = $paginator;
            
            $data['queryString'] = $queryString;
            $data['result'] = $result;
            
            
            //echo "-----------amodel-----------";
            //var_dump($amodel);
            //echo  $data['search_for'];
            //echo "-----------End amodel-----------";
            $data['title'] = "CIL advanced search";
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('advanced_search/results/adv_search_results', $data);
            $this->load->view('templates/cil_footer2', $data);
        }
    }
    

    private function handleAdvSearchInputs($input)
    {
        $CI = CI_Controller::get_instance();
        
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
        /////CCDB related////
        $autil->handleBoolean($amodel, $input, 'image2d');
        $autil->handleBoolean($amodel, $input, 'reconstruction');
        $autil->handleBoolean($amodel, $input, 'segmentation');
        /////End CCDB related////
        $autil->handleYesOrNo($amodel, $input, 'grouped', 'ungrouped');
        $autil->handleYesOrNo($amodel, $input, 'computable', 'uncomputable');
        $autil->handleBoolean($amodel, $input, 'public_domain');
        $autil->handleBoolean($amodel, $input,'attribution_cc');
        $autil->handleBoolean($amodel, $input,'attribution_nc_sa');
        $autil->handleBoolean($amodel, $input,'copyright');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_biological_process', 'image_search_parms[biological_process]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_cell_type', 'image_search_parms[cell_type]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_cell_line', 'image_search_parms[cell_line]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_foundational_model_anatomy', 'image_search_parms[foundational_model_anatomy]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_cellular_component', 'image_search_parms[cellular_component]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_molecular_function', 'image_search_parms[molecular_function]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_ncbi', 'image_search_parms[ncbi]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_item_type_bim', 'image_search_parms[item_type_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_image_mode_bim', 'image_search_parms[image_mode_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_visualization_methods_bim', 'image_search_parms[visualization_methods_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_source_of_contrast_bim', 'image_search_parms[source_of_contrast_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_relation_to_intact_cell_bim', 'image_search_parms[relation_to_intact_cell_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_processing_history_bim', 'image_search_parms[processing_history_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_preparation_bim', 'image_search_parms[preparation_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_parameter_imaged_bim', 'image_search_parms[parameter_imaged_bim]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_human_dev_anatomy', 'image_search_parms[human_dev_anatomy]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_human_disease', 'image_search_parms[human_disease]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_mouse_gross_anatomy', 'image_search_parms[mouse_gross_anatomy]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_mouse_pathology', 'image_search_parms[mouse_pathology]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_plant_growth', 'image_search_parms[plant_growth]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_teleost_anatomy', 'image_search_parms[teleost_anatomy]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_xenopus_anatomy', 'image_search_parms[xenopus_anatomy]');
        $autil->handleTextWithAltName($amodel, $input, 'image_search_parms_zebrafish_anatomy', 'image_search_parms[zebrafish_anatomy]');
        
        
        
        $query_str = $autil->generateEsQuery($amodel);
        //echo "<br/>".$query_str."<br/>";
        
        
       
        $adv_debug = $CI->config->item('adv_debug');
        if($adv_debug)
        {
            //$amodel->print_model();
            echo "<br/><br/>";
            echo "<br/>curl -XGET \"http://stretch.crbs.ucsd.edu:9200/ccdbv8/data/_search\" -d '".
                    $query_str."' > test.json";
            echo "<br/><br/>";
        }
        
        //New return type
        $array = array();
        $array['query_str'] = $query_str;
        $array['amodel'] = $amodel;
        
        //return $query_str;
        return $array;
    }
    
    private function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    
    /**
     * This function retrieve metadata based on the image ID. Then,
     * it packages all information and display them in a single image.
     * The URL pattern is /images/$imageID . The function name, "view"
     * is skipped due to the configuration on routes.php
     * 
     * @param string $imageID
     * 
     */
    public function view($imageID)
    {
        
        $data['base_url'] = $this->config->base_url();
        $data['ip_address'] = $this->getRealIpAddr();
        $data['download_prefix'] = $this->config->item('download_server_prefix');
        $data['ccdb_direct_data_prefix'] = $this->config->item('ccdb_direct_data_prefix');
        $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
        $data['ccdb_image_prefix'] = $this->config->item('ccdb_image_prefix');
        $data['cil_data_host'] = $this->config->item('cil_data_host');
        $data['enable_cdeep3m'] = $this->config->item('enable_cdeep3m');
        $data['image_viewer_prefix'] = $this->config->item('image_viewer_prefix');
        $data['local_image_display'] = $this->config->item('local_image_display');
        
        if(strcmp($imageID,"advanced_search")==0)
        {
            $data['test'] = "test";
            $data['title'] = "Advanced search - Cell Image Library";
            $data['meta_desc'] = "The Advanced Search options allow specific ontology terms to be used to restrict the results to images that are annotated in a particular category with a particular ontology term.";
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('advanced_search/advanced_search_display', $data);
            $this->load->view('templates/cil_footer2', $data);
            return;
        }
        
        $data['turn_off_jquery_1_12'] = true;
        
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        
        if(is_numeric($imageID))
        {
            $imageID = "CIL_".$imageID;
        
        }
        
        
        
        $data['ccdb_direct_data_prefix'] = $this->config->item('ccdb_direct_data_prefix');
        
        $response = $sutil->getImage($imageID);
        $json = json_decode($response);
        $isAccessible = false;
        if(isset($json->CIL_CCDB->Status->Is_public) && !$json->CIL_CCDB->Status->Is_public)
        {
            $key = $this->input->get('key',TRUE);
            if(is_null($key))
            {
                show_404();
                return;
            }
            $pResponse = $sutil->getDataPermissions($key);
            //echo $pResponse;
            //return;
            $pjson = json_decode($pResponse);
            if(isset($pjson->_source->Data_permissions->Datasets))
            {
               
                $tempID = str_replace("CIL_", "", $imageID);
                $datasets = $pjson->_source->Data_permissions->Datasets;
                foreach($datasets as $dataset)
                {
                    if(strcmp($dataset, $tempID)==0)
                    {
                        $isAccessible = true;
                        break;
                    }
                }
            }
            if(!$isAccessible)
            {
                show_404();
                return;
            }
        }
        
        
        if(isset($json->CIL_CCDB->Status->Token) && !is_null($json->CIL_CCDB->Status->Token))
        {
            $token = $this->input->get('token', TRUE);
            if(is_null($token))
            {
                show_404();
                return;
            }
            
            if(strcmp($token, $json->CIL_CCDB->Status->Token) != 0)
            {
                show_404();
                return;
            }
        }
        
        /***************Tracking image view*********************/
        $sutil = new CILServiceUtil2();
        $base_url0 = $this->config->item('base_url');
        $ip_address = $this->input->ip_address();
        $browserAgent = $_SERVER['HTTP_USER_AGENT'];
        $sutil->trackImageView($base_url0, $imageID, $ip_address,$browserAgent);
        /***************End Tracking image view*********************/
        
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
             $data['summary'] = $this->getSummary($json->CIL_CCDB->CIL);
             if($gutil->startsWith($imageID,"CIL_"))
             {
               // echo "<br/>Host name:".$this->config->base_url();;
                $base_url = $this->config->base_url();
                $numeric_id = str_replace("CIL_", "", $imageID); 
                $data['numeric_id'] =$numeric_id;
                
                /**********SEO*******************/
                $json_ld = $this->getDatasetJsonLd($imageID,$numeric_id, $json);
                if(!is_null($json_ld))
                {
                    $data['json_ld_str'] = json_encode($json_ld,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                }
                /**********End SEO*******************/
                $tid = str_replace("_", ":", $imageID);
                if(isset($json->CIL_CCDB->Citation->Title) && !is_null($json->CIL_CCDB->Citation->Title))
                {
                    
                    $pos = strpos($json->CIL_CCDB->Citation->Title, $tid);
                    
                    if($pos !== FALSE)
                    {
                        $len = strlen($json->CIL_CCDB->Citation->Title);
                        $tempTitle = substr($json->CIL_CCDB->Citation->Title, $pos);
                        $data['title'] = $tempTitle;
                    }
                    else
                         $data['title'] = $tid." ".$json->CIL_CCDB->Citation->Title;
                }
                else
                    $data['title'] = $tid;
                
                $data['meta_desc'] = 'Cell Image Library';
                
                if(isset($json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text))
                {
                    $meta_desc = $json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text;
                   
                    if(strlen($meta_desc) > 150)
                    {
                        $meta_desc = substr ($meta_desc, 0,150)."...";

                    }
                    // echo $meta_desc;
                    $data['meta_desc'] = $meta_desc;
                }
                
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
    
    private function findImageFileJSON($json, $type)
    {
        if(!isset($json->CIL_CCDB->CIL->Image_files))
            return null;
        
        $imageFiles = $json->CIL_CCDB->CIL->Image_files;
        foreach($imageFiles as $imageFile)
        {
            if(isset($imageFile->File_type) && strcmp($imageFile->File_type, $type) == 0)
            {
                return $imageFile;
            }
        }
        
        return null;
    } 
    private function getDatasetJsonLd($image_id,$numeric_id, $json)
    {
        $download_prefix = $this->config->item('download_server_prefix');
        $json_ld_str = "";
        $json_ld = NULL;
        $jsonLdPath = getcwd()."/json_ld/dataset_model.json";
        if(file_exists($jsonLdPath))
        {
            $json_ld_str = file_get_contents($jsonLdPath);
            $json_ld = json_decode($json_ld_str);
            if(!is_null($json_ld))
            {
                //$data['json_ld_str'] = $json_ld_str;
                if(isset($json->CIL_CCDB->Citation->Title))
                    $json_ld->name =$json->CIL_CCDB->Citation->Title;
                else
                    $json_ld->name = $this->getSummary($json->CIL_CCDB->CIL);
                if(isset($json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text))
                    $json_ld->description = $json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text;
                
                if(isset($json->CIL_CCDB->Citation->DOI))
                    $json_ld->identifier = $json->CIL_CCDB->Citation->DOI;
                else
                    $json_ld->identifier = $image_id;
                
                if(isset($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text))
                {
                    if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "public_domain")==0)
                        $json_ld->license = "http://creativecommons.org/choose/publicdomain-3?title=&amp;copyright_holder=";
                    else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_cc_by")==0)
                        $json_ld->license = "http://creativecommons.org/licenses/by/3.0/legalcode";
                    else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nc_sa")==0)
                        $json_ld->license = "http://creativecommons.org/licenses/by-nc-sa/3.0";
                    else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "copyright")==0)
                        $json_ld->license = "copyright protected";
                    else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_sa")==0)
                        $json_ld->license = "http://creativecommons.org/licenses/by-sa/3.0";
                    else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nd")==0)
                        $json_ld->license = "http://creativecommons.org/licenses/by-nd/3.0";
                    else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nc")==0)
                        $json_ld->license = "http://creativecommons.org/licenses/by-nc/3.0";
                    else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nc_nd")==0)
                        $json_ld->license = "http://creativecommons.org/licenses/by-nc-nd/3.0";
                }
                
                if(isset($json->CIL_CCDB->Data_type->Video) && !$json->CIL_CCDB->Data_type->Video)
                {
                    $jpeg = $this->findImageFileJSON($json,'Jpeg');
                    $zip = $this->findImageFileJSON($json,'Zip');
                    $tif = $this->findImageFileJSON($json,'OME_tif');
                    
                    if(!is_null($zip))
                        $json_ld->distribution->contentUrl = $download_prefix."/media/images/".$numeric_id."/".$zip->File_path;
                    else if(!is_null($tif))
                        $json_ld->distribution->contentUrl = $download_prefix."/media/images/".$numeric_id."/".$tif->File_path;
                    else if(!is_null($jpeg))
                        $json_ld->distribution->contentUrl = $download_prefix."/media/images/".$numeric_id."/".$jpeg->File_path;
                }
                else if(isset($json->CIL_CCDB->Data_type->Video) && $json->CIL_CCDB->Data_type->Video)
                {

                    $jpeg = $this->findImageFileJSON($json,'Jpeg');
                    $zip = $this->findImageFileJSON($json,'Zip');
                    $mp4 = $this->findImageFileJSON($json,'Mp4');
                    
                    if(!is_null($zip))
                        $json_ld->distribution->contentUrl = $download_prefix."/media/videos/".$numeric_id."/".$zip->File_path;
                    else if(!is_null($mp4))
                        $json_ld->distribution->contentUrl = $download_prefix."/media/videos/".$numeric_id."/".$mp4->File_path;
                    else if(!is_null($jpeg))
                        $json_ld->distribution->contentUrl = $download_prefix."/media/videos/".$numeric_id."/".$jpeg->File_path;
                }
                
                if(isset($json->CIL_CCDB->Status->Publish_time))
                   $json_ld->datePublished = date('Y-m-d', $json->CIL_CCDB->Status->Publish_time);
            }
                     
        }
        
        return $json_ld;
    }   
    
   
    
    private function getSummary($cil)
    {
        $summary = "";
        if(isset($cil->CORE->NCBIORGANISMALCLASSIFICATION))
        {
            if(!is_array($cil->CORE->NCBIORGANISMALCLASSIFICATION))
            {
                if(isset($cil->CORE->NCBIORGANISMALCLASSIFICATION->onto_name))
                    $summary .= " NCBI Organism:".$cil->CORE->NCBIORGANISMALCLASSIFICATION->onto_name.";";
            }
            else
            {
                $count = count($cil->CORE->NCBIORGANISMALCLASSIFICATION);
                $i = 0;
                $summary .= " NCBI Organism:";
                foreach($cil->CORE->NCBIORGANISMALCLASSIFICATION as $ncbi)
                {
                    if(isset($ncbi->onto_name))
                    {
                        $summary .=$ncbi->onto_name;
                    }
                            
                    if($i != $count)
                        $summary .= ", ";
                }
                $summary .= ";";
            }
        }
                 
                 
        //------------------Cell type--------------------------
        if(isset($cil->CORE->CELLTYPE))
        {
                     
            if(!is_array($cil->CORE->CELLTYPE))
            {
                        
                if(isset($cil->CORE->CELLTYPE->onto_name))
                {         
                    $summary .= " Cell Types:".$cil->CORE->CELLTYPE->onto_name;
                }
                                 
            }
            else
            {
                $count = count($cil->CORE->CELLTYPE);
                $i = 0;
                $summary .= " Cell Types:";
                foreach($cil->CORE->CELLTYPE as $cell)
                {
                    if(isset($cell->onto_name))
                        $summary .= $cell->onto_name;
                             
                    $i++;
                             
                    if($i != $count)
                        $summary .=  ", ";
                }
                $summary .= ";";
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
                    $summary .= " Cell Components:".$cil->CORE->CELLULARCOMPONENT->onto_name;
                }                     
            }
            else
            {
                $count = count($cil->CORE->CELLULARCOMPONENT);
                $i = 0;
                $summary .= " Cell Components:";
                foreach($cil->CORE->CELLULARCOMPONENT as $cell)
                {
                    if(isset($cell->onto_name))
                        $summary .= $cell->onto_name;
                             
                    $i++;
                             
                    if($i != $count)
                        $summary .=  ", ";
                }
                $summary .= ";";
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
                    $summary .= " Biological process:".$cil->CORE->BIOLOGICALPROCESS->onto_name;
                }
                                 
            }
            else
            {
                $count = count($cil->CORE->BIOLOGICALPROCESS);
                $i = 0;
                $summary .= " Biological process:";
                foreach($cil->CORE->BIOLOGICALPROCESS as $bio)
                {
                    if(isset($bio->onto_name))
                        $summary .= $bio->onto_name;
                             
                    $i++;
                             
                    if($i != $count)
                        $summary .=  ", ";
                }
                $summary .= ";";
            }
                 
        }
        return htmlspecialchars($summary);
    }

}

