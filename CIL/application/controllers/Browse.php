<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
class Browse  extends CI_Controller 
{
    private function getQueryFileName(&$summary,$input)
    {
        $cell_processes = $summary->Cell_processes;
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
       else if(strcmp($input,"Actin%20Based%20Processes")==0)
       {
           $input = str_replace("%20", " ", $input);
           $data['category_title'] = $input;
           
           $this->load->view('templates/cil_header4', $data);
           
           
           $queryFileName = $this->getQueryFileName($configJson, $input);
           $query = file_get_contents(getcwd()."/application/json_config/cell_processes/".$queryFileName);
           //echo $query;
           $response = $sutil->just_curl_get_data($this->config->item('data_search_url')."?start=0&size=10",$query);
           echo $response;
           $this->load->view('categories/category_search_result_page', $data);
           $this->load->view('templates/cil_footer2', $data);
       }
    }

}

?>
