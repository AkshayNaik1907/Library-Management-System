<?php
   include("data.php");
   $userloginid= $_GET['student_name'];
   $u=new data;
   $u->setconnection();
   $u->getissuebook($userloginid);
   $recordset=$u->getissuebook($userloginid);

   $table="<table  border-collapse: collapse; width: 100%;'>
   <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Student Name</th>
   <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Book Name</th>
   <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Branch</th>
   <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Issue Days</th>
   <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Issue Date</th>
   <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Return Date</th>
   <th style=' border: 1px solid rgb(56, 53, 53) ;padding: 12px;'>Fine</th>
   </tr>";

   foreach($recordset as $row){
       $table.="<tr>";
      "<td>$row[0]</td>";
       $table.="<td  style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[1]</td>";
       $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[2]</td>";
       $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[3]</td>";
       $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[4]</td>";
       $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[5]</td>";
       $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[6]</td>";
       $table.="<td style=' border: 1px solid rgb(56, 53, 53);padding: 12px;'>$row[7]</td>";
     
       $table.="</tr>";
   }
   $table.="</table>";

   echo $table;


    ?>