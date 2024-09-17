<div class="container">
   
    <div class="row">
        <div class="col-md-12 cil_16_font_black">
            These articles either store their data in the CIL for re-use by the community, or extract and re-analyze data from the CIL or contain a substantive discussion about the CIL as a biological database. 
        </div><hr>
        <?php 
            //echo getcwd();
            $path = getcwd()."/application/views/pages";
            $cil_b_json_str = file_get_contents($path."/cil_biological_db.json");
            $cil_bjson = json_decode($cil_b_json_str);
            if(!is_null($cil_bjson))
            {
                $index = 1;
                foreach($cil_bjson as $item)
                {
        ?>
        <div class="col-md-12 cil_12_no_color">
           <!--  1) Abreu-Blanco, Maria Teresa, James J. Watts, Jeffrey M. Verboon, and Susan M. Parkhurst. "Cytoskeleton responses in wound repair." Cellular and Molecular Life Sciences 69, no. 15 (2012): 2469-2483. -->
           <?php 
                echo "\n".$index.") ".$item."\n<hr>"; 
                $index++;
           ?>
           
        </div>
        
        <?php
                }
            } 
        ?>
    </div>
</div>

