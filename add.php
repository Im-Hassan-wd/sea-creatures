<?php

    if(isset($_POST['submit'])){

        //check email
        if(empty($_POST['email'])) {
            echo 'An email is required <br/>';
        } else {
           $email = $_POST['email']; 
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               echo 'email must be valid email address';
           }
        }
        //check name
        if(empty($_POST['name'])) {
            echo 'An name is required <br/>';
        } else {
           $name = $_POST['name'];
           if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
               echo 'name must be letters and spaces only';
            } 
        }
        //check occupatio
        if(empty($_POST['occupation'])) {
            echo 'An occupation is required <br/>';
        } else {
           $occupation = $_POST['occupation'];
           if(!preg_match('/^([a-zA-Z\s]+)/', $occupation)){
               echo 'occupation must be letters and spaces only';
            }  
        }
    } // end of post check

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('template/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a Creature</h4>
        <form action="add.php" method="POST" class="white">
            <label for="">Your Email:</label>
            <input type="text" name="email">
            <label for="">Creature Name:</label>
            <input type="text" name="name">
            <label for="">Occupation:</label>
            <input type="text" name="occupation">
            <div class="center">
                <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('template/footer.php'); ?>
    
</body>
</html>