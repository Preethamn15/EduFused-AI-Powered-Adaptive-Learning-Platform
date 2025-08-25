<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Welcome to our website, where learning meets excitement! At our platform, we're dedicated to revolutionizing the way you perceive education, especially for the  DIPLOMA STUDENTS AND CHANGE OF BRANCH STUDENTS. Our mission is simple yet profound: to make learning enjoyable, memorable, and effective.

<p>Mastering DMA Made Easy
Whether you're a seasoned professional looking to sharpen your skills or a curious beginner taking your first steps into the world of DMS, our platform caters to learners of all levels. Our comprehensive curriculum covers a wide range of topics, from basic  DISCRETE MATHEMATICS, ensuring that you have all the tools you need to succeed.
</p>
<p>
What Sets Us Apart
Expert Guidance: Our team of experienced educators and industry professionals are here to guide you every step of the way. With their expertise and insights, you'll gain valuable knowledge and practical skills that are directly applicable in real-world scenarios.
</p>
<p>
Hands-On Experience: Theory is important, but practical experience is invaluable. That's why we emphasize hands-on learning, providing you with opportunities to apply your knowledge in practical projects and real-life scenarios.
</p>
Community Support: Learning is more enjoyable when you're part of a supportive community. Connect with like-minded learners, share your experiences, and collaborate on projects in our vibrant online community.
Join Us Today!
Are you ready to embark on an exciting journey of learning and discovery? Join us today and unlock the door to a world of possibilities. Whether you're aiming to advance your career, tackle challenging problems, or simply expand your horizons, our platform is here to support you every step of the way.</p>
         <a href="courses.php" class="inline-btn">our courses</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+1k</h3>
            <span>online courses</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+25k</h3>
            <span>brilliants students</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+5k</h3>
            <span>expert teachers</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <span>job placement</span>
         </div>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="heading">student's reviews</h1>

   <div class="box-container">

      <div class="box">
         <p>"I absolutely love this platform! The interactive tutorials and gamified challenges make learning  DISCRETE MATHEMATICS so much fun. The hands-on projects are especially helpful in reinforcing the concepts. Highly recommended for anyone looking to master DMS!"</p>
         <div class="user">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>preethi</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>"As a beginner in the field of DMS, I found this platform to be incredibly helpful. The explanations are clear and easy to understand, and the quizzes help reinforce what I've learned. I appreciate the supportive community and the guidance from the instructors. Thank you for making learning enjoyable!"</p>
         <div class="user">
            <img src="images/pic-3.jpg" alt="">
            <div>
               <h3>Preetham</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>"I've been using this platform for a while now, and I'm impressed with the depth of content and the quality of instruction. The instructors are knowledgeable and responsive to questions, and the projects are challenging yet rewarding. It's been a great experience overall, and I've seen a significant improvement in my understanding of DSDA."</p>
         <div class="user">
            <img src="images/pic-4.jpg" alt="">
            <div>
               <h3>Nishanth</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>"This platform has been a game-changer for me. The real-world examples and practical projects have helped me apply theoretical concepts to actual problems. I appreciate the emphasis on hands-on learning, and the community support has been invaluable. I highly recommend this platform to anyone serious about mastering DMS."</p>
         <div class="user">
            <img src="images/pic-5.jpg" alt="">
            <div>
               <h3>Nnandeesh</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>"I've tried several online platforms for learning DSDA, but this one stands out from the rest. The interactive tutorials are engaging, the quizzes are challenging yet manageable, and the projects are a great way to test my skills. I've learned so much since I started using this platform, and I'm excited to continue my journey here."</p>
         <div class="user">
            <img src="images/pic-6.jpg" alt="">
            <div>
               <h3>Roopa</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>
	        <div class="box">
<p> "I'm relatively new to the world of programming, and this platform has been a fantastic resource for me. The step-by-step explanations and the hands-on approach have helped me grasp complex concepts with ease. I appreciate the flexibility of the platform, allowing me to learn at my own pace. Overall, I'm extremely satisfied with my experience here."</p>
         <div class="user">
            <img src="images/pic-6.jpg" alt="">
            <div>
               <h3>Lucy</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      

   </div>

</section>

<!-- reviews section ends -->










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>