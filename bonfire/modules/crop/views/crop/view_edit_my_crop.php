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
    <h3><?php echo lang("crop_edit_title"); ?></h3>
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            <legend></legend>

          <!-- Form Select Crop  -->
            <?php $ids = 'id="crop_crops" onChange=""'; ?>
            <?php echo form_dropdown('crop_crops', array('0' => lang('crop_add_crop_select'))  + $crop_crops , set_value('crop_crops', isset($crop['crop_crops']) ? $crop['crop_crops'] : ''), lang('crop_add_crop') . lang('bf_form_label_required'),$ids); ?>

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
                  <input id="hectar" type="text" name="hectar" maxlength="10" value="" placeholder='Αριθμός σε στρέμματα' /><span class="add-on">Στρ.</span>
              </div>
              <span class="help-inline" id="result"><?php echo lang('crop_add_input_hectar_help') ?></span>
            </div>  
          </div>

          <!-- Form Textarea for Comments -->
          <div class="control-group">
            <?php echo form_label(lang('crop_add_comment'), 'comment', array('class' => "control-label")); ?>
            <div class='controls'>
              <textarea id="comment" name="comment" placeholder='Σχόλιο' rows="5"> </textarea>
              <span class="help-inline" id="result"><?php echo lang('crop_add_tarea_help') ?></span>
            </div>  
          </div>

            <!-- SUBMIT BUTTON --> 
            <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-primary" value="<?php echo lang('crop_add_submit') ?>" />
                <?php echo lang('crop_add_or') ?> <?php echo anchor('/crop', lang('crop_cancel'), 'class="btn btn-warning"'); ?>
            </div>

        </fieldset>
    <?php echo form_close(); ?>


</div>