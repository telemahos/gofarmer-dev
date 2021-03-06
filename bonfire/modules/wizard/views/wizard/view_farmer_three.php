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
			<div class="span2 muted">
				<h4>2. Βήμα </h4>
				Δήλωση καλλιέργειας
				<div class="progress ">
			    	<div class="bar" style="width: 0%;"></div>
			    </div>
			</div>	
			<div class="span2">
				<h4>3. Βήμα </h4>
				Δημιουργία προσφοράς
				<div class="progress progress-striped active">
			    	<div class="bar" style="width: 100%;"></div>
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
						if( isset($croffer) ) {
						    $croffer = (array)$croffer;
						}
						$id = isset($croffer['id']) ? $croffer['id'] : '';
						?>

						<div class="">
						    <h3>Δημιουργία προσφοράς<?php // echo lang('croffer_title') ?></h3>
						    <p>Οι πληροφορίες αυτές θα βοηθήσουν να σας βρούνε και άλλες εταιρίες στο GoFarmer</p>
						  <!--   <div id='tips'>
						        <div class="alert alert-info fade in">
						            <button type="button" class="close" data-dismiss="alert">×</button>
						            <p><span class="label label-info">Συμβουλή:</span>&nbsp;Κάθε καταχώρηση αφορά μια <em>καλλιέργεια</em> και μια συγκεκριμένη <em>ποιότητα</em>. </p>
						            <p><span class="label label-info">Συμβουλή:</span>&nbsp;Κάνετε <em>πολλαπλές καταχωρήσεις προσφοράς</em>, μιας καλλιέργειας, ανάλογα με τις <em>διαθέσιμες ποιότητες</em>.</p>
						        </div>
						    </div> -->

						<!-- Test Noify -->
						<!-- <button class="btn source" onclick="$.pnotify({
							title: 'No History Notice',
							text: 'I\'m not part of the notice history, so if you redisplay the last message, it won\'t be me.',
							type: 'success',
							history: false
						});">No History Notice</button> -->

						<!-- Test slider -->
						<!-- <p>
			              <label for="amount">Volume:</label>
			              <input type="text" id="amount" class='span4' readonly="readonly"/>
			            </p>
	            		<div id="slider" style="width:200px;"></div> -->


						    
						<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
						    <fieldset>
						        <legend></legend>

						        <input type='hidden' id="the_crop_id" value='<?php echo $user_crops_data->id ?>' >

						        <!-- Loading Users Crop Data --><?php //print_r($user_crops_data); ?>
						        <div class="control-group <?php echo form_error('croffer_crop_id') ? 'error' : ''; ?>">
						            <?php echo form_label(lang('crop_add_crop') . lang('bf_form_label_required'), 'croffer_crop_id', array('class' => "control-label") ); ?> 
						            <div class='controls'>
						                <select class='' name="croffer_crop_id" id='croffer_crop_id'>
						                    <option value="0"><?php echo lang('crop_add_crop_select'); ?></option>
						                    <?php foreach ($user_crops_data as $record) : ?><?php echo $record->crop; ?>
						                        <?php if($mylang == "greek"): ?>
						                            <option value="<?php echo $record->crop_id?>"><?php echo $record->crops_gr . " - " . $record->crop_variety_gr . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
						                            </option>
						                        <?php else : ?> 
						                            <option value="<?php echo $record->crop_id?>"><?php echo  "(" . $record->crop_id . ") " .$record->crops_en . " - " . $record->crop_variety_en . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
						                            </option>
						                        <?php endif; ?>     
						                            <!-- End of selected control point --> 
						                    <?php endforeach; ?>
						                </select> 
						                <span class="help-inline"><?php echo form_error('croffer_crop_id'); ?></span>
						                <span class="help-inline"><?php echo lang('croffer_new_crop_help'); ?><a href="crop/add_crop"><?php echo anchor('crop/add_crop', lang('croffer_new_crop'), ''); ?></a></span>
						            </div>
						        </div>


						        <div class="control-group <?php echo form_error('croffer_quantity') ? 'error' : ''; ?>">
						            <?php echo form_label(lang('croffer_quantity'), 'croffer_quantity', array('class' => "control-label") ); ?>
						            <div class='controls'>
						                <input class='input-small' id="croffer_quantity" type="number" name="croffer_quantity" maxlength="11" data-validation-number-message="Λάθος! Μόνο αριθμοί επιτρέπονται!" value="<?php echo set_value('croffer_quantity', isset($croffer['croffer_quantity']) ? $croffer['croffer_quantity'] : ''); ?>"  /> <span class='muted'><small>&nbsp;<?php echo lang('croffer_in') ?>&nbsp;</small></span>
						                <select class='input-small' name="croffer_quantity_type_id" id='croffer_quantity_type_id'>
						                    <option value='1'><?php echo lang('croffer_quantity_form_1'); ?></option>
						                    <option value='2'><?php echo lang('croffer_quantity_form_2'); ?></option>
						                    <option value='3'><?php echo lang('croffer_quantity_form_3'); ?></option>
						                </select>
						                <span class="help-inline"><?php echo form_error('croffer_quantity'); ?></span>
						            </div>
						        </div>




						        <div class="control-group <?php echo form_error('croffer_packaging_id') ? 'error' : ''; ?>">
						            <?php echo form_label(lang('croffer_packaging'), 'croffer_packaging_id', array('class' => "control-label") ); ?>
						            <div class='controls'>
						                <select name="croffer_packaging_id" id='croffer_packaging_id'>
						                    <option value='1'><?php echo lang('croffer_no'); ?></option>
						                    <option value='2'><?php echo lang('croffer_yes'); ?></option>
						                </select>
						                <span class="help-inline"><?php echo form_error('croffer_packaging_id'); ?></span>
						            </div>
						        </div>


						        <!-- <div class="control-group <?php //echo form_error('croffer_quality_id') ? 'error' : ''; ?>">
						            <?php //echo form_label(lang('croffer_quality'), 'croffer_quality_id', array('class' => "control-label") ); ?>
						            <div class='controls'>
						                <select name="croffer_quality_id" id='croffer_quality_id'>
						                    <option value='1'><?php //echo lang('croffer_quality_a'); ?></option>
						                    <option value='2'><?php //echo lang('croffer_quality_b'); ?></option>
						                    <option value='3'><?php //echo lang('croffer_quality_c'); ?></option>
						                    <option value='4'><?php //echo lang('croffer_quality_d'); ?></option>
						                    <option value='5'><?php //echo lang('croffer_quality_e'); ?></option>
						                    <option value='6'><?php //echo lang('croffer_quality_f'); ?></option>
						                </select>
						                <span class="help-inline"><?php //echo lang('croffer_quality_help'); ?></span>
						            </div>
						        </div> -->


						        <div class="control-group <?php echo form_error('croffer_price') ? 'error' : ''; ?>">
						            <?php echo form_label(lang('croffer_price'), 'croffer_price', array('class' => "control-label") ); ?>
						            <div class='controls'>
						                <input class='input-small' id="croffer_price" type="number" data-validation-number-message="Λάθος! Μόνο δεκαδικοί (π.χ. 13.8) και ακέραιοι αριθμοί επιτρέπονται!" name="croffer_price" maxlength="11" value="<?php echo set_value('croffer_price', isset($croffer['croffer_price']) ? $croffer['croffer_price'] : ''); ?>"  /> <span class='muted'>&nbsp;<small><?php echo lang('croffer_per') ?>&nbsp; </small></span>
						                <select class='input-small' name="croffer_price_per" id='croffer_price_per'>
						                    <option value='1'><?php echo lang('croffer_price_per_1'); ?></option>
						                    <option value='2'><?php echo lang('croffer_price_per_2'); ?></option>
						                    <option value='3'><?php echo lang('croffer_price_per_3'); ?></option>
						                </select>
						                <span class="help-inline"><?php echo form_error('croffer_price'); ?></span>
						            </div>
						        </div>

						        <!-- <div class="control-group <?php //echo form_error('croffer_release_date') ? 'error' : ''; ?>">
						            <?php //echo form_label(lang('croffer_release'), 'croffer_release_date', array('class' => "control-label") ); ?>
						            <div class='controls'>
						            <input id="croffer_release_date" type="text" name="croffer_release_date" maxlength="30" value="<?php //echo set_value('croffer_release_date', isset($croffer['croffer_release_date']) ? $croffer['croffer_release_date'] : ''); ?>"  />
						            <span class="help-inline"><?php //echo lang('croffer_release_help') ?></span>
						            </div>
						        </div> -->

						        <!-- <div class="control-group <?php //echo form_error('croffer_comment') ? 'error' : ''; ?>">
						            <?php //echo form_label(lang('croffer_comment'), 'croffer_comment', array('class' => "control-label") ); ?>
						            <div class='controls'>
						                <?php //echo form_textarea( array( 'name' => 'croffer_comment', 'id' => 'croffer_comment', 'rows' => '5', 'cols' => '80', 'value' => set_value('croffer_comment', isset($croffer['croffer_comment']) ? $croffer['croffer_comment'] : '') ) )?>
						                <span class="help-inline"><?php //echo lang('croffer_comment_help') ?></span>
						            </div>
						        </div> -->

						        <!-- <div class="control-group <?php //echo form_error('croffer_image') ? 'error' : ''; ?>">
						            <?php //echo form_label(lang('croffer_image'), 'croffer_image', array('class' => "control-label") ); ?>
						            <div class='controls'>
						            <input id="croffer_image" type="text" name="croffer_image" maxlength="250" value="<?php //echo set_value('croffer_image', isset($croffer['croffer_image']) ? $croffer['croffer_image'] : ''); ?>"  />
						            <span class="help-inline"><?php //echo form_error('croffer_image'); ?></span>
						            </div>
						        </div> -->



						        <div class="form-actions">
						            <?php echo anchor('wizard/wizard/wizard_farmer_two',  '<i class="icon-circle-arrow-left"></i>&nbsp;Πίσω', 'class=""'); ?>&nbsp;&nbsp;
							        <?php echo anchor('/gfusers/gfusers',  'Παράβλεψη', 'class=""'); ?>&nbsp;&nbsp;
							        <?php //echo anchor('gfusers/gf_my_profile',  'Αποθήκευση και ολοκλήρωση', 'class="btn btn-primary"'); ?>
						            <input type="submit" id="save" name="save" class="btn btn-primary" value="<?php echo lang('croffer_add') ?>" />
						             <?php //echo anchor(SITE_AREA .'/content/croffer', lang('croffer_cancel'), 'class="btn"'); ?>
						        </div>
						    </fieldset>
						    <?php echo form_close(); ?>
						</div>
					
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