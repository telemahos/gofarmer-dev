<section id="profile">

	<div class="page-header">
		<h4><?php echo lang('us_edit_profile'); ?></h4>
	</div>

<?php if (validation_errors()) : ?>
<div class="row-fluid">
	<div class="span5">
		<div class="alert alert-error fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<?php echo  validation_errors(); ?>
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
		    <li><?php echo anchor('gfusers/gfusers/personal_data', lang("gfusers_personal_data"), 'title="Προσωπικά Στοιχεία"'); ?></li>
		    <li class="active"><?php echo anchor('gfusers/gfusers/company_data', lang("gfusers_company_data"), 'title="Προσωπικά Στοιχεία"'); ?>
		    </li>
	    </ul>

<?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>

	<div class="control-group <?php echo form_error('comp_name') ? 'error' : ''; ?>">
	    <?php echo form_label(lang("gfusers_comp_name"), 'comp_name', array('class' => "control-label") ); ?>
	    <div class='controls'>
	    <input id="comp_name" type="text" name="comp_name" maxlength="255" value="<?php echo set_value('comp_name', isset($gfusers->comp_name) ? $gfusers->comp_name : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('comp_name'); ?></span>
	    </div>
	</div>

	<div class="control-group <?php echo form_error('comp_description') ? 'error' : ''; ?>">
	    <?php echo form_label(lang("gfusers_comp_description"), 'comp_description', array('class' => "control-label") ); ?>
	    <div class='controls'>
	        <?php echo form_textarea( array( 'name' => 'comp_description', 'id' => 'comp_description', 'rows' => '5', 'cols' => '80', 'value' => set_value('comp_description', isset($gfusers->comp_description) ? $gfusers->comp_description : '') ) )?>
	        <span class="help-inline"><?php echo form_error('comp_description'); ?></span>
	    </div>
	</div>

	<div class="control-group <?php echo form_error('comp_category') ? 'error' : ''; ?>">
	    <?php echo form_label(lang("gfusers_comp_category"), 'comp_category', array('class' => "control-label") ); ?>
	    <div class='controls'>
	    <input id="comp_category" type="text" name="comp_category" maxlength="255" value="<?php echo set_value('comp_category', isset($gfusers->comp_category) ? $gfusers->comp_category : ''); ?>"  />
	    <span class="help-inline"><?php echo form_error('comp_category'); ?></span>
	    </div>
	</div>

	  <div class="form-actions">
        <br/>
        <input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('gfusers_new') ; ?>" />
        <?php //echo lang('bf_or') ?> <?php echo anchor(SITE_AREA .'/gfusers/gfusers',  lang('gfusers_cancel'), 'class="btn"'); ?>
        
		<?php if ($this->auth->has_permission('Gfusers.Content.Delete')) : ?>

	        <?php //echo lang('bf_or') ?> <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('gfusers_delete_confirm'); ?>')">
	        <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('gfusers_delete_record'); ?>
	        </button>

	    <?php endif; ?>
	</div>
	<!-- End of Form Actions -->

<?php echo form_close(); ?>

	</div>
</div>
</section>