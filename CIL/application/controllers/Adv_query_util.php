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
        
        if(!is_null($model->grouped) && $model->grouped)
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.GROUP_ID:*)";
        }
        else if(!is_null($model->grouped) && !$model->grouped)
        {
            $qstring = $qstring." AND !(CIL_CCDB.CIL.CORE.GROUP_ID:*)";
        }
        
        if(!is_null($model->computable) && $model->computable)
        {
            $qstring = $qstring. "AND (CIL_CCDB.CIL.CORE.DATAQUALIFICATION.free_text:PROCESSED*)";
        }
        else if(!is_null($model->computable) && !$model->computable)
        {
            $qstring = $qstring. "AND !(CIL_CCDB.CIL.CORE.DATAQUALIFICATION.free_text:PROCESSED*)";
        }
        
        if(!is_null($model->public_domain))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:public_domain)";
        }
        
        if(!is_null($model->attribution_cc))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:attribution_cc*)";
        }
        
        if(!is_null($model->attribution_nc_sa))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:attribution_nc*)";
        }
        
        if(!is_null($model->copyright))
        {
            $qstring = $qstring." AND (CIL_CCDB.CIL.CORE.TERMSANDCONDITIONS.free_text:copyright*)";
        }
        
        
        $query_string['query'] = $qstring;
        $queryOuter['query_string'] = $query_string;
        $main['query'] = $queryOuter;
        return json_encode($main);
    }

    
}

