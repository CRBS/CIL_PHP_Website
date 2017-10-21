<?php

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
    
    
    function generateEsQuery($model)
    {
        $main = array();
        $queryOuter = array();
        
        $query_string = array();
        
        $qstring = "(CIL_CCDB.Status.Is_public:true AND CIL_CCDB.Status.Deleted:false)";
        if(!is_null($model->k))
        {
            $qstring = $qstring." AND (".$model->k.")";
        }
        
        if(!is_null($model->still))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Still_image:true)";
        }
        
        if(!is_null($model->video))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Video:true)";
        }
        
        if(!is_null($model->zstack))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Z_stack:true)";
        }
        
        if(!is_null($model->time))
        {
            $qstring = $qstring." AND (CIL_CCDB.Data_type.Time_series:true)";
        }
        
        
        $query_string['query'] = $qstring;
        $queryOuter['query_string'] = $query_string;
        $main['query'] = $queryOuter;
        return json_encode($main);
    }

    
}

