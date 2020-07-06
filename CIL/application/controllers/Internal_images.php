<?php
require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';
require_once 'Adv_query_util.php';

class Internal_images  extends CI_Controller 
{
    public function view($image_id)
    {
        $data['base_url'] = $this->config->base_url();
        $data['download_prefix'] = $this->config->item('download_server_prefix');
        $data['ccdb_direct_data_prefix'] = $this->config->item('ccdb_direct_data_prefix');
        $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
        $data['ccdb_image_prefix'] = $this->config->item('ccdb_image_prefix');
        $data['cil_data_host'] = $this->config->item('cil_data_host');
        $data['enable_cdeep3m'] = $this->config->item('enable_cdeep3m');
        $data['image_viewer_prefix'] = $this->config->item('image_viewer_prefix');
        $data['local_image_display'] = $this->config->item('local_image_display');
        $service_api_host = $this->config->item('service_api_host');
        $username = $this->input->get('username',TRUE);
        $token = $this->input->get('token',TRUE);
        $cutil = new CILServiceUtil2();
        if(is_null($username) || is_null($token))
        {
            show_404();
            return;
        }
        
        $url = $service_api_host."/Internal_data_rest/is_correct_token/".$username."/".$token;
        $json_str = $cutil->curl_get($url);
        if(is_null($json_str))
        {
            show_404();
            return;
        }
        $json = json_decode($json_str);
        if(is_null($json))
        {
            show_404();
            return;
        }
        
        if(!$json->is_correct_token)
        {
            echo "You don't have permission to access this data";
            return;
        }
        
        
        
        
        $numeric_id = str_replace("CIL_", "", $image_id);
        $numeric_id = intval($numeric_id);
        
        
        $url = $service_api_host."/Internal_data_rest/metadata/".$image_id;
        //echo "<br/>".$url;
        $json_str = $cutil->curl_get($url);
        if(is_null($json_str))
        {
            echo "Cannot find your data";
            return;
        }
        //echo "<br/>".$json_str;
        
        $json = json_decode($json_str);
        $data['json'] = $json;
        $data['numeric_id'] = $numeric_id;
        $data['title'] = $image_id." ".$json->CIL_CCDB->Citation->Title;
        $data['meta_desc'] = 'Cell Image Library';
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('cil_image_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
}

