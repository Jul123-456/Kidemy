<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

// This query finds ALL subjects this user has taken quizzes for
$sql = "SELECT subject, AVG((score / total_questions) * 100) as avg 
        FROM quiz_results 
        WHERE user_id = $user_id 
        GROUP BY subject";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; padding: 20px; display: flex; justify-content: center; }
        .container { width: 100%; max-width: 400px; }
        .card { background: white; padding: 20px; border-radius: 20px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .label-group { display: flex; justify-content: space-between; font-weight: 600; margin-bottom: 10px; }
        .progress-bg { background: #eee; height: 12px; border-radius: 10px; overflow: hidden; }
        .progress-fill { height: 100%; background: #3498db; border-radius: 10px; transition: width 1s; }
        .no-data { text-align: center; color: #888; margin-top: 50px; }
        .back-btn { display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #3498db; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>My Performance</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="card">
                    <div class="label-group">
                        <span><?php echo htmlspecialchars($row['subject']); ?></span>
                        <span><?php echo round($row['avg']); ?>%</span>
                    </div>
                    <div class="progress-bg">
                        <div class="progress-fill" style="width: <?php echo round($row['avg']); ?>%"></div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-data">
                <p>No quiz results found yet.</p>
                <p style="font-size: 12px;">Take a quiz to see your progress!</p>
            </div>
        <?php endif; ?>

        <a href="profile.php" class="back-btn">← Back to Profile</a>
    </div>
</body>
</html>