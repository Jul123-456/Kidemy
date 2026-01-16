<?php
// Database Connection
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch questions for AP Week 6
$result = mysqli_query($conn, "SELECT * FROM ap_quiz6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | AP Quiz 6</title>
    <style>
       body { font-family: sans-serif; background: #f0f2f5; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 450px; width: 100%; padding: 25px; border-radius: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .header { border-bottom: 2px solid #fee2e2; margin-bottom: 20px; padding-bottom: 10px; }
        .header h2 { color: #dc2626; margin: 0; }
        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #fffcfc; border: 1px solid #fecaca; }
        .option { display: block; margin: 8px 0; padding: 10px; background: white; border: 1px solid #eee; border-radius: 10px; cursor: pointer; transition: 0.2s; }
        .option:hover { background: #fff5f5; border-color: #fecaca; }
        .submit-btn { width: 100%; background: #dc2626; color: white; border: none; padding: 15px; border-radius: 15px; font-weight: bold; cursor: pointer; font-size: 16px; }
    </style>
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header">
        <h1>AP Linggo 6 Quiz</h1>
        <p>Likas Kayang Pag-unlad</p>
    </div>
    <form action="ap_submit6.php" method="POST">
        <div style="margin-bottom: 20px;">
            <label style="font-size: 13px; font-weight: 700; color: #94a3b8;">PANGALAN:</label>
            <input type="text" name="student_name" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0; margin-top: 5px; box-sizing: border-box;">
        </div>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <div class="q-text"><?php echo $row['id']; ?>. <?php echo $row['question']; ?></div>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="A" required><?php echo $row['option_a']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="B"><?php echo $row['option_b']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="C"><?php echo $row['option_c']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="D"><?php echo $row['option_d']; ?></label>
            </div>
        <?php endwhile; ?>
        <button type="submit" class="submit-btn">Ipasa ang Sagot</button>
    </form>

</body>
</html>