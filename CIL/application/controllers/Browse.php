<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
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
    
    
    
    public function cellprocess($input="None",$page_num=0,$size=10)
    {
        $from = $page_num*$size;
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
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
           //echo $query;
           $query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
           //echo $query_url;
           $response = $sutil->just_curl_get_data($query_url,$query);
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
           $query_url =  $this->config->item('data_search_url')."?from=".$from."&size=".$size;
           //echo $query_url;
           $response = $sutil->just_curl_get_data($query_url,$query);
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

}

?>
