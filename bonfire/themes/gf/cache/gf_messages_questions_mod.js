$('#messages_date').datepicker({ dateFormat: 'yy-mm-dd'});

var bodyCharacterLimit = 500;
var subjectCharacterLimit = 150;

$('input#save').addClass("disabled");
$("input#save").attr('disabled','disabled');
$('#bodyRemainingCharacters').html(bodyCharacterLimit);  
$('#subjectRemainingCharacters').html(subjectCharacterLimit); 

	$('#msg_subject').bind('keyup', function(){  
        var charactersUsed = $(this).val().length;  
          
        if  (charactersUsed > 5) {
            $("input#save").removeClass("disabled"); 
            $("input#save").removeAttr('disabled','disabled'); 
        }
        if(charactersUsed > subjectCharacterLimit){  
            charactersUsed = subjectCharacterLimit;  
            $(this).val($(this).val().substr(0, subjectCharacterLimit));  
            $(this).scrollTop($(this)[0].scrollHeight);  
        }  
          
        var charactersRemaining = subjectCharacterLimit - charactersUsed;  
          
        $('#subjectRemainingCharacters').html(charactersRemaining);  
    });

      
    $('#msg_body').bind('keyup', function(){  
        var charactersUsed = $(this).val().length; 

        if  (charactersUsed > 5) {
            $("input#save").removeClass("disabled"); 
            $("input#save").removeAttr('disabled','disabled'); 
        }
        
        if(charactersUsed > bodyCharacterLimit){  
            charactersUsed = bodyCharacterLimit;  
            $(this).val($(this).val().substr(0, bodyCharacterLimit));  
            $(this).scrollTop($(this)[0].scrollHeight);  
        }  
          
        var charactersRemaining = bodyCharacterLimit - charactersUsed;  
         
        $('#bodyRemainingCharacters').html(charactersRemaining);  
    });

    // TimeAgo plugin 
    jQuery("abbr.timeago").timeago();
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


