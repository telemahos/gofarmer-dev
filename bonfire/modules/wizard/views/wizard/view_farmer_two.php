<div class="row-fluid">
	<div class="span12">
		
	
		<div id="wizard">
			<!-- <div class="page-header">
				<h3>Οδηγός <small>συμπλήρωσης στοιχείων λογαριασμού <b>Παραγωγού</b></small></h3>
			</div> -->
			<div class="span2 offset3 muted">
				<h4>1. Βήμα </h4>
				Προσωπικά στοιχεία
				<div class="progress">
			    	<div class="bar" style="width: 0%;"></div>
			    </div>
			</div>	
			<div class="span2">
				<h4>2. Βήμα </h4>
				Δήλωση καλλιέργειας
				<div class="progress progress-striped active">
			    	<div class="bar" style="width: 100%;"></div>
			    </div>
			</div>	
			<div class="span2 muted">
				<h4>3. Βήμα </h4>
				Δημιουργία προσφοράς
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
					    <h3><?php //echo lang('crop_add_title'); ?>Δήλωση καλλιέργειας</h3>
					    <p>Οι πληροφορίες αυτές θα βοηθήσουν να βρείτε και άλλες εταιρίες στο GoFarmer</p>
					    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
						    <fieldset>
						    	<legend></legend>
					            <!-- Form Select Crop  -->
					            <div class="control-group <?php echo form_error('crop_crops') ? 'error' : ''; ?>">
					                <?php echo form_label(lang('crop_add_crop') . lang('bf_form_label_required'), 'crop_crops', array('class' => "control-label") ); ?>
					                <div class='controls'>
					                    <select name="crop_crops" data-placeholder="<?php echo lang('crop_add_crop_select'); ?>" id='crop_crops' class="chzn-select span4">
					                        <!-- <option value="0"><?php //echo lang('crop_add_crop_select'); ?></option> -->
					                        <option value=""></option> 
					                        <?php if(isset($crop_crops)) : foreach ($crop_crops as $crops): ?>
					                            <!-- Make an selected control point -->
					                            <?php if($mylang == "greek"): ?>
					                                <option value="<?php echo $crops['crop_crops_id'] ?>"> <!-- The selected option -->
					                                    <?php echo $crops["crops_gr"]; ?>
					                                </option>   
					                            <?php else : ?> 
					                                <option value="<?php echo $crops['crop_crops_id'] ?>"> <!-- No selected option -->
					                                    <?php echo $crops["crops_en"]; ?>
					                                </option>   
					                            <?php endif; ?>     
					                            <!-- End of selected control point -->  
					                        <?php endforeach; ?>
					                        <?php else : ?>                              
					                        <?php endif; ?>
					                    </select> 
					                </div>
					            </div>

					            <!-- Form Select Crop Variety  -->
					            <div class="control-group">
					            <?php echo form_label(lang('crop_add_variety'), 'variety', array('class' => "control-label") ); ?>
					            <div class='controls'>
					              <select id="variety" name="variety"></select>
					              <span class="help-inline" id="result">&nbsp;</span>
					            </div>  
					            </div>

					          <!-- Form Select Crop Certification -->
					          <?php $options  = array(0 => "Συμβατική Καλλιέργεια", 1 => "Ολοκληρωμένη Διαχείριση", 2 => "Βιολογική Καλλιέργεια"); ?>
					          <?php echo form_dropdown("certification" , $options, set_value('certification'), lang('crop_add_certification')  ); ?>
					          
					          <!-- Form Input Hectars-->
					          <div class="control-group">
					            <?php echo form_label(lang('crop_add_hectar'), 'hectar', array('class' => "control-label")); ?>
					            <div class='controls'>
					              <div class="input-append">
					       	 	      <input id="hectar" type="number" name="hectar" value="" placeholder='Αριθμός σε στρέμματα' data-validation-number-message="Λάθος! Μόνο δεκαδικοί (π.χ. 13.8) και ακέραιοι αριθμοί επιτρέπονται!" /><span class="add-on">Στρ.</span>
					              </div>
					              <span class="help-inline" id="result"><?php echo lang('crop_add_input_hectar_help') ?></span>
					            </div>  
					          </div>

					          <!-- Form Textarea for Comments -->
					          <!-- <div class="control-group">
					            <?php //echo form_label(lang('crop_add_comment'), 'comment', array('class' => "control-label")); ?>
					            <div class='controls'>
					              <textarea id="comment" name="comment" placeholder='Σχόλιο' rows="5"> </textarea>
					              <span class="help-inline" id="result"><?php //echo lang('crop_add_tarea_help') ?></span>
					            </div>  
					          </div> -->

					       	 	<!-- SUBMIT BUTTON --> 
						    	<div class="form-actions">

						    		<?php echo anchor('wizard/wizard/wizard_farmer',  '<i class="icon-circle-arrow-left"></i>&nbsp;Πίσω', 'class=""'); ?>&nbsp;&nbsp;
							        <?php echo anchor('/wizard/wizard/wizard_farmer_three',  'Παράβλεψη', 'class=""'); ?>&nbsp;&nbsp;
							       <!--  <?php //echo anchor('wizard/wizard/wizard_farmer_three',  'Αποθήκευση και συνέχεια', 'class="btn btn-primary"'); ?> -->
					            	<input type="submit" id='crop_sumbit' name="submit" class="btn btn-primary"  value="Αποθήκευση και συνέχεια	<?php //echo lang('crop_add_submit') ?>" />
					            	<?php //echo lang('crop_add_or') ?> <?php //echo anchor('/crop', lang('crop_cancel'), 'class="btn"'); ?>
					        	</div>

						    </fieldset>
					    <?php echo form_close(); ?>
					</div>
				</div> <!-- End of well -->
			</div> <!-- End of span8 offset2 -->
		
		
		
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->

<div class='row-fluid'>
	<div class='SPAN12'>
		<div class='span6 offset4'>
		</div>
		
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->