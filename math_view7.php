<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Results | Week 7</title>
    <style>
        body { font-family: sans-serif; background: #f0f7ff; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 30px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.05); width: 350px; }
        .score { font-size: 50px; color: #1e40af; font-weight: 800; margin: 20px 0; }
        .btn { display: inline-block; padding: 12px 25px; background: #1e40af; color: white; text-decoration: none; border-radius: 15px; font-weight: bold; }
    </style>
</head>
<body>

<div class="card">
    <h2>Quiz Results</h2>
    <p>Math Grade 4 - Week 7</p>
    <div class="score">
        <?php echo isset($_GET['score']) ? $_GET['score'] : 0; ?> / 
        <?php echo isset($_GET['total']) ? $_GET['total'] : 0; ?>
    </div>
    <p><?php 
        $s = isset($_GET['score']) ? $_GET['score'] : 0;
        echo ($s >= 7) ? "Excellent reading and writing!" : "Keep practicing your place values!"; 
    ?></p>
    <a href="math_quiz7.php" class="btn">Try Again</a>
</div>

</body>
</html>