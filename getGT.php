<!-- link question 7 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>List All Customer Info</title>

<!-- invoke csss -->
<link rel="stylesheet" type="text/css" href="design.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>

<?php
include 'connecttodb.php';
?>

<body>

<?php

        // receive data
        $valGT = $_POST["qGT"];
        $valPID = $_POST["whichPID"];

        // select product requested
        $query = 'SELECT * FROM product WHERE product.productID = "' . $valPID . '"';

        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query failed.");
        }

        $row = mysqli_fetch_assoc($result);

        echo "<b>"."Customers who purchased more than ".$valGT." ".$row["description"]."</b>";

        // select customer who purchased more than quantity selected
        $query2 = 'SELECT * FROM purchases, customer WHERE purchases.customerID = customer.customerID AND purchases.productID = "' . $valPID . '" AND purchases.quantityPurchased > "' . $valGT . '"';

        $result2 = mysqli_query($connection,$query2);

        if (!$result2) {
                die("database query 2 failed.");
        }

        // print data
        while ($row = mysqli_fetch_assoc($result2)) {

                echo "<li>";
                echo $row["firstName"]." ";
                echo $row["lastName"].": ";
                echo $row["quantityPurchased"]." purchased";

        }

        mysqli_free_result($result);

?>

<br><br>

<button onclick="history.go(-1);">Back </button>

</body>

</html>
