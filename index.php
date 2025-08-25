<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>DSA Topic-wise Quiz Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #f0f0f5;
    display: flex;
    justify-content: center;
    padding: 40px 20px;
  }

  .container {
    background: #1f1f38;
    max-width: 700px;
    width: 100%;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(118, 75, 162, 0.6);
    padding: 35px 40px;
  }

  h1 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 800;
    color: #e0c3fc;
    text-shadow: 0 0 10px #ab72ff;
  }

  label {
    font-weight: 600;
    display: block;
    margin-bottom: 8px;
    font-size: 1rem;
    color: #d1c4e9;
  }

  input[type="text"] {
    width: 100%;
    padding: 12px 16px;
    font-size: 1.1rem;
    border: 2px solid #8860d0;
    border-radius: 10px;
    margin-bottom: 22px;
    background: #2c2c57;
    color: #e6e1ff;
    transition: border-color 0.3s ease, background-color 0.3s ease;
  }
  input[type="text"]:focus {
    outline: none;
    border-color: #bb86fc;
    background-color: #3a3a7c;
    box-shadow: 0 0 10px #bb86fcaa;
    color: #fff;
  }

  #quizForm {
    margin-bottom: 30px;
  }

  input[type="submit"] {
    background: linear-gradient(90deg, #9c27b0 0%, #e040fb 100%);
    border: none;
    color: white;
    padding: 16px 36px;
    font-size: 1.2rem;
    font-weight: 700;
    border-radius: 35px;
    cursor: pointer;
    width: 100%;
    box-shadow: 0 6px 20px rgba(224, 64, 251, 0.5);
    transition: background 0.4s ease, transform 0.15s ease;
  }
  input[type="submit"]:hover {
    background: linear-gradient(90deg, #ce93d8 0%, #e1bee7 100%);
    color: #1a0033;
    transform: translateY(-2px);
  }
  input[type="submit"]:active {
    transform: translateY(0);
  }

  #resultSection {
    background: #2a2a59;
    padding: 30px 25px;
    border-radius: 15px;
    box-shadow: 0 6px 24px rgba(118, 75, 162, 0.7);
  }

  #resultSection h2 {
    color: #d1b3ff;
    text-align: center;
    margin-bottom: 20px;
    font-weight: 700;
    text-shadow: 0 0 8px #b29aff;
  }

  #scoreText {
    font-size: 1.4rem;
    text-align: center;
    margin-bottom: 25px;
    color: #e3d7ff;
  }

  #wrongAnswers {
    background: #3b3b82;
    border-radius: 15px;
    padding: 20px 25px;
    margin-bottom: 25px;
    max-height: 180px;
    overflow-y: auto;
    border: 2px solid #916fdb;
    color: #e0d6ff;
  }

  #wrongAnswers .wrong-item {
    margin-bottom: 14px;
    padding-bottom: 10px;
    border-bottom: 1px solid #7b69b5;
  }

  #wrongAnswers strong {
    color: #f25d94;
  }

  #wrongAnswers span {
    display: inline-block;
    margin-left: 8px;
    color: #b1a4d4;
  }

  #questionsContainer {
    margin-bottom: 30px;
  }

  /* Responsive */
  @media (max-width: 480px) {
    .container {
      padding: 25px 30px;
    }
    h1 {
      font-size: 1.9rem;
    }
    input[type="submit"] {
      font-size: 1.1rem;
      padding: 14px 24px;
    }
  }
</style>

</head>
<body>
  <div class="container">
    <h1>DSA Quiz to Identify Topic Weakness</h1>
    <form id="quizForm">
  <div id="questionsContainer"></div>
  <input type="submit" value="Submit Quiz" />
</form>


    <div id="resultSection" style="display:none;">
      <h2>Results</h2>
      <p id="scoreText"></p>
      <div id="wrongAnswers"></div>
      <canvas id="performanceChart" width="600" height="300"></canvas>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
