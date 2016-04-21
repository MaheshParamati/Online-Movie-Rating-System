
function comedy(){
   var xmlhttp;
  //  alert("hello");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","comedy.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("band").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();
}
function signout(){
   var xmlhttp;
  //  alert("hello");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","signout.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				alert("singed out..!! ");
				window.location.href = 'login.php';
            }
        }
      
        xmlhttp.send();
}
function showfavourites(){
   var xmlhttp;
  //  alert("hello");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","showfavourites.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("fav").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();
}
function showrated(){
   var xmlhttp;
  //  alert("hello");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","showrated.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("fav").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();
}
function search(){
   var xmlhttp;
   
   var val=document.getElementById("name").value;
  // alert(val);
  //  alert("hello");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","searchmovie.php?val="+val,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("band").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();
}   
function rating(i1)
{
	var id=i1;
	var r=document.getElementById("name"+id).value;
	//alert(r);
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","addRating.php?id="+id+"&r="+r,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          alert(str);
		  window.location.href = 'movierating.php#band';
            }
        }
      
        xmlhttp.send();
   
} 
function favourite(i1)
{
	var id=i1;
	//var r=document.getElementById("name"+id).value;
	//alert(r);
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","addFavourite.php?id="+id,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          alert(str);
            }
        }
      
        xmlhttp.send();
   
}
function scfi(){
   var xmlhttp;
   // alert("hello");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","scfi.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("band").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();
} 
function horror(){
   var xmlhttp;
    //alert("hello");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","horror.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("band").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();
} 


function category(){
	document.getElementById("band").innerHTML = " <h3>Categories</h3>"+
	"<div class=\"row\">"+
	"<div class=\"col-sm-4\">"+
      "<p class=\"text-center\"><strong>Comedy</strong></p><br>"+
      "<a onclick=\"comedy()\">"+
        "<img src=\"comedy.jpg\" class=\"img-circle person\" alt=\"Random Name\" width=\"255\" height=\"255\">"+
      "</a>"+
    "</div>"+
    
	"<div class=\"col-sm-4\">"+
      "<p class=\"text-center\"><strong>Sci-fi</strong></p><br>"+
      "<a onclick=\"scfi()\">"+
        "<img src=\"scifi.jpg\" class=\"img-circle person\" alt=\"Random Name\" width=\"255\" height=\"255\">"+
      "</a>"+
    "</div>"+
	"<div class=\"col-sm-4\">"+
      "<p class=\"text-center\"><strong>Horror</strong></p><br>"+
      "<a onclick=\"horror()\">"+
        "<img src=\"horror.jpg\" class=\"img-circle person\" alt=\"Random Name\" width=\"255\" height=\"255\">"+
      "</a>"+
    "</div>"+
    
	
  "</div>";
	
	
}

function deletemovie(i2){
	var id=i2;
	//var r=document.getElementById("name"+id).value;
	//alert(r);
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","delete.php?id="+id,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          alert(str);
		  window.location.href = 'adminlookup.php';
            }
        }
      
        xmlhttp.send();
}



function add(){
	
	
		  window.location.href = 'add.php';
        
}
