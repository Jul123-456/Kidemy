<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$result = mysqli_query($conn, "SELECT * FROM math_quiz4");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz | Week 4</title>
    <style>
        body { font-family: sans-serif; background: #f0f7ff; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 450px; width: 100%; padding: 25px; border-radius: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .header h2 { color: #1e40af; border-bottom: 2px solid #dbeafe; padding-bottom: 10px; }
        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #f8fafc; border: 1px solid #e2e8f0; }
        .option { display: block; margin: 8px 0; padding: 12px; background: white; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; }
        .btn-submit { width: 100%; background: #1e40af; color: white; border: none; padding: 16px; border-radius: 12px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
<div class="quiz-card">
    <div class="header">
        <small>Math 4 - Week 4</small>
        <h2>Composite Perimeter</h2>
    </div>
    <form action="math_submit4.php" method="POST">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <p><strong><?php echo $row['id']; ?>. <?php echo $row['question']; ?></strong></p>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="A" required> <?php echo $row['option_a']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="B"> <?php echo $row['option_b']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="C"> <?php echo $row['option_c']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="D"> <?php echo $row['option_d']; ?></label>
            </div>
        <?php endwhile; ?>
        <button type="submit" class="btn-submit">Submit Answers</button>
    </form>
</div>
</body>
</html>