<?php
include 'components/connect.php';

// Get the branch folder from URL
$branch = $_GET['branch'] ?? '';

// Map folder names to display names
$branch_names = [
    "cs_notes" => "Computer Science",
    "electronics_notes" => "Electronics Engineering",
    "mechanical_notes" => "Mechanical Engineering",
    "civil_notes" => "Civil Engineering"
];

// Check if the given branch exists in our list
if (!array_key_exists($branch, $branch_names)) {
    die("Invalid branch selected!");
}

// Set folder path
$folder_path = "uploads/$branch/";

// Check if the folder exists
if (!is_dir($folder_path)) {
    die("Folder not found!");
}

// Get PDF files from the folder
$files = array_diff(scandir($folder_path), array('.', '..'));
$files = array_filter($files, function($file) {
    return pathinfo($file, PATHINFO_EXTENSION) == 'pdf';
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $branch_names[$branch]; ?> Study Notes</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="notes-section">
   <h1 class="heading"><?php echo $branch_names[$branch]; ?> Study Notes</h1>
   
   <div class="box-container">
      <?php if (empty($files)): ?>
         <p>No PDF files found in this folder.</p>
      <?php else: ?>
         <?php foreach ($files as $file): ?>
            <div class="box">
               <h3 class="title"><?php echo $file; ?></h3>
               <!-- Link to view the PDF -->
               <a href="uploads/<?php echo $branch . '/' . $file; ?>" class="inline-btn" target="_blank">View File</a>
            </div>
         <?php endforeach; ?>
      <?php endif; ?>
   </div>
</section>

<?php include 'components/footer.php'; ?>

</body>
</html>
