<!DOCTYPE html>
<html>
<head>
  <title>Admin - Create Quiz</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #e6f2ff;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #0d47a1;
    }

    label {
      font-weight: bold;
      color: #0d47a1;
    }

    select {
      padding: 10px;
      font-size: 16px;
      margin: 10px 0;
    }

    form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      max-width: 800px;
      margin: auto;
    }

    #questionsList > div {
      background: #f1f9ff;
      padding: 15px;
      margin-bottom: 10px;
      border-left: 5px solid #2196f3;
      border-radius: 5px;
    }

    button {
      background-color:rgb(116, 37, 169);
      color: white;
      padding: 10px 20px;
      border: none;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #1976d2;
    }

    #successMessage {
      display: none;
      background-color: #e0f7e9;
      border: 2px solid #a5d6a7;
      padding: 15px;
      border-radius: 8px;
      text-align: center;
      margin: 20px auto;
      width: 50%;
      box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }

    #successMessage span {
      font-size: 32px;
      color: #2e7d32;
    }

    #successMessage p {
      margin: 0;
      font-size: 18px;
      color: #2e7d32;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <h2>Create Quiz</h2>

  <label style="display: block; text-align: center; font-weight: bold; color: #0d47a1; margin-top: 20px;">
  Select Topic:
</label>
<div style="text-align: center; margin-bottom: 20px;">
  <select id="topic" onchange="loadQuestions()" style="padding: 10px; font-size: 16px;">
    <option value="">--Choose Topic--</option>
    <option value="Array">Array</option>
    <option value="Stack">Stack</option>
    <option value="LinkedList">LinkedList</option>
    <option value="Queue">Queue</option>
  </select>
</div>

  <form id="quizForm">
    <h3>Available Questions:</h3>
    <div id="questionsList"></div>
    <br>
    <button type="submit">Send Quiz</button>
  </form>
<br><br>
<div style="text-align: center;">
  <a href="dashboard.php" style="text-decoration: none;">
    <button type="button" style="background-color:rgb(116, 37, 169);; margin-top: 10px;">⬅ Back to Home</button>
  </a>
</div>

  <div id="successMessage">
    <span>&#10004;</span>
    <p>Quiz successfully sent!</p>
  </div>

  <script>
    const predefinedQuestions = {
      "Array": [
        {
          question: "What is the index of the first element in an array?",
          options: ["1", "0", "-1", "Depends on language"],
          answer: "0"
        },
        {
          question: "How do you access the third element in an array named arr?",
          options: ["arr[3]", "arr(2)", "arr[2]", "arr{3}"],
          answer: "arr[2]"
        },
        {
          question: "What is the time complexity of accessing an element in an array?",
          options: ["O(1)", "O(n)", "O(log n)", "O(n log n)"],
          answer: "O(1)"
        },
        {
          question: "Which method adds an element at the end of an array in most languages?",
          options: ["push()", "pop()", "shift()", "insert()"],
          answer: "push()"
        },
        {
          question: "Can arrays have elements of different data types?",
          options: ["Yes", "No", "Only if declared", "Depends on the language"],
          answer: "Depends on the language"
        }
      ],
      "Stack": [
        {
          question: "What is the order of operations in a stack?",
          options: ["FIFO", "LIFO", "LILO", "Random"],
          answer: "LIFO"
        },
        {
          question: "Which two operations are performed on a stack?",
          options: ["enqueue and dequeue", "push and pop", "insert and delete", "add and remove"],
          answer: "push and pop"
        },
        {
          question: "What data structure is used for undo functionality?",
          options: ["Queue", "Stack", "Array", "Linked List"],
          answer: "Stack"
        },
        {
          question: "What is the time complexity of push in a stack?",
          options: ["O(1)", "O(n)", "O(log n)", "O(n log n)"],
          answer: "O(1)"
        },
        {
          question: "What is stack overflow?",
          options: ["Too many recursive calls", "Accessing element outside the array", "Using up memory limit in a stack", "None"],
          answer: "Using up memory limit in a stack"
        }
      ],
      "Queue": [
        {
          question: "What does FIFO stand for?",
          options: ["First In First Out", "First In Last Out", "Fast In Fast Out", "Fast In Last Out"],
          answer: "First In First Out"
        },
        {
          question: "Which operation inserts an element into a queue?",
          options: ["pop()", "push()", "enqueue()", "addFirst()"],
          answer: "enqueue()"
        },
        {
          question: "What is a circular queue?",
          options: ["Queue with no end", "Queue that uses a ring buffer", "Queue with double-ended insertions", "Queue in a loop"],
          answer: "Queue that uses a ring buffer"
        },
        {
          question: "Which real-world example is modeled by a queue?",
          options: ["Stack of plates", "Undo feature", "Call center support line", "Binary Tree"],
          answer: "Call center support line"
        },
        {
          question: "Time complexity of dequeue operation is?",
          options: ["O(1)", "O(n)", "O(log n)", "O(n log n)"],
          answer: "O(1)"
        }
      ],
      "LinkedList": [
        {
          question: "What is a node in a linked list?",
          options: ["A data holder with pointer", "An array element", "A stack item", "A binary tree root"],
          answer: "A data holder with pointer"
        },
        {
          question: "Which operation is efficient in a linked list compared to arrays?",
          options: ["Access by index", "Inserting at beginning", "Searching", "Sorting"],
          answer: "Inserting at beginning"
        },
        {
          question: "What is the time complexity of inserting at head of a linked list?",
          options: ["O(1)", "O(n)", "O(log n)", "O(n log n)"],
          answer: "O(1)"
        },
        {
          question: "Which type of linked list allows backward traversal?",
          options: ["Singly", "Circular", "Doubly", "None"],
          answer: "Doubly"
        },
        {
          question: "How do you traverse a singly linked list?",
          options: ["Using previous pointers", "From head to tail", "Random access", "Circular iteration"],
          answer: "From head to tail"
        }
      ]
    };

    function loadQuestions() {
      const topic = document.getElementById("topic").value;
      const listDiv = document.getElementById("questionsList");
      listDiv.innerHTML = '';

      if (topic && predefinedQuestions[topic]) {
        predefinedQuestions[topic].forEach((q, index) => {
          const container = document.createElement("div");

          const checkbox = document.createElement("input");
          checkbox.type = "checkbox";
          checkbox.name = "questions";
          checkbox.value = index;
          checkbox.id = `qchk_${index}`;

          const questionLabel = document.createElement("label");
          questionLabel.htmlFor = checkbox.id;
          questionLabel.style.fontWeight = "bold";
          questionLabel.textContent = q.question;

          container.appendChild(checkbox);
          container.appendChild(questionLabel);
          container.appendChild(document.createElement("br"));

          q.options.forEach((opt, optIndex) => {
            const optionRadio = document.createElement("input");
            optionRadio.type = "radio";
            optionRadio.name = `q${index}_options`;
            optionRadio.disabled = true;
            optionRadio.id = `q${index}_opt${optIndex}`;

            const optionLabel = document.createElement("label");
            optionLabel.htmlFor = optionRadio.id;
            optionLabel.textContent = " " + opt;

            container.appendChild(optionRadio);
            container.appendChild(optionLabel);
            container.appendChild(document.createElement("br"));
          });

          listDiv.appendChild(container);
        });
      }
    }

    document.getElementById("quizForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const topic = document.getElementById("topic").value;
      const checkedBoxes = document.querySelectorAll('input[name="questions"]:checked');

      if (!topic || checkedBoxes.length === 0) {
        alert("Please select a topic and at least one question.");
        return;
      }

      const selectedIndexes = Array.from(checkedBoxes).map(cb => parseInt(cb.value));
      const selectedQuestions = selectedIndexes.map(i => predefinedQuestions[topic][i]);

      fetch('../save_quiz.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ topic, questions: selectedQuestions })
      })
      .then(res => res.text())
      .then(msg => {
        document.getElementById("successMessage").style.display = "block";
        setTimeout(() => {
          document.getElementById("successMessage").style.display = "none";
        }, 3000);
      })
      .catch(err => alert("Error: " + err));
    });
  </script>

</body>
</html>
