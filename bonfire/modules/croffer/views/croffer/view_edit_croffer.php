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
    <h4>Επεξεργασία προσφοράς<?php //echo lang('croffer_title') ?></h4>
    <!-- <div id='tips'>
        <div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><span class="label label-info">Συμβουλή:</span>&nbsp;Κάθε καταχώρηση αφορά μια <em>καλλιέργεια</em> και μια συγκεκριμένη <em>ποιότητα</em>. </p>
            <p><span class="label label-info">Συμβουλή:</span>&nbsp;Κάνετε <em>πολλαπλές καταχωρήσεις προσφοράς</em>, μιας καλλιέργειας, ανάλογα με τις <em>διαθέσιμες ποιότητες</em>.</p>
        </div>
    </div> -->
    <?php //print_r($croffer); ?>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <legend></legend>

        <input type='hidden' id="the_crop_id" value='<?php echo $user_crops_data->id ?>' >

        <!-- Loading Users Crop Data --><?php //print_r($user_crops_data); ?>
        <div class="control-group <?php echo form_error('croffer_crop_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('crop_add_crop') . lang('bf_form_label_required'), 'croffer_crop_id', array('class' => "control-label") ); ?> 
            <div class='controls'><?php //echo $croffer['crop_id']; ?>
                <select class='' name="croffer_crop_id" id='croffer_crop_id'>
                    <option value="0"><?php echo lang('crop_add_crop_select'); ?></option>
                    <?php foreach ($user_crops_data as $record) : ?>
                        <!-- Check for selected option -->
                        <?php if($record->crop == $croffer['crop_id'] && $record->variety == $croffer['variety_id'] ) : ?> 
                            <?php if($mylang == "greek"): ?>
                                <option value="<?php echo $record->crop_id?>" selected><?php echo  "(" . $record->crop_id . ") " .$record->crops_gr . " - " . $record->crop_variety_gr . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
                                </option>
                            <?php else : ?> 
                                <option value="<?php echo $record->crop_id?>" selected><?php echo  "(" . $record->crop_id . ") " .$record->crops_en . " - " . $record->crop_variety_en . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
                                </option>
                            <?php endif; ?> 
                        <!-- No Selected option -->
                        <?php else : ?>
                            <?php if($mylang == "greek"): ?>
                                <option value="<?php echo $record->crop_id?>"><?php echo  "(" . $record->crop_id . ") " .$record->crops_gr . " - " . $record->crop_variety_gr . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
                                </option>
                            <?php else : ?> 
                                <option value="<?php echo $record->crop_id?>"><?php echo  "(" . $record->crop_id . ") " .$record->crops_en . " - " . $record->crop_variety_en . " - (" . $record->hectar . " " . lang('croffer_hectar') . ")";?>
                                </option>
                            <?php endif; ?> 
                        <!-- EOF Check for selected option --> 
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
                    <?php if($croffer['quantity_type_id'] == 1 ) : ?> 
                        <option value='1' selected><?php echo lang('croffer_quantity_form_1'); ?></option>
                    <?php else : ?>
                        <option value='1'><?php echo lang('croffer_quantity_form_1'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['quantity_type_id'] == 2 ) : ?> 
                        <option value='2' selected><?php echo lang('croffer_quantity_form_2'); ?></option>
                    <?php else : ?>
                        <option value='2'><?php echo lang('croffer_quantity_form_2'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['quantity_type_id'] == 3 ) : ?> 
                        <option value='3' selected><?php echo lang('croffer_quantity_form_3'); ?></option>
                    <?php else : ?>
                        <option value='3'><?php echo lang('croffer_quantity_form_3'); ?></option>
                    <?php endif; ?>
                </select>
                <span class="help-inline"><?php echo form_error('croffer_quantity'); ?></span>
            </div>
        </div>




        <div class="control-group <?php echo form_error('croffer_packaging_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_packaging'), 'croffer_packaging_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="croffer_packaging_id" id='croffer_packaging_id'>
                    <?php if($croffer['packaging_id'] == 1 ) : ?> 
                        <option value='1' selected><?php echo lang('croffer_no'); ?></option>
                        <option value='2'><?php echo lang('croffer_yes'); ?></option>
                    <?php else : ?>
                        <option value='1'><?php echo lang('croffer_no'); ?></option>
                        <option value='2' selected><?php echo lang('croffer_yes'); ?></option>
                    <?php endif; ?>
                </select>
                <span class="help-inline"><?php echo form_error('croffer_packaging_id'); ?></span>
            </div>
        </div>


        <div class="control-group <?php echo form_error('croffer_quality_id') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_quality'), 'croffer_quality_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="croffer_quality_id" id='croffer_quality_id'>
                    <?php if($croffer['quality_id'] == 1 ) : ?> 
                        <option value='1' selected><?php echo lang('croffer_quality_a'); ?></option>
                    <?php else : ?>
                        <option value='1'><?php echo lang('croffer_quality_a'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['quality_id'] == 2 ) : ?> 
                        <option value='2' selected><?php echo lang('croffer_quality_b'); ?></option>
                    <?php else : ?>
                        <option value='2'><?php echo lang('croffer_quality_b'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['quality_id'] == 3 ) : ?> 
                        <option value='3' selected><?php echo lang('croffer_quality_c'); ?></option>
                    <?php else : ?>
                        <option value='3'><?php echo lang('croffer_quality_c'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['quality_id'] == 4 ) : ?> 
                        <option value='4' selected><?php echo lang('croffer_quality_d'); ?></option>
                    <?php else : ?>
                        <option value='4'><?php echo lang('croffer_quality_d'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['quality_id'] == 5 ) : ?> 
                        <option value='5' selected><?php echo lang('croffer_quality_e'); ?></option>
                    <?php else : ?>
                        <option value='5'><?php echo lang('croffer_quality_e'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['quality_id'] == 6 ) : ?> 
                        <option value='6' selected><?php echo lang('croffer_quality_f'); ?></option>
                    <?php else : ?>
                        <option value='6'><?php echo lang('croffer_quality_f'); ?></option>
                    <?php endif; ?>
                </select>
                <span class="help-inline"><?php echo lang('croffer_quality_help'); ?></span>
            </div>
        </div>


        <div class="control-group <?php echo form_error('croffer_price') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_price'), 'croffer_price', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input class='input-small' id="croffer_price" type="text" name="croffer_price" maxlength="11" value="<?php echo set_value('croffer_price', isset($croffer['price']) ? $croffer['price'] : ''); ?>"  /> <span class='muted'>&nbsp;<small><?php echo lang('croffer_per') ?>&nbsp; </small></span>
                <select class='input-small' name="croffer_price_per" id='croffer_price_per'>
                    <?php if($croffer['price_per'] == 1 ) : ?> 
                        <option value='1' selected><?php echo lang('croffer_price_per_1'); ?></option>
                    <?php else : ?>
                        <option value='1'><?php echo lang('croffer_price_per_1'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['price_per'] == 2 ) : ?> 
                        <option value='1' selected><?php echo lang('croffer_price_per_2'); ?></option>
                    <?php else : ?>
                        <option value='1'><?php echo lang('croffer_price_per_2'); ?></option>
                    <?php endif; ?>
                    <?php if($croffer['price_per'] == 3 ) : ?> 
                        <option value='1' selected><?php echo lang('croffer_price_per_3'); ?></option>
                    <?php else : ?>
                        <option value='1'><?php echo lang('croffer_price_per_3'); ?></option>
                    <?php endif; ?>
                </select>
                <span class="help-inline"><?php echo form_error('croffer_price'); ?></span>
            </div>
        </div>



         <div class="control-group <?php echo form_error('croffer_release_date') ? 'error' : ''; ?>">
            <?php echo form_label(lang('croffer_release'), 'croffer_release_date', array('class' => "control-label") ); ?>
            <div class='controls'>
            <input id="croffer_release_date" type="text" name="croffer_release_date" maxlength="30" value="<?php echo set_value('croffer_release_date', isset($croffer['release_date']) ? date('j M, Y', strtotime($croffer['release_date']))  : ''); ?>"  />
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

        <!-- <div class="control-group <?php //echo form_error('croffer_image') ? 'error' : ''; ?>">
            <?php //echo form_label(lang('croffer_image'), 'croffer_image', array('class' => "control-label") ); ?>
            <div class='controls'>
            <input id="croffer_image" type="text" name="croffer_image" maxlength="250" value="<?php //echo set_value('croffer_image', isset($croffer['croffer_image']) ? $croffer['croffer_image'] : ''); ?>"  />
            <span class="help-inline"><?php //echo form_error('croffer_image'); ?></span>
            </div>
        </div> -->

        <div class="form-actions">
            <input type="submit" id="save2" name="save2" class="btn btn-primary" value="<?php echo lang('croffer_add') ?>" />
             <?php echo anchor(SITE_AREA .'/content/croffer', lang('croffer_cancel'), 'class="btn"'); ?>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>