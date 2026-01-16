<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ensure ID matches Week 7
$id = 7; 

$sql = "SELECT * FROM math_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);

// Fallback values if your database row isn't created yet
$lesson_title = $lesson ? $lesson['title'] : "Comparing and Ordering Numbers";
$week_label = $lesson ? $lesson['week_label'] : "Week 7";
$description = $lesson ? $lesson['description'] : "In this lesson, you will learn how to compare large numbers using relation symbols (>, <, =) and arrange them in increasing or decreasing order.";

$m7_video = "videos/M7_comparing.mp4"; 
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
.badge { display: inline-block; padding: 4px 12px; border-radius: 20px; background: #dcfce7; color: #166534; font-size: 12px; font-weight: bold; margin-bottom: 10px; }
h1 { font-size: 24px; color: #1a1a1a; margin: 10px 0; font-weight: 700; }
.desc { color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 20px; }
.lesson-item { border: 1px solid #f0f0f0; padding: 18px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; background: #fafafa; }
.section-label { font-weight: 700; color: #333; margin: 20px 0 10px; font-size: 14px; text-transform: uppercase; }
.btn-action { background: #3498db; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2); transition: 0.3s; }
.btn-quiz { background: #3498db; margin-top: 10px; box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2); }
.btn-action:hover { opacity: 0.9; transform: translateY(-2px); }
video { width: 100%; border-radius: 12px; margin-bottom: 20px; border: 1px solid #eee; }
</style>
</head>
<body>

<div class="mobile-container">
    <a href="math.php" class="go-back">‹ Back to Math Modules</a>
    
    <div class="badge">Quarter 1: Week 7</div>
    <h1><?php echo htmlspecialchars($week_label); ?>: <?php echo htmlspecialchars($lesson_title); ?></h1>
    <p class="desc"><?php echo htmlspecialchars($description); ?></p>

    <div class="lesson-item">
        <div>
            <span style="display:block; font-weight:600;">Lesson 7.1: Relation Symbols</span>
            <small style="color:#888;">Using >, <, and =</small>
        </div>
        <span style="color:#ccc;">⌵</span>
    </div>

    <div class="section-label">Instructional Video:</div>
    <video controls>
        <source src="<?php echo $m7_video; ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <button class="btn-action" onclick="window.open('<?php echo htmlspecialchars($lesson['pdf_file'] ?? 'Q1_LE_Mathematics 4_Lesson 7_Week 7.pdf'); ?>', '_blank')">
        View Math Lesson PDF
    </button>

    <button class="btn-action btn-quiz" onclick="window.location.href='math_quiz7.php'">
        Start Week 7 Math Quiz
    </button>
</div>

</body>
</html>