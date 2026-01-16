<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = 2;

$sql = "SELECT * FROM english_lessons WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);

if (!$lesson) {
    die("Lesson for Week 2 not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kidemy | <?php echo htmlspecialchars($lesson['title']); ?></title>

<style>
body { 
    font-family: -apple-system, sans-serif; 
    background-color: #fcfcfc; 
    margin: 0; 
    padding: 15px; 
    display: flex; 
    justify-content: center; 
}

.mobile-container { 
    width: 100%; 
    max-width: 400px; 
    background: #fff; 
    border-radius: 30px; 
    padding: 25px; 
    box-shadow: 0 2px 20px rgba(0,0,0,0.05); 
    min-height: 90vh; 
}

.go-back { 
    text-decoration: none; 
    color: #888; 
    font-size: 14px; 
    margin-bottom: 20px; 
    display: block; 
}

h1 { 
    font-size: 24px; 
    color: #1a1a1a; 
    margin: 10px 0; 
    font-weight: 700; 
}

.desc { 
    color: #555; 
    font-size: 15px; 
    line-height: 1.6; 
    margin-bottom: 20px; 
}

.section-label { 
    font-weight: bold; 
    font-size: 14px; 
    color: #333; 
    margin-bottom: 5px; 
}

.obj-list { 
    color: #666; 
    font-size: 14px; 
    line-height: 1.6; 
    white-space: pre-line; 
    margin-bottom: 25px; 
}

.lesson-item { 
    border: 1px solid #f0f0f0; 
    padding: 18px; 
    border-radius: 15px; 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    margin-bottom: 15px; 
}

/* VIDEO — minimal, matches existing layout */
.video-wrapper {
    margin-bottom: 25px;
    border-radius: 15px;
    overflow: hidden;
    background: #000;
}

.video-wrapper video {
    width: 100%;
    height: auto;
}

/* Buttons (unchanged) */
.btn-action { 
    background: #3498db; 
    color: white; 
    border: none; 
    width: 100%; 
    padding: 16px; 
    border-radius: 12px; 
    font-size: 16px; 
    font-weight: 600; 
    cursor: pointer; 
    margin-top: 20px; 
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2); 
    transition: 0.3s; 
}

.btn-action:hover { 
    opacity: 0.9; 
    transform: translateY(-2px); 
}

.btn-quiz { 
    background: #0284c7; 
    margin-top: 10px; 
}
</style>
</head>

<body>

<div class="mobile-container">

<a href="english.php" class="go-back">‹ Go back</a>

<h1><?php echo htmlspecialchars($lesson['week_label']); ?>: <?php echo htmlspecialchars($lesson['title']); ?></h1>
<p class="desc"><?php echo htmlspecialchars($lesson['description']); ?></p>

<?php if (!empty($lesson['video_url'])): ?>
<div class="section-label">Lesson Video</div>
<div class="video-wrapper">
    <video controls playsinline>
        <source src="<?php echo htmlspecialchars($lesson['video_url']); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<?php endif; ?>

<div class="section-label">Learning Objectives:</div>
<div class="obj-list"><?php echo htmlspecialchars($lesson['objectives']); ?></div>

<div class="lesson-item">
    <span>Lesson 2.1: Posters & Symbols</span>
    <span style="color:#ccc;">⌵</span>
</div>

<button class="btn-action"
onclick="window.open('<?php echo htmlspecialchars($lesson['pdf_file']); ?>', '_blank')">
View Lesson PDF
</button>

<button class="btn-action btn-quiz"
onclick="window.location.href='english_quiz2.php'">
Start Week 2 Quiz
</button>

</div>

</body>
</html>
