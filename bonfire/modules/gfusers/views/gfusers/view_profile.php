<section id="profile">

	<div class="page-header">
		<h1><?php echo lang('us_edit_profile'); ?></h1>
	</div>

<?php if (validation_errors()) : ?>
<div class="row-fluid">
	<div class="span8 offset2">
		<div class="alert alert-error fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<?php echo validation_errors(); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if (isset($user) && $user->role_name == 'Banned') : ?>
<div class="row-fluid">
	<div class="span5">
		<div data-dismiss="alert" class="alert alert-error fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<?php echo lang('us_banned_admin_note'); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if (isset($password_hints)):?>
<div class="row-fluid">
	<div class="span5">
		<div class="alert alert-info fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<h4 class="alert-heading"><?php echo lang('bf_required_note'); ?></h4>
			
				<?php echo $password_hints; ?>
			
		</div>
	</div>
</div>
<?php endif;?>

<div class="row-fluid">
	<div class="span12">
	    <ul class="nav nav-tabs">
		    <li class="active">
		    <a href="#"><?php echo lang("gfusers_basic_data"); ?></a>
		    </li>
		    <li><?php echo anchor('gfusers/gfusers/personal_data', lang("gfusers_personal_data"), 'title="Προσωπικά Στοιχεία"'); ?>
		    </li>
		    <li><?php echo anchor('gfusers/gfusers/company_data', lang("gfusers_company_data"), 'title="Προσωπικά Στοιχεία"'); ?>
		    </li>
	    </ul>

<?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>

	<!-- <div class="control-group <?php //echo iif( form_error('display_name') , 'error') ;?>">
		<label class="control-label" for="display_name"><?php //echo lang('bf_display_name'); ?></label>
		<div class="controls">
			<input class="span6" type="text" id="display_name" name="display_name" value="<?php //echo set_value('display_name', isset($user) ? $user->display_name : '') ?>" />
		</div>
	</div> -->

	<div class="control-group <?php echo iif( form_error('email') , 'error') ;?>">
		<label class="control-label required" for="email"><?php echo lang('bf_email'); ?></label>
		<div class="controls">
			<input class="span6" type="text" id="email" name="email" value="<?php echo set_value('email', isset($user) ? $user->email : '') ?>" />
		</div>
	</div>

	<?php if ( settings_item('auth.login_type') !== 'email' OR settings_item('auth.use_usernames')) : ?>
	<div class="control-group <?php echo iif( form_error('username') , 'error') ;?>">
		<label class="control-label required" for="username"><?php echo lang('bf_username'); ?></label>
		<div class="controls">
			<input class="span6" type="text" id="username" name="username" value="<?php echo set_value('username', isset($user) ? $user->username : '') ?>" />
		</div>
	</div>
	<?php endif; ?>

	<br />

	<div class="control-group <?php echo iif( form_error('password') , 'error') ;?>">
		<label class="control-label" for="password"><?php echo lang('bf_password'); ?></label>
		<div class="controls">
			<input class="span6" type="password" id="password" name="password" value="" />
		</div>
	</div>

	<div class="control-group <?php echo iif( form_error('pass_confirm') , 'error') ;?>">
		<label class="control-label" for="pass_confirm"><?php echo lang('bf_password_confirm'); ?></label>
		<div class="controls">
			<input class="span6" type="password" id="pass_confirm" name="pass_confirm" value="" />
		</div>
	</div>

		<div class="control-group <?php echo form_error('language') ? 'error' : '' ?>">
			<label class="control-label required" for="language"><?php echo lang('bf_language') ?></label>
			<div class="controls">
				<select name="language" id="language" class="chzn-select">
				<?php if (isset($languages) && is_array($languages) && count($languages)) : ?>
					<?php foreach ($languages as $language) : ?>
						<option value="<?php e($language) ?>" <?php echo set_select('language', $language, isset($user->language) && $user->language == $language ? TRUE : FALSE) ?>>
							<?php e(ucfirst($language)) ?>
						</option>

					<?php endforeach; ?>
				<?php endif; ?>
				</select>
				<?php if (form_error('language')) echo '<span class="help-inline">'. form_error('language') .'</span>'; ?>
			</div>
		</div>

		<!-- <div class="control-group <?php //echo form_error('timezone') ? 'error' : '' ?>">
			<label class="control-label required" for="timezones"><?php //echo lang('bf_timezone') ?></label>
			<div class="controls">
				<?php //echo timezone_menu(set_value('timezones', isset($user) ? $user->timezone : $current_user->timezone)); ?>
				<?php //if (form_error('timezones')) echo '<span class="help-inline">'. form_error('timezones') .'</span>'; ?>
			</div>
		</div> -->

		<?php
			// Allow modules to render custom fields
			Events::trigger('render_user_form', $user );
		?>

		<!-- Start User Meta -->
		<?php //$this->load->view('starter/starter/gf_user_meta', array('frontend_only' => TRUE));?>
		<!-- End of User Meta -->

		<!-- Start GF User Data -->
		<?php //$this->load->view('starter/starter/gf_user_data', array('frontend_only' => TRUE));?>
		<!-- End of GF User Data -->

	<!-- Start of Form Actions -->
	<div class="form-actions">
		<input type="submit" name="submit" class="btn btn-primary" value="<?php echo lang('gfusers_new') ?> " /> <?php //echo lang('bf_or') ?>
		<?php echo anchor('/', '<i class="icon-refresh">&nbsp;</i>&nbsp;' . lang('gfusers_cancel'), 'class="btn"'); ?>
	</div>
	<!-- End of Form Actions -->

<?php echo form_close(); ?>

	</div>
</div>
</section>