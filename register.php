<link rel="stylesheet" href="Main Page.css">


<?php

session_start();
include 'register.html';
include("dbConnect.php");

$idNum = "";
$name = "";
$username = "";
$password = "";
$confPass = "";
$address = "";
$birthDate = "";
$email = "";
$phone = "";
$fax = "";
$cardNum = "";
$expDate = "";
$cardName = "";
$bank = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNum = trim($_POST['userId']);
    $name = trim($_POST['realName']);
    $username = trim($_POST['UserName']);
    $password = trim($_POST['password']);
    $confPass = trim($_POST['confirm_password']);
    $address = trim($_POST['address']);
    $birthDate = trim($_POST['birthDate']);
    $email = trim($_POST['Email']);
    $phone = trim($_POST['phone']);
    $fax = trim($_POST['fax']);
    $cardNum = trim($_POST['cardNum']);
    $expDate = trim($_POST['expDate']);
    $cardName = trim($_POST['cardName']);
    $bank = trim($_POST['bank']);

    $sql = "SELECT ID FROM Customer WHERE ID = :userId";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bindParam(":userId", $param_user_id, PDO::PARAM_STR);
        $param_user_id = trim($_POST["userId"]);

        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $id_error = "This Id is already used.";
                echo $id_error;
            } else {
                $idNum = trim($_POST["userId"]);
            }
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    $sql = "SELECT Email FROM Customer WHERE Email = :email";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

        $param_email = trim($_POST["Email"]);

        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $email_error = "This email is already taken.";
                echo $email_error;
            } else {
                $email = trim($_POST["Email"]);
            }
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    if (empty($password_error) && ($password != $confPass)) {
        $confirm_password_error = "Password did not match.";
        echo $confirm_password_error;
    }
    if (empty($user_name_error) && empty($confirm_password_error) && empty($email_error)) {

        $sql = "INSERT INTO `Customer` (`ID`, `UserName`, `Password`, `Name`,`DateOfBirth` ,`Address`, `Email`, `Phone`, `Fax`, `CCNumber`, `CCName`, `CCBank`, `CCDate`) VALUES (:userId, :UserName, :password, :realName, :birthDate ,:address, :Email, :phone, :fax, :cardNum, :cardName , :bank, :expDate)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":userId", $idNum);
        $stmt->bindParam(":UserName", $username);
        $stmt->bindParam(":realName", $name);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":birthDate", $birthDate);
        $stmt->bindParam(":Email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":fax", $fax);
        $stmt->bindParam(":cardName", $cardName);
        $stmt->bindParam(":expDate", $expDate);
        $stmt->bindParam(":cardNum", $cardNum);
        $stmt->bindParam(":bank", $bank);
        if ($stmt->execute()) {
            echo "Your account has been created.";
            die();
            echo '<script type="text/javascript">'.
                'window.top.location.reload();'.
                '</script>';
        } else {
            echo "There was some error. Try again please.";
        }
    }
    // unset($conn);
}
?>