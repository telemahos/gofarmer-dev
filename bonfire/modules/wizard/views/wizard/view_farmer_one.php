<div class="row-fluid">
	<div class="span12">

		<div id="wizard">
			<!-- <div class="page-header">
				<h3>Οδηγός <small>συμπλήρωσης στοιχείων λογαριασμού <b>Παραγωγού</b></small></h3>
			</div> -->
			<div class="span2 offset3">
				<h4>1. Βήμα </h4>
				Προσωπικά στοιχεία
				<div class="progress progress-striped active">
			    	<div class="bar" style="width: 100%;"></div>
			    </div>
			</div>	
			<div class="span2 muted">
				<h4>2. Βήμα </h4>
				Δήλωση καλλιέργειας
				<div class="progress">
			    	<div class="bar" style="width: 0%;"></div>
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
					<h3>Προσωπικά στοιχεία</h3>
					<p>Οι πληροφορίες αυτές θα βοηθήσουν να βρείτε και άλλους χρήστες στο GoFarmer</p>
					<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
						<fieldset>
						<legend></legend>

						<div class="control-group <?php echo form_error('state') ? 'error' : ''; ?>">
					        <?php echo form_label(lang("gfusers_state"), 'state', array('class' => "control-label") ); ?>
					        <div class='controls'>
					        	<select data-placeholder="Επιλέξτε Περιοχή..." class="chzn-select span4" tabindex="2" name="state">
									<option value=""></option> 
									<option value="Αττική">Αττική</option> 
									<option value="Ημαθία">Ημαθία</option> 
									<option value="Πιέρια">Πιέρια</option> 
									<option value="Καβάλας">Καβάλας</option> 
									<option value="Κοζάνης">Κοζάνης</option> 
									<option value="Γρεβενων">Γρεβενων</option> 
									<option value="Πέλλας">Πέλλας</option> 
									<option value="Λαρίσης">Λαρίσης</option> 
									<option value="Θεσσαλονίκης">Θεσσαλονίκης</option> 
								</select>
							    <!-- <input id="state" type="text" name="state" maxlength="255" value="<?php //echo set_value('state', isset($gfusers->state) ? $gfusers->state : ''); ?>"  /> -->
							    <span class="help-inline"><?php echo form_error('state'); ?></span>
						    </div>
					    </div>
					    <!-- Start of User Meta -->
						<?php //$this->load->view('wizard/wizard/test', array('frontend_only' => TRUE));?>
						<!-- End of User Meta -->

						<div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
					        <?php echo form_label(lang("gfusers_name"), 'name', array('class' => "control-label") ); ?>
					        <div class='controls'>
							    <input id="name" type="text" name="name" maxlength="255" value="<?php echo set_value('name', isset($gfusers->name) ? $gfusers->name : ''); ?>"  />
							    <span class="help-inline"><?php echo form_error('name'); ?></span>
						    </div>
					    </div>

					    <div class="control-group <?php echo form_error('last_name') ? 'error' : ''; ?>">
					        <?php echo form_label(lang("gfusers_last_name"), 'last_name', array('class' => "control-label") ); ?>
					        <div class='controls'>
							    <input id="last_name" type="text" name="last_name" maxlength="255" value="<?php echo set_value('last_name', isset($gfusers->last_name) ? $gfusers->last_name : ''); ?>"  />
							    <span class="help-inline"><?php echo form_error('last_name'); ?></span>
						    </div>
					    </div>

					    <!-- <div class="control-group <?php //echo form_error('country') ? 'error' : ''; ?>">
					        <?php //echo form_label(lang("gfusers_country"), 'country', array('class' => "control-label") ); ?>
					        <div class='controls'>
							    <input id="gfusers_country" type="text" name="country" maxlength="255" value="<?php //echo set_value('country', isset($gfusers->country) ? $gfusers->country : ''); ?>"  />
							    <span class="help-inline"><?php //echo form_error('country'); ?></span>
						    </div>
					    </div> -->
					    <!-- Hidden Fields -->
					    <input type="hidden" name="country" value="Ελλάδα" />
					    <input type="hidden" name="is_farmer" value="1" />
					    <input type="hidden" name="is_company" value="0" />
					    <input type="hidden" name="is_user" value="0" />

					    <div class="form-actions">
					    <!-- <div class="form-actions"> -->
					        <?php echo anchor(SITE_AREA .'/gfusers/gfusers',  '<i class="icon-circle-arrow-left"></i>&nbsp;Πίσω', 'class=""'); ?>&nbsp;&nbsp;
					        <?php echo anchor('wizard/wizard/wizard_farmer_two',  'Παράβλεψη', 'class=""'); ?>&nbsp;&nbsp;
					        <?php //echo anchor('wizard/wizard/wizard_farmer_two',  'Αποθήκευση και συνέχεια', 'class="btn btn-primary"'); ?>
					        <input type="submit" name="save" class="btn btn-primary" value="Αποθήκευση και συνέχεια" />
							<?php if ($this->auth->has_permission('Gfusers.Content.Delete')) : ?>
						    <?php endif; ?>
						<!-- </div> -->
						<!-- End of Form Actions -->
						</div>


						</fieldset>
					<?php echo form_close(); ?>


				</div> <!-- End of well -->
			</div> <!-- End of span6 offset3 -->
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->