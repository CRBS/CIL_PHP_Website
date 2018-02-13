<!------------Social media javascript-------------->
<?php
        $og_title = null;
        $og_desc = null;
        $og_image = null;
        $og_url = null;
        if(isset($json->CIL_CCDB->CIL) && isset($numeric_id))
        {
            $og_title = "The Cell: An Image Library - Image CIL:".$numeric_id;
            if(isset($json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text))
            {
                $og_desc = json_encode($json->CIL_CCDB->CIL->CORE->IMAGEDESCRIPTION->free_text);
                $og_desc = htmlspecialchars($og_desc);
                if(strlen($og_desc) > 240)
                {
                    $og_desc = substr ($og_desc, 0,240)."...";

                }
            }
            if(isset($cil_data_host) &&
               isset($json->CIL_CCDB->Data_type->Video))
            {
                if($json->CIL_CCDB->Data_type->Video)
                {   
                    //$og_image = $cil_data_host."/media/videos/".$numeric_id."/".$numeric_id.".jpg";
                    $og_image = $cil_data_host."/media/thumbnail_display/".$numeric_id."/".$numeric_id."_thumbnailx512.jpg";
                }
                else
                {
                    //$og_image = $cil_data_host."/media/images/".$numeric_id."/".$numeric_id.".jpg";
                    $og_image = $cil_data_host."/media/thumbnail_display/".$numeric_id."/".$numeric_id."_thumbnailx512.jpg";
                }
            }
            
            if(isset($base_url))
            {
                $og_url = $base_url."images/".$numeric_id;
            }
        }  
?>

<div class="row">
    <div class="col-md-12">

        <div class='addthis_toolbox addthis_default_style'>
       
        <a class='addthis_button_email'></a>
        <a class='addthis_button_linkedin'></a>
        <a class='addthis_button_stumbleupon_badge' su:badge:style='4' su:badge:width='20px'></a>
        <a class='addthis_button_facebook'></a> 
        <a class='addthis_button_twitter'> <img src="/pic/twitter-icon.png" width="16px" height="16px" border="0" alt="tweet"></a> &nbsp;
        <a class='addthis_counter addthis_pill_style'></a>
        
        <script src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=orloff" type="text/javascript">
                  

        </script>
        <script type='text/javascript'>
        var addthis_config = {"data_track_clickback":true,ui_language: "en"};
        var addthis_share = {
   url: "<?php  
        if(!is_null($og_url))
           echo $og_url;
        else
           echo "http://www.cellimagelibrary.org";
   ?>",
   title: "<?php
        if(!is_null($og_title))
            echo $og_title;
        else
            echo "The Cell Image Library";
   ?>",
   description: "<?php
        if(!is_null($og_desc))
            echo $og_desc;
        else
            echo "";
   ?>",
   media: "<?php
        if(!is_null($og_image))
            echo $og_image;
        else
            echo "http://www.cellimagelibrary.org/pix/logo.jpg?1315857021";
   ?>"
};
      </script>
        </div>
    </div>
</div>             
<!------------End social media javascript-------------->
