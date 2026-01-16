<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    $total = 0;
    $student_name = isset($_POST['student_name']) ? mysqli_real_escape_string($conn, $_POST['student_name']) : "Guest Student"; 

    // 1. Calculate Score mula sa ap_quiz5
    $result = mysqli_query($conn, "SELECT id, correct_answer FROM ap_quiz5");
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['correct_answer']) {
            $score++;
        }
    }

    // 2. Save result sa student_scores table
    $save_sql = "INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) 
                 VALUES ('$student_name', 'Araling Panlipunan 5', $score, $total)";
    mysqli_query($conn, $save_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resulta | Kidemy</title>
    <style>
        body { font-family: -apple-system, sans-serif; background-color: #fffbeb; margin: 0; padding: 15px; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .result-card { width: 100%; max-width: 350px; background: #fff; border-radius: 30px; padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: center; border-top: 10px solid #facc15; }
        
        .icon { font-size: 60px; margin-bottom: 10px; }
        h1 { color: #1e40af; font-size: 24px; margin-bottom: 5px; }
        p { color: #64748b; margin-bottom: 25px; }
        
        .score-box { background: #eff6ff; border-radius: 20px; padding: 20px; margin-bottom: 25px; border: 2px dashed #bfdbfe; }
        .score-val { font-size: 40px; font-weight: 800; color: #1e40af; }
        .score-label { font-size: 12px; color: #60a5fa; text-transform: uppercase; font-weight: 700; }

        .btn { display: block; text-decoration: none; padding: 16px; border-radius: 12px; font-weight: 600; margin-bottom: 10px; transition: 0.3s; text-align: center; }
        .btn-primary { background: #1e40af; color: white; }
        .btn-secondary { background: #f8fafc; color: #64748b; }
        .btn:hover { opacity: 0.9; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="result-card">
    <div class="icon"><?php echo ($score >= ($total/2)) ? "🌟" : "📈"; ?></div>
    <h1>Na-save ang Score!</h1>
    <p>Mahusay, <strong><?php echo htmlspecialchars($student_name); ?></strong>!</p>

    <div class="score-box">
        <div class="score-val"><?php echo $score; ?>/<?php echo $total; ?></div>
        <div class="score-label">Puntos sa Linggo 5</div>
    </div>

    <a href="ap_view5.php" class="btn btn-primary">Ulitin ang Quiz</a>
    <a href="view_scores.php" class="btn btn-secondary">Tingnan ang Scoreboard</a>
</div>

</body>
</html>
<?php 
} 
?>