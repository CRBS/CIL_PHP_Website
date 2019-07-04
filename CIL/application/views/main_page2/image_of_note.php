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
                 
?>
            <a href="/images/<?php echo $image;  ?>" alt="<?php echo $title;  ?>" class="most_popular " title="<?php echo $title; ?>"><img width="88" height="88" alt="<?php echo $title;  ?>" src="<?php echo $cil_image_prefix.$image."/".$image."_thumbnailx88.jpg"; ?>"></a>
<?php
        }
    }
?>
    </div>
</div>
