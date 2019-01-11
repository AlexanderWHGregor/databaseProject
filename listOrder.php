<!-- question 2 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>List All Customer Info</title>

<!-- invoke css -->
<link rel="stylesheet" type="text/css" href="design.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">

</head>

<?php
include 'connecttodb.php';
?>

<body>

<h1>Here are the products they have purchsed:</h1>

<?php

        // take switch variable, select appropriate database, print data
        $info = $_POST["whichInfo"];
        $order = $_POST["whichOrder"];

        if ($info == 0) {

                if ($order == 0) {

                        $query = 'SELECT * FROM product ORDER BY description ASC';

                        $result = mysqli_query($connection,$query);

                        if (!$result) {
                                die("database query failed.");
                        }

                        echo "<b>"."Product description in ascending order:"."</b>"."<br>";

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li>";
                                echo $row["description"];
                        }

                        mysqli_free_result($result);

                }

                else {

                        $query = 'SELECT * FROM product ORDER BY description DESC';

                        $result = mysqli_query($connection,$query);

                        if (!$result) {
                                die("database query failed.");
                        }

                        echo "<b>"."Product description in descending order:"."</b>"."<br>";

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li>";
                                echo $row["description"];
                        }

                        mysqli_free_result($result);

                }

        }

        else {

                if ($order == 0) {

                        $query = 'SELECT * FROM product ORDER BY costPerItem ASC';

                        $result = mysqli_query($connection,$query);

                        if (!$result) {
                                die("database query failed.");
                        }

                        echo "<b>"."Product price in ascending order:"."</b>"."<br>";

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li>";
                                echo $row["description"].": ";
                                echo "$".$row["costPerItem"];
                        }

                        mysqli_free_result($result);

                }

                else {

                        $query = 'SELECT * FROM product ORDER BY costPerItem DESC';

                        $result = mysqli_query($connection,$query);

                        if (!$result) {
                                die("database query failed.");
                        }

                        echo "<b>"."Product price in descending order:"."</b>"."<br>";

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li>";
                                echo $row["description"].": ";
                                echo "$".$row["costPerItem"];
                        }

                        mysqli_free_result($result);

                }

        }

?>

<br><br>

<button onclick="history.go(-1);">Back </button>

</body>

</html>
