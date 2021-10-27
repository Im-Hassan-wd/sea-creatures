<?php 

    include('config/db_connect.php');
    // check GET request id parameter
    if(isset($_GET['id'])) {

        $id = mysqli_real_escape_string($connect, $_GET['id']);

        // make sql
        $sql = "SELECT * from creatures Where id = $id";

        //get the query result
        $data = mysqli_query($connect, $sql);

        //fetch data 
        $creature = mysqli_fetch_assoc($data); 

        //free reslt and close connection
        mysqli_free_result($data);
        mysqli_close($connect);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('template/header.php'); ?>

    <div class="container">
        <?php if($creature) { ?>
            <h4><?php echo htmlspecialchars($creature['name']); ?></h4>
            <p>Created by:<?php echo htmlspecialchars($creature['email']); ?></p>
            <p>Created at:<?php echo date($creature['created_at']); ?></p>
            <h5>Biography</h5>
            <h6><?php echo htmlspecialchars($creature['bio']); ?></h6>
        <?php } else { ?>
            <h5>error 404</h5>
        <?php }?>
    </div>

    <?php include('template/footer.php'); ?>
</html>