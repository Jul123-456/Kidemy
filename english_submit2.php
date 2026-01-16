<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    $total = 0;
    $student_name = "Guest Student"; 

    // 1. Calculate Score from the Week 2 table
    $result = mysqli_query($conn, "SELECT id, correct_answer FROM english_quiz2");
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['correct_answer']) {
            $score++;
        }
    }

    
   $save_sql = "INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) 
             VALUES ('$student_name', 'English Week 2', $score, $total)";
    mysqli_query($conn, $save_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results | Kidemy</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .result-card { background: white; padding: 40px; border-radius: 30px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-width: 400px; width: 90%; }
        .icon { font-size: 50px; margin-bottom: 10px; }
        h1 { color: #0284c7; margin-bottom: 5px; } /* Changed to blue to match Lesson 2 theme */
        .score-circle { width: 120px; height: 120px; background: #e0f2fe; color: #0284c7; border-radius: 50%; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: 0 auto 25px; border: 5px solid #bae6fd; }
        .score-num { font-size: 32px; font-weight: bold; }
        .btn-group { display: flex; flex-direction: column; gap: 10px; }
        .btn { padding: 15px; border-radius: 15px; text-decoration: none; font-weight: bold; transition: 0.3s; }
        .btn-primary { background: #0284c7; color: white; }
        .btn-secondary { background: #f3f4f6; color: #4b5563; }
    </style>
</head>
<body>

<div class="result-card">
    <div class="icon"><?php echo ($score >= ($total/2)) ? "🎉" : "📚"; ?></div>
    <h1>Score Saved!</h1>
    <p>Well done, <strong><?php echo $student_name; ?></strong>!</p>

    <div class="score-circle">
        <div class="score-num"><?php echo $score; ?>/<?php echo $total; ?></div>
        <div class="score-text">Points</div>
    </div>

    <div class="btn-group">
        <a href="english_submit2.php" class="btn btn-primary">Try Quiz Again</a>
        <a href="view_scores.php" class="btn btn-secondary">View Score History</a>
    </div>
</div>

</body>
</html>
<?php 
} 
?>