<ul class="nav nav-tabs">
	<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile') . '/' . $user->id; ?>"><?php echo $user->username; ?></a></li>
	    <li>
    <li>
    	<a href="<?php echo site_url('gfusers/gf_users_profile/users_crops') . '/' . $user->id; ?>">Καλλιέργειες</a>
    </li>
    <li><a href="<?php echo site_url('gfusers/gf_users_profile/users_crop_offers') . '/' . $user->id; ?>">Προσφορές</a></li>
    <li class="active"><a href="<?php echo site_url('gfusers/gf_users_profile/users_following') . '/' . $user->id; ?>">Ακολουθεί</a></li>
	<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_followers') . '/' . $user->id; ?>">Ακολουθείτε</a></li>
    <li class="dropdown pull-right">
		<a class="dropdown-toggle"
		data-toggle="dropdown"
		href="#">
			<!-- <i class="icon-cog"></i> -->
			<b class="caret"></b>
		</a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile') . '/' . $user->id; ?>"><?php echo $user->username; ?></a></li>			
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
					<td class='span4 muted'><b><em>(<?php echo $follow->name; ?> <?php echo $follow->last_name; ?>)</em></b></td>
					<!-- Start of FOLLOWERS -->
					<?php 
						$kostas;
			         	if($i_following > 0)	{
			         		foreach ($i_following as $follower) {
				         	// If the User has Friends, then...
				         		if (is_array($i_following)) {
						            if ($current_user->id == $follow->id) { 
						            	// $kostas = ('<button class="btn btn-small disabled" type="submit"><i class="icon-user"></i>  Εγώ</button>');
						            	$kostas = '<a class="btn btn-small" href=" ' . site_url("gfusers/gf_my_profile")  . ' " ><i class="icon-user"></i>  Εγώ</a>';
						                break;
						            }
						            elseif ($follower->follower_id == $follow->id) {
						            	$kostas = '<a class="btn btn-small btn-danger" href=" ' . site_url("followers/followers/unFollow")  . "/".  $follow->id .' " ><i class="icon-eye-close icon-white"></i> Άρση Ακολούθησης</a>';
						                break;
						            }
						            else { 
						            	$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow") . "/". $follow->id .' " ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
						            }
						         }
					            else { 
					            	$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow")  . "/".  $follow->id .' " ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
						        }
				         	}
			         	}
			         	else { 
			         		// If the user does not have any friends, then...
			         		if ($current_user->id == $follow->id) {
			         			$kostas = '<a class="btn btn-small" href=" ' . site_url("gfusers/gf_my_profile")  . ' " ><i class="icon-user"></i>  Εγώ</a>';
			         			// $kostas = '';
			         		}
			         		else {
			         			$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow")  . "/".  $follow->id .' "  ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
			         		}
						}
				   ?>
				   <td class=''><?php echo $kostas; ?></td>
					<!-- End of FOLLOWERS -->
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>	
</table>

<hr>