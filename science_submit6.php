<?php
// 1. Database Connection
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Process Quiz Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    $total = 0;

    // Fetch correct answers for Week 6
    $sql = "SELECT id, correct_answer FROM science_quiz6";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        // Check if the question answer was sent via POST
        $user_answer = isset($_POST['q' . $qid]) ? $_POST['q' . $qid] : '';

        if ($user_answer === $row['correct_answer']) {
            $score++;
        }
    }

    // 3. Save Score to Database
    $student_name = "Guest Student"; 
    $quiz_subject = "Science Week 6";
    
    $stmt = $conn->prepare("INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $student_name, $quiz_subject, $score, $total);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results | Science Week 6</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0fdf4; margin: 0; padding: 20px; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .result-card { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; border: 2px solid #dcfce7; }
        .congrats { color: #16a34a; font-size: 28px; font-weight: bold; margin-bottom: 10px; }
        .score-box { background: #f0fdf4; padding: 20px; border-radius: 20px; margin: 20px 0; border: 1px dashed #86efac; }
        .score-text { font-size: 48px; font-weight: 800; color: #15803d; }
        .sub-text { color: #666; font-size: 14px; line-height: 1.5; }
        .btn-green { display: block; background: #16a34a; color: white; text-decoration: none; padding: 15px; border-radius: 15px; font-weight: 600; margin-top: 25px; transition: 0.3s; }
        .btn-green:hover { background: #15803d; transform: scale(1.02); }
    </style>
</head>
<body>

<div class="result-card">
    <div class="congrats">Excellent Awareness!</div>
    <p class="sub-text">You've completed the quiz on <strong>Environmental Issues & Science Skills</strong>.</p>
    
    <div class="score-box">
        <div class="score-text"><?php echo $score; ?> / <?php echo $total; ?></div>
        <p>Correct Answers</p>
    </div>

    <p class="sub-text">By using your science skills like <em>communication</em> and <em>open-mindedness</em>, you can help solve community problems like pollution and deforestation!</p>

    <a href="science.php" class="btn-green">Return to Science Lessons</a>
</div>

</body>
</html>