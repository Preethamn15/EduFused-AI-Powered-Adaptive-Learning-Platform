<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {

    $id = unique_id();
    $name = trim($_POST['name']);
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = trim($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $rename = unique_id() . '.' . $ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_files/' . $rename;

    $valid_email = preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|in|org|net|edu|ac|gov|co)(\.[a-z]{2})?$/', $email);

    if (!$email || !$valid_email) {
        $message[] = 'Invalid email format or domain!';
    } elseif (strlen($pass) < 9 || strlen($cpass) < 9) {
        $message[] = 'Password must be at least 9 characters!';
    } elseif ($pass !== $cpass) {
        $message[] = 'Confirm password does not match!';
    } elseif (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
        $message[] = 'Only image files (jpg, jpeg, png, gif) are allowed!';
    } elseif ($image_size > 2 * 1024 * 1024) {
        $message[] = 'Image size should not exceed 2MB!';
    } else {
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $select_user->execute([$email]);

        if ($select_user->rowCount() > 0) {
            $message[] = 'Email already taken!';
        } else {
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
            $insert_user->execute([$id, $name, $email, $hashed_pass, $rename]);

            move_uploaded_file($image_tmp_name, $image_folder);

            setcookie('user_id', $id, time() + 60 * 60 * 24 * 30, '/');
            header('location:home.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Create Account</h3>

      <?php
      if (isset($message)) {
         foreach ($message as $msg) {
            echo '<div class="message">' . $msg . '</div>';
         }
      }
      ?>

      <div class="flex">
         <div class="col">
            <p>Your name <span>*</span></p>
            <input type="text" name="name" placeholder="Enter your name" maxlength="50" required class="box">

            <p>Your email <span>*</span></p>
            <input type="email" name="email" placeholder="Enter your email" maxlength="100" required class="box">
         </div>
         <div class="col">
            <p>Your password <span>*</span></p>
            <input type="password" name="pass" placeholder="Minimum 9 characters" minlength="9" required class="box">

            <p>Confirm password <span>*</span></p>
            <input type="password" name="cpass" placeholder="Confirm your password" minlength="9" required class="box">
         </div>
      </div>

      <p>Select image <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">

      <p class="link">Already have an account? <a href="login.php">Login now</a></p>
      <input type="submit" name="submit" value="Register now" class="btn">
   </form>

</section>

<?php include 'components/footer.php'; ?>

<!-- custom js file link -->
<script src="js/script.js"></script>

</body>
</html>
	