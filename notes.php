<?php
include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

// Define branch folders
$branches = [
    "cs_notes" => "Computer Science",
    "electronics_notes" => "Electronics Engineering",
    "mechanical_notes" => "Mechanical Engineering",
    "civil_notes" => "Civil Engineering"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Branch-Wise Notes</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="notes-section">
   <h1 class="heading">Branch-Wise Study Notes</h1>
   
   <div class="box-container">
      <?php foreach ($branches as $key => $branch): ?>
         <div class="box">
            <h3 class="title"><?php echo $branch; ?></h3>
            <p>Click to view available notes.</p>
            <!-- Redirect to folder.php with the branch name -->
            <a href="folder.php?branch=<?php echo $key; ?>" class="inline-btn">View Notes</a>
         </div>
      <?php endforeach; ?>
   </div>
</section>

<?php include 'components/footer.php'; ?>

</body>
</html>
