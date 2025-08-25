<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Submission Result</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["solution"])) {
        // Solution submitted successfully
        echo "<h1>Thank you!</h1>";
        echo "<p>Your solution has been successfully submitted.</p>";
    } else {
        // Solution field empty or missing
        echo "<h1>Error!</h1>";
        echo "<p>Solution submission was empty. Please try again.</p>";
    }
} else {
    // Not a POST request, redirect user
    header("Location: index.php");
    exit();
}
?>

</body>
</html>
