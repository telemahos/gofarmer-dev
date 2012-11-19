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
						    <h3 class="media-heading"><a href="<?php echo site_url('croffer/croffer/edit') . '/' . $record->id; ?>"><?php echo $record->crops_gr; ?></a>&nbsp;
						    	<small>ποικιλία <b><?php echo $record->crop_variety_gr; ?></b></small>
						    </h3>
						    <span class='certification'>
						    	<?php if($record->certification == 0) : ?>
									<?php echo '<span class="label"><b>Συμβατική Καλλιέργεια</b></span>'; ?>
								<?php elseif ($record->certification == 1) : ?>
									<?php echo '<span class="label label-info"><b>Ολοκληρωμένη Διαχείρηση</b></span>'; ?>
								<?php else : ?>
									<?php echo '<span class="label label-success"><b>Βιολογική Καλλιέργεια</b></span>'; ?>
								<?php endif ?>
						    </span>
						    <p>
						    	<span class="text-info">
						    		<em>συσκευασία 
						    			<?php if($record->packaging_id == 1) : ?>
						    				<b>Όχι</b>
						    			<?php else : ?>
						    				 <b>Ναί</b>
						    			<?php endif ?>
						    			&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;ποιότητα
						    			<?php if($record->quality_id == 1) : ?> 
						    				<b>Α</b>
						    			<?php elseif ($record->quality_id == 2) : ?>
						    				<b>Β</b>
						    			<?php elseif ($record->quality_id == 3) : ?>
						    				<b>Γ</b>
						    			<?php elseif ($record->quality_id == 4) : ?>
						    				<b>Δ</b>
						    			<?php elseif ($record->quality_id == 5) : ?>
						    				<b>Ε</b>
						    			<?php elseif ($record->quality_id == 6) : ?>
						    				<b>ΣΤ</b>
						    			<?php endif ?>
						    			&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; διαθέση από <b><?php echo date('M, Y', strtotime($record->created_on)); ?></b>
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