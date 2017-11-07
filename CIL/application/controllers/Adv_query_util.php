<?php
require_once 'CILServiceUtil2.php';
class Adv_query_util
{
    function handleText($model,$input,$key)
    {
        $temp = $input->get($key,TRUE);
        if(!is_null($temp))
        {
            $temp = trim($temp);
            if(strlen($temp) > 0)
            {
                $model->{$key} = $temp;
            }
        }
    }
    
    function handleTextWithAltName($model,$input,$model_name,$key)
    {
        $temp = $input->get($key,TRUE);
        if(!is_null($temp))
        {
            $temp = trim($temp);
            if(strlen($temp) > 0)
            {
                $model->{$model_name} = $temp;
            }
        }
    }
    
    
    function handleBoolean($model,$input,$key)
    {
        $temp = $input->get($key,TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $model->{$key} = true;
            }
        }
    }
    
    function handleYesOrNo($model,$input,$yes_key, $no_key)
    {
        $temp = $input->get($yes_key,TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $model->{$yes_key} = true;
            }
        }
        
        $temp = $input->get($no_key,TRUE);
        if(!is_null($temp))
        {
            if(strcmp($temp, strtolower("true"))==0)
            {
                $model->{$yes_key} = false;
            }
        }
    }
    
    
    
    function generateEsQuery($model)
    {
        $CI = CI_Controller::get_instance();
        $qmax = $CI->config->item('max_number_of_query_conditions');
        $count = 0;
        
        $main = array();
        $queryOuter = array();
        
        $query_string = array();
        
        $qstring = "(CIL_CCDB.Status.Is_public:true AND CIL_CCDB.Status.Deleted:false)";
        if(!is_null($model->k))
        {
            $qstring = $qstring." AND (".$model->k.")";
            $count++;
        }
        
        if(!is_null($model->still))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Still_image:true)";
            $count++;
        }
        
        if(!is_null($model->video))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Video:true)";
            $count++;
        }
        
        if(!is_null($model->zstack))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Z_stack:true)";
            $count++;
        }
        
        if(!is_null($model->time))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Time_series:true)";
            $count++;
        }
        
        if(!is_null($model->grouped) && $model->grouped)
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.GROUP_ID:*)";
            $count++;
        }
        else if(!is_null($model->grouped) && !$model->grouped)
        {
            $qstring = $qstring." AND !(CIL_CCDB.CIL.CORE.GROUP_ID:*)";
            $count++;
        }
        
        if(!is_null($model->computable) && $model->computable)
        {
            $qstring = $qstring. "AND (CIL_CCDB.CIL.CORE.DATAQUALIFICATION.free_text:PROCESSED*)";
            $count++;
        }
        else if(!is_null($model->computable) && !$model->computable)
        {
            $qstring = $qstring. "AND !(CIL_CCDB.CIL.CORE.DATAQUALIFICATION.free_text:PROCESSED*)";
            $count++;
        }
        
        if(!is_null($model->public_domain))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:public_domain)";
            $count++;
        }
        
        if(!is_null($model->attribution_cc))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:attribution_cc*)";
            $count++;
        }
        
        if(!is_null($model->attribution_nc_sa))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:attribution_nc*)";
            $count++;
        }
        
        if(!is_null($model->copyright))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:copyright*)";
            $count++;
        }
        
        if(!is_null($model->image_search_parms_biological_process) && 
                strlen(trim($model->image_search_parms_biological_process))> 0)
        {
            $array = $this->handleExpansion('biological_processes',$model->image_search_parms_biological_process);
            $rarray = $this->handleResultArray($qstring, $array, 
                    $model->image_search_parms_biological_process,$count,$qmax);
            $count = $rarray['count'];
            $qstring = $rarray['qstring'];

        }
        
        if(!is_null($model->image_search_parms_cell_type) && 
                strlen(trim($model->image_search_parms_cell_type))> 0)
        {
            $array = $this->handleExpansion('cell_types',$model->image_search_parms_cell_type);
            $rarray = $this->handleResultArray($qstring, $array, 
                    $model->image_search_parms_cell_type,$count,$qmax);
            $count = $rarray['count'];
            $qstring = $rarray['qstring'];

        } 
        
        if(!is_null($model->image_search_parms_cell_line) && 
                strlen(trim($model->image_search_parms_cell_line))> 0)
        {
            $array = $this->handleExpansion('cell_lines',$model->image_search_parms_cell_line);
            $rarray = $this->handleResultArray($qstring, $array, 
                    $model->image_search_parms_cell_line,$count,$qmax);
            $count = $rarray['count'];
            $qstring = $rarray['qstring'];

        } 
        
        if(!is_null($model->image_search_parms_foundational_model_anatomy) && 
                strlen(trim($model->image_search_parms_foundational_model_anatomy))> 0)
        {
            $array = $this->handleExpansion('anatomical_entities',$model->image_search_parms_foundational_model_anatomy);
            $rarray = $this->handleResultArray($qstring, $array, 
                    $model->image_search_parms_foundational_model_anatomy,$count,$qmax);
            $count = $rarray['count'];
            $qstring = $rarray['qstring'];

        } 
        
        if(!is_null($model->image_search_parms_cellular_component) && 
                strlen(trim($model->image_search_parms_cellular_component))> 0)
        {
            $array = $this->handleExpansion('cellular_components',$model->image_search_parms_cellular_component);
            $rarray = $this->handleResultArray($qstring, $array, 
                    $model->image_search_parms_cellular_component,$count,$qmax);
            $count = $rarray['count'];
            $qstring = $rarray['qstring'];

        } 
        
        $query_string['query'] = $qstring;
        $queryOuter['query_string'] = $query_string;
        $main['query'] = $queryOuter;
        return json_encode($main);
    }
    
    private function handleResultArray($qstring,$array,$value,$rcount,$qmax)
    {
        if(count($array) > 0)
        {
                $qstring = $qstring." AND (";
                $conditions = "";
                $count = count($array);
                for($i=0;$i<$count;$i++)
                {

                    $conditions = $conditions." \"".$array[$i]."\" ";
                    
                    $rcount++;
                    if($rcount >= $qmax)
                        break;
                    
                    if($i+1 < $count)
                      $conditions = $conditions." OR ";
                    
                }
                $qstring = $qstring.$conditions;
                $qstring = $qstring.")";
        }
        else 
        {
            $qstring = $qstring." AND (".$value.")";
        }
        $array = array();
        $array['count'] = $rcount;
        $array['qstring'] = $qstring;
        
        //return $qstring;
        return $array;
        
    }

    private function handleExpansion($type, $value)
    {
        $array = array();
        //$json = $this->simpleOntologyExpansion('biological_processes', 'Name', $value,1);
        $json = $this->simpleOntologyExpansion($type, 'Name', $value,1);
        if(!is_null($json) && $json->hits->total > 0)
        {
            $result = $json->hits->hits[0];
            if(!isset($result->_source->Expansion->Terms))
                return $array();
            $terms = $result->_source->Expansion->Terms;
            
            foreach($terms as $term)
            {
                if(isset($term->Onto_id))
                    array_push($array, $term->Onto_id);
            }
            
        }
        else if(!is_null($json) && $json->hits->total == 0)
        {
            $json2 = $this->simpleOntologyExpansion($type, 'Synonyms', $value,10);
            if(!is_null($json2) && $json2->hits->total > 0)
            {
                $hits = $json2->hits->hits;
                echo "<br/>Synonyms total:".$json2->hits->total;
                foreach($hits as $result)
                {
                    echo "<br/>Synonyms result!!";
                    if(!isset($result->_source->Expansion->Terms))
                        continue;
                    $terms = $result->_source->Expansion->Terms;
                    foreach($terms as $term)
                    {
                        if(isset($term->Onto_id))
                            array_push($array, $term->Onto_id);
                    }
                }
            }
        }
        
        
        return $array;
    }
    
    
    private function simpleOntologyExpansion($type,$field,$search_value,$size)
    {
        $search_value = str_replace(" ", "%20", $search_value);
        $sutil = new CILServiceUtil2();
        $CI = CI_Controller::get_instance();
        $url = $CI->config->item('simple_ontology_expansion_prefix')."/".$type."/".$field."/".$search_value."?size=".$size;
        echo "<br/>".$url;
        
        $response = $sutil->curl_get($url);
        $json = json_decode($response);
        return $json;
    }
}

