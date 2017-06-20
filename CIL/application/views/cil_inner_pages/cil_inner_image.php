<div class="row">
    <div class="col-md-12">
        <center>
        <img src="http://www.cellimagelibrary.org/cil_ccdb/images/<?php echo $numeric_id;   ?>/<?php echo $numeric_id;   ?>.jpg" width="100%" class="img-thumbnail pull-right"/>
        </center>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class='download'>
        <div class='download_menu_div' onmouseout="document.getElementById('ITEMS').style.display='none'" onmouseover="document.getElementById('ITEMS').style.display='block'">
        <a class='dropdown_button mini' href='#download_options_button' name='download_options_button'>Image Data Download Options...</a>
        <div class='download_options_container' id='ITEMS' onmouseout="this.style.display='none'" onmouseover="this.style.display='block'">
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='download_jpeg/2.jpg'>Download in JPEG format</a>
        </div>
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='http://grackle.crbs.ucsd.edu:8080/OmeroWebService/images/2.tif'>Download in OME-TIF format</a>
        </div>
        <div class='download_option' onmouseout="this.style.backgroundColor='#8dc63f'" onmouseover="this.style.backgroundColor='#d2ebaf'">
        <a class='download_menu_anchor' href='http://grackle.crbs.ucsd.edu:8080/OmeroWebService/images/2.raw'>Download Submitted Data (3.8 MB)</a>
        </div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <span class="pull-right"><a class="button mini" href="#" onclick="openPopup('http://am.celllibrary.org/ascb_il/full_viewer/2'); return false;">Open Detailed Viewer</a></span>
    </div>
</div>