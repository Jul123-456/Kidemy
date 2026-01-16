<?php
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

/* FORCE ENGLISH LESSON 1 */
$sql = "SELECT * FROM english_lessons WHERE id = 1 LIMIT 1";
$result = mysqli_query($conn, $sql);
$lesson = mysqli_fetch_assoc($result);

if (!$lesson) {
    die("English Lesson 1 not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kidemy | <?php echo htmlspecialchars($lesson['title']); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
:root {
    --primary-red: #dc2626;
    --soft-red: #fee2e2;
    --primary-blue: #3498db;
    --text-dark: #1a1a1a;
    --text-gray: #6b7280;
}

body {
    font-family: 'Segoe UI', sans-serif;
    background: #f8fafc;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
}

.mobile-container {
    width: 100%;
    max-width: 420px;
    background: #fff;
    border-radius: 35px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    min-height: 85vh;
}

.go-back {
    text-decoration: none;
    color: var(--text-gray);
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 25px;
}

.week-tag {
    color: var(--primary-red);
    font-weight: bold;
    font-size: 13px;
    text-transform: uppercase;
    margin-bottom: 5px;
    display: block;
}

h1 {
    font-size: 26px;
    margin: 0 0 10px;
    color: var(--text-dark);
}

.desc {
    color: var(--text-gray);
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 25px;
}

.section-label {
    font-weight: 800;
    font-size: 14px;
    margin-bottom: 12px;
    text-transform: uppercase;
}

.obj-list {
    background: #f9fafb;
    padding: 15px;
    border-radius: 18px;
    font-size: 14px;
    line-height: 1.6;
    white-space: pre-line;
    margin-bottom: 30px;
}

.video-wrapper {
    margin-bottom: 25px;
    border-radius: 20px;
    overflow: hidden;
    background: #000;
}

.video-wrapper video {
    width: 100%;
    height: auto;
}

.btn-action {
    background: var(--primary-blue);
    color: white;
    border: none;
    width: 100%;
    padding: 18px;
    border-radius: 20px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    margin-bottom: 15px;
}

.quiz-card {
    display: flex;
    align-items: center;
    text-decoration: none;
    background: #fff;
    border: 2px solid var(--soft-red);
    padding: 15px;
    border-radius: 20px;
}

.quiz-card .num {
    width: 45px;
    height: 45px;
    background: var(--soft-red);
    color: var(--primary-red);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 20px;
    margin-right: 15px;
}
</style>
</head>

<body>

<div class="mobile-container">

<a href="english.php" class="go-back">← Go back</a>

<span class="week-tag"><?php echo htmlspecialchars($lesson['week_label']); ?></span>
<h1><?php echo htmlspecialchars($lesson['title']); ?></h1>

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

<div class="section-label">What you will learn</div>
<div class="obj-list"><?php echo htmlspecialchars($lesson['objectives']); ?></div>

<button class="btn-action"
onclick="window.open('<?php echo htmlspecialchars($lesson['pdf_file']); ?>', '_blank')">
📖 Start Learning Module
</button>

<a class="quiz-card" href="english_view1.php">
    <div class="num">1</div>
    <div>
        <small>KIDEMY CHALLENGE</small>
        <strong>Take Quiz: Lesson 1</strong>
    </div>
</a>

</div>

</body>
</html>
