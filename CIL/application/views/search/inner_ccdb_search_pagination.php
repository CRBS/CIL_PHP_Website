<?php //echo $total; 

    $num_of_pages = intval( $total/$size );
    $remainder = $total%$size;
    if($remainder > 0)
        $num_of_pages++;
    
    //echo "Number of pages:".$num_of_pages;

?>
<?php 
    if($total > 10)
    {
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
                echo "<li class=\"active\"><a href=\""."/images?k=".$keywords."&page=".($i+1)."&simple_search=Search"."\">".($i+1)."</a></li>";
            }
            else
            {
                echo "<li><a href=\""."/images?k=".$keywords."&page=".($i+1)."&simple_search=Search"."\">".($i+1)."</a></li>";
            }
        
        }
    
    ?>
    <li><a href="#">»</a></li>
</ul>
<?php
    }
?>