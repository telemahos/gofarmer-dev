<ul class="nav nav-tabs">
	<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile') . '/' . $user->id; ?>"><?php echo $user->username; ?></a></li>
	    <li>
    <li>
    	<a href="<?php echo site_url('gfusers/gf_users_profile/users_crops') . '/' . $user->id; ?>">Καλλιέργειες</a>
    </li>
    <li><a href="<?php echo site_url('gfusers/gf_users_profile/users_crop_offers') . '/' . $user->id; ?>">Προσφορές</a></li>
    <li ><a href="<?php echo site_url('gfusers/gf_users_profile/users_following') . '/' . $user->id; ?>">Ακολουθεί</a></li>
	<li class="active"><a href="<?php echo site_url('gfusers/gf_users_profile/users_followers') . '/' . $user->id; ?>">Ακολουθείτε</a></li>
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
					<td class='span4 muted'><b><em>(<?php echo $follower->name; ?> <?php echo $follower->last_name; ?>)</em></b></td>

					<!-- Start of FOLLOWERS -->
					<?php 
						$kostas;
			         	if($i_followers > 0)	{
			         		foreach ($i_followers as $i_follower) {
				         	// If the User has Friends, then...
				         		if (is_array($i_followers)) {
						            if ($current_user->id == $follower->id) { 
						            	$kostas = '<a class="btn btn-small" href=" ' . site_url("gfusers/gf_my_profile")  . ' " ><i class="icon-user"></i>  Εγώ</a>';
						                break;
						            }
						            elseif ($i_follower->follower_id == $follower->id) {
						            	$kostas = '<a class="btn btn-small btn-danger" href=" ' . site_url("followers/followers/unFollow")  . "/".  $follower->id .' " ><i class="icon-eye-close icon-white"></i> Άρση Ακολούθησης</a>';
						                break;
						            }
						            else { 
						            	$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow") . "/". $follower->id .' " ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
						            }
						         }
					            else { 
					            	$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow")  . "/".  $follower->id .' " ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
						        }
				         	}
			         	}
			         	else { 
			         		// If the user does not have any friends, then...
			         		if ($current_user->id == $follower->id) {
			         			$kostas = '<a class="btn btn-small" href=" ' . site_url("gfusers/gf_my_profile")  . ' " ><i class="icon-user"></i>  Εγώ</a>';
			         		}
			         		else {
			         			$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow")  . "/".  $follower->id .' "  ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
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