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
	    <li class="active"><a href="#">Απεσταλμένα</a></li>
	    <li><a href="<?php echo site_url('/messages/delete_mails') ?>">Διαγραμμένα</a></li>
    </ul>

    <table class='table table-condensed  table-hover' > <!-- id='flex_table' -->
      	<thead>
	    <tr>
	      <th>&nbsp;</th>
	      <th>Από</th>
	      <th>Θέμα</th>
	      <th>Ημερομηνία</th>
	      <th>&nbsp;</th>
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
<!--       			<div class="control-group">
				    <div class="controls">
				      	<label class="checkbox">
				        	<input type="checkbox">
				     	</label>
				  	</div>
				</div> -->
      		</td>
      		<td>
      			<span><img src="<?php echo site_url('images/kostas.jpg') ?>" class="img-polaroid" width='35' height='35'><small>&nbsp;<?php echo $record->username ?></small></span>
      		</td>
      		<td>
      			<!-- Check if messages is read -->
      			<?php if($record->read == 0) : ?>
      				<strong><a title='<?php echo $record->subject; ?>' href="<?php echo site_url('messages/messages/read_mail') ?><?php echo '/'. $record->msg_id ?>"><?php echo substr($record->subject,0, 50); ?></a></strong>
      			<?php else :?>
      				<a title='<?php echo $record->subject; ?>' href="<?php echo site_url('messages/messages/read_mail') ?><?php echo '/'. $record->msg_id ?>"><?php echo substr($record->subject,0, 50);?></a>
      			<?php endif; ?>
      		</td>
      		<td>
      			<small><abbr class="timeago" title="<?php echo date('j-M-Y, G:i ', strtotime($record->date)); ?>"><?php echo date('j-M-Y, G:i ', strtotime($record->date)); ?></abbr></small>
      		</td>
      		<td>
      			<?php echo anchor('messages/messages/read_mail/' .$record->msg_id , "<i class='icon-share-alt '></i>", array('title' => 'Απάντηση', 'class' => 'btn btn-mini') ); ?>
      			<?php echo anchor("#myModal".$record->msg_id , "<i class='icon-trash '></i>", array('title' => 'Διαγραφή', 'class' => 'btn btn-mini', 'data-toggle' => 'modal', 'id' => 'delButton') ); ?>
				<!-- Modal Window for Deleting a reocrd ================ -->
				<div class="modal fade" id="myModal<?php echo $record->msg_id; ?>">
					<div class="modal-header">
						<a class="close" data-dismiss="modal">×</a>
						<h5>Διαγραφή Μηνύματος: <!-- {<?php echo $record->msg_id; ?>} --></h5>
					</div>
					<div class="modal-body">
						<p>Θέλετε να διαγράψετε το μύνημα;;; <br><b><?php echo $record->subject; ?></b></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Άκυρο</a>
						<a href="<?php echo site_url('messages/messages/delete_mail'); ?>/<?php echo $record->msg_id ?>/" class="btn btn-danger"><i class='icon-trash icon-white'></i> Διαγραφή Μηνύματος</a>
					</div>
				</div>
				<!-- END of Modal Window for Deleting a reocrd ================ -->
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
    <?php //if($i > 9) : ?>
        <!-- <div class="btn-group center">
        	<a href="#" class="btn btn-small"><<</a>
		    <button class="btn btn-small">1</button>
		    <button class="btn btn-small">2</button>
		    <button class="btn btn-small">3</button>
		    <a href="#" class="btn btn-small">>></a>
	    </div> -->
	<?php //endif; ?>
    <!-- PAGINATION -->
    <div class="pagination pagination-centered">
    	<ul>
    		<?php echo $this->pagination->create_links(); ?>
    	</ul>
	</div>
    <?php //if (strlen($pagination)): ?>
		<?php //echo $pagination; ?>
	<?php //endif; ?>

    <div class='divider'></div>


</div>