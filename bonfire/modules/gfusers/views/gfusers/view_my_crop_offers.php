<div class="my-crop-offers">
	<ul class="nav nav-tabs">
	    <li>
	    	<a href="<?php echo site_url('gfusers/gf_my_profile/my_crops'); ?>">Καλλιέργειες</a>
	    </li>
	    <li class="active"><a href="#">Προσφορές</a></li>
	    <li class="dropdown pull-right">
				<a class="dropdown-toggle"
				data-toggle="dropdown"
				href="#">
				Επιλογές
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('gfusers/gf_my_profile') ?>">Προφίλ</a></li>
					<li><a href="<?php echo site_url('crop/add_crop') ?>">Νέα Καλλιέργεια</a></li>
					<li><a href="<?php echo site_url('croffer/create') ?>">Νέα Προσφορά</a></li>
					<li><a href="<?php echo site_url('gfusers/gf_my_profile/following') ?>">Ακολουθώ</a></li>
					<li><a href="<?php echo site_url('gfusers/gf_my_profile/followers') ?>">Ακόλουθοι</a></li>
				</ul>
			</li>
    </ul>
    <br>
	<!-- <h3>Οι προσφορές μου<?php //echo lang('crop_view_my_crops_title') ?></h3><hr> -->

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
						    <h3 class="media-heading"><a href="<?php echo site_url('croffer/croffer/edit') . '/' . $record->id; ?>" title='Επεξεργασία'><?php echo $record->crops_gr; ?></a>&nbsp;
						    	<small>ποικιλία <b><?php echo $record->crop_variety_gr; ?></b>
						    		<span>&nbsp;&nbsp;&nbsp;<a href="#modal_del_croffer<?php echo $record->id; ?>" data-toggle="modal" class='btn btn-mini' title='Διαγραφή'><i class="icon-trash"></i></a></span>
						    	</small>
						    </h3>

						    <!-- Modal modal_del_croffer -->
							<div id="modal_del_croffer<?php echo $record->id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 id="myModalLabel">Διαγραφή προσφοράς</h3>
								</div>
								<div class="modal-body">
									<p>
										Θέλετε να διαγράψετε την προσφορά; 
										<span class='well well-small'>
										<b><?php echo $record->crops_gr; ?></b>
										<em><?php echo $record->crop_variety_gr; ?></em>
										<b><?php echo $record->quantity . '</b> Τόνοι'; ?>
										</span>
									</p>
								</div>
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">Άκυρο</button>
									<a href="<?php echo site_url('croffer/croffer/delete_croffer'); ?>/<?php echo $record->id ?>" class="btn btn-danger"><i class='icon-trash icon-white'></i> Διαγραφή</a>
								</div>
							</div>
							<!-- End of Modal -->
						    
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
						    <small class='muted'>Τελευταία ενημέρωση στις <b><?php echo date('j M, Y', strtotime($record->created_on)); ?></b>
						    </small>
						    
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