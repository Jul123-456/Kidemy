<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0; $total = 0;
    $result = mysqli_query($conn, "SELECT id, correct_answer FROM math_quiz5");
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['correct_answer']) { $score++; }
    }
    // Record results
    $stmt = $conn->prepare("INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) VALUES ('Student', 'Math Week 5', ?, ?)");
    $stmt->bind_param("ii", $score, $total);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Results | Week 5</title>
    <style>
        body { font-family: sans-serif; background: #f0f7ff; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 30px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.05); width: 350px; }
        .score { font-size: 50px; color: #1e40af; font-weight: 800; margin: 20px 0; }
        .btn { display: block; padding: 15px; background: #1e40af; color: white; text-decoration: none; border-radius: 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>You're a Math Star!</h2>
        <p>You have a great sense of large numbers and place values.</p>
        <div class="score"><?php echo $score; ?> / <?php echo $total; ?></div>
        <a href="math_main.php" class="btn">Return to Lessons</a>
    </div>
</body>
</html>