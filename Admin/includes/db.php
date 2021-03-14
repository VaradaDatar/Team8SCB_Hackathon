<?php

$connection = mysqli_connect('localhost','root','','scb');
if($connection)
{

}
else
{
    echo "Error in Connection".mysqli_error($connection);
}


?>

 