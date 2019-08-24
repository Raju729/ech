$(document).ready(function () {
	
$("div#modaladdtest").on("click", "#btnaddtest", function(){										
  var t = $("input#txttestname").val().toUpperCase();
  if(t==undefined || t==""){return;}
  var html = "<li>"+t+ "  <i style='cursor:pointer' class='fa fa-times text-danger' aria-hidden='true'></i></li><input type='hidden' name='tests[]' value='"+t+"'>";
  $("ul#uladdtest").append(html);
  $("input#txttestname").val("");
  $("button.close").click();
});
$("ul#uladdtest").on("click",".fa-times",function(){
  $(this).parents("li").remove();
});

$("#equaltea").hide();

$("div#modaladdtabcap").on("click", "#btnaddtabcap", function(){                    
    var tc = $("input[name='dtabcap']").val().toUpperCase();
    var dur = $("select[name='duration']").val();
    console.log('raju'+dur);
    var day = $("#day").val();
    // var d1 = $("input[name='d1']").val(),
    // d2 = $("input[name='d2']").val(),
    // d3 = $("input[name='d3']").val(),
    // d4 = $("input[name='d4']").val(),
    // dd = $("input[name='dd']").val(),
    da = $("select[name='dadvice']").val(),
    dtype = $("select[name='dtype']").val(); 
    // if(d1==""){d1=0};if(d2==""){d2=0};if(d3==""){d3=0};

    var du="";
  //   if(d4=="" || d4==undefined)
  //       {du = " ("+d1+"+"+d2+"+"+d3+")";}
  // else
  //       {du = " ("+d1+"+"+d2+"+"+d3+"+"+d4+")";}

  if(dtype=="Syp")
        {du=du+" Tea spoons";}
  else
        {du=du+" = "+day+" days";}



  var html = "<li><i style='cursor:pointer' class='fa fa-times text-danger' aria-hidden='true'></i> <strong>"+dtype+". </strong> "+tc+" "+dur+"  "+"("+day+" "+'days'+")"+"<br><small class='ml-20'>"+da+"</small></li><input type='hidden' name='medicines[]' value='"+dtype+"*"+tc+"*"+dur+"'>";

  $("ul#uladdtabcap").append(html);
  $("input[name='dtabcap']").val("");
  $("button.close").click();
});

$("div#modaladdtabcap").on("change","select[name='dtype']",function(){
    var v = $(this).val();
    if(v=="Syp")
    {
        $("#equaldays").hide();
        $("#equaltea").show();
  }
  else
  {
        $("#equaldays").show();
        $("#equaltea").hide();
  }
});

$("ul#uladdtabcap").on("click",".fa-times",function(){
    $(this).parents("li").remove();
});

});

