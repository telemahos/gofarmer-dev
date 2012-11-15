<section id="register">
	<div class="page-header">
		<h1><?php echo lang('us_login'); ?></h1>
	</div>

<?php if (validation_errors()) : ?>
		<div class="row-fluid">
			<div class="span12">
				<div class="alert alert-error fade in">
						<a data-dismiss="alert" class="close">&times;</a>
					<?php echo validation_errors(); ?>
				</div>
			</div>
		</div>
<?php endif; ?>

<div class="row-fluid">
	<div class="span10 offset2">
		<div class="alert alert-info fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<h4 class="alert-heading"><?php echo lang('bf_required_note'); ?></h4>
			<?php if (isset($password_hints) ) echo $password_hints; ?>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">

<?php echo form_open('starter/starter/user_registration', array('class' => "form-horizontal well well-large", 'autocomplete' => 'off')); ?>
	<div>
		<h4 class="page-header"><?php echo lang('starter_start_screen_registration_main_title'); ?><small>   <?php echo lang('starter_start_screen_registration_seconadry_title'); ?></small></h4>
	</div>
	<div class="control-group <?php echo iif( form_error('email') , 'error'); ?>">
		<label class="control-label required" for="email"><?php echo lang('bf_email'); ?></label>
		<div class="controls">
			<div class="input-prepend">
  				<span class="add-on"><i class="icon-envelope"></i></span><input class="input-xlarge" type="text" name="email" id="email prependedInput"  value="<?php echo set_value('email'); ?>"  placeholder="email" />
  			</div>
		</div>
	</div>

	<?php if ( $this->settings_lib->item('auth.login_type') !== 'email' OR $this->settings_lib->item('auth.use_usernames') == 1): ?>

	<div class="control-group <?php echo iif( form_error('username') , 'error'); ?>">
		<label class="control-label required" for="username"><?php echo lang('bf_username'); ?></label>
		<div class="controls">
			<div class="input-prepend">
  				<span class="add-on"><i class="icon-user"></i></span><input class="input-xlarge" type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="<?php echo lang('bf_username'); ?>" />
			</div>
		</div>
	</div>

	<?php endif; ?>

	<div class="control-group <?php echo iif( form_error('password') , 'error'); ?>">
		<label class="control-label required" for="password"><?php echo lang('bf_password'); ?></label>
		<div class="controls">
			<div class="input-prepend">
					<span class="add-on"><i class="icon-lock"></i></span><input class="input-xlarge" type="password" name="password" id="password" value="" placeholder="<?php echo lang('bf_password'); ?>" />
			</div>
			<span class="help-inline"><?php echo lang('us_password_mins'); ?></span>	
		</div>
	</div>

	<div class="control-group <?php echo iif( form_error('pass_confirm') , 'error'); ?>">
		<label class="control-label required" for="pass_confirm"><?php echo lang('bf_password_confirm'); ?></label>
		<div class="controls">
			<div class="input-prepend">
					<span class="add-on"><i class="icon-repeat"></i></span><input class="input-xlarge" type="password" name="pass_confirm" id="pass_confirm" value="" placeholder="<?php echo lang('bf_password_confirm'); ?>" />
			</div>
		</div>
	</div>

	<?php
		// Allow modules to render custom fields
		Events::trigger('render_user_form');
	?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<p><small><?php echo lang('start_registration_agree'); ?></small></p>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="submit">&nbsp;</label>
		<div class="controls">
			<input class="btn btn-large btn-success span3" type="submit" name="submit" id="submit" value="<?php echo lang('us_register'); ?>"  />
		</div>
	</div>

<?php echo form_close(); ?>

<p class='center'>
	<small><?php echo lang('us_already_registered'); ?> <?php echo anchor('login', lang('bf_action_login')); ?></small>
</p>

	</div>
</div>
</section>