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
<h1>Here is the purchase:</h1>
<ol>

<?php

        // takes data and checks if already purchased
        $qntyP = $_POST["qnty"];
        $cID = $_POST["whichCID"];
        $pID = $_POST["whichPID"];

        $querycheck = 'SELECT * FROM purchases WHERE customerID = "'.$cID.'" AND productID = "'.$pID.'"';
        $result = mysqli_query($connection,$querycheck);

        // update if already purchased
        if (mysqli_num_rows($result) == 1) {

                $query1 = 'UPDATE purchases SET quantity += "'.$qntyP.'" WHERE customerID = "'.$cID.'" AND productID = "'.$pID.'"';
                $result = mysqli_query($connection,$query1);

                if (!$result) {
                        die("Error: update failed");
                }

                echo "purchase was added";

                mysqli_close($connection);

        }

        else {

                // add purchase if not previously purchased
                $query2 = 'INSERT INTO purchases values("' . $pID . '","' . $cID . '","' . $qntyP . '")';

                if (!mysqli_query($connection, $query2)) {
                        die("Error: insert failed" . mysqli_error($connection));
                }

                echo "purchase was added";

                mysqli_close($connection);

        }

?>

</ol>

<button onclick="history.go(-1);">Back</button>

</body>
</html>
