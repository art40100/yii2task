$(function(){
	
	$(".language").click(function() {

		var languageCode = $(this).attr('id');
		$.post('language', {'languageCode':languageCode}, function(data){
	 		location.reload();
	 	});

	});

});