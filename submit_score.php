function submitQuiz() {
  let correct = 0;
  const total = currentQuestions.length;

  // Check if all questions answered
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

  const studentName = document.getElementById("studentName").value.trim();
  const topic = document.getElementById("topic").value;

  if (!studentName) {
    alert("Please enter your name.");
    return;
  }

  // Redirect to dashboard.php with name and score in query string
  window.location.href = `dashboard.php?name=${encodeURIComponent(studentName)}&score=${correct}&total=${total}&topic=${encodeURIComponent(topic)}`;
}
