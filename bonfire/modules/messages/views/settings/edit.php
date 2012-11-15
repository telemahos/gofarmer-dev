
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($messages) ) {
    $messages = (array)$messages;
}
$id = isset($messages['id']) ? $messages['id'] : '';
?>
<div class="admin-box">
    <h3>Messages</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('messages_to') ? 'error' : ''; ?>">
            <?php echo form_label('To', 'messages_to', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_to" type="text" name="messages_to" maxlength="20" value="<?php echo set_value('messages_to', isset($messages['messages_to']) ? $messages['messages_to'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_to'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_from') ? 'error' : ''; ?>">
            <?php echo form_label('From', 'messages_from', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_from" type="text" name="messages_from" maxlength="20" value="<?php echo set_value('messages_from', isset($messages['messages_from']) ? $messages['messages_from'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_from'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_attachment') ? 'error' : ''; ?>">
            <?php echo form_label('Attachment', 'messages_attachment', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_attachment" type="text" name="messages_attachment" maxlength="250" value="<?php echo set_value('messages_attachment', isset($messages['messages_attachment']) ? $messages['messages_attachment'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_attachment'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_subject') ? 'error' : ''; ?>">
            <?php echo form_label('Subject', 'messages_subject', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_subject" type="text" name="messages_subject" maxlength="250" value="<?php echo set_value('messages_subject', isset($messages['messages_subject']) ? $messages['messages_subject'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_subject'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_body') ? 'error' : ''; ?>">
            <?php echo form_label('Body', 'messages_body', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_body" type="text" name="messages_body"  value="<?php echo set_value('messages_body', isset($messages['messages_body']) ? $messages['messages_body'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_body'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_box') ? 'error' : ''; ?>">
            <?php echo form_label('Box', 'messages_box', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_box" type="text" name="messages_box" maxlength="100" value="<?php echo set_value('messages_box', isset($messages['messages_box']) ? $messages['messages_box'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_box'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_date') ? 'error' : ''; ?>">
            <?php echo form_label('Date', 'messages_date', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_date" type="text" name="messages_date"  value="<?php echo set_value('messages_date', isset($messages['messages_date']) ? $messages['messages_date'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_date'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_read') ? 'error' : ''; ?>">
            <?php echo form_label('Read', 'messages_read', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_read" type="text" name="messages_read" maxlength="1" value="<?php echo set_value('messages_read', isset($messages['messages_read']) ? $messages['messages_read'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_read'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('messages_sent_copy') ? 'error' : ''; ?>">
            <?php echo form_label('Sent_copy', 'messages_sent_copy', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="messages_sent_copy" type="text" name="messages_sent_copy" maxlength="1" value="<?php echo set_value('messages_sent_copy', isset($messages['messages_sent_copy']) ? $messages['messages_sent_copy'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('messages_sent_copy'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Messages" />
            or <?php echo anchor(SITE_AREA .'/settings/messages', lang('messages_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Messages.Settings.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('messages_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('messages_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
