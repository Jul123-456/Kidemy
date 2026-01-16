<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0; $total = 0;
    $result = mysqli_query($conn, "SELECT id, correct_answer FROM english_quiz4");

    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['correct_answer']) {
            $score++;
        }
    }

    $save_sql = "INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) 
                 VALUES ('Guest Student', 'English Week 4', $score, $total)";
    mysqli_query($conn, $save_sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results | Kidemy</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .result-card { background: white; padding: 40px; border-radius: 30px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .score { font-size: 48px; color: #3498db; font-weight: bold; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #3498db; color: white; text-decoration: none; border-radius: 10px; }
    </style>
</head>
<body>
    <div class="result-card">
        <h2>Quiz Completed!</h2>
        <div class="score"><?php echo $score; ?> / <?php echo $total; ?></div>
        <p>Excellent work on Week 4!</p>
        <a href="english.php" class="btn">Back to Lessons</a>
    </div>
</body>
</html>