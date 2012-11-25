<div class="my-crops">
	    <ul class="nav nav-tabs">
	    	<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile') . '/' . $user->id; ?>"><?php echo $user->username; ?></a></li>
		    <li class="active">
		    	<a href="#">Καλλιέργειες</a>
		    </li>
		    <li><a href="<?php echo site_url('gfusers/gf_users_profile/users_crop_offers') . '/' . $user->id; ?>">Προσφορές</a></li>
		    <li><a href="<?php echo site_url('gfusers/gf_users_profile/users_following')  . '/' . $user->id; ?>">Ακολουθεί</a></li>
			<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_followers')  . '/' . $user->id; ?>">Ακολουθείτε</a></li>
		    <li class="dropdown pull-right">
				<a class="dropdown-toggle"
				data-toggle="dropdown"
				href="#">
				
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile') . '/' . $user->id; ?>"><?php echo $user->username; ?></a></li>
				</ul>
			</li>
	    </ul>
	    <br>

	<!-- <h3><?php //echo lang('crop_view_my_crops_title') ?></h3><hr> -->
	<?php echo form_open($this->uri->uri_string()); ?>	
		<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<div class="media">
			      <a class="pull-left" href="#">
			        <img class="media-object" src="<?php echo base_url('assets/images/weat-64.png'); ?>" width='64' height='64'>
			      </a> 
			      <div class="media-body">
			        <h4 class="media-heading"><?php echo $record->crops_gr?><small><span class='pull-right'><em>στρέμματα&nbsp;&nbsp;&nbsp;<b><?php echo $record->hectar?></b> στρ.</em></span></small></h4>
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
			        </small>
			      </div>
			    </div>
			    <hr>

			<?php endforeach; ?>
		<?php else: ?>
			No records found that match your selection.
		<?php endif; ?>
	<?php echo form_close(); ?>
</div>