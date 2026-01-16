<?php
// 1. Establish connection to the 'kidemy' database
$conn = mysqli_connect("localhost", "root", "", "kidemy");

// Check if connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Query specifically for the Science Week 1 table
$result = mysqli_query($conn, "SELECT * FROM science_quiz1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | Science Week 1 Quiz</title>
    <style>
        /* Consistent Theme matching your English views */
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 450px; width: 100%; padding: 25px; border-radius: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        
        .header { border-bottom: 2px solid #e0f2fe; margin-bottom: 20px; padding-bottom: 10px; }
        .header h2 { color: #3498db; margin: 0; }
        .header small { color: #888; }
        
        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #f0f9ff; border: 1px solid #bae6fd; }
        
        .option { display: block; margin: 8px 0; padding: 12px; background: white; border: 1px solid #eee; border-radius: 10px; cursor: pointer; transition: 0.2s; }
        .option:hover { background: #e0f2fe; border-color: #7dd3fc; }
        
        .submit-btn { width: 100%; background: #3498db; color: white; border: none; padding: 15px; border-radius: 15px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s; }
        .submit-btn:hover { background: #2980b9; transform: translateY(-2px); }
        
        .back-link { text-decoration: none; color: #3498db; font-size: 14px; display: block; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="quiz-card">
    <a href="Science_lesson1.php" class="back-link">‹ Back to Lesson</a>
    
    <div class="header">
        <small>Science 4 - Quarter 1</small>
        <h2>Week 1: Science Process Skills</h2> 
    </div>

    

    <form action="science_submit1.php" method="POST">
        <?php if($result && mysqli_num_rows($result) > 0): ?>
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
        <?php else: ?>
            <p style="text-align:center; color:#666;">Waiting for questions... Ensure the science_quiz1 table is ready.</p>
        <?php endif; ?>

        <button type="submit" class="submit-btn">Finish Week 1 Quiz</button>
    </form>
</div>

</body>
</html>