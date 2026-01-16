<?php
// 1. Connection to the database
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Fetch questions from the Lesson 2 table
$result = mysqli_query($conn, "SELECT * FROM english_quiz2");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kidemy | English Week 2 Quiz</title>
    <style>
        /* Matched exactly to Quiz 1 Styles */
        body { font-family: sans-serif; background: #f0f2f5; padding: 20px; display: flex; justify-content: center; }
        .quiz-card { background: white; max-width: 450px; width: 100%; padding: 25px; border-radius: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        
        /* Red Header Theme */
        .header { border-bottom: 2px solid #fee2e2; margin-bottom: 20px; padding-bottom: 10px; }
        .header h2 { color: #dc2626; margin: 0; }
        .header small { color: #888; }

        /* Red-bordered question blocks */
        .q-block { margin-bottom: 20px; padding: 15px; border-radius: 15px; background: #fffcfc; border: 1px solid #fecaca; }
        
        .option { display: block; margin: 8px 0; padding: 10px; background: white; border: 1px solid #eee; border-radius: 10px; cursor: pointer; transition: 0.2s; }
        .option:hover { background: #fff5f5; border-color: #fecaca; }
        
        /* Red Submit Button */
        .submit-btn { width: 100%; background: #dc2626; color: white; border: none; padding: 15px; border-radius: 15px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s; }
        .submit-btn:hover { background: #b91c1c; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="quiz-card">
    <div class="header">
        <small>English 4 - Week 2</small>
        <h2>What are Colds?</h2>
    </div>

    <form action="english_submit2.php" method="POST">
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

        <button type="submit" class="submit-btn">Submit Quiz</button>
    </form>
</div>

</body>
</html>