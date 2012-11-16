<?php if  (!isset($current_user->email)) : ?>
<div class="row-fluid">
	<div class="span8">
		<div class="mini-layout front-marketing">
		    <span><h2>GoFarmer!<small>     <?php echo lang('starter_slogan'); ?></small></h2></span>
		    <p class='lead'><?php echo lang('starter_secondary_slogan'); ?></p>
		</div> 

		<div class='row-fluid'>
			<div class="span6">
				<div class='mini-layout'>
					<div class="front-marketing">
						<div class='span1'>
							<img class="bs-icon-front" src="<?php echo Template::theme_url('images/glyphs/png/glyphicons_022_fire.png') ?>" >
						</div>
				    	<div class='span11'>
				    		<h4><?php echo lang('starter_slogan_what'); ?></h4>
				    		<small class='marketing-slogan'><?php echo lang('starter_slogan_what_text'); ?></small>
				    	</div>
				    </div>
				</div> 
			</div>
			<div class="span6">
				<div class='mini-layout'>
					<div class="front-marketing">
						<div class='span1'>
				    		<img class="bs-icon-front" src="<?php echo Template::theme_url('images/glyphs/png/glyphicons_081_refresh.png') ?>" >
				    	</div>
				    	<div class='span11'>
				    		<h4><?php echo lang('starter_slogan_purpose'); ?></h4>
				    		<small class='marketing-slogan'><?php echo lang('starter_slogan_purpose_text'); ?></small>
				    	</div>
				    </div>
				</div> 
			</div>
		</div> 

		<div class='row-fluid'>
			<div class="span6">
				<div class='mini-layout'>
					<div class="front-marketing">
						<div class='span1'>
				    		<img class="bs-icon-front" src="<?php echo Template::theme_url('images/glyphs/png/glyphicons_062_attach.png') ?>" >
				    	</div>
				    	<div class='span11'>
					    	<h4><?php echo lang('starter_slogan_whom'); ?></h4>
					    	<small class='marketing-slogan'><?php echo lang('starter_slogan_whom_text'); ?></small>
					    </div>
				    </div>
				</div> 
			</div>
			<div class="span6">
				<div class='mini-layout'>
					<div class="front-marketing">
						<div class='span1'>
				    		<img class="bs-icon-front" src="<?php echo Template::theme_url('images/glyphs/png/glyphicons_270_shield.png') ?>" >
				    	</div>
				    	<div class='span11'>
					    	<h4><?php echo lang('starter_slogan_get'); ?></h4>
					    	<small class='marketing-slogan'><?php echo lang('starter_slogan_get_text'); ?></small>
					    </div>
				    </div>
				</div> 
			</div>
		</div> 
	</div><!-- END of span8 -->

	<div class="span4">
		<!-- LOGIN FORM -->
		<?php echo form_open('login', array('class' => "form-horizontal", 'autocomplete' => 'on')); ?>
			<div class='well well-large start-screen'>
				<div class="control-group <?php echo iif( form_error('login') , 'error') ;?>">
					<label class="control-label" for="login_value"><?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_login_type_both') : ucwords($this->settings_lib->item('auth.login_type')) ?></label>
					<div class="controls">
						<input class='span7' type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
					</div>
				</div>

				<div class="control-group <?php echo iif( form_error('password') , 'error') ;?>">
					<label class="control-label" for="password"><?php echo lang('bf_password'); ?></label>
					<div class="controls">
						<input class='span4' type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" /> <input class="span3 btn btn-info" type="submit" name="submit" id="submit" value="<?php echo lang('starter_start_screen_login_button'); ?>" tabindex="5" />
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
			</div>
		<?php echo form_close(); ?>

		<!-- REGISTRATION FROM -->
		<?php echo form_open('user_registration', array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
		<div class='well well-small start-screen'>
			<div>
				<h4 class="page-header"><?php echo lang('starter_start_screen_registration_main_title'); ?><small>   <?php echo lang('starter_start_screen_registration_seconadry_title'); ?></small></h4>
			</div>
			<div class="control-group <?php echo iif( form_error('email') , 'error'); ?>">
				<label class="control-label required" for="email"><?php echo lang('bf_email'); ?></label>
				<div class="controls">
				 <input class="span7" type="text" name="email" id="email"  value="<?php echo set_value('email'); ?>"  placeholder="email" />
				</div>
			</div>

			<?php if ( $this->settings_lib->item('auth.login_type') !== 'email' OR $this->settings_lib->item('auth.use_usernames') == 1): ?>

			<div class="control-group <?php echo iif( form_error('username') , 'error'); ?>">
				<label class="control-label required" for="username"><?php echo lang('bf_username'); ?></label>
				<div class="controls">
					<input class="span7" type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="<?php echo lang('bf_username'); ?>" />
				</div>
			</div>

			<?php endif; ?>

			<div class="control-group <?php echo iif( form_error('password') , 'error'); ?>">
				<label class="control-label required" for="password"><?php echo lang('bf_password'); ?></label>
				<div class="controls">
					<input class="span7" type="password" name="password" id="password" value="" placeholder="<?php echo lang('bf_password'); ?>" />
					<!-- <p class="help-block"><?php //echo lang('us_password_mins'); ?></p> -->
				</div>
			</div>

			<div class="control-group <?php echo iif( form_error('pass_confirm') , 'error'); ?>">
				<label class="control-label required" for="pass_confirm"><?php echo lang('bf_password_confirm'); ?></label>
				<div class="controls">
					<input class="span7" type="password" name="pass_confirm" id="pass_confirm" value="" placeholder="<?php echo lang('bf_password_confirm'); ?>" />
				</div>
			</div>

			<?php
				// Allow modules to render custom fields
				Events::trigger('render_user_form');
			?>
			<br>
			<div class="">
				<label class="" for="submit">&nbsp;Κάνοντας εγγραφή, συμφωνείτε με τους <a href="#">όρους χρήσης</a></label>
			</div>
			<!-- <hr> -->
			<div class="">
				<div class="">
					<input class="btn btn-large btn-success btn-block " type="submit" name="submit" id="submit" value="<?php echo lang('us_register'); ?>"  />
				</div>
			</div>
		</div>

		

		<?php echo form_close(); ?>

	</div><!-- END of span4 -->
</div> <!-- END of row-fluid -->
<?php endif;?>
Developer
<?php // if (isset($current_user->email)) : ?>
	<?php // if ($this->auth->has_permission()) : ?> 
	<?php // if ($this->auth->role_id() == 1) : ?>
	<?php //if (has_permission('Site.Content.View')) : ?>



