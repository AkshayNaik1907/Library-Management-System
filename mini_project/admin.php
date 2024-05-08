


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
        include("data.php");
    ?>
    <header>
        <h1>Welcome to Admin Dashboard!</h1>
        <div class="a">
            <form action="index.php">    
                <button type="submit">Logout</button>
            </form>
    </div>
    </header>
    

    <section class="admin-actions">
        <div class="action-box">
            <h3>Student Record</h3>
            <form action="studentrecord.php">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="action-box">
            <h3>Book Record</h3>
            <form action="bookreport.php">    
                <button type="submit">Search</button>
            </form>
        </div>
        
        <div class="action-box">
            <h3>Issue Record</h3>
            <form action="issuereport.php">    
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="action-box">
            <h3>Return Book</h3>
            <form action="returnbook.php" method="post" enctype="multipart/form-data">  
            <label for="book_name">Choose Book:</label>
            <br>
            <select name="issue_book_name" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();
            $uniqueValues = [];
            foreach($recordset as $row){
                $value = $row[2];
                if (!isset($uniqueValues[$value])) {
                    echo "<option value='" .  $row[2] . "'>" .$row[2] . "</option>";
            
                    // Mark the value as encountered
                    $uniqueValues[$value] = true;
                }
               // echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select> 
            <br> 
            <label for="Select Student">Select Student:</label>
            <br>
            <select name="student_name" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();
            foreach($recordset as $row){
               $id= $row[1];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
            
            <br>
                <button type="submit">Return</button>
            </form>
        </div>

        <div class="action-box">
            <h3>Issue Book</h3>
            <form action="issuebook.php" method="post" enctype="multipart/form-data">
            <label for="book_name">Choose Book:</label>
            <br>
            <select name="book_name" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->bookreport();
            $recordset=$u->bookreport();
            foreach($recordset as $row){

                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
        
            }            
            ?>
            
            </select>
<br>
            <label for="Select Student">Select Student:</label>
            <br>
            <select name="student_name" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->studentrecord();
            $recordset=$u->studentrecord();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<br>

           
           <label>Days</label> <input type="number" name="issue_days"/>
            <input type="submit" value="Issue Book"/>
            </form>
        </div>
        
        <div class="addbook">
            <h3>Add Book</h3>
            <form action="addbook.php" method="post">
            <div>Book Name:</div><input type="text" name="book_name" required/></br>
            <div>Author:</div><input type="text" name="author" required/></br>
            <div>Branch:</div><br>
            <select name="branch" required>
            <option value="">--Please choose an option--</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="EEE">EEE</option>
            <option value="BME">BM</option>
            <option value="Civil">CIVIL</option>
            <option value="ME">MECHANICAL</option>
            </select>
            <br>
            <div>Quantity:</div><input type="number" name="quantity" required/></br>
            <div>Available Book:</div><input type="number" name="book_available" required/></br>
            <div>Rack:</div><input type="text" name="Rack" required/></br>
            <div>Sub_Rack:</div><input type="text" name="Sub_Rack" required/></br>
            <button type="submit">Add Book</button>
            </form>
        </div>

    </section>
    
   
    <footer>
        <h2>Help and Support</h2>
        <p>If you need assistance or have any questions, please contact our support team at miniproject@help.com</p>
    </footer>
</body>
</html>
