<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0; $total = 0;
    $result = mysqli_query($conn, "SELECT id, correct_answer FROM science_quiz8");
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['correct_answer']) { $score++; }
    }
    // Log the result
    mysqli_query($conn, "INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) VALUES ('Steward of Nature', 'Science Week 8', $score, $total)");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results | Science Week 8</title>
    <style>
        body { font-family: sans-serif; background: #f0fdf4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: #fff; padding: 45px; border-radius: 35px; text-align: center; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 350px; border: 2px solid #d1fae5; }
        .score { font-size: 60px; color: #059669; font-weight: 800; margin: 15px 0; }
        .badge { display: inline-block; background: #d1fae5; color: #065f46; padding: 5px 15px; border-radius: 20px; font-weight: bold; font-size: 14px; }
        .btn { display: block; padding: 15px; background: #059669; color: #fff; text-decoration: none; border-radius: 15px; margin-top: 25px; font-weight: bold; transition: 0.3s; }
        .btn:hover { background: #047857; }
    </style>
</head>
<body>
    <div class="card">
        <div class="badge">Environmentalist Award</div>
        <h2>Investigation Complete!</h2>
        <div class="score"><?php echo $score; ?>/<?php echo $total; ?></div>
        <p>You have used your science skills to identify issues in your community!</p>
        <a href="science.php" class="btn">Return to Lessons</a>
    </div>
</body>
</html>