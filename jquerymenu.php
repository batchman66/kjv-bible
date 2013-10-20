<script type="text/javascript">
jQuery(document).ready(function($){

	/* prepend book menu icon */
	$('#book-wrap').prepend('<div id="bookmenu-title"><h1>Book</h1></div>');
	
	/* toggle chapter menu */
	$("#bookmenu-title").on("click", function(){
		$("#bookmenu").slideToggle();
		$(this).toggleClass("active");
	});

	/* prepend chapter menu icon */
	$('#chap-wrap').prepend('<div id="chapmenu-title"><h1>Chapter</h1></div>');
	
	/* toggle chapter menu */
	$("#chapmenu-title").on("click", function(){
		$("#chapmenu").slideToggle();
		$(this).toggleClass("active");
	});

	/* prepend background menu icon */
	$('#bg-wrap').prepend('<div id="bgmenu-title"><h1>Background</h1></div>');
	
	/* toggle background menu */
	$("#bgmenu-title").on("click", function(){
		$(".bgmenu").slideToggle();
		$(this).toggleClass("active");
	});

});
</script>
