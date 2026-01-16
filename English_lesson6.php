<?php
// 1. Database Connection
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Fetch data for Week 6
$id = 6; 

$sql = "SELECT * FROM english_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);

if (!$lesson) {
    die("Lesson for Week 6 not found. Please run the SQL INSERT first.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | <?php echo $lesson['title']; ?></title>
    <style>
        body { font-family: -apple-system, sans-serif; background-color: #fcfcfc; margin: 0; padding: 15px; display: flex; justify-content: center; }
        .mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); min-height: 90vh; }
        .go-back { text-decoration: none; color: #888; font-size: 14px; margin-bottom: 20px; display: block; }
        h1 { font-size: 24px; color: #1a1a1a; margin: 10px 0; font-weight: 700; }
        .desc { color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 20px; }
        .section-label { font-weight: bold; font-size: 14px; color: #333; margin-bottom: 5px; }
        .obj-list { color: #666; font-size: 14px; line-height: 1.6; white-space: pre-line; margin-bottom: 30px; }
        .lesson-item { border: 1px solid #f0f0f0; padding: 18px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        
        /* Button Base Styles */
        .btn-action { border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; transition: 0.3s; }
        
        /* Blue Button for PDF */
        .btn-pdf { background: #3498db; color: white; margin-top: 20px; box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2); }
        
        /* Green Button for Quiz */
        .btn-quiz { background: #2ecc71; color: white; margin-top: 12px; box-shadow: 0 4px 12px rgba(46, 204, 113, 0.2); }
        
        .btn-action:hover { opacity: 0.9; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="mobile-container">
    <a href="english.php" class="go-back">‹ Go back</a>
    
    <h1><?php echo $lesson['week_label']; ?>: <?php echo $lesson['title']; ?></h1>
    <p class="desc"><?php echo $lesson['description']; ?></p>

    <div class="section-label">Learning Objectives:</div>
    <div class="obj-list"><?php echo $lesson['objectives']; ?></div>

    <div class="lesson-item">
        <span>Lesson 6.1: Adverbs & Context Clues</span>
        <span style="color:#ccc;">⌵</span>
    </div>

    <button class="btn-action btn-pdf" onclick="window.open('<?php echo $lesson['pdf_file']; ?>', '_blank')">
        Start Module (PDF)
    </button>

    <button class="btn-action btn-quiz" onclick="window.location.href='english_view6.php'">
        Take Quiz 6
    </button>
</div>

</body>
</html>