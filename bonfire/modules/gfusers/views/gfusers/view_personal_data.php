<section id="profile">

	<div class="page-header">
		<h4><?php echo lang('us_edit_profile'); ?></h4>
	</div>

<?php if (validation_errors()) : ?>
<div class="row-fluid">
	<div class="span5">
		<div class="alert alert-error fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<?php echo validation_errors(); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php // if (isset($user) && $user->role_name == 'Banned') : ?>
<!-- <div class="row-fluid">
	<div class="span5">
		<div data-dismiss="alert" class="alert alert-error fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<?php //echo lang('us_banned_admin_note'); ?>
		</div>
	</div>
</div> -->
<?php // endif; ?>

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
	    	<li><?php echo anchor('gfusers/gfusers/profile', lang("gfusers_basic_data"), 'title="Προσωπικά Στοιχεία"'); ?></li>
		    <li class="active"><?php echo anchor('gfusers/gfusers/personal_data', lang("gfusers_personal_data"), 'title="Προσωπικά Στοιχεία"'); ?></li>
		    <li><?php echo anchor('gfusers/gfusers/company_data', lang("gfusers_company_data"), 'title="Προσωπικά Στοιχεία"'); ?>
		    </li>
	    </ul>

<?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
	<?php //echo $gfusers->name ?>
    <div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_name"), 'name', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="name" type="text" name="name" maxlength="255" value="<?php echo set_value('name', isset($gfusers->name) ? $gfusers->name : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('name'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('last_name') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_last_name"), 'last_name', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="last_name" type="text" name="last_name" maxlength="255" value="<?php echo set_value('last_name', isset($gfusers->last_name) ? $gfusers->last_name : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('last_name'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('comp_email') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_email"), 'comp_email', array('class' => "control-label") ); ?>
        <div class='controls'>
        <input id="comp_email" type="text" name="comp_email" maxlength="255" value="<?php echo set_value('comp_email', isset($gfusers->comp_email) ? $gfusers->comp_email : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('comp_email'); ?></span>
        </div>
    </div>

    <div class="control-group <?php echo form_error('website') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_website"), 'website', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="website" type="text" name="website" maxlength="255" value="<?php echo set_value('website', isset($gfusers->website) ? $gfusers->website : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('website'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('address') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_address"), 'address', array('class' => "control-label") ); ?>
        <div class='controls'>
        <input id="address" type="text" name="address" maxlength="255" value="<?php echo set_value('address', isset($gfusers->address) ? $gfusers->address : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('address'); ?></span>
        </div>
    </div>

    <div class="control-group <?php echo form_error('city') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_city"), 'city', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="city" type="text" name="city" maxlength="255" value="<?php echo set_value('city', isset($gfusers->city) ? $gfusers->city : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('city'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('state') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_state"), 'state', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="state" type="text" name="state" maxlength="255" value="<?php echo set_value('state', isset($gfusers->state) ? $gfusers->state : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('state'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('zip') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_zip"), 'zip', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="zip" type="text" name="zip" maxlength="20" value="<?php echo set_value('zip', isset($gfusers->zip) ? $gfusers->zip : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('zip'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('country') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_country"), 'country', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="gfusers_country" type="text" name="country" maxlength="255" value="<?php echo set_value('country', isset($gfusers->country) ? $gfusers->country : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('country'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('phone_1') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_phone_1"), 'phone_1', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="phone_1" type="text" name="phone_1" maxlength="100" value="<?php echo set_value('phone_1', isset($gfusers->phone_1) ? $gfusers->phone_1 : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('phone_1'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('phone_2') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_phone_2"), 'phone_2', array('class' => "control-label") ); ?>
        <div class='controls'>
	    <input id="phone_2" type="text" name="phone_2" maxlength="100" value="<?php echo set_value('phone_2', isset($gfusers->phone_2) ? $gfusers->phone_2 : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('phone_2'); ?></span>
	    </div>
    </div>

    <div class="control-group <?php echo form_error('fax') ? 'error' : ''; ?>">
        <?php echo form_label(lang("gfusers_fax"), 'fax', array('class' => "control-label") ); ?>
        <div class='controls'>
        <input id="fax" type="text" name="fax" maxlength="100" value="<?php echo set_value('fax', isset($gfusers->fax) ? $gfusers->fax : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('fax'); ?></span>
        </div>
    </div>

    <div class="form-actions">
        <br/>
        <input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('gfusers_new') ; ?>" />
        <?php //echo lang('bf_or') ?> <?php echo anchor(SITE_AREA .'/gfusers/gfusers',  lang('gfusers_cancel'), 'class="btn"'); ?>
        
		<?php if ($this->auth->has_permission('Gfusers.Content.Delete')) : ?>

	        <!-- or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('gfusers_delete_confirm'); ?>')">
	        <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('gfusers_delete_record'); ?>
	        </button> -->

	    <?php endif; ?>
	</div>
	<!-- End of Form Actions -->

<?php echo form_close(); ?>

	</div>
</div>
</section>