<!-- link question 7 -->
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

<h1>Customers who purchased more than a certain number of a product:</h1>

<!-- text prompt for input -->
<form action="getGT.php" method="post">
<b>Product quantity: <input type="text" name="qGT"></b><br><br>

<!-- create a table -->
<table style = "width:70%">

        <tr>
                <td><b>Description:</b></td>
                <td><b>Product ID:</b></td>
        </tr>

<?php

        // select for product description
        $query = "SELECT * FROM product ORDER BY description ASC";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query failed.");
        }

        // display radio buttons to pass data
        while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>"."<td>";
                echo "<input type='radio' name='whichPID' value='" . $row["productID"] . "'>";
                echo $row["description"]."</td>";
                echo "<td>".$row["productID"]."</td>";
                echo "</tr>";
        }

        mysqli_free_result($result);

?>

</table>

<br><br>
<input type="submit" value="get product info">

</form>

</body>

</html>
