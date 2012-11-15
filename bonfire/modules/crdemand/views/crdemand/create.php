<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($crdemand) ) {
    $crdemand = (array)$crdemand;
}
$id = isset($crdemand['id']) ? $crdemand['id'] : '';
?>
<div class="admin-box">
    <h3><?php echo lang("crdemand_title"); ?></h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <legend></legend>
        <!-- TYPEAHEAD version -->
        <!-- <div class="control-group <?php //echo form_error('crop_id') ? 'error' : ''; ?>">
            <?php //echo form_label(lang('crdemand_crop'). lang('bf_form_label_required'), 'crop_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="typeahead" type="text" name="typeahead" data-provide="typeahead" maxlength="20" />
                <span class="help-inline"><?php //echo form_error('crop_id'); ?></span>
                <span class="help-inline"><?php //echo lang('crdemand_new_crop_help'); ?></span>
            </div>
        </div> -->

        <div class="control-group <?php echo form_error('crop_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crdemand_crop') . lang('bf_form_label_required'), 'crop_id', array('class' => "control-label") ); ?> 
            <div class='controls'>
                <select class='' name="crop_id" id='crop_id'>
                    <option value="0"><?php echo lang('crop_add_crop_select'); ?></option>
                    <?php foreach ($crop_crops  as $record) : ?>
                        <?php if($mylang == "greek"): ?>
                            <option value="<?php echo $record['crop_crops_id']; ?>"><?php echo $record['crops_gr']; ?>
                            </option>
                        <?php else : ?> 
                            <option value="<?php echo $record['crop_crops_id']; ?>"><?php echo  $record['crops_en'];?>
                            </option>
                        <?php endif; ?>     
                            <!-- End of selected control point --> 
                    <?php endforeach; ?>
                </select> 
                <span class="help-inline"><?php echo form_error('crop_id'); ?></span>
                <span class="help-inline"><?php echo lang('crdemand_new_crop_help'); ?></span>
            </div>
        </div>

        <div class="control-group <?php echo form_error('variety_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crdemand_crop_variety'), 'variety_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select id="variety_id" name="variety_id"></select>
               <!--  <input id="crdemand_variety_id" type="text" name="crdemand_variety_id" maxlength="11" value="<?php //echo set_value('crdemand_variety_id', isset($crdemand['crdemand_variety_id']) ? $crdemand['crdemand_variety_id'] : ''); ?>"  /> -->
                <span class="help-inline"><?php echo form_error('variety_id'); ?></span>
            </div>
        </div>

        <div class="control-group <?php echo form_error('quantity') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crdemand_quantity'), 'quantity', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input class='input-small' id="quantity" type="text" name="quantity" maxlength="11" value="<?php echo set_value('quantity', isset($crdemand['quantity']) ? $crdemand['quantity'] : ''); ?>"  /><span class='muted'><small>&nbsp;<?php echo lang('crdemand_quantity_type') ?>&nbsp;</small></span>
                <select class='input-small' name="quantity_type_id" id='quantity_type_id'>
                    <option value='1'><?php echo lang('crdemand_quantity_type_id_1'); ?></option>
                    <option value='2'><?php echo lang('crdemand_quantity_type_id_2'); ?></option>
                    <option value='3'><?php echo lang('crdemand_quantity_type_id_3'); ?></option>
                </select>
                <span class="help-inline"><?php echo form_error('quantity'); ?></span>
                <span class="help-inline"><?php echo lang('crdemand_quantity_help'); ?></span>
            </div>
        </div>

        <div class="control-group <?php echo form_error('ackaging_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crdemand_packaging'), 'packaging_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="packaging_id" id='packaging_id'>
                    <option value='1'><?php echo lang('crdemand_packaging_id_1'); ?></option>
                    <option value='2'><?php echo lang('crdemand_packaging_id_2'); ?></option>
                </select>
                <span class="help-inline"><?php echo form_error('packaging_id'); ?></span>
                <span class="help-inline"><?php echo lang('crdemand_packaging_help'); ?></span>
            </div>
        </div>

        <div class="control-group <?php echo form_error('price') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crdemand_price'), 'price', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input class='input-small' id="price" type="text" name="price" maxlength="11" value="<?php echo set_value('price', isset($crdemand['price']) ? $crdemand['price'] : ''); ?>"  /> <span class='muted'>&nbsp;<small><?php echo lang('crdemand_price_per') ?>&nbsp; </small></span>
                <select class='input-small' name="price_per" id='price_per'>
                    <option value='1'><?php echo lang('crdemand_price_per_1'); ?></option>
                    <option value='2'><?php echo lang('crdemand_price_per_2'); ?></option>
                    <option value='3'><?php echo lang('crdemand_price_per_3'); ?></option>
                </select>
                <span class="help-inline"><?php echo form_error('price'); ?></span>
            </div>
        </div>

        <div class="control-group <?php echo form_error('release_date') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crdemand_date_of_receipt'), 'release_date', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="release_date" type="text" name="release_date"  value="<?php echo set_value('release_date', isset($crdemand['release_date']) ? $crdemand['release_date'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('release_date'); ?></span>
                <span class="help-inline"><?php echo lang('crdemand_date_of_receipt_help'); ?></span>
            </div>
        </div>

        <div class="control-group <?php echo form_error('comment') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crdemand_comment'), 'comment', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php echo form_textarea( array( 'name' => 'comment', 'id' => 'comment', 'rows' => '5', 'cols' => '80', 'value' => set_value('comment', isset($crdemand['comment']) ? $crdemand['comment'] : '') ) )?>
                <span class="help-inline"><?php echo form_error('comment'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('crdemand_btn_new'); ?>" />
             <?php echo anchor(SITE_AREA .'/developer/crdemand', lang('crdemand_cancel'), 'class="btn"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>