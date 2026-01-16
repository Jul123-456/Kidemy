<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$result = mysqli_query($conn, "SELECT * FROM ap_quiz1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AP 4 | Relatibong Lokasyon Quiz</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #fffbeb; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 500px; width: 100%; padding: 30px; border-radius: 25px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); border-top: 10px solid #facc15; }
        .header { text-align: center; margin-bottom: 25px; }
        .header h2 { color: #1e40af; margin: 5px 0; }
        .q-block { margin-bottom: 20px; padding: 20px; border-radius: 15px; background: #fffdf2; border: 1px solid #fef3c7; }
        .option { display: block; margin: 10px 0; padding: 12px; background: white; border: 1px solid #e5e7eb; border-radius: 10px; cursor: pointer; transition: 0.3s; }
        .option:hover { background: #fefce8; border-color: #facc15; }
        .submit-btn { width: 100%; background: #1e40af; color: white; border: none; padding: 18px; border-radius: 15px; font-weight: bold; cursor: pointer; font-size: 16px; }
    </style>
</head>
<body>

<div class="quiz-card">
    <div class="header">
        <small style="color: #64748b; font-weight: bold;">ARALING PANLIPUNAN 4</small>
        <h2>Relatibong Lokasyon ng Pilipinas</h2>
    </div>

    <form action="ap_submit1.php" method="POST">
        <div style="margin-bottom: 20px;">
            <label><b>Pangalan:</b></label>
            <input type="text" name="student_name" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;">
        </div>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <p><strong><?php echo $row['id']; ?>. <?php echo $row['question']; ?></strong></p>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="A" required> <?php echo $row['option_a']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="B"> <?php echo $row['option_b']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="C"> <?php echo $row['option_c']; ?></label>
                <label class="option"><input type="radio" name="q<?php echo $row['id']; ?>" value="D"> <?php echo $row['option_d']; ?></label>
            </div>
        <?php endwhile; ?>
        
        <button type="submit" class="submit-btn">Ipasa ang mga Sagot</button>
    </form>
</div>

</body>
</html>