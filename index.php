<?php
$book = "1";
$chapter = 50;
?>
<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta id="view" name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>KJV Bible</title>
        <meta name="keywords" content="Bible, King James Version">
        <meta name="description" content="KJV Bible">        
        <meta id="view" name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <link rel="stylesheet" type="text/css" href="kjvpbc.css" />
    <!--[if lt IE 10]>
	      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	      <link rel="stylesheet" type="text/css" href="whsheet_ie.css" />
     <![endif] -->      
<?php include("jquerylib.php"); ?>
<?php include("jquerymenu.php"); ?>
<script type="text/javascript">
  function bgchgimg(e) {
	imgname = "images/bg" + e + ".jpg"; 
 	document.getElementById("page").style.backgroundImage = "url(" + imgname + ")";
  }
  function bookname(book,chapter) {
     var xmlHttp;
     try
      {  // Firefox, Opera 8.0+, Safari  
      xmlHttp=new XMLHttpRequest();  
      }
     catch (e)
      {  // Internet Explorer  
       try
        {
	     xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	    }
       catch (e)
        {    
     	 try
          {
	       xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	      }
         catch (e)
          {
	       alert("Your browser does not support AJAX!");      
	       return false;      
	      }    
	    }  
      }
  $('#eventselect li a').click(function(){
    var book = $('#bookmenu li.selected a').text();
  });	  
  var firstchapter = 1;
  //alert(month);	
  var url = 'booksearch.php?q=' + book + '&r=' + firstchapter;
  xmlHttp.open("GET",url,true);
  xmlHttp.onreadystatechange=getBook;
  xmlHttp.send(null);
  
  
  function getBook() 
    {
    if(xmlHttp.readyState==4  && xmlHttp.status==200)
      {
		 document.getElementById('page_content').innerHTML = xmlHttp.responseText;
      } else {
		 document.getElementById('page_content').innerHTML = "One Moment Please...";
      }
    }  
  var chapnumbers = "";
  for (var j = 1; j <= chapter; j++) {
      chapnumbers += "<li><a href=\"#chap" + j + "\" onclick=\"chapnumber(" + j + ")\">" + j + "</a>";	  
  }
  document.getElementById("chapmenu").innerHTML = chapnumbers;  
  }
</script> 
 	</head>
	<body>
      <div id="page">
         <header><?php include "header.inc.php" ?></header>
         <div class="page_left">
           <div id="book-wrap">
              <?php include "bookmenu.php" ?>
           </div>                  
           <div id="chap-wrap">
              <?php include "chapmenu.php" ?>
           </div>         
         </div>
         <div id="page_content">
<?php     $_GET['q'] = $book;
          $_GET['r'] = $chapter;    ?>
          <?php include 'booksearch.php' ?>  
         </div>
         <div class="page_right">
           <div id="bg-wrap">
              <?php include "bgmenu.php" ?>
           </div>         
         </div>             
         <nav><?php include "nav.inc.php" ?></nav>    
         <footer><?php include "footer.inc.php" ?></footer> 
       </div>  
     </body>
</html>
