
<?php
ob_start();
?>
<?php
 $_SESSION["user_id"] = "";
 $_SESSION["u_name"] = "";

    header("Location:user_login.php");
?>