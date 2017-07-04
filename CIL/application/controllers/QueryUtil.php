<?php

class QueryUtil     
{
    public function get_ids_query($ids)
    {
        $_id["_id"]  = $ids;
        $term['terms'] = $_id;
        $query['query'] = $term;
        $squery  = json_encode($query);
        return $squery;
    }
  
}
        
    





?>
