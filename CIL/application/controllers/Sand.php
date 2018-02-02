<?php
/**
 * This class is for redirecting all old ccdb urls to the new CIL urls
 * 
 */
class Sand  extends CI_Controller 
{
    public function main()
    {
        $this->load->helper('url');
        $mpid = $this->input->get('mpid', TRUE);
        if(!is_null($mpid) && is_numeric($mpid))
        {
            $url = $this->config->item('base_url')."/images/CCDB_".$mpid;
            redirect($url);
            return;
        }
        else
        {
            show_404();
        }
    }
    
}

