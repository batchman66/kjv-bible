<ul id="bookmenu">
<?php
     $query_Book = "SELECT * FROM BibleBook ORDER BY booknumber ASC";
     $rsBook = mysql_query($query_Book) or die(mysql_error());
     while($row = mysql_fetch_array($rsBook)) {
		$bookname = $row['bookname']; 
		$booknumber = $row['booknumber'];
		$chapters = $row['bookchapter'];
?>
        <li><a href="#" onclick="bookname('<?php echo $booknumber; ?>','<?php echo $chapters ?>')"><?php echo $bookname; ?></a></li>
<?php		
	 }
?>	
</ul> 
