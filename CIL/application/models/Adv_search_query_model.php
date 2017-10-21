<?php

class Adv_search_query_model extends CI_Model {

    public $k;
    public $still;
    public $video;
    public $zstack;
    public $time; 
        
    public function print_model()
    {
        echo "<br/>-----------------Params----------------------";
        echo "<br/>k:".$this->k;
        echo "<br/>still:".$this->still;
        echo "<br/>video:".$this->video;
        echo "<br/>zstack:".$this->zstack;
        echo "<br/>time:".$this->time;
        echo "<br/>-----------------End Params----------------------";
    }
    
    
}
