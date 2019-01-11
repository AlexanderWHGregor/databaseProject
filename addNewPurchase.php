<!-- question 3 -->
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

<h1> Add new purchase:</h1>

<!-- take quantity input -->
<form action="addPurchase.php" method="post">
<b>Quantity: <input type="text" name="qnty"></b><br><br>

<?php

        // prompt for customer input
        $query = "SELECT * FROM customer ORDER BY lastName ASC";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query 1 failed.");
        }

        $query2 = "SELECT * FROM product ORDER BY description ASC";
        $result2 = mysqli_query($connection,$query2);

        if (!$result2) {
                die("database query 2 failed.");
        }

        echo "<td>"."<b>"."Select a customer:"."</b>"."</td>"."<br>"."<br>";

        // display radio buttons to pass data
        while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>"."<td>";
                echo "<input type='radio' name='whichCID' value='" . $row["customerID"] . "'>";
                echo $row["lastName"].", "."</td>";
                echo "<td>".$row["firstName"]."</td>"."<br>";
                echo "<td>"."Customer ID:".$row["customerID"]."</td>"."<br>"."<br>";
                echo "</tr>";
        }

        echo "<br>";

        echo "<td>"."<b>"."Select an item to purchase:"."</b>"."</td>"."<br>"."<br>";

        // display radio buttons to pass data
        while ($row = mysqli_fetch_assoc($result2)) {

                echo "<tr>"."<td>";
                echo "<input type='radio' name='whichPID' value='" . $row["productID"] . "'>";
                echo $row["description"]."</td>"."<br>";
                echo "</tr>";
        }

        mysqli_free_result($result);
        mysqli_free_result($result2);
?>

<br><br>

<input type="submit" value="Add new purchase">

</form>

</body>

</html>

