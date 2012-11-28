// AJAX CALL FOR SELECT BOX
// Crop select from wizard
    $("#variety").attr('disabled','disabled');
    // Add the disable state of the button
    $("input#crop_sumbit").addClass("disabled");
    $("input#crop_sumbit").attr('disabled','disabled');

	$("select#crop_crops").change( function() {		
		// Remove the disable state of the button
		$("input#crop_sumbit").removeClass("disabled"); 
		$("input#crop_sumbit").removeAttr('disabled','disabled');
		$("#variety").attr('disabled','disabled');
		//$("#result").html("<img src='../images/ajax-loader.gif' width='' height='' />");
		$.ajax({
			type: "POST",
			data: "data=" + $("select#crop_crops").val(),
			url:  "../../crop/get_crop_var_list",
			success: function(msg){
				if (msg != ''){
					if ($("select#crop_crops").val() == 0) {
						// Add the disable state of the button
						$("input#crop_sumbit").addClass("disabled");
						$("input#crop_sumbit").attr('disabled','disabled');
						$("#variety").val(0);
						$("#variety").attr('disabled','disabled');
						$("#result").html('');
					}
					else {
						$("#variety").removeAttr('disabled');
						$("#variety").html(msg);
					}
				}
				else{
					$("#result").html('<em>No item result</em>');
				}
			}
		});
	});