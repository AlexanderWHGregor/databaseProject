<!-- question 2 -->
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
<h1>List product description or order price:</h1>

<form action="listOrder.php" method="post">

<?php

        $val0 = 0;
        $val1 = 1;

        // create switches and pass data
        echo "<tr>"."<td>"."Select type of information:"."</td>"."<br>";
        echo "<input type='radio' name='whichInfo' value='" . $val0 . "'>";
        echo "List products by name"."</td>"."<br>";
        echo "<input type='radio' name='whichInfo' value='" . $val1 . "'>";
        echo "<td>"."List products by price"."</td>";
        echo "<br>"."<br>";
        echo "Select order:"."</td>"."<br>";
        echo "<input type='radio' name='whichOrder' value='" . $val0 . "'>";
        echo "List order ascending:"."</td>"."<br>";
        echo "<input type='radio' name='whichOrder' value='" . $val1 . "'>";
        echo "List order descending:"."</td>"."<br>";
        echo "</tr>";

        mysqli_close($connection);

?>

</table>

<br><br>

<input type='submit' value='click here for values'>

</form>

</body>

</html>
