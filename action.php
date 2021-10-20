<?php
include('classes/admin.php');
$admin = new Admin();

if(!empty($_POST['action']) && $_POST['action'] == 'listadmin') {
	$admin->listAdmins();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addAdmin') {
    $admin->addAdmin();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getAdminDetails') {
    $admin->getAdminDetails();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateAdmin') {
    $admin->updateAdmin();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteAdmin') {
    $admin->deleteAdmin();
}
if(!empty($_POST['action']) && $_POST['action'] == 'statusUpdate') {
    $admin->statusUpdate();
}


?>