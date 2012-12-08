<div class='side-left'>
	<div class=' left-bar-widget'>
	    <div class='header'>
	    	<?php if(empty($gfusers->image) == false) : ?>
	      		<img src="<?php echo base_url('assets/images/users') . '/' . $gfusers->image ?>" width='260' height='195' class="img-polaroid">
			<?php else : ?>
					<a href="#add_image" data-toggle='modal' title='Προσθήκη Φωτογραφίας'><img data-src="holder.js/260x195/text:[GoFarmer]/simple">
					</a>
					<!-- <a href="#add_image" data-toggle='modal' title='Προσθήκη Φωτογραφίας'><img  src="<?php //echo site_url('images/non-user.jpg') ?>" width='260' height='170'>
					</a> -->
			<?php endif; ?>
			<!-- Users Name and Lastname  -->
			<div class="left-bar-widget-name">
				<?php if(empty($gfusers->name) == false) : echo ' <strong>' . $gfusers->name . '</strong>'; endif;
				if(empty($gfusers->last_name) == false) : echo '<strong> ' . $gfusers->last_name . '</strong>'; endif; ?>
			</div>
			<div class="left-bar-widget-username">
				<a href="<?php echo site_url('gfusers/gfusers/profile');?>" title='Επεξεργασία Προφίλ'><?php echo $user->username; ?></a>
			</div>
	    </div>
	</div>

  	<hr>

  	<div class=' left-bar-widget'>
		<div class='header'>
		</div>
	    <p>
	      	<a href="#add_image" data-toggle='modal' title='Αλλαγή Φωτογραφίας' class="btn btn-block"><i class="icon-picture"></i>&nbsp;Αλλαγή Φωτογραφίας</a>
	      	<a href="<?php echo site_url('gfusers/gfusers/profile');?>" class="btn btn-block " title='Επεξεργασία Προφίλ'><i class="icon-cog"></i>&nbsp;Επεξεργασία Προφίλ</a> 
	    </p>
  	</div>

  	<hr>

	<div class=' left-bar-widget'>
		<div class='header'>
		</div>
		<div class='left-bar-widget-contact'>
			<address>
				<!-- State Country-->
				<?php if(empty($gfusers->state) == false) : echo '<i class="icon-globe"></i> <em>&nbsp;' . $gfusers->state . '</em>'; endif; 
			 	  if(empty($gfusers->country) == false) : echo ', &nbsp;' . $gfusers->country .'<br>'; 
			 	  endif; ?>
				<!-- Website -->
				<?php if(empty($gfusers->website) == false) : ?>
				<?php echo '<i class="icon-home"></i> &nbsp;<a href="' . $gfusers->website . '">' . $gfusers->website .'</a><br>'; ?>
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
		<div class="nums center">
			<table class=''>
				<thead>
					<tr>
						<th class="span3">
							<a href="<?php echo site_url('gfusers/gf_my_profile/my_crops'); ?>"><?php echo $total_crops; ?></a>
						</th>
						<th class="span3">
							<a href="<?php echo site_url('gfusers/gf_my_profile/my_crop_offers'); ?>"><?php echo $total_croffers; ?></a>
						</th >
						<th class="span3">
							<a href="<?php echo site_url('gfusers/gf_my_profile/following'); ?>"><?php echo $total_following; ?></a>
						</th>
						<th class="span3">
							<a href="<?php echo site_url('gfusers/gf_my_profile/followers'); ?>"><?php echo $total_followers; ?></a>
						</th >
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="span3">
							καλλιέργειες&nbsp;
						</td>
						<td class="span3">
							προσφορές&nbsp;
						</td>
						<td class="span3">
							ακολουθώ&nbsp;
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

  	<?php $this->load->helper('form'); ?>
	<?php $this->load->library('upload'); ?>
	<?php //$attributes = array('class' => 'well');?>
	<?php echo form_open_multipart($this->uri->uri_string()) ?>
	<!-- Modal Window for a new user image ================ -->
	<div class="modal fade" id="add_image">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Προσθήκη Φωτογραφίας</h3>
		</div>
		<div class="modal-body">
			<p>Επιλέξτε μια φωτογραφία σας. <br>
			<b>
			<?php 
				echo form_label('Φωτογραφία', 'userfile');

				/* ATTENTION *************
				* the file MUST BE have NAME "userfile".
				* Or it will not uploaded.
				*/
				
				$userfile = array(
	              'name'        => 'userfile',
	              'id'          => 'userfile',
	              'placeholder' => 'Φωτογραφία2',
	              'class' 		=> 'span8'
	            );
				echo form_upload($userfile);	
			?>
			</b></p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Άκυρο</a>
			<input type='submit' name='submit' value='Αποθήκευση' class='btn btn-primary'>
			<!-- <a href="<?php //echo site_url('arxeio/delete_record'); ?>/<?php  ?>/" class="btn btn-primary">Αποθήκευση Φωτογραφίας</a> -->
		</div>
	</div>
	<!-- END of Modal Window for for a new user image ================ -->
	<?php echo form_close(); ?>

</div>