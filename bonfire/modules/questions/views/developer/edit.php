
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($questions) ) {
    $questions = (array)$questions;
}
$id = isset($questions['q_id']) ? $questions['q_id'] : '';
?>
<div class="admin-box">
    <h3>Questions</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('questions_question_id') ? 'error' : ''; ?>">
            <?php echo form_label('Question ID', 'questions_question_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_question_id" type="text" name="questions_question_id" maxlength="20" value="<?php echo set_value('questions_question_id', isset($questions['questions_question_id']) ? $questions['questions_question_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_question_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User ID', 'questions_user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_user_id" type="text" name="questions_user_id" maxlength="20" value="<?php echo set_value('questions_user_id', isset($questions['questions_user_id']) ? $questions['questions_user_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_user_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_body') ? 'error' : ''; ?>">
            <?php echo form_label('Body', 'questions_body', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_body" type="text" name="questions_body"  value="<?php echo set_value('questions_body', isset($questions['questions_body']) ? $questions['questions_body'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_body'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_category') ? 'error' : ''; ?>">
            <?php echo form_label('Category', 'questions_category', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_category" type="text" name="questions_category" maxlength="3" value="<?php echo set_value('questions_category', isset($questions['questions_category']) ? $questions['questions_category'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_category'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_sub_category') ? 'error' : ''; ?>">
            <?php echo form_label('Sub Category', 'questions_sub_category', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_sub_category" type="text" name="questions_sub_category" maxlength="5" value="<?php echo set_value('questions_sub_category', isset($questions['questions_sub_category']) ? $questions['questions_sub_category'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_sub_category'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_details') ? 'error' : ''; ?>">
            <?php echo form_label('Details', 'questions_details', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_details" type="text" name="questions_details"  value="<?php echo set_value('questions_details', isset($questions['questions_details']) ? $questions['questions_details'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_details'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_note') ? 'error' : ''; ?>">
            <?php echo form_label('Note', 'questions_note', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_note" type="text" name="questions_note"  value="<?php echo set_value('questions_note', isset($questions['questions_note']) ? $questions['questions_note'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_note'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_is_answer') ? 'error' : ''; ?>">
            <?php echo form_label('Is Answer', 'questions_is_answer', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_is_answer" type="text" name="questions_is_answer" maxlength="1" value="<?php echo set_value('questions_is_answer', isset($questions['questions_is_answer']) ? $questions['questions_is_answer'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_is_answer'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_is_private') ? 'error' : ''; ?>">
            <?php echo form_label('Is Private', 'questions_is_private', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_is_private" type="text" name="questions_is_private" maxlength="1" value="<?php echo set_value('questions_is_private', isset($questions['questions_is_private']) ? $questions['questions_is_private'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_is_private'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('questions_is_closed') ? 'error' : ''; ?>">
            <?php echo form_label('Is Closed', 'questions_is_closed', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="questions_is_closed" type="text" name="questions_is_closed" maxlength="1" value="<?php echo set_value('questions_is_closed', isset($questions['questions_is_closed']) ? $questions['questions_is_closed'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('questions_is_closed'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Questions" />
            or <?php echo anchor(SITE_AREA .'/developer/questions', lang('questions_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Questions.Developer.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('questions_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('questions_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
