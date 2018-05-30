$ ("#sub").click(function(){
	
	$.post ( $("#form").attr("action"),$("form :input").serializeArray(), function(info){$("#result").html(info);});

});

$("#form").submit(function(){
	showStudents(); 
return false;

});

$ ("#subgr").click(function(){
	
	$.post ( $("#form2").attr("action"),$("form2 :input").serializeArray(), function(info){$("#results").html(info);});
});

$("#form2").submit(function(){
return false;

});


function showGrades(str){
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("content").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getGrade.php?q="+str,true);
		  xmlhttp.send();

	}

function showHome(str){
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("content").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getHome.php?q="+str,true);
		  xmlhttp.send();

	}


	function check(event){

		 // alert(event.target.innerText); //current cell
   		// alert(event.target.parentNode.innerText); //Current row.
   		   if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("gpa").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getGpa.php?q="+event.target.innerText,true);
		  xmlhttp.send();
			};
	function showStudents(str) { 

			// alert("showStudents");
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("table1").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getStu.php?q="+str,true);
		  xmlhttp.send();
	}

	// jQuery(document).ready(function($) {
	// 	$("a").click(function(event){
	// 		link=$(this).attr("href");
	// 		$.ajax({
	// 			url: link,
	// 		})
	// 		.done(function(html){
	// 			$("#page").empty().append(html);
	// 		})
	// 		.fail(function() {
	// 			console.log("error");
	// 		})
	// 		.always(function(){
	// 			console.log("complete");
	// 		});
	// 		return false;
	// 	});
	// });