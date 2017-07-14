<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
class Search  extends CI_Controller 
{
    public function keywords()
    {
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        
        $keywords = $this->input->get('keywords', TRUE);
        $queryString = urlencode($keywords);
        
        $searchPrefix = $this->config->item('data_search_url');
        $searchPostfix = "+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND";
        
        $searchURL = $searchPrefix."?q=".$queryString.$searchPostfix;
        //echo $searchURL;
        $response = $sutil->just_curl_get($searchURL);
        echo $response;
        $data['test'] = 'test';
        $this->load->view('templates/cil_header4', $data);
        
        
        
        $this->load->view('/search/search_results', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
}

http://search-elastic-cil-tetapevux3gwwhdcbbrx4zjzhm.us-west-2.es.amazonaws.com/ccdbv7/data/_search?q=purkinje+CIL_CCDB.Status.Is_public:true+CIL_CCDB.Status.Deleted:false&default_operator=AND
?>


