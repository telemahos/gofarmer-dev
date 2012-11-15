<?php //print_r($records); ?>
<div class="admin-box">
	<h3>Όλοι οι χρήστες</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Gfusers.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					<th>User ID</th>
					<th>User ID</th>
					<th>Username</th>
					<th>Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Gfusers.Content.Delete')) : ?>
				<tr>
					<td colspan="23">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('gfusers_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Gfusers.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Gfusers.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/gfusers/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->id) ?></td>
				<?php else: ?>
				<td><?php echo $record->id ?></td>
				<?php endif; ?>
			
				<td>
					<?php if ($current_user->id == $record->user_id) : ?>
						<a href="<?php echo site_url('gfusers/gf_my_profile'); ?>" title="<?php echo $record->username; ?>">
							<img src="<?php echo base_url('assets/images/users/thumbs') . '/' . $record->image ?>" width='45' height='45' class="img-polaroid">
						</a>
					<?php else : ?>
						<a href="<?php echo site_url('gfusers/gf_users_profile/users_profile'); ?><?php echo '/'. $record->id; ?>" title="<?php echo $record->username; ?>">
							<img src="<?php echo base_url('assets/images/users/thumbs') . '/' . $record->image ?>" width='45' height='45' class="img-polaroid">
						</a>
					<?php endif; ?>
					
				</td>
				<td><?php echo $record->username?></td>
				<td><?php echo $record->name?></td>
				<td><?php echo $record->last_name?></td>
				<td><?php echo $record->email?></td>

				<?php //print_r($followers); ?>
				<!-- Start of FOLLOWERS -->
				<?php 
					$kostas;
		         	if($followers > 0)	{
		         		foreach ($followers as $follower) {
			         	// If the User has Friends, then...
			         		if (is_array($followers)) {
					            if ($current_user->id == $record->user_id) { 
					            	// $kostas = ('<button class="btn btn-small disabled" type="submit"><i class="icon-user"></i>  Εγώ</button>');
					            	$kostas = '<a class="btn btn-small" href=" ' . site_url("gfusers/gf_my_profile")  . ' " ><i class="icon-user"></i>  Εγώ</a>';
					                break;
					            }
					            elseif ($follower->follower_id == $record->user_id) {
					            	$kostas = '<a class="btn btn-small btn-danger" href=" ' . site_url("followers/followers/unFollow")  . "/".  $record->user_id .' " ><i class="icon-eye-close icon-white"></i> Άρση Ακολούθησης</a>';
					                break;
					            }
					            else { 
					            	$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow") . "/". $record->user_id .' " ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
					            }
					         }
				            else { 
				            	$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow")  . "/".  $record->user_id .' " ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
					        }
			         	}
		         	}
		         	else { 
		         		// If the user does not have any friends, then...
		         		if ($current_user->id == $record->user_id) {
		         			$kostas = '<a class="btn btn-small" href=" ' . site_url("gfusers/gf_my_profile")  . ' " ><i class="icon-user"></i>  Εγώ</a>';
		         			// $kostas = '';
		         		}
		         		else {
		         			$kostas = '<a class="btn btn-small btn-info" href=" ' . site_url("followers/followers/follow")  . "/".  $record->user_id .' "  ><i class="icon-eye-open icon-white"></i> Ακολούθησε</a>';
		         		}
					}
			   ?>
			   <td><?php echo $kostas; ?></td>
				<!-- End of FOLLOWERS -->

				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="23">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>