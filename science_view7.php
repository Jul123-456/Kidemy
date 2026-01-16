<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$result = mysqli_query($conn, "SELECT * FROM science_quiz7");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kidemy | Science Week 7 Quiz</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #fdf2f8; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 450px; width: 100%; padding: 25px; border-radius: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .header { border-bottom: 2px solid #fce7f3; margin-bottom: 20px; padding-bottom: 10px; }
        .header h2 { color: #db2777; margin: 0; }
        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #fff1f2; border: 1px solid #fecdd3; }
        .option { display: block; margin: 8px 0; padding: 12px; background: white; border: 1px solid #eee; border-radius: 10px; cursor: pointer; transition: 0.2s; }
        .option:hover { background: #fce7f3; border-color: #f9a8d4; }
        .submit-btn { width: 100%; background: #db2777; color: white; border: none; padding: 15px; border-radius: 15px; font-weight: bold; cursor: pointer; font-size: 16px; }
    </style>
</head>
<body>
<div class="quiz-card">
    <div class="header">
        <small>Science 4 - Week 7</small>
        <h2>Attitudes & Process Skills</h2>
    </div>
    <form action="science_submit7.php" method="POST">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <p><strong><?php echo $row['id']; ?>. <?php echo $row['question']; ?></strong></p>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="A" required> <?php echo $row['option_a']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="B"> <?php echo $row['option_b']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="C"> <?php echo $row['option_c']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="D"> <?php echo $row['option_d']; ?></label>
            </div>
        <?php endwhile; ?>
        <button type="submit" class="submit-btn">Finish Week 7 Quiz</button>
    </form>
</div>
</body>
</html>