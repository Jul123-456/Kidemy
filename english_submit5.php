<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0; $total = 0;
    $result = mysqli_query($conn, "SELECT id, correct_answer FROM english_quiz5");
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['correct_answer']) { $score++; }
    }
    $save_sql = "INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) 
                 VALUES ('Guest Student', 'English Week 5', $score, $total)";
    mysqli_query($conn, $save_sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: white; padding: 40px; border-radius: 30px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 320px; }
        .score { font-size: 48px; color: #dc2626; font-weight: bold; margin: 20px 0; }
        .btn { display: block; padding: 15px; background: #dc2626; color: white; text-decoration: none; border-radius: 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Great Job!</h2>
        <div class="score"><?php echo $score; ?> / <?php echo $total; ?></div>
        <p>Week 5 results saved.</p>
        <a href="english.php" class="btn">Back to Menu</a>
    </div>
</body>
</html>