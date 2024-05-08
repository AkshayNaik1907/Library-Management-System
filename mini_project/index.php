<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Library Management System</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Student Login</h2>
            <form action="studentserver.php" method="get">
                <div class="textbox">
                    <label for="student_id"></label>
                    <input type="text" id="student_id" name="student_id" placeholder="Student ID" value="" required>
                </div>
                <div class="textbox">
                    <label for="student_password"></label>
                    <input type="password" id="student_password" name="student_password" placeholder="Password" value="" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
        <div class="login-box">
            <h2>Admin Login</h2>
            <form action="adminserver.php" method="get">
                <div class="textbox">
                    <label for="admin_id"></label>
                    <input type="text" id="admin_id" name="admin_id" placeholder="Admin ID" value="" required>
                </div>
                <div class="textbox">
                    <label for="admin_password"></label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Password" value="" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
