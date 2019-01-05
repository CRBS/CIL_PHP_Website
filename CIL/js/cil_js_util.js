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

function trackDownload(obj,id,size)
{
    //alert("ID:"+id);
    //alert('trackDownload size:'+size);
    //alert(obj.href);
    var data = "{\"Ip_address\":\""+ip_address+"\",\"ID\":\""+id+"\",\"URL\":\""+obj.href+"\",\"Size\":\""+size+"\"}";
    
    $.post('/CIL_Download_Service/track_download', data, function(returnedData) {
    // do something here with the returnedData
    //console.log(returnedData);
    })
    .error(function() { 
   //alert("error"); 
    });
    
}

function trackImageViewerClick(id)
{
    var data = "{\"Ip_address\":\""+ip_address+"\",\"ID\":\""+id+"\"}";
    $.post('/CIL_Download_Service/track_image_viewer', data, function(returnedData) {
    //console.log(returnedData);
    })
    .error(function() { 
   //alert("error"); 
    });
}


function openPopupAndTrack(url,id) {
        trackImageViewerClick(id);
	owindow = window.open(url, 'anew', config = 'height=600,width=1000,left=50,top=50,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');
	if (!owindow.closed) owindow.focus();
	return false;
}
