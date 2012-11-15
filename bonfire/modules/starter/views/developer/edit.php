
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($starter) ) {
    $starter = (array)$starter;
}
$id = isset($starter['id']) ? $starter['id'] : '';
?>
<div class="admin-box">
    <h3>starter</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>



        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Edit starter" />
            or <?php echo anchor(SITE_AREA .'/developer/starter', lang('starter_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Starter.Developer.Delete')) : ?>

            or <a class="btn btn-danger" id="delete-me" href="<?php echo site_url(SITE_AREA .'/developer/starter/delete/'. $id);?>" onclick="return confirm('<?php echo lang('starter_delete_confirm'); ?>')" name="delete-me">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('starter_delete_record'); ?>
            </a>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
