<?php
session_start();
require 'connection.php';

?>
<?php
	
	if(isset($_POST['bookid']))
		$bookid=$_POST['bookid'];
	$delete_query="DELETE FROM Cart WHERE Username= ? AND Book_id= ? ";
		if($stmt2 = $conn->prepare($delete_query)){
			if($stmt2->bind_param("si",$_SESSION['username'],$bookid)){
				//echo '<script language="javascript">','alert("hello0")','</script>';
				if(($rs=$stmt2->execute())){
					
					$stmt2->close();
					$conn->close();
					//echo '<script language="javascript">','alert("hello4")','</script>';
					//header("Location: http://localhost/bookwork/cart.php");
					//echo "<script>setTimeout(\"location.href = 'http://localhost/bookwork/cart.php';\");</script>";
				}
				else{
					echo '<script language="javascript">','alert("hello3")','</script>';
				}
			}
			else{
				echo '<script language="javascript">','alert("hello2")','</script>';
			}
		}
		else{
				echo '<script language="javascript">','alert("hello1")','</script>';
		}
		
?>
