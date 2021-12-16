$(document).ready(function(){
	$("#suggest").keyup(function(){
		$.get("facts.php", {cameraId: $(this).val()}, function(data){
			$("datalist").empty();
			$("datalist").html(data);
		});
	});
});