<?php 


	if($_SERVER['REQUEST_METHOD']=="POST"){
$con=mysqli_connect("localhost","root","","api")or die(mysql_error());
		CreateUser();

	}

	if($_SERVER['REQUEST_METHOD']=="GET"){
$con=mysqli_connect("localhost","root","","api")or die(mysql_error());
		ShowUser();

	}

 function CreateUser(){

 		global  $con;
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$sql="INSERT INTO user (firstname,lastname,email)VALUES('$firstname','$lastname','$email')";
		mysqli_query($con,$sql);
		mysqli_close($con);
	}
	function ShowUser(){

 		global  $con;
		
		$sql="SELECT * FROM user";
		$result=mysqli_query($con,$sql);
		while ($row= mysqli_fetch_array($result)){
			$user[]=$row;
		}

		header("content-Type:application/json");
		echo json_encode($user);
		// $user= array();
		// while ($row= mysqli_fetch_array($result)) {
		// 	# code...
		// 	$user[]=$row;

		// }

		mysqli_close($con);
	}