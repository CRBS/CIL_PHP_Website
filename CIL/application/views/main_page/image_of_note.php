<br/>
<h2>Images of Note</h2>

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
            <!-- <a href="/images/<?php //echo $image;  ?>" alt="" class="most_popular " title="<?php //echo $title; ?>"><img width="88" height="88" alt="<?php //echo $image  ?>" src="http://www.cellimagelibrary.org/cil_ccdb/display_images/<?php //echo $image; ?>/display_<?php //echo $image; ?>.png"></a> -->
            <a href="/images/<?php echo $image;  ?>" alt="" class="most_popular " title="<?php echo $title; ?>"><img width="88" height="88" alt="<?php echo $image  ?>" src="<?php echo $cil_image_prefix.$image; ?>/display_<?php echo $image; ?>.png"></a>
<?php
        }
    }
?>


<!-- 
<a href="/images/7756" alt="cell image, cell picture,Homo sapiens,epithelial cell,permanent cell line cell,U-2 OS,microtubule cytoskeleton,actin cytoskeleton,nucleus,actin filament depolymerization" class="most_popular " title="Cell image CIL:7756 NCBI Organism: Homo sapiens Cell Types: epithelial cell,permanent cell line cell Cell Lines: U-2 OS Cellular Components: microtubule cytoskeleton,actin cytoskeleton,nucleus Biological Process: actin filament depolymerization "><img alt="88" src="http://am.celllibrary.org/ascb_il/render_thumbnail/7756/88/"></a>
<a href="/images/12607" alt="cell image, cell picture,Mesocricetus auratus,sperm,oocyte,zona pellucida,fertilization" class="most_popular " title="Cell image CIL:12607 NCBI Organism: Mesocricetus auratus Cell Types: sperm,oocyte Cellular Components: zona pellucida Biological Process: fertilization "><img alt="92" src="http://am.celllibrary.org/ascb_il/render_thumbnail/12607/92/"></a>
<a href="/images/10276" alt="cell image, cell picture,Mus musculus,fibroblast,dynamin,actin cytoskeleton,dorsal membrane ruffle,platelet-derived growth factor receptor signaling pathway,pinocytosis" class="most_popular " title="Cell image CIL:10276 NCBI Organism: Mus musculus Cell Types: fibroblast Cellular Components: dynamin,actin cytoskeleton,dorsal membrane ruffle Biological Process: platelet-derived growth factor receptor signaling pathway,pinocytosis "><img alt="90" src="http://am.celllibrary.org/ascb_il/render_thumbnail/10276/90/"></a>
<a href="/images/12329" alt="cell image, cell picture,Mus musculus,fibroblast,NIH/3T3,actin cytoskeleton,nucleus,nuclear transport factor RanBP1" class="most_popular " title="Cell image CIL:12329 NCBI Organism: Mus musculus Cell Types: fibroblast Cell Lines: NIH/3T3 Cellular Components: actin cytoskeleton,nucleus,nuclear transport factor RanBP1 "><img alt="86" src="http://am.celllibrary.org/ascb_il/render_thumbnail/12329/86/"></a>
<a href="/images/12623" alt="cell image, cell picture,Mesocricetus auratus,oocyte,cumulus cell,zona pellucida,ovulation" class="most_popular " title="Cell image CIL:12623 NCBI Organism: Mesocricetus auratus Cell Types: oocyte,cumulus cell Cellular Components: zona pellucida Biological Process: ovulation "><img alt="106" src="http://am.celllibrary.org/ascb_il/render_thumbnail/12623/106/"></a>
<a href="/images/12655" alt="cell image, cell picture,Homo sapiens,keratinocyte,focal adhesion,actin cytoskeleton,nucleus,substrate adhesion-dependent cell spreading" class="most_popular last" title="Cell image CIL:12655 NCBI Organism: Homo sapiens Cell Types: keratinocyte Cellular Components: focal adhesion,actin cytoskeleton,nucleus Biological Process: substrate adhesion-dependent cell spreading "><img alt="118" src="http://am.celllibrary.org/ascb_il/render_thumbnail/12655/118/"></a>
-->

