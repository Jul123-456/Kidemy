<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$id = 2; 
$sql = "SELECT * FROM math_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy Math | Triangles & Quadrilaterals</title>
    <style>
        body { font-family: -apple-system, sans-serif; background-color: #f0f7ff; margin: 0; padding: 15px; display: flex; justify-content: center; }
        .mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); }
        .go-back { text-decoration: none; color: #64748b; font-size: 14px; margin-bottom: 20px; display: block; }
        h1 { font-size: 22px; color: #1e40af; margin-bottom: 10px; }
        .section-label { font-weight: bold; color: #3b82f6; margin-top: 20px; text-transform: uppercase; font-size: 12px; }
        .desc { color: #475569; line-height: 1.6; margin-bottom: 15px; font-size: 15px; }
        .math-card { background: #eff6ff; border: 1px solid #bfdbfe; padding: 15px; border-radius: 15px; margin-bottom: 10px; }
        .btn-quiz { background: #1e40af; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; text-decoration: none; display: block; text-align: center; }
    </style>
</head>
<body>

<div class="mobile-container">
    <a href="math_main.php" class="go-back">‹ Back to Lessons</a>
    <h1>Triangles and Quadrilaterals</h1>
    
    <div class="section-label">Triangles</div>
    <p class="desc">A polygon with 3 sides and 3 angles. We classify them by their sides (Equilateral, Isosceles, Scalene) or angles (Right, Acute, Obtuse).</p>
    

    <div class="section-label">Quadrilaterals</div>
    <p class="desc">A polygon with 4 sides and 4 angles. Common types include Squares, Rectangles, Rhombuses, Parallelograms, and Trapezoids.</p>
    

    <div class="math-card">
        <strong>Did you know?</strong> A square is a special type of rectangle because it has four right angles, but it's also a special rhombus because it has four equal sides!
    </div>

    <a href="math_quiz2.php" class="btn-quiz">Take Week 2 Quiz</a>
</div>

</body>
</html>