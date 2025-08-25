<?php
include 'db.php';
$data = [];

$sql = "SELECT topic, AVG(score) as avg_score FROM results GROUP BY topic";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Analytics</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h2>Average Score per Topic</h2>
  <canvas id="analyticsChart" width="500" height="300"></canvas>
  <script>
    const data = <?php echo json_encode($data); ?>;
    const labels = data.map(d => d.topic);
    const scores = data.map(d => parseFloat(d.avg_score));

    new Chart(document.getElementById("analyticsChart"), {
      type: "bar",
      data: {
        labels: labels,
        datasets: [{
          label: "Avg Score",
          data: scores,
          backgroundColor: "#2196f3"
        }]
      }
    });
  </script>
</body>
</html>
