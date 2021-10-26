<?php

    //connect to database
    $connect = mysqli_connect('localhost', 'weird', 'test1234', 'sea_creature');

    //check connection
    if(!$connect){
        echo 'Connection error:'. mysqli_connect_error();
    }

    // queries to get all creatures
    $sql = 'SELECT name, bio, id, occupation FROM creatures ORDER BY created_at';

    // gettting query result
    $data = mysqli_query($connect, $sql);

    // fetch the resulting rows as an array
    $creatures = mysqli_fetch_all($data, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($data);
    //close connection
    mysqli_close($connect);


?>

<!DOCTYPE html>
<html lang="en">

    <?php include('template/header.php'); ?>

    <h4 class="center grey-text">Creatures!</h4>

    <div class="container">
        <div class="row">
            <?php foreach($creatures as $creature) { ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h5><?php echo htmlspecialchars($creature['name']); ?></h5>
                            <div><?php echo htmlspecialchars($creature['bio']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="#" class="brand-text">more info </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('template/footer.php'); ?>
    
</body>
</html>