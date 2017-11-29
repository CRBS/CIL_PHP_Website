
<!-- <h2>Featured Image</h2> -->
<span class="cil_title2">Featured Image</span>
<?php

    if($featured_has_video)
    {
?>

<div id="featured_image_flowplayer">
<!--    <center>
<a href="<?php echo $featured_video_url;  ?>" id="player" style="display:block;width:300px;height:200px">
    <object width="100%" height="100%" id="player_api" name="player_api" data="/swf/flowplayer-3.2.5.swf?0.9740970324198512" type="application/x-shockwave-flash">
        <param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always">
        <param name="quality" value="high"><param name="cachebusting" value="true">
        <param name="bgcolor" value="#000000">
        <param name="flashvars" value="config={&quot;clip&quot;:{&quot;scaling&quot;:&quot;orig&quot;,&quot;autoPlay&quot;:true,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;/videos/8062.flv&quot;},&quot;playerId&quot;:&quot;player&quot;,&quot;playlist&quot;:[{&quot;scaling&quot;:&quot;orig&quot;,&quot;autoPlay&quot;:true,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;/videos/<?php //echo $featured_id; ?>.flv&quot;}]}"></object> 
</a></center>
    <script type="text/javascript" language="javascript">flowplayer("player", "/swf/flowplayer-3.2.5.swf", { clip:{scaling: "orig", onBeforeFinish: function() { return false; }, autoPlay:true, autoBuffering:true}});</script> -->
    <video  width="300px" height="200px" controls autoplay loop>
        <!-- <source src="/videos/8062.mp4" type="video/mp4"> -->
        <source src="https://cildata.crbs.ucsd.edu/videos/8062.mp4" type="video/mp4">
    </video>
</div>


<!-- <div id="featured_image_flowplayer">
    <center>
<a href="http://www.cellimagelibrary.org/videos/8062.flv" id="player" style="display:block;width:300px;height:200px">
    <object width="100%" height="100%" id="player_api" name="player_api" data="http://www.cellimagelibrary.org/flowplayer-3.2.5.swf?0.9740970324198512" type="application/x-shockwave-flash">
        <param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always">
        <param name="quality" value="high"><param name="cachebusting" value="true">
        <param name="bgcolor" value="#000000">
        <param name="flashvars" value="config={&quot;clip&quot;:{&quot;scaling&quot;:&quot;orig&quot;,&quot;autoPlay&quot;:true,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;/videos/8062.flv&quot;},&quot;playerId&quot;:&quot;player&quot;,&quot;playlist&quot;:[{&quot;scaling&quot;:&quot;orig&quot;,&quot;autoPlay&quot;:true,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;/videos/8062.flv&quot;}]}"></object>
</a></center>
    <script type="text/javascript" language="javascript">flowplayer("player", "http://www.cellimagelibrary.org/flowplayer-3.2.5.swf", { clip:{scaling: "orig", onBeforeFinish: function() { return false; }, autoPlay:true, autoBuffering:true}});</script>
</div> -->

<?php
    }
?>




<div class="featured_image_toolbar">
<div class="featured_image_left_div">
<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.cellimagelibrary.org&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowtransparency="true"></iframe>
</div>
</div>
<div class="featured_image_description ">
<p class="cil_black_font"><?php   
    if(!is_null($featured_info))
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
        
        
    }

?><a href="/images/<?php echo $featured_id; ?>" id="featured_image_more">more</a></p>
<br/>
<p class="cil_black_font">
<em>
 <!-- Brad J. Marsh; Kathryn E. Howell -->
<?php
    if(isset($featured_info->CIL_CCDB->CIL->CORE->ATTRIBUTION->Contributors))
    {
        echo "Image contributed by ";
        $cont = $featured_info->CIL_CCDB->CIL->CORE->ATTRIBUTION->Contributors;
        foreach ($cont as $con)
        {
            echo $con.";";
        }
    }

?>
</em>
</p>
</div> 


