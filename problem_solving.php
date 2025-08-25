<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Problem Solving</title>
   <link rel="stylesheet" href="style.css">
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         background-color: #f4f4f4;
      }
      .container {
         width: 80%;
         margin: auto;
         padding: 20px;
         background: white;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
         border-radius: 10px;
         text-align: center;
      }
      h1, h2, h3 {
         color: #333;
      }
      .problem-section {
         background: #fff;
         padding: 20px;
         margin: 20px 0;
         border-radius: 8px;
         box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
      }
      .question-image img {
         width: 60%;
         max-width: 500px;
         border-radius: 5px;
         box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      }
      .instructions {
         background: #e9f5ff;
         padding: 15px;
         border-left: 5px solid #007BFF;
         margin: 15px 0;
         border-radius: 5px;
         text-align: left;
      }
      textarea, input[type="file"] {
         width: 100%;
         padding: 10px;
         border-radius: 5px;
         border: 1px solid #ccc;
         margin-top: 10px;
      }
      .submit-btn {
         display: block;
         width: 100%;
         padding: 10px;
         background: #007BFF;
         color: white;
         border: none;
         border-radius: 5px;
         font-size: 16px;
         cursor: pointer;
         margin-top: 10px;
      }
      .submit-btn:hover {
         background: #0056b3;
      }
      .reward-section {
         background: #fffae6;
         padding: 15px;
         border-radius: 8px;
         margin-top: 20px;
         box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
         font-weight: bold;
         color: #d48806;
      }
   </style>
</head>
<body>
   <div class="container">
      <h1>Problem Solving Questions</h1>
      
      <div class="reward-section">
         <p>🚀 Solve problems, earn points, and climb the leaderboard! Submit both written solutions and images to maximize your score!</p>
      </div>
      
      <!-- Question 1 -->
      <div class="problem-section">
         <h2>Question 1</h2>
         <div class="question-image">
            <img src="q6.png" alt="Question Image">
         </div>
         <div class="instructions">
            <h3>Instructions</h3>
            <p>Use rules of inference to prove a conclusion given the premises:</p>
            <p><strong>Given:</strong> ∀x(P(x) ∨ Q(x)) and ∀x((¬P(x) ∧ Q(x)) → R(x))</p>
            <p><strong>To Prove:</strong> ∀x(¬R(x) → P(x))</p>
         </div>
         <form action="submit_solution.php" method="POST" enctype="multipart/form-data">
            <textarea name="solution" rows="5" placeholder="Type your solution here"></textarea>
            <input type="file" name="solution_image" accept="image/*">
            <button class="submit-btn" type="submit">Submit</button>
         </form>
      </div>
      
      <!-- Question 2 -->
      <div class="problem-section">
         <h2>Question 2</h2>
         <div class="question-image">
            <img src="q5.png" alt="Question Image">
         </div>
         <form action="submit_solution.php" method="POST" enctype="multipart/form-data">
            <textarea name="solution" rows="5" placeholder="Type your solution here"></textarea>
            <input type="file" name="solution_image" accept="image/*">
            <button class="submit-btn" type="submit">Submit</button>
         </form>
      </div>
      
      <!-- Question 3 -->
      <div class="problem-section">
         <h2>Question 3 </h2>
         <div class="question-image">
            <img src="q1.png" alt="Question Image">
         </div>
         <div class="instructions">
            <h3>Instructions</h3>
            <p>This question involves set theory and is divided into three parts:</p>
            <ul>
               <li>Prove an equation involving the cardinality of unions and intersections of sets A, B, and C.</li>
               <li>Prove or disprove statements about Cartesian products of sets with union and intersection operations.</li>
               <li>Show a relationship between set complements and union using a membership table.</li>
            </ul>
         </div>
         <form action="submit_solution.php" method="POST" enctype="multipart/form-data">
            <textarea name="solution" rows="5" placeholder="Type your solution here"></textarea>
            <input type="file" name="solution_image" accept="image/*">
            <button class="submit-btn" type="submit">Submit</button>
         </form>
      </div>
   </div>
</body>
</html>
