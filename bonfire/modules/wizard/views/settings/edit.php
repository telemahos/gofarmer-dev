
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($wizard) ) {
    $wizard = (array)$wizard;
}
$id = isset($wizard['id']) ? $wizard['id'] : '';
?>
<div class="admin-box">
    <h3>wizard</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('wizard_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User Id'. lang('bf_form_label_required'), 'wizard_user_id', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="wizard_user_id" type="text" name="wizard_user_id" maxlength="20" value="<?php echo set_value('wizard_user_id', isset($wizard['wizard_user_id']) ? $wizard['wizard_user_id'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('wizard_user_id'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('wizard_completed') ? 'error' : ''; ?>">
            <?php echo form_label('Completed', 'wizard_completed', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="wizard_completed" type="text" name="wizard_completed" maxlength="1" value="<?php echo set_value('wizard_completed', isset($wizard['wizard_completed']) ? $wizard['wizard_completed'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('wizard_completed'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit wizard" />
            or <?php echo anchor(SITE_AREA .'/settings/wizard', lang('wizard_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Wizard.Settings.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('wizard_delete_confirm'))); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('wizard_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
