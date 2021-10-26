<?php
     
    $errors = array('email'=>'', 'name'=>'', 'occupation'=>'', 'bio'=> '', 'avatar'=>'');
    // setting empty variables
    $name = $email = $occupation = $bio = '';

    if(isset($_POST['submit'])){

        //check email
        if(empty($_POST['email'])) {
            $errors['email'] = 'An email is required';
        } else {
           $email = $_POST['email']; 
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $errors['email'] = 'email must be valid email address';
           }
        }
        //check name
        if(empty($_POST['name'])) {
            $errors['name'] = 'An name is required';
        } else {
           $name = $_POST['name'];
           if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
               $errors['name'] = 'name must be letters and spaces only';
            } 
        }
        
        //check occupation
        if(empty($_POST['occupation'])) {
            $errors['occupation'] = 'An occupation is required';
        } else {
           $occupation = $_POST['occupation'];
           if(!preg_match('/^[a-zA-Z\s]+$/', $occupation)){
               $errors['occupation'] = 'occupation must be letters and spaces only';
            }  
        }

        //check biography
        if(empty($_POST['bio'])) {
            $errors['bio'] = 'An bio is required';
        } else {
           $bio = $_POST['bio'];
           if(!preg_match('/^[a-zA-Z\s]+$/', $bio)){
               $errors['bio'] = 'bio must be letters and spaces only';
            }  
        }

        //check image
        if(empty($_POST['avatar'])) {
            $errors['avatar'] = 'An avatar is required';
        } else {
           $avatar = $_POST['avatar'];
            $fileName = basename($_POST['avatar']);//["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        }

        if(array_filter($errors)){
            // echo 'errors in the form';
        } else {
            // echo 'form is valid';
            header('location: index.php');
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
            <div class="red-text"><?php echo htmlspecialchars($errors['email']) ?></div>
            <input type="text" name="email" value="<?php echo $email?>">
            <label for="">Creature Name:</label>
            <div class="red-text"><?php echo htmlspecialchars($errors['name']) ?></div>
            <input type="text" name="name" value="<?php echo $name?>">
            <label for="">Occupation:</label>
            <div class="red-text"><?php echo htmlspecialchars($errors['occupation']) ?></div>
            <input type="text" name="occupation" value="<?php echo $occupation?>">
            <label for="">Biography:</label>
            <div class="red-text"><?php echo htmlspecialchars($errors['bio']) ?></div>
            <input type="text" name="bio" value="<?php echo $bio?>">
            <label for="">Image:</label>
            <div class="red-text"><?php echo htmlspecialchars($errors['avatar']) ?></div>
            <input type="file" name="avatar" value="<?php echo $avatar?>">
            <div class="center">
                <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('template/footer.php'); ?>
    
</body>
</html>