<!-- question 1 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!-- invoke css -->
<title>List All Customer Info</title>
<link rel="stylesheet" type="text/css" href="design.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">

</head>

<?php
include 'connecttodb.php';
?>

<body>

<h1>Here are the products they have purchsed:</h1>

<?php

        // check productID and join pruchases and products
        $whichProduct = $_POST["which"];
        $query = 'SELECT * FROM purchases, product WHERE purchases.productID = product.productID AND purchases.customerID = "' . $whichProduct . '"';

        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query failed.");
        }

        // list info
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo $row["description"];
        }

        mysqli_free_result($result);

?>

<br><br>

<button onclick="history.go(-1);">Back </button>

</body>

</html>
