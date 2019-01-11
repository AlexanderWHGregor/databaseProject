<!-- link question 6 -->
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

        // receive input and delete appropriate data
        $cID = $_POST["which"];

        $query1 = 'DELETE FROM customer WHERE customerID = "'.$cID.'"';

        $result1 = mysqli_query($connection, $query1);

        if (!$result1) {
                die("Error: delete 1 failed. ".mysqli_error($connection));
        }

        else {
                echo "Delete 1 successful"."<br>";
        }

        $query2 = 'DELETE FROM purchases WHERE customerID = "'.$cID.'"';
        $result2 = mysqli_query($connection, $query2);

        if (!$result2) {
                die("Error: delete 2 failed. ".mysqli_error($connection));
        }

        else {
                echo "Delete 2 successful";
        }

        mysqli_close($connection);

?>

<br><br>

<button onclick="history.go(-1);">Back</button>

</body>

</html>
