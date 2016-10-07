
<h2>Licensing</h2>

<?php
    $termC = "";
    $pdMessage = "Public Domain: This image is in the public domain and thus free of any ".
            " copyright restrictions. However, as is the norm in scientific publishing and as".
            " a matter of courtesy, any user should credit the content provider for any public".
            " or private use of this image whenever possible."
            ." <a href=\"http://creativecommons.org/choose/publicdomain-3?title=&copyright_holder=\" target=\"_blank\">".
            "Learn more</a>";
    if(isset($core['TERMSANDCONDITIONS']['free_text']))
    {
        $termC= $core['TERMSANDCONDITIONS']['free_text'];
    }
    
    if(strcmp($termC,"public_domain")==0)
    {
            echo "<div class=\"row\">";
            
            echo "<div class=\"col-md-2\">";
            echo "<img src=\"/CIL/images/pd.gif\">";
            echo "</div>";
            echo "<div class=\"col-md-10\">";
            echo $pdMessage;
            
            echo "</div>";
            echo "</div>";
            
    }
?>

