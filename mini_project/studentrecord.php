<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-12">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studentrecord.css">
    <title>Book Report</title>
</head> 
<body>
<?php
        include("data.php");
    ?>  
    <div class="container">
<div class="action-box">
            <h2>Student Record</h2>
            
            <?php
            $u=new data;
            $u->setconnection();
            $u->studentrecord();
            $recordset=$u->studentrecord();
            
            $table = "<table  border-collapse: collapse; width: 100%;'>
            <tr>
                <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Student ID</th>
                <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Student Name</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>Student Email</th>
            </tr>";
            foreach($recordset as $row){
                $table.="<tr>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[0]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[1]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[3]</td>";
                $table.="</tr>";
                
            }
            $table.="</table>";

            echo $table;
            ?>
        </div>
        </div>
</body>
</html>