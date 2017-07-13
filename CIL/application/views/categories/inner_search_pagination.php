<?php //echo $total; 

    $num_of_pages = intval( $total/$size );
    $remainder = $total%$size;
    if($remainder > 0)
        $num_of_pages++;
    
    //echo "Number of pages:".$num_of_pages;

?>

<ul class="pagination">
    
    <li <?php 
        if($page_num == 0)
            echo "class=\"disabled\"";
        ?>><a href="#">«</a></li>
        
    <?php
        for($i=0;$i<$num_of_pages;$i++)
        {
            if($i == $page_num)
            {
                echo "<li class=\"active\"><a href=\""."/browse/".$context_name."/".$category."/".$i."/".$size."\">".($i+1)."</a></li>";
            }
            else
            {
                echo "<li><a href=\""."/browse/".$context_name."/".$category."/".$i."/".$size."\">".($i+1)."</a></li>";
            }
        
        }
    
    ?>
    <li><a href="#">»</a></li>
</ul>   

