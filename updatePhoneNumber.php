<!-- question 5 -->
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

<h1>Update Number:</h1>

<form action="updateNumber.php" method="post">

<!-- input phone number -->
<form action="updateNumber.php" method="post">
New number: <input type="text" name="num"><br>

<!-- create table -->
<table style = "width:70%">

        <tr>
                <td><b>Update Number:</b></td>
                <td><b>First Name:</b></td>
                <td><b>Last Name:</b></td>
        </tr>

<?php

        // select customer database
        $query = "SELECT * FROM customer ORDER BY lastName ASC";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("database query failed.");
        }

        // display radio buttons to pass data
        while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>"."<td>";
                echo "<input type='radio' name='which' value='" . $row["customerID"] . "'>";
                echo $row["phoneNumber"]."</td>";
                echo "<td>".$row["firstName"]."</td>";
                echo "<td>".$row["lastName"]."</td>";
                echo "</tr>";
        }

        mysqli_free_result($result);

?>

</table>

<br><br>

<input type="submit" value="update number">

</form>

</body>

</html>
