<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0; 
    $total = 0;
    
    // Fetch correct answers from math_quiz6
    $result = mysqli_query($conn, "SELECT id, answer FROM math_quiz6");
    
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        // Check if student's answer matches the 'answer' column in database
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['answer']) { 
            $score++; 
        }
    }

    // Record results to student_scores table
    $stmt = $conn->prepare("INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) VALUES ('Student', 'Math Week 6', ?, ?)");
    $stmt->bind_param("ii", $score, $total);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Results | Week 6</title>
    <style>
        body { font-family: sans-serif; background: #f0f7ff; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 30px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.05); width: 350px; }
        .score { font-size: 50px; color: #1e40af; font-weight: 800; margin: 20px 0; }
        .btn { display: inline-block; padding: 12px 25px; background: #1e40af; color: white; text-decoration: none; border-radius: 15px; font-weight: bold; }
    </style>
</head>
<body>

<div class="card">
    <h2>Quiz Results</h2>
    <p>Math Grade 4 - Week 6</p>
    <div class="score"><?php echo $score; ?> / <?php echo $total; ?></div>
    <p><?php echo ($score >= ($total/2)) ? "Great job!" : "Keep practicing!"; ?></p>
    <a href="math_quiz6.php" class="btn">Try Again</a>
</div>

</body>
</html>