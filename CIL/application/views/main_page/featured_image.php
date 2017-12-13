
<!-- <h2>Featured Image</h2> -->
<span class="cil_title2">Featured Image</span>
<?php

    //if($featured_has_video)
    
    if(isset($featured_image))
    {
        if(isset($featured_image->CIL_CCDB->Data_type->Video) 
                && $featured_image->CIL_CCDB->Data_type->Video
                && isset($cil_data_host)
                && isset($featured_id))
        {
?>
           <video  width="300px" height="200px" controls autoplay loop>
                <source src="<?php echo $cil_data_host; ?>/media/videos/<?php echo $featured_id; ?>/<?php echo $featured_id; ?>_web.mp4" type="video/mp4">
           </video>

<?php
        }
        else if(isset($featured_image->CIL_CCDB->Data_type->Video) 
                && !$featured_image->CIL_CCDB->Data_type->Video
                && isset($cil_data_host)
                && isset($featured_id)
                && isset($cil_image_prefix))
        {
?>
            <center>
                <a href="/images/<?php echo $featured_id; ?>" target="_self">
                <img width="200px" height="200px" src="<?php echo $cil_image_prefix."/".$featured_id; ?>/display_<?php echo $featured_id; ?>.png"  />
                </a>
            </center>
<?php
        }
    }

    
?>





<div class="featured_image_toolbar">
<div class="featured_image_left_div">
<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.cellimagelibrary.org&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowtransparency="true"></iframe>
</div>
</div>
<div class="featured_image_description ">
<p class="cil_black_font"><?php   
    /*if(!is_null($featured_info))
    {
        if(isset($featured_info->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text))
        {
            $desc =  $featured_info->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text;
            $length = strlen($desc);
            if($length > 300)
            {
                $desc = substr($desc, 0, 300)."...";
            }
            echo $desc;
        }
        
        
    } */
    if(isset($featured_image))
    {
        if(isset($featured_image->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text))
        {
            $desc =  $featured_image->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text;
            $length = strlen($desc);
            if($length > 300)
            {
                $desc = substr($desc, 0, 300)."...";
            }
            echo $desc;
        }
        
        
    }

?><a href="/images/<?php if(isset($featured_id)) echo $featured_id; ?>" id="featured_image_more">more</a></p>
<br/>
<p class="cil_black_font">
<em>
 <!-- Brad J. Marsh; Kathryn E. Howell -->
<?php
    if(isset($featured_image->CIL_CCDB->CIL->CORE->ATTRIBUTION->Contributors))
    {
        echo "Image contributed by ";
        $cont = $featured_image->CIL_CCDB->CIL->CORE->ATTRIBUTION->Contributors;
        foreach ($cont as $con)
        {
            echo $con.";";
        }
    }

?>
</em>
</p>
</div> 


