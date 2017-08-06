<div class='biological_sources'>
<br/>
<!-- <h2>Licensing</h2> -->
<span class="cil_title2">Licensing</span>
<?php
    if(isset($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text))
    {
       if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "public_domain")==0)
       {
           
?>
            <div class="row">
                <div class="col-md-2">
                    <img src="/pic/pd.gif">
                </div>
                <div class="col-md-10">
                    <div class="licensing_details_text_container">
                    <b>Public Domain:</b> This image is in the public domain and thus free of any copyright restrictions.   However, as is the norm in scientific publishing and as a matter of courtesy, any user should credit the content provider for any public or private use of this image whenever possible.  <a href="http://creativecommons.org/choose/publicdomain-3?title=&amp;copyright_holder=" class="license_view_links" target="_blank">Learn more</a>
                    </div>
                </div>
            </div>
<?php
       }
       else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_cc_by")==0)
       {
?>
            <div class="row">
                <div class="col-md-2">
                    <img src="/pic/attribution_cc_by.png">
                </div>
                <div class="col-md-10">
                    <div class="licensing_details_text_container">
                    <b>Attribution Only:</b> This image is licensed under a Creative Commons Attribution License.  <a href="http://creativecommons.org/licenses/by/3.0" class="license_view_links" target="_blank">View License Deed</a> | <a href="http://creativecommons.org/licenses/by/3.0/legalcode" class="license_view_links" target="_blank">View Legal Code</a>
                    </div>
                </div>
            </div>

<?php
       }
       else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nc_sa")==0)
       {
?>
            <div class="row">
                <div class="col-md-3">
                    <img src="/pic/attribution_nc_sa.png">
                </div>
                <div class="licensing_details_text_container">
                <b>Attribution Non-Commercial Share Alike:</b>This image is licensed under a Creative Commons Attribution, Non-Commercial Share Alike License.  <a href="http://creativecommons.org/licenses/by-nc-sa/3.0" class="license_view_links" target="_blank">View License Deed</a> | <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode" class="license_view_links" target="_blank">View Legal Code</a>
                </div>
            </div>

<?php
       }
       else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "copyright")==0)
       {
       
?>
            <div class="row">
                <div class="col-md-1">
                    <img src="/pic/copyright.jpg" width="40px" height="40px">
                </div>
                <div class="col-md-11">
                <div class="licensing_details_text_container">
                This image is copyright protected. Any public or private use of this image is subject to prevailing copyright laws. Please contact the content provider of this image for permission requests.
                </div>
                </div>
            </div>
<?php
       }
       else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_sa")==0)
       {
?>
            <div class="row">
                <div class="col-md-2">
                    <img src="/pic/attribution_by_sa.png">
                </div>
                <div class="col-md-10">
                <div class="licensing_details_text_container">
                <b>Attribution Share Alike:</b>This image is licensed under a Creative Commons Attribution, Share Alike License.  <a href="http://creativecommons.org/licenses/by-sa/3.0" class="license_view_links" target="_blank">View License Deed</a> | <a href="http://creativecommons.org/licenses/by-sa/3.0/legalcode" class="license_view_links" target="_blank">View Legal Code</a>
                </div>
                </div>
            </div>
           
<?php 
       }
       else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nd")==0)
       {
?>          <div class="row">
                <div class="col-md-2">
                    <img src="/pic/attribution_by_nd.png">
                </div>
                <div class="col-md-10">
                <div class="licensing_details_text_container">
                <b>Attribution No Derivatives:</b>This image is licensed under a Creative Commons Attribution, No Derivatives License.  <a href="http://creativecommons.org/licenses/by-nd/3.0" class="license_view_links" target="_blank">View License Deed</a> | <a href="http://creativecommons.org/licenses/by-nd/3.0/legalcode" class="license_view_links" target="_blank">View Legal Code</a>
                </div>
                </div>
            </div>
           
  
<?php
       }
       else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nc")==0)
       {
?>  
            <div class="row">
                <div class="col-md-2">
                    <img src="/pic/attribution_by_nc.png">
                </div>
                <div class="col-md-10">
                <div class="licensing_details_text_container">
                <b>Attribution Non-Commercial:</b>This image is licensed under a Creative Commons Attribution, Non-Commercial License.  <a href="http://creativecommons.org/licenses/by-nc/3.0" class="license_view_links" target="_blank">View License Deed</a> | <a href="http://creativecommons.org/licenses/by-nc/3.0/legalcode" class="license_view_links" target="_blank">View Legal Code</a>
                </div>
                </div>
            </div>

<?php
       }
       else if(strcmp($json->CIL_CCDB->CIL->CORE->TERMSANDCONDITIONS->free_text, "attribution_nc_nd")==0)
       {
?>          
           <div class="row">
                <div class="col-md-2">
                    <img src="/pic/attribution_by_nc_nd.png">
                </div>
                <div class="col-md-10">
                <div class="licensing_details_text_container">
                <b>Attribution Non-Commercial; No Derivatives:</b>This image is licensed under a Creative Commons Attribution, Non-Commercial, No Derivatives License.  <a href="http://creativecommons.org/licenses/by-nc-nd/3.0" class="license_view_links" target="_blank">View License Deed</a> | <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/legalcode" class="license_view_links" target="_blank">View Legal Code</a>
                </div>
                </div>
            </div>
<?php           
       }
       
    } 
?>       

</div>
