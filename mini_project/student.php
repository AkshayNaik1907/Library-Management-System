
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Student Dashboard</title>
</head>
<body>
<?php
   include("data.php");
    ?>

    <header>
        <h1>Welcome to Student Library Dashboard </h1>
        <div class="a">
            <form action="index.php">    
                <button type="submit">Logout</button>
            </form>
    </div>
    </header>
   
    <div class="action-box">
            <h3>Books Available</h3>
            <form action="studentbookreport.php">    
                <button type="submit">Search</button>
            </form>
    </div>
    <div class="action-box">
            <h3>Books Borrowed</h3>
            <form action="borrow.php" method="get">
            <input type="text" id="student_name" name="student_name" placeholder="Student Name" value="" required>
            <button type="submit" class="btn">Submit</button>
            </form>
           
            </div>
            </div>

            <div class="action-box">
            <h3>Book Search</h3>
            <form action="search.php" method="get">
            <input type="text" id="search_book" name="search_book" placeholder="Enter book title" value="" required>
            <button type="submit" class="btn">Search</button>
            </div>
            






            
            <div class="action-box">
            <h3>Feedback</h3>
            <form action="feedback.php" method="post">
    <label for="feedback"></label>
    <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea>
    <br>
    <br>
    <button type="submit">Submit</button>
</form>

    </div>


            
    </div>

    <footer>
        <h2>Help and Support</h2>
        <p>If you need assistance or have any questions, please contact our support team at miniproject@help.com</p>
    </footer>
</body>
</html>
