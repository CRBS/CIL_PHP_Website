<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';


/**
 * This class is a CodeIgniter controller and its main function is
 * to display the static pages.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class Pages  extends CI_Controller 
{
    public function Cell_illustration()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        //$this->load->view('pages/cell_illustration_display', $data); //using the flash
        $this->load->view('pages/cell_illustration_display2', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    

    
    public function Project_20269()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/project_20269_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function About()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/about_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Past_contributors()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/past_contributors_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Help()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/help_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Press()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/press_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function License()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/license_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Assist()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/assist_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    
    public function Notification()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/notification_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Contribute()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/contribute_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    
    public function Datasets()
    {
        $data['test']="test";
        $data['category'] = "datasets";
        
         $sdatasets = file_get_contents(getcwd()."/application/json_config/datasets.json");
         $datasets = json_decode($sdatasets);
         
         $data['datasets'] = $datasets;
        
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/dataset_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Search_help()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/search_help_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Guest()
    {
        $data['test']="test";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/guest_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
}
