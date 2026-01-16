<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ensure the user is logged in
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;
$message = "";
$message_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_pass = mysqli_real_escape_string($conn, $_POST['current_password']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // 1. Fetch the actual password currently in the database
    $sql = "SELECT password FROM users WHERE id = $user_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // 2. Logic Checks
    if ($current_pass !== $user['password']) {
        $message = "The current password you entered is incorrect.";
        $message_type = "error";
    } elseif ($new_pass !== $confirm_pass) {
        $message = "New password and confirmation do not match.";
        $message_type = "error";
    } elseif (empty($new_pass)) {
        $message = "New password cannot be empty.";
        $message_type = "error";
    } else {
        // 3. Update the password in the database
        $update_sql = "UPDATE users SET password = '$new_pass' WHERE id = $user_id";
        if (mysqli_query($conn, $update_sql)) {
            $message = "Password changed successfully!";
            $message_type = "success";
        } else {
            $message = "Error updating password.";
            $message_type = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #fff; margin: 0; padding: 20px; }
        .container { max-width: 400px; margin: auto; }
        .back-link { color: #7ec8e3; text-decoration: none; font-size: 16px; display: inline-block; margin-bottom: 15px; }
        
        h2 { font-size: 24px; margin-bottom: 10px; color: #333; }
        p.subtitle { color: #888; font-size: 14px; margin-bottom: 25px; }
        
        /* Success/Error Alerts */
        .alert { padding: 12px; border-radius: 12px; margin-bottom: 20px; font-size: 14px; text-align: center; font-weight: 500; }
        .error { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
        .success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }

        .input-box { background: #f7f8f9; border-radius: 12px; padding: 15px; margin-bottom: 15px; border: 1px solid #eee; }
        label { display: block; color: #555; font-size: 13px; margin-bottom: 5px; font-weight: 600; text-transform: uppercase; }
        input { width: 100%; border: none; background: transparent; font-size: 16px; color: #333; outline: none; padding: 5px 0; }
        
        .save-btn { width: 100%; padding: 16px; background: #4a90e2; color: white; border: none; border-radius: 12px; font-size: 16px; font-weight: bold; margin-top: 10px; cursor: pointer; transition: background 0.3s; }
        .save-btn:hover { background: #357abd; }
    </style>
</head>
<body>
    <div class="container">
        <a href="profile.php" class="back-link">&lt; Go back</a>
        <h2>Change Password</h2>
        <p class="subtitle">Secure your account by updating your password.</p>

        <?php if ($message): ?>
            <div class="alert <?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form action="change_password.php" method="POST">
            <div class="input-box">
                <label>Current Password</label>
                <input type="password" name="current_password" placeholder="Enter old password" required>
            </div>
            
            <div class="input-box">
                <label>New Password</label>
                <input type="password" name="new_password" placeholder="Enter new password" required>
            </div>

            <div class="input-box">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" placeholder="Repeat new password" required>
            </div>
            
            <button type="submit" class="save-btn">Update Password</button>
        </form>
    </div>
</body>
</html>