<?php
	session_start();
	mysqli_report(MYSQLI_REPORT_ALL);
?>
<?php	
	require 'connection.php';
	if(isset($_GET['bookid']))
		$bookid=$_GET['bookid'];
	if(isset($_GET['callremove']))
		echo callRemove($bookid);
	
	function callRemove($bookid){
		
		$delete_query="DELETE FROM Cart WHERE Username= ? AND Book_id= ? ";
		if($stmt2 = $conn->prepare($delete_query)){
			if($stmt2->bind_param("si",$_SESSION['username'],$bookid)){
				echo '<script language="javascript">','alert("hello0"+'.$_SESSION['username'].')','</script>';
				if(($rs=$stmt2->execute())){
					
					$stmt2->close();
					$conn->close();
					//echo '<script language="javascript">','alert("hello4")','</script>';
					//header("Location: http://localhost/bookwork/cart.php");
					//echo "<script>setTimeout(\"location.href = 'http://localhost/bookwork/cart.php';\");</script>";
				}
				else{
					//echo '<script language="javascript">','alert("hello3")','</script>';
				}
			}
			else{
				//echo '<script language="javascript">','alert("hello2")','</script>';
			}
		}
		else{
				//echo '<script language="javascript">','alert("hello1")','</script>';
		}
		/*$delete_query="DELETE FROM Cart WHERE Username=".$_POST['username']." AND Book_id=".$bookid."";
		if(mysqli_query($conn,$delete_query));
			mysqli_close($conn);
		*/	
	}
?>