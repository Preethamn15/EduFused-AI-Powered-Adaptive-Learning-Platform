<!DOCTYPE html>
<html>
<head>
  <title>Student - Take Quiz</title>
  <style>
    /* Center everything vertically and horizontally */
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f9;
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 40px 20px;
      color: #333;
    }

    h2, h3 {
      margin-bottom: 20px;
      text-align: center;
      color: #4a148c;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
      text-align: center;
    }

    input[type="text"], select {
      width: 280px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #bbb;
      border-radius: 6px;
      margin-bottom: 25px;
      display: block;
      margin-left: auto;
      margin-right: auto;
      box-sizing: border-box;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus, select:focus {
      border-color: #7527a9;
      outline: none;
      box-shadow: 0 0 5px rgba(116,37,169,0.5);
    }

    button {
      background-color: rgb(116, 37, 169);
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 18px;
      cursor: pointer;
      margin: 15px auto;
      border-radius: 6px;
      display: block;
      min-width: 150px;
      transition: background-color 0.3s ease;
    }

    button:hover:not(:disabled) {
      background-color: rgb(90, 25, 130);
    }

    button:disabled {
      background-color: #a086bd;
      cursor: not-allowed;
    }

    ol#quizList {
      max-width: 600px;
      margin: 0 auto 30px;
      padding-left: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgb(0 0 0 / 0.1);
      padding: 20px 30px;
    }

    ol#quizList li {
      margin-bottom: 20px;
      font-size: 16px;
    }

    ol#quizList p {
      font-weight: 600;
      margin-bottom: 8px;
      color: #4a148c;
    }

    label > input {
      margin-right: 8px;
      cursor: pointer;
    }

    #result {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      color: #2e7d32;
      margin-top: 30px;
      min-height: 50px;
    }
  </style>
</head>
<body>

  <h2>Take Quiz</h2>

  <label for="studentName">Enter Your Name:</label>
  <input type="text" id="studentName" placeholder="Your full name" autocomplete="off">

  <label for="topic">Select Topic:</label>
  <select id="topic" disabled>
    <option value="">--Choose Topic--</option>
    <option value="Array">Array</option>
    <option value="Stack">Stack</option>
    <option value="LinkedList">LinkedList</option>
    <option value="Queue">Queue</option>
  </select>

  <button id="startBtn" disabled>Start Quiz</button>

  <h3>Questions:</h3>
  <ol id="quizList"></ol>

  <button onclick="submitQuiz()" id="submitBtn" disabled>Submit Quiz</button>

  <h3 id="result"></h3>
  <!-- Back button -->
<button id="backBtn" onclick="goBack()">Back</button>

<style>
  #backBtn {
    background-color: #555;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 18px;
    cursor: pointer;
    margin: 20px auto;
    border-radius: 6px;
    display: block;
    min-width: 120px;
    transition: background-color 0.3s ease;
  }

  #backBtn:hover {
    background-color: #333;
  }
</style>

<script>
  function goBack() {
    window.location.href = '/project/home.php';
  }
</script>

</style>

<script>
  const quizData = {
    Array: [
      { question: "What is the index of the first element in an array?", options: ["0", "1", "-1", "Depends on the language"], answer: "0" },
      { question: "What is the time complexity to access an element by index in an array?", options: ["O(1)", "O(n)", "O(log n)", "O(n^2)"], answer: "O(1)" }
    ],
    Stack: [
      { question: "Which operation adds an element to the stack?", options: ["Pop", "Push", "Peek", "Insert"], answer: "Push" },
      { question: "Stack follows which principle?", options: ["FIFO", "LIFO", "LILO", "FILO"], answer: "LIFO" }
    ],
    LinkedList: [
      { question: "In a singly linked list, each node points to?", options: ["Next node", "Previous node", "Both next and previous", "None"], answer: "Next node" },
      { question: "The head of a linked list is?", options: ["The last node", "The middle node", "The first node", "None"], answer: "The first node" }
    ],
    Queue: [
      { question: "Queue follows which principle?", options: ["LIFO", "FIFO", "LILO", "FILO"], answer: "FIFO" },
      { question: "What operation removes an element from the queue?", options: ["Enqueue", "Push", "Dequeue", "Pop"], answer: "Dequeue" }
    ]
  };

  let currentQuestions = [];
  let studentName = '';

  const studentNameInput = document.getElementById('studentName');
  const topicSelect = document.getElementById('topic');
  const startBtn = document.getElementById('startBtn');
  const submitBtn = document.getElementById('submitBtn');
  const quizList = document.getElementById('quizList');
  const result = document.getElementById('result');

  studentNameInput.addEventListener('input', () => {
    studentName = studentNameInput.value.trim();
    if (studentName.length > 0) {
      topicSelect.disabled = false;
      startBtn.disabled = false;
    } else {
      topicSelect.disabled = true;
      startBtn.disabled = true;
      submitBtn.disabled = true;
      quizList.innerHTML = '';
      result.innerText = '';
    }
  });

  startBtn.addEventListener('click', () => {
    const topic = topicSelect.value;
    quizList.innerHTML = '';
    result.innerText = '';
    submitBtn.disabled = true;
    currentQuestions = [];

    if (!topic) {
      alert("Please select a topic.");
      return;
    }

    currentQuestions = quizData[topic] || [];

    if (currentQuestions.length === 0) {
      quizList.innerHTML = "<li>No questions found for this topic.</li>";
      return;
    }

    currentQuestions.forEach((q, i) => {
      const li = document.createElement("li");
      li.innerHTML = `
        <p>${q.question}</p>
        ${q.options.map(opt => `<label><input type="radio" name="q${i}" value="${opt}"> ${opt}</label><br>`).join('')}
      `;
      quizList.appendChild(li);
    });

    submitBtn.disabled = false;
  });

  function submitQuiz() {
    let correct = 0;
    const total = currentQuestions.length;

    for (let i = 0; i < total; i++) {
      const selected = document.querySelector(`input[name="q${i}"]:checked`);
      if (!selected) {
        alert("Please answer all questions before submitting.");
        return;
      }
    }

    currentQuestions.forEach((q, i) => {
      const selected = document.querySelector(`input[name="q${i}"]:checked`);
      if (selected && selected.value === q.answer) {
        correct++;
      }
    });

    result.innerHTML = `<strong>Welcome, ${studentName}!</strong><br>You scored ${correct} out of ${total}.`;

    submitBtn.disabled = true;
  }
</script>

</body>
</html>
