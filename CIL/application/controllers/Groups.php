<?php

require_once 'CILServiceUtil2.php';
require_once 'GeneralUtil.php';
require_once 'Paginator.php';
require_once 'Adv_query_util.php';
require_once 'QueryUtil.php';


/**
 * This class is a CodeIgniter controller which retrieves a list of images
 * in a particular group. The input parameter is any image ID that belongs
 * to a group.
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class Groups extends CI_Controller 
{
    public function view($imageID)
    {
        $sutil = new CILServiceUtil2();
        $gutil = new GeneralUtil();
        $qutil = new QueryUtil();
        $response = $sutil->getGroupInfo($imageID);
        $response = $gutil->handleResponse($response);
        $data['cil_image_prefix'] = $this->config->item('cil_image_prefix');
        $data['ccdb_image_prefix'] = $this->config->item('ccdb_image_prefix');
        
        //echo $response;
        $page = 0;
        $size = 100;
        
        $temp = $this->input->get('page',TRUE);
        if(!is_null($temp))
        {
            $page = intval($temp);
            $page = $page-1;
            //echo "---------page after:".$page."<br/>";
            if($page < 0)
                $page = 0;
        }
        
        $temp = $this->input->get('per_page',TRUE);
        if(!is_null($temp))
        {
            $size = intval($temp);
            if($size < 0)
                $size = 10;
        }
        $from = $page*$size;
        
        
        $json = json_decode($response);
        $squery = "";
        if(isset($json->hits->total) && $json->hits->total > 0 &&
                isset($json->hits->hits))
        {
            $hits = $json->hits->hits;
            if(isset($hits[0]->_source->Group->Group_members))
            {
                $members = $hits[0]->_source->Group->Group_members;
                $images = array();
                foreach($members as $member)
                {
                    //echo "<br/>".$member;
                    array_push($images, "CIL_".$member);
                }
                
                $squery = $qutil->get_ids_query($images);
                //echo "<br/>".$squery;
                $response = $sutil->getImagesByIDs($squery,$from, $size);
                //echo "<br/>".$response;
                $result = json_decode($response);
                $data['result'] = $result;
            }
            
            
        }
        
        $data['title'] = 'The Cell Image Library';
        $this->load->view('templates/cil_header4', $data);
        $this->load->view('groups/group_result_display', $data);
        $this->load->view('templates/cil_footer2', $data);
    }
    
    
}



?>


