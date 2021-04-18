<?php include "dbConnect.php" ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = trim($_POST['productName']);
    $types = trim($_POST['types']);
    $price = trim($_POST['price']);
    $sizee = trim($_POST['size']) . ' ' . trim($_POST['units']) ;
    $quantity = trim($_POST['quantity']);
    $description = trim($_POST['description']);
    $remarks = trim($_POST['remarks']);
    $sql = "INSERT INTO `Product` (`Name`, `Description`, `Type`, `PricePU`, `Quantity`, `Size`, `Remarks`) VALUES (:productName, :description, :types, :price, :quantity,:sizee , :remarks)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":productName", $productName);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":types", $types);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->bindParam(":sizee", $sizee);
    $stmt->bindParam(":remarks", $remarks);
    if ($stmt->execute()) {
        $id = $conn->lastInsertId();
        for ($i = 1; $i < 4; $i++) {
            $path = $_FILES['file'.$i]['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $tmpFilePath = $_FILES['file'.$i]['tmp_name'];
            if ($tmpFilePath != "") {
                $newFileName = $id . "img" . $i . "." . $ext;
                if (move_uploaded_file($tmpFilePath, "img/" . $newFileName)) {
                    echo "product was added successfully.";
                }
            }
        }
        header("location: addProduct.php");
        // $alert = "Your account has been created.";
    } else {
        echo "I am sorry! There was some error. Try again please.";
    }
    // unset($conn);
}
?>
