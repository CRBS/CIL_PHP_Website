<?php

/**
 * This class provides a helper function to form a JSON query
 * 
 * PHP version 5.6+
 * 
 * @author Willy Wong
 * @license https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt
 * @version 1.0
 * 
 */
class QueryUtil     
{
    /**
     * Get any images under these IDs.
     * 
     * @param type $ids
     * 
     */
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
