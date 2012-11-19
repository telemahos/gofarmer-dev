<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($croffer) ) {
    $croffer = (array)$croffer;
}
$id = isset($croffer['id']) ? $croffer['id'] : '';
?>

<div class="">
    <h4><?php echo lang('croffer_title') ?></h4>
    <!-- <div id='tips'>
        <div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><span class="label label-info">Συμβουλή:</span>&nbsp;Κάθε καταχώρηση αφορά μια <em>καλλιέργεια</em> και μια συγκεκριμένη <em>ποιότητα</em>. </p>
            <p><span class="label label-info">Συμβουλή:</span>&nbsp;Κάνετε <em>πολλαπλές καταχωρήσεις προσφοράς</em>, μιας καλλιέργειας, ανάλογα με τις <em>διαθέσιμες ποιότητες</em>.</p>
        </div>
    </div> -->

    <?php print_r($croffer); ?>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <legend></legend>

        <input type='hidden' id="the_crop_id" value='<?php echo $user_crops_data->id ?>' >

        <!-- Loading Users Crop Data --><?php //print_r($user_crops_data); ?>
        <div class="control-group <?php echo form_error('croffer_crop_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crop_add_crop') . lang('bf_form_label_required'), 'croffer_crop_id', array('class' => "control-label") ); ?> 
            <div class='controls'>
                <select class='' name="croffer_crop_id" id='croffer_crop_id'>
                    <option value="0"><?php echo lang('crop_add_crop_select'); ?></option>
                    <?php foreach ($user_crops_data as $record) : ?>
                        <?php if($mylang == "greek"): ?>
                            <option value="<?php echo $record->crop?>"><?php echo  "(" . $record->crop . ") " .$record->crops_gr . " - " . $record->crop_variety_gr . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
                            </option>
                        <?php else : ?> 
                            <option value="<?php echo $record->crop?>"><?php echo  "(" . $record->crop . ") " .$record->crops_en . " - " . $record->crop_variety_en . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
                            </option>
                        <?php endif; ?>     
                            <!-- End of selected control point --> 
                    <?php endforeach; ?>
                </select> 
                <span class="help-inline"><?php echo form_error('croffer_crop_id'); ?></span>
                <span class="help-inline"><?php echo lang('croffer_new_crop_help'); ?><a href="crop/add_crop"><?php echo anchor('crop/add_crop', lang('croffer_new_crop'), ''); ?></a></span>
            </div>
        </div>


        <div class="control-group <?php echo form_error('croffer_quantity') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_quantity'), 'croffer_quantity', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input class='input-small' id="croffer_quantity" type="text" name="croffer_quantity" maxlength="11" value="<?php echo set_value('croffer_quantity', isset($croffer['quantity']) ? $croffer['quantity'] : ''); ?>"  /> <span class='muted'><small>&nbsp;<?php echo lang('croffer_in') ?>&nbsp;</small></span>
                <select class='input-small' name="croffer_quantity_type_id" id='croffer_quantity_type_id'>
                    <option value='1'><?php echo lang('croffer_quantity_form_1'); ?></option>
                    <option value='2'><?php echo lang('croffer_quantity_form_2'); ?></option>
                    <option value='3'><?php echo lang('croffer_quantity_form_3'); ?></option>
                </select>
                <span class="help-inline"><?php echo form_error('croffer_quantity'); ?></span>
            </div>
        </div>




        <div class="control-group <?php echo form_error('croffer_packaging_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_packaging'), 'croffer_packaging_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="croffer_packaging_id" id='croffer_packaging_id'>
                    <option value='1'><?php echo lang('croffer_no'); ?></option>
                    <option value='2'><?php echo lang('croffer_yes'); ?></option>
                </select>
                <span class="help-inline"><?php echo form_error('croffer_packaging_id'); ?></span>
            </div>
        </div>


        <div class="control-group <?php echo form_error('croffer_quality_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_quality'), 'croffer_quality_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="croffer_quality_id" id='croffer_quality_id'>
                    <option value='1'><?php echo lang('croffer_quality_a'); ?></option>
                    <option value='2'><?php echo lang('croffer_quality_b'); ?></option>
                    <option value='3'><?php echo lang('croffer_quality_c'); ?></option>
                    <option value='4'><?php echo lang('croffer_quality_d'); ?></option>
                    <option value='5'><?php echo lang('croffer_quality_e'); ?></option>
                    <option value='6'><?php echo lang('croffer_quality_f'); ?></option>
                </select>
                <span class="help-inline"><?php echo lang('croffer_quality_help'); ?></span>
            </div>
        </div>


        <div class="control-group <?php echo form_error('croffer_price') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_price'), 'croffer_price', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input class='input-small' id="croffer_price" type="text" name="croffer_price" maxlength="11" value="<?php echo set_value('croffer_price', isset($croffer['price']) ? $croffer['price'] : ''); ?>"  /> <span class='muted'>&nbsp;<small><?php echo lang('croffer_per') ?>&nbsp; </small></span>
                <select class='input-small' name="croffer_price_per" id='croffer_price_per'>
                    <option value='1'><?php echo lang('croffer_price_per_1'); ?></option>
                    <option value='2'><?php echo lang('croffer_price_per_2'); ?></option>
                    <option value='3'><?php echo lang('croffer_price_per_3'); ?></option>
                </select>
                <span class="help-inline"><?php echo form_error('croffer_price'); ?></span>
            </div>
        </div>



        <div class="control-group <?php echo form_error('croffer_release_date') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_release'), 'croffer_release_date', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_release_date" type="text" name="croffer_release_date" maxlength="30" value="<?php echo set_value('croffer_release_date', isset($croffer['croffer_release_date']) ? $croffer['croffer_release_date'] : ''); ?>"  />
        <span class="help-inline"><?php echo lang('croffer_release_help') ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_comment') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_comment'), 'croffer_comment', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'croffer_comment', 'id' => 'croffer_comment', 'rows' => '5', 'cols' => '80', 'value' => set_value('croffer_comment', isset($croffer['comment']) ? $croffer['comment'] : '') ) )?>
            <span class="help-inline"><?php echo lang('croffer_comment_help') ?></span>
        </div>

        </div>
        <div class="control-group <?php echo form_error('croffer_image') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_image'), 'croffer_image', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_image" type="text" name="croffer_image" maxlength="250" value="<?php echo set_value('croffer_image', isset($croffer['croffer_image']) ? $croffer['croffer_image'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_image'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" id="save" name="save" class="btn btn-primary" value="<?php echo lang('croffer_add') ?>" />
             <?php echo anchor(SITE_AREA .'/content/croffer', lang('croffer_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>








































<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($croffer) ) {
    $croffer = (array)$croffer;
}
$id = isset($croffer['id']) ? $croffer['id'] : '';
$quantity = isset($croffer['quantity']) ? $croffer['quantity'] : '';
echo $quantity;
?>
<div class="admin-box">
    <h3>croffer</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('croffer_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User Id'. lang('bf_form_label_required'), 'croffer_user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_user_id" type="text" name="croffer_user_id" maxlength="20" value="<?php echo set_value('croffer_user_id', isset($croffer['croffer_user_id']) ? $croffer['croffer_user_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_user_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_crop_id') ? 'error' : ''; ?>">
            <?php echo form_label('Crop Id'. lang('bf_form_label_required'), 'croffer_crop_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_crop_id" type="text" name="croffer_crop_id" maxlength="20" value="<?php echo set_value('croffer_crop_id', isset($croffer['croffer_crop_id']) ? $croffer['croffer_crop_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_crop_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_variety_id') ? 'error' : ''; ?>">
            <?php echo form_label('Variety Id', 'croffer_variety_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_variety_id" type="text" name="croffer_variety_id" maxlength="11" value="<?php echo set_value('croffer_variety_id', isset($croffer['croffer_variety_id']) ? $croffer['croffer_variety_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_variety_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_quantity') ? 'error' : ''; ?>">
            <?php echo form_label('Quantity', 'croffer_quantity', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_quantity" type="text" name="croffer_quantity" maxlength="11" value="<?php echo set_value('croffer_quantity', isset($croffer->quantity) ? $croffer->quantity : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_quantity'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_quantity_type_id') ? 'error' : ''; ?>">
            <?php echo form_label('Quantity Type Id', 'croffer_quantity_type_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_quantity_type_id" type="text" name="croffer_quantity_type_id" maxlength="2" value="<?php echo set_value('croffer_quantity_type_id', isset($croffer['croffer_quantity_type_id']) ? $croffer['croffer_quantity_type_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_quantity_type_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_packaging_id') ? 'error' : ''; ?>">
            <?php echo form_label('Packaging Id', 'croffer_packaging_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_packaging_id" type="text" name="croffer_packaging_id" maxlength="2" value="<?php echo set_value('croffer_packaging_id', isset($croffer['croffer_packaging_id']) ? $croffer['croffer_packaging_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_packaging_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_quality_id') ? 'error' : ''; ?>">
            <?php echo form_label('Quality Id', 'croffer_quality_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_quality_id" type="text" name="croffer_quality_id" maxlength="2" value="<?php echo set_value('croffer_quality_id', isset($croffer['croffer_quality_id']) ? $croffer['croffer_quality_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_quality_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_price') ? 'error' : ''; ?>">
            <?php echo form_label('Price', 'croffer_price', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_price" type="text" name="croffer_price" maxlength="11" value="<?php echo set_value('croffer_price', isset($croffer['croffer_price']) ? $croffer['croffer_price'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_price'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_release_date') ? 'error' : ''; ?>">
            <?php echo form_label('Release Date', 'croffer_release_date', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_release_date" type="text" name="croffer_release_date" maxlength="30" value="<?php echo set_value('croffer_release_date', isset($croffer['croffer_release_date']) ? $croffer['croffer_release_date'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_release_date'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('croffer_comment') ? 'error' : ''; ?>">
            <?php echo form_label('Comment', 'croffer_comment', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'croffer_comment', 'id' => 'croffer_comment', 'rows' => '5', 'cols' => '80', 'value' => set_value('croffer_comment', isset($croffer['croffer_comment']) ? $croffer['croffer_comment'] : '') ) )?>
            <span class="help-inline"><?php echo form_error('croffer_comment'); ?></span>
        </div>

        </div>
        <div class="control-group <?php echo form_error('croffer_image') ? 'error' : ''; ?>">
            <?php echo form_label('Image', 'croffer_image', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="croffer_image" type="text" name="croffer_image" maxlength="250" value="<?php echo set_value('croffer_image', isset($croffer['croffer_image']) ? $croffer['croffer_image'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('croffer_image'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit croffer" />
            or <?php echo anchor(SITE_AREA .'/content/croffer', lang('croffer_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Croffer.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('croffer_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('croffer_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
