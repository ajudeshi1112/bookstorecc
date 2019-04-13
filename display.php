<!DOCTYPE html>
	<head>
	</head>
	<body>
		<table id="books" cellspacing="30" cellpadding="10">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>ISBN</th>
				<th>Publisher</th>
				<th>Edition</th>
				<th>Price</th>
			</tr>
		</table>
		<script>
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var response = JSON.parse(xhttp.responseText);
					var books=response.books;
					var output='';
					for(var i=0;i<books.length;i++){
						output+='<tr><td><cite>'+books[i].title+'</cite></td><td><strong>'+books[i].author+'</strong></td><td>'+books[i].ISBN+'</td><td>'+books[i].publisher+'</td><td>'+books[i].edition+'</td><td>'+books[i].price+'</td></tr>';	
					}
					document.getElementById('books').innerHTML += output;
				}
			};
			xhttp.open("GET","booksjson.json",true);
			xhttp.send();
		</script>
	</body>
	
</html>