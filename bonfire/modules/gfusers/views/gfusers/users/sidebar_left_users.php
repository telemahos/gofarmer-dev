<div class=''>
	<div class=' left-bar-widget'>
		<img src="<?php echo base_url('assets/images/users/thumbs') . '/' . $gfusers->image ?>" width='260' height='170' class="img-polaroid">
		<div class="left-bar-widget-name">
			<?php if(empty($gfusers->name) == false) : echo ' <strong>' . $gfusers->name . '</strong>'; endif;
			if(empty($gfusers->last_name) == false) : echo '<strong> ' . $gfusers->last_name . '</strong>'; endif; ?>
		</div>
		<div class="left-bar-widget-username">
			<?php echo $user->username; ?>
		</div>
	</div>

	<hr>

	<div class=' left-bar-widget'>
	    <p>
	    	<?php if(empty($follower) == true) :  ?>
	      		<a href="<?php echo site_url("followers/followers/follow") ."/". $user->id; ?>" class="btn btn-block" title='Στις Επαφές'><i class="icon-eye-open"></i>&nbsp;Ακολούθησε</a>
	      	<?php else : ?>
	      		<a href="<?php echo site_url("followers/followers/unFollow") ."/". $user->id; ?>" class="btn btn-block btn-danger" title='Στις Επαφές'><i class="icon-eye-close icon-white"></i>&nbsp;Άρση Ακολούθησης</a>
	      	<?php endif; ?> 
	      	<a href="<?php echo site_url("messages/messages/write_mail"); ?>" class="btn btn-block " title='Μήνυμα'><i class="icon-envelope"></i>&nbsp;Αποστολή Μηνύματος</a>
	    </p>
  	</div>

  	<hr>

	<div class=' left-bar-widget'>
		
		<div class='left-bar-widget-contact'>
			<address>
				<!-- State Country-->
				<?php if(empty($gfusers->state) == false) : echo '<i class="icon-map-marker"></i> <em>&nbsp;' . $gfusers->state . '</em>'; endif; 
			 	  if(empty($gfusers->country) == false) : echo ', &nbsp;' . $gfusers->country .'<br>'; 
			 	  endif; ?>
				<!-- Website -->
				<?php if(empty($gfusers->website) == false) : ?>
				<?php echo '<i class="icon-globe"></i> &nbsp;<a href="' . $gfusers->website . '">' . $gfusers->website .'</a><br>'; ?>
				<?php endif ?>
				<!-- E-mail -->
				<?php if(isset($user->email) == true) : ?>
				<?php echo '<i class="icon-envelope"></i> &nbsp;<a href="mailto:' .$user->email . '">' . $user->email .'</a><br>'; ?>
				<?php endif ?>
				<!-- Phone 1 -->
				<?php if(empty($gfusers->phone_1) == false) : ?>
				<?php echo '<abbr title="Κινητό"><i class="icon-signal"></i> </abbr>&nbsp;' . $gfusers->phone_1 .'<br>'; ?>
				<?php endif ?>
				<i class="icon-time"></i> &nbsp;<span class='left-side-soft'>Μέλος από </span><?php echo date('j M, Y', strtotime($user->created_on)); ?>

			</address>
		</div>
	</div>

	<hr>

	<div class='left-bar-widget'>
		<div class="nums left">
			<table class=''>
				<thead>
					<tr>
						<th class="span4">
							<a href="<?php echo site_url('gfusers/gf_users_profile/users_crops') . '/' . $user->id; ?>"><?php echo $total_crops; ?></a>
						</th>
						<th class="span4">
							<a href="<?php echo site_url('gfusers/gf_users_profile/users_crop_offers') . '/' . $user->id; ?>"><?php echo $total_croffers; ?></a> 
						</th >
						<th class="span4">
							<a href="<?php echo site_url('gfusers/gf_users_profile/users_following') . '/' . $user->id; ?>"><?php echo $total_following; ?></a>
						</th>
						<th class="span4">
							<a href="<?php echo site_url('gfusers/gf_users_profile/users_followers') . '/' . $user->id; ?>"><?php echo $total_followers; ?></a>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="span4">
							Καλλιέργειες&nbsp;
						</td>
						<td class="span4">
							Προσφορές&nbsp;
						</td>
						<td class="span4">
							Ακολουθεί&nbsp;
						</td>
						<td class="span3">
							ακόλουθοι&nbsp;
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	
	<!-- <div class=' left-bar-widget'>
    	<div class='header'>
    		<h4>Σχετικά</h4>
    	</div>
    	<p>Ονομάζομαι Κωνσταντίνος Κακούλης με έδρα τη Βέροια Ημαθίας και σχεδιάζω ιστοσελίδες. Είμαι αφοσιωμένος στη λεπτομέρεια και την εμμονή για την τελειότητα. Έχω εξειδικευτεί στην ανάπτυξη απλών, κομψών και επαγγελματικών ιστοσελίδων... <span><a href="#">[Περισότερα]</a></span></p>
  	</div> -->

</div>