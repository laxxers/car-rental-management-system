<?php

class Admin_validate {

	$session = $this->session->userdata("loggedIn");
	$id = $this->session->userdata("id");
	$sql = mysql_query("SELECT accounttype FROM users WHERE id='$id'");
	$row = mysql_fetch_array($sql);
	$accounttype = $row["accounttype"];
	
	if ($session && $accounttype == 'user')
	{
		echo 'No direct access allowed (Do not acces in this way)';
	}
	
}