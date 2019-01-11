<!-- link question 6 -->
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

<h1>Delete customer:</h1>

<form action="deleteCustomer.php" method="post">

<!-- create a table -->
<table style = "width:70%">

        <tr>
                <td><b>Last Name:</b></td>
                <td><b>First Name:</b></td>
                <td><b>Customer ID:</b></td>
        </tr>

<?php

        // text prompt for input
        $query = "SELECT * FROM customer ORDER BY lastName ASC";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query failed.");
        }

        while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>"."<td>";
                echo "<input type='radio' name='which' value='" . $row["customerID"] . "'>";
                echo $row["lastName"]."</td>";
                echo "<td>".$row["firstName"]."</td>";
                echo "<td>".$row["customerID"]."</td>";
                echo "</tr>";
        }

        mysqli_free_result($result);

?>

</table>

<br><br>

<input type="submit" value="delete customer">

</form>

</body>

</html>
