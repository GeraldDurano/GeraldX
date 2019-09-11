<html>
<head>
	<title>Add Data</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sigmar+One|Staatliches&display=swap" rel="stylesheet">
</head>
<style type="text/css">
	a {
    color: #00549c;
    text-decoration: none;
    font-size: 30px;
    text-align: center;
    padding-left: 800px;
    font-family: 'Sigmar One', cursive;
}

	h1 {
    color: #009814;
    text-decoration: none;
    font-size: 30px;
    text-align: center;
    padding-left: 0.1px;
    font-family: 'Sigmar One', cursive;
}


</style>
<body>

<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['ProductName'];
	$description = $_POST['ProductDescription'];
	$price = $_POST['ProductPrice'];
	$quantity = $_POST['ProductQuantity'];
		
	// checking empty fields
	if(empty($name) || empty($description) || empty($price)|| empty($quantity)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($description)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($quantity)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(ProductName, ProductDescription, ProductPrice,ProductQuantity) VALUES(:ProductName, :ProductDescription, :ProductPrice,:ProductQuantity)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':ProductName', $name);
		$query->bindparam(':ProductDescription', $description);
		$query->bindparam(':ProductPrice', $price);
		$query->bindparam(':ProductQuantity', $quantity);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'><h1>Data added successfully.</h1>";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
