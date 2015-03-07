<?php

defined( 'ABSPATH' ) or die( "Naughty naughty, you'll get caughty" );

class WPTemporaryAccount {
	
	public function addTemporaryField()
	{
		echo $field = "
		<input type='checkbox' name='temporary-account' id='temporary-account'>
		<label for='temporary-account'>Make this a temporary account</label>
		";
	}
}