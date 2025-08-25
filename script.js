const quizData = {
  basics: [
    {
      question: "What does DSA stand for?",
      options: { A: "Data Structure and Algorithm", B: "Data Science Analysis", C: "Digital Systems Architecture", D: "Direct Software Access" },
      correct: "A",
    },
    {
      question: "Which data structure uses FIFO principle?",
      options: { A: "Stack", B: "Queue", C: "Graph", D: "Tree" },
      correct: "B",
    },
    
  ],
  arrays: [
    
    {
      question: "What is the space complexity of an array storing n elements?",
      options: { A: "O(1)", B: "O(log n)", C: "O(n)", D: "O(n^2)" },
      correct: "C",
    },
    {
      question: "Which of these is true about arrays?",
      options: { A: "Elements are stored non-contiguously", B: "Arrays have dynamic size by default", C: "Arrays provide constant time access by index", D: "Arrays can store elements of different types" },
      correct: "C",
    },
  ],
  linkedlist: [
   
    
    {
      question: "Which operation takes O(n) time in singly linked list?",
      options: { A: "Insert at head", B: "Delete head", C: "Search for an element", D: "Insert at tail if tail pointer exists" },
      correct: "C",
    },
    {
      question: "Which of these is true about circular linked lists?",
      options: { A: "Last node points to the head", B: "They cannot be singly linked", C: "They have NULL pointers", D: "They have a fixed size" },
      correct: "A",
    },
  ],
  stack: [
   
    {
      question: "What does LIFO stand for?",
      options: { A: "Last In First Out", B: "Last In First On", C: "Least In First Out", D: "Last Inserted First Ordered" },
      correct: "A",
    },
    {
      question: "Which of the following is NOT a typical stack operation?",
      options: { A: "Push", B: "Pop", C: "Enqueue", D: "Peek" },
      correct: "C",
    },
   
  ],
  queue: [
    
    {
      question: "What happens if you enqueue in a full queue?",
      options: { A: "Queue Underflow", B: "Queue Overflow", C: "Removes element", D: "Nothing" },
      correct: "B",
    },
    {
      question: "What is the time complexity for enqueue and dequeue operations?",
      options: { A: "O(n)", B: "O(log n)", C: "O(1)", D: "O(n^2)" },
      correct: "C",
    },
  ],
};


const form = document.getElementById("quizForm");
const questionsContainer = document.getElementById("questionsContainer");
const resultSection = document.getElementById("resultSection");
const scoreText = document.getElementById("scoreText");
const wrongAnswersDiv = document.getElementById("wrongAnswers");

function loadQuestions() {
  questionsContainer.innerHTML = "";

  Object.keys(quizData).forEach((topic) => {
    const topicDiv = document.createElement("div");
    topicDiv.classList.add("topic-section");
    topicDiv.innerHTML = `<h3>${topic.charAt(0).toUpperCase() + topic.slice(1)}</h3>`;

    quizData[topic].forEach((q, index) => {
      const questionBlock = document.createElement("div");
      questionBlock.classList.add("question-block");

      let optionsHtml = "";
      for (const [key, value] of Object.entries(q.options)) {
        optionsHtml += `
          <label>
            <input type="radio" name="${topic}_q${index}" value="${key}" required />
            ${key}. ${value}
          </label>
        `;
      }

      questionBlock.innerHTML = `
        <p>${index + 1}. ${q.question}</p>
        <div class="answers">${optionsHtml}</div>
      `;

      topicDiv.appendChild(questionBlock);
    });

    questionsContainer.appendChild(topicDiv);
  });
}

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const studentName = document.getElementById("studentName").value.trim();
  if (!studentName) {
    alert("Please enter your name.");
    return;
  }

  let totalQuestions = 0;
  let totalCorrect = 0;
  const topicResults = {};
  const wrongAnswers = [];

  // Initialize topic results
  Object.keys(quizData).forEach((topic) => {
    topicResults[topic] = { correct: 0, total: quizData[topic].length };
  });

  // Check answers
  for (const topic in quizData) {
    quizData[topic].forEach((q, index) => {
      totalQuestions++;
      const userAnswer = form[`${topic}_q${index}`].value;
      if (userAnswer === q.correct) {
        totalCorrect++;
        topicResults[topic].correct++;
      } else {
        wrongAnswers.push({
          topic,
          question: q.question,
          yourAnswer: userAnswer,
          correctAnswer: q.correct,
          correctText: q.options[q.correct],
          yourText: q.options[userAnswer] || "No Answer",
        });
      }
    });
  }

  // Show results
  scoreText.textContent = `${studentName}, You scored ${totalCorrect} out of ${totalQuestions}`;

  // Show wrong answers
  if (wrongAnswers.length) {
    let wrongHtml = "<h3>Review Incorrect Answers:</h3>";
    wrongAnswers.forEach((w) => {
      wrongHtml += `<p><strong>[${w.topic.toUpperCase()}]</strong> ${w.question}<br/>
      Your answer: <span style="color:red">${w.yourText}</span><br/>
      Correct answer: <span style="color:green">${w.correctText}</span></p>`;
    });
    wrongAnswersDiv.innerHTML = wrongHtml;
  } else {
    wrongAnswersDiv.innerHTML = "<p>Great! All answers are correct.</p>";
  }

  // Show graph
  showChart(topicResults);

  // Show result section
  resultSection.style.display = "block";

  // Save results via API
  saveResults(studentName, topicResults);
});

// Chart.js rendering
function showChart(topicResults) {
  const ctx = document.getElementById("performanceChart").getContext("2d");

  // Destroy previous chart if any
  if (window.barChart) {
    window.barChart.destroy();
  }

  const topics = Object.keys(topicResults);
  const correctCounts = topics.map((t) => topicResults[t].correct);
  const totals = topics.map((t) => topicResults[t].total);

  window.barChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: topics.map((t) => t.charAt(0).toUpperCase() + t.slice(1)),
      datasets: [
        {
          label: "Correct",
          data: correctCounts,
          backgroundColor: "rgba(54, 162, 235, 0.7)",
        },
        {
          label: "Wrong",
          data: totals.map((t, i) => t - correctCounts[i]),
          backgroundColor: "rgba(255, 99, 132, 0.7)",
        },
      ],
    },
    options: {
      scales: {
        y: { beginAtZero: true, precision: 0 },
      },
    },
  });
}

// Send results to server (submit.php)
function saveResults(name, topicResults) {
  // Prepare data array per topic for backend
  const payload = [];
  for (const topic in topicResults) {
    payload.push({
      topic,
      correct: topicResults[topic].correct,
      total: topicResults[topic].total,
    });
  }

  fetch("submit.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ name, results: payload }),
  })
    .then((res) => res.text())
    .then((data) => {
      console.log("Server response:", data);
    })
    .catch((err) => {
      console.error("Error saving results:", err);
    });
}

// Load questions on page load
window.onload = loadQuestions;
