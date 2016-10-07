<!-------Description--------->
<?php
    if(isset($core['IMAGEDESCRIPTION']['free_text']))
    {
?>
        <h2>Description</h2>
        <div class="description">
        <?php
            echo $core['IMAGEDESCRIPTION']['free_text'];
        ?>
        </div>
<?php
    }
?>               
<!-------End description--------->
