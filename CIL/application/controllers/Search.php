<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';

/**
 * This class is a CodeIgniter controller which performs the keyword
 * search and display the results.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class Search  extends CI_Controller 
{
    public function keywords()
    {
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $keywords = $this->input->get('keywords', TRUE);
        $queryString = urlencode($keywords);
        
        //$searchPrefix = $this->config->item('data_search_url');
        //$searchPostfix = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND";
        //$searchURL = $searchPrefix."?q=".$queryString.$searchPostfix;
        $searchPrefix = $this->config->item('apiDocPrefix');
        $searchPostfix = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND";
        $searchURL = $searchPrefix."?search=".$queryString.$searchPostfix;

        echo $searchURL;
        
        
        
        
        
        
        //$response = $sutil->just_curl_get($searchURL);
        $response = $sutil->curl_get($searchURL);
        
        echo $response;
        $data['test'] = 'test';
        $this->load->view('templates/cil_header4', $data);
        
        
        
        $this->load->view('/search/search_results', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
}


?>


