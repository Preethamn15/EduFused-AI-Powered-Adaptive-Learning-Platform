<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>
<!-- quick select section starts -->
<section class="quick-select">
   <div class="box">
         <h3 class="title">Dsa RoadMap</h3>
         <H4><b>Dsa RoadMap for beginners</b></H4>
         <a href="dsa_roadmap.php" class="inline-btn">RoadMap</a>
      </div>

   <h1 class="heading">quick options</h1>
   <div class="box-container">
   <div class="box">
         <h3 class="title">Diagnosis Test</h3>
         <p>quiz diagnosis for beginners to identify weakness.</p>
         <a href="index.html" class="inline-btn">Take Quiz</a>
      </div>
      

      <div class="box">
         <h3 class="title">Problem Solving</h3>
         <p>Practice your problem-solving skills with our collection.</p>
         <a href="problem_solving.php" class="inline-btn">LAST MINUTE</a>
      </div>

      <div class="box">
         <h3 class="title">Branch-Wise Notes</h3>
         <p>Access organized notes and study materials.</p>
         <a href="notes.php" class="inline-btn">View Notes</a>
      </div>

      <div class="box">
         <h1 class="title">Visualization of Reference Website</h1>
         <h3 class="title">DSA</h3>
         <a href="visual.php" class="inline-btn">Reference</a>
      </div>
   </div>
</section>

<!-- Courses Section -->
<section class="courses">
   <h1 class="heading">Latest Courses</h1>

   <div class="box-container">
  <!-- Quiz Link -->
      <div class="box">
         <h3 class="title">DSA Quizzes</h3>
         <h4>Topic-wise quizzes to test your understanding.</h4>
         <a href="student/takequiz.php" class="inline-btn">Go to Quizzes</a>
      </div>
      <!-- AI Summarizer Tool -->
      <div class="box">
         <div class="tutor">
            <img src="images/pic-1.jpg" alt="">
            <div>
               <h3>AI Tool</h3>
               <span><?= date('Y-m-d'); ?></span>
            </div>
         </div>

         <img src="images/thumb-1.png" class="thumb" alt="">
         <h3 class="title">🧠 Text Summarizer</h3>
         <a href="http://127.0.0.1:5000/" class="inline-btn">Try Now</a>
      </div>	
        <div class="box">
   <div class="tutor">
      <img src="images/pic-1.jpg" alt="">
      <div>
         <h3>PDF Summarizer</h3>
         <span><?= date('Y-m-d'); ?></span>
      </div>
   </div>

   <img src="images/pdf.png" class="thumb" alt="">
   <h3 class="title">Multi-PDF Summarizer</h3>
   <a href="https://multi-pdf-chatbot-jed4wzgu7k9rxajcgh59zj.streamlit.app/" class="inline-btn">Upload & Summarize</a>
</div>

      <!-- User Stats (only if logged in) -->
      <?php if ($user_id != '') { ?>
         <div class="box">
            <h3 class="title">Your Activity</h3>
            <p>Total Likes: <span><?= $total_likes; ?></span></p>
            <a href="likes.php" class="inline-btn">View Likes</a>

            <p>Total Comments: <span><?= $total_comments; ?></span></p>
            <a href="comments.php" class="inline-btn">View Comments</a>

            <p>Saved Playlist: <span><?= $total_bookmarked; ?></span></p>
            <a href="bookmark.php" class="inline-btn">View Bookmarks</a>
         </div>
      <?php } ?>

      
      <!-- Dynamic Playlist Courses -->
      <?php
      $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY date DESC LIMIT 6");
      $select_courses->execute(['active']);
      if ($select_courses->rowCount() > 0) {
         while ($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)) {
            $course_id = $fetch_course['id'];

            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_tutor->execute([$fetch_course['tutor_id']]);
            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);

            if ($fetch_tutor && is_array($fetch_tutor)) {
      ?>
               <div class="box">
                  <div class="tutor">
                     <img src="uploaded_files/<?= htmlspecialchars($fetch_tutor['image']); ?>" alt="">
                     <div>
                        <h3><?= htmlspecialchars($fetch_tutor['name']); ?></h3>
                        <span><?= htmlspecialchars($fetch_course['date']); ?></span>
                     </div>
                  </div>
                  <img src="uploaded_files/<?= htmlspecialchars($fetch_course['thumb']); ?>" class="thumb" alt="">
                  <h3 class="title"><?= htmlspecialchars($fetch_course['title']); ?></h3>
                  <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">View Playlist</a>
               </div>
      <?php
            } else {
               echo '<div class="box"><p class="empty">Tutor not found for this course.</p></div>';
            }
         }
      } else {
         echo '<p class="empty">No courses added yet!</p>';
      }
      ?>
   </div>

   <div class="more-btn">
      <a href="courses.php" class="inline-option-btn">View More</a>
   </div>
</section>

<!-- Footer Section -->
<?php include 'components/footer.php'; ?>

<!-- Botpress Chat -->
<script src="https://cdn.botpress.cloud/webchat/v2.5/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/05/16/08/20250516081527-2BS41T3S.js"></script>

<!-- Custom JS -->
<script src="js/script.js"></script>

</body>
</html>
