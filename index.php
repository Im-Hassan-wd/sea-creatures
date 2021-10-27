<?php

    include('config/db_connect.php');
    
    // queries to get all creatures
    $sql = 'SELECT name, avatar, bio, id, occupation FROM creatures ORDER BY created_at';

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
                <div class="col s4 md6">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <img src="images/<?php echo $creature['avatar'] ?>" alt="<?php echo htmlspecialchars($creature['name']); ?>">
                            <h5><?php echo htmlspecialchars($creature['name']); ?></h5>
                            <div><?php echo htmlspecialchars($creature['occupation']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $creature['id']?>" class="brand-text">more info </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('template/footer.php'); ?>
    
</body>
</html>
