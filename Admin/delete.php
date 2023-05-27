<?php 
$id = $_GET['id'];
include('../Users.php');
$user = new User();
$delUser = $user->deleteUser($id);
if (!$delUser) {
  echo 'Error masssage' ; 
}
?>