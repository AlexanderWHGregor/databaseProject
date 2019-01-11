<!-- question 5 -->
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

        //take data and update
        $valN = $_POST["num"];
        $cID = $_POST["which"];

        $query = 'UPDATE customer SET phoneNumber = "'.$valN.'" WHERE customerID = "'.$cID.'"';

        $result = mysqli_query($connection, $query);

        if (!$result) {
                die("Error: update failed. ".mysqli_error($connection));
        }

        else {
                echo "Update successful"."<br>";
        }

        mysqli_close($connection);

?>

<br><br>

<button onclick="history.go(-1);">Back</button>

</body>

</html>
