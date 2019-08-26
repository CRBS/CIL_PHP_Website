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
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('cdeep3m/cdeep3m_display', $data);
        $this->load->view('templates/cil_footer2', $data);    
    }
    
    public function memebranes_accuracy()
    {
        $data['title'] = "Memebranes | Validation accuracy";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('cdeep3m/cdeep3m_display', $data);
        $this->load->view('templates/cil_footer2', $data); 
    }
    
    public function prp_demo()
    {
        $data['title'] = "CIL | CDeep3M PRP DEMO";
        
        $image_array = array();
        array_push($image_array, "CIL_50451");
        array_push($image_array, "CIL_50068");
        
        $data['image_array'] = $image_array;
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('cdeep3m/prp_demo_display', $data);
        $this->load->view('templates/cil_footer2', $data); 
    }
}
