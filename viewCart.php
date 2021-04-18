<?php
session_start();


?>
<?php if ($_SERVER['REQUEST_METHOD'] = 'GET') : ?>

<html>
<head>
<link href="Main%20Page.css" rel="stylesheet">

</head>
<body>

<table>
        <thead>
            <tr>


                <th>product Name</th>
                <th>Price</th>
                <th>Type</th>
                <th>delete</th>



            </tr>
        </thead>

        <?php

        include 'dbConnect.php';

        $stm = $conn->prepare("SELECT * FROM TempCart WHERE cusID= :id");
        $id=$_SESSION['ID'];
        $stm->bindParam(":id", $id);

        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_NUM);

        foreach ($rows as $row) {
            echo '<tr>
            
            <td>'.$row[2].'</td>
            <td>'.$row[3].'</td>
            <td>'.$row[4].'</td>
            <td><form method="GET" action="deleteCart.php">
            <input type="hidden" name="productId" value="'.$row[1].'">
            <input type="submit" value="delete">
            
            
            </form></td>
            
            
            
            
            
            </tr>';
        }

        ?>

</table>

    <form method="GET" action="#">
        <input type="submit" name="submit">


    </form>


</body>

</html>
<?php endif; ?>