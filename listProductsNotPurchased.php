<!-- link question 8 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!-- invoke css -->
<link rel="stylesheet" type="text/css" href="design.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">

</head>

<body>

<?php
        include 'connecttodb.php';
?>

<h1>Products not purchased:</h1>

<table style="width:70%">

<?php

        // select product description
        $query = "SELECT DISTINCT product.description FROM product LEFT JOIN purchases ON product.productID = purchases.productID WHERE purchases.productID IS NULL";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query failed.");
        }

        // print data
        while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<td>".$row["description"]."</td>";
                echo "</tr>";

        }

        mysqli_free_result($result);

?>

</table>

<br>

</form>

<?php
   mysqli_close($connection);
?>

</body>

</html>
