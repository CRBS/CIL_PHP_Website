function setCookie(cname, cvalue, exdays) 
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function openOrCloseImagingMethods() 
{
    var x = document.getElementById("ImagingMethods");
    if (x.style.display === "none") 
    {
        x.style.display = "block";
        document.getElementById("ImagingMethodsShowOptionsLink").innerHTML = "Hide options";
    } 
    else 
    {
        x.style.display = "none";
        document.getElementById("ImagingMethodsShowOptionsLink").innerHTML = "Show options";
    }
}

function openOrCloseAnatomy()
{
    var x = document.getElementById("Anatomy");
    if (x.style.display === "none") 
    {
        x.style.display = "block";
        document.getElementById("anatomyShowOptionsLink").innerHTML = "Hide options";
    } 
    else 
    {
        x.style.display = "none";
        document.getElementById("anatomyShowOptionsLink").innerHTML = "Show options";
    }
    
}