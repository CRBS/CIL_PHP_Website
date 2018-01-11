<div class="row">
    <div class="col-md-12">
<span class="cil_title">Images of Note</span>
<?php
    //var_dump($settings->_source);
    //echo "<br/>--------------Summary--------------";
   //var_dump($summary);
   // echo "<br/>--------------End Summary--------------";
    if(isset($settings->_source->Home_page->Image_of_note))
    {
        $nimages =  $settings->_source->Home_page->Image_of_note;
        foreach($nimages as $image)
        {
             $id = "CIL_".$image;
             $title = "";
             if(isset($summary[$id]))
             {
                 $title = $summary[$id];
             }
                 
               
               // echo $summary[$id]."<br/>";
            //else
               // echo "Does not have ".$image."<br/>";
                
?>
            <!-- <a href="/images/<?php //echo $image;  ?>" alt="" class="most_popular " title="<?php //echo $title; ?>"><img width="88" height="88" alt="<?php //echo $image  ?>" src="<?php //echo $cil_image_prefix.$image; ?>/display_<?php //echo $image; ?>.png"></a> -->
            <a href="/images/<?php echo $image;  ?>" alt="" class="most_popular " title="<?php echo $title; ?>"><img width="88" height="88" alt="<?php echo $image  ?>" src="<?php echo $cil_image_prefix.$image."/".$image."_thumbnailx88.jpg"; ?>"></a>
<?php
        }
    }
?>
    </div>
</div>
