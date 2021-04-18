<?php
session_start();
?>
<link rel="stylesheet" href="Main Page.css">
<link rel="script" href="Search.js">

<html>

<head>
</head>


<body>
    <table class=>
        <thead>
            <tr>
                <th>short list</th>
                <th>ProductId</th>
                <th>Price</th>
                <th>Type</th>
                <th>Quantity Available</th>
                <th>Quantity You want</th>
                <th>Add to cart</th>


            </tr>
        </thead>

        <?php

        include 'dbConnect.php';
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['Name'])) {
                $name = $_GET['Name'];

                $query = "Select * from Product where Name= :name";
                $result = $conn->prepare($query);
                $result->bindValue(':name', $name);
                $result->execute();
                $rows = $result->fetchAll(PDO::FETCH_NUM);

                foreach ($rows as $row) {

                    echo '<tr>
                    <td><input type="checkbox" value=""></td>
                <td>' . $row[0] . '</td>
                <td>' . $row[4] . '</td>
                <td><a>' . $row[3] . '</a></td>
                <td>' . $row[5] . '</td>
                ';
                    if (!isset($_SESSION['Role'])||$_SESSION['Role'] == 'User') {

                        echo '
                <form method="GET" action="addToCart.php">
                <input type="hidden" name="price" value="' . $row[4] . '">
                <input type="hidden" name="productId" value="' . $row[0] . '">
                <input type="hidden" name="productName" value="' . $row[1] . '">
                <td><input type="number" name="quantity" step="1" min="1"  ></td>
                <td>
                <input type="submit" name="addToCart" value="add to cart">
               </td>
               </form>
                </tr>
                ';
                    }
                }
            } else if (isset($_GET['PriceFrom']) && isset($_GET['PriceTo'])) {
                $from = $_GET['PriceFrom'];
                $to = $_GET['PriceTo'];
                $q = "select * from Product where PricePU between :from AND :to";
                include 'dbConnect.php';
                $res = $conn->prepare($q);
                $res->bindValue(':from', $from);
                $res->bindValue(':to', $to);

                $res->execute();
                $rows = $res->fetchAll(PDO::FETCH_NUM);
                foreach ($rows as $row) {
                    echo '<tr>
                    <td><input type="checkbox" value=""></td>
                <td>' . $row[0] . '</td>
                <td>' . $row[4] . '</td>
                <td><a>' . $row[3] . '</a></td>
                <td>' . $row[5] . '</td>';
                if(!isset($_SESSION['Role'])||$_SESSION['Role'] == 'User'){
                    echo '
                <form method="GET" action="addToCart.php">
                <input type="hidden" name="price" value="' . $row[4] . '">
                <input type="hidden" name="productId" value="' . $row[0] . '">
                <input type="hidden" name="productName" value="' . $row[1] . '">
                <td><input type="number" name="quantity" step="1" min="1"  ></td>
                <td>
                <input type="submit" name="addToCart" value="add to cart">
               </td>
               </form>
                </tr>
                ';}
                }
            }
        }


        ?>
        <?php if ($_SERVER["REQUEST_METHOD"] == "GET") : ?>
    </table>
    <form method="GET" action="viewCart.php">
        <input type="submit" name="Viewing Cart" value="View Cart">

    </form>
<?php endif; ?>



</body>

</html>