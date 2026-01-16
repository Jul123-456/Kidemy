<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kidemy");


if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $new_role = mysqli_real_escape_string($conn, $_POST['role']);
    
   
    if (!empty($_FILES['profile_image']['name'])) {
        $img_name = time() . '_' . $_FILES['profile_image']['name'];
        $target = 'uploads/' . $img_name;
        
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)) {
            $sql = "UPDATE users SET full_name='$new_name', role='$new_role', profile_image='$img_name' WHERE id=$user_id";
        }
    } else {
        
        $sql = "UPDATE users SET full_name='$new_name', role='$new_role' WHERE id=$user_id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: profile.php"); 
        exit();
    }
}


$res = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #fcfcfc; padding: 20px; display: flex; justify-content: center; }
        .edit-card { background: white; width: 100%; max-width: 400px; padding: 25px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h2 { color: #333; margin-top: 0; }
        .input-group { margin-bottom: 15px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #888; margin-bottom: 5px; }
        input[type="text"], input[type="file"] { width: 100%; padding: 12px; border: 1px solid #eee; border-radius: 10px; box-sizing: border-box; }
        .btn-update { width: 100%; padding: 15px; background: #3498db; color: white; border: none; border-radius: 12px; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .cancel-link { display: block; text-align: center; margin-top: 15px; color: #aaa; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <div class="edit-card">
        <h2>Update Profile</h2>
        <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
            </div>
            <div class="input-group">
                <label>Grade / Role</label>
                <input type="text" name="role" value="<?php echo htmlspecialchars($user['role']); ?>">
            </div>
            <div class="input-group">
                <label>Change Profile Picture</label>
                <input type="file" name="profile_image" accept="image/*">
            </div>
            <button type="submit" class="btn-update">Save Changes</button>
            <a href="profile.php" class="cancel-link">Back to Profile</a>
        </form>
    </div>
</body>
</html>