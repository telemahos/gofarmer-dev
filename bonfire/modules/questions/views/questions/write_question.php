<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($messages) ) {
    $messages = (array)$messages;
}
$id = isset($messages['id']) ? $messages['id'] : '';
?>

<?php echo form_open('questions/questions/write_question', 'class="form-horizontal"'); ?>
<div>
	<div class='well well-small'>
		<h5>Κάνε μια ερώτηση.</h5>
		<div>
			<?php if (empty($question))  : ?>
				<input type="text" name="body" value="" class='span12' placeholder="Κάνε μια ερώτηση" id='msg_subject'>
				<span class='label pull-right' id="subjectRemainingCharacters"></span> 
			<?php else: ?>
				<input type="text" name="body" value="<?php echo $question; ?>" class='span12'  id='msg_subject'>
				<span class='label pull-right' id="subjectRemainingCharacters"></span> 
			<?php endif; ?>
		</div>
		<hr>
		<div>
			<p>Περισσότερες λεπτομέρειες</p>
			<textarea rows="3" class='span12' id='msg_body' name='details'></textarea>
			<span class='label pull-right' id="bodyRemainingCharacters"></span>
		</div>
		<hr>
		<div>
			<p>Κατηγορία</p>
			<select name="category" size='6' multiple="">
				<option value="1">Γεωργία</option>
				<option value="2">Πώληση</option>
				<option value="3">Τεχνολογία</option>
				<option value="4">Προσφορά</option>
				<option value="5">Ζήτηση</option>
			</select>
		</div>
		<hr>
		<div class=''>
			<!-- ACTIONS -->
			<div>
				<input type="submit" name="save" id='save' class="btn btn-small" value="Αποθήκευση" />
            	  
			</div>
		</div>
	</div>

	<div>
		
	</div>
	<div>
		
	</div>
</div>
<?php echo form_close(); ?>