<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0; $total = 0;
    $result = mysqli_query($conn, "SELECT id, correct_answer FROM science_quiz2");
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['correct_answer']) { $score++; }
    }
    mysqli_query($conn, "INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) VALUES ('Guest', 'Science Week 2', $score, $total)");
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Results</title><style>body{font-family:sans-serif;background:#f0f2f5;display:flex;justify-content:center;align-items:center;height:100vh;}.card{background:#fff;padding:40px;border-radius:30px;text-align:center;box-shadow:0 10px 25px rgba(0,0,0,0.1);width:300px;}.score{font-size:48px;color:#3498db;font-weight:bold;}.btn{display:block;padding:15px;background:#3498db;color:#fff;text-decoration:none;border-radius:12px;margin-top:20px;}</style></head>
<body><div class="card"><h2>Good Job!</h2><div class="score"><?php echo $score; ?>/<?php echo $total; ?></div><a href="science.php" class="btn">Back to Lessons</a></div></body></html>