<?php

    $link = mysqli_connect("localhost", "root", "", "scb");
        
    if($link)
    {
        // echo "Success".mysqli_error($link);
    }
    else
    {
        echo "Error in Connection".mysqli_error($link);
    }

            

?>