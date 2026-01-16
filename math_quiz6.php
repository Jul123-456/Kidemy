<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
$result = mysqli_query($conn, "SELECT * FROM math_quiz6 LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kidemy | Math Week 6 Quiz</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 500px; width: 100%; padding: 25px; border-radius: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .header { border-bottom: 2px solid #e2e8f0; margin-bottom: 20px; padding-bottom: 10px; }
        .header h2 { color: #2563eb; margin: 0; }
        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #f8fafc; border: 1px solid #e2e8f0; }
        .option { display: block; margin: 8px 0; padding: 10px; background: white; border: 1px solid #eee; border-radius: 10px; cursor: pointer; }
        .option:hover { background: #eff6ff; }
        .submit-btn { width: 100%; background: #2563eb; color: white; border: none; padding: 15px; border-radius: 15px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

<div class="quiz-card">
    <div class="header">
        <small>Mathematics 4 - Week 6</small>
        <h2>Comparing and Rounding Numbers</h2>
    </div>

    <form action="math_submit6.php" method="POST">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <p><strong><?php echo $row['question']; ?></strong></p>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="A" required> <?php echo $row['option_a']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="B"> <?php echo $row['option_b']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="C"> <?php echo $row['option_c']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="D"> <?php echo $row['option_d']; ?></label>
            </div>
        <?php endwhile; ?>
        <button type="submit" class="submit-btn">Check My Score</button>
    </form>
</div>

</body>
</html>