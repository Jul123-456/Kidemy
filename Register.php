<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        
        $checkEmail = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
        if (mysqli_num_rows($checkEmail) > 0) {
            $error = "Email already registered!";
        } else {
            
            $sql = "INSERT INTO users (full_name, email, password, role) VALUES ('$full_name', '$email', '$password', 'Student')";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                $_SESSION['user'] = $full_name;

                header("Location: Dashboard.php");
                exit();
            } else {
                $error = "Registration failed: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | Sign Up</title>
    <style>
        :root {
            --blue: #63a9ff;
            --bg-dark: #2c3e50;
            --text-muted: #8892b0;
        }

        body { 
            font-family: 'Inter', 'Segoe UI', sans-serif; 
            background-color: var(--bg-dark); 
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
            border: 10px solid #000;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .form-container {
            width: 85%;
            text-align: center;
        }

        h2 { 
            color: #2d3436; 
            font-size: 32px; 
            margin: 0 0 10px; 
            font-weight: 800;
        }

        p.subtitle { 
            color: var(--text-muted); 
            margin-bottom: 30px;
            font-size: 16px;
        }

        input { 
            width: 100%; 
            padding: 15px; 
            margin: 10px 0; 
            border: 1.5px solid #f1f3f5; 
            border-radius: 20px; 
            box-sizing: border-box; 
            background: #f8f9fa;
            font-size: 14px;
        }

        button { 
            width: 100%; 
            padding: 16px; 
            background: var(--blue); 
            color: white; 
            border: none; 
            border-radius: 20px; 
            font-weight: 800; 
            cursor: pointer; 
            margin-top: 20px; 
            font-size: 16px; 
            box-shadow: 0 8px 15px rgba(99, 169, 255, 0.3);
            transition: 0.3s;
        }

        button:active { transform: scale(0.98); }

        .error-msg {
            background: #fff0f0;
            color: #ff4757;
            padding: 10px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .footer-text { font-size: 14px; color: var(--text-muted); margin-top: 25px; }
        .footer-text a { color: var(--blue); text-decoration: none; font-weight: 800; }
    </style>
</head>
<body>

    <div class="mobile-frame">
        <div class="form-container">
            <h2>🌈 Sign Up</h2>
            <p class="subtitle">Join the Kidemy family!</p>

            <?php if(isset($error)): ?>
                <div class="error-msg"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Create Password" required minlength="6">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required minlength="6">
                
                <button type="submit">✨ Create Account ✨</button>
            </form>

            <p class="footer-text">Already a member? <a href="index.php">Login</a></p>
        </div>
    </div>

</body>
</html>