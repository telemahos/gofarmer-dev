<ul class="nav nav-tabs">
    <li class="active">
    	<a href="#">Ακολουθείς</a>
    </li>
    <li><a href="<?php echo site_url('gfusers/gf_my_profile/followers'); ?>">Ακόλουθοι</a></li>
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
<!-- <h3>Ακολουθείς</h3>
<br> -->
<table class="table table-condensed table-hover">
	<tbody>
		<?php if (isset($following) && is_array($following) && count($following)) : ?>
			<?php foreach ($following as $follow) : ?>
				<tr>
					<td class='span1'>
						<a href="<?php echo site_url('gfusers/gf_users_profile/users_profile' . '/' . $follow->id); ?>" title='<?php echo $follow->username; ?>'>
							<img src="<?php echo base_url('assets/images/users/thumbs') . '/' . $follow->image ?>" width='35' height='35' class="img-polaroid">
						</a>
					</td>
					<td></td>
					<td class='span1'><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile' . '/' . $follow->id); ?>"><b><?php echo $follow->username; ?></b></a></td>
					<td class='muted'><b><em>(<?php echo $follow->name; ?> <?php echo $follow->last_name; ?>)</em></b></td>
					<td>
						<a href="<?php echo site_url('followers/followers/unFollow' . '/' . $follow->id); ?>" class='btn btn-mini pull-right'><i class="icon-eye-close"></i>&nbsp;&nbsp;Άρση Ακολούθησης</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>	
</table>

<hr>