function pageload(page,div){
    var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";
	//alert (site+page);
    $.ajax({
		
		url: site+page, 
		
        beforeSend: function(){
			$(div).html(image_load);
        },
        success: function(response){
            $(div).html(response);
        },
		error:function (xhr, ajaxOptions, thrownError){
             $(div).html(xhr.status+" - - "+thrownError);     
		},
        dataType:"html"  		
    });
    return false;
}

function windowload(page,div){
   	var url = site+page;
	//alert (url);
	window.open(url);
}


function loaddummy(page,div){
    var image_load = "<div class='ajax_loading'><img src='../back/js/"+loading_image_large+"' /></div>";
	//alert (site+page);
    $.ajax({
		
		url: site+page, 
		
        success: function(response){
            $(div).html(response);
        },
		error:function (xhr, ajaxOptions, thrownError){
             $(div).html(xhr.status+" - - "+thrownError);     
		},
        dataType:"html"  		
    });
    return false;
}


function send_form_loading(formObj,action,responseDIV)
{
    var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";
    $.ajax({
        url: site+action, 
		//url: action, 
        data: $(formObj.elements).serialize(),
        beforeSend: function(){
            $(responseDIV).html(image_load);
        },
        success: function(response){
                $(responseDIV).html(response);
            },
        type: "post", 
        dataType: "html"
    }); 
    return false;
}



function send_form(formObj,action)
{
    var image_load = "<div class='ajax_loading'><img src='../back/js/"+loading_image_large+"' /></div>";
    $.ajax({
        url: site+action, 
        data: $(formObj.elements).serialize(),
        type: "post", 
        dataType: "html"
    }); 
    return false;
}

function dummyload(page){
    $.ajax({
        url: site+"/"+page,
        dataType:"html"  		
    });
    return false;
}