<?php 

    //connect to database
    $connect = mysqli_connect('localhost', 'weird', 'test1234', 'sea_creature');

    //check connection
    if(!$connect){
        echo 'Connection error:'. mysqli_connect_error();
    }

?>