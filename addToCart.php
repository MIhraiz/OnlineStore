<?php
session_start();


if($_SERVER['REQUEST_METHOD']=='GET'){
$price=$_GET['price'];
$quantity=$_GET['quantity'];
$cusID=$_SESSION['ID'];
$prodID=$_GET['productId'];
$prodName=$_GET['productName'];






include 'dbConnect.php';
$stm = $conn->prepare("INSERT INTO `TempCart`( `CusID`, `ProdID`,`ProdName`,`Quantity`,`PricePU`) VALUES (?,?,?,?,?)");
$stm->bindValue(2, $prodID);
$stm->bindValue(1, $cusID);
$stm->bindValue(4, $quantity);
$stm->bindValue(5, $price);
$stm->bindValue(3, $prodName);

$stm->execute();
}

echo '<script type="text/javascript">'.
    'window.top.location.reload();'.
    '</script>';


?>



