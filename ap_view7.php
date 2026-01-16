<?php
// 1. Connection to the database
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Fetch questions from the Lesson 7 table
$result = mysqli_query($conn, "SELECT * FROM ap_quiz7");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | AP Quiz 7</title>
    <style>
        body { font-family: -apple-system, sans-serif; background-color: #fffbeb; margin: 0; padding: 15px; display: flex; justify-content: center; }
        .mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border-top: 8px solid #facc15; }
        
        .header { margin-bottom: 25px; }
        .header h1 { font-size: 22px; color: #1e40af; margin: 0; }
        .header p { color: #64748b; font-size: 14px; margin-top: 5px; }

        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #fffdf2; border: 1px solid #fef3c7; }
        .q-text { font-weight: 600; color: #1e293b; margin-bottom: 12px; font-size: 15px; }
        
        .option { display: flex; align-items: center; gap: 10px; margin: 8px 0; padding: 12px; background: white; border: 1px solid #e5e7eb; border-radius: 12px; cursor: pointer; transition: 0.2s; font-size: 14px; }
        .option:hover { border-color: #facc15; background: #fffdf2; }
        input[type="radio"] { accent-color: #1e40af; }

        .submit-btn { width: 100%; background: #1e40af; color: white; border: none; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 10px; box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2); }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header">
        <h1>AP Linggo 7 Quiz</h1>
        <p>Pagtugon sa Hamon sa Kabuhayan</p>
    </div>

    <form action="ap_submit7.php" method="POST">
        <div style="margin-bottom: 20px;">
            <label style="font-size: 13px; font-weight: 700; color: #94a3b8;">PANGALAN:</label>
            <input type="text" name="student_name" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0; margin-top: 5px; box-sizing: border-box;">
        </div>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="q-block">
                <div class="q-text"><?php echo $row['id']; ?>. <?php echo $row['question']; ?></div>
                
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

        <button type="submit" class="submit-btn">Ipasa ang Sagot</button>
    </form>
</div>

</body>
</html>