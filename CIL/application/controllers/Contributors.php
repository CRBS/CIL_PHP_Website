<?php

require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';

class Contributors  extends CI_Controller 
{
    
    public function Index()
    {
         $data['test'] = "test";
         $scontributors = file_get_contents(getcwd()."/application/json_config/Contributors/contributors.json");
         $contributors = json_decode($scontributors);
         $data['contributors'] = $contributors;
         
         $this->load->view('templates/cil_header4', $data);
         $this->load->view('contributors/contributor_display', $data);
         $this->load->view('templates/cil_footer2', $data);
         return;
    }
    
    
}