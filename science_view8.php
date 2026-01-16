<?php
// 1. Database Connection
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

// 2. Fetch Questions
$result = mysqli_query($conn, "SELECT * FROM science_quiz8");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | Science Week 8 Quiz</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #ecfdf5; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 500px; width: 100%; padding: 30px; border-radius: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .header { border-bottom: 2px solid #d1fae5; margin-bottom: 25px; padding-bottom: 15px; text-align: center; }
        .header h2 { color: #059669; margin: 0; }
        .q-block { margin-bottom: 20px; padding: 20px; border-radius: 20px; background: #f0fdf4; border: 1px solid #bbf7d0; }
        .option { display: block; margin: 10px 0; padding: 12px; background: white; border: 1px solid #e5e7eb; border-radius: 12px; cursor: pointer; transition: 0.3s; }
        .option:hover { background: #d1fae5; border-color: #10b981; }
        .submit-btn { width: 100%; background: #059669; color: white; border: none; padding: 18px; border-radius: 15px; font-weight: bold; cursor: pointer; font-size: 18px; transition: 0.3s; }
        .submit-btn:hover { background: #047857; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="quiz-card">
    <div class="header">
        <small>Science 4 - Week 8</small>
        <h2>Local Environmental Issues Quiz</h2>
    </div>

    <form action="science_submit8.php" method="POST">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <p><strong><?php echo $row['id']; ?>. <?php echo $row['question']; ?></strong></p>
                
                <label class="option">
                    <input type="radio" name="q<?php echo $row['id']; ?>" value="A" required> 
                    <?php echo $row['option_a']; ?>
                </label>
                
                <label class="option">
                    <input type="radio" name="q<?php echo $row['id']; ?>" value="B"> 
                    <?php echo $row['option_b']; ?>
                </label>
                
                <label class="option">
                    <input type="radio" name="q<?php echo $row['id']; ?>" value="C"> 
                    <?php echo $row['option_c']; ?>
                </label>
                
                <label class="option">
                    <input type="radio" name="q<?php echo $row['id']; ?>" value="D"> 
                    <?php echo $row['option_d']; ?>
                </label>
            </div>
        <?php endwhile; ?>

        <button type="submit" class="submit-btn">Submit My Investigation</button>
    </form>
</div>

</body>
</html>