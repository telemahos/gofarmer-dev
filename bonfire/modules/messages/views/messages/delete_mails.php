<div class="messages">
    <ul class="nav nav-tabs">
	    <li>
	    	<a href="<?php echo site_url('/messages/mails') ?>">Εισερχόμενα
	    		<strong>
	    		<?php if (isset($count_inbox_mails) && $count_inbox_mails > 0) : echo  "(". $count_inbox_mails . ")"; ?>
	    		<?php endif; ?>
	    		</strong>
	    	</a>
	    </li>
	    <li><a href="<?php echo site_url('/messages/send_mails') ?>">Απεσταλμένα</a></li>
	    <li class="active"><a href="#">Διαγραμμένα</a></li>
    </ul>

    <table class='table table-condensed  table-hover'>
      	<thead>
	    <tr>
	      <th>&nbsp;</th>
	      <th>Από</th>
	      <th>Θέμα</th>
	      <th>Ημερομηνία</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php //print_r($records) ?>
	  	<?php $i = 0; ?>
	  	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<?php foreach ($records as $record) : ?>
		<?php if($record->read == 0) : ?>
      	<tr class="warning">
      	<?php else :?>
      	<tr>
      	<?php endif; ?>
      	<?php $i++; ?>
      		<td>
      			<div class="control-group">
				    <div class="controls">
				      	<label class="checkbox">
				        	<input type="checkbox">
				     	</label>
				  	</div>
				</div>
      		</td>
      		<td>
      			<span><img src="<?php echo site_url('images/kostas.jpg') ?>" class="img-polaroid" width='35' height='35'><small>&nbsp;<?php echo $record->username ?></small></span>
      		</td>
      		<td>
      			<!-- Check if messages is read -->
      			<?php if($record->read == 0) : ?>
      				<strong><a href="<?php echo site_url('messages/messages/read_mail') ?><?php echo '/'. $record->msg_id ?>"><?php echo $record->subject ?></a></strong>
      			<?php else :?>
      				<a href="<?php echo site_url('messages/messages/read_mail') ?><?php echo '/'. $record->msg_id ?>"><?php echo $record->subject ?></a>
      			<?php endif; ?>
      		</td>
      		<td>
      			<small><?php echo $record->date ?></small>
      		</td>
      	</tr>
      	<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="13">No records found that match your selection.</td>
			</tr>
		<?php endif; ?>
      	<tbody>
    </table>

    <!-- <div class='divider'></div> -->
    <?php if($i > 9) : ?>
        <div class="btn-group center">
        	<a href="#" class="btn btn-small"><<</a>
		    <button class="btn btn-small">1</button>
		    <button class="btn btn-small">2</button>
		    <button class="btn btn-small">3</button>
		    <a href="#" class="btn btn-small">>></a>
	    </div>
	<?php endif; ?>
    <!-- PAGINATION -->
    <!-- <div class="pagination">
	    <ul>
		    <li class="disabled"><a href="#"><<</a></li>
		    <li class="active"><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">>></a></li>
	    </ul>
    </div> -->

    <div class='divider'></div>
	<!-- <div class="form-actions"> -->
	<button type="button" class="btn btn-small btn-inverse">Απάντηση</button>
  	<button type="button" class="btn btn-small">Αναγνωσμένο</button>
  	<button type="submit" class="btn btn-small btn-danger pull-right">Διαγραφή</button>
	<!-- </div> -->

</div>