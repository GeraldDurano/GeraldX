<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<style type="text/css">
	body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 30px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
    font-family: 'Staatliches', cursive;
    text-align: center;
}
a{
	font-family: 'Staatliches', cursive;
}
</style>
<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0 class="table table-bordered">

	<tr bgcolor='#CCCCCC'>

		<td>Product Name	</td>
		<td>Product Description</td>
		<td>Product Price</td>
		<td>Product  Quantity</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['ProductName']."</td>";
		echo "<td>".$row['ProductDescription']."</td>";
		echo "<td>".$row['ProductPrice']."</td>";
		echo "<td>".$row['ProductQuantity']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
