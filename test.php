<?php 


	
$con=mysqli_connect("localhost","root","","api")or die(mysql_error());
		
		$sql="SELECT * FROM user";
		$result=mysqli_query($con,$sql);
		while ($row= mysqli_fetch_array($result)){
			$user[]=$row;
		}

		header("content-Type:application/json");
		$jtos= json_encode($user);
		$data=json_decode($jtos);

		foreach ($data as $key => $value) {
			# code...
			
			echo  $value->firstname."\n";
			echo $value->lastname."\n";
			echo $value->email."\n";
		}
		//print_r($data['1']->id);
		// $user= array();
		// while ($row= mysqli_fetch_array($result)) {
		// 	# code...
		// 	$user[]=$row;

		// }

		mysqli_close($con);
