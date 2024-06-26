<?php

require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';
require_once 'Adv_query_util.php';

class Cdeep3m  extends CI_Controller 
{
    public function Index()
    {
        
        $data['title'] = "CIL | CDeep3M";
        $this->load->helper('url');
        redirect('https://cdeep3m.crbs.ucsd.edu');
        /*
        $client = new CILServiceUtil2();
        $response = $client->listTrainedModels();
        if(!is_null($response))
            $data['models_json'] = json_decode($response);
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('cdeep3m/cdeep3m_display', $data);
        $this->load->view('templates/cil_footer2', $data);    
         * 
         * 
         */
    }
    
    public function memebranes_accuracy()
    {
        $data['title'] = "Memebranes | Validation accuracy";
        $this->load->helper('url');
        redirect('https://cdeep3m.crbs.ucsd.edu');
        /*$this->load->view('templates/cil_header4', $data);
        $this->load->view('cdeep3m/cdeep3m_display', $data);
        $this->load->view('templates/cil_footer2', $data); 
         * 
         */
    }
    
    public function prp_demo()
    {
        $data['title'] = "CIL | CDeep3M PRP DEMO";
        $this->load->helper('url');
        redirect('https://cdeep3m.crbs.ucsd.edu');
        /*$image_viewer_prefix = $this->config->item('image_viewer_prefix');
        $image_viewer_prefix = str_replace("/image_viewer", "", $image_viewer_prefix);
        $data['image_viewer_prefix'] = $image_viewer_prefix;
        
        $image_array = array();
        array_push($image_array, "CIL_50451");
        array_push($image_array, "CCDB_8192");
        array_push($image_array, "CCDB_8246");
        array_push($image_array, "CIL_50584");
        array_push($image_array,"CIL_50585");
        array_push($image_array,"CIL_50582");
        array_push($image_array,"CIL_50643");
        array_push($image_array,"CIL_50644");
        array_push($image_array,"CIL_50581");
        array_push($image_array,"CIL_50667");
        array_push($image_array,"CIL_50668");
        array_push($image_array,"CIL_50669");
        $data['image_array'] = $image_array;
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('cdeep3m/prp_demo_display', $data);
        $this->load->view('templates/cil_footer2', $data); */
    }
}
