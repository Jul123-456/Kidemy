<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "kidemy");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; 

$sql = "SELECT full_name, role, profile_image FROM users WHERE id = $user_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$display_name = $user ? $user['full_name'] : "student";
$display_role = $user ? $user['role'] : "Ready to learn today?";
$profile_img = ($user && !empty($user['profile_image'])) ? 'uploads/' . $user['profile_image'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Kidemy</title>
    <style>
        :root {
            --blue: #63a9ff;
            --green: #48d195;
            --orange: #ff9f43;
            --purple: #a29bfe;
            --bg: #f8f9fa;
            --text-dark: #2d3436;
            --text-muted: #8892b0;
        }

        body { 
            font-family: 'Inter', 'Segoe UI', sans-serif; 
            background-color: #2c3e50; 
            margin: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

      
        .mobile-frame {
            width: 375px;
            height: 700px;
            background-color: #fff;
            border-radius: 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 25px;
            padding-bottom: 90px;
        }

        .welcome-text { margin-bottom: 30px; }
        .welcome-text h1 { 
            font-size: 28px; 
            margin: 0; 
            color: var(--text-dark); 
            font-weight: 800;
        }
        .welcome-text p { 
            font-size: 16px; 
            color: var(--text-muted); 
            margin: 5px 0 0; 
        }

       
        .avatar-section {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }
        .avatar-circle { 
            width: 70px; height: 70px; 
            background: var(--bg); 
            border-radius: 20px; 
            overflow: hidden;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; color: var(--blue); font-weight: bold;
            border: 2px solid #eee;
        }
        .avatar-circle img { width: 100%; height: 100%; object-fit: cover; }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-dark);
        }

        .grid-menu {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }

        .menu-card {
            border-radius: 25px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            color: white;
            transition: transform 0.2s;
        }
        .menu-card:active { transform: scale(0.95); }
        .menu-card span { font-weight: 800; font-size: 12px; letter-spacing: 1px; display: block; margin-bottom: 10px; }
        .btn-mini {
            background: rgba(255,255,255,0.3);
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: bold;
            display: inline-block;
        }

        
        .bg-blue   { background-color: var(--blue); }
        .bg-green  { background-color: var(--green); }
        .bg-orange { background-color: var(--orange); }
        .bg-purple { background-color: var(--purple); }

        
        .logout-box {
            background: #f8f9fa;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-decoration: none;
        }
        .logout-label {
            background: #ff4757;
            color: white;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }
        .logout-title { font-weight: 700; color: var(--text-dark); display: block; }

        
        .bottom-nav {
            position: absolute;
            bottom: 0; width: 100%;
            background: #fff;
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
            border-top: 1px solid #eee;
        }
        .nav-icon { text-decoration: none; font-size: 22px; opacity: 0.2; }
        .active-icon { opacity: 1; color: var(--blue); }

        .content::-webkit-scrollbar { display: none; }
    </style>
</head>
<body>

    <div class="mobile-frame">
        <div class="content">
            <div class="welcome-text">
                <h1>Hello, <?php echo strtolower(htmlspecialchars($display_name)); ?>!</h1>
                <p>Manage your account</p>
            </div>

            <div class="avatar-section">
                <div class="avatar-circle">
                    <?php if ($profile_img): ?>
                        <img src="<?php echo $profile_img; ?>" alt="Profile">
                    <?php else: ?>
                        <?php echo strtoupper(substr($display_name, 0, 1)); ?>
                    <?php endif; ?>
                </div>
                <div>
                    <span style="font-weight: 800; display: block;"><?php echo htmlspecialchars($display_name); ?></span>
                    <span style="color: var(--text-muted); font-size: 14px;"><?php echo htmlspecialchars($display_role); ?></span>
                </div>
            </div>

            <div class="section-title">Settings</div>

            <div class="grid-menu">
                <a href="edit_profile.php" class="menu-card bg-blue">
                    <span>EDIT PROFILE</span>
                    <div class="btn-mini">Update Info</div>
                </a>
                <a href="change_password.php" class="menu-card bg-green">
                    <span>PASSWORD</span>
                    <div class="btn-mini">Change</div>
                </a>
                <a href="quizzes.php" class="menu-card bg-orange">
                    <span>RESULTS</span>
                    <div class="btn-mini">View All</div>
                </a>
                <a href="lessons_archive.php" class="menu-card bg-purple">
                    <span>LESSONS</span>
                    <div class="btn-mini">Archive</div>
                </a>
            </div>

            <div class="section-title">Session</div>

            <a href="logout.php" class="logout-box">
                <div>
                    <span class="logout-label">SYSTEM</span>
                    <span class="logout-title">Sign Out of Kidemy</span>
                </div>
                <span style="color: #ccc;">›</span>
            </a>
        </div>

        <nav class="bottom-nav">
            <a href="Dashboard.php" class="nav-icon">🏠</a>
            <a href="lessons_archive.php" class="nav-icon">📖</a>
            <a href="quizzes.php" class="nav-icon">📝</a>
            <a href="profile.php" class="nav-icon active-icon">👤</a>
        </nav>
    </div>

</body>
</html>