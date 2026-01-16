<?php
session_start();
$display_name = isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']) : "Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Center | Kidemy</title>
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
        p.sub { font-size: 14px; color: #64748b; margin-top: 5px; }

        .section-title { font-size: 16px; font-weight: 700; color: #1e293b; margin: 20px 0 10px; text-transform: uppercase; letter-spacing: 0.5px; }

        .quiz-card {
            display: flex; align-items: center; justify-content: space-between;
            padding: 18px; background: #fff; border: 1px solid #f1f5f9;
            border-radius: 20px; margin-bottom: 12px; text-decoration: none; color: inherit;
            transition: 0.2s;
        }
        .quiz-card:active { transform: scale(0.98); background: #f8fafc; }
        
        .quiz-icon {
            width: 50px; height: 50px; border-radius: 15px;
            display: flex; align-items: center; justify-content: center; font-size: 22px;
        }

        .details { flex: 1; margin-left: 15px; }
        .details strong { display: block; font-size: 14px; color: #1e293b; }
        .details span { font-size: 11px; color: #94a3b8; }

      
        .status { font-size: 9px; font-weight: 800; padding: 4px 8px; border-radius: 6px; text-transform: uppercase; background: #f1f5f9; color: #64748b; }

     
        .ap-bg { background: #ffedd5; color: #f59e0b; }
        .eng-bg { background: #e0f2fe; color: #3b82f6; }
        .math-bg { background: #f3e8ff; color: #8b5cf6; }
        .sci-bg { background: #dcfce7; color: #16a34a; }
      
        .bottom-nav {
            position: absolute; bottom: 0; left: 0; width: 100%; background: white;
            display: flex; justify-content: space-around; padding: 15px 0 25px;
            border-top: 1px solid #f1f5f9; border-radius: 0 0 30px 30px;
        }
        .nav-item { font-size: 22px; cursor: pointer; opacity: 0.4; text-decoration: none; }
        .nav-item.active { opacity: 1; transform: scale(1.1); }
        
        .scrollable-content { max-height: 65vh; overflow-y: auto; padding-right: 5px; }
        .scrollable-content::-webkit-scrollbar { width: 4px; }
        .scrollable-content::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<body>

<div class="mobile-frame">
    <div class="header">
        <h2>Quiz Center</h2>
        <p class="sub">Pick a quiz to start, <?php echo $display_name; ?>!</p>
    </div>

    <div class="scrollable-content">
        <div class="section-title">Araling Panlipunan</div>
        <a href="ap_quiz1.php" class="quiz-card">
            <div class="quiz-icon ap-bg">🌍</div>
            <div class="details"><strong>AP Quiz: Week 1</strong><span>Likas Kayang Pag-unlad</span></div>
            <span class="status">Go</span>
        </a>
        <a href="ap_quiz2.php" class="quiz-card">
            <div class="quiz-icon ap-bg">🌍</div>
            <div class="details"><strong>AP Quiz: Week 2</strong><span>Likas Kayang Pag-unlad</span></div>
            <span class="status">Go</span>
        </a>
        <a href="ap_quiz3.php" class="quiz-card">
            <div class="quiz-icon ap-bg">🌍</div>
            <div class="details"><strong>AP Quiz: Week 3</strong><span>Likas Kayang Pag-unlad</span></div>
            <span class="status">Go</span>
        </a>
        <a href="ap_quiz4.php" class="quiz-card">
            <div class="quiz-icon ap-bg">🌍</div>
            <div class="details"><strong>AP Quiz: Week 4</strong><span>Likas Kayang Pag-unlad</span></div>
            <span class="status">Go</span>
        </a>
        <a href="ap_quiz7.php" class="quiz-card">
            <div class="quiz-icon ap-bg">🌍</div>
            <div class="details"><strong>AP Quiz: Week 7</strong><span>Likas Kayang Pag-unlad</span></div>
            <span class="status">Go</span>
        </a>
        <a href="ap_quiz8.php" class="quiz-card">
            <div class="quiz-icon ap-bg">🌍</div>
            <div class="details"><strong>AP Quiz: Week 8</strong><span>Likas Kayang Pag-unlad</span></div>
            <span class="status">Go</span>
        </a>

        <div class="section-title">English</div>
        <a href="english_quiz1.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 1</strong><span>The Legend of the Dipper</span></div>
            <span class="status">Go</span>
        </a>
        <a href="english_quiz2.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 2</strong><span>What are Colds?</span></div>
            <span class="status">Go</span>
        </a>

        <a href="english_quiz3.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 3</strong><span>Word Structure Quiz</span></div>
            <span class="status">Go</span>
        </a>
        <a href="english_quiz4.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 4</strong><span>Grammar & Nouns Quiz</span></div>
            <span class="status">Go</span>
        </a>
        <a href="english_quiz5.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 5</strong><span>Adjectives & Conjunctions</span></div>
            <span class="status">Go</span>
        </a>
        <a href="english_quiz6.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 6</strong><span>Adverbs & Context Clues</span></div>
            <span class="status">Go</span>
        </a>
        <a href="english_quiz7.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 7</strong><span>Visual Texts</span></div>
            <span class="status">Go</span>
        </a>
        <a href="english_quiz8.php" class="quiz-card">
            <div class="quiz-icon eng-bg">📖</div>
            <div class="details"><strong>English Quiz: Week 8</strong><span>Story Elements</span></div>
            <span class="status">Go</span>
        </a>

        <div class="section-title">Mathematics</div>
        <a href="math_quiz1.php" class="quiz-card">
            <div class="quiz-icon math-bg">➗</div>
            <div class="details"><strong>Math Quiz: Week 1</strong><span>Angles Quiz</span></div>
            <span class="status">Go</span>
        </a>
        <a href="math_quiz2.php" class="quiz-card">
            <div class="quiz-icon math-bg">➗</div>
            <div class="details"><strong>Math Quiz: Week 2</strong><span>Triangles & Quadrilaterals</span></div>
            <span class="status">Go</span>
        </a>
        <a href="math_quiz3.php" class="quiz-card">
            <div class="quiz-icon math-bg">➗</div>
            <div class="details"><strong>Math Quiz: Week 3</strong><span>Perimeter Quiz</span></div>
            <span class="status">Go</span>
        </a>
        <a href="math_quiz4.php" class="quiz-card">
            <div class="quiz-icon math-bg">➗</div>
            <div class="details"><strong>Math Quiz: Week 4</strong><span>Composite Perimeter</span></div>
            <span class="status">Go</span>
        </a>

        <a href="math_quiz5.php" class="quiz-card">
    <div class="quiz-icon math-bg">➗</div>
    <div class="details"><strong>Math Quiz: Week 5</strong><span>Place Value Quiz</span></div>
    <span class="status">Go</span>
</a>
<a href="math_quiz6.php" class="quiz-card">
    <div class="quiz-icon math-bg">➗</div>
    <div class="details"><strong>Math Quiz: Week 6</strong><span>Comparing and Rounding Numbers</span></div>
    <span class="status">Go</span>
</a>
<a href="math_quiz7.php" class="quiz-card">
    <div class="quiz-icon math-bg">➗</div>
    <div class="details"><strong>Math Quiz: Week 7</strong><span>Reading and Writing Numbers</span></div>
    <span class="status">Go</span>
</a>
<a href="math_quiz8.php" class="quiz-card">
    <div class="quiz-icon math-bg">➗</div>
    <div class="details"><strong>Math Quiz: Week 8</strong><span>Estimating Sums and Differences</span></div>
    <span class="status">Go</span>
</a>

<div class="section-title">Science</div>
<a href="science_quiz1.php" class="quiz-card">
    <div class="quiz-icon sci-bg">🔬</div>
    <div class="details"><strong>Science Quiz: Week 1</strong><span>Science Process Skills</span></div>
    <span class="status">Go</span>
</a>
<a href="science_quiz2.php" class="quiz-card">
    <div class="quiz-icon sci-bg">🔬</div>
    <div class="details"><strong>Science Quiz: Week 2</strong><span>Science Inventions</span></div>
    <span class="status">Go</span>
</a>
<a href="science_quiz3.php" class="quiz-card">
    <div class="quiz-icon sci-bg">🔬</div>
    <div class="details"><strong>Science Quiz: Week 3</strong><span>Chemical Properties</span></div>
    <span class="status">Go</span>
</a>
<a href="science_quiz4.php" class="quiz-card">
    <div class="quiz-icon sci-bg">🔬</div>
    <div class="details"><strong>Science Quiz: Week 4</strong><span>States & Changes of Matter</span></div>
    <span class="status">Go</span>
</a>
<a href="science_quiz5.php" class="quiz-card">
    <div class="quiz-icon sci-bg">🔬</div>
    <div class="details"><strong>Science Quiz: Week 5</strong><span>Human Body Systems</span></div>
    <span class="status">Go</span>
</a>
<a href="science_quiz6.php" class="quiz-card">
    <div class="quiz-icon sci-bg">🔬</div>
    <div class="details"><strong>Science Quiz: Week 6</strong><span>Eco-Warrior Quiz</span></div>
    <span class="status">Go</span>
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