$('#croffer_release_date').datepicker({ dateFormat: 'd M, yy'});
// $('#croffer_release_date').datepicker({ dateFormat: 'dd-mm-yy'});

//Disable the image input
$("#croffer_image").addClass("disabled").attr('disabled','disabled');
// Disable the submit button
$("input#save").addClass("disabled");
$("input#save").attr('disabled','disabled');
// If selected status changed, then enable te button
$("select#croffer_crop_id").change( function() {
	$("input#save").removeClass("disabled"); 
	$("input#save").removeAttr('disabled','disabled');
	// In case of 0 select, disable the button again
	if ($("select#croffer_crop_id").val() == 0) {
		$("input#save").addClass("disabled");
		$("input#save").attr('disabled','disabled');
	}
});	