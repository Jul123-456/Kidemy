<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
$result = mysqli_query($conn, "SELECT * FROM english_quiz1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>English Week 1 Quiz</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 450px; width: 100%; padding: 25px; border-radius: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #fffcfc; border: 1px solid #fecaca; }
        .option { display: block; margin: 8px 0; cursor: pointer; }
        .submit-btn { width: 100%; background: #dc2626; color: white; border: none; padding: 15px; border-radius: 15px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
<div class="quiz-card">
    <h2>The Legend of the Dipper</h2>
    <form action="english_submit1.php" method="POST">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <p><strong><?php echo $row['question']; ?></strong></p>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="A" required> <?php echo $row['option_a']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="B"> <?php echo $row['option_b']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="C"> <?php echo $row['option_c']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="D"> <?php echo $row['option_d']; ?></label>
            </div>
        <?php endwhile; ?>
        <button type="submit" class="submit-btn">Check Results</button>
    </form>
</div>
</body>
</html>
