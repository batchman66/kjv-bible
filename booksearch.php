<?php   
		 $book = $_GET['q'];
		 $chapter = $_GET['r'];
         $query_Bookname = "SELECT * FROM BibleBook WHERE booknumber =".$book;
         $rsBookname = mysql_query($query_Bookname) or die(mysql_error());
         $rowB = mysql_fetch_array($rsBookname);
?>		
         <div id="booktitle"><h1><?php echo $rowB['bookname']; ?></h1></div>
         <div id="bookinfo">
<?php    
         $prevchapter = 0;
         $query_Verses = "SELECT * FROM BibleText".$book;
         $rsVerses = mysql_query($query_Verses) or die(mysql_error());
         while ($rowV = mysql_fetch_array($rsVerses)) {
			$chapternumber = $rowV['chapternumber'];
		    $versenumber = $rowV['versenumber'];
			$versetext = $rowV['chapterverse'];
			if ($chapternumber > $prevchapter) {
			   if ($prevchapter > 0) {
?>				   
	              </section>
<?php          
			   }
?>			   
			   <section id="chap<?php echo $chapternumber; ?>">
?>
               <br><br><h2 style="color:#FC0;"><em>Chapter <?php echo $chapternumber; ?></em></h2><br><br>

<?php				
			}
			$prevchapter = $chapternumber;
  	 		while(strpos($versetext, "/I") !== false) {   
			  if (strpos($versetext, "/I") !== false) {
				 if (strpos($versetext, "/I") == 0)
				    $starttext = "";
				 else
			        $starttext = substr($versetext, 0, strpos($versetext, "/I")-1);
				 $ittext = substr($versetext, strpos($versetext, "/I")+2, strpos($versetext, "I/") - strpos($versetext, "/I") - 2);
				 $endtext = substr ($versetext, strpos($versetext, "I/")+2, strlen($versetext));
				 $versetext = $starttext."<em>".$ittext."</em>".$endtext;	
 			  }   
	 		} 
  	 		while(strpos($versetext, "/R") !== false) {   
			  if (strpos($versetext, "/R") !== false) {
				 if (strpos($versetext, "/R") == 0)
				    $starttext = "";
				 else
			        $starttext = substr($versetext, 0, strpos($versetext, "/R")-1);
				 $ittext = substr($versetext, strpos($versetext, "/R")+2, strpos($versetext, "R/") - strpos($versetext, "/R") - 2);
				 $endtext = substr ($versetext, strpos($versetext, "R/")+2, strlen($versetext));
				 $versetext = $starttext."<span class=\"red\">".$ittext."</span>".$endtext;	
 			  }   
	 		}			
?>			
	        <h2><?php echo $versenumber; ?> <?php echo $versetext ?></h2>
<?php           		
		 }
?>          
         </section>
         </div>
