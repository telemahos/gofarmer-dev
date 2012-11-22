<ul class="nav nav-tabs">
		    <li>
		    	<a href="<?php echo site_url('gfusers/gf_my_profile/following'); ?>">Ακολουθείς</a>
		    </li>
		    <li class="active"><a href="#">Ακόλουθοι</a></li>
		    <li class="dropdown pull-right">
				<a class="dropdown-toggle"
				data-toggle="dropdown"
				href="#">
				Επιλογές
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('gfusers/gf_my_profile') ?>">Προφίλ</a></li>
					<li><a href="<?php echo site_url('gfusers/gf_my_profile/my_crops') ?>">Καλλιέργειες</a></li>
					<li><a href="<?php echo site_url('crop/add_crop') ?>">Νέα Καλλιέργεια</a></li>
					<li><a href="<?php echo site_url('gfusers/gfusers/gf_my_profile/my_crop_offers') ?>">Προσφορές</a></li>
					<li><a href="<?php echo site_url('croffer/create') ?>">Νέα Προσφορά</a></li>
				</ul>
			</li>
	    </ul>
	    <br>

<!-- <h3>Σε Ακολουθούν</h3>
<br> -->
<table class="table table-condensed table-hover">
	<tbody>
		<?php if (isset($followers) && is_array($followers) && count($followers)) : ?>
			<?php foreach ($followers as $follower) : ?>
				<tr>
					<td class='span1'>
						<a href="<?php echo site_url('gfusers/gf_users_profile/users_profile' . '/' . $follower->id); ?>" title='<?php echo $follower->username; ?>'>
							<img src="<?php echo base_url('assets/images/users/thumbs') . '/' . $follower->image ?>" width='35' height='35' class="img-polaroid">
						</a>
					</td>
					<td></td>
					<td class='span1'><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile' . '/' . $follower->id); ?>"><b><?php echo $follower->username; ?></b></a></td>
					<td class='muted'><b><em>(<?php echo $follower->name; ?> <?php echo $follower->last_name; ?>)</em></b></td>
					<td class='span2'><?php $friend = ''; ?>
						<?php if (isset($following) && is_array($following) && count($following)) : ?>
							<?php foreach ($following as $record) : ?>
								<?php if($follower->id == $record->follower_id) : ?>
									<?php $friend = $follower->id; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if(empty($friend)) : ?>
							<?php //echo "nofriend"; ?>
							<a href="<?php echo site_url('followers/followers/follow' . '/' . $follower->id); ?>" class='btn btn-mini btn-block btn-info pull-right'><i class="icon-eye-open icon-white"></i>&nbsp;&nbsp;Ακολούθησε</a>
						<?php else: ?>
							<a href="<?php echo site_url('followers/followers/unFollow' . '/' . $follower->id); ?>" class='btn btn-mini btn-block pull-right'><i class="icon-eye-close"></i>&nbsp;&nbsp;Άρση Ακολούθησης</a>
							<?php //echo "friend"; ?>
						<?php endif;?>
						<!-- <a href="<?php // echo site_url('followers/followers/unFollow' . '/' . $follower->id); ?>" class='btn btn-mini pull-right'><i class="icon-eye-close"></i>&nbsp;&nbsp;Άρση Ακολούθησης</a> -->
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>	
</table>