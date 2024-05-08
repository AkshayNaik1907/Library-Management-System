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
            <h2>Book Record</h2>
            
            <?php
            $u=new data;
            $u->setconnection();
            $u->bookreport();
            $recordset=$u->bookreport();
            
            $table = "<table  border-collapse: collapse; width: 100%;'>
            <tr>
                <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Book ID</th>
                <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Book Name</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>Author</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>Branch</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>Total No of Books</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>No of Books Available</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>No of Books Issued</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>Rack</th>
                <th style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>Sub Rack</th>
            </tr>";
            foreach($recordset as $row){
                $table.="<tr>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[0]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[1]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[2]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[3]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[4]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[5]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[6]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[7]</td>";
                $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[8]</td>";
                $table.="</tr>";
                
            }
            $table.="</table>";

            echo $table;
            ?>
        </div>
        </div>
</body>
</html>