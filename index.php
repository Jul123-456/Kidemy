<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | Login</title>
    <style>
        
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background: #f0f7ff; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .form-container { 
            background: white; 
            padding: 40px; 
            border-radius: 30px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 320px; 
            text-align: center; 
        }
        h2 { color: #1e40af; margin-bottom: 25px; }
        input { 
            width: 100%; 
            padding: 12px; 
            margin: 10px 0; 
            border: 1px solid #ddd; 
            border-radius: 12px; 
            box-sizing: border-box; 
            background: #f9f9f9;
        }
        button { 
            width: 100%; 
            padding: 14px; 
            background: #1e40af; 
            color: white; 
            border: none; 
            border-radius: 12px; 
            font-weight: bold; 
            cursor: pointer; 
            margin-top: 15px;
            font-size: 16px;
        }
        button:hover { background: #1e3a8a; }
        p { font-size: 14px; color: #64748b; margin-top: 20px; }
        a { color: #3b82f6; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>🔑 Login</h2>
        <form action="Dashboard.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">✨ Login ✨</button>
        </form>
        <p>Don't have an account? <a href="Register.php">Sign Up</a></p>
    </div>
</body>
</html>