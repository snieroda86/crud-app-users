<?php 

class Util{
	// Input value sanitization
	public function inputValidate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = strip_tags($data);

		return $data;
	}

	// Displaying success and error message
	public function showMessage( $type , $message){
		return '
			<div class="alert alert-'.$type.' a" role="alert">
			  <strong>'.$message.'</strong>
			</div>
		';
	}
}