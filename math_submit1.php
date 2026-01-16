<?php

$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    $total = 0;

    
    $sql = "SELECT id, correct_answer FROM math_quiz1";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        
       
        $user_answer = isset($_POST['q' . $qid]) ? $_POST['q' . $qid] : '';

        if ($user_answer === $row['correct_answer']) {
            $score++;
        }
    }

    
    $student_name = "Guest Student"; 
    $quiz_subject = "Math Week 1 (Angles)";
    
    $stmt = $conn->prepare("INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $student_name, $quiz_subject, $score, $total);
    $stmt->execute();
}

$user_id = $_SESSION['user_id']; 
$query = "INSERT INTO quiz_results (user_id, subject, quiz_week, score, total_questions) 
          VALUES ($user_id, 'Mathematics', 1, $score, 10)";
mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Results | Week 1</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f7ff; margin: 0; padding: 20px; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .result-card { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; border: 2px solid #dbeafe; }
        .congrats { color: #1e40af; font-size: 28px; font-weight: bold; margin-bottom: 10px; }
        .score-box { background: #f8fafc; padding: 20px; border-radius: 20px; margin: 20px 0; border: 1px dashed #bfdbfe; }
        .score-text { font-size: 48px; font-weight: 800; color: #1e40af; }
        .sub-text { color: #64748b; font-size: 14px; line-height: 1.5; }
        .btn-blue { display: block; background: #1e40af; color: white; text-decoration: none; padding: 15px; border-radius: 15px; font-weight: 600; margin-top: 25px; transition: 0.3s; }
        .btn-blue:hover { background: #1d4ed8; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="result-card">
    <div class="congrats">Great Work!</div>
    <p class="sub-text">You've finished the quiz on <strong>Measuring and Identifying Angles</strong>.</p>
    
    <div class="score-box">
        <div class="score-text"><?php echo $score; ?> / <?php echo $total; ?></div>
        <p>Correct Answers</p>
    </div>

    

    <p class="sub-text">Whether it's an acute "sharp" angle or a square right angle, you've shown you know your geometry!</p>

    <a href="math_main.php" class="btn-blue">Back to Math Lessons</a>
</div>

</body>
</html>