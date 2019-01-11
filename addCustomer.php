<!-- question 4 -->
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

<h1>Here are the customers:</h1>

<ol>

<?php

        // take input data
        $fName = $_POST["firstName"];
        $lName = $_POST["lastName"];
        $cty =$_POST["city"];
        $pNumber = $_POST["phoneNumber"];
        $agent = $_POST["agentID"];

        $query1= 'SELECT max(customerID) AS maxID FROM customer';
        $result=mysqli_query($connection,$query1);

        if (!$result) {
                die("database max query failed.");
        }

        $row = mysqli_fetch_assoc($result);

        // create new id
        $newID = intval($row["maxID"]) + 1;
        $cID = (string)$newID;

        // insert data
        $query2 = 'INSERT INTO customer values("' . $cID . '","' . $fName . '","' . $lName . '","' . $cty . '","' . $pNumber . '","' . $agent . '")';

        if (!mysqli_query($connection, $query2)) {
                die("Error: insert failed" . mysqli_error($connection));
        }

        echo "customer was added";

        mysqli_close($connection);

?>

</ol>

<button onclick="history.go(-1);">Back</button>

</body>
</html>

