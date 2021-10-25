<?php

    if(isset($_POST['submit'])){
        echo $_POST['email'];
        echo $_POST['name'];
        echo $_POST['occupation'];
    }

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