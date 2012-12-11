<div class="row-fluid">
	<div class="span12">

		<div id="wizard">
			<div class="span2 offset3 muted">
				<h4>1. Βήμα </h4>
				Στοιχεία Επιχείρησης
				<div class="progress">
			    	<div class="bar" style="width: 0%;"></div>
			    </div>
			</div>	
			<div class="span2 ">
				<h4>2. Βήμα </h4>
				Προϊόντα που εμπορεύεστε
				<div class="progress progress-striped active">
			    	<div class="bar" style="width: 100%;"></div>
			    </div>
			</div>	
			<div class="span2 muted">
				<h4>3. Βήμα </h4>
				Ζήτηση Προϊόντων
				<div class="progress">
			    	<div class="bar" style="width: 0%;"></div>
			    </div>
			</div>	
		</div> <!-- End of id="wizard" -->

	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->


<div class='row-fluid'>
	<div class='SPAN12'>
		
		<div class='span6 offset3'>
			<div class='well'>
				<?php if (validation_errors()) : ?>
					<div class="alert alert-block alert-error fade in ">
						<a class="close" data-dismiss="alert">&times;</a>
						<h4 class="alert-heading">Please fix the following errors :</h4>
					 	<?php echo validation_errors(); ?>
					</div>
				<?php endif; ?>

				<?php // Change the css classes to suit your needs
					if( isset($crop) ) {
					    $crop = (array)$crop;
					}
					$id = isset($crop['id']) ? $crop['id'] : '';
				?>
				<div class="">
				    <h3>Προϊόντα που εμπορεύεστε<?php // echo lang('croffer_title') ?></h3>
				    <p>Επέλεξε τα προϊόντα που εμπορεύεστε για να σας βρίσκουν ευκολότερα στο GoFarmer</p>
				    <form class="form-horizontal">
				    	<fieldset>
						<legend></legend>
							<!-- Add the products guest likes -->
							<div class="control-group <?php echo form_error('state') ? 'error' : ''; ?>">
						        <?php echo form_label("Προϊόντα", 'state', array('class' => "control-label") ); ?>
						        <div class='controls'>
						        	<select data-placeholder="Επιλέξτε Προϊόντα..." multiple class="chzn-select" tabindex="2" name="state">
										<option value=""></option> 
										<option value="ΑΓΓΟΎΡΙΑ">ΑΓΓΟΎΡΙΑ</option> 
										<option value="ΝΤΟΜΆΤΕΣ">ΝΤΟΜΆΤΕΣ</option> 
										<option value="ΜΑΝΙΤΑΡΙΑ">ΜΑΝΙΤΑΡΙΑ</option> 
										<option value="ΓΑΛΑ">ΓΑΛΑ</option> 
										<option value="ΣΑΛΙΓΚΑΡΙΑ">ΣΑΛΙΓΚΑΡΙΑ</option> 
										<option value="ΡΟΔΑΚΙΝΑ">ΡΟΔΑΚΙΝΑ</option> 
										<option value="ΑΧΛΑΔΙΑ">ΑΧΛΑΔΙΑ</option> 
										<option value="ΜΗΛΑ">ΜΗΛΑ</option> 
										<option value="ΝΕΚΤΑΡΙΝΙΑ">ΝΕΚΤΑΡΙΝΙΑ</option> 
									</select>
								    <!-- <input id="state" type="text" name="state" maxlength="255" value="<?php //echo set_value('state', isset($gfusers->state) ? $gfusers->state : ''); ?>"  /> -->
								    <span class="help-inline"><?php echo form_error('state'); ?></span>
							    </div>
						    </div>

						    <div class="form-actions">
						    <!-- <div class="form-actions"> -->
						        <?php echo anchor('wizard/wizard_buix',  '<i class="icon-circle-arrow-left"></i>&nbsp;Πίσω', 'class=""'); ?>&nbsp;&nbsp;
						        <?php echo anchor('wizard/wizard_buix/wizard_buix_three',  'Παράβλεψη', 'class=""'); ?>&nbsp;&nbsp;
						        <?php //echo anchor('wizard/wizard/wizard_farmer_two',  'Αποθήκευση και συνέχεια', 'class="btn btn-primary"'); ?>
						        <input type="submit" name="save" class="btn btn-primary" value="Αποθήκευση και συνέχεια" />
								<?php if ($this->auth->has_permission('Gfusers.Content.Delete')) : ?>
							    <?php endif; ?>
							<!-- </div> -->
							<!-- End of Form Actions -->
							</div>

						</fieldset>
				    </form>
				</div>

			</div> <!-- End of well -->
		</div> <!-- End of span6 offset3 -->
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->