<?php 
require_once('config.php');

class Database extends Config{
	// Insert user into database
	public function store($fname , $lname , $email , $phone){
		$sql = "INSERT INTO users(first_name , last_name , email , phone) VALUES ( :fname , :lname , :email , :phone )";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([
			'fname' => $fname ,
			'lname' => $lname ,
			'email' => $email ,
			'phone' => $phone
		]);

		return true;
	}

	public function index(){
		$sql = "SELECT * FROM users";
		$stmt = $this->conn->query($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	// Get user
	public function getUser($id){
		$sql = "SELECT * FROM users WHERE id=:id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}

	// Update user
	public function updateUser($id ,$fname , $lname , $email , $phone){
		$sql = "UPDATE users SET first_name=:fname, last_name=:lname, email=:email, phone=:phone WHERE id=:id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([
			'fname' => $fname ,
			'lname' => $lname ,
			'email' => $email ,
			'phone' => $phone ,
			'id'=>$id 

		]);
		return true;
	}
}