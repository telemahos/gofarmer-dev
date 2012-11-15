
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
<div class="admin-box">
    <h3>crop</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('crop_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User ID'. lang('bf_form_label_required'), 'crop_user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crop_user_id" type="text" name="crop_user_id" maxlength="10" value="<?php echo set_value('crop_user_id', isset($crop['crop_user_id']) ? $crop['crop_user_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crop_user_id'); ?></span>
        </div>


        </div>


        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                250 => 250,
); ?>

        <?php echo form_dropdown('crop_crop', $options, set_value('crop_crop', isset($crop['crop_crop']) ? $crop['crop_crop'] : ''), 'Crop'. lang('bf_form_label_required'))?>

        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                255 => 255,
); ?>

        <?php echo form_dropdown('crop_variety', $options, set_value('crop_variety', isset($crop['crop_variety']) ? $crop['crop_variety'] : ''), 'Variety')?>        <div class="control-group <?php echo form_error('crop_hectar') ? 'error' : ''; ?>">
            <?php echo form_label('Hectar', 'crop_hectar', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crop_hectar" type="text" name="crop_hectar" maxlength="10" value="<?php echo set_value('crop_hectar', isset($crop['crop_hectar']) ? $crop['crop_hectar'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crop_hectar'); ?></span>
        </div>


        </div>


        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                255 => 255,
); ?>

        <?php echo form_dropdown('crop_certification', $options, set_value('crop_certification', isset($crop['crop_certification']) ? $crop['crop_certification'] : ''), 'Certification')?>

        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                255 => 255,
); ?>

        <?php echo form_dropdown('crop_conventional_crops', $options, set_value('crop_conventional_crops', isset($crop['crop_conventional_crops']) ? $crop['crop_conventional_crops'] : ''), 'Conventional Crops')?>

        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                255 => 255,
); ?>

        <?php echo form_dropdown('crop_integrated_crop', $options, set_value('crop_integrated_crop', isset($crop['crop_integrated_crop']) ? $crop['crop_integrated_crop'] : ''), 'Integrated Crop')?>

        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                255 => 255,
); ?>

        <?php echo form_dropdown('crop_organic', $options, set_value('crop_organic', isset($crop['crop_organic']) ? $crop['crop_organic'] : ''), 'Organic')?>        <div class="control-group <?php echo form_error('crop_comment') ? 'error' : ''; ?>">
            <?php echo form_label('Comment', 'crop_comment', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'crop_comment', 'id' => 'crop_comment', 'rows' => '5', 'cols' => '80', 'value' => set_value('crop_comment', isset($crop['crop_comment']) ? $crop['crop_comment'] : '') ) )?>
            <span class="help-inline"><?php echo form_error('crop_comment'); ?></span>
        </div>

        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Create crop" />
            or <?php echo anchor(SITE_AREA .'/developer/crop', lang('crop_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
