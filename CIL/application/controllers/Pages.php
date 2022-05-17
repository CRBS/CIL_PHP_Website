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
    
    public function Kinome_atlas()
    {
        /*******************Token auth********************************/
        $token = $this->input->get('token', TRUE);
        
        $data['token'] = $token;
        $imageID = "CIL_53464";
        
        $sutil = new CILServiceUtil2();
        $response = $sutil->getImage($imageID);
        $json = json_decode($response);
        
        if(is_null($json))
        {
            show_404();
            return;
        }
        
        
        if(isset($json->CIL_CCDB->Status->Token) && !is_null($json->CIL_CCDB->Status->Token))
        {
            if(strcmp($token,$json->CIL_CCDB->Status->Token)==0)
            {
                $data['token'] = $json->CIL_CCDB->Status->Token;
            }
            else 
            {
                show_404();
                return;
            }
            
        }
        
        /*******************End token auth*****************************/
        $data['test']="test";
        $data['title'] = "Kinome Atlas - Cell Image Library";
        $data['meta_desc'] = "Kinome Atlas documented representative images for 456 kinases expressed in HeLa cells, and visualized by immunofluorescence staining of the epitope tag.";
        $this->load->view('templates/cil_header4', $data);
        //$this->load->view('pages/cell_illustration_display', $data); //using the flash
        $this->load->view('pages/kinome_atlas_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    
    public function auto_chromosome_detector()
    {
        $data['title'] = "Automatic chromosome detector - Cell Image Library";
        $data['meta_desc'] = "Chromosomes are intracellular aggregates carrying genetic information in genes, which are major objects of study in biological cytogenetics. Chromosome screening is an important part of prenatal care. Manual identification is time consuming and costly (each image takes at least 15 minutes). We have developed an artificial intelligence (AI) model for the automatic chromosome detector based on metaphase cell images using deep learning technology.";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/auto_chromosome_detector_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    
    public function Cell_illustration()
    {
        $data['test']="test";
        $data['title'] = "Interactive Cells - Cell Image Library";
        $data['meta_desc'] = "The Eukaryotic Cell, Escherichia coli and Paramecium illustrations";
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
        $data['meta_desc'] = "This Image Library is a repository for images and movies of cells from a variety of organisms.";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/about_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Past_contributors()
    {
        $data['test']="test";
        $data['title'] = "Past contributors - Cell Image Library";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/past_contributors_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Help()
    {
        $data['test']="test";
        $data['title'] = "FAQs - Cell Image Library";
        $data['meta_desc'] = "The Cell seeks images from all organisms, cell types, and processes, normal and pathological.";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/help_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Press()
    {
        $data['test']="test";
        $data['title'] = "Press - Cell Image Library";
        $data['meta_desc'] = "The Cell Image Library In the News";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/press_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function License()
    {
        $data['test']="test";
        $data['title'] = "Licenses - Cell Image Library";
        $data['meta_desc'] = "The Cell offers a variety of licensing options for selection by submitters. We welcome comments and feedback on these policies.";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/license_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    public function Assist()
    {
        $data['test']="test";
        $data['title'] = "Reference Us - The Cell Image Library";
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/assist_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    
    public function Notification()
    {
        $data['test']="test";
        $data['title'] = "Notification of Use - The Cell Image Library";
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
        $data['title'] = "Datasets - Cell Image Library";
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
        $data['title'] = "Alzheimer’s disease - Cell Image Library";
        $id_array = ['50516','50517','50512','50519','50514','50518','50515','50513'];
        $index = array_rand($id_array);
        $data['animation_id'] = $id_array[$index];
        
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('pages/alzheimers_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
}
