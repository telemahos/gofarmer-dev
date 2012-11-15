$('#release_date').datepicker({ dateFormat: 'yy-mm-dd'});

// Get with Typeahead the crop
$("#typeahead").typeahead({
	//source: ["youtube", "google", "facebook"]
	source: function(typeahead, the_data) {
		$.ajax({
			url: "crdemand/get_crop_list",
			type: "POST",
			data: "the_data=" + the_data,
			dataType: "JSON",
			async: false,
			success: function(msg) {
				typeahead.process(msg);
			}
		});
	}
});

// Get the variety from the crop with ajax.
$("#variety_id").attr('disabled','disabled');

$("#crop_id").change( function() {		
		// Remove the disable state of the button
		// $("input#crop_sumbit").removeClass("disabled"); 
		// $("input#crop_sumbit").removeAttr('disabled','disabled');
		$("#variety_id").attr('disabled','disabled');
		//$("#result").html("<img src='../images/ajax-loader.gif' width='' height='' />");
		// alert($("#crop_id").val());
		$.ajax({
			type: "POST",
			data: "data=" + $("#crop_id").val(),
			url:  "../crop/get_crop_var_list",
			success: function(msg){
				if (msg != ''){
					if ($("#crop_id").val() == 0) {
						// Add the disable state of the button
						// $("input#crop_sumbit").addClass("disabled");
						// $("input#crop_sumbit").attr('disabled','disabled');
						$("#variety_id").val(0);
						$("#variety_id").attr('disabled','disabled');
						$("#variety_id").html('');
					}
					else {
						$("#variety_id").removeAttr('disabled');
						$("#variety_id").html(msg);
					}
				}
				else{
					$("#result").html('<em>No item result</em>');
				}
			}
		});
	});