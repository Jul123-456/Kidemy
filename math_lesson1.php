<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = 1; 

$sql = "SELECT * FROM math_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);


$lesson_title = $lesson ? $lesson['title'] : "Angles";
$week_label = $lesson ? $lesson['week_label'] : "Week 1";
$description = $lesson ? $lesson['description'] : "In this lesson, you will learn to illustrate right, acute, and obtuse angles using models and measure them using a protractor.";
$pdf_link = $lesson ? $lesson['pdf_file'] : "Q1_LE_Mathematics 4_Lesson 1_Week 1.pdf";

$m1_video = "videos/M1.mp4"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kidemy Math | <?php echo htmlspecialchars($lesson_title); ?></title>
<style>
body { font-family: -apple-system, sans-serif; background-color: #fcfcfc; margin: 0; padding: 15px; display: flex; justify-content: center; }
.mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); min-height: 90vh; }
.go-back { text-decoration: none; color: #888; font-size: 14px; margin-bottom: 20px; display: block; }
h1 { font-size: 24px; color: #1a1a1a; margin: 10px 0; font-weight: 700; }
.desc { color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 20px; }
.lesson-item { border: 1px solid #f0f0f0; padding: 18px; border-radius: 15px; display: flex; flex-direction: column; margin-bottom: 10px; background: #fafafa; }
.section-label { font-weight: 700; color: #333; margin: 15px 0 10px; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; }
.btn-action { background: #3498db; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2); transition: 0.3s; }
.btn-quiz { background: #0284c7; margin-top: 10px; }
.btn-action:hover { opacity: 0.9; transform: translateY(-2px); }
video { width: 100%; border-radius: 12px; margin-bottom: 20px; border: 1px solid #eee; }
.badge { display: inline-block; padding: 4px 12px; border-radius: 20px; background: #e3f2fd; color: #1976d2; font-size: 12px; font-weight: bold; margin-bottom: 10px; }
</style>
</head>
<body>

<div class="mobile-container">
    <a href="math.php" class="go-back">‹ Back to Lessons</a>
    
    <div class="badge">MATATAG Curriculum</div>
    <h1><?php echo htmlspecialchars($week_label); ?>: <?php echo htmlspecialchars($lesson_title); ?></h1>
    <p class="desc"><?php echo htmlspecialchars($description); ?></p>

    <div class="section-label">Core Concepts</div>
    <div class="lesson-item">
        <strong>Types of Angles:</strong>
        <p style="font-size: 13px; color: #666; margin: 5px 0;">Right (90°), Acute (< 90°), and Obtuse (> 90°)</p>
    </div>

    <div class="section-label">Instructional Video</div>
    <video controls>
        <source src="<?php echo $m1_video; ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <button class="btn-action" onclick="window.open('<?php echo htmlspecialchars($pdf_link); ?>', '_blank')">
        Open Week 1 Lesson PDF
    </button>

    <button class="btn-action btn-quiz" onclick="window.location.href='math_quiz1.php'">
        Take Angle Classification Quiz
    </button>
</div>

</body>
</html>