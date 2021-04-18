<?php
session_start();
include 'dbConnect.php';
include 'login.html';
?>
<link rel="stylesheet" href="Main Page.css">

<?php
if(isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['passwd']);
    try {
        $query = "select * from Emploee where Email=:email and Password=:passwd";
        $stmt = $conn->prepare($query);
        $stmt->bindParam('email', $email);
        $stmt->bindValue('passwd', $password);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row) ) {
            if($row['IsManager'] == 1){
                $_SESSION['Email'] = $email;
                $_SESSION['User'] = $row['UserName'];
                $_SESSION['Pass'] = $password;
                $_SESSION['Role'] = 'Manager';

                echo '<script type="text/javascript">'.
                    'window.top.location.reload();'.
                    '</script>';

            } else{
                $_SESSION['Email'] = $email;
                $_SESSION['User'] = $row['UserName'];
                $_SESSION['Pass'] = $password;
                $_SESSION['Role'] = 'Employee';
                echo $_SESSION['Role'];
                echo '<script type="text/javascript">'.
                   'window.top.location.reload();'.
                   '</script>';


            }
        }else {
            $query = "select * from Customer where Email=:email and Password=:passwd";
            $stmt = $conn->prepare($query);
            $stmt->bindParam('email', $email);
            $stmt->bindValue('passwd', $password);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if($count == 1 && !empty($row)) {
                $_SESSION['Email'] = $email;
                $_SESSION['User'] = $row['UserName'];
                $_SESSION['Pass'] = $password;
                $_SESSION['Role'] = 'User';
                $_SESSION['ID'] = $row['ID'];
                echo '<script type="text/javascript">'.
                'window.top.location.reload();'.
                '</script>';

            }else{
                echo "Invalid username and password!";
                // $msg ="Invalid username and password!";
            }
        }

    } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
        // $msg= "Error : ".$e->getMessage();
    }
}
?>
