<!-- question 9 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Customer:</title>

<!-- invoke css -->
<link rel="stylesheet" type="text/css" href="design.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">

</head>

<body>

<?php
include 'connecttodb.php';
?>

<?php

        // receives input data to select product from product database
        $pID = $_POST["which"];

        $query = 'SELECT * FROM product WHERE product.productID = "'.$pID.'"';

        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("Error: query failed. ".mysqli_error($connection));
        }

        // print data
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<b>".$row["description"].":"."</b>"."<br>";
        }

        // select appropriate product in purchases
        $query2 = 'SELECT * FROM product, purchases WHERE product.productID = purchases.productID AND purchases.productID = "'.$pID.'"';

        $result2 = mysqli_query($connection, $query2);

        if (!$result2) {
                die("Error: query failed. ".mysqli_error($connection));
        }

        $totalSold = 0;

        // add total
        while ($row = mysqli_fetch_assoc($result2)) {
                $cost = $row["costPerItem"];
                $totalSold += $row["quantityPurchased"];
        }

        // print data
        echo "Total sold: ".$totalSold."<br>";
        echo "Total profit: $".$cost*$totalSold;

        mysqli_close($connection);

?>

<br><br>

<button onclick="history.go(-1);">Back</button>

</body>

</html>
