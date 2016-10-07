<!-------Technical details--------->
<?php
    if(isset($core['TECHNICALDETAILS']['free_text']))
    {
        
?>
        <h2>Technical Details</h2>
        <div class="description">
        <?php

            echo $core['TECHNICALDETAILS']['free_text'];
        ?>
        </div>
<?php
    }
?>
<!-------End Technical details--------->
