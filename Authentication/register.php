<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="center">
        <h1>Register</h1>
        <form method="post">
            <div class="txt_field">
                <label>Username</label>
                <input type="text" name="username" pattern="[a-zA-Z0-9_]{3,16}" required>
                <span> </span>
            </div>
            <div class="txt_field">
                <label>Email Address</label>
                <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$" required>
                <span> </span>
            </div>
            <div class="txt_field">
                <label>Password</label>
                <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}" 
                       title="Password must be at least 8 characters long,
                       contain at least one uppercase letter,
                       one lowercase letter, one number, and one special character." required>
                <span> </span>
            </div>
            <div class="txt_field">
                <label>Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span> </span>
            </div>
            <div class="forgot">Already have an account? <a href="login.html">Login</a></div>
            <input type="submit" value="Register">
        </form>
    </div>

    <script src="form.js"></script>
</body>
</html>