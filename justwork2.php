<?php
session_start();
require 'connection.php';

?>
<?php
	
	if(isset($_POST['bookid']))
		$bookid=$_POST['bookid'];
	if(isset($_POST['incdec']))
		$incdec=$_POST['incdec'];
	
	$update_query="UPDATE Cart SET Quantity = ? WHERE Username = ? AND Book_id = ?";
		if($stmt2 = $conn->prepare($update_query)){
			if($stmt2->bind_param("isi",$incdec,$_SESSION['username'],$bookid)){
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
