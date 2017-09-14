function SearchByDataTypeFilter(base_url, queryString)
{
    
    //alert('SearchByDataTypeFilter');
    var refresh_still = document.getElementById('refresh_still').checked;
    var refresh_video = document.getElementById('refresh_video').checked;
    var refresh_zstack = document.getElementById('refresh_zstack').checked;
    var refresh_time = document.getElementById('refresh_time').checked;
    
    //if(!refresh_still && !refresh_video && !refresh_zstack && !refresh_time)
    //    return;
    
    /*var status = "refresh_still:"+refresh_still+"\n"+
                "refresh_video:"+refresh_video+"\n"+
                "refresh_zstack:"+refresh_zstack+"\n"+
                "refresh_time:"+refresh_time;
    alert(status);*/
    var search_url = base_url+"/images?k="+queryString;
   
    if(refresh_still)
    {
        search_url = search_url+"&basic_still=true";
        
    }
    
    if(refresh_video)
    {
        search_url = search_url+"&basic_video=true";
        
    }
    
    if(refresh_zstack)
    {
        
        search_url = search_url+"&basic_zstack=true";
        
    }
    
    if(refresh_time)
    {
        search_url = search_url+"&basic_time=true";
    }
    
    
    search_url = search_url+"&simple_search=Search";
    window.location = search_url;
    //alert(search_url);

}


