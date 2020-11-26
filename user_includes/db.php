
<?php

global $connection;

$connection = mysqli_connect('localhost','root','','rationcard');
if($connection)
{
    //echo "success";

}
else
{
    echo "Error";
}

?>