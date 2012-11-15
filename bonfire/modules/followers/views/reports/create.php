
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($followers) ) {
    $followers = (array)$followers;
}
$id = isset($followers['foll_id']) ? $followers['foll_id'] : '';
?>
<div class="admin-box">
    <h3>Followers</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('followers_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User ID'. lang('bf_form_label_required'), 'followers_user_id', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="followers_user_id" type="text" name="followers_user_id" maxlength="20" value="<?php echo set_value('followers_user_id', isset($followers['followers_user_id']) ? $followers['followers_user_id'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('followers_user_id'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('followers_follower_id') ? 'error' : ''; ?>">
            <?php echo form_label('Follower ID'. lang('bf_form_label_required'), 'followers_follower_id', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="followers_follower_id" type="text" name="followers_follower_id" maxlength="20" value="<?php echo set_value('followers_follower_id', isset($followers['followers_follower_id']) ? $followers['followers_follower_id'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('followers_follower_id'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('followers_block') ? 'error' : ''; ?>">
            <?php echo form_label('Block', 'followers_block', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="followers_block" type="text" name="followers_block" maxlength="1" value="<?php echo set_value('followers_block', isset($followers['followers_block']) ? $followers['followers_block'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('followers_block'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create Followers" />
            or <?php echo anchor(SITE_AREA .'/reports/followers', lang('followers_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
