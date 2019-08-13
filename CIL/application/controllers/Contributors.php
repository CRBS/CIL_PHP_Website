<?php

require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';


/**
 * This class is a CodeIgniter controller which displays all data
 * contributor names.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class Contributors  extends CI_Controller 
{
    
    public function Index()
    {
         $data['test'] = "test";
         $data['title'] = "Contributors - Cell Image Library";
         $data['meta_desc'] = "Please join us in this effort by allowing us to include your image collections and videos in this open access library, and by sharing your raw data.";
         $scontributors = file_get_contents(getcwd()."/application/json_config/Contributors/contributors.json");
         $contributors = json_decode($scontributors);
         $data['contributors'] = $contributors;
         
         $this->load->view('templates/cil_header4', $data);
         $this->load->view('contributors/contributor_display', $data);
         $this->load->view('templates/cil_footer2', $data);
         return;
    }
    
    
}