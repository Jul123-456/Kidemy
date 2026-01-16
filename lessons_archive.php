<?php
session_start();
$display_name = isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']) : "Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Lessons | Kidemy</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: -apple-system, sans-serif; }
        body { background-color: #f4f7fa; color: #334155; padding: 15px; display: flex; justify-content: center; }
        
        .mobile-frame {
            width: 100%; max-width: 414px; background: #ffffff; border-radius: 30px;
            min-height: 90vh; padding: 24px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: relative; padding-bottom: 90px;
        }

        .header { margin-bottom: 20px; }
        h2 { font-size: 22px; color: #1e293b; }
        .search-bar {
            width: 100%; padding: 12px; background: #f1f5f9;
            border: none; border-radius: 12px; margin: 15px 0; font-size: 14px;
        }

        .subject-row {
            display: flex; align-items: center; justify-content: space-between;
            padding: 15px; background: #fff; border: 1px solid #f1f5f9;
            border-radius: 18px; margin-bottom: 12px; text-decoration: none; color: inherit;
            transition: 0.2s;
        }
        .subject-row:hover { background: #f8fafc; border-color: #cbd5e1; }
        
        .icon-box {
            width: 45px; height: 45px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; font-size: 20px;
        }

        .details { flex: 1; margin-left: 15px; }
        .details strong { display: block; font-size: 15px; color: #1e293b; }
        .details span { font-size: 12px; color: #94a3b8; }

        /* Subject Colors */
        .bg-blue { background: #e0f2fe; color: #3b82f6; }
        .bg-green { background: #dcfce7; color: #10b981; }
        .bg-orange { background: #ffedd5; color: #f59e0b; }
        .bg-purple { background: #f3e8ff; color: #8b5cf6; }

        /* Bottom Nav */
        .bottom-nav {
            position: absolute; bottom: 0; left: 0; width: 100%; background: white;
            display: flex; justify-content: space-around; padding: 15px 0 25px;
            border-top: 1px solid #f1f5f9; border-radius: 0 0 30px 30px;
        }
        .nav-item { font-size: 22px; cursor: pointer; opacity: 0.4; text-decoration: none; }
        .nav-item.active { opacity: 1; transform: scale(1.1); }
    </style>
</head>
<body>

<div class="mobile-frame">
    <div class="header">
        <h2>My Lessons</h2>
        <input type="text" class="search-bar" placeholder="Search for a topic...">
    </div>

    <a href="English.php" class="subject-row">
        <div class="icon-box bg-blue">A</div>
        <div class="details">
            <strong>English</strong>
            <span>8 Lessons Available</span>
        </div>
        <div style="color:#cbd5e1">›</div>
    </a>

    <a href="Science.php" class="subject-row">
        <div class="icon-box bg-green">🔬</div>
        <div class="details">
            <strong>Science</strong>
            <span>6 Lessons Available</span>
        </div>
        <div style="color:#cbd5e1">›</div>
    </a>

    <a href="AP.php" class="subject-row">
        <div class="icon-box bg-orange">🌍</div>
        <div class="details">
            <strong>Araling Panlipunan</strong>
            <span>7 Lessons Available</span>
        </div>
        <div style="color:#cbd5e1">›</div>
    </a>

    <a href="math.php" class="subject-row">
        <div class="icon-box bg-purple">1+1</div>
        <div class="details">
            <strong>Mathematics</strong>
            <span>12 Lessons Available</span>
        </div>
        <div style="color:#cbd5e1">›</div>
    </a>

    <nav class="bottom-nav">
       <a href="Dashboard.php" class="nav-item active">🏠</a>
        <a href="lessons_archive.php" class="nav-item">📖</a>
        <a href="quizzes.php" class="nav-item">📝</a>
        <a href="profile.php" class="nav-item">👤</a>
    </nav>
</div>

</body>
</html>