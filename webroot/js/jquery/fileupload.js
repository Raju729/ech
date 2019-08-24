$(document).ready(function(){
	
	$("div.progress").hide();

	var baseurl = $("meta[name='baseurl']").attr("url");
	var url = baseurl+"upload";
	$umf = $("div.uploadmultitplefiles");

	var files = $umf.find("input[name='uploadfile']");

	$umf.on("click","#uploadbutton",function(){		
		files.click(); 
	});

	files.change(function(){


		if(files.val()=="" || files.val()==undefined)
		{
			console.log(files.val());
			alert("No file selected.");
		}
		else
		{
			var property = files.prop('files')[0];
			if(property==undefined){return;}
			var form_data = new FormData();
			form_data.append("file",property);
			console.log(url);
			$.ajax({
				type: 'post',
				url: url,
				data : form_data,
				processData: false,
				contentType: false,
				dataType:'json',
				beforeSend: function() 
				{
					$umf.find("button#uploadbutton").prop("disabled",true);	
					$umf.find("div.progress-bar").css({"width":"0%"});
				    $umf.find("div.progress-bar").text("0%");				
				},
				xhr: function()
				  {
				    var xhr = new window.XMLHttpRequest();
				    $("div.progress").show();
				    xhr.upload.addEventListener("progress", function(evt){
				      if (evt.lengthComputable) {
				        var percentComplete = evt.loaded / evt.total;
				        var total = percentComplete*100;
				        $umf.find("div.progress-bar").css({"width":total+"%"});
				        $umf.find("div.progress-bar").text(total+"%");
				      }
				    }, false);
				    return xhr;
				  },
				success: function(resp) 
				{
					console.log(resp);
					$umf.find("button#uploadbutton").prop("disabled",false);
					if(resp.status=="success")
					{
						$umf.append("<h5 ><a href='"+baseurl+"img/"+resp.response+"' class='text-warning myphotos' target='_blank'>"+resp.name+"</a></h5>");
						$form = $umf.parents("form").eq(0).append("<input type='hidden' name='myphotos[]' value='"+resp.response+"'>");

						//$form.append('<input type="hidden" name="files[]" value="'+resp.response+'"');
						$umf.find("div.progress").hide();
						$umf.find("button#uploadbutton").text("Add more");

					}								
				},
				error: function(e) 
				{
					$umf.find("button#uploadbutton").prop("disabled",false);
					alert("An error occurred: " + e.responseText.message);
					console.log(e);
				}				
			});
		}

	});






	var usi = $("div.uploadsingleimg");

	var file = usi.find("input[name='uploadfile']");

	usi.on("click","#uploadbutton",function(){		
		file.click(); 
	});
	file.change(function(){

        if(file.attr('saveid')!=undefined)
        {
            url= url+"?saveid="+file.attr('saveid');
        }

		if(file.val()=="" || file.val()==undefined)
		{
			console.log(file.val());
			alert("No file selected.");
		}
		else
		{
			var property = file.prop('files')[0];
			if(property==undefined){return;}
			var form_data = new FormData();
			form_data.append("file",property);
			console.log(url);			
			$.ajax({
				type: 'post',
				url: url,
				data : form_data,
				processData: false,
				contentType: false,
				dataType:'json',
				beforeSend: function() 
				{
					usi.find("button#uploadbutton").prop("disabled",true);	
					usi.find("div.progress-bar").css({"width":"0%"});
				    usi.find("div.progress-bar").text("0%");				
				},
				xhr: function()
				  {
				    var xhr = new window.XMLHttpRequest();
				    $("div.progress").show();
				    xhr.upload.addEventListener("progress", function(evt){
				      if (evt.lengthComputable) {
				        var percentComplete = evt.loaded / evt.total;
				        var total = percentComplete*100;
				        usi.find("div.progress-bar").css({"width":total+"%"});
				        usi.find("div.progress-bar").text(total+"%");
				      }
				    }, false);
				    return xhr;
				  },
				success: function(resp) 
				{
					console.log(resp);
					usi.find("button#uploadbutton").prop("disabled",false);
					if(resp.status=="success")
					{
						usi.find("img#myphoto").attr("src",baseurl+"img/"+resp.response)
						usi.find("input[name='thumb_url']").val(resp.response);
						usi.find("div.progress").hide();
						FlashStatus(resp.status,"Successfully updated");
					}
					else
					{
						FlashStatus(resp.status,resp.response);
					}							
				},
				error: function(e) 
				{
					usi.find("button#uploadbutton").prop("disabled",false);
					alert("An error occurred: " + e.responseText.message);					
				}				
			});
		}

	});
});


