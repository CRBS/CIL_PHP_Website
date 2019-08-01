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
        $data['title'] = "Interactive Cells";
        $this->load->view('templates/cil_header4', $data);
        //$this->load->view('pages/cell_illustration_display', $data); //using the flash
        $this->load->view('pages/cell_illustration_display2', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    

    
    public function Project_20269()
    {
        $data['test']="test";
        $data['title']="Human U2OS cells";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/project_20269_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function About()
    {
        $data['test']="test";
        $data['title']="About";
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
        $data['title'] = "FAQs";
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
        $data['title'] = "Licenses";
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
        $data['title'] = "Notification of Use";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/notification_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Contribute()
    {
        $data['test']="test";
        $data['title'] = "Share your images - We invite you to share your images";
        $data['meta_desc'] = "We are accumulating images of all cell types from all organisms, including intracellular structures and movies or animations demonstrating functions.";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/contribute_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    
    public function Datasets()
    {
        $data['test']="test";
        $data['category'] = "datasets";
        $data['title'] = "Datasets";
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
    
    public function Alzheimers()
    {
        $data['test']="test";
        $data['title'] = "Alzheimer’s disease";
        $id_array = ['50516','50517','50512','50519','50514','50518','50515','50513'];
        $index = array_rand($id_array);
        $data['animation_id'] = $id_array[$index];
        
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/alzheimers_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
}
