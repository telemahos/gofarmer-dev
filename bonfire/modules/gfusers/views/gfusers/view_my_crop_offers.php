<div class="my-crop-offers">
	<h3>Οι προσφορές μου<?php //echo lang('crop_view_my_crops_title') ?></h3><hr>

	<?php echo form_open($this->uri->uri_string()); ?>	
		<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<div class="row-fluid">
					<div class='span9'>
						<div class="media">
						  <a class="pull-left" href="#">
						    <!-- <<i></i>mg class="media-object" src="http://placehold.it/64x64"> -->
						  </a>
						  <div class="media-body">
						    <h3 class="media-heading"><?php echo $record->crops_gr; ?>&nbsp;
						    	<small>ποικιλία <b><?php echo $record->crop_variety_gr; ?></b></small>
						    </h3>
						    <span class=''><b>Συμβατική Καλλιέργεια <?php //echo $record->certification; ?></b></span>	
						    <p>
						    	<span class="muted">
						    		<em>συσκευασία <b><?php echo $record->packaging_id; ?></b>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;ποιότητα <b><?php echo $record->quantity_type_id; ?></b>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; διαθέση από <b><?php echo date('M, Y', strtotime($record->created_on)); ?></b>
						    		</em>
						    	</span>
						    </p>
						    <p><?php echo $record->comment; ?></p>
						    <small class='muted'>Τελευταία ενημέρωση στις <b><?php echo date('j M, Y', strtotime($record->created_on)); ?></b></small>
						    
						  </div> <!-- media-body -->
						</div> <!-- END of MEDIA -->
					</div>
					<div class='span3'>
						<div class='offer-attributes'>
							<p class='big-size pull-right muted'><?php echo $record->quantity; ?> <span>τόνοι</span></p> <br>
							<hr>
							<small class='pull-right muted'>ποσότητα</small>
						</div>
						<div class='offer-attributes'>
							<p class='big-size pull-right muted'><?php echo $record->price; ?> <span>&#8364;</span></p> <br>
							<hr>
							<small class='pull-right muted'>ανά τόνο</small>
						</div>
					</div>
				</div> <!-- end row -->
				<hr>
				<?php endforeach; ?>
		<?php else: ?>
			No records found that match your selection.
		<?php endif; ?>
	<?php echo form_close(); ?>
</div>