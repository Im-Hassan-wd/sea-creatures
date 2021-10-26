<?php

    //connect to database
    $connect = mysqli_connect('localhost', 'weird', 'test1234', 'sea_creature');

    //check connection
    if(!$connect){
        echo 'Connection error:'. mysqli_connect_error();
    }

    // queries to get all creatures
    $sql = 'SELECT name, bio, id FROM creatures';

    // gettting query result
    $data = mysqli_query($connect, $sql);

    // fetch the resulting rows as an array
    $creature = mysqli_fetch_all($data, MYSQLI_ASSOC);

    print_r($creature);

    // free result from memory
    mysqli_free_result($data);
    //close connection
    mysqli_close($connect);


?>

<!DOCTYPE html>
<html lang="en">

    <?php include('template/header.php'); ?>
    <?php include('template/footer.php'); ?>
    
</body>
</html>