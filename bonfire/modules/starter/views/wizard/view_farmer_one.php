<div class="row-fluid">
	<div class="span12">

		<div id="wizard">
			<!-- <div class="page-header">
				<h3>Οδηγός <small>συμπλήρωσης στοιχείων λογαριασμού <b>Παραγωγού</b></small></h3>
			</div> -->
			<div class="span2 offset3">
				<h4>1. Βήμα </h4>
				<p>Προσωπικά στοιχεία</p>
				<div class="progress progress-striped active">
			    	<div class="bar" style="width: 100%;"></div>
			    </div>
			</div>	
			<div class="span2">
				<h4>2. Βήμα </h4>
				<p>Δήλωση καλλιεργειών</p>
				<div class="progress">
			    	<div class="bar" style="width: 0%;"></div>
			    </div>
			</div>	
			<div class="span2">
				<h4>3. Βήμα </h4>
				<p>Δημιουργία προσφοράς</p>
				<div class="progress">
			    	<div class="bar" style="width: 0%;"></div>
			    </div>
			</div>	
		</div> <!-- End of id="wizard" -->

	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->


<div class="row-fluid">

	<div class="span10">
		<div class="well well-small">
			<h5>Προσωπικά στοιχεία</h5>
			<?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
			<div class="row-fluid">
				<div class="span1"></div>
			<div class="span4">
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

			    <div class="control-group <?php echo form_error('comp_email') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_email"), 'comp_email', array('class' => "control-label") ); ?>
			        <div class='controls'>
				        <input id="comp_email" type="text" name="comp_email" maxlength="255" value="<?php echo set_value('comp_email', isset($gfusers->comp_email) ? $gfusers->comp_email : ''); ?>"  />
				        <span class="help-inline"><?php echo form_error('comp_email'); ?></span>
			        </div>
			    </div>

			    <div class="control-group <?php echo form_error('website') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_website"), 'website', array('class' => "control-label") ); ?>
			        <div class='controls'>
					    <input id="website" type="text" name="website" maxlength="255" value="<?php echo set_value('website', isset($gfusers->website) ? $gfusers->website : ''); ?>"  />
					    <span class="help-inline"><?php echo form_error('website'); ?></span>
				    </div>
			    </div>

			    <div class="control-group <?php echo form_error('address') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_address"), 'address', array('class' => "control-label") ); ?>
			        <div class='controls'>
				        <input id="address" type="text" name="address" maxlength="255" value="<?php echo set_value('address', isset($gfusers->address) ? $gfusers->address : ''); ?>"  />
				        <span class="help-inline"><?php echo form_error('address'); ?></span>
			        </div>
			    </div>

			    <div class="control-group <?php echo form_error('city') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_city"), 'city', array('class' => "control-label") ); ?>
			        <div class='controls'>
					    <input id="city" type="text" name="city" maxlength="255" value="<?php echo set_value('city', isset($gfusers->city) ? $gfusers->city : ''); ?>"  />
					    <span class="help-inline"><?php echo form_error('city'); ?></span>
				    </div>
			    </div>
			</div>

		    <div class="span4">
			    <div class="control-group <?php echo form_error('state') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_state"), 'state', array('class' => "control-label") ); ?>
			        <div class='controls'>
					    <input id="state" type="text" name="state" maxlength="255" value="<?php echo set_value('state', isset($gfusers->state) ? $gfusers->state : ''); ?>"  />
					    <span class="help-inline"><?php echo form_error('state'); ?></span>
				    </div>
			    </div>

			    <div class="control-group <?php echo form_error('zip') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_zip"), 'zip', array('class' => "control-label") ); ?>
			        <div class='controls'>
					    <input id="zip" type="text" name="zip" maxlength="20" value="<?php echo set_value('zip', isset($gfusers->zip) ? $gfusers->zip : ''); ?>"  />
					    <span class="help-inline"><?php echo form_error('zip'); ?></span>
				    </div>
			    </div>

			    <div class="control-group <?php echo form_error('country') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_country"), 'country', array('class' => "control-label") ); ?>
			        <div class='controls'>
					    <input id="gfusers_country" type="text" name="country" maxlength="255" value="<?php echo set_value('country', isset($gfusers->country) ? $gfusers->country : ''); ?>"  />
					    <span class="help-inline"><?php echo form_error('country'); ?></span>
				    </div>
			    </div>

			    <div class="control-group <?php echo form_error('phone_1') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_phone_1"), 'phone_1', array('class' => "control-label") ); ?>
			        <div class='controls'>
					    <input id="phone_1" type="text" name="phone_1" maxlength="100" value="<?php echo set_value('phone_1', isset($gfusers->phone_1) ? $gfusers->phone_1 : ''); ?>"  />
					    <span class="help-inline"><?php echo form_error('phone_1'); ?></span>
				    </div>
			    </div>

			    <div class="control-group <?php echo form_error('phone_2') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_phone_2"), 'phone_2', array('class' => "control-label") ); ?>
			        <div class='controls'>
					    <input id="phone_2" type="text" name="phone_2" maxlength="100" value="<?php echo set_value('phone_2', isset($gfusers->phone_2) ? $gfusers->phone_2 : ''); ?>"  />
					    <span class="help-inline"><?php echo form_error('phone_2'); ?></span>
				    </div>
			    </div>

			    <div class="control-group <?php echo form_error('fax') ? 'error' : ''; ?>">
			        <?php echo form_label(lang("gfusers_fax"), 'fax', array('class' => "control-label") ); ?>
			        <div class='controls'>
				        <input id="fax" type="text" name="fax" maxlength="100" value="<?php echo set_value('fax', isset($gfusers->fax) ? $gfusers->fax : ''); ?>"  />
				        <span class="help-inline"><?php echo form_error('fax'); ?></span>
			        </div>
			    </div>
			</div>
			<div class="span1"></div>

			<br><br>
				<div class="span10 offset2 ">
			    <!-- <div class="form-actions"> -->
			        <?php echo anchor(SITE_AREA .'/gfusers/gfusers',  '<i class="icon-circle-arrow-left"></i>&nbsp;Πίσω', 'class=""'); ?>&nbsp;&nbsp;
			        <?php echo anchor('/gfusers/gfusers',  'Παράβλεψη', 'class=""'); ?>&nbsp;&nbsp;
			        <?php echo anchor('starter/wizard/wizard_farmer_two',  'Αποθήκευση και συνέχεια', 'class="btn btn-primary"'); ?>
			        <!-- <input type="submit" name="save" class="btn btn-primary" value="Αποθήκευση και συνέχεια" /> -->
					<?php if ($this->auth->has_permission('Gfusers.Content.Delete')) : ?>
				    <?php endif; ?>
				<!-- </div> -->
				<!-- End of Form Actions -->
				</div>
			</div> <!-- End of row-fluid -->
			<?php echo form_close(); ?>
		</div>
	</div> <!-- End of span12 -->
</div> <!-- End of row-fluid -->