<?php

function addTemporaryField($user)
{
	if( ! canBeTemporaryUser($user) || ! canAddTemporaryUser($user) )
	{
		echo "";
	}
	else
	{
		$checked = userIsTemporary($user);

		echo $field = "
		<h3>WP Temporary Account</h3>
		<table class='form-table'>
			<tr>
				<th>
					<label for='temporary-account'>Temporary Account</label>
				</th>
				<td>
					<input type='checkbox' name='temporary-account' id='temporary-account'".$checked.">
				</td>
			</tr>
		</table>
		";
	}
}

function updateTemporaryField($userID)
{
	$temporary = isset($_POST["temporary-account"]) ? 1 : 0;
	update_user_meta($_POST["user_id"], "temporary_account", $temporary);
}

function canAddTemporaryUser($thisUser)
{
	/**
	* Only allow the main administrator account to add temporary users,
	* and users can't change their own settings
	*/
	$user = wp_get_current_user();
	return $user->data->ID == 1 && $thisUser->data->ID !== $user->data->ID;
}

function canBeTemporaryUser($user)
{
	/**
	* Only allow other Administrator accounts to be temporary
	*/
	return ( ! in_array("Administrator", $user->roles) && $user->data->ID != 1 );
}

function userIsTemporary($user)
{
	$isTemporary = get_user_meta($user->data->ID, "temporary_account");
	return $isTemporary[0] == 1 ? "checked" : null;
}