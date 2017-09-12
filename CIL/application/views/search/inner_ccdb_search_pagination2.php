<!-- Some modification in the code from https://github.com/jasongrimes/php-paginator -->

<?php if ($paginator->getNumPages() > 1): ?>
    <ul class="pagination">
        <?php if ($paginator->getPrevUrl()): ?>
            <li><a href="<?php //echo $paginator->getPrevUrl(); 
            $pre = intval($currentPage)-1;
            echo $urlPattern.$pre;
            
            ?>">&laquo; Previous</a></li>
        <?php endif; ?>

        <?php foreach ($paginator->getPages() as $page): ?>
            <?php if ($page['url']): ?>
                <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                    <a href="<?php //echo $page['url']; 
                    echo $urlPattern.intval($page['num']);
                    ?>"><?php echo $page['num']; ?></a>
                </li>
            <?php else: ?>
                <li class="disabled"><span><?php echo $page['num']; ?></span></li>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($paginator->getNextUrl()): ?>
            <li><a href="<?php //echo $paginator->getNextUrl(); 
                $next = intval($currentPage)+1;
                echo $urlPattern.$next;
            ?>">Next &raquo;</a></li>
        <?php endif; ?>
            
    </ul>

<?php endif; ?>


<?php 
    if ( $total > 10)
    {
?>        
<span class="pagination_per_page_label">Results per page:</span>
<div class="pagination_per_page_select">
    <select id="per_page" name="per_page" onchange="if(this.value){window.location='<?php echo $results_per_pageURL."1";  ?>&amp;per_page='+this.value;}">
    <option value="10" <?php if($size == 10) echo "selected=\"selected\""; ?>>10</option>
    <option value="20" <?php if($size == 20) echo "selected=\"selected\""; ?>>20</option>
    <option value="50" <?php if($size == 50) echo "selected=\"selected\""; ?>>50</option>
    <option value="100" <?php if($size == 100) echo "selected=\"selected\""; ?>>100</option></select>
</div>

<?php
    }
?>


<?php 
    if (false && $paginator->getNumPages() > 1)
    {
?>        
<span class="pagination_per_page_label">Results per page:</span>
<div class="pagination_per_page_select">
    <select id="per_page" name="per_page" onchange="if(this.value){window.location='?k=<?php echo $queryString;  ?>&amp;simple_search=Search&amp;per_page='+this.value;}">
    <option value="10" <?php if($size == 10) echo "selected=\"selected\""; ?>>10</option>
    <option value="20" <?php if($size == 20) echo "selected=\"selected\""; ?>>20</option>
    <option value="50" <?php if($size == 50) echo "selected=\"selected\""; ?>>50</option>
    <option value="100" <?php if($size == 100) echo "selected=\"selected\""; ?>>100</option></select>
</div>

<?php
    }
?>


