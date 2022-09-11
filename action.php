<?php 
require_once 'db.php';
require_once('util.php');
$db = new Database;
$util = new Util;


if(isset($_POST['add'])){
	$fname = $util->inputValidate($_POST['fname']) ;
	$lname =  $util->inputValidate($_POST['lname']);
	$email =  $util->inputValidate($_POST['email']);
	$phone =  $util->inputValidate($_POST['phone']);

	if($db->store($fname , $lname , $email , $phone)){
		echo $util->showMessage('success' , 'User created successfully');
	}else{
		echo $util->showMessage('danger' , 'Something went wrong!');
	}

}
