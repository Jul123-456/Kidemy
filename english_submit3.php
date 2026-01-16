<?php
// 1. Database Connection
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$score = 0;
$total = 0;
$student_name = "Guest Student"; // You can replace this with a session variable if you have a login system

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Fetch correct answers from the database
    $sql = "SELECT id, correct_answer FROM english_quiz3";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $question_id = $row['id'];
        $user_answer = isset($_POST['q' . $question_id]) ? $_POST['q' . $question_id] : '';

        // Check if the user's answer matches the correct answer
        if ($user_answer === $row['correct_answer']) {
            $score++;
        }
    }

    // 3. Save the result to student_scores table
    $quiz_label = "English Week 3";
    $save_sql = "INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) 
                 VALUES ('$student_name', '$quiz_label', $score, $total)";
    
    mysqli_query($conn, $save_sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results | Kidemy</title>
    <style>
        body { font-family: -apple-system, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .result-card { background: white; width: 100%; max-width: 350px; padding: 30px; border-radius: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: center; }
        .score-circle { width: 120px; height: 120px; border: 8px solid #fee2e2; border-radius: 50%; margin: 0 auto 20px; display: flex; flex-direction: column; justify-content: center; align-items: center; }
        .score-num { font-size: 32px; font-weight: bold; color: #dc2626; }
        .score-text { font-size: 12px; color: #888; text-transform: uppercase; }
        h2 { color: #1a1a1a; margin-bottom: 10px; }
        p { color: #666; margin-bottom: 25px; }
        .btn { display: block; text-decoration: none; padding: 15px; border-radius: 12px; font-weight: 600; margin-bottom: 10px; transition: 0.3s; }
        .btn-primary { background: #dc2626; color: white; }
        .btn-secondary { background: #f0f0f0; color: #333; }
        .btn:hover { opacity: 0.9; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="result-card">
    <div class="score-circle">
        <div class="score-num"><?php echo $score; ?>/<?php echo $total; ?></div>
        <div class="score-text">Correct</div>
    </div>

    <h2>Quiz Completed!</h2>
    <p>Well done! You have finished the Lesson 3: Word Structure quiz.</p>

    <a href="english.php" class="btn btn-primary">Return to Modules</a>
    <a href="view_scores.php" class="btn btn-secondary">View Score History</a>
</div>

</body>
</html>