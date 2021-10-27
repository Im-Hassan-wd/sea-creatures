<?php 

    include('config/db_connect.php');

    if(isset($_POST['delete'])) {
      $id_to_delete = mysqli_real_escape_string($connect, $_POST['id_to_delete']);

      $sql = "DELETE FROM creatures WHERE id = $id_to_delete";

      if(mysqli_query($connect, $sql)){
          header('Location: index.php');
      } else {
          echo 'query error:' . mysqli_error($connect);
      }
    }
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

            <!-- Delete creature -->
            <form action="details.php" method="POST">
               <input type="hidden" name="id_to_delete" value="<?php echo $creature['id'] ?>">  
               <input type="submit" value="Delete" name="delete" class="btn brand z-depth-0">
            </form>


        <?php } else { ?>
            <header>
                <h3>Eror 404</h3>
            </header>
                <h5>No such creature!</h5>
                <a href="index.php" class="btn brand z-depth-0">go home</a>
                <img src="images/16.svg" alt="">
        <?php }?>
    </div>

    <?php include('template/footer.php'); ?>
</html>