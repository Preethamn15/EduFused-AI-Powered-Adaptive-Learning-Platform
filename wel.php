<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome | DSA Learning Platform</title>
    <style>
      body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
      }

      .welcome-container {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        padding: 2.5rem 3.5rem;
        border-radius: 20px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
        max-width: 640px;
        text-align: center;
      }

      h1 {
        font-size: 2.7rem;
        margin-bottom: 12px;
        color: #ffeaa7;
      }

      p {
        font-size: 1.15rem;
        margin-bottom: 25px;
      }

      .btn {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: white;
        border: none;
        padding: 0.9rem 2.2rem;
        border-radius: 30px;
        font-weight: bold;
        font-size: 1.05rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 0 10px rgba(106, 17, 203, 0.4);
      }

      .btn:hover {
        background: linear-gradient(135deg, #2575fc, #6a11cb);
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(106, 17, 203, 0.8);
      }
    </style>
  </head>
  <body>
    <div class="welcome-container">
      <h1>Welcome to EduFused</h1>
      <p>
        Diagnose your skills, take curated DSA courses, test your progress, get smart summaries, and chat with our AI tutor.
      </p>
      <a href="login.php" class="btn">Login to Begin</a>
    </div>
  </body>
  </html>