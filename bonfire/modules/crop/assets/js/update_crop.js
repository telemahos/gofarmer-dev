	// Update Crop
	// AJAX CALL FOR SELECT BOX
    // $("#variety_up").attr('disabled','disabled');
    // Add the disable state of the button
    // $("input#crop_sumbit_up").addClass("disabled");
    // $("input#crop_sumbit_up").attr('disabled','disabled');

	$("select#crop_crops_up").change( function() {		
		// Remove the disable state of the button
		$("input#crop_sumbit_up").removeClass("disabled"); 
		$("input#crop_sumbit_up").removeAttr('disabled','disabled');
		$("#variety_up").attr('disabled','disabled');
		//$("#result").html("<img src='../images/ajax-loader.gif' width='' height='' />");
		$.ajax({
			type: "POST",
			data: "data=" + $("select#crop_crops_up").val(),
			url:  "../../../crop/get_crop_var_list",
			success: function(msg){
				if (msg != ''){
					if ($("select#crop_crops_up").val() == 0) {
						// Add the disable state of the button
						$("input#crop_sumbit_up").addClass("disabled");
						$("input#crop_sumbit_up").attr('disabled','disabled');
						$("#variety_up").val(0);
						$("#variety_up").attr('disabled','disabled');
						$("#result").html('');
					}
					else {
						$("#variety_up").removeAttr('disabled');
						$("#variety_up").html(msg);
					}
				}
				else{
					$("#result").html('<em>No item result</em>');
				}
			}
		});
	});