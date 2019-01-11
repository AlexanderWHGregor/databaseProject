<!-- question 1 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="design.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">

</head>

<body>

<?php
        include 'connecttodb.php';
?>

<h1>Customer information:</h1>

<form action="getPurchase.php" method="post">

<!-- make a table -->
<table style="width:70%">
        <tr>
                <td><b>Last Name:</b></td>
                <td><b>First Name:</b></td>
                <td><b>City:</b></td>
                <td><b>Phone Number:</b></td>
                <td><b>Customer ID:</b></td>
                <td><b>Agent ID:</b></td>
        </tr>

<?php

        //select for lastName in ascending order
        $query = "SELECT * FROM customer ORDER BY lastName ASC";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query failed.");
        }

        //print data and pass customerID
        while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>"."<td>";
        echo "<input type='radio' name='which' value='" . $row["customerID"] . "'>";
        echo $row["lastName"]."</td>";
        echo "<td>".$row["firstName"]."</td>";
        echo "<td>".$row["city"]."</td>";
        echo "<td>".$row["phoneNumber"]."</td>";
        echo "<td>".$row["customerID"]."</td>";
        echo "<td>".$row["agentID"]."</td>";
        echo "</tr>";
     }

     mysqli_free_result($result);
?>

</table>

<br>

<input type='submit' value='click here for items purchased'>

</form>

<?php
   mysqli_close($connection);
?>

</body>

</html>
