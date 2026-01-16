<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = 5; 

$sql = "SELECT * FROM math_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);

if (!$lesson) {
    die("Math Lesson for Week 5 not found. Please run the SQL INSERT first.");
}


$m8_video = "videos/M8.mp4"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kidemy Math | <?php echo htmlspecialchars($lesson['title']); ?></title>
<style>
body { font-family: -apple-system, sans-serif; background-color: #fcfcfc; margin: 0; padding: 15px; display: flex; justify-content: center; }
.mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); min-height: 90vh; }
.go-back { text-decoration: none; color: #888; font-size: 14px; margin-bottom: 20px; display: block; }
h1 { font-size: 24px; color: #1a1a1a; margin: 10px 0; font-weight: 700; }
.desc { color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 20px; }
.lesson-item { border: 1px solid #f0f0f0; padding: 18px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
.btn-action { background: #3498db; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2); transition: 0.3s; }
.btn-quiz { background: #0284c7; margin-top: 10px; }
.btn-action:hover { opacity: 0.9; transform: translateY(-2px); }
video { width: 100%; border-radius: 12px; margin-bottom: 20px; }
</style>
</head>
<body>

<div class="mobile-container">
    <a href="math.php" class="go-back">‹ Back to Lessons</a>
    
    <h1><?php echo htmlspecialchars($lesson['week_label']); ?>: <?php echo htmlspecialchars($lesson['title']); ?></h1>
    <p class="desc"><?php echo htmlspecialchars($lesson['description']); ?></p>

    <div class="lesson-item">
        <span>Lesson 5.1: Introduction</span>
        <span style="color:#ccc;">⌵</span>
    </div>

   
    <div class="section-label">Watch the M8 Video:</div>
    <video controls>
        <source src="<?php echo $m8_video; ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <button class="btn-action" onclick="window.open('<?php echo htmlspecialchars($lesson['pdf_file']); ?>', '_blank')">
        View Lesson PDF
    </button>

    <button class="btn-action btn-quiz" onclick="window.location.href='math_quiz8.php'">
        Start Week 5 Quiz
    </button>
</div>

</body>
</html>
