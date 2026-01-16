<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0; 
    $total = 0;
    
    // Fetch correct answers for comparison
    $result = mysqli_query($conn, "SELECT id, answer FROM math_quiz7");
    
    while ($row = mysqli_fetch_assoc($result)) {
        $total++;
        $qid = $row['id'];
        if (isset($_POST['q' . $qid]) && $_POST['q' . $qid] == $row['answer']) { 
            $score++; 
        }
    }

    // Save to scores table
    $stmt = $conn->prepare("INSERT INTO student_scores (student_name, quiz_subject, score_achieved, total_questions) VALUES ('Student', 'Math Week 7', ?, ?)");
    $stmt->bind_param("ii", $score, $total);
    $stmt->execute();

    // Pass results to view page
    header("Location: math_view7.php?score=$score&total=$total");
    exit();
}
?>