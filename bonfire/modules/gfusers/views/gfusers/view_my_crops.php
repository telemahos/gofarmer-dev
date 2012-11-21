<div class="my-crops">
	    <ul class="nav nav-tabs">
		    <li class="active">
		    	<a href="#">Καλλιέργειες</a>
		    </li>
		    <li><a href="<?php echo site_url('gfusers/gf_my_profile/my_crop_offers'); ?>">Προσφορές</a></li>
		    <li class="dropdown pull-right">
				<a class="dropdown-toggle"
				data-toggle="dropdown"
				href="#">
				Επιλογές
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('crop/add_crop') ?>">Νέα Καλλιέργεια</a></li>
					<li><a href="<?php echo site_url('croffer/create') ?>">Νέα Προσφορά</a></li>
					<li><a href="<?php echo site_url('gfusers/gf_my_profile') ?>">Προφίλ</a></li>
				</ul>
			</li>
	    </ul>
	    <br>

	<!-- <h3><?php //echo lang('crop_view_my_crops_title') ?></h3><hr> -->
	<?php echo form_open($this->uri->uri_string()); ?>	
		<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<div class="media">
			      <a class="pull-left" href="<?php echo site_url('crop/crop/edit') . '/' . $record->crop_id; ?>">
			        <img class="media-object" src="<?php echo base_url('assets/images/weat-64.png'); ?>" width='64' height='64'>
			      </a> 
			      <div class="media-body">
			        <h4 class="media-heading"><a href="<?php echo site_url('crop/crop/edit') . '/' . $record->crop_id; ?>"><?php echo $record->crops_gr?></a><small><span class='pull-right'><em>στρέμματα&nbsp;&nbsp;&nbsp;<b><?php echo $record->hectar?></b> στρ.</em></span></small></h4>
			        <p><em>ποικιλία <b><?php echo $record->crop_variety_gr?></b></em>&nbsp;&nbsp;&nbsp;
		        		<?php if($record->certification == 0) : ?>
							<?php echo '<span class="muted">|&nbsp;&nbsp;&nbsp; Συμβατική Καλλιέργεια</span>'; ?>
						<?php elseif ($record->certification == 1) : ?>
							<?php echo '<span class="text-info">|&nbsp;&nbsp;&nbsp; Ολοκληρωμένη Διαχείρηση</span>'; ?>
						<?php else : ?>
							<?php echo '<span class="text-success">|&nbsp;&nbsp;&nbsp; Βιολογική Καλλιέργεια</span>'; ?>
						<?php endif ?>
			        </p>
			        <p><?php echo $record->comment?></p>
			        <small class='muted'>Τελευταία ενημέρωση στις <b><?php echo date('j M, Y', strtotime($record->created_on)); ?></b>
			        	<span><a href="#modal_del_crop<?php echo $record->crop_id; ?>" data-toggle="modal" class='btn btn-mini pull-right' title='Διαγραφή'><i class="icon-trash"></i></a></span>
			        </small>
			      </div>
			    </div>
			    <hr>

			    <!-- Modal modal_del_crop -->
				<div id="modal_del_crop<?php echo $record->crop_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Διαγραφή καλλιέργειας</h3>
					</div>
					<div class="modal-body">
						<p>
							Θέλετε να διαγράψετε την καλλιέργεια; 
							<span class='well well-small'>
							<b><?php echo $record->crops_gr; ?></b>
							<em><?php echo $record->crop_variety_gr; ?></em>
							<b><?php echo $record->hectar . '</b> στρ'; ?>
							</span>
						</p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Άκυρο</button>
						<a href="<?php echo site_url('crop/crop/delete_crop'); ?>/<?php echo $record->crop_id ?>" class="btn btn-danger"><i class='icon-trash icon-white'></i> Διαγραφή</a>
					</div>
				</div>
				<!-- End of Modal -->

			<?php endforeach; ?>
		<?php else: ?>
			No records found that match your selection.
		<?php endif; ?>
	<?php echo form_close(); ?>
</div>