
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
<div class="admin-box">
    <h3>croffer</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('croffer_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User Id'. lang('bf_form_label_required'), 'croffer_user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_user_id" type="text" name="croffer_user_id" maxlength="20" value="<?php echo set_value('croffer_user_id', isset($croffer['croffer_user_id']) ? $croffer['croffer_user_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_user_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_crop_id') ? 'error' : ''; ?>">
            <?php echo form_label('Crop Id'. lang('bf_form_label_required'), 'croffer_crop_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_crop_id" type="text" name="croffer_crop_id" maxlength="20" value="<?php echo set_value('croffer_crop_id', isset($croffer['croffer_crop_id']) ? $croffer['croffer_crop_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_crop_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_variety_id') ? 'error' : ''; ?>">
            <?php echo form_label('Variety Id', 'croffer_variety_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_variety_id" type="text" name="croffer_variety_id" maxlength="11" value="<?php echo set_value('croffer_variety_id', isset($croffer['croffer_variety_id']) ? $croffer['croffer_variety_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_variety_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_quantity') ? 'error' : ''; ?>">
            <?php echo form_label('Quantity', 'croffer_quantity', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_quantity" type="text" name="croffer_quantity" maxlength="11" value="<?php echo set_value('croffer_quantity', isset($croffer['croffer_quantity']) ? $croffer['croffer_quantity'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_quantity'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_quantity_type_id') ? 'error' : ''; ?>">
            <?php echo form_label('Quantity Type Id', 'croffer_quantity_type_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_quantity_type_id" type="text" name="croffer_quantity_type_id" maxlength="2" value="<?php echo set_value('croffer_quantity_type_id', isset($croffer['croffer_quantity_type_id']) ? $croffer['croffer_quantity_type_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_quantity_type_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_packaging_id') ? 'error' : ''; ?>">
            <?php echo form_label('Packaging Id', 'croffer_packaging_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_packaging_id" type="text" name="croffer_packaging_id" maxlength="2" value="<?php echo set_value('croffer_packaging_id', isset($croffer['croffer_packaging_id']) ? $croffer['croffer_packaging_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_packaging_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_quality_id') ? 'error' : ''; ?>">
            <?php echo form_label('Quality Id', 'croffer_quality_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_quality_id" type="text" name="croffer_quality_id" maxlength="2" value="<?php echo set_value('croffer_quality_id', isset($croffer['croffer_quality_id']) ? $croffer['croffer_quality_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_quality_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_price') ? 'error' : ''; ?>">
            <?php echo form_label('Price', 'croffer_price', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_price" type="text" name="croffer_price" maxlength="11" value="<?php echo set_value('croffer_price', isset($croffer['croffer_price']) ? $croffer['croffer_price'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_price'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_release_date') ? 'error' : ''; ?>">
            <?php echo form_label('Release Date', 'croffer_release_date', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_release_date" type="text" name="croffer_release_date" maxlength="30" value="<?php echo set_value('croffer_release_date', isset($croffer['croffer_release_date']) ? $croffer['croffer_release_date'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_release_date'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_comment') ? 'error' : ''; ?>">
            <?php echo form_label('Comment', 'croffer_comment', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'croffer_comment', 'id' => 'croffer_comment', 'rows' => '5', 'cols' => '80', 'value' => set_value('croffer_comment', isset($croffer['croffer_comment']) ? $croffer['croffer_comment'] : '') ) )?>
            <span class="help-inline"><?php echo form_error('croffer_comment'); ?></span>
        </div>

        </div>
        <div class="control-group <?php echo form_error('croffer_image') ? 'error' : ''; ?>">
            <?php echo form_label('Image', 'croffer_image', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_image" type="text" name="croffer_image" maxlength="250" value="<?php echo set_value('croffer_image', isset($croffer['croffer_image']) ? $croffer['croffer_image'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_image'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create croffer" />
            or <?php echo anchor(SITE_AREA .'/settings/croffer', lang('croffer_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
