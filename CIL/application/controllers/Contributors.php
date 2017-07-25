<?php

require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';

class Contributors  extends CI_Controller 
{
    
    public function Index()
    {
         $data['test'] = "test";
            $this->load->view('templates/cil_header4', $data);
            $this->load->view('temp/comming_soon', $data);
            $this->load->view('templates/cil_footer2', $data);
            return;
    }
    
    
}