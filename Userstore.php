<?php

require 'connection.php';

if(isset($_POST["firstname"]))
	$firstname=$_POST["firstname"];
if(isset($_POST["lastname"]))
	$lastname=$_POST["lastname"];
if(isset($_POST["phone"]))
	$phone=$_POST["phone"];
if(isset($_POST["email"]))
	$username=$_POST["email"];
if(isset($_POST["pass"]))
	$password=$_POST["pass"];
$encpass=sha1($password);
$query="SELECT * FROM Users WHERE Username = ?";
if (!($stmt = $conn->prepare($query))) {
     echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}
if(!$stmt->bind_param("s",$username))
	echo "Binding parameters failed:\n";
if(!$stmt->execute()){
	echo "Execute failed\n";
}
else{
	$stmt->store_result();
	$stmt->fetch();	
	$rows=$stmt->num_rows();
	//echo "rows: ",$rows;
	if($rows==1){
		$stmt->close();
		$conn->close();	
		echo '<script>alert("This username is already in use. Try again!")</script>';
		echo "<script>setTimeout(\"location.href = 'http://localhost/bookwork/regcss.php';\");</script>";
	
	}else{



		/* Prepared statement, stage 1: prepare */
		if (!($stmt = $conn->prepare("INSERT INTO Users(Firstname,Lastname,Phone,Username,Password) VALUES (?,?,?,?,?)"))) {
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
		}

		/* Prepared statement, stage 2: bind and execute */

		if (!$stmt->bind_param("ssiss",$firstname,$lastname,$phone,$username,$encpass)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}

		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		else{
			$stmt->close();
			$conn->close();
			echo '<script type="text/javascript">alert("Registered successfully! Welcome '.$username.'!");</script>';
			echo "<script>setTimeout(\"location.href = 'http://localhost/bookwork/logcss.php';\");</script>";
			

		}
	}
}
?>