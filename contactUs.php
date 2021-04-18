<?php

session_start();

?>
<link rel="stylesheet" href="Main%20Page.css">

		<form method="POST">

            <fieldset>
                <legend>Contact US</legend>
                <p>
                    Corespondence Address<br>
                    Post Address<br>
                    tel: +970569700283<br>
                    fax: +970569700283<br>

                </p>

                    <input type="text" name="name" id="name" placeholder="Enter Your Name"><br>
                    <input type="email" name="email" id="email" placeholder="Enter Your E-mail"><br>
                    <input type="text" name="location" id="location" placeholder="Enter Your Location"><br>
                    <input type="text" name="contentType" id="contentType" placeholder="Enter Type Of Contact"><br>
                <input type="text" name="title" id="title" placeholder="Enter the Title"><br>
                <textarea name="message" id="message" placeholder="Enter Your message Body here" rows="10" cols="100" maxlength="1024"> </textarea><br>
                <input type="reset" name="reset" id="reset"><br>
                <input type="submit" name="submit" id="submit">


            </fieldset>

		</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = 'mohammad.a.ihraiz@gmail.com';
    $subject = $_POST['contentType'];

    $message = $_POST['title'];
    $message .= $_POST['message'];

    $header = "From:".$_POST['email'] ."\r\n";
    $header .= "Name:".$_POST['name'] ."\r\n";
    $header .= "Name:".$_POST['location'] ."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail ($to,$subject,$message,$header);

    if( $retval == true ) {
        echo "Message sent successfully...";
    }else {
        echo "Message could not be sent...";
    }
}

?>
