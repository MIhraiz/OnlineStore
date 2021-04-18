<?php include("dbConnect.php"); ?>
<link rel="stylesheet" type="text/css" href="Main%20Page.css">
<section>
    <?php
    $query = "select * from COrder where Status < 0 order by ID";
    $dbResults = $conn->query($query);
    if ($dbResults) {
        $rows = $dbResults->fetchAll();
    } else {
        echo "There are no Orders to ship";
    }

    ?>
    <table id="orders">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Items</th>
            <th>Total Price</th>
            <th>Ship Button</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($rows as $row):
            $sql = "select ItemID, Quantity, PricePerUnit from OrderItems where OrderID='" . $row['OrderID'] . "'";
            $result = $conn->query($sql);
            $items = $result->fetchAll();
            ?>
            <tr>
                <td><?php echo $row['ID'] ?></td>
                <td><?php echo $row['CustomerID'] ?></td>
                <td><a href="#">Details // not function yet</a></td>
                <td><?php echo $row['TotalPrice'] ?></td>
                <td>
                    <form method="post">
                        <input type="submit" value="<?php echo $row['ID']?>" class="ship" name="Ship">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</section>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = trim($_POST['Ship']);

    $sql = "UPDATE COrder SET Status=1, ShippingDate=CURDATE() WHERE ID = $orderID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

}

?>
