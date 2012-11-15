
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($crdemand) ) {
    $crdemand = (array)$crdemand;
}
$id = isset($crdemand['id']) ? $crdemand['id'] : '';
?>
<div class="admin-box">
    <h3>crdemand</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('crdemand_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User Id'. lang('bf_form_label_required'), 'crdemand_user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_user_id" type="text" name="crdemand_user_id" maxlength="20" value="<?php echo set_value('crdemand_user_id', isset($crdemand['crdemand_user_id']) ? $crdemand['crdemand_user_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_user_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_crop_id') ? 'error' : ''; ?>">
            <?php echo form_label('Crop Id'. lang('bf_form_label_required'), 'crdemand_crop_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_crop_id" type="text" name="crdemand_crop_id" maxlength="20" value="<?php echo set_value('crdemand_crop_id', isset($crdemand['crdemand_crop_id']) ? $crdemand['crdemand_crop_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_crop_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_variety_id') ? 'error' : ''; ?>">
            <?php echo form_label('Variety Id', 'crdemand_variety_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_variety_id" type="text" name="crdemand_variety_id" maxlength="11" value="<?php echo set_value('crdemand_variety_id', isset($crdemand['crdemand_variety_id']) ? $crdemand['crdemand_variety_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_variety_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_quantity') ? 'error' : ''; ?>">
            <?php echo form_label('Quantity', 'crdemand_quantity', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_quantity" type="text" name="crdemand_quantity" maxlength="11" value="<?php echo set_value('crdemand_quantity', isset($crdemand['crdemand_quantity']) ? $crdemand['crdemand_quantity'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_quantity'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_quantity_type_id') ? 'error' : ''; ?>">
            <?php echo form_label('Quantity Type Id', 'crdemand_quantity_type_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_quantity_type_id" type="text" name="crdemand_quantity_type_id" maxlength="2" value="<?php echo set_value('crdemand_quantity_type_id', isset($crdemand['crdemand_quantity_type_id']) ? $crdemand['crdemand_quantity_type_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_quantity_type_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_packaging_id') ? 'error' : ''; ?>">
            <?php echo form_label('Packaging Id', 'crdemand_packaging_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_packaging_id" type="text" name="crdemand_packaging_id" maxlength="2" value="<?php echo set_value('crdemand_packaging_id', isset($crdemand['crdemand_packaging_id']) ? $crdemand['crdemand_packaging_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_packaging_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_price') ? 'error' : ''; ?>">
            <?php echo form_label('Price', 'crdemand_price', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_price" type="text" name="crdemand_price" maxlength="11" value="<?php echo set_value('crdemand_price', isset($crdemand['crdemand_price']) ? $crdemand['crdemand_price'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_price'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_price_per') ? 'error' : ''; ?>">
            <?php echo form_label('Price Per', 'crdemand_price_per', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_price_per" type="text" name="crdemand_price_per" maxlength="2" value="<?php echo set_value('crdemand_price_per', isset($crdemand['crdemand_price_per']) ? $crdemand['crdemand_price_per'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_price_per'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_release_date') ? 'error' : ''; ?>">
            <?php echo form_label('Release Date', 'crdemand_release_date', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="crdemand_release_date" type="text" name="crdemand_release_date"  value="<?php echo set_value('crdemand_release_date', isset($crdemand['crdemand_release_date']) ? $crdemand['crdemand_release_date'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('crdemand_release_date'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('crdemand_comment') ? 'error' : ''; ?>">
            <?php echo form_label('Comment', 'crdemand_comment', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'crdemand_comment', 'id' => 'crdemand_comment', 'rows' => '5', 'cols' => '80', 'value' => set_value('crdemand_comment', isset($crdemand['crdemand_comment']) ? $crdemand['crdemand_comment'] : '') ) )?>
            <span class="help-inline"><?php echo form_error('crdemand_comment'); ?></span>
        </div>

        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create crdemand" />
            or <?php echo anchor(SITE_AREA .'/developer/crdemand', lang('crdemand_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
