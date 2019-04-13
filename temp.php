<?php
$getid="SELECT Book_id FROM Cart where Username = ?";
if($stmt=$conn->prepare($getid)){
		if($stmt->bind_param("s",$_SESSION["username"])){
			if($stmt->execute()){
				if($stmt->bind_result($id)){
					$rows=0;
					$idarray=array();
					$i=0;	
						while($stmt->fetch()){
							$rows=1;
							$idarray[$i++]=$id;							
						}
						if($rows==0){
							header("Location: http://localhost/bookwork/emptycart.php");
						
						}
				}		
			}
		}
	$stmt->close();	
}
?>
<script type="text/javascript">
	var js_idarray=<?php echo $idarray; ?>
</script>
<?php
	$getdetails="SELECT * FROM Books WHERE Book_id = ? ";
	$details=array();
	if($stmt2=$conn->prepare($getdetails)){
		for($i=0;$i<sizeof($idarray);$i++){
			if($stmt2->bind_param("i",$idarray[$i])){
				if($stmt2->execute()){
					if($stmt2->bind_result($Book_id,$Book_img,$Title,$Author,$Price)){
						while($stmt2->fetch()){
							$inner=array('Book_id'=>$Book_id,'Book_img'=>$Book_img,'Title'=>$Title,'Author'=>$Author,'Price'=>$Price);
							$details[$i]=$inner;
						}
					}
				}
			}
		}
	}
?>
<script type="text/javascript">
	var js_details=<?php echo $details; ?>
	buildCart(js_details);
	function buidCart(var outer){
		for(var i=0;i<outer.length;i++){
			var inner=outer[i];
			
				var book_id=inner['Book_id'];
				var book_img=inner['Book_img'];
				var title=inner['Title'];
				var author=inner['Author'];
				var price=inner['Price'];
				var table=document.getElementByClass('table1');
				var row=table.insertRow(i+1);
				var col1=row.insertCell(0);
				var col2=row.insertCell(1);
				var col3=row.insertCell(2);
				var col4=row.insertCell(3);
				var col5=row.insertCell(4);
				var col6=row.insertCell(5);
				col1.innerHTML = '<img class="images" src ='+ book_img+'>';
				col2.innerHTML = "<cite>"+title+"</cite><br/>"+author;
				col3.innerHTML = '<center><select><option value="one">1</option><option value="two">2</option><option value="three">3</option><option value="four">4</option><option value="five">5</option></select></center>';
				col4.innerHTML = "&#x20b9; "+price;
				col5.innerHTML = "&#x20b9; "+price;
				col6.innerHTML = '<center><a class="aclass" href="cart.php">Remove</a></center>'
		}
	}
</script>

