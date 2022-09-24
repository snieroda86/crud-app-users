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


// Handle fetch all users from db
if(isset($_GET['read'])){
	$users = $db->index();
	$output ='';
	if($users){
		foreach ($users as $key => $user) {
			$output.='
				<tr>
			      <td>'.$key.'</td>
			      <td>'.$user['first_name'].'</td>
			      <td>'.$user['last_name'].'</td>
			      <td>'.$user['email'].'l</td>
			      <td>'.$user['phone'].'</td>
			      <td>
			      	<div class="d-flex">
			      		<a href="#" id="user-id-'.$user['id'].'" class="btn btn-secondary me-3">Edit</a>
			      		<a href="#" id="user-id-'.$user['id'].'" class="btn btn-danger">Delete</a>

			      	</div>
			      </td>

			    </tr>
			';
		}

		echo $output;
	}else{ ?>
		<tr>
			<td colspan="6">No users found</td>
		</tr>
	<?php }
}