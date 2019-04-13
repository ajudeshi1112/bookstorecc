<?php
	session_start();
	mysqli_report(MYSQLI_REPORT_ALL);
?>
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$getid="SELECT * FROM Cart where Username = ?";
	if($stmt=$conn->prepare($getid)){
		if($stmt->bind_param("s",$_SESSION["username"])){
			if($stmt->execute()){
				if($stmt->bind_result($id,$qty)){
					$rows=0;
					$idarray=array();
					$qtyaray=array();
					$i=0;	
						while($stmt->fetch()){
							$rows=1;
							$idarray[$i]=$id;
							$qtyarray[$i++]=$qty;	
						}
						if($rows==0){
							header("Location: http://localhost/bookwork/emptycart.php");
						
						}
				}		
			}
		}
		$stmt->close();
	}	
		
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
?>							
		<div class="product-item">
			<form id="frmCart">
			<div class="product-image"><img src="<?php echo $Book_img; ?>"></div>
			<div><cite><?php echo $Title; ?></cite><br><strong><?php echo $Author; ?></strong></div>
			<div class="product-price">&#x20b9; <?php echo $Price; ?></div>
			<div><input type="text" id="qty_<?php echo $qtyarray[$i]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
