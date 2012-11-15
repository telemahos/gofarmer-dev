// TimeAgo plugin 
    jQuery("abbr.timeago").timeago();

// Toggle form answer
$('#form-answer').hide(0);
$("#btn-answer").click(function () {
	$('#btn-answer').hide(0);
	// $("#form-answer").toggle("slow");
	$("#form-answer").show(0);

	$("#btn-answer-cancel").click(function () {
		$("#form-answer").hide(0);
		$('#btn-answer').show(0);
		// $("#form-answer").toggle("slow");
		
	});
}); 

