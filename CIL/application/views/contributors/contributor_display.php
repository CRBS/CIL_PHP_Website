<?php

//var_dump($contributors);


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span class="cil_title2">Image Contributors to The Cell</span>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="caption">
                <a href="">test</a>
            </div>
        </div>
    </div> -->
<?php

      $array =  $contributors->Contributors;
      $count = count($array);
      $i=0;
      //echo "COUNT:".$count;
      //$count = 10;
      while($i < $count)
      {
          
?>
     <div class="row top-buffer">
        <div class="col-md-3">
         <?php
            if($i < $count)
            {
                $contributor = $array[$i];
                $url = "/images?k=".urlencode($contributor->Full_name)."&simple_search=Search";
                echo "<p class=\"contributor\"><a href=\"".$url."\" target=\"_self\">".$contributor->Full_name." (".$contributor->Count.")" ."</a></p>";
                $i++;
                
            } 
         ?>
        </div>
         <div class="col-md-3">
         <?php
            if($i < $count)
            {
                $contributor = $array[$i];
                $url = "/images?k=".urlencode($contributor->Full_name)."&simple_search=Search";
                echo "<p class=\"contributor\"><a href=\"".$url."\" target=\"_self\">".$contributor->Full_name." (".$contributor->Count.")" ."</a></p>";
                $i++;
                
            } 
         ?>
        </div>
         <div class="col-md-3">
         <?php
            if($i < $count)
            {
                $contributor = $array[$i];
                $url = "/images?k=".urlencode($contributor->Full_name)."&simple_search=Search";
                echo "<p class=\"contributor\"><a href=\"".$url."\" target=\"_self\">".$contributor->Full_name." (".$contributor->Count.")" ."</a></p>";
                $i++;
                
            } 
         ?>
        </div>
         <div class="col-md-3">
        <?php
            if($i < $count)
            {
                $contributor = $array[$i];
                $url = "/images?k=".urlencode($contributor->Full_name)."&simple_search=Search";
                echo "<p class=\"contributor\"><a href=\"".$url."\" target=\"_self\">".$contributor->Full_name." (".$contributor->Count.")" ."</a></p>";
                $i++;
                
            } 
         ?>
        </div>
        
     </div>
<?php
      }
      
?>
    
</div>
