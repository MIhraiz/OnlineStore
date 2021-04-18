<?php
session_start();
session_unset();
session_destroy();
if(empty($_SESSION['Email'])){
    echo '<script type="text/javascript">'.
        'window.top.location.reload();'.
        '</script>';
}
?>