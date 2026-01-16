<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$id = 4; 
$sql = "SELECT * FROM math_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy Math | Composite Figures</title>
    <style>
        body { font-family: -apple-system, sans-serif; background-color: #f0f7ff; margin: 0; padding: 15px; display: flex; justify-content: center; }
        .mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); }
        .go-back { text-decoration: none; color: #64748b; font-size: 14px; margin-bottom: 20px; display: block; }
        h1 { font-size: 22px; color: #1e40af; margin-bottom: 10px; }
        .section-label { font-weight: bold; color: #3b82f6; margin-top: 20px; text-transform: uppercase; font-size: 12px; }
        .desc { color: #475569; line-height: 1.6; margin-bottom: 15px; font-size: 15px; }
        .math-card { background: #fdf2f8; border: 1px solid #fbcfe8; padding: 15px; border-radius: 15px; margin-bottom: 10px; }
        .btn-quiz { background: #1e40af; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; text-decoration: none; display: block; text-align: center; }
    </style>
</head>
<body>

<div class="mobile-container">
    <a href="math_main.php" class="go-back">‹ Back to Lessons</a>
    <h1>Composite Figures</h1>
    <p class="desc">A <strong>composite figure</strong> is a shape made up of two or more simpler shapes, like triangles and squares.</p>

    <div class="section-label">How to find Perimeter:</div>
    <div class="math-card">
        <strong>Rule:</strong> Only add the lengths of the <strong>external (outer)</strong> sides. 
        <br><br>
        <em>Tip:</em> Do not include the "common side" where the shapes touch inside!
    </div>

    

    <a href="math_quiz4.php" class="btn-quiz">Take Week 4 Quiz</a>
</div>

</body>
</html>