
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($gfusers) ) {
    $gfusers = (array)$gfusers;
}
$id = isset($gfusers['id']) ? $gfusers['id'] : '';
?>
<div class="admin-box">
    <h3>gfusers</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('gfusers_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User ID'. lang('bf_form_label_required'), 'gfusers_user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_user_id" type="text" name="gfusers_user_id" maxlength="255" value="<?php echo set_value('gfusers_user_id', isset($gfusers['gfusers_user_id']) ? $gfusers['gfusers_user_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_user_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_name') ? 'error' : ''; ?>">
            <?php echo form_label('Name', 'gfusers_name', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_name" type="text" name="gfusers_name" maxlength="255" value="<?php echo set_value('gfusers_name', isset($gfusers['gfusers_name']) ? $gfusers['gfusers_name'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_name'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_last_name') ? 'error' : ''; ?>">
            <?php echo form_label('Last Name', 'gfusers_last_name', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_last_name" type="text" name="gfusers_last_name" maxlength="255" value="<?php echo set_value('gfusers_last_name', isset($gfusers['gfusers_last_name']) ? $gfusers['gfusers_last_name'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_last_name'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_comp_name') ? 'error' : ''; ?>">
            <?php echo form_label('Company Name', 'gfusers_comp_name', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_comp_name" type="text" name="gfusers_comp_name" maxlength="255" value="<?php echo set_value('gfusers_comp_name', isset($gfusers['gfusers_comp_name']) ? $gfusers['gfusers_comp_name'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_comp_name'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_comp_description') ? 'error' : ''; ?>">
            <?php echo form_label('Company Description', 'gfusers_comp_description', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'gfusers_comp_description', 'id' => 'gfusers_comp_description', 'rows' => '5', 'cols' => '80', 'value' => set_value('gfusers_comp_description', isset($gfusers['gfusers_comp_description']) ? $gfusers['gfusers_comp_description'] : '') ) )?>
            <span class="help-inline"><?php echo form_error('gfusers_comp_description'); ?></span>
        </div>

        </div>
        <div class="control-group <?php echo form_error('gfusers_comp_category') ? 'error' : ''; ?>">
            <?php echo form_label('Company Category', 'gfusers_comp_category', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_comp_category" type="text" name="gfusers_comp_category" maxlength="255" value="<?php echo set_value('gfusers_comp_category', isset($gfusers['gfusers_comp_category']) ? $gfusers['gfusers_comp_category'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_comp_category'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_comp_email') ? 'error' : ''; ?>">
            <?php echo form_label('Company Email', 'gfusers_comp_email', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_comp_email" type="text" name="gfusers_comp_email" maxlength="255" value="<?php echo set_value('gfusers_comp_email', isset($gfusers['gfusers_comp_email']) ? $gfusers['gfusers_comp_email'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_comp_email'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_website') ? 'error' : ''; ?>">
            <?php echo form_label('Website', 'gfusers_website', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_website" type="text" name="gfusers_website" maxlength="255" value="<?php echo set_value('gfusers_website', isset($gfusers['gfusers_website']) ? $gfusers['gfusers_website'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_website'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_address') ? 'error' : ''; ?>">
            <?php echo form_label('Address', 'gfusers_address', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_address" type="text" name="gfusers_address" maxlength="255" value="<?php echo set_value('gfusers_address', isset($gfusers['gfusers_address']) ? $gfusers['gfusers_address'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_address'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_city') ? 'error' : ''; ?>">
            <?php echo form_label('City', 'gfusers_city', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_city" type="text" name="gfusers_city" maxlength="255" value="<?php echo set_value('gfusers_city', isset($gfusers['gfusers_city']) ? $gfusers['gfusers_city'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_city'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_state') ? 'error' : ''; ?>">
            <?php echo form_label('State', 'gfusers_state', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_state" type="text" name="gfusers_state" maxlength="255" value="<?php echo set_value('gfusers_state', isset($gfusers['gfusers_state']) ? $gfusers['gfusers_state'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_state'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_zip') ? 'error' : ''; ?>">
            <?php echo form_label('Zip', 'gfusers_zip', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_zip" type="text" name="gfusers_zip" maxlength="20" value="<?php echo set_value('gfusers_zip', isset($gfusers['gfusers_zip']) ? $gfusers['gfusers_zip'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_zip'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_country') ? 'error' : ''; ?>">
            <?php echo form_label('Country', 'gfusers_country', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_country" type="text" name="gfusers_country" maxlength="255" value="<?php echo set_value('gfusers_country', isset($gfusers['gfusers_country']) ? $gfusers['gfusers_country'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_country'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_phone_1') ? 'error' : ''; ?>">
            <?php echo form_label('Telephone 1', 'gfusers_phone_1', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_phone_1" type="text" name="gfusers_phone_1" maxlength="100" value="<?php echo set_value('gfusers_phone_1', isset($gfusers['gfusers_phone_1']) ? $gfusers['gfusers_phone_1'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_phone_1'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_phone_2') ? 'error' : ''; ?>">
            <?php echo form_label('Telephone 2', 'gfusers_phone_2', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_phone_2" type="text" name="gfusers_phone_2" maxlength="100" value="<?php echo set_value('gfusers_phone_2', isset($gfusers['gfusers_phone_2']) ? $gfusers['gfusers_phone_2'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_phone_2'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_fax') ? 'error' : ''; ?>">
            <?php echo form_label('Fax', 'gfusers_fax', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_fax" type="text" name="gfusers_fax" maxlength="100" value="<?php echo set_value('gfusers_fax', isset($gfusers['gfusers_fax']) ? $gfusers['gfusers_fax'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_fax'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_is_farmer') ? 'error' : ''; ?>">
            <?php echo form_label('Is Farmer', 'gfusers_is_farmer', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_is_farmer" type="text" name="gfusers_is_farmer" maxlength="1" value="<?php echo set_value('gfusers_is_farmer', isset($gfusers['gfusers_is_farmer']) ? $gfusers['gfusers_is_farmer'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_is_farmer'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_is_company') ? 'error' : ''; ?>">
            <?php echo form_label('Is Company', 'gfusers_is_company', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_is_company" type="text" name="gfusers_is_company" maxlength="1" value="<?php echo set_value('gfusers_is_company', isset($gfusers['gfusers_is_company']) ? $gfusers['gfusers_is_company'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_is_company'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('gfusers_is_user') ? 'error' : ''; ?>">
            <?php echo form_label('Is User', 'gfusers_is_user', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="gfusers_is_user" type="text" name="gfusers_is_user" maxlength="1" value="<?php echo set_value('gfusers_is_user', isset($gfusers['gfusers_is_user']) ? $gfusers['gfusers_is_user'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('gfusers_is_user'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit gfusers" />
            or <?php echo anchor(SITE_AREA .'/settings/gfusers', lang('gfusers_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Gfusers.Settings.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('gfusers_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('gfusers_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
