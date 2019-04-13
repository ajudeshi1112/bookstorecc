<?php
session_start();
?>
<?php
	require 'connection.php';
	if(isset($_POST["email"]))
		$email=$_POST["email"];
	if(isset($_POST["pass"]))
		$pass=$_POST["pass"];
	$encpass=sha1($pass);
	$query="SELECT * FROM Users WHERE Username = ? and Password = ? ";
	if(!($stmt = $conn->prepare($query)))
		echo "prepare failed!";
	if(!$stmt->bind_param("ss",$email,$encpass))
		echo "Bind failed!";
	if(!$stmt->execute())
		echo "Execute failed!";
	else{
		$stmt->store_result();
		$stmt->fetch();	
		$rows=$stmt->num_rows();
		if($rows==0){
			$stmt->close();
			$conn->close();
			echo "Invalid username/password!";
			echo "<script>setTimeout(\"location.href = 'http://localhost/bookwork/logcss.php';\",3000);</script>";
		}
		else{
			$_SESSION["username"]=$email;
			$stmt->close();
			$conn->close();
			header("Location: http://localhost/bookwork/catalogcss.php");
		}
	}
?>