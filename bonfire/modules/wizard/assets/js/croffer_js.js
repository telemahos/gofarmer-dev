// FILE: croffer_js.js


// jqValidation
    // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    $("input,select").not("[type=submit]").jqBootstrapValidation();

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

// Vertical slider
    // $("#slider").slider({
    //     range: "min",
    //     min: 0,
    //     max: 120,
    //     value: 12,
    //     slide: function (event, ui) {
    //         $("#amount").val(ui.value);
    //     }
    // });
    // $("#amount").val($("#slider").slider("value"));

    