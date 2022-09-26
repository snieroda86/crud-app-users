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
		$index = 1;
		foreach ($users as $user) {
			$output.='
				<tr>
			      <td>'.$index.'</td>
			      <td>'.$user['first_name'].'</td>
			      <td>'.$user['last_name'].'</td>
			      <td>'.$user['email'].'l</td>
			      <td>'.$user['phone'].'</td>
			      <td>
			      	<div class="d-flex">
			      		<a href="#" data-bs-toggle="modal"  data-bs-target="#updateUserModal" id="'.$user['id'].'" class="btn btn-secondary me-3 user-edit-link">Edit</a>
			      		<a href="#" id="user-id-'.$user['id'].'" class="btn btn-danger">Delete</a>

			      	</div>
			      </td>

			    </tr>
			';
			$index++;
		}

		echo $output;
	}else{ ?>
		<tr>
			<td colspan="6">No users found</td>
		</tr>
	<?php }

}

// Handle edit user AJAX request
if(isset($_GET['edit'])){
	$id = $_GET['id'];
	$user = $db->getUser($id);
	echo json_encode($user);
}

// Handle update user AJAX request
if(isset($_POST['update'])){
	$id = $util->inputValidate($_POST['user_id']);
	$fname = $util->inputValidate($_POST['fname']);
	$lname =  $util->inputValidate($_POST['lname']);
	$email =  $util->inputValidate($_POST['email']);
	$phone =  $util->inputValidate($_POST['phone']);

	if($db->updateUser($id, $fname , $lname , $email , $phone)){
		echo $util->showMessage('success' , 'User updated successfully');
	}else{
		echo $util->showMessage('danger' , 'Something went wrong!');
	}

}