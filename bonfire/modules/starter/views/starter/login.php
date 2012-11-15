<?php
	$site_open = $this->settings_lib->item('auth.allow_register');
?>
<section id="login">
	<div class="page-header">
		<h1><?php echo lang('us_login'); ?></h1>
	</div>

<?php
	if (validation_errors()) :
?>
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
	<div class="span12">

<?php echo form_open('starter/starter/login', array('class' => "form-horizontal well well-large", 'autocomplete' => 'off')); ?>
	<div>
		<h4 class="page-header"><?php echo lang('starter_start_screen_login_button'); ?></h4>
	</div>
	<div class="control-group <?php echo iif( form_error('login') , 'error') ;?>">
		<label class="control-label" for="login_value"><?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_login_type_both') : ucwords($this->settings_lib->item('auth.login_type')) ?></label>
		<div class="controls">
			<div class="input-prepend">
  				<span class="add-on"><i class="icon-envelope"></i></span><input class="input-xlarge" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
  			</div>
		</div>
	</div>

	<div class="control-group <?php echo iif( form_error('password') , 'error') ;?>">
		<label class="control-label" for="password"><?php echo lang('bf_password'); ?></label>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span><input class="input-xlarge" type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
			</div>
		</div>
	</div>

	<?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
		<div class="control-group">
			<label class="control-label" for="remember_me">&nbsp;</label>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
					<span class="inline-help"><?php echo lang('us_remember_note'); ?></span>
				</label>
			</div>
		</div>
	<?php endif; ?>

	<div class="control-group">
		<label class="control-label" for="submit">&nbsp;</label>
		<div class="controls">
			<input class="btn btn-primary" type="submit" name="submit" id="submit" value="<?php echo lang('starter_start_screen_login_button'); ?>" tabindex="5" />
		</div>
	</div>
<?php echo form_close(); ?>

	</div>
</div>

<?php // show for Email Activation (1) only
	if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
<!-- Activation Block -->
<div class="row-fluid">
	<div class="span12">
		<div class="">
			<p class="center">
				<?php echo lang('bf_login_activate_title'); ?><br />
				<?php
				$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
				$activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
				echo $activate_str; ?>
			</p>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="row-fluid">
	<div class="span12">
		<div class="">
			<p class="center">
				<small>
				<?php if ( $site_open ) : ?>
					<?php echo lang('starter_no_account'); ?> <?php echo anchor('user_registration', lang('us_sign_up')); ?> &nbsp;&nbsp; &#8226; &nbsp;&nbsp;
				<?php endif; ?>

				<?php echo anchor('/forgot_password', lang('us_forgot_your_password')); ?>
				</small>
			</p>
		</div>
	</div>
</div>

</section>
