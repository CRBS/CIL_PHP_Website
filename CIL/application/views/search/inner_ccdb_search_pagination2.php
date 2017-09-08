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