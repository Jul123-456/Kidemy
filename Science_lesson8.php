<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = 8; 

$sql = "SELECT * FROM science_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);

if (!$lesson) {
    die("Science Lesson for Week 8 not found. Please run the SQL INSERT first.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kidemy Science | <?php echo htmlspecialchars($lesson['title']); ?></title>
<style>
body { font-family: -apple-system, sans-serif; background-color: #f9fdf9; margin: 0; padding: 15px; display: flex; justify-content: center; }
.mobile-container { width: 100%; max-width: 400px; background: #fff; border-radius: 30px; padding: 25px; box-shadow: 0 2px 20px rgba(0,0,0,0.05); min-height: 90vh; }
.go-back { text-decoration: none; color: #888; font-size: 14px; margin-bottom: 20px; display: block; }
h1 { font-size: 24px; color: #1a1a1a; margin: 10px 0; font-weight: 700; }
h3 { margin-top: 0; color: #27ae60; }
.desc { color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 20px; }
.section-label { font-weight: bold; font-size: 14px; color: #333; margin-bottom: 8px; }
.obj-list { color: #666; font-size: 14px; line-height: 1.6; white-space: pre-line; margin-bottom: 25px; }
.lesson-item { border: 1px solid #f0f0f0; padding: 18px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
video { width: 100%; border-radius: 15px; margin-bottom: 25px; }
.btn-action { background: #27ae60; color: white; border: none; width: 100%; padding: 16px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 15px; box-shadow: 0 4px 12px rgba(39, 174, 96, 0.2); }
</style>
</head>
<body>

<div class="mobile-container">
    <a href="science_main.php" class="go-back">‹ Back to Lessons</a>
    
    <h1><?php echo htmlspecialchars($lesson['week_label']); ?></h1>
    <h3><?php echo htmlspecialchars($lesson['title']); ?></h3>
    <p class="desc"><?php echo htmlspecialchars($lesson['description']); ?></p>

    <div class="section-label">Learning Objectives:</div>
    <div class="obj-list"><?php echo nl2br(htmlspecialchars($lesson['objectives'])); ?></div>

    <?php if (!empty($lesson['video_url'])): ?>
        <div class="section-label">Lesson Video:</div>
        <video controls playsinline>
            <source src="<?php echo htmlspecialchars($lesson['video_url']); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php endif; ?>

    <div class="lesson-item">
        <span>Lesson 8.1: Sustainable Living</span>
        <span style="color:#ccc;">⌵</span>
    </div>

    <button class="btn-action" onclick="window.open('<?php echo htmlspecialchars($lesson['pdf_file']); ?>', '_blank')">
        View Module (PDF)
    </button>

    <button class="btn-action" onclick="window.location.href='science_quiz8.php'">
        Take Week 8 Quiz
    </button>
</div>

</body>
</html>
