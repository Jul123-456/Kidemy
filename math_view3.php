<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$id = 3; 
$sql = "SELECT * FROM math_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy Math | Perimeter of Quadrilaterals</title>
    <style>
        body { font-family: -apple-system, sans-serif; background-color: #f0f7ff; margin: 0; padding: 15px; display: flex; justify-content: center; }
        .mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); }
        .go-back { text-decoration: none; color: #64748b; font-size: 14px; margin-bottom: 20px; display: block; }
        h1 { font-size: 22px; color: #1e40af; margin-bottom: 10px; }
        .section-label { font-weight: bold; color: #3b82f6; margin-top: 20px; text-transform: uppercase; font-size: 12px; }
        .desc { color: #475569; line-height: 1.6; margin-bottom: 15px; font-size: 15px; }
        .formula-card { background: #eff6ff; border: 1px solid #bfdbfe; padding: 15px; border-radius: 15px; margin-bottom: 10px; }
        .btn-quiz { background: #1e40af; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; text-decoration: none; display: block; text-align: center; }
    </style>
</head>
<body>

<div class="mobile-container">
    <a href="math_main.php" class="go-back">‹ Back to Lessons</a>
    <h1>Perimeter of Quadrilaterals</h1>
    <p class="desc">Perimeter is the total distance around the outside of a shape. We find it by adding the lengths of all sides.</p>

    

    <div class="section-label">Parallelogram & Rhombus</div>
    <div class="formula-card">
        <strong>Parallelogram:</strong> P = 2(length + width)<br>
        <strong>Rhombus:</strong> P = 4 × side (s)
    </div>

    <div class="section-label">Trapezoid</div>
    <div class="formula-card">
        <strong>Trapezoid:</strong> P = a + b + c + d<br>
        (Add all four unequal sides together)
    </div>

    <a href="math_quiz3.php" class="btn-quiz">Take Week 3 Quiz</a>
</div>

</body>
</html>