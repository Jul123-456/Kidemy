<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$display_name = isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']) : "julieanna";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #f4f7fa;
            color: #334155;
            padding: 15px;
            display: flex;
            justify-content: center;
        }

        .mobile-frame {
            width: 100%;
            max-width: 414px;
            background: #ffffff;
            border-radius: 30px;
            min-height: 90vh;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: relative;
            padding-bottom: 90px; 
            overflow: hidden;
        }

        .greeting { font-size: 24px; font-weight: 800; color: #1e293b; }
        .sub-text { font-size: 14px; color: #64748b; margin-bottom: 20px; }

        
        .calendar-strip {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
        }

        .calendar-days { 
            display: flex; 
            gap: 10px; 
            overflow-x: auto; 
            padding: 5px; 
            scroll-behavior: smooth; 
            scrollbar-width: none; 
            -ms-overflow-style: none;
        }
        .calendar-days::-webkit-scrollbar { display: none; }

        .day {
            min-width: 55px; 
            flex-shrink: 0;   
            padding: 10px 5px;
            background: #f8fafc;
            border-radius: 12px;
            text-align: center;
            border: 1px solid #f1f5f9;
            cursor: pointer;
            transition: 0.3s;
        }
        .day span { display: block; font-size: 10px; text-transform: uppercase; color: #94a3b8; }
        .day strong { font-size: 16px; }

        .day.active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
        .day.active span { color: rgba(255,255,255,0.8); }

        .scroll-btn {
            background: none;
            border: none;
            font-size: 20px;
            color: #64748b;
            cursor: pointer;
            padding: 0 5px;
        }

        h3 { font-size: 18px; color: #1e293b; margin: 25px 0 15px; }
        .subject-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .card {
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            color: white;
            text-decoration: none;
            transition: transform 0.2s;
        }
        .card:active { transform: scale(0.95); }
        .card p { font-weight: 700; font-size: 12px; margin-bottom: 10px; }
        
        .subject-btn {
            display: inline-block;
            background: rgba(255, 255, 255, 0.25);
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 10px;
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .blue-card { background: #60a5fa; }
        .green-card { background: #34d399; }
        .orange-card { background: #fb923c; }
        .purple-card { background: #a78bfa; }

        .assignment-tile {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8fafc;
            padding: 15px;
            border-radius: 18px;
            margin-bottom: 10px;
        }
        .tile-info h4 { font-size: 14px; margin: 2px 0; }
        .tile-info p { font-size: 11px; color: #94a3b8; }
        
        .badge { font-size: 9px; padding: 3px 8px; border-radius: 6px; color: white; font-weight: bold; }
        .blue-badge { background: #3b82f6; }
        .green-badge { background: #10b981; }

        
        .bottom-nav {
            position: absolute;
            bottom: 0; left: 0;
            width: 100%;
            background: white;
            display: flex;
            justify-content: space-around;
            padding: 15px 0 25px;
            border-top: 1px solid #f1f5f9;
            border-radius: 0 0 30px 30px;
        }
        .nav-item { font-size: 22px; cursor: pointer; opacity: 0.4; transition: 0.3s; text-decoration: none; }
        .nav-item.active { opacity: 1; transform: scale(1.1); }
    </style>
</head>
<body>

<div class="mobile-frame">
    <header class="dashboard-header">
        <p class="greeting">Hello, <?php echo $display_name; ?>!</p>
        <p class="sub-text">Ready to learn today?</p>
        
        <div class="calendar-strip">
            <button class="scroll-btn btn-left">‹</button>
            <div class="calendar-days" id="calendarDays">
                <div class="day"><span>Mon</span><strong>4</strong></div>
                <div class="day"><span>Tue</span><strong>5</strong></div>
                <div class="day"><span>Wed</span><strong>6</strong></div>
                <div class="day"><span>Thu</span><strong>7</strong></div>
                <div class="day"><span>Fri</span><strong>8</strong></div>
                <div class="day"><span>Sat</span><strong>9</strong></div>
                <div class="day"><span>Sun</span><strong>10</strong></div>
                <div class="day"><span>Mon</span><strong>11</strong></div>
                <div class="day"><span>Tue</span><strong>12</strong></div>
                <div class="day"><span>Wed</span><strong>13</strong></div>
            </div>
            <button class="scroll-btn btn-right">›</button>
        </div>
    </header>

    <section class="content-section">
        <h3>Subjects</h3>
        <div class="subject-grid">
            <a href="English.php" class="card blue-card">
                <p>ENGLISH</p>
                <span class="subject-btn">View Lessons</span>
            </a>
            <a href="Science.php" class="card green-card">
                <p>SCIENCE</p>
                <span class="subject-btn">View Lessons</span>
            </a>
            <a href="AP.php" class="card orange-card">
                <p>ARALING PANLIPUNAN</p>
                <span class="subject-btn">View Lessons</span>
            </a>
            <a href="math.php" class="card purple-card">
                <p>MATH</p>
                <span class="subject-btn">View Lessons</span>
            </a>
        </div>
    </section>

    <section class="content-section">
        <h3>Assignments</h3>
        <div class="assignment-tile">
            <div class="tile-info">
                <span class="badge blue-badge">ENGLISH</span>
                <h4>Writing Exercise 1</h4>
                <p>Due: Nov 10</p>
            </div>
            <span style="color:#cbd5e1">›</span>
        </div>

        <div class="assignment-tile">
            <div class="tile-info">
                <span class="badge green-badge">SCIENCE</span>
                <h4>Food Chain Poster</h4>
                <p>Due: Nov 15</p>
            </div>
            <span style="color:#cbd5e1">›</span>
        </div>
    </section>

    <nav class="bottom-nav">
        <a href="Dashboard.php" class="nav-item active">🏠</a>
        <a href="lessons_archive.php" class="nav-item">📖</a>
        <a href="quizzes.php" class="nav-item">📝</a>
        <a href="profile.php" class="nav-icon active">👤</a>
    </nav>
</div>

<script>
    const calendar = document.getElementById("calendarDays");
    const btnLeft = document.querySelector(".btn-left");
    const btnRight = document.querySelector(".btn-right");
    const days = document.querySelectorAll(".day");

    
    btnLeft.addEventListener("click", () => {
        calendar.scrollBy({ left: -150, behavior: "smooth" });
    });

    btnRight.addEventListener("click", () => {
        calendar.scrollBy({ left: 150, behavior: "smooth" });
    });
    
    days.forEach(day => {
        day.addEventListener("click", function() {
            days.forEach(d => d.classList.remove("active"));
            this.classList.add("active");
        });
    });


    const todayDate = new Date().getDate();
    let foundToday = false;

    days.forEach(day => {
        const dayNum = parseInt(day.querySelector("strong").textContent);
        if (dayNum === todayDate) {
            days.forEach(d => d.classList.remove("active"));
            day.classList.add("active");
            foundToday = true;
            
            
            setTimeout(() => {
                day.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }, 300);
        }
    });
</script>

</body>
</html>