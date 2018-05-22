<?php
/**
 * This class is for redirecting all old ccdb urls to the new CIL urls
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class Sand  extends CI_Controller 
{
    public function main()
    {
        $this->load->helper('url');
        $mpid = $this->input->get('mpid', TRUE);
        $keyword = $this->input->get('keyword', TRUE);
        if(!is_null($mpid) && is_numeric($mpid))
        {
            $url = $this->config->item('base_url')."/images/CCDB_".$mpid;
            redirect($url);
            return;
        }
        else if(!is_null($keyword))
        {
            ///images?k=Maryann Martone&simple_search=Search
            $keyword = urlencode($keyword);
            $url = $this->config->item('base_url').
                   "/images?k=".$keyword."&simple_search=Search";
            redirect($url);
            return;
        }
        else
        {
            show_404();
        }
    }
    
}

