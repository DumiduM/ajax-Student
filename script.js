$ ("#su2b").click(function(){
	var data  = 
	$.post ( $("#form").attr("action"),$("form :input").serializeArray(), function(info){$("#result").html(info);});
	echo("check1");
});

$("#form").submit(function(){
echo("check2");
return false; 
});