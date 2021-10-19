<?php
include('classes/admin.php');
$admin = new Admin();

if(!empty($_POST['action']) && $_POST['action'] == 'listadmin') {
	$admin->listAdmins();
}
?>