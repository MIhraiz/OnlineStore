<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    include 'dbConnect.php';

    $stm = $conn->prepare("Delete  FROM TempCart WHERE cusID= :id AND prodID= :productId");
    $id = $_SESSION['ID'];
    $stm->bindParam(":id", $id);
    $stm->bindParam(":productId", $_GET['productId']);

    $stm->execute();
    echo '<script type="text/javascript">'.
        'window.top.location.reload();'.
        '</script>';



}
