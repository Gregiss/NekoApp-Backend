<?php
if(isset($_GET['email'])){
	$mail = $_GET['email'];
} else{
	$mail = "";
}
if(isset($_GET['password'])){
	$password = $_GET['password'];
} else{
	$password = "";
}

$date = date("d-m-Y");

$dados = $con->prepare('SELECT email FROM users WHERE email = ?');
$dados->bindParam(1, $mail);
$dados->execute();
if ($dados->rowCount() > 0) {
	$errorData = array(
	"sucess" => false,
    "error" => "email_exist"
	);
	echo json_encode($errorData);
} else{
	if($mail == "" || $password = ""){
		$data = array(
		"sucess" => false,
		"error" => "campos"
		);
		echo json_encode($data);
	} else{
	$stmt = $con->prepare('INSERT INTO users (email, password, dateCreated) VALUES(:email, :password, :dateC)');
	$stmt->execute(array(
		':email' => $mail,
		':password' => $password,
		':dateC' => $date
	 ));
	$data = array(
		"sucess" => true,
		"error" => false
	);
	echo json_encode($data);
	}
}