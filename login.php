<?php
include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if(isset($_POST['submit'])){

   // Validate and sanitize email
   $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
   $password = $_POST['pass'];

   if ($email && strlen($password) >= 9) {
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
      $select_user->execute([$email]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);

      if($select_user->rowCount() > 0 && password_verify($password, $row['password'])){
         setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
         header('location:home.php');
      } else {
         $message[] = 'Incorrect email or password!';
      }
   } else {
      $message[] = 'Invalid email or password must be at least 9 characters!';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>welcome back!</h3>

      <?php
      if(isset($message)){
         foreach($message as $msg){
            echo '<div class="message">'.$msg.'</div>';
         }
      }
      ?>

      <p>Your Email <span>*</span></p>
      <input type="email" name="email" placeholder="Enter your email" required class="box">

      <p>Your Password <span>*</span></p>
      <input type="password" name="pass" placeholder="Minimum 9 characters" minlength="9" required class="box">

      <p class="link">Don't have an account? <a href="register.php">Register now</a></p>
      <input type="submit" name="submit" value="Login Now" class="btn">
   </form>

</section>

<?php include 'components/footer.php'; ?>

<!-- custom js file link -->
<script src="js/script.js"></script>

</body>
</html>
