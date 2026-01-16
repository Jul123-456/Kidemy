<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$id = 5; 
$sql = "SELECT * FROM math_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy Math | Large Numbers</title>
    <style>
        body { font-family: -apple-system, sans-serif; background-color: #f0f7ff; margin: 0; padding: 15px; display: flex; justify-content: center; }
        .mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); }
        .go-back { text-decoration: none; color: #64748b; font-size: 14px; margin-bottom: 20px; display: block; }
        h1 { font-size: 22px; color: #1e40af; margin-bottom: 10px; }
        .section-label { font-weight: bold; color: #3b82f6; margin-top: 20px; text-transform: uppercase; font-size: 12px; }
        .desc { color: #475569; line-height: 1.6; margin-bottom: 15px; font-size: 15px; }
        .math-card { background: #eff6ff; border: 1px solid #bfdbfe; padding: 15px; border-radius: 15px; margin-bottom: 10px; font-size: 14px; }
        .btn-quiz { background: #1e40af; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; text-decoration: none; display: block; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 12px; }
        th, td { border: 1px solid #bfdbfe; padding: 8px; text-align: center; }
        th { background: #dbeafe; }
    </style>
</head>
<body>

<div class="mobile-container">
    <a href="math_main.php" class="go-back">‹ Back to Lessons</a>
    <h1>Numbers up to 1,000,000</h1>
    <p class="desc">In this lesson, we learn to read and write large numbers and understand the value of each digit based on its position.</p>

    <div class="section-label">Place Value Chart</div>
    <table>
        <tr>
            <th colspan="3">Thousands Period</th>
            <th colspan="3">Units Period</th>
        </tr>
        <tr>
            <td>H-Th</td>
            <td>T-Th</td>
            <td>Th</td>
            <td>H</td>
            <td>T</td>
            <td>O</td>
        </tr>
        <tr>
            <td><strong>5</strong></td>
            <td><strong>2</strong></td>
            <td><strong>7</strong></td>
            <td><strong>3</strong></td>
            <td><strong>8</strong></td>
            <td><strong>4</strong></td>
        </tr>
    </table>

    <div class="section-label">Key Concept</div>
    <div class="math-card">
        <strong>Place Value:</strong> The position of a digit (e.g., Thousands).<br><br>
        <strong>Value:</strong> How much the digit is worth (e.g., 5 in the Hundreds place has a value of 500).
    </div>

    

    <a href="math_quiz5.php" class="btn-quiz">Take Week 5 Quiz</a>
</div>

</body>
</html>